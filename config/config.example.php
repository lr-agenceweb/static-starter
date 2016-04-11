<?php

$application_fr_yml = __DIR__ . '/application.fr.yml';
$mailing_yml = __DIR__ . '/mailing.yml';

$application = Spyc::YAMLLoad($application_fr_yml);
$mailing = Spyc::YAMLLoad($mailing_yml);

// Site informations
define('SITE_TITLE', $application['site']['title']);
define('SITE_SUBTITLE', $application['site']['subtitle']);
define('SITE_URL', $application['site']['url']);

// Administrator informations
define('ADMIN_FIRSTNAME', $application['administrator']['firstname']);
define('ADMIN_LASTNAME', $application['administrator']['lastname']);
define('ADMIN_FULLNAME', ADMIN_FIRSTNAME . ' ' . ADMIN_LASTNAME);
define('ADMIN_EMAIL', $application['administrator']['email']);

// OVH Mail serveur
define('SMTP_HOST', $mailing['mailing']['host']);
define('SMTP_USERNAME', $mailing['mailing']['username']);
define('SMTP_PASSWORD', $mailing['mailing']['password']);
define('SMTP_PORT', $mailing['mailing']['port']);

// DKIM Signature
define('DKIM_KEY_PATH', __DIR__ . '/dkim.private.key');
define('DKIM_DOMAIN', $mailing['dkim']['domain']);
define('DKIM_SELECTOR', $mailing['dkim']['selector']);

// Mail
define('MAIL_SUBJECT', '');
define('MAIL_SUBJECT_COPY', '');

// I18n
define("DEFAULT_LOCALE", locale());
define("DIR_LOCALE", dirname(__DIR__) . "/config/locales");

// Feedback messages
define('FEEDBACK_WRONG_FIELDS', '');
define('FEEDBACK_SUCCESS', '');
define('FEEDBACK_ERROR', '');

// Date
date_default_timezone_set('Europe/Paris');

?>