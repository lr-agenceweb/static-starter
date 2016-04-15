<div itemscope itemtype="http://schema.org/Article">
  <meta itemprop='name headline' content="<?= $page->title; ?>">

  <meta itemprop='text' content="<?= strip_tags_and_truncate($page->description); ?>">
  <meta itemprop='url mainEntityOfPage' content="<?= get_current_url(); ?>">
  <meta itemprop='creator' content="<?= ADMIN_FULLNAME; ?>">
  <meta itemprop='datePublished' content="<?= $page->created_at; ?>">
  <meta itemprop='dateModified' content="<?= $page->updated_at; ?>">

  <div itemprop='author' itemscope itemtype='http://schema.org/Person'>
    <meta itemprop='name' content="<?= ADMIN_FULLNAME; ?>">
  </div>

  <div itemprop='publisher' itemscope itemtype='http://schema.org/Organization'>
    <meta itemprop='name' content="<?= SITE_TITLE; ?>">
    <meta itemprop='url' content="<?= get_base_url(); ?>">
</div>