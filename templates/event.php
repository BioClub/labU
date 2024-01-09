<?php namespace ProcessWire; 

// Template file for pages using the “event” template

?>

<article id="content" class="event font-medium max-w-screen-md mx-auto">
  <h1 class="mb-8 text-center">
    <?=$page->title?>
  </h1>

  <?php /* Info Box */ ?>
  <div class="mb-8 box text-xl leading-8">
    <?php if ($page->speaker_name): ?>
    <div>
      <?= __("Speaker:") ?> <?= $page->speaker_name ?>
    <div>
    <?php endif; ?>
    <div><?= __("Date:") ?> <?= $page->event_date ?> JST</div>
    <div><?= __("Location:") ?>
      <a href="https://maps.app.goo.gl/xGpo5acrHNpescaX8">BioClub&nbsp;Tokyo</a>
      &
      <a href="https://zoom.bioclub.tokyo">https://zoom.bioclub.tokyo</a>
    </div>
    <!--
    <div>This is a <em>Free Event</em></div>
    <div>Language: English & Japanese</div>
      -->
  </div>

  <div class="text-lg ">
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
    <div class="">
  <?php echo $page->content; ?>
    </div>
  
  </div>
  
  <!--
  <div class="box">
    <h5>Related</h5>
    <div><a href="jnnkh">Testing Blog Post by refnwrf</a></div>
    <div><a href="jnnkh">Images</a></div>
    <div><a href="jnnkh">More Images</a></div>
  </div>
 -->
<!--
  <div id="byline" class="py-8 text-xs text-gray-300">
    Author: <?php $createdUser = $page->createdUser; echo $createdUser->user_display_name; ?>, 
    Published: <?php echo date('l jS \of F Y h:i:s A', $page->published); ?>, 
    Last Update: <?php echo date('l jS \of F Y h:i:s A', $page->modified); ?>
    <?php if($page->editable()): ?><a href='<?php echo $page->editUrl(); ?>'>Edit</a></p><?php endif; ?>
  </div>
-->
</article>
