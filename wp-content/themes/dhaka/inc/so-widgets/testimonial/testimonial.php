<?php
/**
 * Testimonial widget.
 *
 * @package dhaka
 */

class Dhaka_Testimonial_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'dhaka-testimonial-widget',
			__( 'Dhaka Testimonial', 'dhaka' ),
			array(
				'description' => __( 'Testimonial Widget', 'dhaka' ),
			),
			array(),
			array(
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
				'title' => array(
					'type'  => 'text',
					'label' => __( 'Title', 'dhaka' ),
				),

				'testimonial' => array(
					'type'       => 'repeater',
					'label'      => __( 'Testimonial', 'dhaka' ),
					'item_name'  => __( 'Item', 'dhaka' ),
					'item_label' => array(
						'selector'     => "[id*='prefix-dhaka-testimonial-']",
						'update_event' => 'change',
						'value_method' => 'val',
					),
					'fields' => array(
						'name' => array(
							'type'  => 'text',
							'label' => __( 'Name', 'dhaka' ),
						),
						'texteditor' => array(
							'type' => 'tinymce',
							'label' => __( 'Description', 'dhaka' ),
							'default' => '',
							'rows' => 5,
							'default_editor' => 'html',
							'button_filters' => array(
								'mce_buttons' => array( $this, 'filter_mce_buttons' ),
								'mce_buttons_2' => array( $this, 'filter_mce_buttons_2' ),
								'mce_buttons_3' => array( $this, 'filter_mce_buttons_3' ),
								'mce_buttons_4' => array( $this, 'filter_mce_buttons_5' ),
								'quicktags_settings' => array( $this, 'filter_quicktags_settings' ),
							),
						),
						'profile_picture' => array(
							'type'     => 'media',
							'library'  => 'image',
							'label'    => __( 'Image', 'dhaka' ),
							'fallback' => true,
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

siteorigin_widget_register( 'dhaka-testimonial-widget', __FILE__, 'Dhaka_Testimonial_Widget' );
