<?php namespace ProcessWire; 

// Template file for pages using the “event” template

?>

<article id="content" class="pv5 ">
  Event Template
  <h1 class="f1">
    <?php echo $page->title; ?>
  </h1>
  <div class="lh-copy">
<?php echo $page->content; ?>
  </div>
  <div id="byline" class="pb2">
    Author: <?php $createdUser = $page->createdUser; echo $createdUser->user_display_name; ?><br />
    Published: <?php echo date('l jS \of F Y h:i:s A', $page->published); ?>, 
    Last Update: <?php echo date('l jS \of F Y h:i:s A', $page->modified); ?>
    <?php if($page->editable()): ?><a href='<?php echo $page->editUrl(); ?>'>Edit</a></p><?php endif; ?>
  </div>
</article>
