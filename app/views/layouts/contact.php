<?php $_layout = 'default'; ?>

<div class="row">
  <?= $content; ?>

  <div class="medium-6 columns">
    <form action="<?= Slim\Slim::getInstance()->urlFor('contact'); ?>" method="post" id="contact_form" data-abide novalidate>

      <div data-abide-error class="alert callout" style="display: none;">
        <p><i class="fa fa-exclamation-triangle"></i> Des erreurs ont empêchées le formulaire d'être correctement soumis. </p>
      </div>

      <input type="text" name="nickname" id="nickname" style="display:none">

      <label for="fullname">Nom
        <input type="text" name="fullname" placeholder="Votre nom (*)" id="fullname" required />
        <span class="form-error"> N'oubliez pas de renseigner votre nom ;) </span>
      </label>

      <label for="email">Email
        <input type="email" name="email" placeholder="Votre email (*)" id="email" required pattern="email" />
        <span class="form-error"> N'oubliez pas de renseigner un email valide ;) </span>
      </label>

      <label for="message">Message
        <textarea name="message" class="autosize" placeholder="Votre message (*)" id="message" required ></textarea>
        <span class="form-error"> N'oubliez pas de renseigner votre message ;) </span>
      </label>

      <label for="checkbox_copy" class="right inline copy">Recevoir une copie de ce mail
        <input id="checkbox_copy" type="checkbox" name="checkbox_copy" checked value="1">
      </label>

      <input type="submit" value="Envoyer" class="button" />

      <p class="text-right">
        <small> * indique un champ requis </small>
      </p>
    </form>
  </div>
</div>
