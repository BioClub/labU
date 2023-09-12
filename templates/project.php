<?php namespace ProcessWire; 

// Template file for pages using the “project” template

?>

<article id="content" class="pv5">
  <div class="f1 i">
    Single BioClub Project
  </div>
  
  <div class="f3 lh-copy">
    Project Members: <?php
foreach($page->user_reference as $u) {
  echo "<a href='$u->url'>$u->user_display_name</a>";
}
?>
  </div>


  <div id="byline" class="pv5 moon-gray">
    Author: <?php $createdUser = $page->createdUser; echo $createdUser->user_display_name; ?><br />
    Published: <?php echo date('l jS \of F Y h:i:s A', $page->published); ?>, 
    Last Update: <?php echo date('l jS \of F Y h:i:s A', $page->modified); ?>
    <?php if($page->editable()): ?><a href='<?php echo $page->editUrl(); ?>'>Edit</a></p><?php endif; ?>
  </div>
</article>
