<?php
/**
 * Camera Slider widget.
 *
 * @package dhaka
 */

class Dhaka_CameraSlider_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'dhaka-camera-slider-widget',
			__( 'Dhaka: Camera Slider', 'dhaka' ),
			array(
				'description' => __( 'Camera Slider Widget', 'dhaka' ),
			),
			array(),

			array(
				'CameraSlider' => array(
					'type'       => 'repeater',
					'label'      => __( 'Camera Slider', 'dhaka' ),
					'item_name'  => __( 'Item', 'dhaka' ),
					'item_label' => array(
						'selector'     => "[id*='prefix-dhaka-camera-slider-']",
						'update_event' => 'change',
						'value_method' => 'val',
					),
					'fields' => array(
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
						'text_position' => array(
							'type' => 'select',
							'label' => __( 'Position', 'dhaka' ),
							'description' => __('Float Position (like whole content will be show center or left or right)','dhaka'),
							'default' => '0 auto',
							'options' => array(
								'auto auto auto 0' => __( 'Left', 'dhaka' ),
								'0 auto' => __( 'Center', 'dhaka' ),
								'auto 0 auto auto' => __( 'Right', 'dhaka' ),
							)
						),
						'CameraSlider_title' => array(
							'type'  => 'text',
							'label' => __( 'Title', 'dhaka' ),
						),
						'CameraSlider_title_color' => array(
							'type' => 'color',
							'label' => __( 'Title Color', 'dhaka' ),
							'default' => '#000'
						),
						'CameraSlider_subtitle' => array(
							'type'  => 'text',
							'label' => __( 'Sub Title', 'dhaka' ),
						),
						'CameraSlider_subtitle_color' => array(
							'type' => 'color',
							'label' => __( 'Sub Title Color', 'dhaka' ),
							'default' => '#000'
						),
						'CameraSlider_image' => array(
							'type'     => 'media',
							'library'  => 'image',
							'label'    => __( 'Slide Image', 'dhaka' ),
							'fallback' => true,
						),
						'CameraSlider_texteditor' => array(
							'type' => 'tinymce',
							'default' => '',
							'rows' => 7,
							'default_editor' => 'html',
							'button_filters' => array(
								'mce_buttons' => array( $this, 'filter_mce_buttons' ),
								'mce_buttons_2' => array( $this, 'filter_mce_buttons_2' ),
								'mce_buttons_3' => array( $this, 'filter_mce_buttons_3' ),
								'mce_buttons_4' => array( $this, 'filter_mce_buttons_5' ),
								'quicktags_settings' => array( $this, 'filter_quicktags_settings' ),
							),
						),
						'CameraSlider_button_text' => array(
							'type' => 'text',
							'label' => __('Button Title', 'dhaka'),
							'default' => ''
						),
						'CameraSlider_button_style' => array(
							'type' => 'select',
							'label' => __( 'Button Style', 'dhaka' ),
							'default' => 'btn-default',
							'options' => array(
								'btn-default' => __( 'Default', 'dhaka' ),
								'btn-primary' => __( 'Primary', 'dhaka' ),
								'btn-success' => __( 'Success', 'dhaka' ),
							)
						),
						'CameraSlider_button_url' => array(
							'type' => 'link',
							'label' => __('Button URL', 'dhaka'),
							'default' => ''
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

siteorigin_widget_register( 'dhaka-camera-slider-widget', __FILE__, 'Dhaka_CameraSlider_Widget' );
