<?php namespace ProcessWire; 

// Template file for pages using the “inventory” template

?>

<article id="content" class="pv5">
  <div class="f1 i">
    Inventory
  </div>
  

  <div id="byline" class="pv5 moon-gray">
    Author: <?php $createdUser = $page->createdUser; echo $createdUser->user_display_name; ?><br />
    Published: <?php echo date('l jS \of F Y h:i:s A', $page->published); ?>, 
    Last Update: <?php echo date('l jS \of F Y h:i:s A', $page->modified); ?>
    <?php if($page->editable()): ?><a href='<?php echo $page->editUrl(); ?>'>Edit</a></p><?php endif; ?>
  </div>
</article>
