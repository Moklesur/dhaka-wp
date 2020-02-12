<div class="newsletter-details-widget widget-margin-fix <?php echo esc_attr($instance['alignment']); ?>">
	<?php if ( ! empty( $instance['title'] ) ) : ?>
		<?php echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'];  ?>
	<?php endif; ?>
	<?php if ( ! empty( $instance['text'] ) ) : ?>
		<p><?php echo esc_html( $instance['text'] ); ?></p>
	<?php endif; ?>
	<form action="<?php echo $instance['action_url']; ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
		<input type="email" class="form-control" name="EMAIL" id="newsletter-email" placeholder="<?php esc_attr_e( 'Your Email Address', 'dhaka' ) ?>" required="">
		<button type="submit" class="btn btn-default">Subscribe Now</button>
	</form>
</div>
