<?php namespace ProcessWire; 

// Template file for pages using the “projects-overview” template

?>

<article id="content" class="pv5 ">
  <div class="f1 i">
    BioClub Projects
  </div>
  
  <div class="f3 lh-copy">
    List of Projects at BioClub.
  </div>
  
<?php 
// All Projects
$page->children("sort=date")->each(function($project) {

  ?>
    <a href="<?=$project->url?>" class="">
      <?=$project->title?>
    <div class="f3 pb2 b">
      <?=$project->event_date?>
    </div>
    <div>
      <?=$project->event_content?>
    </div>
    </a>
    
<?php
});
?>


  </div>
</article>
