<?php
/**
 * Plugin Name: RoadThemes Helper
 * Plugin URI: http://roadthemes.com/
 * Description: The helper plugin for RoadThemes themes.
 * Version: 1.0.0
 * Author: RoadThemes
 * Author URI: http://roadthemes.com/
 * Text Domain: roadthemes
 * License: GPL/GNU.
 /*  Copyright 2014  RoadThemes  (email : support@roadthemes.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if ( file_exists( ABSPATH . 'wp-admin/includes/file.php' ) ) {
    require_once(ABSPATH . 'wp-admin/includes/file.php');
}
//Add less compiler
function compileLessFile($input, $output, $params) {
   require_once( plugin_dir_path( __FILE__ ).'less/lessc.inc.php' );
   
	$less = new lessc;
	$less->setVariables($params);
	
    // input and output location
    $inputFile = get_template_directory().'/less/'.$input;
    $outputFile = get_template_directory().'/css/'.$output;

    try {
		$less->compileFile($inputFile, $outputFile);
	} catch (Exception $ex) {
		echo "lessphp fatal error: ".$ex->getMessage();
	}
}
function compileChildLessFile($input, $output, $params) {
	require_once( plugin_dir_path( __FILE__ ).'less/lessc.inc.php' );
	$less = new lessc;
	$less->setVariables($params);
	
    // input and output location
    $inputFile = get_stylesheet_directory().'/less/'.$input;
    $outputFile = get_stylesheet_directory().'/css/'.$output;

    try {
		$less->compileFile($inputFile, $outputFile);
	} catch (Exception $ex) {
		echo "lessphp fatal error: ".$ex->getMessage();
	}
}
//Shortcodes
add_shortcode( 'roadlogo', 'javenist_logo_shortcode' );
add_shortcode( 'roadmainmenu', 'javenist_mainmenu_shortcode' );
add_shortcode( 'roadcategoriesmenu', 'javenist_roadcategoriesmenu_shortcode' );
add_shortcode( 'roadlangswitch', 'javenist_roadlangswitch_shortcode' );
add_shortcode( 'roadsocialicons', 'javenist_roadsocialicons_shortcode' );
add_shortcode( 'roadminicart', 'javenist_roadminicart_shortcode' );
add_shortcode( 'roadproductssearch', 'javenist_roadproductssearch_shortcode' );
add_shortcode( 'roadcopyright', 'javenist_roadcopyright_shortcode' );
add_shortcode( 'ourbrands', 'javenist_brands_shortcode' );
add_shortcode( 'javenist_counter', 'javenist_counter_shortcode' );
add_shortcode( 'list_categories', 'javenist_list_categories_shortcode' );
add_shortcode( 'categoriescarousel', 'javenist_categoriescarousel_shortcode' );
add_shortcode( 'latestposts', 'javenist_latestposts_shortcode' );
add_shortcode( 'javenist_map', 'javenist_contact_map' );
add_shortcode( 'roadtimesale', 'javenist_roadtimesale_shortcode' ); 
add_shortcode( 'magnifier_map', 'javenist_magnifier_options' );

function javenist_blog_sharing() {
    global $post;

    $javenist_opt = get_option( 'javenist_opt' );
    
    $share_url = get_permalink( $post->ID );
    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
    $postimg = $large_image_url[0];
    $posttitle = get_the_title( $post->ID );
    ?>
    <div class="widget widget_socialsharing_widget">
        <h3 class="widget-title"><?php if(isset($javenist_opt['blog_share_title'])) { echo esc_html($javenist_opt['blog_share_title']); } else { esc_html_e('Share this post', 'javenist'); } ?></h3>
        <ul class="social-icons">
            <li><a class="facebook social-icon" href="#" onclick="javascript: window.open('<?php echo 'https://www.facebook.com/sharer/sharer.php?u='.$share_url; ?>'); return false;" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li><a class="twitter social-icon" href="#" title="Twitter" onclick="javascript: window.open('<?php echo 'https://twitter.com/home?status='.$posttitle.'&nbsp;'.$share_url; ?>'); return false;" target="_blank"><i class="fa fa-twitter"></i></a></li>
            <li><a class="pinterest social-icon" href="#" onclick="javascript: window.open('<?php echo 'https://pinterest.com/pin/create/button/?url='.$share_url.'&amp;media='.$postimg.'&amp;description='.$posttitle; ?>'); return false;" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a></li>
            <li><a class="gplus social-icon" href="#" onclick="javascript: window.open('<?php echo 'https://plus.google.com/share?url='.$share_url; ?>'); return false;" title="Google +" target="_blank"><i class="fa fa-google-plus"></i></a></li>
            <li><a class="linkedin social-icon" href="#" onclick="javascript: window.open('<?php echo 'https://www.linkedin.com/shareArticle?mini=true&amp;url='.$share_url.'&amp;title='.$posttitle; ?>'); return false;" title="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a></li>
        </ul>
    </div>
    <?php
}
function javenist_product_sharing() {
    $javenist_opt = get_option( 'javenist_opt' );
    
    if(isset($_POST['data'])) { // for the quickview
        $postid = intval( $_POST['data'] );
    } else {
        $postid = get_the_ID();
    }
    
    $share_url = get_permalink( $postid );

    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'large' );
    $postimg = $large_image_url[0];
    $posttitle = get_the_title( $postid );
    ?>
    <div class="widget widget_socialsharing_widget">
        <h3 class="widget-title"><?php if(isset($javenist_opt['product_share_title'])) { echo esc_html($javenist_opt['product_share_title']); } else { esc_html_e('Share this product', 'javenist'); } ?></h3>
        <ul class="social-icons">
            <li><a class="facebook social-icon" href="#" onclick="javascript: window.open('<?php echo 'https://www.facebook.com/sharer/sharer.php?u='.$share_url; ?>'); return false;" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li><a class="twitter social-icon" href="#" title="Twitter" onclick="javascript: window.open('<?php echo 'https://twitter.com/home?status='.$posttitle.'&nbsp;'.$share_url; ?>'); return false;" target="_blank"><i class="fa fa-twitter"></i></a></li>
            <li><a class="pinterest social-icon" href="#" onclick="javascript: window.open('<?php echo 'https://pinterest.com/pin/create/button/?url='.$share_url.'&amp;media='.$postimg.'&amp;description='.$posttitle; ?>'); return false;" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a></li>
            <li><a class="gplus social-icon" href="#" onclick="javascript: window.open('<?php echo 'https://plus.google.com/share?url='.$share_url; ?>'); return false;" title="Google +" target="_blank"><i class="fa fa-google-plus"></i></a></li>
            <li><a class="linkedin social-icon" href="#" onclick="javascript: window.open('<?php echo 'https://www.linkedin.com/shareArticle?mini=true&amp;url='.$share_url.'&amp;title='.$posttitle; ?>'); return false;" title="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a></li>
        </ul>
    </div>
    <?php
}?>