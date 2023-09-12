<?php namespace ProcessWire; 

// Template file for pages using the “inventory-item” template




?>

<article id="content" class="pv5">
  <div class="f1">
    <?=$page->title?>
  </div>
  <div class="f3 lh-copy">
    <?=$page->content?>
  </div>
  <div class="f4 lh-copy">
    <?=$page->user_reference->first()->user_display_name?>
  </div>
  <div class="f4 lh-copy">
    <?=$page->inventory_usage->title?>
  </div>
  
  
  
<?php if ($page->images->first()):
    $img = $page->images->first();
?>
    <div class="tl">
      <img src="<?=$img->url?>" />
      <figcaption class="f6 silver"><?=$img->description?></figcaption>
    </div>
<?php endif; ?>
</article>
