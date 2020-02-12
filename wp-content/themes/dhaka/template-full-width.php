<?php
/**
 * Template Name: Full Width
 *
 * @package dhaka
 * @subpackage dhaka
 */
get_header(); ?>
    <div id="primary" class="content-area">
        <main id="main" class="full-width-page site-main" role="main">
            <div class="full-width">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 <?php if( !is_front_page() ) echo "margin-top-60"; ?>">
                        <?php
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content', 'page' );

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                        endwhile; // End of the loop.
                        ?>
                    </div>
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php

get_footer();