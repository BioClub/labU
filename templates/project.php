<?php namespace ProcessWire; 

// Template file for pages using the “project” template

$img = false;
if ($page->images->first()) {
  $img = $page->images->first()->size(1000, 333);
}



?>

<article id="content" class="">
  <div class="text-4xl pb-4 text-center"><?=$page->title?></div>
<?php if ($img): ?>
  <img class="mx-auto" src="<?=$img->url?>" />
<?php endif; ?>
  <div class="text-2xl text-center">Project Description:</div>
  <div class="text-lg"><?=$page->content?></div>
  <div class="text-2xl text-center">Project Members:</div>
  
<?php
$page->user_reference->each(function($u) {
?>
  <a href="" class="rounded-full bg-gray-200 px-2 py-1"><?=$u->user_display_name?></a>
<?php
});
?>
  
</article>
