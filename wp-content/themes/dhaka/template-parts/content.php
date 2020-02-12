<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dhaka
 */
$margin[] = '';
if (  is_home() || is_archive()  ) :
	$margin[] = 'col-md-12 col-sm-12 col-xs-12 ';
endif;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($margin); ?>>
	<div class="post-items">
		<?php if ( has_post_thumbnail() ) : ?>
		<div class="entry-thumb">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'before' => 'Permalink to: ', 'after' => '' ) ); ?>"><?php the_post_thumbnail('full'); ?></a>
		</div>
		<?php endif; ?>
		<header class="entry-header">
			<?php
			if ( is_single() ) :
				the_title( '<h2 class="entry-title">', '</h2>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta small">
					<?php dhaka_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php
			endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php if (  !is_home() && !is_archive()  ) : ?>
				<?php the_content(); ?>
			<?php else : ?>
				<?php the_excerpt(); ?>
				<a href="<?php the_permalink(); ?>" class="read-more text-capitalize"><?php _e( 'read more', 'dhaka' )?></a>
			<?php endif; ?>
		</div><!-- .entry-content -->
		<?php if (  !is_home() && !is_archive()  ) : ?>
			<footer class="entry-footer">
				<?php dhaka_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</div>

</article><!-- #post-## -->
