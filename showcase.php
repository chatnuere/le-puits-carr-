<?php
/**
 *  Template Name: Vitrine
 *
 *  This page template has a sidebar built into it,
 *  and can be used as a home page, in which case the title will not show up.
 *
 */
get_header(); // This fxn gets the header.php file and renders it ?>
<?php
$row = 0;
$ids = get_field('page_showcase_id');
$args = array(
  'post_type' => 'showcase',
  'post__in' => [$ids],
  'orderby' => 'post__in'
);

$the_query = new WP_Query($args);
?>

<? if ($the_query->have_posts()) : ?>
  <? while ($the_query->have_posts()) : $the_query->the_post(); ?>

    <?php
      set_query_var('intro_section_image', get_field('showcase_detail_background'));
      set_query_var('intro_section_class', 'top_section--room');
      set_query_var( 'template_main_title', get_field('showcase_detail_intro_title'));
      set_query_var( 'template_main_desc', get_field('showcase_detail_intro description'));
      set_query_var( 'color', get_field('showcase_detail_color'));
      set_query_var( 'show_intro', true);
      get_template_part('partials/top_section');
    ?>

    <?php if (get_field('showcase_detail_modules')): ?>

      <?php
      $house_class = '';
      $row = 0;
      if (get_field('showcase_detail_is_room')) {
        $house_class = "rooms__wrapper--house";
      }
      ?>
      <div class="rooms__wrapper <?php echo $house_class; ?>">
        <?php while (has_sub_field('showcase_detail_modules')): ?>
          <div class="container">
            <?php if ($row % 2 === 0) : ?>
              <div class="room room-bigpicture anim__roomtweenOdd" id="roomtweenOdd-<?php $row ?>">
                <div class="col-group col-group-center col-group-middle">
                  <div class="col col-2-3__xl col-1-1__s room__image-wrapper">
                    <img src="<?php the_sub_field('showcase_detail_module_image'); ?>" class="room__image">
                  </div>
                  <div class="col col-1-3__xl col-1-1__s room__text-wrapper">
                    <h2 class="room__text-title room__text-title-right">
                      <span class="room__text-title-return room__text-title-return--nocaps"><?php the_sub_field('showcase_detail_module_titre'); ?></span>
                    </h2>
                    <div class="room__text-content">
                      <p>
                        <?php the_sub_field('showcase_detail_module_contenu'); ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            <?php else: ?>
              <div class="room anim__roomtweenEven" id="roomtweenEven-<?php $row ?>">
                <div class="col-group col-group-center col-group-middle">
                  <div class="col col-1-2__xl col-1-1__s room__image-wrapper mobile__only">
                    <img src="<?php the_sub_field('showcase_detail_module_image'); ?>" class="room__image">
                  </div>

                  <div class="col col-1-2__xl col-1-1__s room__text-wrapper">
                    <h2 class="room__text-title room__text-title-right">
                      <span class="room__text-title-return no-return room__text-title-return--nocaps"><?php the_sub_field('showcase_detail_module_titre'); ?></span>
                    </h2>
                    <div class="room__text-content with-return">
                      <p>
                        <?php the_sub_field('showcase_detail_module_contenu'); ?>
                      </p>
                    </div>
                  </div>
                  <div class="col col-1-2__xl col-1-1__s room__image-wrapper desktop__only">
                    <img src="<?php the_sub_field('showcase_detail_module_image'); ?>" class="room__image">
                  </div>
                </div>
              </div>
            <?php endif; ?>
          </div>
          <?php if (get_sub_field("showcase_detail_module_show_blockquote")): ?>
            <section class="blockquote center" style="background-image: url('<?php echo $color; ?>')">
              <p class="blockquote--text scrollMagic__smoothSlideUp">
                “<?php the_sub_field('showcase_detail_module_citation'); ?>”
              </p>
              <div class="blockquote--author scrollMagic__smoothSlideLeft">
                <?php the_sub_field('showcase_detail_module_blockquote_author'); ?>
              </div>
            </section>
          <?php endif; ?>
          <?php $row++; ?>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>

    <?php if (get_field('showcase_detail_show_carrousel')): ?>
      <?php if (get_field('showcase_detail_carrousel')): ?>
        <section class="simpleSlider">
          <div class="simpleSlider--itemWrapper">
            <?php while (has_sub_field('showcase_detail_carrousel')): ?>
              <a href="<?php the_sub_field('showcase_detail_carrousel_image'); ?>" class="simpleSlider--item galleryItem">
              <img src="<?php the_sub_field('showcase_detail_carrousel_image'); ?>" >
              </a>
            <?php endwhile; ?>
          </div>
          <a href="javascript:void(0);" class="simpleSlider--prev simpleSlider--action"><i class="icon-arrow-left"></i></a>
          <a href="javascript:void(0);" class="simpleSlider--next simpleSlider--action"><i class="icon-arrow-right"></i></a>
        </section>
      <?php endif; ?>
    <?php endif; ?>
    <?php if (get_field('showcase_detail_is_room')): ?>
      <?php if (get_field('showcase_detail_show_included')): ?>
        <section class="roomIncluded">
          <div class="container center">
            <h2 class="roomIncluded--title scrollMagic__smoothSlideUp">
              <?php the_field('showcase_detail_services_title'); ?>
            </h2>
            <div class="col-group col-group-center col-group-middle">
              <?php if (get_field('showcase_detail_services_list')): ?>
                <?php while (has_sub_field('showcase_detail_services_list')): ?>
                  <div class="col col-1-3__xl col-1-2__s col-center  roomIncluded--item scrollMagic__smoothSlideUp">
                    <?php if (get_sub_field('showcase_detail_services_icon_type') == 'icomoon'): ?>
                      <i class="icon-<?php the_sub_field('showcase_detail_services_icon_icomoon'); ?> roomIncluded--item-icon"></i>
                    <? else: ?>
                      <i class="fa <?php the_sub_field('showcase_detail_services_icon_font_awesome'); ?> roomIncluded--item-icon"></i>
                    <? endif; ?>
                    <p class="roomIncluded--item-legend"> <?php the_sub_field('showcase_detail_service_title'); ?></p>
                  </div>
                <?php endwhile; ?>
              <? endif; ?>
            </div>
          </div>
        </section>
      <? endif; ?>
    <? endif; ?>

    <?php if (get_field('showcase_detail_is_room')): ?>
      <?php if (get_field('showcase_detail_show_pricing')): ?>
        <section class="prices">
          <div class="container center">
            <div class="col-group col-group-center col-group-middle">
              <div class="col col-2-4__xl col-1-1__m col-center prices--item prices--item-text scrollMagic__smoothSlideLeft">
                <h3 class="prices--title"><?php the_field('showcase_detail_pricing_title'); ?></h3>
                <?php if (get_field('showcase_detail_pricing_show_description')): ?>
                  <p class="prices--text">
                    <?php the_field('showcase_detail_pricing_description'); ?>
                  </p>
                <? endif; ?>
              </div>
              <?php if (get_field('showcase_detail_pricing_seasons')): ?>
                <?php while (has_sub_field('showcase_detail_pricing_seasons')): ?>
                  <div class="col col-1-4__xl col-2-4__m col-center prices--item  prices--item-priceBlock">
                    <div class="prices--heading scrollMagic__smoothSlideUp">
                      <h4><?php the_sub_field('showcase_detail_pricing_season_title'); ?></h4>
                      <i><?php the_sub_field('showcase_detail_pricing_season_subtitle'); ?></i>
                    </div>
                    <h3 class="prices--number scrollMagic__smoothSlideRight">
                      <?php the_sub_field('showcase_detail_pricing_season_price'); ?>
                      <span class="prices--currency"><?php the_field('showcase_detail_pricing_currency'); ?></span>
                    </h3>
                  </div>
                <?php endwhile; ?>
              <? endif; ?>
            </div>

            <?php if (get_field("showcase_detail_pricing_show_link")): ?>
              <?php $link = get_field("showcase_detail_pricing_link"); ?>
              <a class="btn btn__black btn__block inverted btn__strong" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
            <?php endif; ?>
          </div>
        </section>
      <? endif; ?>
    <? endif; ?>

    <section class="roomNavigation">
      <div class="container center">
        <div class="col-group col-group-center col-group-middle">
          <div class="col col-1-2__xl">
            <?php $link = get_field("showcase_detail_previous_showcase_link"); ?>
            <a href="<?php echo $link['url']; ?>" class="roomNavigation--btn roomNavigation--btn-left scrollMagic__smoothSlideLeft" target="<?php echo $link['target']; ?>">
              <i class="icon-arrow-left roomNavigation--btn-arrow"></i>
              <span>
                <?php echo $link['title']; ?>
              </span>
              <div class="roomNavigation--btn-bg" style="background-color: <?php the_field('showcase_detail_previous_showcase_color'); ?>"></div>
            </a>
          </div>
          <div class="col col-1-2__xl col-right">
            <?php $link = get_field("showcase_detail_next_showcase_link"); ?>
            <a href="<?php echo $link['url']; ?>" class="roomNavigation--btn roomNavigation--btn-right scrollMagic__smoothSlideRight" target="<?php echo $link['target']; ?>">
          <span>
           <?php echo $link['title']; ?>
          </span>
              <i class="icon-arrow-right roomNavigation--btn-arrow"></i>
              <div class="roomNavigation--btn-bg" style="background-color: <?php the_field('showcase_detail_next_showcase_color'); ?>"></div>
            </a>
          </div>
        </div>
      </div>
    </section>
  <?php endwhile; ?>
  <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>