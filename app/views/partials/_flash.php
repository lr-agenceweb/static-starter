<?php $flash = \Slim\Slim::getInstance()->view()->getData('flash'); ?>

<?php if(!empty($flash['errors'])): ?>
  <div class="callout small alert-box warning" data-closable>
    <?php foreach ($flash['errors'] as $name => $error): ?>
      <?= $error . '<br />'; ?>
    <?php endforeach; ?>
    <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>

<?php if(isset($flash['success'])): ?>
  <div class="callout small alert-box success" data-closable>
    <?= $flash['success']; ?>
    <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif ?>
