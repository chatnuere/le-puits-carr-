<?php
/**
 *  Template Name: Region
 *
 *  This page template has a sidebar built into it,
 *  and can be used as a home page, in which case the title will not show up.
 *
 */
get_header(); // This fxn gets the header.php file and renders it ?>

  <section class="top_section top_section--room" style="background-image: url('<?php the_field('region_background'); ?>')">
    <div class="mobile_logo">
      <div class="logo">
        <div class="icon-lpc__logo logo__icon"></div>
        <h2 class="logo__title"><?php ot_get_option('titre_logo'); ?></h2>
        <h3 class="logo__subtitle"><?php echo ot_get_option('sous_titre_logo'); ?></h3>
      </div>
    </div>
  </section>

<?php $color = get_field('region_color'); ?>

  <div class="intro intro--room intro--room-voutes ">
    <div class="container container--small center">
      <h1 class="intro--title scrollMagic__introSlideup" style="background-color: <?php echo $color; ?>;">
        <?php the_field('region_intro_title'); ?>
      </h1>
    </div>
    <div class="intro--text" style="background-color: <?php echo $color; ?>;">
      <div class="container container--small center">
        <p class="scrollMagic__smoothSlideUp">
          <?php the_field('region_intro_description description'); ?>
        </p>
      </div>
    </div>
  </div>

<?php if (get_field('region_show_activity_slider')): ?>
  <?php if (get_field('region_activity_slider')): ?>
    <section class="regionSlider">
      <h2 class="sectionTitle"><?php the_field('region_activity_title') ?></h2>
      <div class="regionSlider--itemWrapper">
        <?php while (has_sub_field('region_activity_slider')): ?>
          <div class="regionSlider--item">
            <div class="regionSlider--item--image" style="background-image: url('<?php the_sub_field('region_activity_slider_image') ?>')"></div>
            <div class="regionSlider--item--content">
              <h3><?php the_sub_field('region_activity_slider_title') ?></h3>
              <p>
                <?php the_sub_field('region_activity_slider_text') ?>
              </p>
              <div class="moreInfos">
                <div class="moreInfos--left">
                  <div class="distance scrollMagic__smoothSlideLeft">
                    <?php if (get_sub_field('region_activity_slider_distance')): ?>
                      <i class="icon-sign distance--icon"></i>
                      <span class="distance--value ">
                        <?php the_sub_field('region_activity_slider_distance') ?>
                        km
                      </span>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="moreInfos--right scrollMagic__smoothSlideRight">
                  <?php $link = get_sub_field("region_activity_slider_link"); ?>
                  <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
      <a href="javascript:void(0);" class="regionSlider--prev regionSlider--action"><i class="icon-arrow-left"></i></a>
      <a href="javascript:void(0);" class="regionSlider--next regionSlider--action"><i class="icon-arrow-right"></i></a>
    </section>
  <?php endif; ?>
<?php endif; ?>

<?php $row = 0; ?>
<?php if (get_field('region_show_news')): ?>
  <?php if (get_field('region_news_selection')): ?>
    <section class="news">
      <h2 class="sectionTitle"><?php the_field('region_news_title') ?></h2>
      <div class="container">
        <div class="col-group col-group-top">
          <?php while (has_sub_field('region_news_selection')): ?>
            <?php
            if ($row % 2 === 0) {
              $scrollClass = 'scrollMagic__smoothSlideLeft';
            } else {
              $scrollClass = 'scrollMagic__smoothSlideRight';
            }
            ?>

            <div class="col col-1-2__xl col-1-1__m news--item <?php echo $scrollClass; ?>">
              <div class="news--item--img-wrapper" style="background-image: url('<?php the_sub_field('region_news_item_image') ?>')">
                <img src="<?php the_sub_field('region_news_item_image') ?>">
              </div>
              <h3 class="news--title"><?php the_sub_field('region_news_item_title') ?></h3>
              <i class="news--dates"><?php the_sub_field('region_news_item_date') ?></i>
              <p class="news--excerpt">
                <?php the_sub_field('region_news_item_exerpt') ?>
              </p>
              <div class="moreInfos">
                <div class="moreInfos--left">
                  <div class="distance scrollMagic__smoothSlideLeft">
                    <?php if (get_sub_field('region_news_item_distance')): ?>
                      <i class="icon-sign distance--icon"></i>
                      <span class="distance--value ">
                        <?php the_sub_field('region_news_item_distance') ?>
                        km
                      </span>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="moreInfos--right scrollMagic__smoothSlideRight">
                  <?php $link = get_sub_field("region_news_item_link"); ?>
                  <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                </div>
              </div>
            </div>
            <?php $row++; ?>
          <?php endwhile; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>
<?php endif; ?>

<?php if (get_field('region_show_selection')): ?>
  <section class="selection">
    <h2 class="sectionTitle">Notre séléction</h2>
    <div class="container">
      <div class="col-group col-group-middle">
        <?php
        $ids = get_field('regions_selections_selection');
        $args = array(
          'post_type' => 'selection',
          'post__in' => $ids,
          'orderby' => 'post__in'
        );

        $the_query = new WP_Query($args);
        $row = 0;
        ?>
        <? if ($the_query->have_posts()) : ?>
          <? while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <div class="col col-1-3__xl col-1-2__m col-1-1__s selection--item scrollMagic__smoothSlideUp">
              <?php
              if (get_field('selection_is_link')) {
                $link_object = get_field("selection_link");
                $link = $link_object['url'];
                $target = 'target="' .$link['target'] .'"';
                $class= '';
              } else {
                $link = '#selectionPopup'.$row;
                $css_class= 'open-popup-link';
                $target = '';
              }
              ?>
              <a href="<?php echo $link ?>" class="selection--item--wrapper<?php echo $css_class ?>" <?php echo $target; ?>>
                <div class="selection--item--component component--icon">
                  <?php if (get_field('selection_icon_type') == 'icomoon'): ?>
                    <i class="icon-<?php the_field('selection_icomoon_icon'); ?> "></i>
                  <? else: ?>
                    <i class="fa <?php the_field('selection_font_awesome_icon'); ?> "></i>
                  <? endif; ?>
                </div>
                <div class="selection--item--component">
                  <h3 class="selection--title"><?php the_field('selection_title') ?></h3>
                  <div class="distance scrollMagic__smoothSlideLeft">
                    <i class="icon-sign distance--icon"></i>
                    <span class="distance--value "><?php the_field('selection_distance') ?>
                      km</span>
                  </div>
                </div>
              </a>
            </div>
            <?php $row++ ?>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        <?php endif; ?>

      </div>
    </div>

    <?php
    $ids = get_field('regions_selections_selection');
    $args = array(
      'post_type' => 'selection',
      'post__in' => $ids,
      'orderby' => 'post__in'
    );

    $the_query = new WP_Query($args);
    $row = 0;
    ?>
    <? if ($the_query->have_posts()) : ?>
      <? while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <?php if (!get_field('selection_is_link')) : ?>
          <div id="selectionPopup<?php echo $row ?>" class="white-popup mfp-hide">
            <div class="popupcontent">
              <button title="Close (Esc)" type="button" class="mfp-close">×
              </button>
              <?php if (get_field('selection_show_critic')) : ?>
                <div class="wysiwyg--wrapper">
                  <?php the_field('selection_critic') ?>
                </div>
              <?php endif; ?>
              <?php

              $location = get_field('selection_adresse');
              if (!empty($location)):
                ?>
                <div class="acf-map">
                  <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                </div>
                <p style="text-align: right"><?php echo($location['address']) ?></p>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>
        <?php $row++ ?>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
    <?php endif; ?>
  </section>
<?php endif; ?>

<?php get_footer(); // This fxn gets the footer.php file and renders it ?>