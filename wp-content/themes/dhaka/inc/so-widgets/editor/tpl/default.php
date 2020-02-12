<div class="editor-widget widget-margin-fix <?php echo esc_attr($instance['alignment']); ?>">
	<?php if ( ! empty( $instance['icon'] ) ) : ?>
		<div class="editor-icon">
			<?php $icon_styles = array();
			if(!empty($instance['icon_size'])) $icon_styles[] = 'font-size: '.intval($instance['icon_size']).'px';
			if(!empty($instance['icon_color'])) $icon_styles[] = 'color: '.$instance['icon_color'];
			echo  siteorigin_widget_get_icon( $instance['icon'], $icon_styles );
			?>
		</div>
	<?php endif; ?>
	<?php if ( ! empty( $instance['title'] ) ) : ?>
		<h1 class="page-header"><?php echo esc_html( $instance['title'] ); ?></h1>
	<?php endif; ?>
	<?php if ( ! empty( $instance['sub_title'] ) ) : ?>
		<h4 class="widget-sub-heading"><?php echo esc_html( $instance['sub_title'] ); ?></h4>
	<?php endif; ?>
	<?php if ( ! empty( $instance['texteditor'] ) ) : ?>
		<div class="editor-details">
			<?php echo wp_kses_post($instance['texteditor']); ?>
		</div>
	<?php endif; ?>
	<?php if ( ! empty( $instance['button_text'] ) ) : ?>
		<div class="editor-button"><a href="<?php echo  sow_esc_url($instance['button_url']); ?>" class="btn <?php echo  $instance['button_style']; ?>"><?php echo esc_html( $instance['button_text'] ); ?></a></div>
	<?php endif; ?>
</div>