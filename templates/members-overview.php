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
foreach ($users->find("template=user,roles=member") as $u) {
  ?>
    <a href="<?=$u->user_nice_url?>" class="flex p-4">
<?php showUserIcon($u, 16); ?>
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
    $member = new TemplateFile(wire('config')->paths->templates . 'member.php');
    $member->set('u', $u);
    $member->set('userIcon', getUserIcon($u, 32));
    echo $member->render();

    //include('member.php');
  }
endif;
?>

