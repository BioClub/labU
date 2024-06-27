<?php namespace ProcessWire; 

// Template file for pages using the “news” template

?>

<article id="content" class="font-medium max-w-4xl mx-auto">
  <h1 class="mb-8 text-center"><?=$page->title?></h1>
  <div class="text-sm pb-4">
    <span class="rounded-full bg-slate-100 border-solid border border-slate-500 py-1 px-3">
    <?= _t("Posted by:") ?> <?=$page->createdUser->user_display_name?>
    <?= _t("on") ?> <?=$page->date?> JST
    </span>
  </div>
<?php /*
  if ($page->images->first()):
    $img = $page->images->first();
?>
  <div class="py-4">
    <img src="<?=$img->url?>" />
<?php if ($img->description): ?>
    <div class="text-sm p-1"><?=$img->description?></div>
<?php endif; ?>
  </div>
<?php endif; 
 */?>
  
  <div class="text-lg">
<?php echo $page->content; ?>
  </div>
</article>
