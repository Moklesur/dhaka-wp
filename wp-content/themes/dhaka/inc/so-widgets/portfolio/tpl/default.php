<div class="portfoilo-widget widget-margin-fix row <?php echo esc_attr($instance['alignment']); ?>">
	<div class="col-md-12 col-sm-12 col-xs-12 isotop-portfolio text-uppercase">
		<?php if ( ! empty( $instance['title'] ) ) : ?>
			<h3 class="widget-title"><?php echo esc_html( $instance['title'] ); ?></h3>
		<?php endif; ?>
		<ul class="list-inline">
			<li><a href="#" data-filter="*" class="current">All</a></li>
			<?php foreach( $instance['portfolio_category'] as $i => $portfolio_category ) : ?>
				<li><a href="#" data-filter=".<?php echo esc_html( $portfolio_category['title'] ); ?>"><?php echo esc_html( $portfolio_category['title'] ); ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="row">
			<div class="dhaka-portfolio-list">
				<?php foreach( $instance['portfolio'] as $i => $portfolio ) : ?>
					<div class="<?php echo esc_attr( $portfolio['title'] ); ?> col-md-<?php echo esc_attr( $instance['per_row'] ); ?> col-sm-6 col-xs-6 dhaka-isotop">
						<?php
						$profile_picture = $portfolio['profile_picture'];
						$image_details = siteorigin_widgets_get_attachment_image_src(
							$profile_picture, '', ''
						);
						if ( ! empty( $image_details ) ) {
							echo '<a href="'.sow_esc_url( $portfolio['button_url'] ).'" class="portfolio-url" target="_blank"><img src="' . esc_url( $image_details[0] ) . '" class="img-responsive" /></a>';
						} ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
