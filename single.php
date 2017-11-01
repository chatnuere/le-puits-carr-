<?php
/**
 * The template for displaying any single post.
 *
 */

get_header(); // This fxn gets the header.php file and renders it ?>


			<?php if ( have_posts() ) : 
			// Do we have any posts in the databse that match our query?
			?>

				<?php while ( have_posts() ) : the_post(); 
				// If we have a post to show, start a loop that will display it
				?>

        <section class="top_section top_section--room" style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
          <div class="mobile_logo">
            <div class="logo">
              <div class="icon-lpc__logo logo__icon"></div>
              <h2 class="logo__title"><?php ot_get_option('titre_logo'); ?></h2>
              <h3 class="logo__subtitle"><?php echo ot_get_option('sous_titre_logo'); ?></h3>
            </div>
          </div>
        </section>

        <div class="intro intro--room intro--region ">
          <div class="container container--small center">
            <h1 class="intro--title scrollMagic__introSlideup">
              <?php the_title(); ?>
            </h1>
          </div>
          <div class="intro--text">
            <div class="container container--small center">
              <p class="scrollMagic__smoothSlideUp">
              </p>
            </div>
          </div>
        </div>

					<article class="post container">

						<div class="the-content">
							<?php the_content(); 
							// This call the main content of the post, the stuff in the main text box while composing.
							// This will wrap everything in p tags
							?>
							
							<?php wp_link_pages(); // This will display pagination links, if applicable to the post ?>
						</div><!-- the-content
						
						<div class="meta clearfix">
							<div class="category"><?php echo get_the_category_list(); // Display the categories this post belongs to, as links ?></div>
							<div class="tags"><?php echo get_the_tag_list( '| &nbsp;', '&nbsp;' ); // Display the tags this post has, as links separated by spaces and pipes ?></div>
						</div><!-- Meta -->
						
					</article>

				<?php endwhile; // OK, let's stop the post loop once we've displayed it ?>
				
				<?php
					// If comments are open or we have at least one comment, load up the default comment template provided by Wordpress
					//if ( comments_open() || '0' != get_comments_number() )
					//	comments_template( '', true );
				?>


			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				
				<article class="post error">
					<h1 class="404">Nothing has been posted like that yet</h1>
				</article>

			<?php endif; // OK, I think that takes care of both scenarios (having a post or not having a post to show) ?>


<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
