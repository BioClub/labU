<?php namespace ProcessWire; 

// Template file for pages using the “event-overview” template

// # Future Events
// Future Events that have either "event_date" or "event_end_date" in the Future
// Future Events can also have an empty date, when the presenter has not fixed the date yet
// More about Selectors https://processwire.com/docs/selectors/
$future_events = $page->children("(event_date|event_end_date>today), (event_date=), sort=event_date");

?>

<article id="main">
  <h2 class="text-center pb-10"><?= _t("Upcoming Events") ?></h2>
    
  <div class="text-lg font-medium">
    <?php echo $page->content; ?>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-3">
<?php

$future_events->each(function($event) {

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
    <a class="box events" href="<?= $event->url ?>">
  
      <div class="leading-8 mb-2">
        <span class="text-ms bg-gray-200 rounded-full px-2 py-1">
<?php if($event->event_end_date): ?>
          <?=date("F j, Y", $event->getUnformatted("event_date"))?> - <?=date("F j, Y", $event->getUnformatted("event_end_date"))?>
<?php else: ?>
          <?=$event->event_date?> JST
<?php endif; ?>
        
        </span>
      </div>
  
<?php if ($event->images->first()):
  $img = $event->images->first()->size(1000, 333);
?>
      <img src="<?=$img->url?>" class="w-full mb-3" />
<?php endif; ?>
  
      <h2 class="px-1">
        <?php if ($event->speaker_name) { echo $event->speaker_name; echo ": ";} ?><?=$event->title?>
      
      </h2>
      <div class="leading-8 my-2">
        <span class="text-ms bg-gray-200 rounded-full ml-1 px-2 py-1">BioClub&nbsp;Tokyo</span>
      </div>
      <div class="px-1">
        <?=$event->event_abstract?>
      </div>
    </a>

<?php
});
?>
  </div>
  
  <h2 class="text-center py-10"><?= _t("Recent Events") ?></h2>
  
  <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
<?php 
// Past Events
$page->children("event_date<today, sort=-event_date")->each(function($event) {
  ?>
  <a class="box events" href="<?=$event->url?>">
    
    <div class="leading-8 mb-2">
      <span class="text-ms bg-gray-200 rounded-full px-2 py-1"><?=$event->event_date?> JST</span>
    </div>
    
<?php if ($event->images->first()):
  $img = $event->images->first()->size(1000, 333);
?>
    <img src="<?=$img->url?>" class="w-full mb-3" />
<?php endif; ?>

 
    
    <h2 class="px-1">
      <?php if ($event->speaker_name) { echo $event->speaker_name; echo ": ";} ?><?=$event->title?>
    </h2>
    <div class="leading-8 my-2">
      <span class="text-ms bg-gray-200 rounded-full ml-1 px-2 py-1">BioClub&nbsp;Tokyo</span>
<?php /* 
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
*/ ?>
    </div>
    <div class="px-1">
      <?=$event->event_abstract?>
    </div>
  </a>
    
<?php
});
?>
  </div>
</article>
