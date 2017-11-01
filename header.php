<?php
/*-----------------------------------------------------------------------------------*/
/* This template will be called by all other template files to begin
  /* rendering the page and display the header/nav
  /*-----------------------------------------------------------------------------------*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>"/>
  <meta name="viewport" content="width=device-width"/>
  <title>
      <?php bloginfo('name'); // show the blog name, from settings ?> |
      <?php is_front_page() ? bloginfo('description') : wp_title(''); // if we're on the home page, show the description, from the site's settings - otherwise, show the title of the post or page ?>
  </title>

  <link rel="profile" href="http://gmpg.org/xfn/11"/>
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <?php // We are loading our theme directory style.css by queuing scripts in our functions.php file,
    // so if you want to load other stylesheets,
    // I would load them with an @import call in your style.css
    ?>

    <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>

    <?php wp_head();
    // This fxn allows plugins, and Wordpress itself, to insert themselves/scripts/css/files
    // (right here) into the head of your website.
    // Removing this fxn call will disable all kinds of plugins and Wordpress default insertions.
    // Move it if you like, but I would keep it around.
    ?>

</head>

<body id="<?php $admin_id ?>"
    <?php body_class();
    // This will display a class specific to whatever is being loaded by Wordpress
    // i.e. on a home page, it will return [class="home"]
    // on a single post, it will return [class="single postid-{ID}"]
    // and the list goes on. Look it up if you want more.
    ?>
>

<header class="menu">
  <nav class="menu__fixed ">

    <div class="menu__leftBtns">
      <div class="menu__btn__wrapper ">
        <a href="javascript:void(0);">
          <div class="menu__burger">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
          </div>
        </a>
      </div>

      <?php wp_nav_menu(array('theme_location' => 'fixed_header', 'menu_class' => 'menu__contact')); ?>

    </div>
    <div class="menu__logo__wrapper">
      <a href="<?php echo esc_url(home_url('/')); // Link to the home page ?>" class="menu__logo ">
        <div class="logo">
          <div class="icon-lpc__logo logo__icon"></div>
          <h2 class="logo__title"><?php echo ot_get_option('titre_logo'); ?></h2>
          <h3 class="logo__subtitle"><?php echo ot_get_option('sous_titre_logo'); ?></h3>
        </div>
      </a>
    </div>
    <div class="menu__languages">
        <?php pll_the_languages() ?>
    </div>

    <div class="menu__panel left col">
        <?php $walker = new Menu_With_Description; ?>
        <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'menu__panel--wrapper', 'walker' => $walker)); ?>
    </div>
  </nav>
</header>

<main><!-- start the page containter -->
