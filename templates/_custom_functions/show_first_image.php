<?php namespace ProcessWire;

// Custom Functions should only be included once, or else a "Cannot redeclare function" error is triggered when invoking wire404() [see members-overview.php]


// Shows First Image, if it exists
function showFirstImage($page) {
  $img = false;
  // Get First Image
  if ($page->images->first()) {
    $img = $page->images->first()->size(1000, 333);
  }
  if ($img) {
?>
    <img class="mx-auto py-8" src="<?=$img->url?>" />
<?php 
  }
}

?>
