<?php namespace ProcessWire; 

// Template file for pages using the “basic-page” template

?>

<article id="main">
   <h2>
     <?php echo $page->title; ?>
   </h2>
   <div id="content">
<?php echo $page->content; ?>
   </div>
</article>

<?php
/*
   <div id="byline" class="py-8 text-xs text-gray-300">
     Author: <?php $createdUser = $page->createdUser; echo $createdUser->user_display_name; ?><br />
     Published: <?php echo date('l jS \of F Y h:i:s A', $page->published); ?>, 
     Last Update: <?php echo date('l jS \of F Y h:i:s A', $page->modified); ?>
     <?php if($page->editable()): ?><a href='<?php echo $page->editUrl(); ?>'>Edit</a></p><?php endif; ?>
   </div>
*/
?>