<?php

/**
 * Template Name: History
 *
 * @package TRP
 */


get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div class="col_wrap col_full">
              <div class="col_box header_box">
                <div class="title_head">Médias Pionniers:</div>
                <div class="title_subhead"><?php the_title(); ?></div>
              </div><!-- end col_box -->
            </div><!-- end col_wrap -->
          </div><!-- end col_row -->
        </div><!-- end header col_container -->

        <div class="story col_container col_full">
          <div class="col_row col_standard col_center">

            <div class="col_wrap col_story">
              <div class="col_box story_bg">
                <div class="col_inside story_content">
                  <?php the_content(); ?>
                </div><!-- end col_inside -->
              </div><!-- end col_box -->
            </div><!-- end col_wrap -->

            <div class="col_wrap col_story">
              <div class="col_box story_bg">
                <div class="col_inside story_content img">
                  <div class="story_img_col">
<?php while ( have_rows('images_left') ) : the_row(); ?>
                    <div class="story_img"><img src="<?php echo get_sub_field('image')['sizes']['medium']; ?>" alt="" /></div>
<?php endwhile; ?>
                  </div><!-- end story_img_col -->
                  <div class="story_img_col">
<?php while ( have_rows('images_right') ) : the_row(); ?>
                    <div class="story_img"><img src="<?php echo get_sub_field('image')['sizes']['medium']; ?>" alt="" /></div>
<?php endwhile; ?>
                  </div><!-- end story_img_col -->
                </div><!-- end col_inside -->
              </div><!-- end col_box -->
            </div><!-- end col_wrap -->

          </div><!-- end col_row -->
        </div><!-- end col_container -->

<?php

endwhile; endif;

get_footer();

?>
