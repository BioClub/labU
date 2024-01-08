<?php

// Custom Functions should only be included once, or else a "Cannot redeclare function" error is triggered when invoking wire404() [see members-overview.php]

// Translation Helper
function _e($str, $domain=null) {
  echo __($str, $domain);
}

// Menu
function displayMenu($menu, $name) {
  $menuItems = $menu->getMenuItems($name, 2); // 2 -> return Object
  foreach($menuItems as $item) {
    echo "<a href='$item->url' class=''>$item->title</a> | \n";
  }
}

?>
