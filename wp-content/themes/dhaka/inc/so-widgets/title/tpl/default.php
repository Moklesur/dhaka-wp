<div class="title-widget widget-margin-fix <?php echo esc_attr($instance['alignment']); ?>">
	<?php if ( ! empty( $instance['title'] ) ) : ?>
		<?php echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'] ?>
	<?php endif; ?>

	<?php if ( ! empty( $instance['secondary_title'] ) ) : ?>
		<h4 class="secondary-title"><?php echo esc_html( $instance['secondary_title'] ); ?></h4>
	<?php endif; ?>

	<?php if ( ! empty( $instance['title_content'] ) ) : ?>
		<div class="title-content">
			<?php echo esc_html( $instance['title_content'] ); ?>
		</div>
	<?php endif; ?>
</div><!-- .section-content -->
