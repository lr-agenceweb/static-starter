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

    <link href='//fonts.googleapis.com/css?family=Poppins:300,700' rel='stylesheet' type='text/css'>
    <link href='//api.mapbox.com/mapbox.js/v2.2.3/mapbox.css' rel='stylesheet' type='text/css'>
    <link href="<?= url('/assets/css/application.css'); ?>" rel='stylesheet' type='text/css'>

    <noscript>
      <link href="<?= url('/assets/css/noscript.css'); ?>" rel='stylesheet' type='text/css>'>
    </noscript>
  </head>

  <body>

    <div class="top-bar">
      <div class="top-bar-left">
        <ul class="menu">
          <li class="menu-text">
            <a href="<?= route('home') ?>">Yeti Agency</a>
          </li>
        </ul>
      </div>

      <div class="top-bar-right">
        <ul class="menu">
          <li>
            <a href="<?= route('home') ?>">Accueil</a>
          </li>
          <li>
            <a href="<?= route('contact') ?>">Me contacter</a>
          </li>
        </ul>
      </div>
    </div>

    <?= $content; ?>

  </body>
</html>
