<?php

Class ContactsController extends ApplicationController {

  public function post() {
    $errors = [];
    $validator = $this->app->contact_validator;

    $validator->check('name', 'required');
    // $validator->check('email', 'required');
    // $validator->check('email', 'email');
    // $validator->check('message', 'required');
    $errors = $validator->errors();

    if(!empty($errors)) {
      $this->app->flash('errors', $errors);
    } else {
      $this->app->flash('success', 'The mail has been sent successfully');
    }

    $this->app->redirect($this->app->urlFor('contact'));
  }
}
