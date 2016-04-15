<header class="top-bar">
  <div class="top-bar-left">
    <ul class="menu">
      <li>
        <a href="<?= route('home'); ?>"><?= SITE_TITLE; ?></a>
      </li>
    </ul>
  </div>

  <div class="top-bar-right">
    <ul class="menu">
      <?php if(locale() == 'fr'): ?>

      <li class="<?= get_current_menu_item($page->menu, 'home'); ?>">
        <a href="<?= route('home'); ?>">Accueil</a>
      </li>
      <li class="<?= get_current_menu_item($page->menu, 'contact'); ?>">
        <a href="<?= route('contact'); ?>">Me contacter</a>
      </li>
      <li class="<?= get_current_menu_item($page->menu, 'legal-notices'); ?>">
        <a href="<?= route('mentions-legales'); ?>">Mentions légales</a>
      </li>

      <?php else: ?>

      <li class="<?= get_current_menu_item($page->menu, 'home'); ?>">
        <a href="<?= route('en'); ?>">Home</a>
      </li>
      <li class="<?= get_current_menu_item($page->menu, 'contact'); ?>">
        <a href="<?= route('en.contact'); ?>">Contact me</a>
      </li>
      <li class="<?= get_current_menu_item($page->menu, 'legal-notices'); ?>">
        <a href="<?= route('en.legal-notices'); ?>">Legal Notices</a>
      </li>

      <?php endif; ?>
    </ul>
  </div>
</header>