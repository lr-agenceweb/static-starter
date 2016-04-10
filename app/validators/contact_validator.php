<?php

Class ContactValidator {

  private $datas = [];
  private $errors = [];

  public function __construct($datas) {
    $this->datas = $datas;
  }

  public function check($name, $rule, $options = false) {
    $validator = "validate_$rule";
    if(!$this->$validator($name, $options)) {
      $this->errors[$name] = "The $name fields has not been filled properly";
    }
  }

  public function validate_required($name) {
    return array_key_exists($name, $this->datas) && $this->datas[$name] != '';
  }

  public function validate_email($name) {
    return array_key_exists($name, $this->datas) && filter_var($this->datas[$name], FILTER_VALIDATE_EMAIL);
  }

  public function errors() {
    return $this->errors;
  }
}