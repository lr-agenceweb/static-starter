<?php $_layout = 'default'; ?>

<div class="row">
  <?= $content; ?>

  <div class="medium-6 columns">
    <form action="<?= Slim\Slim::getInstance()->urlFor('contact'); ?>" method="post" id="contact_form" data-abide novalidate>

      <div data-abide-error class="alert callout" style="display: none;">
        <p><i class="fa fa-exclamation-triangle"></i> <?= App\I18N::t('mailer.errors.global'); ?> </p>
      </div>

      <input type="text" name="nickname" id="nickname" style="display:none">

      <label for="fullname"> <?= App\I18N::t('mailer.label.fullname'); ?>
        <input type="text" name="fullname" placeholder="<?= App\I18N::t('mailer.placeholder.fullname'); ?>" id="fullname" required />
        <span class="form-error"> <?= App\I18N::t('mailer.errors.fullname'); ?> </span>
      </label>

      <label for="email">Email
        <input type="email" name="email" placeholder="<?= App\I18N::t('mailer.placeholder.email'); ?>" id="email" required pattern="email" />
        <span class="form-error"> <?= App\I18N::t('mailer.errors.email'); ?> </span>
      </label>

      <label for="message"> <?= App\I18N::t('mailer.label.message'); ?>
        <textarea name="message" class="autosize" placeholder="<?= App\I18N::t('mailer.placeholder.message'); ?>" id="message" required ></textarea>
        <span class="form-error"> <?= App\I18N::t('mailer.errors.message'); ?> </span>
      </label>

      <label for="checkbox_copy" class="right inline copy"><?= App\I18N::t('mailer.label.copy'); ?>
        <input id="checkbox_copy" type="checkbox" name="checkbox_copy" checked value="1">
      </label>

      <input type="submit" value="<?= App\I18N::t('mailer.label.submit'); ?>" class="button" />

      <p class="text-right">
        <small> <?= App\I18N::t('mailer.label.required'); ?> </small>
      </p>
    </form>
  </div>
</div>
