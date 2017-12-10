<?php
/**
 * The template for displaying any single page.
 *
 */

get_header(); // This fxn gets the header.php file and renders it ?>
<?php if (have_posts()) :
  // Do we have any posts in the databse that match our query?
  ?>

  <?php while (have_posts()) : the_post();
  // If we have a post to show, start a loop that will display it
  ?>

  <?php
  set_query_var('intro_section_image', get_the_post_thumbnail_url());
  set_query_var('intro_section_class', 'top_section--room');
  set_query_var( 'template_main_title', get_the_title());
  set_query_var( 'template_main_desc', '');
  set_query_var( 'color', '#908b8f');
  set_query_var( 'show_intro', true);
  get_template_part('partials/top_section');
  ?>

  <article class="post container">

    <div class="the-content">
      <?php the_content();
      // This call the main content of the page, the stuff in the main text box while composing.
      // This will wrap everything in p tags
      ?>

      <?php wp_link_pages(); // This will display pagination links, if applicable to the page ?>
    </div><!-- the-content -->

  </article>

<?php endwhile; // OK, let's stop the page loop once we've displayed it
  ?>

<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>

  <article class="post error">
    <h1 class="404">Nothing posted yet</h1>
  </article>

<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>

<?php get_footer(); // This fxn gets the footer.php file and renders it ?>