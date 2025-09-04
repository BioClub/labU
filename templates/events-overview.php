<?php namespace ProcessWire;

// Template file for pages using the “event-overview” template

// # Future Events
// Future Events that have either "event_date" or "event_end_date" in the Future
// Future Events can also have an empty date, when the presenter has not fixed the date yet
// More about Selectors https://processwire.com/docs/selectors/

$future_events = $page->children("(event_date>today), (event_date=), sort=event_date");

?>

<article id="main">
  <h2 class="text-center pb-10"><?= _t("Upcoming Events") ?></h2>

  <div id="content" class="text-lg font-medium">
    <?php echo $page->content; ?>
<?php if ($user->isLoggedin()): ?>
  <blockquote class="loggedin">
    <?php if($user->language->title == "English"): ?>
    <a href="https://bioclub.tokyo/edit/page/add/?parent_id=1037">Add New Event</a>
    <span class="text-sm font-normal italic">This button is only visible to logged-in users.</span>
    <?php else: ?>
    <a href="https://bioclub.tokyo/edit/page/add/?parent_id=1037">新しいイベントの追加</a>
    <span class="text-sm font-normal italic">このボタンはログインしたユーザーにのみ表示されます。</span>
    <?php endif; ?>
  </blockquote>
<?php endif; ?>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-3">
<?php

// Future Events, no pagination
$future_events->each(function($event) {

  // Featured Image
  $preview_image = false;
  if ($event->images->first()) {
    $preview_image = $event->images->first()->size(300, 200);
  }

  $event_date = str_replace(
  ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
  ['月', '火', '水', '木', '金', '土', '日'],
  $event->event_date
  );

  ?>
    <a class="box events" href="<?= $event->url ?>">

      <div class="leading-8 mb-2">
        <span class="text-ms bg-gray-200 rounded-full px-2 py-1">
<?php if($event->event_end_date): ?>
          <?=date("F j, Y", $event->getUnformatted("event_date"))?> - <?=date("F j, Y", $event->getUnformatted("event_end_date"))?>
<?php else: ?>
          <?=$event->event_date?> JST
<?php endif; ?>

        </span>
      </div>

<?php if ($event->images->first()):
  $img = $event->images->first()->size(1000, 333);
?>
      <img src="<?=$img->url?>" class="w-full mb-3" />
<?php endif; ?>

      <h2 class="px-1">
        <?php if ($event->speaker_name) { echo $event->speaker_name; echo ": ";} ?><?=$event->title?>

      </h2>
      <div class="leading-8 my-2">
        <span class="text-ms bg-gray-200 rounded-full ml-1 px-2 py-1">BioClub&nbsp;Tokyo</span>
      </div>
      <div class="px-1">
        <?=$event->event_abstract?>
      </div>
    </a>

<?php
});
?>
  </div>

  <h2 class="text-center py-10"><?= _t("Recent Events") ?></h2>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
<?php

// Past Events, paginated

// Get past events, sort by date
$events_per_page = 2;
$offset = 0;
$pageNr = 1;
$segmentStr = $input->urlSegmentStr;

// check if urlSegmentStr is number and <= than total pages
if (is_numeric($segmentStr)) {
  $offset = $segmentStr;
  $pageNr = $segmentStr;
} elseif (empty($segmentStr)) {

} else {
  wire404();
}


$past_events = $page->children("event_date<today, sort=-event_date, limit=$events_per_page, start=$offset");

$total = $past_events->getTotal();
$maxNumberOfPages = ceil($total / $events_per_page);

if ($pageNr > $maxNumberOfPages) {
  wire404();
}

$past_events->each(function($event) {
  ?>
  <a class="box events" href="<?=$event->url?>">

    <div class="leading-8 mb-2">
      <span class="text-ms bg-gray-200 rounded-full px-2 py-1"><?=$event->event_date?> JST</span>
    </div>

<?php if ($event->images->first()):
  $img = $event->images->first()->size(1000, 333);
?>
    <img src="<?=$img->url?>" class="w-full mb-3" />
<?php endif; ?>

    <h2 class="px-1">
      <?php if ($event->speaker_name) { echo $event->speaker_name; echo ": ";} ?><?=$event->title?>
    </h2>
    <div class="leading-8 my-2">
      <span class="text-ms bg-gray-200 rounded-full ml-1 px-2 py-1">BioClub&nbsp;Tokyo</span>
<?php /*
      <a
        class="text-ms bg-blue-500 hover:bg-blue-600 active:bg-blue-700 text-white rounded-full ml-1 px-2 py-1"
        href="https://zoom.bioclub.tokyo"
      >Zoom</a>
      <a
        class="text-ms bg-red-500 hover:bg-red-600 active:bg-red-700 text-white rounded-full ml-1 px-2 py-1"
        href="https://zoom.bioclub.tokyo"
      >Lecture</a>
<a
        class="text-ms bg-red-500 hover:bg-red-600 active:bg-red-700 text-white rounded-full ml-1 px-2 py-1"
        href="https://zoom.bioclub.tokyo"
      >Workshop</a>
*/ ?>
    </div>
    <div class="px-1">
      <?=$event->event_abstract?>
    </div>
  </a>

<?php
});
?>
  </div>

  <div id="pagination" class="text-center">
<?php

$config->pageNumUrlPrefix = "";



if ($past_events->hasPrevPagination() ) {
  $prevNr = $pageNr-1;
  echo "<a href='".$page->url($prevNr)."' class='font-medium'>⟵ Previous</a>\n";
} else {
  echo "<span class=''>⟵ Previous</span>\n";
}

$p = 1;
for ($i=0; $i<$total; $i++) {
  if ($i%$events_per_page == 0) {
    if ($p == $pageNr) {
      echo "<span class=''>$p</span> ";
    } else {
      echo "<a href='".$page->url($p)."' class='font-medium'>$p</a> ";
    }
    $p++;
  }
}

if ($past_events->hasNextPagination() ) {
  if (!is_numeric($pageNr)) $pageNr = 1;
  $nextNr = $pageNr+1;
  echo "<a href='".$page->url($nextNr)."' class='font-medium'>Next ⟶</a>\n";
} else {
  echo "<span class=''>Next ⟶</span>\n";
}
?>
  </div>


</article>
