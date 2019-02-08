<?php

// Disable all updates 
// https://codex.wordpress.org/Configuring_Automatic_Background_Updates

add_filter( 'automatic_updater_disabled', '__return_true' );

?>