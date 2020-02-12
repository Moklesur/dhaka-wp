<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dhaka
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'dhaka' ); ?></a>
	<header id="masthead" class="site-header header-fixed" role="banner">
		<?php if ( get_header_image() ) : ?>
			<div id="header-image">
				<img src="<?php header_image(); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" class="img-responsive">
			</div>
		<?php endif; ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<!--------------- Primary Menu ---------------->
					<nav class="navbar navbar-default primary-menu">
						<div class="site-branding logo pull-left">
							<?php
							if (get_theme_mod('custom_logo') && function_exists('the_custom_logo'))  :
								the_custom_logo();
							else : ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<p class="site-description"><?php bloginfo( 'description' ); ?></p>
							<?php endif; ?>
						</div><!-- .site-branding -->
						<div class="navbar-header navbar-fix">
							<button type="button" data-toggle="collapse" data-target="#navbar-collapse" class="navbar-toggle">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<?php if ( class_exists( 'WooCommerce' ) ) : ?>
							<div class="cart-icon">
								<a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>">
									<i class="fa fa-shopping-basket"></i>
									<span>
										<?php echo sprintf ( _n( ' %d', ' %d', WC()->cart->get_cart_contents_count(), 'dhaka' ), WC()->cart->get_cart_contents_count() ); ?>
									</span>
								</a>
								<div class="mini-cart">
									<?php woocommerce_mini_cart(); ?>
								</div>
							</div>
						<?php endif; ?>
						<?php do_action('dhaka_header_social'); ?>
						<div id="navbar-collapse" class="navbar-collapse collapse">
							<?php
							wp_nav_menu( array(
								'theme_location'    => 'primary',
								'menu_id'			=> 'primary-menu',
								'container'         => '',
								'container_class'   => 'collapse navbar-collapse',
								'container_id'      => 'bs-example-navbar-collapse-1',
								'menu_class'        => 'nav navbar-nav',
								'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
								'walker'            => new WP_Bootstrap_Navwalker()
							));
							?>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
	<div id="content" class="site-content">
