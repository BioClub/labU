<?php namespace ProcessWire; 

// Template file for pages using the “event-overview” template

?>

<article id="content" class="">
  <h2 class="text-center">Upcoming Events</h2>
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
    <a href="<?=$event->url?>" class="" style="">
    <div class="">
      <?php if ($event->speaker_name) { echo $event->speaker_name; echo ": ";} ?><?=$event->title?>
    </div>
    <div class="">
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
  <h2 class="text-center pb-5">Recent Events</h2>
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
<?php 
// Past Events
$page->children("event_date<today, sort=date")->each(function($event) {
  ?>
  <div class="box">
    
    <div class="leading-8 mb-2">
      <span class="text-ms bg-gray-200 rounded-full px-2 py-1"><?=$event->event_date?> JST</span>
    </div>
    
<?php if ($event->images->first()):
  $img = $event->images->first()->size(1000, 333);
?>
    <img src="<?=$img->url?>" class="w-full mb-3" />
<?php endif; ?>

 
    
    <h2>
      <a href="<?=$event->url?>">
      <?php if ($event->speaker_name) { echo $event->speaker_name; echo ": ";} ?><?=$event->title?>
      </a>
    </h2>
    <div class="leading-8 my-2">
      <a class="text-ms bg-green-500 hover:bg-green-600 active:bg-green-700 text-white rounded-full ml-1 px-2 py-1" href="">BioClub&nbsp;Tokyo</a>
      <a 
        class="text-ms bg-blue-500 hover:bg-blue-600 active:bg-blue-700 text-white rounded-full ml-1 px-2 py-1"    
        href="https://zoom.bioclub.tokyo"
      >Zoom</a>
      <a 
        class="text-ms bg-red-500 hover:bg-red-600 active:bg-red-700 text-white rounded-full ml-1 px-2 py-1"    
        href="https://zoom.bioclub.tokyo"
      >Lecture</a>
<a 
        class="text-ms bg-red-500 hover:bg-red-600 active:bg-red-700 text-white rounded-full ml-1 px-2 py-1"    
        href="https://zoom.bioclub.tokyo"
      >Workshop</a>

    </div>
    <div>
      <a href="<?=$event->url?>" class="">
        <?=$event->event_abstract?>
      </a>
    </div>
    <!--</a>-->
  </div>
    
<?php
});
?>
  </div>
</article>
