<?php

// this file (member.php) is include via members-overview.php
// $u is declared in members-overview.php

// Edit defaults to members-overview.php, need special check for that in _main.php

// User Image
$user_image = false;
if ($u->images->first()) {
  $user_image = $u->images->first()->size(200, 200);
  $base = $urls->httpRoot;
  $user_image = "$base/site/assets/files/$u->id/$user_image";
}

?>

<article id="content">
  <div class="pt-6 text-center">
<?php if($user_image): ?>
    <img class="w-32 h-32 rounded-full mx-auto" src="<?=$user_image?>" />
<?php else: ?>
    <div class="w-32 h-32 rounded-full mx-auto rounded-full bg-slate-200"></div>
<?php endif; ?>

    <div class="text-4xl font-bold pt-6"><?=$u->user_display_name?></div>
    <div class="text-3xl py-4"><?=$u->user_byline?></div>
  </div>
  <div class="w-3/4 text-lg mx-auto">
    <?=$u->content?>
  </div>
</article>
