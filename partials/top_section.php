<section class="top_section <?php echo $intro_section_class ?>" style="background-image: url('https://www.ups.com/assets/resources/images/ajax-loader-transparent.gif');background-color: <?php echo $color; ?>;">
  <div class="top_section--img" style="background-image: url('<?php echo $intro_section_image ?>');">
    <div class="mobile_logo">
      <div class="logo">
        <div class="icon-lpc__logo logo__icon"></div>
        <h2 class="logo__title"><?php ot_get_option('titre_logo'); ?></h2>
        <h3 class="logo__subtitle"><?php echo ot_get_option('sous_titre_logo'); ?></h3>
      </div>
    </div>

    <div class="cta_svgWrapper">
      <i class="icon-scroll"></i>
    </div>
    <?php if ($show_intro): ?>
      <div class="container container--small center mobile__only mobile_intro--title" style="background-color: <?php echo $color; ?>;">
        <h1 class="intro--title" style="background-color: <?php echo $color; ?>;">
          <?php echo $template_main_title; ?>
        </h1>
      </div>
    <?php endif; ?>
  </div>
  <?php if ($show_intro): ?>
    <?php
    if ($template_main_desc == ''){
      $text_class = 'notIntroDesc';
      $scrollClass = '';
    }else{
      $text_class = '';
      $scrollClass = 'scrollMagic__smoothSlideUp';
    }
    ?>
  <div class="intro intro--room intro--room-voutes <?php echo $scrollClass; ?>">
    <div class="container container--small center desktop__only" style="background-color: <?php echo $color; ?>;">
      <h1 class="intro--title" style="background-color: <?php echo $color; ?>;">
        <?php echo $template_main_title; ?>
      </h1>
    </div>

      <div class="intro--text <?php echo $text_class; ?>" style="background-color: <?php echo $color; ?>;">
        <div class="container container--small center">
          <p class="">
            <?php echo $template_main_desc; ?>
          </p>
        </div>
      </div>
  </div>
  <?php endif; ?>
</section>