<?php namespace ProcessWire; 

// Template file for pages using the “project” template

?>

<article id="content" class="">
  <div class="text-4xl pb-4 text-center"><?=$page->title?></div>
  <?php showFirstImage($page); ?>
  <div class="text-lg">
    <?=$page->content?>
  </div>

<?php 
// Show associates Project Members
if ($page->user_reference->count > 0) {
?>
  <div class="text-2xl text-center">Project Membexxrs:</div>
<?php $page->user_reference->each(function($u) { ?>
  <a href="" class="rounded-full bg-gray-200 px-2 py-1"><?=$u->user_display_name?></a>
<?php
  });
}
?>
  
</article>
