<?php
/**
 * The template for displaying search results pages.
 *
 * @package fortunato
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php if ( have_posts() ) : ?>
			
				<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'archive' ) ) : ?>

					<header class="page-header">
						<h1 class="page-title">
						<?php
						/* translators: %s: search query */
						printf( esc_html__( 'Search Results for: %s', 'fortunato' ), '<span>' . get_search_query() . '</span>' );
						?>
						</h1>
					</header><!-- .page-header -->

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
						?>

					<?php endwhile; ?>

					<?php
						the_posts_pagination( array(
							'prev_text'          => __( '<i class="fa fa-angle-double-left spaceRight"></i>Previous', 'fortunato' ),
							'next_text'          => __( 'Next<i class="fa fa-angle-double-right spaceLeft"></i>', 'fortunato' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'fortunato' ) . ' </span>',
						) );
					?>
					
				<?php endif; ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
