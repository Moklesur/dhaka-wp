<div class="contact-details-widget widget-margin-fix <?php echo esc_attr($instance['alignment']); ?>">
	<?php if ( ! empty( $instance['title'] ) ) : ?>
		<?php echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'] ?>
	<?php endif; ?>
	<?php if ( ! empty( $instance['sub_title'] ) ) : ?>
		<h4 class="widget-sub-title"><?php echo esc_html( $instance['sub_title'] ); ?></h4>
	<?php endif; ?>
	<?php
	if ( ! empty( $instance['address_repeater'] ) ) : ?>
		<ul class="list-unstyled">
			<?php foreach ( $instance['address_repeater'] as $item ) : ?>
				<li>
					<div>
						<?php if ( ! empty( $item['icon'] ) ) : ?>
							<span class="contact-icon">
								<?php  $icon_styles = array();
								if(!empty($item['icon_size'])) $icon_styles[] = 'font-size: '.intval($item['icon_size']).'px';
								if(!empty($item['icon_color'])) $icon_styles[] = 'color: '.$item['icon_color'];
								echo  siteorigin_widget_get_icon( $item['icon'], $icon_styles );
								?>
							</span>
						<?php endif; ?>
						<?php if ( ! empty( $item['contact'] ) ) : ?>
							<span class="contact-title"><?php echo esc_html( $item['contact'] ); ?></span>
						<?php endif; ?>
						<?php if ( ! empty( $item['contact_detail'] ) ) : ?>
							<span class="contact-detail"><?php echo esc_html( $item['contact_detail'] ); ?></span>
						<?php endif; ?>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</div>
