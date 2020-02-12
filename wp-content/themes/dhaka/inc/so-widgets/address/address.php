<?php
/**
 * Address widget.
 *
 * @package Dhaka
 */

class Dhaka_Address_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'dhaka-address',
			__( 'Dhaka: Address', 'dhaka' ),
			array(
				'description' => __( 'Displays Contact Address Details', 'dhaka' ),
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
					'type' => 'text',
					'label' => __( 'Title', 'dhaka' ),
				),
				'sub_title' => array(
					'type'  => 'text',
					'label' => __( 'Sub Title', 'dhaka' ),
				),
				'address_repeater' => array(
					'type'      => 'repeater',
					'label'     => __( 'Enter Contact Details.', 'dhaka' ),
					'item_name' => __( 'Details', 'dhaka' ),
					'item_label' => array(
						'selector'     => "[id*='prefix-dhaka-address-contact']",
						'update_event' => 'change',
						'value_method' => 'val',
					),
					'fields' => array(
						'icon' => array(
							'type'  => 'icon',
							'label' => __( 'Select Icon', 'dhaka' ),
						),
						'icon_size' => array(
							'type'  => 'number',
							'label' => __( 'Icon Font Size', 'dhaka' ),
							'default' => '18'
						),
						'icon_color' => array(
							'type'  => 'color',
							'label' => __( 'Icon Color', 'dhaka' ),
							'default' => '#000'
						),
						'contact' => array(
							'type'  => 'text',
							'label' => __( 'Enter Title like Phone Number / Address / E-Mail', 'dhaka' ),
						),
						'contact_detail' => array(
							'type'  => 'text',
							'label' => __( 'Enter Details for Above Fields', 'dhaka' ),
						),
					),
				),
			)
		);

	}

	function get_template_name( $instance ) {
		return 'default';
	}
}

siteorigin_widget_register( 'dhaka-address', __FILE__, 'Dhaka_Address_Widget' );
