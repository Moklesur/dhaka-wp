<?php
/**
 * Theme info page
 *
 * @package Dhaka
 */

//Add the theme page
add_action('admin_menu', 'dhaka_theme_info');
function dhaka_theme_info(){
    $theme_info = add_theme_page( __('Theme Info','dhaka'), __('Theme Info','dhaka'), 'manage_options', 'dhaka-info.php', 'dhaka_theme_info_admin_page' );
    add_action( 'load-' . $theme_info, 'dhaka_theme_info_style' );
}

//Callback
function dhaka_theme_info_admin_page() {
    ?>
    <div class="theme-info">
        <h2 class="info-title"><?php _e('Dhaka Theme Info','dhaka'); ?></h2>
        <div class="col-theme-info"><div class="dashicons dashicons-desktop info-icon"></div><a href="http://demo.themetim.com/dhaka/" target="_blank"><?php _e('Theme demo','dhaka'); ?></a></div>
        <div class="col-theme-info"><div class="dashicons dashicons-book-alt info-icon"></div><a href="http://docs.themetim.com/dhaka/" target="_blank"><?php _e('Documentation','dhaka'); ?></a></div>
        <div class="col-theme-info"><div class="dashicons dashicons-sos info-icon"></div><a href="https://www.themetim.com/forums/" target="_blank"><?php _e('Support','dhaka'); ?></a></div>
        <!--<div class="col-theme-info"><div class="dashicons dashicons-smiley info-icon"></div><p class="info-text"><a href="http://athemes.com/theme/dhaka-pro" target="_blank"><?php /*_e('Pro version','dhaka'); */?></a></p></div>-->
    </div>
    <?php
}

//Styles
function dhaka_theme_info_style(){
    add_action( 'admin_enqueue_scripts', 'dhaka_theme_info_admin_page_styles' );
}
function dhaka_theme_info_admin_page_styles() {
    wp_enqueue_style( 'dhaka-info-admin-style', get_template_directory_uri() . '/assets/css/theme-info.css', array(), true );
}