<?php namespace ProcessWire;

// Template file for pages using the “event” template

?>

<article id="main" class="font-medium max-w-screen-md mx-auto">
  <h1 class="mb-8 text-center">
    <?=$page->title?>
  </h1>

  <?php /* Info Box */ ?>
  <div id="content" class="pb-8 box text-xl leading-8">
<?php if ($page->speaker_name): ?>
    <div><?= __("Speaker:") ?> <?= $page->speaker_name ?></div>
<?php endif; ?>
    <div><?= __("Date:") ?> <?= $page->event_date ?> JST</div>
    <div><?= __("Location:") ?>
      <?php
      $location = $page->event_location->title;
      $location = str_replace('BioClub Tokyo', '<a href="https://maps.app.goo.gl/xGpo5acrHNpescaX8">BioClub Tokyo</a>', $location);
      $location = str_replace('Zoom', '<a href="https://zoom.bioclub.tokyo">Zoom</a>', $location);
      echo $location;
      ?>

    </div>
  </div>
  <div id="content" class="text-lg">
    <?php echo $page->content; ?>
  </div>
</article>
