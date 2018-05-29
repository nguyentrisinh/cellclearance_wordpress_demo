<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developr.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Jstore
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'jstore' ); ?></a>
		
		<div id="log">			
			<div class="container">
				<div class="col-sm-6 col-xs-6 jstore_cust_wrap">
					<div class="row">
					 <ul class="list-inline my-account">
						<li class="jstor_number_before"><p><i class="fa fa-phone"></i><?php echo esc_html(get_theme_mod("jstore_cust_care_text")); ?> <span class="j-store_contact_number"><?php  echo esc_html(get_theme_mod("jstore_cust_care_no")); ?></span></p></li>
					 </ul>
					</div> 
				</div>
				
				<?php 
					
					if ( class_exists( 'WooCommerce' ) ) :?> 
						
						<div class="col-sm-6 col-xs-6 login-register">
							
							<div class="row">
							  
								<a href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id')));?>"><span class="fa fa-user"></span><span class="mobile_hide"><?php esc_html_e('My Account', 'jstore'); ?></span></a>
							
							</div>
							
						</div>
						
				<?php endif; ?>
				
				
			</div>
       </div>

		<header id="masthead" class="site-header" role="banner">
			
			<div class="container jstore-header-content">
			
			<div class="row">
			
				<div class="col-sm-2 col-xs-3 site-branding">
					<?php
					
					jstore_custom_logo();
					
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
					endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo esc_html($description); ?></p>
					<?php
					endif; ?>
				</div><!-- .site-branding -->
					
				<div class="col-sm-7 col-xs-5 jstore-search-bar">
					<?php 	get_search_form();?>
				</div>
			<?php if ( class_exists( 'WooCommerce' ) ) :?>
			
					<div class="col-sm-3 col-xs-4 jstore-cart-item">
						<?php global $woocommerce; ?>
						
						<a class="cart-contents" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" title="<?php esc_attr_e('View your shopping cart', 'jstore'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'jstore'), $woocommerce->cart->cart_contents_count);?> <?php echo wp_kses_post($woocommerce->cart->get_cart_total()); ?></a>
						
					</div>
					
			<?php endif; ?>
			</div><!-- .row -->			
			</div><!-- .container -->
			
			<div class="jstore-nav-bg">
				<div class="container">
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</button>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' , 'container_class'=> 'jstore-nav') ); ?>
					</nav><!-- #site-navigation -->
				</div>
			</div><!-- .jstore-nav-bg -->
			
			<div class="custom-header">
				<div class="custom-header-media">
					<?php the_custom_header_markup(); ?>
				</div>
			</div>
			
		</header><!-- #masthead -->

		<div class="container">
		
		<div id="content" class="site-content">