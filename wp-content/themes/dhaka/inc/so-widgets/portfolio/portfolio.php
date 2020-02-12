<?php
/**
 * Portfolio widget.
 *
 * @package dhaka
 */

class Dhaka_Portfolio_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'dhaka-portfolio-widget',
			__( 'Dhaka Portfolio', 'dhaka' ),
			array(
				'description' => __( 'Displays Portfolio Widget', 'dhaka' ),
			),
			array(),
			array(
				'title' => array(
					'type'  => 'text',
					'label' => __( 'Title', 'dhaka' ),
				),
				'alignment' => array(
					'type' => 'select',
					'label' => __( 'Text Alignment', 'dhaka' ),
					'default' => 'text-center',
					'options' => array(
						'text-left' => __( 'Text Left', 'dhaka' ),
						'text-center' => __( 'Text Center', 'dhaka' ),
						'text-right' => __( 'Text Right', 'dhaka' ),
					)
				),
				'portfolio_category' => array(
					'type'       => 'repeater',
					'label'      => __( 'Category', 'dhaka' ),
					'item_name'  => __( 'Item', 'dhaka' ),
					'item_label' => array(
						'selector'     => "[id*='prefix-dhaka-portfolio-category-']",
						'update_event' => 'change',
						'value_method' => 'val',
					),
					'fields' => array(
						'title' => array(
							'type'     => 'text',
							'label'    => __( 'Title', 'dhaka' )
						),
					),
				),
				'portfolio' => array(
					'type'       => 'repeater',
					'label'      => __( 'Portfolio', 'dhaka' ),
					'item_name'  => __( 'Item', 'dhaka' ),
					'item_label' => array(
						'selector'     => "[id*='prefix-dhaka-portfolio-']",
						'update_event' => 'change',
						'value_method' => 'val',
					),
					'fields' => array(
						'profile_picture' => array(
							'type'     => 'media',
							'library'  => 'image',
							'label'    => __( 'Image', 'dhaka' ),
							'fallback' => true,
						),
						'button_url' => array(
							'type' => 'link',
							'label' => __('Button URL', 'dhaka'),
							'default' => ''
						),
						'title' => array(
							'type'     => 'text',
							'label'    => __( 'Past The Category Tile', 'dhaka' )
						),
					),
				),
				'per_row' => array(
					'type'    => 'select',
					'label'   => __( 'per row', 'dhaka' ),
					'default' => 3,
					'options' => array(
						'12' => 1,
						'6' => 2,
						'4' => 3,
						'3' => 4,
					),
				),
			)
		);
	}

	function get_template_name( $instance ) {
		return 'default';
	}
}

siteorigin_widget_register( 'dhaka-portfolio-widget', __FILE__, 'Dhaka_Portfolio_Widget' );
