<?php
/**
 * Newsletter widget.
 *
 * @package dhaka
 */

class Dhaka_newsletter_Widget extends SiteOrigin_Widget {

    function __construct() {

        parent::__construct(
            'dhaka-newsletter-widget',
            __( 'Dhaka Newsletter', 'dhaka' ),
            array(
                'description' => __( 'Newsletter Widget', 'dhaka' ),
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
                    'label' => __( 'Heading', 'dhaka' ),
                    'default' => 'Follow Us'
                ),
                'text' => array(
                    'type'  => 'textarea',
                    'label' => __( 'Paragraph', 'dhaka' ),
                    'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                ),
                'action_url' => array(
                    'type'  => 'textarea',
                    'label' => __( 'Action URL', 'dhaka' ),
                    'default' => '',
                    'description' => __( 'Newsletter for Mailchimp https://mailchimp.com/', 'dhaka' ),
                ),
            )

        );
    }

    function get_template_name( $instance ) {
        return 'default';
    }
}

siteorigin_widget_register( 'dhaka-newsletter-widget', __FILE__, 'Dhaka_newsletter_Widget' );
