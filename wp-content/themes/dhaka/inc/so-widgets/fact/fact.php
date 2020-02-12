<?php
/**
 * Fact widget.
 *
 * @package dhaka
 */

class Dhaka_Fact_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'dhaka-fact-widget',
			__( 'Dhaka Fact', 'dhaka' ),
			array(
				'description' => __( 'Show your visitors some facts about your company.', 'dhaka' ),
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
				'fact' => array(
					'type'       => 'repeater',
					'label'      => __( 'Fact', 'dhaka' ),
					'item_name'  => __( 'Item', 'dhaka' ),
					'item_label' => array(
						'selector'     => "[id*='prefix-dhaka-fact-']",
						'update_event' => 'change',
						'value_method' => 'val',
					),
					'fields' => array(
						'title' => array(
							'type'  => 'text',
							'label' => __( 'Title', 'dhaka' ),
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
					),
				),
			)

		);
	}

	function get_template_name( $instance ) {
		return 'default';
	}
}

siteorigin_widget_register( 'dhaka-fact-widget', __FILE__, 'Dhaka_Fact_Widget' );
