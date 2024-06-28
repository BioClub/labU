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

// User Image
function getUserImagePath($user, $width=200, $height=200) {
  $img = false;
  $urls = urls();
  if ($user->images->first()) {
    $img = $user->images->first()->size($width, $height);
    $base = $urls->httpRoot;
    $img = "$base/site/assets/files/$user->id/$img";
  }
  return $img;
}

// User Color
function getUserColor($user) {
  $color = ""; // default
  if ($user->color) {
    $color = " style=\"background-color:$user->color\"";
  }
  return $color;
}

function getUserIcon($user, $size=16) {
  $img = getUserImagePath($user, 200, 200);
  $color = getUserColor($user);
  if ($img) {
    $output = "<img class=\"w-$size h-$size rounded-full mx-auto\" src=\"$img\">\n";
  } else {
    $output = "<div class=\"flex-none w-$size h-$size rounded-full bg-slate-200\"$color></div>\n";
  }
  return $output;
}

function showUserIcon($user, $size=16) {
  echo getUserIcon($user, $size);
}
  
function showFooterMenu($menu, $location) {
  $menuObjects = $menu->getMenuItems($location, 2); // 2 -> return Object
  if (is_object($menuObjects) AND ($menuObjects->count > 0)) {
    foreach($menuObjects as $item) {
      echo "      <div><a href='$item->url'>$item->title</a></div>\n";
    }
  }
}

function showDate($languages, $timestamp) {
  $language = $languages->getLanguage();
  $f = ($language->name == "en") ? "F jS Y, H:i" : "Y年n月j日, H:i";
  echo date($f, $timestamp) . " JST";
}





?>
