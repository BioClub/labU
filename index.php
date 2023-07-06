<?php get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post();

?>

<article class="ph3 ph5-ns pv5 ">
  <h1 class="f1">
<?php the_title(); ?> 
  </h1>
  <div id="byline" class="pb2">
    Written by: <?php the_author(); ?> on <?php the_date(); ?>. 
<?php
$published = get_the_date();
$updated = get_the_modified_date();

if ($published != $updated):
?>
    Last Updated on: <?php the_modified_date(); ?>
<?php
endif;
?>
  </div>
  <div class="lh-copy">
<?php the_content(); ?>

  </div>
</article>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
