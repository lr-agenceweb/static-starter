<?php $_layout = 'default'; ?>

<div class="callout large">
  <div class="row column text-center">
    <h1><?= $page->header_title; ?></h1>
    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt obcaecati molestiae necessitatibus</p>
  </div>
</div>

<div class="row">
  <div class="medium-6 columns medium-push-6">
    <img class="thumbnail" src="http://placehold.it/750x350">
  </div>

  <div class="medium-6 columns medium-pull-6">
    <?= $content; ?>
  </div>
</div>
