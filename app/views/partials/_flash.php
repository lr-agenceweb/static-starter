<?php
  $flash = \Slim\Slim::getInstance()->view()->getData('flash');

  if(!empty($flash['errors'])) {
    foreach ($flash['errors'] as $name => $error) {
      echo $error;
    }
  }

  if(isset($flash['success'])) {
    echo $flash['success'];
  }
?>
