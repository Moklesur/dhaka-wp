<?php
/**
 * Call To Action widget.
 *
 * @package Dhaka
 */

class Dhaka_Cta_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'dhaka-cta',
			__( 'Dhaka: Call To Action', 'dhaka' ),
			array(
				'description' => __( 'Simple Call to action widget', 'dhaka' ),
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
					'type' => 'text',
					'label' => __( 'Subtitle', 'dhaka' ),
				),
				'button' => array(
					'type' => 'widget',
					'class' => 'SiteOrigin_Widget_Button_Widget',
					'label' => __( 'Button', 'dhaka' ),
				),
			),
			plugin_dir_path( __FILE__ )
		);
	}

	function get_template_name( $instance ) {
		return 'default';
	}

	function modify_child_widget_form( $child_widget_form, $child_widget ) {
		// Remove alignment option in Button.
		unset( $child_widget_form['design']['fields']['align'] );
		return $child_widget_form;
	}

	/**
	 * Initialize the CTA widget
	 */
	function initialize() {
		// This widget requires the button widget.
		if ( ! class_exists( 'SiteOrigin_Widget_Button_Widget' ) ) {
			SiteOrigin_Widgets_Bundle::single()->include_widget( 'button' );
		}
	}
}

siteorigin_widget_register( 'dhaka-cta', __FILE__, 'Dhaka_Cta_Widget' );
