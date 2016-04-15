<?php

Class ApplicationController {

  protected $app;

  public function __construct($app) {
    $this->app = $app;
  }
}
