<?php
/**
 * The template for displaying all single posts.
 *
 * @package fortunato
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>
				
				<?php
					the_post_navigation( array(
						'next_text' => '<div class="meta-nav" aria-hidden="true">' . esc_html__( 'Next Post', 'fortunato' ) . '</div> <i class="fa fa-lg fa-angle-right"></i>' .
							'<span class="screen-reader-text">' . esc_html__( 'Next post:', 'fortunato' ) . '</span> ' .
							'<span class="smallPart">%title</span>',
						'prev_text' => '<i class="fa fa-lg fa-angle-left"></i><div class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous Post', 'fortunato' ) . '</div> ' .
							'<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'fortunato' ) . '</span> ' .
							'<span class="smallPart">%title</span>',
					) );
				?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>
		<?php endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
