<?php
	/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to finish 
	/* rendering the page and display the footer area/content
	/*-----------------------------------------------------------------------------------*/
?>

</main><!-- / end page container, begun in the header -->

<footer>
  <nav class="footer container">
    <div class="col-group col-group-center col-group-middle">
      <div class="col col-1-3__xl col-1-2__m col-1-1__s">
        <div class="footer--logo scrollMagic__footerOffset scrollMagic__smoothSlideLeft">
          <div class="logo">
            <div class="icon-lpc__logo logo__icon"></div>
            <h2 class="logo__title"><?php echo ot_get_option('titre_logo'); ?></h2>
            <h3 class="logo__subtitle"><?php echo ot_get_option('sous_titre_logo'); ?></h3>
          </div>
        </div>
        <a href="javascript:void(0)" class="footer-address scrollMagic__footerOffset scrollMagic__smoothSlideLeft">
          10, Impasse Pasquier<br>
          30190 Garrigues-Sainte-Eulalie
        </a>

        <a href="tel:<?php echo ot_get_option('t_l_phone___composer'); ?>" class="footer-tel scrollMagic__footerOffset scrollMagic__smoothSlideLeft">
          Tél : <?php echo ot_get_option('t_l_phone___afficher'); ?>
        </a>

      </div>
      <div class="col col-1-3__xl col-1-2__m col-1-1__m col-bottom">
        <?php wp_nav_menu(array('theme_location' => 'footer_1', 'menu_class' => 'footer--nav')); ?>
      </div>
      <div class="col col-1-3__xl col-1-1__s social__block">
        <a  href="contact.html" class="footer--social-tile scrollMagic__footerOffset scrollMagic__smoothSlideRight"><?php echo ot_get_option('titre_section_contact'); ?></a>
        <ul class="footer--social">
          <li class="footer--social-item item-facebook scrollMagic__footerOffset ">
            <a href="<?php echo ot_get_option('facebook'); ?>" class="footer--social-item-link" target="_blank"><i class="icon-facebook"></i></a>
          </li>
          <li class="footer--social-item item-instagram scrollMagic__footerOffset ">
            <a href="<?php echo ot_get_option('instagram'); ?>" class="footer--social-item-link" target="_blank"><i class="icon-instagram"></i></a>
          </li>
          <li class="footer--social-item item-airbnb scrollMagic__footerOffset ">
            <a href="<?php echo ot_get_option('air_b_b'); ?>" class="footer--social-item-link" target="_blank"><i class="icon-airbnb"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="copyrights scrollMagic__footerOffset scrollMagic__smoothSlideUp">
    <nav class="container">
      <?php wp_nav_menu(array('theme_location' => 'footer_2', 'menu_class' => 'footer_menu')); ?>
      <p class="copyrights--item">Copyright le puits carré</p>
    </nav>
  </div>
</footer>

<?php wp_footer(); 
// This fxn allows plugins to insert themselves/scripts/css/files (right here) into the footer of your website. 
// Removing this fxn call will disable all kinds of plugins. 
// Move it if you like, but keep it around.
?>

</body>
</html>
