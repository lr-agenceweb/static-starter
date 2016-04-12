<?php
require '../vendor/autoload.php';

use App\Router;
use App\PagesCollection;
use App\SitemapHelper;

// We start Slim and create a new PagesCollection
$app = new \Slim\Slim([
  'templates.path' => views_path
]);
$app->add(new \Slim\Middleware\SessionCookie);

$router = new Router($app);
$pages = new PagesCollection();

$router->post('/contact', 'Contacts@post');

$app->contact_validator = function() {
  return new ContactValidator($_POST);
};

if(!SitemapHelper::already_generated()){
  SitemapHelper::create_folders();
  SitemapHelper::set_sitemap($pages);
}

// Let's create a route for every YAML file in the content directory
foreach($pages as $page){
  // We use any cause we may need to access some page using POST to create forms for instance
  $app->any($page->getUrl(), function() use ($page, $app){
    echo $page->render();
  })->name($page->getName());
}

// Let's run our awesome app
$app->run();
