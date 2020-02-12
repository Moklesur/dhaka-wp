<div class="fact-widget widget-margin-fix <?php echo esc_attr($instance['alignment']); ?>">
	<?php if ( ! empty( $instance['title'] ) ) : ?>
		<div class="<?php echo $instance['alignment']; ?>-heading">
			<h1 class="page-header"><?php echo esc_html( $instance['title'] ); ?></h1>
		</div>
	<?php endif; ?>
	<ul class="fact-list list-inline">
		<?php foreach( $instance['fact'] as $i => $fact ) :
			echo '<li><div class="fact-inner"><h1><span>'.esc_html($fact['title']).'</span></h1><div>'.wp_kses_post($fact['texteditor']).'</div></div></li>';
		endforeach; ?>
	</ul>
</div>
