<?php if(count(AVAILABLE_LOCALES) > 1): ?>
<nav>
  <ul class="menu align-right">
    <li class="<?= locale() == 'en' ? 'active' : '' ?>">
      <a href="<?= $page->slug['en']; ?>"> <?= \App\I18N::t('locales.en'); ?> </a>
    </li>
    <li class="<?= locale() == 'fr' ? 'active' : '' ?>">
      <a href="<?= $page->slug['fr']; ?>"> <?= \App\I18N::t('locales.fr'); ?> </a>
    </li>
  </ul>
</nav>
<?php endif; ?>