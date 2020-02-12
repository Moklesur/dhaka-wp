<?php
/**
 * Team widget.
 *
 * @package Dhaka
 */

class Dhaka_Team_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'dhaka-team',
			__( 'Dhaka: Team', 'dhaka' ),
			array(
				'description' => __( 'Displays Team Member', 'dhaka' ),
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
				'sub_title' => array(
					'type' => 'text',
					'label' => __( 'Sub Title', 'dhaka' ),
				),
				'members' => array(
					'type'       => 'repeater',
					'label'      => __( 'Members', 'dhaka' ),
					'item_name'  => __( 'Member', 'dhaka' ),
					'item_label' => array(
						'selector'     => "[id*='prefix-dhaka-members-team']",
						'update_event' => 'change',
						'value_method' => 'val',
					),
					'fields' => array(
						'full_name' => array(
							'type'  => 'text',
							'label' => __( 'Full Name', 'dhaka' ),
						),
						'bio' => array(
							'type'  => 'textarea',
							'label' => __( 'Bio', 'dhaka' ),
						),
						'position' => array(
							'type'  => 'text',
							'label' => __( 'Position', 'dhaka' ),
						),
						'profile_picture' => array(
							'type'     => 'media',
							'library'  => 'image',
							'label'    => __( 'Image', 'dhaka' ),
							'fallback' => true,
						),
						'fb' => array(
							'type'  => 'link',
							'label' => __( 'Facebook URL', 'dhaka' ),
						),
						'tw' => array(
							'type'  => 'link',
							'label' => __( 'Twitter URL', 'dhaka' ),
						),
						'li' => array(
							'type'  => 'link',
							'label' => __( 'Linkedin URL', 'dhaka' ),
						),
						'ins' => array(
							'type'  => 'link',
							'label' => __( 'Instagram URL', 'dhaka' ),
						),
					),
				),
				'per_row' => array(
					'type'    => 'select',
					'label'   => __( 'Teams Per Row', 'dhaka' ),
					'default' => 4,
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

siteorigin_widget_register( 'dhaka-team', __FILE__, 'Dhaka_Team_Widget' );
