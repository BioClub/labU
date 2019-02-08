<?php

// update_option( 'siteurl', 'http://127.0.0.1/gb/syrnet' );
// update_option( 'home', 'http://127.0.0.1/gb/syrnet' );


$p = get_template_directory();
$p .= '/functions/';

// General
require $p.'disable_updates.php';
require $p.'clean_header.php';
require $p.'disable_adminbar_links.php';
require $p.'disable_visual_editor.php';
require $p.'disable_auto_p.php';


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





?>
