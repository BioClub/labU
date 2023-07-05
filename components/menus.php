<?php

// simple menus
// function.php
function register_theme_menu() {
  register_nav_menu('header-menu', 'Header Menu');
}
add_action( 'init', 'register_theme_menu' );

/*
// display
$l = get_nav_menu_locations();
$m = wp_get_nav_menu_items($l['footer-menu']);
foreach($m as $i) {
  echo "          <div class=\"footer_nav_item\"><a href=\"$i->url\">$i->title</a></div>\n";
}
*/


/*
// more complex
function register_bioclub_menus() {
  register_nav_menus(
    array(
      'header-menu-en' => __('Header Menu 1', 'bioclub'),
      'header-menu-ar' => __('Header Menu 2', 'bioclub'),
      'header-menu-ku' => __('Header Menu 3', 'bioclub'),
    )
  );
}
add_action( 'init', 'register_bioclub_menus' );
*/

function getMenu($menuSlug) {
  $menuLocations = get_nav_menu_locations();
  $menu = wp_get_nav_menu_items($menuLocations[$menuSlug]);
  if (empty($menu)) return array();
  return $menu;
}

/*
// Get Menu Items by Slug
function getMenu() {
  $menuSlug = 'header-menu-'. ICL_LANGUAGE_CODE;
  $menuLocations = get_nav_menu_locations();
  $menu = wp_get_nav_menu_items($menuLocations[$menuSlug]);
  if (empty($menu)) return array();
  return $menu;
}
*/
// Format & Show Menu Items
function showMenu($padding='') {
  global $post, $wp_query;
  $postID = getPostID();
  $menuItems = getMenu();
  foreach($menuItems as $menuItem) {
    $pageId = $menuItem->object_id;
    $link = get_permalink($pageId);
    $isCurrentPage = ($postID == $pageId);
    $parentID = get_ancestors($postID, 'page', 'post_type' )[0];
    $isCurrentParentPage = ($parentID == $pageId);
    $active = ($isCurrentPage OR $isCurrentParentPage) ? ' class="navactive"' : '';
    echo "$padding<a href=\"$link\"$active>$menuItem->title</a><br />\n";
  }
}

function showSubMenu($menuSlug, $padding='') {
  global $post, $wp_query;
  $postID = getPostID();

  $subPages = array();                       // init subPages

  $menuItems = getMenu($menuSlug);
  $parentID = get_ancestors($postID, 'page', 'post_type' )[0];

  // check if current page in part of menu
  foreach($menuItems as $menuItem) {

    $menuItemPageID = $menuItem->object_id;
    $isInMenu = $menuItemPageID == $postID;
    $parentIsInMenu = $menuItemPageID == $parentID;
    if($isInMenu OR $parentIsInMenu) {
      $args = array(
        'post_parent'       => $menuItemPageID,
        'post_type'         => 'page',
        'numberposts'       => -1,
        'post_status'       => 'published',
        'suppress_filters'  => 0,      // gets language specific posts
      );
      $subPages = get_children($args);
    }
  }


  


 // OR ($pageID == $parentID))

  // check if current page has parent in menu


 // echo("$pageID $parentID $post->ID <br />");


  //print_r($subPages);



  // display
  foreach($subPages as $page) {
    $link = get_permalink($page->ID);
    $active = ($postID == $page->ID) ? ' class="navactive"' : '';
    echo "$padding<a href=\"$link\"$active>$page->post_title</a><br />\n";
  }
}

?>
