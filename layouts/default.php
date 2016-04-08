<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title><?= (isset($page) && isset($page->title)) ? $page->title : 'Mon site'; ?></title>

    <link href='//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' rel='stylesheet' type='text/css'>
    <link href='//api.mapbox.com/mapbox.js/v2.2.3/mapbox.css' rel='stylesheet' type='text/css'>
    <link href="<?= url('/assets/css/application.css'); ?>" rel='stylesheet' type='text/css'>

    <noscript>
      <link href="<?= url('/assets/css/noscript.css'); ?>" rel='stylesheet' type='text/css>'>
    </noscript>
  </head>

  <body>
    <nav class="navbar navbar-inverse" style="margin-bottom: 0;">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?= route('home') ?>">Bootstrap theme</a>
          <ul class="nav navbar-nav">
            <li>
              <a href="<?= route('contact') ?>">Me contacter</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <?= $content; ?>

  </body>
</html>
