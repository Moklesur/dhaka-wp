<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dhaka
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-9 col-sm-9 col-xs-12 margin-top-60">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<?php the_archive_title( '<h2 class="entry-title archive-title">', '</h2>' ); ?>
							</div>
							<?php
							if ( have_posts() ) : ?>
								<?php
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									/*
                                     * Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                     */
									get_template_part( 'template-parts/content', get_post_format() );

								endwhile;

								?><div class="col-md-12 col-sm-12 col-xs-12"><?php the_posts_navigation(); ?></div><?php

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif; ?>
						</div>
					</div>
					<?php get_sidebar(); ?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
