<?php namespace ProcessWire; 

// Template file for pages using the “news” template

?>

<article id="content" class="font-medium max-w-4xl mx-auto">
  <h1 class="mb-8 text-center"><?=$page->title?></h1>
  <div class="text-xl"><?= $page->event_date ?> JST</div>
<?php
  if ($page->images->first()):
    $img = $page->images->first();
?>
  <div class="py-4">
    <img src="<?=$img->url?>" />
<?php if ($img->description): ?>
    <div class="text-sm p-1"><?=$img->description?></div>
<?php endif; ?>
  </div>
<?php endif; ?>
  
  <div class="text-lg">
<?php echo $page->content; ?>
  </div>
</article>
