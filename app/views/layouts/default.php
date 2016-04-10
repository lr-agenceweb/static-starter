<!DOCTYPE html>
<html lang="<?= locale() ?>">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= $page->description ?>">
    <meta name="keywords" content="<?= $page->keywords ?>">
    <meta name="author" content="<?= ADMIN_FULLNAME; ?>">
    <link type='text/plain' rel='author' href='/humans.txt'>

    <title>
      <?= (isset($page) && !is_null($page->title)) ? $page->title . ' | ' : '' ?><?= SITE_TITLE; ?>
    </title>

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
    <div id="wrapper" class="wrapper">
      <?php require_once partials_path . '/menu.' . locale() . '.php'; ?>
      <?= $content; ?>

      <div class="push"></div>
    </div>

    <?php require_once partials_path . '/footer.' . locale() . '.php'; ?>
    <?php require_once partials_path . '/_flash.php'; ?>
  </body>
</html>