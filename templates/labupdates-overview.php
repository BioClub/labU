<?php namespace ProcessWire;

// Template file for pages using the “labupdates-overview” template

?>

<article id="main" class="">
  <h2 class="text-center pb-10"><?= $page->title ?></h2>

  <div class="grid grid-cols-1">
<?php
// Get Lab Updates
$page->children("sort=-date")->each(function($news) {
?>
  <div>
    <div class=""><?=$news->date?> JST</div>

<?php if ($news->images->first()):
  $img = $news->images->first()->size(960, 333);
?>
    <a href="<?=$news->url?>"><img src="<?=$img->url?>" class="w-full mb-3" /></a>
<?php endif; ?>

    <a href="<?=$news->url?>"><h4><?=$news->title?></h4></a>
    <div class="px-1">
      <?=$news->content?>
    </div>
  </div>
<?php
});
?>
  </div>
</article>
