<?php namespace ProcessWire; 

// Template file for pages using the “members-overview” template

$userPage = $input->urlSegmentStr;
if (!$userPage):
?>


<article id="content" class="">
  <p class="text-4xl">BioClub Members</p>
  
  <ul class="">
<?php

foreach ($users->find("template=user,roles=editor") as $u){
  $user_image = false;
  if ($u->images->first()) {
    $user_image = $u->images->first()->size(200, 200);
    $base = $urls->httpRoot;
    $image_path = "$base/site/assets/files/$u->id/$user_image";
  }
?>
    <a href="<?=$u->user_nice_url?>" class="flex font-medium items-center box hover:bg-gray-100 active:bg-pure-yellow">
      <img class="flex-none w-10 h-10 rounded-full" src="<?=$image_path?>" />
      <div class="pl-4 flex-auto text-2xl"><?=$u->user_display_name?></div>
      <div class="flex-auto text-xl italic"><?=$u->user_byline?></div>
    </a>

<?php
}
?>
  </ul>
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

