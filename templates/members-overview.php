<?php namespace ProcessWire; 

// Template file for pages using the “members-overview” template

$userPage = $input->urlSegmentStr;
if (!$userPage):
?>

<article id="content" class="max-w-6xl mx-auto">
  <h1 class="mb-8 text-center">
    <?= __("BioClub Members") ?>
  </h1>
  <div class="text-lg font-medium pb-8">
    <?= $page->content ?>
  </div>

  <div id="members" class="grid gap-3 grid-cols-1 lg:grid-cols-2">
<?php
foreach ($users->find("template=user,roles=member") as $u){
  $user_image = false;
  if ($u->images->first()) {
    $user_image = $u->images->first()->size(200, 200);
    $base = $urls->httpRoot;
    $user_image = "$base/site/assets/files/$u->id/$user_image";
  }
  $background_color = ""; // default
  if ($u->color) {
    $background_color =  "style=\"background-color:$u->color\"";
  }
?>
    <a href="<?=$u->user_nice_url?>" class="flex p-4">
<?php if ($user_image): ?>
      <img class="flex-none w-16 h-16 rounded-full" src="<?=$user_image?>" />
<?php else: ?>
      <div class="flex-none w-16 h-16 rounded-full bg-slate-200"<?=$background_color?>></div>
<?php endif; ?>
      <div href="<?=$u->user_nice_url?>" class="flex-auto pl-6">
        <div class="text-2xl font-medium"><?=$u->user_display_name?></div>
        <div class="text-lg"><?=$u->user_byline?></div>
      </div>
    </a>

<?php
}
?>
  </div>

</article>
<?
else:
  // get all 'member' users
  $u = $users->find("template=user,roles=member,user_nice_url=$userPage")->first();
  if (!$u) {
    // throw 404 (see _init.php)
    wire404();
  } else {
    // include member.php (for better readability)
    include('member.php');
  }
endif;
?>

