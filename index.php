<?php get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post();

?>

<body class="w-100 sans-serif bg-white">
<div class="bg-dark-red white pa1">
  This is a development site for the new <span class="i">BioClub Tokyo Community Website</span>.
  Please join the Design & Development at GitHub.
</div>
<main>
  <nav class="dt w-100 border-box pt3 ph5-ns b">
    <div class="f2">BioClub Tokyo</div>
    <div class="dtc v-mid w-50 tr">
      <a class="f6 f5-ns dib" href="https://bioclub.tokyo">日本語</a> /
      <a class="f6 f5-ns dib" href="https://bioclub.tokyo/en/">English</a>
    </div>
  </nav>
  
  <nav class="dt w-100 border-box pt3 ph5-ns b f4">
    <a class="pr2" href="">About</a> | 
    <a class="pr2" href="">Events</a> | 
    <a class="pr2" href="">Projects</a> | 
    <a class="pr2" href="">People</a> |
    <a class="pr2" href="">Contact</a>
  </nav>

<article class="ph3 ph5-ns pv5 ">
  <h1 class="f1">
    Page Title
  </h1>
  <div class=" lh-copy">
    Page Content.
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  </div>
</article>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
