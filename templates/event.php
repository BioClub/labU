<?php namespace ProcessWire; 

// Template file for pages using the “event” template

?>

<article id="content" class="pv5">
  <div class="f1">
    <?php if ($page->speaker_name) { echo $page->speaker_name; echo ": ";} ?><?=$page->title?>
  </div>
  <div class="f3 pb2 b">
    <?=$page->event_date?> JST
  </div>
<?php
  if ($page->featured_image):
    $featured_image = $page->featured_image->size(900, 600);
?>
    <div>
      <img src="<?=$featured_image->url?>" />
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
