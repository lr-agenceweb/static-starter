<!DOCTYPE html>
<html lang="<?= locale(); ?>">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= strip_tags_and_truncate($page->description); ?>">
    <meta name="keywords" content="<?= $page->keywords; ?>">

    <!-- Social meta -->
    <meta property="og:title" content="<?= site_title($page); ?>" />
    <meta property="og:description" content="<?= $page->description; ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?= get_current_url(); ?>" />
    <?php if(has_image($page)): ?>
    <meta property="og:image" content="<?= meta_image($page); ?>" />
    <?php endif; ?>

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?= site_title($page); ?>" />
    <meta name="twitter:description" content="<?= $page->description; ?>" />
    <meta name="twitter:url" content="<?= get_current_url(); ?>" />
    <?php if(has_image($page)): ?>
    <meta name="twitter:image" content="<?= meta_image($page); ?>" />
    <?php endif; ?>

    <meta name="author" content="<?= ADMIN_FULLNAME; ?>">
    <link type='text/plain' rel='author' href='/humans.txt'>

    <title> <?= site_title($page); ?> </title>

    <link href='//fonts.googleapis.com/css?family=Poppins:300,700' rel='stylesheet' type='text/css'>
    <link href='//api.mapbox.com/mapbox.js/v2.2.3/mapbox.css' rel='stylesheet' type='text/css'>
    <link href="<?= url('/assets/css/application.css'); ?>" rel='stylesheet' type='text/css'>

    <noscript>
      <link href="<?= url('/assets/css/noscript.css'); ?>" rel='stylesheet' type='text/css>'>
    </noscript>

    <script type='text/javascript'>
      (function() {
        var other, script;
        script = document.createElement('script');
        script.type = 'text/javascript';
        script.async = true;
        script.src = "<?= url('/assets/js/application.js'); ?>"
        other = document.getElementsByTagName('script')[0];
        other.parentNode.insertBefore(script, other);
      })();
    </script>
  </head>

  <body itemscope itemtype="http://schema.org/WebPage">
    <?php require_once partials_path . '/_no_js.php'; ?>
    <?php require_once partials_path . '/_flash.php'; ?>

    <main id="wrapper" class="wrapper">
      <?php require_once partials_path . '/_locale_switcher.php'; ?>
      <?php require_once partials_path . '/menu.php'; ?>

      <header class="row">
        <div class="small-12 columns">
          <h2> <?= $page->title; ?> </h2>
        </div>
      </header>

      <?= $content; ?>
      <?php require_once partials_path . '/_microdatas.php'; ?>

      <div class="push"></div>
    </main>

    <?php require_once partials_path . '/footer.php'; ?>
  </body>
</html>
