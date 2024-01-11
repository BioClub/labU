<?php namespace ProcessWire; 

// Template file for pages using the “members-overview” template

$userPage = $input->urlSegmentStr;
if (!$userPage):
?>

<article id="content" class="">
  <h1 class="mb-8 text-center">
    <?= __("BioClub Members") ?>
  </h1>
  <div class="flex w-3/4 p-6 mx-auto text-lg font-medium">
    <?= $page->content ?>
  </div>

<?php

foreach ($users->find("template=user,roles=editor") as $u){
  $user_image = false;
  if ($u->images->first()) {
    $user_image = $u->images->first()->size(200, 200);
    $base = $urls->httpRoot;
    $image_path = "$base/site/assets/files/$u->id/$user_image";
  }
?>
    <div class="flex w-3/4 p-6 mx-auto">
      <img class="flex-none w-16 h-16 rounded-full" src="<?=$image_path?>" />
      <div class="flex-auto pl-6">
        <div class="text-2xl font-medium underline"><a href="<?=$u->user_nice_url?>"><?=$u->user_display_name?></a></div>
        <div class="text-lg"><?=$u->user_byline?></div>
      </div>
    </div>
<!--
    <div class="flex items-center p-6 bg-gray-200">
      <img class="flex-none w-16 h-16 rounded-full" src="<?=$image_path?>" />
      <div class="pl-4 flex-auto text-2xl font-medium"><a href="<?=$u->user_nice_url?>"><?=$u->user_display_name?></a></div>
      <div class="flex-auto text-lg"><?=$u->user_byline?></div>
    </div>
-->
<?php
}
?>

</article>
<?
else:
  $u = $users->find("template=user,roles=editor,user_nice_url=$userPage")->first();
  if (!$u) {
    // throw 404 (see _init.php)
    wire404();
  } else {
    // include member.php (for better readability)
    include('member.php');
  }
endif;
?>

