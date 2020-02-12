<?php
/**
 * Dhaka Theme Customizer
 *
 * @package Dhaka
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function dhaka_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_section( 'colors' )->priority = '60';
	$wp_customize->get_section( 'title_tagline' )->title = __('Header', 'dhaka');

	/*--------------------------------------------------------------
	# Divider
	--------------------------------------------------------------*/
	class dhaka_divider extends WP_Customize_Control {
		public $type = 'divider';
		public $label = '';
		public function render_content() { ?>
			<h3 style="margin-top:15px; margin-bottom:10px;background:#ff8871;padding:9px 5px;color:#fff;text-transform:uppercase; text-align: center;letter-spacing: 2px;"><?php echo esc_html( $this->label ); ?></h3>
			<?php
		}
	}

	/*--------------------------------------------------------------
	# General
	--------------------------------------------------------------*/
	$wp_customize->add_section(
		'dhaka_general',
		array(
			'title'         => __('General', 'dhaka'),
			'priority'      => 8,
		)
	);
	## Layout ##
	$wp_customize->add_setting(
		'layout',
		array(
			'default' => __('1170','dhaka'),
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'layout',
		array(
			'label'         => __( 'Layout Setting', 'dhaka' ),
			'section'       => 'dhaka_general',
			'type'          => 'number',
			'description'   => __('Site Width (container 1170)', 'dhaka'),
			'priority'      => 10,
			'input_attrs' => array(
				'min'   => 300,
				'max'   => 1920,
				'step'  => 1,
			),
		)
	);
	## Margin - Top  ##
	$wp_customize->add_setting(
		'margin_top',
		array(
			'default' => __('60','dhaka'),
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'margin_top',
		array(
			'label'         => __( 'Top Margin', 'dhaka' ),
			'section'       => 'dhaka_general',
			'type'          => 'number',
			'description'   => __('Top Margin for the page wrapper (the space between the header) ', 'dhaka'),
			'priority'      => 10,
			'input_attrs' => array(
				'min'   => 0,
				'max'   => 200,
				'step'  => 1,
			),
		)
	);
	## Margin - Bottom  ##
	$wp_customize->add_setting(
		'margin_bottom',
		array(
			'default' => __('60','dhaka'),
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'margin_bottom',
		array(
			'label'         => __( 'Bottom Margin', 'dhaka' ),
			'section'       => 'dhaka_general',
			'type'          => 'number',
			'description'   => __('Bottom Margin for the page wrapper (the space between the Footer) ', 'dhaka'),
			'priority'      => 10,
			'input_attrs' => array(
				'min'   => 0,
				'max'   => 200,
				'step'  => 1,
			),
		)
	);
	/*--------------------------------------------------------------
	# Header
	--------------------------------------------------------------*/
	## Divider ##
	$wp_customize->add_setting('dhaka_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new dhaka_divider( $wp_customize, 'logo', array(
			'label' => __('Logo', 'dhaka'),
			'priority'      => 5,
			'section' => 'title_tagline',
			'settings' => 'dhaka_options[divider]'
		) )
	);
	$wp_customize->add_control( new dhaka_divider( $wp_customize, 'favicon', array(
			'label' => __('favicon', 'dhaka'),
			'priority'      => 40,
			'section' => 'title_tagline',
			'settings' => 'dhaka_options[divider]'
		) )
	);
	/*--------------------------------------------------------------
	# Typography
	--------------------------------------------------------------*/
	$wp_customize->add_section(
		'typography',
		array(
			'title'         => __('Typography', 'dhaka'),
			'priority'      => 60,
			'description' => __('Google Fonts can be found here: https://fonts.google.com ( Just enter fonts name like Lato )', 'dhaka'),
		)
	);
	## Divider ##
	$wp_customize->add_setting('dhaka_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new dhaka_divider( $wp_customize, 'body_fonts', array(
			'label' => __('Body Fonts', 'dhaka'),
			'priority'      => 10,
			'section' => 'typography',
			'settings' => 'dhaka_options[divider]'
		) )
	);
	## Body Fonts ##
	$wp_customize->add_setting(
		'body_font_name',
		array(
			'default' => 'Noto+Sans',
			'sanitize_callback' => 'dhaka_sanitize_text',
		)
	);
	$wp_customize->add_control(
		'body_font_name',
		array(
			'label' => __( 'Font Name', 'dhaka' ),
			'section' => 'typography',
			'type' => 'text',
			'priority' => 10
		)
	);
	$wp_customize->add_setting(
		'body_font_family',
		array(
			'default' => '\'Noto Sans\', sans-serif',
			'sanitize_callback' => 'dhaka_sanitize_text',
		)
	);
	$wp_customize->add_control(
		'body_font_family',
		array(
			'label' => __( 'Font Family', 'dhaka' ),
			'section' => 'typography',
			'type' => 'text',
			'priority' => 10
		)
	);
	## Divider ##
	$wp_customize->add_setting('dhaka_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new dhaka_divider( $wp_customize, 'header_fonts', array(
			'label' => __('Heading Fonts', 'dhaka'),
			'priority'      => 10,
			'section' => 'typography',
			'settings' => 'dhaka_options[divider]'
		) )
	);
	## Header ##
	$wp_customize->add_setting(
		'heading_font_name',
		array(
			'default' => 'Noto+Sans',
			'sanitize_callback' => 'dhaka_sanitize_text',
		)
	);
	$wp_customize->add_control(
		'heading_font_name',
		array(
			'label' => __( 'Font Name', 'dhaka' ),
			'section' => 'typography',
			'type' => 'text',
			'priority' => 10
		)
	);
	$wp_customize->add_setting(
		'heading_font_family',
		array(
			'default' => '\'Noto Sans\', sans-serif',
			'sanitize_callback' => 'dhaka_sanitize_text',
		)
	);
	$wp_customize->add_control(
		'heading_font_family',
		array(
			'label' => __( 'Font Family', 'dhaka' ),
			'section' => 'typography',
			'type' => 'text',
			'priority' => 10
		)
	);
	/*--------------------------------------------------------------
	# Color
	--------------------------------------------------------------*/
	## Divider ##
	$wp_customize->add_setting('dhaka_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new dhaka_divider( $wp_customize, 'header_textcolor', array(
			'label' => __('General Color', 'dhaka'),
			'priority'      => 5,
			'section' => 'colors',
			'settings' => 'dhaka_options[divider]'
		) )
	);
	## Body Text Color ##
	$wp_customize->add_setting(
		'body_text_color',
		array(
			'default'           => '#777777',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'body_text_color',
			array(
				'label'         => __('Body Text Color', 'dhaka'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	## Link Color ##
	$wp_customize->add_setting(
		'link_color',
		array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'link_color',
			array(
				'label'         => __('Link Color', 'dhaka'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	## Link Hover Color ##
	$wp_customize->add_setting(
		'link_hover_color',
		array(
			'default'           => '#ff8871',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'link_hover_color',
			array(
				'label'         => __('Link Hover Color', 'dhaka'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	## Heading Color ##
	$wp_customize->add_setting(
		'heading_color',
		array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'heading_color',
			array(
				'label'         => __('Heading Color', 'dhaka'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	## Divider ##
	$wp_customize->add_setting('dhaka_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new dhaka_divider( $wp_customize, 'button_color', array(
			'label' => __('Button Color', 'dhaka'),
			'priority'      => 10,
			'section' => 'colors',
			'settings' => 'dhaka_options[divider]'
		) )
	);
	## Default Button Color ##
	$wp_customize->add_setting(
		'default_text_color',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'default_text_color',
			array(
				'label'         => __('Default Text Color', 'dhaka'),
				'description' => __('## Select Default Button Color ##', 'dhaka'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'default_bg_color',
		array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'default_bg_color',
			array(
				'label'         => __('Default BG Color', 'dhaka'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'default_border_color',
		array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'default_border_color',
			array(
				'label'         => __('Default Border Color', 'dhaka'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'default_hover_text_color',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'default_hover_text_color',
			array(
				'label'         => __('Default Hover Text Color', 'dhaka'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'default_hover_bg_color',
		array(
			'default'           => '#ed1b2e',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'default_hover_bg_color',
			array(
				'label'         => __('Default Hover BG Color', 'dhaka'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'default_hover_border_color',
		array(
			'default'           => '#ed1b2e',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'default_hover_border_color',
			array(
				'label'         => __('Default Hover Border Color', 'dhaka'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	## Primary Button Color ##
	$wp_customize->add_setting(
		'primary_text_color',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_text_color',
			array(
				'label'         => __('Primary Text Color', 'dhaka'),
				'description' => __('## Select Primary Button Color ##', 'dhaka'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'primary_bg_color',
		array(
			'default'           => '#ff8871',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_bg_color',
			array(
				'label'         => __('Primary BG Color', 'dhaka'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'primary_border_color',
		array(
			'default'           => '#ff8871',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_border_color',
			array(
				'label'         => __('Primary Border Color', 'dhaka'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'primary_hover_text_color',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_hover_text_color',
			array(
				'label'         => __('Primary Hover Text Color', 'dhaka'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'primary_hover_bg_color',
		array(
			'default'           => '#003b64',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_hover_bg_color',
			array(
				'label'         => __('Primary Hover BG Color', 'dhaka'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'primary_hover_border_color',
		array(
			'default'           => '#003b64',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_hover_border_color',
			array(
				'label'         => __('Primary Hover Border Color', 'dhaka'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	## Success Button Color ##
	$wp_customize->add_setting(
		'success_text_color',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'success_text_color',
			array(
				'label'         => __('Success Text Color', 'dhaka'),
				'description' => __('## Select Success Button Color ##', 'dhaka'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'success_bg_color',
		array(
			'default'           => '#003b64',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'success_bg_color',
			array(
				'label'         => __('Success BG Color', 'dhaka'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'success_border_color',
		array(
			'default'           => '#003b64',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'success_border_color',
			array(
				'label'         => __('Success Border Color', 'dhaka'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'success_hover_text_color',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'success_hover_text_color',
			array(
				'label'         => __('Success Hover Text Color', 'dhaka'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'success_hover_bg_color',
		array(
			'default'           => '#0033a1',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'success_hover_bg_color',
			array(
				'label'         => __('Success Hover BG Color', 'dhaka'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'success_hover_border_color',
		array(
			'default'           => '#0033a1',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'success_hover_border_color',
			array(
				'label'         => __('Success Hover Border Color', 'dhaka'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	/*--------------------------------------------------------------
	# Social
	--------------------------------------------------------------*/
	$wp_customize->add_section(
		'social_settings',
		array(
			'title'         => __('Social Media', 'dhaka'),
			'priority'      => 70
		)
	);
	## Divider ##
	$wp_customize->add_setting('dhaka_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new dhaka_divider( $wp_customize, 'social_media', array(
			'label' => __('Header', 'dhaka'),
			'priority'      => 10,
			'section' => 'social_settings',
			'settings' => 'dhaka_options[divider]'
		) )
	);
	## Enable Social ##
	$wp_customize->add_setting( 'enable_social_settings', array(
		'default'           => '',
		'sanitize_callback' => 'dhaka_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'enable_social_settings', array(
		'label' => __( 'Enable Social Media', 'dhaka' ),
		'type' => 'checkbox',
		'section' => 'social_settings',
	) );
	## Header Social ##
	$wp_customize->add_setting( 'header_fb', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'header_fb', array(
		'label' => __( 'Facebook', 'dhaka' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'header_fb'
	) );
	$wp_customize->add_setting( 'header_tw', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'header_tw', array(
		'label' => __( 'Twitter', 'dhaka' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'header_tw'
	) );
	$wp_customize->add_setting( 'header_li', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'header_li', array(
		'label' => __( 'Linkedin', 'dhaka' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'header_li'
	) );
	$wp_customize->add_setting( 'header_pint', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'header_pint', array(
		'label' => __( 'Pinterest', 'dhaka' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'header_pint'
	) );
	$wp_customize->add_setting( 'header_ins', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'header_ins', array(
		'label' => __( 'Instagram', 'dhaka' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'header_ins'
	) );
	$wp_customize->add_setting( 'header_dri', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'header_dri', array(
		'label' => __( 'Dribbble', 'dhaka' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'header_dri'
	) );
	$wp_customize->add_setting( 'header_plus', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'header_plus', array(
		'label' => __( 'Plus Google', 'dhaka' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'header_plus'
	) );
	$wp_customize->add_setting( 'header_you', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'header_you', array(
		'label' => __( 'YouTube', 'dhaka' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'header_you'
	) );

	/*--------------------------------------------------------------
	# Blog
	--------------------------------------------------------------*/
	$wp_customize->add_section(
		'blog_settings',
		array(
			'title'         => __('Blog', 'dhaka'),
			'priority'      => 80
		)
	);
	## Blog Excerpt ##
	$wp_customize->add_setting(
		'blog_excerpt',
		array(
			'default' => __('60','dhaka'),
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'blog_excerpt',
		array(
			'label'         => __( 'Excerpt length', 'dhaka' ),
			'type'          => 'number',
			'description'   => __('Set your excerpt length. Default: 60 words', 'dhaka'),
			'section'       => 'blog_settings',
			'priority'      => 10,
		)
	);
}
add_action( 'customize_register', 'dhaka_customize_register' );

/**
 * Sanitize
 * @param $input
 * @return string
 */
function dhaka_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

function dhaka_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function dhaka_customize_preview_js() {
	wp_enqueue_script( 'dhaka_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'dhaka_customize_preview_js' );
