<?php
/**
 *  Template Name: Accueil
 *
 *  This page template has a sidebar built into it,
 *  and can be used as a home page, in which case the title will not show up.
 *
 */
get_header(); // This fxn gets the header.php file and renders it

set_query_var( 'intro_section_image', get_field('home_top_section_image'));
set_query_var( 'intro_section_class', 'home');
set_query_var( '$show_intro', false);
get_template_part( 'partials/top_section' );
?>

<?php if (get_field("home_show_welcome_section")): ?>
  <div class="welcome">
    <div class="container">
      <div class="col-group col-group-center col-group-middle">
        <div class="col col-1-3__xl col-1-1__s col-center">
          <h2 class="welcome__title scrollMagic__smoothSlideLeft"><?php the_field('home_welcome_title'); ?></h2>
        </div>
        <div class="col col-2-3__xl col-1-1__m welcome__content scrollMagic__smoothSlideUp">
          <div class="welcome__text ">
            <p><?php the_field('home_welcome_text'); ?></p>
          </div>
          <?php if (get_field("home_welcome_show_link")): ?>
            <?php $link = get_field("home_welcome_link"); ?>
            <a class="btn btn__brown welcome__btn" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php if (get_field("home_show_showcase")): ?>
  <div class="rooms__wrapper">
    <div class="container">
      <?php
      $row = 0;
      $ids = get_field('home_showcases');
      $args = array(
        'post_type' => 'showcase',
        'post__in' => $ids,
        'orderby' => 'post__in'
      );

      $the_query = new WP_Query($args);
      ?>


      <? if ($the_query->have_posts()) : ?>
        <? while ($the_query->have_posts()) : $the_query->the_post(); ?>
          <?php if ($row % 2 === 0) : ?>

            <div class="room anim__tweenOdd" id="tweenOdd-<?php echo $row ?>">
              <div class="col-group col-group-center col-group-middle">
                <div class="col col-1-2__xl col-1-1__m room__image-wrapper">
                  <img src="<?php the_field('showcase_list_image'); ?>" class="room__image">
                </div>
                <div class="col col-1-2__xl col-1-1__m room__text-wrapper">
                  <h2 class="room__text-title room__text-title-right">
                    <?php the_field('showcase_list_little_title'); ?>
                    <span class="room__text-title-return">
                  <?php the_field('showcase_list_title'); ?>
                </span>
                  </h2>
                  <div class="room__text-content">
                    <p><?php the_field('showcase_list_excerpt'); ?></p>
                  </div>
                  <?php if (get_field("showcase_list_show_links")): ?>
                    <?php if (get_field('showcase_list_links')): ?>
                      <div class="room__text-actions right">
                        <?php while (has_sub_field('showcase_list_links')): ?>
                          <?php $link = get_sub_field("showcase_list_links_item"); ?>
                          <a class="btn btn__black inverted btn__smal" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                        <?php endwhile; ?>
                      </div>
                    <?php endif; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>


          <?php else: ?>
            <div class="room room-left anim__tweenEven" id="tweenEven-<?php echo $row ?>">
              <div class="col-group col-group-center col-group-middle">
                <div class="col col-1-2__xl col-1-1__m room__image-wrapper mobile__only">
                  <img src="<?php the_field('showcase_list_image'); ?>" class="room__image">
                </div>
                <div class="col col-1-2__xl col-1-1__m room__text-wrapper">
                  <h2 class="room__text-title room__text-title-right">
                    <?php the_field('showcase_list_little_title'); ?>
                    <span class="room__text-title-return">
                      <?php the_field('showcase_list_title'); ?>
                   </span>
                  </h2>
                  <div class="room__text-content">
                    <p><?php the_field('showcase_list_excerpt'); ?></p>
                  </div>
                  <?php if (get_field("showcase_list_show_links")): ?>
                    <?php if (get_field('showcase_list_links')): ?>
                      <div class="room__text-actions right">
                        <?php while (has_sub_field('showcase_list_links')): ?>
                          <?php $link = get_sub_field("showcase_list_links_item"); ?>
                          <a class="btn btn__black inverted btn__smal" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                        <?php endwhile; ?>
                      </div>
                    <?php endif; ?>
                  <?php endif; ?>
                </div>
                <div class="col col-1-2__xl col-1-1__m room__image-wrapper desktop__only">
                  <img src="<?php the_field('showcase_list_image'); ?>" class="room__image">
                </div>
              </div>
            </div>
          <?php endif; ?>
          <?php $row++; ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
      <?php endif; ?>
    </div>
  </div>
<?php endif; ?>


  <div class="discover" style="background-image: url('<?php the_field('home_region_image'); ?>');">
    <img src="<?php the_field('home_region_image'); ?>" class="mobile__only discover__mobile-image">
    <div class="container noPadding">



        <div class=" discover__text-wrapper">
          <h2 class="discover__title scrollMagic__smoothSlideLeft">
            <?php the_field('home_region_title_up'); ?>
            <span class="discover__title-featured scrollMagic__smoothSlideLeft">
            <?php the_field('home_region_title_middle'); ?>
          </span>
            <?php the_field('home_region_title_bottom'); ?>
          </h2>
          <div class="discover__text-content scrollMagic__smoothSlideLeft">
            <p>
              <?php the_field('home_region_description'); ?>
            </p>
          </div>
          <?php if (get_field("home_region_link")): ?>
            <?php $link = get_field("home_region_link"); ?>
            <a class="btn btn__gold btn-discover btn__big scrollMagic__bigSlideUp" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
          <?php endif; ?>

      </div>
    </div>
  </div>


<?php get_footer(); // This fxn gets the footer.php file and renders it ?>



