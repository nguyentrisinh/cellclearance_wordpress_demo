<?php
/*
Template Name: Homepage
*/ 

get_header();
 
?>

</div><!-- #content -->
</div><!-- .container-->

<?php if(get_theme_mod("jstore_home_banner_on_off") != '' && get_theme_mod("jstore_home_banner_on_off") == 'on'): ?>
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<?php if((get_theme_mod("jstore_bnr_img1") != '') || (get_theme_mod("jstore_bnr_img2") != '')): ?>
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
		</ol>   
	<?php endif;?>	
		<!-- Wrapper for carousel items -->
		<div class="carousel-inner">
			<?php if(get_theme_mod("jstore_bnr_img1") != ''): ?>
				<div class="item active">
				
					<img src="<?php echo esc_url(get_theme_mod("jstore_bnr_img1"));?>" />
				
				</div>
			<?php endif;?>
			<?php if(get_theme_mod("jstore_bnr_img2") != ''): ?>
				<div class="item">
			
					<img src="<?php echo esc_url(get_theme_mod("jstore_bnr_img2")); ?>" />
				
				</div>
			<?php endif;?>
			
		</div>
	</div>
<?php endif; ?>

<div class="container">
	<div class="row">
		
		<?php if(get_theme_mod("jstore_small_banner_on_off") != '' && get_theme_mod("jstore_small_banner_on_off") == 'on'): ?>
			<div class="col-sm-12 jstore-small-thumb">
				<?php if(get_theme_mod("jstore-small-banner-1") != ''): ?>
					<div class="col-sm-4 small-banner">
						<img src="<?php echo esc_url(get_theme_mod("jstore-small-banner-1"));?>" />
					</div>
				<?php endif;?>	
				<?php if(get_theme_mod("jstore-small-banner-2") != ''): ?>
					<div class="col-sm-4 small-banner">
						<img src="<?php echo esc_url(get_theme_mod("jstore-small-banner-2"));?>" />
					</div>
				<?php endif;?>	
				<?php if(get_theme_mod("jstore-small-banner-3") != ''): ?>
					<div class="col-sm-4 small-banner">
						<img src="<?php echo esc_url(get_theme_mod("jstore-small-banner-3"));?>" />
					</div>
				<?php endif;?>		
			</div> <!-- .jstore-small-thumb end -->
		<?php endif; ?>

	<?php 
		
		if ( class_exists( 'WooCommerce' ) ) :?>

			<div class="col-sm-12 jstore-home-product">
				<h1 class="page-title"><?php echo esc_html(get_theme_mod("jstore_new_arvl_itm")); ?></h1>
				<?php echo do_shortcode('[recent_products per_page="4" columns="4"]'); ?>
			</div>

			<div class="col-sm-12 jstore-home-product">
				<h1 class="page-title"><?php echo esc_html(get_theme_mod("jstore_top_rtd_itm")); ?></h1>
				<?php echo do_shortcode('[top_rated_products per_page="4"]'); ?>
			</div>

			<div class="col-sm-12 jstore-home-product">
				<h1 class="page-title"><?php echo esc_html(get_theme_mod("jstore_top_seling_itm")); ?></h1>
				<?php echo do_shortcode('[best_selling_products per_page="4"]'); ?>
			</div>
	<!-- .jstore-home-product -->
	<?php endif; ?>

		<div class="col-sm-12 jstore-logo-sec">
			
			<?php if(get_theme_mod("jstore_our_brand_logo1") != ''): ?>
				<div class="col-sm-2 col-xs-4">
					<img src="<?php echo esc_url(get_theme_mod("jstore_our_brand_logo1")); ?>" />
				</div>
			<?php endif;?>		
			
			<?php if(get_theme_mod("jstore_our_brand_logo2") != ''): ?>
				<div class="col-sm-2 col-xs-4">
					<img src="<?php echo esc_url(get_theme_mod("jstore_our_brand_logo2")); ?>" />
				</div>
			<?php endif;?>		
			
			<?php if(get_theme_mod("jstore_our_brand_logo3") != ''): ?>
				<div class="col-sm-2 col-xs-4">
					<img src="<?php echo esc_url(get_theme_mod("jstore_our_brand_logo3")); ?>" />
				</div>
			<?php endif;?>	
			
			<?php if(get_theme_mod("jstore_our_brand_logo4") != ''): ?>
				<div class="col-sm-2 col-xs-4">
					<img src="<?php echo esc_url(get_theme_mod("jstore_our_brand_logo4")); ?>" />
				</div>
			<?php endif;?>
			
			<?php if(get_theme_mod("jstore_our_brand_logo5") != ''): ?>
				<div class="col-sm-2 col-xs-4">
					<img src="<?php echo esc_url(get_theme_mod("jstore_our_brand_logo5")); ?>" />
				</div>
			<?php endif;?>
			
			<?php if(get_theme_mod("jstore_our_brand_logo6") != ''): ?>
				<div class="col-sm-2 col-xs-4">
					<img src="<?php echo esc_url(get_theme_mod("jstore_our_brand_logo6")); ?>" />
				</div>
			<?php endif;?>
		</div> <!-- .jstore-logo-sec end -->

	</div>
</div> <!-- end .container -->
<?php get_footer(); ?>