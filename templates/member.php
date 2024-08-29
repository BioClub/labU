<?php

// this file (member.php) is include via members-overview.php

?>

<article id="main">
  <div class="pt-6 text-center">
<?=$userIcon?>
    <div class="text-4xl font-bold pt-6"><?=$u->user_display_name?></div>
    <div class="text-2xl py-4"><?=$u->user_byline?></div>
  </div>
  <div id="content" class="w-3/4 text-lg mx-auto">
    <?=$u->content?>
  </div>
</article>
