<?php
/* Return absolute URL */
function url($path){
  global $app;
  return $app->request->getRootUri() . '/' . trim($path, '/');
}

/* Get a quick instance of PagesCollection from a path */
function pages($path, $depth = 0){
  return new \App\PagesCollection($path, $depth);
}

/* Return the URL for the Page or the route */
function route($path){
  global $app;
  $locale = locale() == 'en' ? '/' . locale() : '';
  return $locale . $app->urlFor(is_string($path) ? $path : $path->getName());
}

/* Return the current locale of the page */
function locale(){
  $locale = 'fr';
  if(strpos($_SERVER['REQUEST_URI'], '/en') !== false){
    $locale = 'en';
  }
  return $locale;
}

/* Return the current year for copyright */
function auto_copyright($year = 'auto'){
  if(intval($year) == 'auto'){
    $year = date('Y');
  }
  if(intval($year) == date('Y')){
    return intval($year);
  }
  elseif(intval($year) < date('Y')){
    return intval($year) . ' - ' . date('Y');
  }
  return date('Y');
}

/**
 * Check if current request is made by AJAX or not
 * Return boolean
 */
function is_ajax(){
  return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
