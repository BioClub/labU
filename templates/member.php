<?php
  
// Single User
$user_image = $u->images->first()->size(200, 200);
$base = $urls->httpRoot;
$image_path = "$base/site/assets/files/$u->id/$user_image";

?>

<article id="content">
  <div class="pt-6 text-center">
    <img class="w-32 h-32 rounded-full mx-auto" src="<?=$image_path?>" />
    <div class="text-4xl font-bold pt-6"><?=$u->user_display_name?></div>
    <div class="text-3xl py-4"><?=$u->user_byline?></div>
  </div>
  <!--
  <div class="flex flex-row w-3/4 mx-auto">
    <div class="basis-1/2 text-lg bg-slate-50"><?=$u->user_display_name?></div>
    <div class="basis-1/2 text-lg bg-slate-100 "><?=$u->content?></div>
  </div>
    
  -->
  <div class="w-3/4 text-lg mx-auto bg-slate-50">
    <?=$u->content?>
  </div>
  
</article>
