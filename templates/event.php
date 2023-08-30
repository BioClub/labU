<?php namespace ProcessWire; 

// Template file for pages using the “event” template

?>

<article id="content" class="pv5">
  <h1 class="f1">
    <?php if ($page->speaker_name) { echo $page->speaker_name; echo ": ";} ?><?=$page->title?>
  </h1>
<?php
  // Featured Image
  $featured_image = false;
  if ($page->featured_image) {
    $featured_image = $page->featured_image->size(900, 600);
  }
?>
  <div>
    <img src="<?=$featured_image->url?>" />
  </div>
  
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

  <div id="byline" class="pb2">
    Author: <?php $createdUser = $page->createdUser; echo $createdUser->user_display_name; ?><br />
    Published: <?php echo date('l jS \of F Y h:i:s A', $page->published); ?>, 
    Last Update: <?php echo date('l jS \of F Y h:i:s A', $page->modified); ?>
    <?php if($page->editable()): ?><a href='<?php echo $page->editUrl(); ?>'>Edit</a></p><?php endif; ?>
  </div>
</article>
