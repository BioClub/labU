<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
      BioClub Tokyo
    </title>
    <meta name="description" content="BioClub Tokyo">
    <meta name="author" content="@trembl">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
  </head>
  <body class="w-100 sans-serif bg-white">
    <!-- Temporary Dev Message -->
    <div class="bg-dark-red white pa1 tc">
      This is a development site for the new <span class="i">BioClub Tokyo Community Website</span>. Please join the Design & Development at GitHub.
    </div><!-- END Temporary Dev Message -->
    <main>
      <nav class="dt w-100 border-box pt3 ph5-ns b">
        <div class="f2">
          BioClub Tokyo
        </div>
        <div class="dtc v-mid w-50 tr">
          <a class="f6 f5-ns dib" href="https://bioclub.tokyo">日本語</a> / <a class="f6 f5-ns dib" href="https://bioclub.tokyo/en/">English</a>
        </div>
      </nav>
      <nav class="dt w-100 border-box pt3 ph5-ns b f4">
<?php

$menuItems = getMenu('header-menu');
foreach($menuItems as $menuItem) {
  $pageId = $menuItem->object_id;
  $link = get_permalink($pageId);
  $isCurrentPage = ($postID == $pageId);
  $active = ($isCurrentPage) ? ' class="active"' : '';
  echo "    <a class=\"pr2\" href=\"$link\"$active>$menuItem->title</a>\n";
}

?>
      </nav>

