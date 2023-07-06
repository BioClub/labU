<?php get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post();

?>

<article class="ph3 ph5-ns pv5 ">
  <h1 class="f1">
    <?php the_title(); ?>
  </h1>
  <div class="lh-copy">
    <?php the_content(); ?>
  </div>
</article>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
