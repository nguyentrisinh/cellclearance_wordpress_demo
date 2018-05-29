/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );
	
	// Whether a header image is available.
		function hasHeaderImage() {
			var image = wp.customize( 'header_image' )();
			return '' !== image && 'remove-header' !== image;
		}
		
		// Toggle a body class if a custom header exists.
		$.each( [ 'external_header_video', 'header_image', 'header_video' ], function( index, settingId ) {
			wp.customize( settingId, function( setting ) {
				setting.bind(function() {
					if ( hasHeaderImage() ) {
						$( document.body ).addClass( 'has-header-image' );
					} else {
						$( document.body ).removeClass( 'has-header-image' );
					}

					if ( ! hasHeaderVideo() ) {
						$( document.body ).removeClass( 'has-header-video' );
					}
				} );
			} );
		} );
		
	//customer care no 

	// for customer care number

	wp.customize("jstore_cust_care_no", function(value) {
		value.bind(function(newval) {
			$("#jstore_cust_care_no").html(newval);
		} );
	});

	//Banner image 1 

	
	// for customer care text
	wp.customize("jstore_cust_care_text", function(value) {
		value.bind(function(newval) {
			$("#jstore_cust_care_text").html(newval);
		} );
	});
	
	// for new arrival product heading
	wp.customize("jstore_new_arvl_itm", function(value) {
		value.bind(function(newval) {
			$("#jstore_new_arvl_itm").html(newval);
		} );
	});
	
	// for top rated product heading
	wp.customize("jstore_top_rtd_itm", function(value) {
		value.bind(function(newval) {
			$("#jstore_top_rtd_itm").html(newval);
		} );
	});
	
	// for top selling product heading
	wp.customize("jstore_top_seling_itm", function(value) {
		value.bind(function(newval) {
			$("#jstore_top_seling_itm").html(newval);
		} );
	});
	
	// for banner on off option

	wp.customize("jstore_home_banner_on_off", function(value) {
		value.bind(function(newval) {
			$("#jstore_home_banner_on_off").html(newval);
		} );
	});
	
	// for banner image 1

	wp.customize("jstore_bnr_img1", function(value) {
		value.bind(function(newval) {
			$("#jstore_bnr_img1").html(newval);
		} );
	});

	//Banner image 2

	
	// for banner image 2

	wp.customize("jstore_bnr_img2", function(value) {
		value.bind(function(newval) {
			$("#jstore_bnr_img2").html(newval);
		} );
	});
	
	//  for small banner on off option
	wp.customize("jstore_small_banner_on_off", function(value) {
		value.bind(function(newval) {
			$("#jstore_small_banner_on_off").html(newval);
		} );
	});
	
	// for small banner image 1
	wp.customize("jstore-small-banner-1", function(value) {
		value.bind(function(newval) {
			$("#jstore-small-banner-1").html(newval);
		} );
	});
	
	// for small banner image 2
	wp.customize("jstore-small-banner-2", function(value) {
		value.bind(function(newval) {
			$("#jstore-small-banner-2").html(newval);
		} );
	});
	
	// for small banner image 3
	wp.customize("jstore-small-banner-3", function(value) {
		value.bind(function(newval) {
			$("#jstore-small-banner-3").html(newval);
		} );
	});
	
	// for brand logo 1
	wp.customize("jstore_our_brand_logo1", function(value) {
		value.bind(function(newval) {
			$("#jstore_our_brand_logo1").html(newval);
		} );
	});
	
	// for brand logo 2
	wp.customize("jstore_our_brand_logo2", function(value) {
		value.bind(function(newval) {
			$("#jstore_our_brand_logo2").html(newval);
		} );
	});
	
	// for brand logo 3
	wp.customize("jstore_our_brand_logo3", function(value) {
		value.bind(function(newval) {
			$("#jstore_our_brand_logo3").html(newval);
		} );
	});
	
	// for brand logo 4
	wp.customize("jstore_our_brand_logo4", function(value) {
		value.bind(function(newval) {
			$("#jstore_our_brand_logo4").html(newval);
		} );
	});
	
	// for brand logo 5
	wp.customize("jstore_our_brand_logo5", function(value) {
		value.bind(function(newval) {
			$("#jstore_our_brand_logo5").html(newval);
		} );
	});
	
	// for brand logo 6
	wp.customize("jstore_our_brand_logo6", function(value) {
		value.bind(function(newval) {
			$("#jstore_our_brand_logo6").html(newval);
		} );
	});
	
	// for copyright text
	wp.customize("jstore_copyright_text", function(value) {
		value.bind(function(newval) {
			$("#jstore_copyright_text").html(newval);
		} );
	});

} )( jQuery );
