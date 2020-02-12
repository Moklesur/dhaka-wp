<div class="call-to-action-widget widget-margin-fix <?php echo esc_attr($instance['alignment']); ?>">
	<div class="cta-details">
		<?php if ( ! empty( $instance['title'] ) ) : ?>
			<?php echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'] ?>
		<?php endif; ?>
		<?php if ( ! empty( $instance['sub_title'] ) ) : ?>
			<h4 class="widget-sub-title"><?php echo esc_html( $instance['sub_title'] ); ?></h4>
		<?php endif; ?>
		<?php $this->sub_widget( 'SiteOrigin_Widget_Button_Widget', $args, $instance['button'] ) ?>
	</div>
</div>
