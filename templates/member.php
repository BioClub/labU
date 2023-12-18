<?php
  
// Single User
$user_image = $u->images->first()->size(200, 200);
$base = $urls->httpRoot;
$image_path = "$base/site/assets/files/$u->id/$user_image";

?>

<article id="content" class="text-center">
  <img class="w-50 h-50 p-10 rounded-full mx-auto" src="<?=$image_path?>" />
  <div class="text-4xl font-bold pb-4"><?=$u->user_display_name?></div>
  <div class="text-3xl italic pb-4"><?=$u->user_byline?></div>
  
  <div class="text-lg"><?=$u->content?></div>
</article>
