gulp = require 'gulp'
$ = require('gulp-load-plugins')()
del = require('del')
path = require('path')
php = require('gulp-connect-php')
addsrc = require('gulp-add-src')
browserSync = require('browser-sync')
reload = browserSync.reload

global.browser_support = [
    "ie >= 9"
    "ie_mob >= 10"
    "ff >= 30"
    "chrome >= 34"
    "safari >= 7"
    "opera >= 23"
    "ios >= 7"
    "android >= 4.4"
    "bb >= 10"
]

#
# == Variables
#
path = new (->
  @root = './public'
  @sass = @root + '/assets/sass'
  @coffee = @root + '/assets/coffeescript'
  @img = @root + '/assets/images'

  @dist_root = @root
  @dist_css = @root + '/assets/css'
  @dist_js = @root + '/assets/js'
  @dist_img = @img
)

#
# == PHP Server
#
gulp.task 'php', ->
  php.server
    base: path.root
    port: 8013
    keepalive: true

#
# == Gulp Server
#
gulp.task 'serve', ['php', 'watchall'], ->
  browserSync
    notify: false
    port: 8080
    open: false
    reloadDelay: 2000
    proxy: '127.0.0.1:8013'

#
# == Watcher
#
gulp.task 'watchall', ->
  gulp.watch ["#{path.sass}/**/*.sass", "#{path.sass}/**/*.scss"], ['sass', reload]
  gulp.watch "#{path.coffee}/**/*.coffee", ['coffee', reload]
  watcher = gulp.watch "#{path.img}/**/*.*", [reload]

  # Sync deleted pictures on dist folder
  watcher.on 'change', (event) ->
    console.log event
    if event.type == 'deleted'
      filePathFromSrc = path.relative(path.resolve("#{path.img}"), event.path)
      destFilePath = path.resolve("#{path.dist_img}", filePathFromSrc)
      del.sync destFilePath
    return

#
# == Sass task
#
gulp.task 'sass', ->
  sass_task(["#{path.sass}/**/application.sass", 'application.css')
  sass_task(["#{path.sass}/**/noscript.sass"], 'noscript.css')
  sass_task(["#{path.sass}/**/ie9.sass"], 'ie9.css')

#
# == Coffee task
#
gulp.task 'coffee', ->
  gulp.src [
    "#{path.coffee}/base/functions.coffee",
    "#{path.coffee}/_mapbox_map.coffee",
    "#{path.coffee}/_form_backup.coffee",
    "#{path.coffee}/_responsive_menu.coffee",
    "#{path.coffee}/_ajax_form.coffee",
    # "#{path.coffee}/_vegas_gallery.coffee",
    "#{path.coffee}/application.coffee"
  ]
  .pipe $.plumber()
  .pipe $.coffee
    bare: true
  .pipe addsrc.prepend [
    'node_modules/jquery/dist/jquery.min.js',
    #'node_modules/vegas/dist/vegas.min.js',
    'node_modules/autosize/dist/autosize.js',
    'node_modules/jquery-placeholder/jquery.placeholder.js',
    'node_modules/foundation-sites/js/foundation.core.js',
    'node_modules/foundation-sites/js/foundation.util.mediaQuery.js',
    'node_modules/foundation-sites/js/foundation.abide.js'
  ]
  .pipe $.babel()
  .pipe $.concat('application.js')
  .pipe $.uglify()
  .pipe $.size()
  .pipe gulp.dest path.dist_js

#
# == Copy all assets and pages to the site folder
#
gulp.task 'dist', ['sass', 'coffee']

gulp.task 'default', ['serve']


# Function to handle sass for various files
sass_task = (to_watch, dest) ->
  gulp.src to_watch
  .pipe $.plumber()
  .pipe $.sass
    indentedSyntax: true
    onError: console.error.bind(console, 'SASS Error:')
  .pipe $.autoprefixer(browsers: browser_support)
  .pipe $.concatCss(dest)
  .pipe $.cssnano()
  .pipe $.size()
  .pipe gulp.dest path.dist_css

