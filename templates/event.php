<?php namespace ProcessWire; 

// Template file for pages using the “event” template

?>

<article id="content" class="">
<?php if ($page->speaker_name): ?>
  <h2 class="italic"><?=$page->speaker_name?>: </h2>
<?php endif; ?>
<?php if ($page->title): ?>
  <h2><?=$page->title?></h2>
<?php endif; ?>
  <span class="leading-8 mb-2">
    <span class="text-ms bg-gray-200 rounded-full px-2 py-1"><?=$page->event_date?> JST</span>
  </span>
  <a 
    class="text-ms bg-green-500 hover:bg-green-600 active:bg-green-700 text-white rounded-full ml-1 px-2 py-1"    
    href="https://maps.app.goo.gl/xGpo5acrHNpescaX8"
  >BioClub&nbsp;Tokyo</a>

<?php
  if ($page->images->first()):
    $featured_image = $page->images->first();
?>
  <div class="pb-4">
    <img src="<?=$featured_image->url?>" />
<?php if ($featured_image->description): ?>
    <div class="text-sm p-1 bg-black text-white"><?=$featured_image->description?></div>
  </div>
<?php endif; ?>
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

  <div id="byline" class="py-8 text-xs text-gray-300">
    Author: <?php $createdUser = $page->createdUser; echo $createdUser->user_display_name; ?>, 
    Published: <?php echo date('l jS \of F Y h:i:s A', $page->published); ?>, 
    Last Update: <?php echo date('l jS \of F Y h:i:s A', $page->modified); ?>
    <?php if($page->editable()): ?><a href='<?php echo $page->editUrl(); ?>'>Edit</a></p><?php endif; ?>
  </div>
</article>
