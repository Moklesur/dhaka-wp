<div class="team-widget widget-margin-fix <?php echo esc_attr($instance['alignment']); ?>">
	<?php if ( ! empty( $instance['title'] ) ) : ?>
		<?php echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'] ?>
	<?php endif; ?>
	<?php if ( ! empty( $instance['sub_title'] ) ) : ?>
		<h4 class="widget-sub-title"><?php echo esc_html( $instance['sub_title'] ); ?></h4>
	<?php endif; ?>
	<div class="row">
		<?php foreach( $instance['members'] as $i => $team ) : ?>
			<div class="col-md-<?php echo esc_attr( $instance['per_row'] ); ?> col-sm-6 col-xs-12 team-fix">
				<div class="team-image">
					<?php
					$profile_picture = $team['profile_picture'];
					$profile_picture_fallback = $team['profile_picture_fallback'];
					$image_details = siteorigin_widgets_get_attachment_image_src(
						$profile_picture,
						'full',
						$profile_picture_fallback
					);
					if ( ! empty( $image_details ) ) {
						echo '<img src="' . esc_url( $image_details[0] ) . '" />';
					}
					?>
					<?php if ( ! empty( $team['fb'] ) || ! empty( $team['tw'] ) || ! empty( $team['li'] ) || ! empty( $team['ins'] ) ) : ?>
					<ul class="team-social list-inline">
						<?php if ( ! empty( $team['fb'] ) ) : ?>
							<li><a href="<?php echo esc_url( $team['fb'] ); ?>"><i class="fa fa-facebook"></i></a></li>
						<?php endif; ?>
						<?php if ( ! empty( $team['tw'] ) ) : ?>
							<li><a href="<?php echo esc_url( $team['tw'] ); ?>"><i class="fa fa-twitter"></i></a></li>
						<?php endif; ?>
						<?php if ( ! empty( $team['li'] ) ) : ?>
							<li><a href="<?php echo esc_url( $team['li'] ); ?>"><i class="fa fa-linkedin"></i></a></li>
						<?php endif; ?>
						<?php if ( ! empty( $team['ins'] ) ) : ?>
							<li><a href="<?php echo esc_url( $team['ins'] ); ?>"><i class="fa fa-instagram"></i></a></li>
						<?php endif; ?>
					</ul>
					<?php endif; ?>
				</div>
				<div class="team-info">
					<?php if ( ! empty( $team['full_name'] ) ) : ?>
						<h4><?php echo esc_html( $team['full_name'] ); ?></h4>
					<?php endif; ?>
					<?php if ( ! empty( $team['bio'] ) ) : ?>
						<p><?php echo esc_html( $team['bio'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $team['position'] ) ) : ?>
						<h5><?php echo esc_html( $team['position'] ); ?></h5>
					<?php endif; ?>
				</div>
			</div>
		<?php endforeach; ?>

	</div>
</div>
