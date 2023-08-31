<?php namespace ProcessWire; 

// Template file for pages using the “event” template

?>

<article id="content" class="pv5">
<?php if ($page->speaker_name): ?>
  <div class="f1 i">
    <?=$page->speaker_name?>:
  </div>
<?php endif; ?>
<?php if ($page->title): ?>
  <div class="f1">
    <?=$page->title?>
  </div>
<?php endif; ?>
  <div class="f2 pv4">
    <?=$page->event_date?> JST
  </div>
<?php
  if ($page->featured_image):
    $featured_image = $page->featured_image->size(900, 600);
    //print_r($page->featured_image);
?>
  <div class="tl">
    <img src="<?=$featured_image->url?>" />
    <figcaption class="f6 silver"><?=$page->featured_image->description?></figcaption>
  </div>
<?php endif; ?>
  <div class="lh-copy">
<?php echo $page->content; ?>
  </div>
<?php
/*

  <div>Zoom: <a href="https://zoom.bioclub.tokyo">https://zoom.bioclub.tokyo</a></div>
  
  <div>Place: <a href="https://goo.gl/maps/4Xf5Ep7AFbbmt7uAA">BioClub Tokyo, FabCafe MTRL 2F</a></div>
  <div>Fee: 無料</div>
*/  
  
?>

  <div id="byline" class="pb2 moon-gray">
    Author: <?php $createdUser = $page->createdUser; echo $createdUser->user_display_name; ?><br />
    Published: <?php echo date('l jS \of F Y h:i:s A', $page->published); ?>, 
    Last Update: <?php echo date('l jS \of F Y h:i:s A', $page->modified); ?>
    <?php if($page->editable()): ?><a href='<?php echo $page->editUrl(); ?>'>Edit</a></p><?php endif; ?>
  </div>
</article>
