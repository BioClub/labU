<?php namespace ProcessWire; 

// Template file for pages using the “event-overview” template

?>

<article id="content" class="pv5 ">
  <div class="f3 i pb3">Upcoming Events</div>
  <div>
<?php
// Future Events
$page->children("event_date>today, sort=date")->each(function($event) {

  // Featured Image
  $preview_image = false;
  if ($event->images->first()) {
    $preview_image = $event->images->first()->size(300, 200);
  }

  $event_date = str_replace(
  ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
  ['月', '火', '水', '木', '金', '土', '日'],
  $event->event_date
  );
  
  
  ?>
    <a href="<?=$event->url?>" class="no-underline black db outline pa2 mb4" style="box-shadow: 10px 10px 0px black;">
    <div class="f1">
      <?php if ($event->speaker_name) { echo $event->speaker_name; echo ": ";} ?><?=$event->title?>
    </div>
    <div class="f3 pb2 b">
      <?=$event->event_date?> JST
    </div>
<?php if ($preview_image): ?>
    <div>
      <img src="<?=$preview_image->url?>" />
    </div>
<?php endif; ?>
    <div>
      <?=$event->event_abstract?>
    </div>
    </a>
    
<?php
});
?>
  </div>
  <div class="f3 i pb3">Past Events</div>
  <div>
<?php 
// Past Events
$page->children("event_date<today, sort=date")->each(function($event) {


  ?>
    <a href="<?=$event->url?>" class="link black db outline pa2 mb4" style="box-shadow: 10px 10px 0px black;">
    <div class="f1">
      <?php if ($event->speaker_name) { echo $event->speaker_name; echo ": ";} ?><?=$event->title?>
    </div>
    <div class="f3 pb2 b">
      <?=$event->event_date?> JST
    </div>
    <div>
      <?=$event->event_abstract?>
    </div>
    </a>
    
<?php
});
?>
  </div>
</article>
