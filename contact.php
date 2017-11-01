<?php
/**
 *  Template Name: Contact
 *
 *  This page template has a sidebar built into it,
 *  and can be used as a home page, in which case the title will not show up.
 *
 */
get_header(); // This fxn gets the header.php file and renders it ?>

  <section class="top_section top_section--room" style="background-image: url('<?php the_field('contact_background'); ?>')">
    <div class="mobile_logo">
      <div class="logo">
        <div class="icon-lpc__logo logo__icon"></div>
        <h2 class="logo__title"><?php ot_get_option('titre_logo'); ?></h2>
        <h3 class="logo__subtitle"><?php echo ot_get_option('sous_titre_logo'); ?></h3>
      </div>
    </div>
  </section>

<?php $color = get_field('contact_color'); ?>

  <div class="intro intro--room intro--room-voutes ">
    <div class="container container--small center">
      <h1 class="intro--title scrollMagic__introSlideup" style="background-color: <?php echo $color; ?>;">
        <?php the_field('contact_intro_title'); ?>
      </h1>
    </div>
    <div class="intro--text" style="background-color: <?php echo $color; ?>;">
      <div class="container container--small center">
        <p class="scrollMagic__smoothSlideUp">
          <?php the_field('contact_intro_description'); ?>
        </p>
      </div>
    </div>
  </div>


  <section class="airbnb">
    <h2 class="sectionTitle"><?php the_field('contact_bnb_title'); ?></h2>
    <div class="container">
      <div class="col-group col-group-middle">
        <div class="col col-2-3__xl col-1-1__m airbnb--item">
          <div class="airbnb--content scrollMagic__smoothSlideLeft">
            <p>
              <?php the_field('contact_bnb_text'); ?>
            </p>
          </div>
          <?php $link = get_field("contact_bnb_link"); ?>
          <a href="<?php echo $link['url']; ?>" class="btn btn__red inverted" target="<?php echo $link['target']; ?>">
            <?php echo $link['title']; ?>
          </a>
        </div>

        <div class="col col-1-3__xl airbnb--item col-center desktop__only scrollMagic__smoothSlideRight">
          <i class="icon-airbnbfull airbnb--icon"></i>
        </div>
      </div>
    </div>
  </section>

  <section class="contact--infos center">
    <h2 class="sectionTitle"><?php the_field('contact_phones_titleTexte'); ?></h2>
    <i class="icon-phone contact--icon"></i>
    <?php while (has_sub_field('contact_phones')): ?>
      <div class="contact--infos-phoneWrapper scrollMagic__bigSlideUp">
        <a href="tel:<?php the_sub_field('numero_a_composer') ?>"><?php the_sub_field('contact_phones_visible_number') ?></a>
      </div>
    <?php endwhile; ?>
  </section>

  <section class="contact--form">
    <div class="container">
      <div class="incon--wrapper center">
        <i class="icon-mail contact--icon"></i>
      </div>
      <?php
      $id = get_field('contact_form_id');
      echo do_shortcode('[contact-form-7 id="' . $id . '" title="Contact FR" html_class="material-form"]');
      ?>
    </div>
  </section>

  <div class="center marker--template" style="display: none">
    <h2 id="firstHeading"><i class="icon-lpc__logo"></i> <?php the_field('contact_map_title'); ?></h2>
    <div class="left infoWindow--content">
      <p>
        <?php the_field('contact_map_content'); ?>
      </p>
      <?php $link = get_field("contact_map_link"); ?>
      <a class=" btn btn__blue btn__large" target="<?php echo $link['target'] ?>" href="<?php echo $link['url'] ?>"><?php echo $link['title'] ?></a>
    </div>
  </div>

  <div class="container mapParent" data-mapinfo='<?php echo(json_encode($arr)); ?>'>
    <div id="map" class="scrollMagic__smoothSlideUp"></div>
  </div>

<?php get_footer(); // This fxn gets the footer.php file and renders it ?>