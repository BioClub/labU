<?php namespace ProcessWire;

// Template file for “home” template used by the homepage


 # prints: <p>Hello <em>Parsedown</em>!</p>
?>

<div id="content">
   <h1 class="text-5xl font-semibold">
     <?php echo $page->title; ?>
 <?php if($page->editable()): ?><a href='<?php echo $page->editUrl(); ?>'>&nbsp;&nbsp;&nbsp;</a></p><?php endif; ?>
   </h1>
   <div class="lh-copy">
 <?php echo $page->content; ?>
   </div>
   <div id="byline" class="py-8 text-xs text-gray-300">
     Author: <?php $createdUser = $page->createdUser; echo $createdUser->user_display_name; ?><br />
     Published: <?php echo date('l jS \of F Y h:i:s A', $page->published); ?><br />
     Last Update: <?php echo date('l jS \of F Y h:i:s A', $page->modified); ?>
     <?php if($page->editable()): ?><a href='<?php echo $page->editUrl(); ?>'>Edit</a></p><?php endif; ?>
   </div>
</div>
