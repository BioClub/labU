<?php namespace ProcessWire;

// Optional initialization file, called before rendering any template file.
// This is defined by $config->prependTemplateFile in /site/config.php.
// Use this to define shared variables, functions, classes, includes, etc. 


function _e($str, $domain=null) {
  echo __($str, $domain);
}

function displayMenu($menu, $name) {
  $menuItems = $menu->getMenuItems($name, 2); // 2 -> return Object
  foreach($menuItems as $item) {
    echo "<a href='$item->url' class=''>$item->title</a> | \n";
  }
}

