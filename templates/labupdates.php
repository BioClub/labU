<?php namespace ProcessWire;

// Template file for pages using the “lab updates” template


  //$page->modified_users_id
//$user = $users->get($page->created_users_id);

/*
    <a href="<?=$u->user_nice_url?>" class="flex p-4">
<?php showUserIcon($u, 12); ?>
      <div href="<?=$u->user_nice_url?>" class="flex-auto pl-6">
        <div class="text-xl font-medium"><?=$u->user_display_name?></div>
        <div class="text-md"><?=$u->user_byline?></div>
      </div>
    </a>
*/


$createdUser = $users->get($page->created_users_id);
$createdUserURL = $pages->get(1)->httpUrl . "members/" . $createdUser->user_nice_url;

/*
$modifiedUser = $users->get($page->modified_users_id);
$modifiedUserURL = $pages->get(1)->httpUrl . "members/" . $modifiedUser->user_nice_url;
*/



?>

<article id="main" class="font-medium max-w-4xl mx-auto">
  <h3 class="mb-8 text-center"><?=$page->title?></h3>
  <div id="news" class="pb-4 grid gap-2 grid-cols-1 md:grid-cols-2 ">
    <a href="<?=$createdUser->user_nice_url?>" class="flex">
<?php showUserIcon($createdUser, 6); ?>
      <div href="<?=$createdUserURL?>" class="flex-auto">
        <div class="text-ml pl-1"><?=$createdUser->user_display_name?></div>
      </div>
    </a>
    <div class="flex-auto md:text-right">
      <?php showDate($languages, $page->published); ?>
    </div>
  </div>
<?php if ($page->images->first()):
  $img = $page->images->first()->size(960, 540);
?>
  <img src="<?=$img->url?>" class="w-full mb-3" />
<?php endif; ?>
  <div id="content" class="">
<?php echo $page->content; ?>
  </div>
</article>
