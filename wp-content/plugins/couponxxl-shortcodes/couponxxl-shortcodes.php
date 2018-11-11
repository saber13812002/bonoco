<?php
/*
Plugin Name: CouponXxL Shortcodes
Plugin URI: http://demo.powerthemes.club/themes/couponxxl/
Description: Coupon XxL all shortcodes
Version: 1.0
Author: pebas
Author URI: http://themeforest.net/user/pebas/
License: GNU General Public License version 3.0
*/

/*
Enqueue script and styles in the backend
*/
if ( ! function_exists( 'couponxxl_shortcodes_admin_resources' ) ) {
	function couponxxl_shortcodes_admin_resources() {
		wp_enqueue_style( 'couponxxl-shortcodes-style', plugin_dir_url( __FILE__ ) . 'css/admin.css' );
	}
}
add_action( 'admin_enqueue_scripts', 'couponxxl_shortcodes_admin_resources' );

foreach ( glob( plugin_dir_path( __FILE__ ) . "shortcodes/*.php" ) as $filename ) {
	require_once( plugin_dir_path( __FILE__ ) . 'shortcodes/' . wp_basename( $filename ) );
}

if( is_admin() ) {
	require_once( plugin_dir_path( __FILE__ ) . 'shortcodes.php' );
}
