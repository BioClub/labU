<?php namespace ProcessWire; 

// Template file for pages using the “project subpage” template
// This template shows breadcrumbs & context

$parents = $page->parentsUntil("template=projects-overview");
?>

<article id="main" class="project">

  <nav class="breadcrumbs">
    <pre>
<?php
foreach ($parents as $p) {
?>
  ↩︎ <a href="<?=$p->url?>"><?=$p->title?></a>
<?php
}

?>
  </nav>
  <div class="text-4xl pb-8 pt-4 text-center"><?=$page->title?></div>
  <div id="content" class="text-lg">
    <?=$page->content?>
  </div>
</article>
