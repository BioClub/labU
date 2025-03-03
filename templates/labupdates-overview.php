<?php namespace ProcessWire;

// Template file for pages using the “labupdates-overview” template

?>

<article id="main">
  <h2 class="text-center pb-10"><?= $page->title ?></h2>

  <div class="grid grid-cols-1">
<?php
// Get Lab Updates
$page->children("sort=-date")->each(function($update) {
?>
  <div id="content">

<?php if ($update->images->first()):
  $img = $update->images->first()->size(960, 333);
?>
    <a href="<?= $update->url ?>"><img src="<?= $img->url ?>" class="w-full mb-3" /></a>
<?php endif; ?>
    <div class=""><?= $update->date ?> JST</div>
    <a href="<?= $update->url ?>"><h4><?= $update->title ?></h4></a>
    <div class="px-1">
      <?= $update->content ?>
    </div>
  </div>
<?php
});
?>
  </div>
</article>
