<?php

namespace App;

class ContactMailer {

  private $tmpl;
  private $mail;
  private $datas;

  public function __construct($datas) {
    $this->datas = $datas;
  }

  public function set_template() {
    $form_data = array(
      'title' => SITE_TITLE,
      'content' => $this->datas['message'],
      'sender' => $this->datas['fullname'],
      'url' => SITE_URL
    );
    $this->tmpl = new EmailTemplate(mailers_path . '/contact_mailer.php', $form_data);
  }

  public function set_headers($copy = false) {
    # Configuration SMTP
    $this->mail = new \PHPMailer();
    $this->mail->isSMTP();
    $this->mail->Host = SMTP_HOST;
    $this->mail->SMTPAuth = true;
    $this->mail->Username = SMTP_USERNAME;
    $this->mail->Password = SMTP_PASSWORD;
    $this->mail->SMTPSecure = 'tls';
    $this->mail->Port = SMTP_PORT;

    # Set content
    $this->mail->CharSet = 'UTF-8';
    $this->mail->Subject = $copy ? MAIL_SUBJECT_COPY : MAIL_SUBJECT;
    $this->mail->Body    = $this->tmpl->render();
    $this->mail->AltBody = strip_tags($this->datas['message']);
    $this->mail->isHTML(true);
    $this->mail->setLanguage('fr');

    if($copy) {
      $this->mail->setFrom(ADMIN_EMAIL, ADMIN_FULLNAME);
      $this->mail->addAddress(strip_tags($this->datas['email']), strip_tags($this->datas['fullname']));
      $this->mail->addReplyTo(ADMIN_EMAIL, ADMIN_FULLNAME);
    }
    else {
      $this->mail->setFrom(strip_tags($this->datas['email']), strip_tags($this->datas['fullname']));
      $this->mail->addAddress(ADMIN_EMAIL, ADMIN_FULLNAME);
      $this->mail->addReplyTo(strip_tags($this->datas['email']), strip_tags($this->datas['fullname']));
    }
  }

  # DKIM Signature
  public function set_dkim() {
    $this->mail->DKIM_domain = DKIM_DOMAIN;
    $this->mail->DKIM_private = DKIM_KEY_PATH;
    $this->mail->DKIM_selector = DKIM_SELECTOR;
    $this->mail->DKIM_passphrase = '';
    $this->mail->DKIM_identity = $this->mail->From;
  }

  # Send Email
  public function send_email() {
    return $this->mail->send();
  }

  public function feedback($feedback, $app) {
    $data = [];
    if($feedback) {
      if(is_ajax()){
        $data['success'] = true;
        $data['feedback'] = FEEDBACK_SUCCESS;
        echo json_encode($data);
        die();
      }
      $app->flash('success', FEEDBACK_SUCCESS);
    } else {
      if(is_ajax()){
        $data['success'] = false;
        $data['feedback'] = FEEDBACK_ERROR;
        echo json_encode($data);
        die();
      }
      $app->flash('errors', [FEEDBACK_ERROR]);
    }
  }
}
