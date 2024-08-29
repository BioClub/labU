<?php namespace ProcessWire; 

// Template file for pages using the “project subpage” template
// This template shows breadcrumbs & context

$parents = $page->parents("template=project");
?>

<article id="content" class="project">

  <nav class="breadcrumbs">
<?php

foreach ($parents as $p) {
?>
  ↩︎ <a href="<?=$p->url?>"><?=$p->title?></a>
<?php
}

?>
  </nav>

  <div class="text-4xl pb-4 text-center">Project Subpage: <?=$page->title?></div>
  <div class="text-lg">
    <?=$page->content?>
  </div>
</article>
