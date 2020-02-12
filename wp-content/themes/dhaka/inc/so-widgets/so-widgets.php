<?php
/**
 * Hooks for site origin.
 *
 * This file contains hook functions attached to core hooks of site origin bundle.
 *
 * @package Dhaka
 */

if ( ! function_exists( 'dhaka_add_tab_in_builer_widgets_panel' ) ) :

    /**
     * Add tab in builder widgets section.
     *
     * @since 1.0.0
     *
     * @param array $tabs Tabs.
     * @return array Modified tabs.
     */
    function dhaka_add_tab_in_builer_widgets_panel( $tabs ) {
        $tabs['dhaka'] = array(
            'title'  => __( 'Dhaka Widgets', 'dhaka' ),
            'filter' => array(
                'groups' => array( 'dhaka' ),
            ),
        );
        return $tabs;
    }

endif;

add_filter( 'siteorigin_panels_widget_dialog_tabs', 'dhaka_add_tab_in_builer_widgets_panel' );

if ( ! function_exists( 'dhaka_group_theme_widgets_in_builder' ) ) :

    /**
     * Grouping theme widgets in builder.
     *
     * @since 1.0.0
     *
     * @param array $widgets Widgets array.
     * @return array Modified widgets array.
     */
    function dhaka_group_theme_widgets_in_builder( $widgets ) {

        if ( isset( $GLOBALS['wp_widget_factory'] ) && ! empty( $GLOBALS['wp_widget_factory']->widgets ) ) {
            $all_widgets = array_keys( $GLOBALS['wp_widget_factory']->widgets );
            foreach ( $all_widgets as $widget ) {
                if ( false !== strpos( $widget, 'Dhaka_' ) ) {
                    $widgets[ $widget ]['groups'] = array( 'dhaka' );
                    $widgets[ $widget ]['icon']   = 'dashicons dashicons-align-none';
                }
            }
        }
        return $widgets;

    }
endif;

add_filter( 'siteorigin_panels_widgets', 'dhaka_group_theme_widgets_in_builder' );


if ( ! function_exists( 'dhaka_customize_so_widgets_status' ) ) :

    /**
     * Customize to make widgets active.
     *
     * @since 1.0.0
     *
     * @param array $active Array of widgets.
     * @return array Modified array.
     */
    function dhaka_customize_so_widgets_status( $active ) {

        $active['so-features-widget']    = true;
        $active['features']              = true;

        $active['so-slider-widget']      = true;
        $active['slider']                = true;

        $active['so-google-map-widget']  = true;
        $active['google-map']            = true;

        $active['so-image-widget']       = true;
        $active['image']                 = true;

        $active['so-cta-widget']         = true;
        $active['cta']                   = true;

        $active['so-contact-widget']     = true;
        $active['contact']               = true;

        $active['so-testimonial-widget'] = true;
        $active['testimonial']           = true;

        $active['so-hero-widget']        = true;
        $active['hero']                  = true;

        return $active;

    }

endif;

add_filter( 'siteorigin_widgets_active_widgets', 'dhaka_customize_so_widgets_status' );

/**
 * Theme SO Widgets.
 */

    // Theme widgets.
    $theme_widgets = array(
        'title',
        'address',
        'team',
        'editor',
        'camera-slider',
        'testimonial',
        'fact',
        'newsletter',
        'portfolio',
        'cta'
    );

    $template_dir = get_template_directory();

    foreach ( $theme_widgets as $widget ) {

        require_once $template_dir . '/inc/so-widgets/' . $widget . '/' . $widget . '.php';

    }