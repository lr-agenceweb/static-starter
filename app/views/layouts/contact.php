<?php $_layout = 'default'; ?>

<div class="row">
  <?= $content; ?>

  <div class="medium-6 columns">
    <form action="<?= Slim\Slim::getInstance()->urlFor('contact'); ?>" method="post">
      <input type="text" name="name" />
      <input type="email" name="email" />
      <textarea name="message" class="autosize"></textarea>
      <input type="submit" value="submit" />
    </form>
  </div>
</div>
