<?php namespace ProcessWire; 

// Template file for pages using the “inventory-item” template




?>

<article id="main" class="event font-medium text-xl max-w-screen-md mx-auto">
  <h1 class="mb-8 text-center">
    <?=$page->title?>
    (<?=$page->inventory_id?>)
  </h1>
  <div class="inventory_item_grid">
    <div>Contact Person:</div>
    <div><a href=""><?=$page->user_reference->first()->user_display_name?></a></div>
    <div class="">Usage:</div>
    <div><span class="pill-ok"><?=$page->inventory_usage->title?></span></div>
    <div class="">Description:</div>
    <div><?=$page->content?>vrevrvrv vrevrvrv vrevrvrv vrevrvrv vrevrvrv vrevrvrv vrevrvrv vrevrvrv vrevrvrv vrevrvrv </div>
    <div class="">Image:</div>
    <div>
<?php if ($page->images->first()):
    $img = $page->images->first();
?>
      <img src="<?=$img->url?>" />
      <figcaption class=""><?=$img->description?></figcaption>
       
<?php endif; ?>
    </div>
  </div>  
</article>
