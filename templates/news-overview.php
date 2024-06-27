<?php namespace ProcessWire; 

// Template file for pages using the “news-overview” template

?>

<article id="content" class="news">
  <h2 class="text-center pb-10"><?= _t("Latest News") ?></h2>
  
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
<?php 
// Get News
$page->children("sort=-date")->each(function($news) {
  ?>
  <a class="box" href="<?=$news->url?>">
    
    <div class="leading-8 mb-2">
      <span class="text-ms px-2 py-1"><?=$news->date?> JST</span>
    </div>
    
<?php if ($news->images->first()):
  $img = $news->images->first()->size(960, 333);
?>
    <img src="<?=$img->url?>" class="w-full mb-3" />
<?php endif; ?>

    <h2 class="px-1">
      <?=$news->title?>
    </h2>
    <div class="px-1">
      <?=$news->abstract?>
    </div>
  </a>
    
<?php
});
?>
  </div>
</article>
