<?php
/**
 * Call To Action widget.
 *
 * @package Dhaka
 */

class Dhaka_Title_Subtitle_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'dhaka-title-subtitle',
			__( 'Dhaka: Title', 'dhaka' ),
			array(
				'description' => __( 'A simple title and subtitle widget.', 'dhaka' ),
			),
			array(),
			array(
				'alignment' => array(
					'type' => 'select',
					'label' => __( 'Text Alignment', 'dhaka' ),
					'default' => 'text-left',
					'options' => array(
						'text-left' => __( 'Left', 'dhaka' ),
						'text-center' => __( 'Center', 'dhaka' ),
						'text-right' => __( 'Right', 'dhaka' ),
					)
				),
				'title' => array(
					'type'  => 'text',
					'label' => __( 'Title', 'dhaka' ),
				),
				'secondary_title' => array(
					'type'  => 'text',
					'label' => __( 'Secondary Title', 'dhaka' ),
				),
				'title_content' => array(
					'type'  => 'textarea',
					'label' => __( 'Sub Title', 'dhaka' ),
				),
			)
		);

	}

	function get_template_name( $instance ) {
		return 'default';
	}
}

siteorigin_widget_register( 'dhaka-title-subtitle', __FILE__, 'Dhaka_Title_Subtitle_Widget' );
