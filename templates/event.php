<?php namespace ProcessWire; 

// Template file for pages using the “event” template

?>

<article id="content" class="event font-medium max-w-screen-md mx-auto">
  <h1 class="mb-8 text-center">
    <?=$page->title?>
  </h1>

  <?php /* Info Box */ ?>
  <div class="pb-8 box text-xl leading-8">
<?php if ($page->speaker_name): ?>
    <div><?= __("Speaker:") ?> <?= $page->speaker_name ?><div>
<?php endif; ?>
    <div><?= __("Date:") ?> <?= $page->event_date ?> JST</div>
    <div><?= __("Location:") ?>
      <a href="https://maps.app.goo.gl/xGpo5acrHNpescaX8">BioClub&nbsp;Tokyo</a>
      &
      <a href="https://zoom.bioclub.tokyo">https://zoom.bioclub.tokyo</a>
    </div>
  </div>

  <div class="text-lg">
    <div class="">
  <?php echo $page->content; ?>
    </div>
  </div>
  
</article>
