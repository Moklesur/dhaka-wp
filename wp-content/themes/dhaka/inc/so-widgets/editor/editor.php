<?php
/**
 * Editor Widget.
 *
 * @package Dhaka
 */

class Dhaka_Editor_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'dhaka-editor-widget',
			__( 'Dhaka Editor', 'dhaka' ),
			array(
				'description' => __( 'Dhaka Editor Widget', 'dhaka' ),
			),
			array(),

			array(
				'alignment' => array(
					'type' => 'select',
					'label' => __( 'Text Alignment', 'dhaka' ),
					'default' => 'text-left',
					'options' => array(
						'text-left' => __( 'Text Left', 'dhaka' ),
						'text-center' => __( 'Text Center', 'dhaka' ),
						'text-right' => __( 'Text Right', 'dhaka' ),
					)
				),
				'icon' => array(
					'type' => 'icon',
					'label' => __('Select an icon', 'dhaka'),
				),
				'icon_size' => array(
					'type' => 'number',
					'label' => __( 'Icon Size', 'dhaka' ),
					'default' => '24'
				),
				'icon_color' => array(
					'type' => 'color',
					'label' => __( 'Icon Color', 'dhaka' ),
					'default' => '#000'
				),
				'title' => array(
					'type'  => 'text',
					'label' => __( 'Heading', 'dhaka' ),
				),
				'sub_title' => array(
					'type' => 'text',
					'label' => __( 'Sub Heading', 'dhaka' ),
				),
				'texteditor' => array(
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
				'button_text' => array(
					'type' => 'text',
					'label' => __('Button Title', 'dhaka'),
					'default' => ''
				),
				'button_style' => array(
					'type' => 'select',
					'label' => __( 'Button Style', 'dhaka' ),
					'default' => 'btn-default',
					'options' => array(
						'btn-default' => __( 'Default', 'dhaka' ),
						'btn-primary' => __( 'Primary', 'dhaka' ),
						'btn-success' => __( 'Success', 'dhaka' ),
					)
				),
				'button_url' => array(
					'type' => 'link',
					'label' => __('Button URL', 'dhaka'),
					'default' => ''
				),
			)

		);
	}

	function get_template_name( $instance ) {
		return 'default';
	}
}

siteorigin_widget_register( 'dhaka-editor-widget', __FILE__, 'Dhaka_Editor_Widget' );
