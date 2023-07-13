<?php namespace ProcessWire; 

// Template file for pages using the “event-overview” template

?>

<article id="content" class="pv5 ">

  <h1 class="f1">
    <?php echo $page->title; ?>
  </h1>
  <div>
<?php 

$page->children()->each(function($event) { 
  $preview_image = $event->featured_image->size(300, 200);
  $event_date = str_replace(
  ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
  ['月', '火', '水', '木', '金', '土', '日'],
  $event->event_date
  );
  ?>
    
    <h2><?=$event->speaker_name?>: <?=$event->title?></h2>
    <div>
      <div>Date: <?=$event_date?></div>
      <div>Time: <?=$event->event_time?></div>
      <div>Place: <a href="https://goo.gl/maps/4Xf5Ep7AFbbmt7uAA">BioClub Tokyo, FabCafe MTRL 2F</a></div>
      <div>Fee: 無料</div>
      <div>Zoom: <a href="https://zoom.bioclub.tokyo">https://zoom.bioclub.tokyo</a></div>
    </div>
    <div>
      <img src="<?=$preview_image->url?>" />
    </div>
    <div>
      
    </div>
    
<?php
});
?>
  </div>
</article>
