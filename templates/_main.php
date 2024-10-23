<?php namespace ProcessWire;

// Optional main output file, called after rendering page’s template file.
// This is defined by $config->appendTemplateFile in /site/config.php, and
// is typically used to define and output markup common among most pages.
//
// When the Markup Regions feature is used, template files can prepend, append,
// replace or delete any element defined here that has an "id" attribute.
// https://processwire.com/docs/front-end/output/markup-regions/

/** @var Page $page */
/** @var Pages $pages */
/** @var Config $config */

$home = $pages->get('/');                     // homepage
$menu = $modules->get('MarkupMenuBuilder');   // get menues
$profileURL = $urls->admin . "profile/";

?><!DOCTYPE html>
<html lang="en">
<head id="html-head">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>BioClub Tokyo - <?php echo $page->title; ?></title>
<meta name="robots" content="index,follow,max-image-preview:large">
<meta name="description" content="BioClub Tokyo">
<meta property="og:title" content="BioClub Tokyo - Japan's Nicest BioCommunity and BioHackerSpace">
<meta property="og:description" content="BioClub Tokyo">
<meta property="og:url" content="https://bioclub.tokyo">
<meta property="og:type" content="website">
<!--
<meta property="og:image" content="https://">
-->
<link rel="canonical" href="https://bioclub.tokyo">
<meta name="theme-color" content="#00FF00">
<meta name="author" content="@trembl">

<link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates; ?>styles/bioclub.css" />

<script src="<?php echo $config->urls->templates; ?>scripts/main.js"></script>
</head>

<body id="html-body">

<header class="flex justify-between py-4 px-3">
  <div class="flex-none" style="width:50vh">
    <a href="<?=$pages->get(1)->httpUrl?>">
      <?php $files->include('images/bioclub_logo.svg');?>
    </a>
  </div>


  <div class="font-mono text-sm font-bold text-right">

<!-- Language Switcher -->
<?php
  $userPage = $input->urlSegmentStr;
  foreach($languages as $language) :
    $active = $user->language->id == $language->id;
    //if ($active) continue;
?>  <a href="<?=$page->localUrl($language)?><?=$input->urlSegmentStr?>" class="<?=$active ? 'active' : ''?>"><?=$language->title?></a><?php endforeach;?>
      <!-- End Language Switcher -->
<?php if ($user->isLoggedin()): ?>
      <a href="<?=$profileURL?>" class="login-button">Hello, <?=$user->user_display_name?></a>
<?php else: ?>
      <a href="<?=$urls->admin?>" class="login-button">Sign In</a>
<?php endif; ?>
  </div>

</header>
  <nav class="font-mono text-xl font-bold px-4 py-2">
    <?php
      $upcomingEvents = $pages->get("template=events-overview")->children("event_date>today, sort=-date");
      $nrOfUpcomingEvents = count($upcomingEvents);

      $menuItems = $menu->getMenuItems('header-menu', 2); // 2 -> return Object

      $isProjectChild = $page->parents("template=projects-overview")->count > 0;


      foreach($menuItems as $item) {

        $class = "";
        if ($item->isCurrent) $class .= "active";

        // get template parent name
        $templateParent = $pages->getByIDs([$item->pagesID]);
        $templateParentName = $templateParent[0]->template->name;

        // compare if parent is in menu
        if (($page->template->name == 'event') && ($templateParentName == "events-overview")) $class .= "active";
        if (($page->template->name == 'news') && ($templateParentName == "news-overview")) $class .= "active";
        if ($isProjectChild && ($templateParentName == "projects-overview")) $class .= "active";

        // show menu item
        echo "<a href='$item->url' class='p-1  rounded-md $class'>$item->title</a>";

        if (($item->title == "Events" OR $item->title == "イベント") && $nrOfUpcomingEvents > 0) echo "<sup class='bg-red-500 text-white rounded-full px-2'>$nrOfUpcomingEvents</sup>";
        if (!$item->isLast) echo " ";

      }
    ?>

  </nav>

<main class="p-4">

<!-- navigation -->



<!-- article -->
<article id="main" class="p-1">
</article>

<footer class="max-w-4xl mx-auto py-10">
<?php

// If current page is editable by current logged-in user, show Edit Link

$editURL = false;
$userPage = $input->urlSegmentStr;
$u = $users->find("template=user,roles=member,user_nice_url=$userPage")->first();

if(is_object($u) AND $user->hasRole('member') AND ($user->id == $u->id)):
  // case: My Profile Page
  $editURL = $profileURL;
  $editLabel = "Edit My Profile";
elseif(is_object($u) AND $user->hasRole('superuser') AND ($user->id != $u->id)):
  // case: Admin, other Profile Page
  $editURL = $page->editUrl();
  $userProfileUrl = $urls->admin . "access/users/edit/?id=" . $u->id;
  $editLabel = "Edit Profile of " . $u->user_display_name;
elseif($page->editable()):
  // case: has Page Edit Permission
  $editURL = $page->editUrl();
  $editLabel = "Edit"; // . $page->title;
endif;

if($editURL): ?>
    <div class="text-center py-8">
      <a href='<?=$editURL?>' class="edit-button">
        <?=$editLabel?>
      </a>
    </div>
<?php endif; ?>

  <div class="grid gap-4 grid-cols-1 md:grid-cols-3 text-xl font-medium">
    <div class="pl-1">
<?php showFooterMenu($menu, 'footer-left'); ?>
    </div>
    <div>
<?php showFooterMenu($menu, 'footer-center'); ?>
    </div>
    <div class="pr-1">
<?php showFooterMenu($menu, 'footer-right'); ?>
    </div>
  </div>

<?php /* SVG Icons are from https://simpleicons.org */ ?>
  <div class="text-center pt-10">
    <a class="mr-2" href="https://facebook.com/bioclubtokyo" title="Facebook">
      <svg class="inline-block h-4 w-4 mb-0.5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414">
          <path d="M15.117 0H.883C.395 0 0 .395 0 .883v14.234c0 .488.395.883.883.883h7.663V9.804H6.46V7.39h2.086V5.607c0-2.066 1.262-3.19 3.106-3.19.883 0 1.642.064 1.863.094v2.16h-1.28c-1 0-1.195.476-1.195 1.176v1.54h2.39l-.31 2.416h-2.08V16h4.077c.488 0 .883-.395.883-.883V.883C16 .395 15.605 0 15.117 0" fill-rule="nonzero"/>
      </svg>
      <span class="">Facebook</span>
    </a>
    <a class="mr-2" href="https://twitter.com/bioclubtokyo" title="">
      <svg class="inline-block h-4 w-4 mb-0.5" fill="currentColor"viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z"/>
      </svg>
      <span class="">Twitter</span>
    </a>
    <a class="mr-2" href="https://www.instagram.com/bioclubtokyo/" title="Instagram">
      <svg class="inline-block h-4 w-4 mb-0.5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414">
        <path d="M8 0C5.827 0 5.555.01 4.702.048 3.85.088 3.27.222 2.76.42c-.526.204-.973.478-1.417.923-.445.444-.72.89-.923 1.417-.198.51-.333 1.09-.372 1.942C.008 5.555 0 5.827 0 8s.01 2.445.048 3.298c.04.852.174 1.433.372 1.942.204.526.478.973.923 1.417.444.445.89.72 1.417.923.51.198 1.09.333 1.942.372.853.04 1.125.048 3.298.048s2.445-.01 3.298-.048c.852-.04 1.433-.174 1.942-.372.526-.204.973-.478 1.417-.923.445-.444.72-.89.923-1.417.198-.51.333-1.09.372-1.942.04-.853.048-1.125.048-3.298s-.01-2.445-.048-3.298c-.04-.852-.174-1.433-.372-1.942-.204-.526-.478-.973-.923-1.417-.444-.445-.89-.72-1.417-.923-.51-.198-1.09-.333-1.942-.372C10.445.008 10.173 0 8 0zm0 1.44c2.136 0 2.39.01 3.233.048.78.036 1.203.166 1.485.276.374.145.64.318.92.598.28.28.453.546.598.92.11.282.24.705.276 1.485.038.844.047 1.097.047 3.233s-.01 2.39-.048 3.233c-.036.78-.166 1.203-.276 1.485-.145.374-.318.64-.598.92-.28.28-.546.453-.92.598-.282.11-.705.24-1.485.276-.844.038-1.097.047-3.233.047s-2.39-.01-3.233-.048c-.78-.036-1.203-.166-1.485-.276-.374-.145-.64-.318-.92-.598-.28-.28-.453-.546-.598-.92-.11-.282-.24-.705-.276-1.485C1.45 10.39 1.44 10.136 1.44 8s.01-2.39.048-3.233c.036-.78.166-1.203.276-1.485.145-.374.318-.64.598-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276C5.61 1.45 5.864 1.44 8 1.44zm0 2.452c-2.27 0-4.108 1.84-4.108 4.108 0 2.27 1.84 4.108 4.108 4.108 2.27 0 4.108-1.84 4.108-4.108 0-2.27-1.84-4.108-4.108-4.108zm0 6.775c-1.473 0-2.667-1.194-2.667-2.667 0-1.473 1.194-2.667 2.667-2.667 1.473 0 2.667 1.194 2.667 2.667 0 1.473-1.194 2.667-2.667 2.667zm5.23-6.937c0 .53-.43.96-.96.96s-.96-.43-.96-.96.43-.96.96-.96.96.43.96.96z"/>
      </svg>
      <span class="">Instagram</span>
    </a>
    <a class="mr-2" href="https://github.com/BioClub/" title="GitHub">
      <svg class="inline-block h-4 w-4 mb-0.5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414">
        <path d="M8 0C3.58 0 0 3.582 0 8c0 3.535 2.292 6.533 5.47 7.59.4.075.547-.172.547-.385 0-.19-.007-.693-.01-1.36-2.226.483-2.695-1.073-2.695-1.073-.364-.924-.89-1.17-.89-1.17-.725-.496.056-.486.056-.486.803.056 1.225.824 1.225.824.714 1.223 1.873.87 2.33.665.072-.517.278-.87.507-1.07-1.777-.2-3.644-.888-3.644-3.953 0-.873.31-1.587.823-2.147-.083-.202-.358-1.015.077-2.117 0 0 .672-.215 2.2.82.638-.178 1.323-.266 2.003-.27.68.004 1.364.092 2.003.27 1.527-1.035 2.198-.82 2.198-.82.437 1.102.163 1.915.08 2.117.513.56.823 1.274.823 2.147 0 3.073-1.87 3.75-3.653 3.947.287.246.543.735.543 1.48 0 1.07-.01 1.933-.01 2.195 0 .215.144.463.55.385C13.71 14.53 16 11.534 16 8c0-4.418-3.582-8-8-8"/>
      </svg>
      <span class="">GitHub</span>
    </a>
    <a class="mr-2" href="https://discord.bioclub.tokyo" title="Slack">
      <svg class="inline-block h-4 w-4 mb-0.5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414">
        <path d="M20.317 4.3698a19.7913 19.7913 0 00-4.8851-1.5152.0741.0741 0 00-.0785.0371c-.211.3753-.4447.8648-.6083 1.2495-1.8447-.2762-3.68-.2762-5.4868 0-.1636-.3933-.4058-.8742-.6177-1.2495a.077.077 0 00-.0785-.037 19.7363 19.7363 0 00-4.8852 1.515.0699.0699 0 00-.0321.0277C.5334 9.0458-.319 13.5799.0992 18.0578a.0824.0824 0 00.0312.0561c2.0528 1.5076 4.0413 2.4228 5.9929 3.0294a.0777.0777 0 00.0842-.0276c.4616-.6304.8731-1.2952 1.226-1.9942a.076.076 0 00-.0416-.1057c-.6528-.2476-1.2743-.5495-1.8722-.8923a.077.077 0 01-.0076-.1277c.1258-.0943.2517-.1923.3718-.2914a.0743.0743 0 01.0776-.0105c3.9278 1.7933 8.18 1.7933 12.0614 0a.0739.0739 0 01.0785.0095c.1202.099.246.1981.3728.2924a.077.077 0 01-.0066.1276 12.2986 12.2986 0 01-1.873.8914.0766.0766 0 00-.0407.1067c.3604.698.7719 1.3628 1.225 1.9932a.076.076 0 00.0842.0286c1.961-.6067 3.9495-1.5219 6.0023-3.0294a.077.077 0 00.0313-.0552c.5004-5.177-.8382-9.6739-3.5485-13.6604a.061.061 0 00-.0312-.0286zM8.02 15.3312c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9555-2.4189 2.157-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.9555 2.4189-2.1569 2.4189zm7.9748 0c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9554-2.4189 2.1569-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.946 2.4189-2.1568 2.4189Z"/>
      </svg>
      <span class="">Discord</span>
    </a>
    <a class="mr-2" href="https://m.me/ch/AbbLtmPzgxChIMof/" title="Facebook Messenger Community">
      <svg class="inline-block h-4 w-4 mb-0.5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414">
        <path d="M.001 11.639C.001 4.949 5.241 0 12.001 0S24 4.95 24 11.639c0 6.689-5.24 11.638-12 11.638-1.21 0-2.38-.16-3.47-.46a.96.96 0 00-.64.05l-2.39 1.05a.96.96 0 01-1.35-.85l-.07-2.14a.97.97 0 00-.32-.68A11.39 11.389 0 01.002 11.64zm8.32-2.19l-3.52 5.6c-.35.53.32 1.139.82.75l3.79-2.87c.26-.2.6-.2.87 0l2.8 2.1c.84.63 2.04.4 2.6-.48l3.52-5.6c.35-.53-.32-1.13-.82-.75l-3.79 2.87c-.25.2-.6.2-.86 0l-2.8-2.1a1.8 1.8 0 00-2.61.48z"/>
      </svg>
      <span class="">Facebook Messenger</span>
    </a>
    <a class="" href="https://chat.whatsapp.com/Hte9K0rhVcDBZ6a4JD1nrm" title="WhatsApp">
      <svg class="inline-block h-4 w-4 mb-0.5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
      </svg>
      <span class="">WhatsApp</span>
    </a>
  </div>

  <div class="text-center p-4" id="attribution">
    Site built with <a href="https://github.com/BioClub/labU" class="active">LabU</a>, Logo &copy;<?php echo date("Y"); ?> BioClub Tokyo. User Contributed Content by <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/" class="active">CC BY-NC-SA 4.0</a>
  </div>

</footer>
</body>
</html>
