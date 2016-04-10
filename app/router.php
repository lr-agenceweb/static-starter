<?php

Class Router {

  private $app;

  public function __construct($app) {
    $this->app = $app;
  }

  public function get($url, $action) {
    return $this->call($url, $action, 'get');
  }

  public function post($url, $action) {
    return $this->call($url, $action, 'post');
  }

  private function call($url, $action, $method) {
    return $this->app->$method($url, function() use($action){
      $action = explode('@', $action);
      $controller_name = $action[0] . 'Controller';
      $method = $action[1];
      $controller = new $controller_name($this->app);
      call_user_func_array([$controller, $method], []);
    });
  }
}
