<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Jstore
 */

?>

</div><!-- #content -->
</div><!-- #page -->
</div><!-- .container -->

<div class="container-fluid jstore-ftr-clr">
<div class="container">
	<footer id="colophon" class="site-footer" role="contentinfo">
	
		<div id="inner-footer" class="clearfix">
			<div class="row">				
					<div id="widget-footer" class="clearfix">
						
						<?php if ( is_active_sidebar( !dynamic_sidebar('jstore-footer1'))) : ?>
							
							<div class="col-sm-3">
									
							</div>	
						
						<?php endif; ?>
				
						<?php  if ( is_active_sidebar( !dynamic_sidebar('jstore-footer2'))) :?>
						
						<div class="col-sm-3">
							
						</div>
					
						<?php endif; ?>
						
						<?php if ( is_active_sidebar( !dynamic_sidebar('jstore-footer3'))): ?>
						<div class="col-sm-3">
								
						</div>	
						<?php endif; ?>
						<?php if ( is_active_sidebar( !dynamic_sidebar('jstore-footer4'))): ?>
						
						<div class="col-sm-3">
							
						</div>
							
						<?php endif;  ?>
						
						<?php if ( is_active_sidebar( !dynamic_sidebar('jstore-footer5'))): ?>
						<div class="col-sm-3">
								
						</div>	
						<?php endif; ?>
					</div>
				</div> 
			
		</div>
	
		<div class="site-info">
			<p><?php printf(esc_html(get_theme_mod("jstore_copyright_text"))); ?> <a href="<?php echo esc_url( __( 'http://phoeniixx.com/', 'jstore' ) ); ?>" rel="designer"><?php esc_html_e('phoeniixx','jstore'); ?></a> </p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #container -->
</div>

<?php wp_footer(); ?>

</body>
</html>
