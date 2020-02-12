<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dhaka
 */
$margin[] = 'search-wrap';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($margin); ?>>
	<div class="entry-summary">
		<?php
		the_title( '<h2 class="entry-title search-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		the_excerpt();
		?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php dhaka_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
