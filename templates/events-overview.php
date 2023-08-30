<?php namespace ProcessWire; 

// Template file for pages using the “event-overview” template

?>

<article id="content" class="pv5 ">

  <h1 class="f3 i">Upcoming Events</h1>
  
  <div>
<?php 

$page->children()->each(function($event) {

  // Featured Image
  $preview_image = false;
  if ($event->featured_image) {
    $preview_image = $event->featured_image->size(300, 200);
  }

  $event_date = str_replace(
  ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
  ['月', '火', '水', '木', '金', '土', '日'],
  $event->event_date
  );
  ?>
    <a href="<?=$event->url?>">
    <h2 class="f1">
      <?php if ($event->speaker_name) { echo $event->speaker_name; echo ": ";} ?><?=$event->title?>
    </h2>
    <div>
      <div><?=$event->event_date?></div>
    </div>
<?php if ($preview_image): ?>
    <div>
      <img src="<?=$preview_image->url?>" />
    </div>
<?php endif; ?>
    <div><?=$event->event_abstract?></div>
    </a>
    
<?php
});
?>
  </div>
</article>
