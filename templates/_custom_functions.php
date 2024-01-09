<?php namespace ProcessWire;

// Custom Functions should only be included once, or else a "Cannot redeclare function" error is triggered when invoking wire404() [see members-overview.php]


// Menu
function displayMenu($menu, $name) {
  $menuItems = $menu->getMenuItems($name, 2); // 2 -> return Object
  foreach($menuItems as $item) {
    echo "<a href='$item->url' class=''>$item->title</a> | \n";
  }
}

// Translation Helper
function _t($str) {
  return __($str, "site--templates--_translation-php");
}

?>
