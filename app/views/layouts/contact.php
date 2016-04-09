<?php $_layout = 'default'; ?>

<div class="row">
  <?= $content; ?>

  <div class="medium-6 columns">
    <form action="<?= Slim\Slim::getInstance()->urlFor('contact'); ?>" method="post">
      <input type="text" name="name" placeholder="Votre nom (*)" />
      <input type="email" name="email" placeholder="Votre email (*)" />
      <textarea name="message" class="autosize" placeholder="Votre message (*)"></textarea>
      <input type="submit" value="Envoyer" class="button" />
    </form>
  </div>
</div>
