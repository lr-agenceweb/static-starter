<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="<?= ADMIN_FULLNAME; ?>">

    <title>
      <?= (isset($page) && !is_null($page->title)) ? $page->title . ' | ' : '' ?><?= SITE_TITLE; ?>
    </title>

    <link href='//fonts.googleapis.com/css?family=Poppins:300,700' rel='stylesheet' type='text/css'>
    <link href='//api.mapbox.com/mapbox.js/v2.2.3/mapbox.css' rel='stylesheet' type='text/css'>
    <link href="<?= url('/assets/css/application.css'); ?>" rel='stylesheet' type='text/css'>

    <noscript>
      <link href="<?= url('/assets/css/noscript.css'); ?>" rel='stylesheet' type='text/css>'>
    </noscript>
  </head>

  <body>
    <?php require_once '../partials/menu.' . locale() . '.php'; ?>

    <?= $content; ?>

    <?php require_once '../partials/footer.' . locale() . '.php'; ?>
  </body>
</html>
