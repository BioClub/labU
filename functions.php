<?php

// update_option( 'siteurl', 'http://127.0.0.1/bioclub' );
// update_option( 'home', 'http://127.0.0.1/bioclub' );

include('components/custom_post_types.php');      // Events, Projects
include('components/disable_updates.php');
include('components/clean_header.php');
include('components/disable_adminbar_links.php');
include('components/disable_visual_editor.php');
include('components/disable_auto_p.php');
include('components/menus.php');

function isFront() {
 if (is_front_page()) {
   echo " active";
 }
}

function isActive($pageName) {
  if ( (($pageName == "front") AND is_front_page()) OR (is_page($pageName)) ) {
    echo "active";
  }
}

// Include Markdown Parser
include('includes/Parsedown.php');
$Parsedown = new Parsedown();

function the_markdown_content() {
  global $Parsedown;
  echo $Parsedown->text(get_the_content());
}


add_filter( 'the_content', 'filter_the_content_markdown', 1 );

function filter_the_content_markdown( $content ) {
  if (get_field('enable_markdown_filter')) {
    global $Parsedown;
    return $Parsedown->text($content);
  }
  return $content;
}




?>
