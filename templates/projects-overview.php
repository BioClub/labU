<?php namespace ProcessWire; 

// Template file for pages using the “projects-overview” template

?>

<article id="content" class="text-center">
  <h3 class="text-4xl pb-12 pt-8">BioClub Projects</h3>

  <div class="grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
<?php 
// Get all Projects by date
$page->children("sort=date")->each(function($project) {
  $img = false;
  if ($project->images->first()) {
    $img = $project->images->first()->size(480, 270);
  }
?>

    <a href="<?=$project->url?>" class="rounded-2xl">
<?php if ($img): ?>
      <img class="w-full rounded-t-2xl" src="<?=$img->url?>" />
<?php endif; ?>
      <div class="text-2xl"><?=$project->title?></div>
    </a>

    
<?php
});
?>

  </div><!-- flex end -->
</article>
