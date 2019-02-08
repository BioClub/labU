<?php get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post();

  $f1 = get_field('featured_station_1');
  $f2 = get_field('featured_station_2');

?>

      <div class="col_wrap col_full">
        <div class="col_box header_box">
          <div class="title_head">Médias Pionniers:</div>
          <div class="title_subhead"><?php the_title(); ?></div>
        </div><!-- end col_box -->
      </div><!-- end col_wrap -->
    </div><!-- end col_row -->

  </div><!-- end header col_container -->

  <div class="poolad col_container col_full">
    <div class="col_row col_standard col_center">
      <div class="col_wrap col_feature col_right poolad_wrap">
        <a href="<?php echo site_url('/devenez'); ?>" class="poolad_box">
          <div class="poolad_head">Joignez-vous à nous !</div>
          <div class="poolad_text">Participez au programme Médias Pionniers  </div>
        </a><!-- end poolad_box -->
      </div><!-- end col_wrap -->
    </div><!-- end col_row -->
  </div><!-- end col_container -->

  <div class="feature col_container col_full">

    <div class="col_row col_standard col_center">
      <div class="col_wrap col_feature">
        <div class="col_box feature_bg">
        <div class="col_inside feature_content">
          <div class="ftr_title">Notre histoire</div>
          <div class="ftr_text">
            <?php the_content(); ?>
          </div><!-- end ftr_text -->
        </div><!-- end col_inside -->
          <a href="<?php echo site_url('/histoire'); ?>" class="ftr_btn h">
            <div class="ftr_btn_text">Lire<br />la suite</div>
          </a><!-- end ftr_btn -->
        </div><!-- end col_box -->
      </div><!-- end col_wrap -->

      <div class="col_wrap col_feature">
        <div class="col_box feature_bg">
          <div class="col_inside feature_content">
            <div class="ftr_title">Nos participants</div>
            <div class="ftr_radio_row">

              <div class="ftr_radio_wrap">
                <a href="<?php the_permalink($f1); ?>" class="ftr_radio_box">
                  <div class="ftr_radio">
                    <img src="<?php the_field('logo', $f1->ID); ?>" alt="" />
                    <div class="ftr_radio_name"><?php echo $f1->post_title; ?></div>
                    <div class="ftr_radio_loc"><?php the_field('location', $f1->ID); ?></div>
                  </div>
                </a><!-- end ftr_radio_box -->
              </div><!-- end ftr_radio_wrap -->

              <div class="ftr_radio_wrap">
                <a href="<?php the_permalink($f2); ?>" class="ftr_radio_box">
                  <div class="ftr_radio">
                    <img src="<?php the_field('logo', $f2->ID); ?>" alt="" />
                    <div class="ftr_radio_name"><?php echo $f2->post_title; ?></div>
                    <div class="ftr_radio_loc"><?php the_field('location', $f2->ID); ?></div>
                  </div>
                </a><!-- end ftr_radio_box -->
              </div><!-- end ftr_radio_wrap -->

            </div><!-- end ftr_radio_row -->
          </div><!-- end col_inside -->
          <a href="<?php echo site_url('/participants'); ?>" class="ftr_btn p">
            <div class="ftr_btn_text">Rencontrez nos participants</div>
          </a><!-- end ftr_btn -->
        </div><!-- end col_box -->
      </div><!-- end col_wrap -->
    </div><!-- end col_row -->

  </div><!-- end col_container -->

  <div class=" credits col_container col_full">

    <div class="col_row col_standard col_center">
      <div class="col_wrap col_credits">
        <div href="" class="col_box credits_bg">
          <div class="col_inside credits_content">
            <div class="credits_text">
              Media in Cooperation and Transition gGmbH (MiCT) a développé le Programme Médias Pionniers et le réalise en coopération avec le Syndicat National des Journalistes Tunisiens (SNJT).<br /><br />
              Ce programme est financé par la Commission Européenne dans le cadre de du Programme UE d'Appui aux Médias Tunisiens (PAMT) et le Ministère Fédéral des Affaires Étrangères Allemand.
            </div><!-- end ftr_text -->
            <div class="credits_text marker">
              Cette publication a été réalisée avec l'aide de l'Union Européenne. Le contenu de cette publication est la seule responsabilité de ses auteurs, et ne peut en aucun cas être considéré comme reflétant les points de vue de l'Union Européenne, du Ministère Fédéral des Affaires Étrangères Allemand, du Syndicat National des Journalistes Tunisiens (SNJT) ou de Media in Cooperation and Transition (MiCT).
            </div><!-- end ftr_text -->
            <div class="partnerlogo_box">
              <a href="http://" class="partnerlogo eu"></a>
              <a href="http://" class="partnerlogo aa"></a>
              <a href="http://" class="partnerlogo mict"></a>
              <a href="http://" class="partnerlogo snjt"></a>
            </div><!-- end partnerlogo_box -->
          </div><!-- end col_inside -->
        </div><!-- end col_box -->
      </div><!-- end col_wrap -->
    </div><!-- end col_row -->

  </div><!-- end col_container -->

<?php endwhile; endif; ?>

<?php get_footer(); ?>
