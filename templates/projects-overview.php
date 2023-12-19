<?php namespace ProcessWire; 

// Template file for pages using the “projects-overview” template



?>

<article id="content" class="text-center">
  <p class="text-4xl">BioClub Projects</p>

  
<?php 
// All Projects
$page->children("sort=date")->each(function($project) {
  $img = false;
  if ($project->images->first()) {
    $img = $project->images->first()->size(200, 200);
  }
?>

    <a href="<?=$project->url?>" class="flex font-medium items-center box hover:bg-gray-100 active:bg-pure-yellow">
<?php if ($img): ?>
      <img class="flex-none w-16 h-16 rounded-full" src="<?=$img->url?>" />
<?php endif; ?>
      <div class="pl-4 text-4xl"><?=$project->title?></div>
    </a>

    
<?php
});
?>


  </div>
</article>
