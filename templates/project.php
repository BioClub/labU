<?php namespace ProcessWire;

// Template file for pages using the “project” template

?>

<article id="main" class="">
  <div class="text-4xl font-medium pb-4 text-center"><?=$page->title?></div>
  <?php showFirstImage($page); ?>
  <div id="content" class="text-lg">
    <?=$page->content?>


<?php
// Show associates Project Members
if ($page->user_reference->count > 0):
?>
  <div class="my-4 font-medium">
    <div class=""><?= _t("Project Members:"); ?></div>
    <div class="my-2">
<?php
// WireArray Implode: https://processwire.com/talk/topic/5098-new-wirearray-api-additions-on-dev/
echo $page->user_reference->implode(", ", function($u) {
  $m = wire('pages')->get('template=members-overview');  // $page not defined in functions: https://processwire.com/talk/topic/13776-why-is-pages-undefined/
  return '<a href="'.$m->url.$u->user_nice_url.'">'.$u->user_display_name.'</a>';
});

?>
    </div>
  </div>
<?php
endif;

// Search all events, that have this page in project_reference
// $events = $pages->find("template=event, project_reference=$page, limit=10");
$events = $pages->find("template=event, project_reference=$page, sort=-event_date");

// Only show related events, if they exist
if ($events->count > 0):
?>
  <div class="my-4 font-medium">
    <div class=""><?= _t("Related Events:"); ?></div>
    <ul>
<?php
echo $events->implode(function($e) {
  return '<li><a href="'.$e->url.'">'.$e->title.', '.$e->event_date.'</a></li>';
});
?>
    </ul>
  </div>
<?php
endif;
?>

  </div><!-- end content -->
</article>
