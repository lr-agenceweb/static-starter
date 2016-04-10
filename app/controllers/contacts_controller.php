<?php

Class ContactsController extends ApplicationController {

  public function post() {
    $errors = [];
    $validator = $this->app->contact_validator;

    $validator->check('nickname', 'absent'); # Captcha
    $validator->check('fullname', 'required');
    $validator->check('email', 'required');
    $validator->check('email', 'email');
    $validator->check('message', 'required');
    $errors = $validator->errors();

    if(!empty($errors)) {
      if(array_key_exists('nickname', $errors)) {
        if(is_ajax()) {
          $data['success'] = false;
          $data['feedback'] = FEEDBACK_ERROR;
          echo json_encode($data);
          die();
        } else {
          $errors['nickname'] = ['We don\'t like robots here'];
          $this->app->redirect($this->app->urlFor('home'), 403);
        }
      }
      $this->app->flash('errors', $errors);
    } else {
      $mail = new App\ContactMailer($_POST);
      $mail->set_template();
      $mail->set_headers();
      $mail->set_dkim();
      $mail->send_email();

      # Copy for user
      if(isset($_POST['checkbox_copy'])) {
        $mail = new App\ContactMailer($_POST);
        $mail->set_template();
        $mail->set_headers(true);
        $mail->set_dkim();
        $mail->send_email();
      }

      $this->app->flash('success', 'The mail has been sent successfully');
    }

    $this->app->redirect($this->app->urlFor('contact'));
  }
}
