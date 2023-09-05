<?php namespace ProcessWire; 

// Template file for pages using the “members-overview” template



?>


<?php


$userPage = $input->urlSegmentStr;
if (!$userPage):
?>


<article id="content" class="pv5">
  <div class="f3 i pb3">BioClub Members</div>
  
  <ul class="list mt0 left pl0">
<?php

foreach ($users->find("template=user,roles=editor") as $u){
  $user_image = false;
  if ($u->images->first()) {
    $user_image = $u->images->first()->size(200, 200);
    $base = $urls->httpRoot;
    $image_path = "$base/site/assets/files/$u->id/$user_image";
  }
?>
    <a href="<?=$u->user_nice_url?>" id="member">
      <li class="flex items-center lh-copy pa3 ba b--black" style="box-shadow: 5px 5px 0px black;">
        <img class="w3 h3 br-100" src="<?=$image_path?>" />
        <div class="pl3">
          <span class="f3 db black"><?=$u->user_display_name?></span>
          <span class="f5 db black i"><?=$u->user_byline?></span>
        </div>
      </li>
    </a>

<?php
}
?>
  </ul>
</article>
<?
else:
  //
?>
<article id="content" class="pv5">

<?php
  $u = $users->find("template=user,roles=editor,user_nice_url=$userPage")->first();
  if (!$u) {
?>
   <h1 class="f1">
     404 Not Found
   </h1>
<?php
  } else {
    // Single User
    $user_image = $u->images->first()->size(200, 200);
    $base = $urls->httpRoot;
    $image_path = "$base/site/assets/files/$u->id/$user_image";
?>

  <div class="f2 b black pb3"><?=$u->user_display_name?></div>
  <div class="f3 i black pb3"><?=$u->user_byline?></div>
  <img class="w3 h3 br-100" src="<?=$image_path?>" />
  <div class="f4 lh-copy black"><?=$u->content?></div>
  
  
    
<?php
  }
?>

</article>
<?
endif;
?>

