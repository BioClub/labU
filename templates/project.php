<?php namespace ProcessWire; 

// Template file for pages using the “project” template

?>

<article id="main" class="">
  <div class="text-4xl font-medium pb-4 text-center"><?=$page->title?></div>
  <?php showFirstImage($page); ?>
  <div id="content" class="text-lg">
    <?=$page->content?>
  </div>

<?php 
// Show associates Project Members
if ($page->user_reference->count > 0) {
?>
  <div class="my-4 text-center">
    <div class="text-2xl text-center">Project Members:</div>
    <div class="my-4">
<?php 



$page->user_reference->each(function($u) {
  $m = wire('pages')->get('template=members-overview');  // $page not defined in functions: https://processwire.com/talk/topic/13776-why-is-pages-undefined/
?>
    <a href="<?=$m->url.$u->user_nice_url?>" class="rounded-full bg-gray-200 px-2 py-1"><?=$u->user_display_name?></a>
<?php 
});
?>  
    </div>
  </div>
<?php
}
?>
  
</article>
