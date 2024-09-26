<?php namespace ProcessWire;

// Optional initialization file, called before rendering any template file.
// This is defined by $config->prependTemplateFile in /site/config.php.
// Use this to define shared variables, functions, classes, includes, etc.

// Custom Functions should only be included once, or else a "Cannot redeclare function" error is triggered when invoking wire404() [see members-overview.php]
include_once('_custom_functions.php');
include_once('_custom_functions/show_first_image.php');
