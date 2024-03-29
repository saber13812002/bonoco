<?php
	/*
		Plugin name: Rich-Web Tabs
		Plugin URI: https://rich-web.org/wp-tab-accordion/
		Description: Tabs plugin is fully responsive. Tabs plugin for the creating responsive tabbed panels with unlimited options and transition animations support.
		Version: 1.1.6
		Author: richteam
		Author URI: https://rich-web.org/
		License: http://www.gnu.org/licenses/gpl-2.0.html
	*/

	add_action('widgets_init', 'Rich_Web_Tabs_Reg_Widget');

	function Rich_Web_Tabs_Reg_Widget(){
		register_widget('Rich_Web_Tabs');
	}
	require_once(dirname(__FILE__) . '/Tabs-Rich-Web-Widget.php');
	require_once(dirname(__FILE__) . '/Tabs-Rich-Web-Ajax.php');
	require_once(dirname(__FILE__) . '/Tabs-Rich-Web-Shortcode.php');

	add_action('wp_enqueue_scripts','Rich_Web_Tabs_Style');
	function Rich_Web_Tabs_Style(){
		wp_register_style('Rich_Web_Tabs', plugins_url('/Style/Tabs-Rich-Web-Widget.css',__FILE__));
		wp_enqueue_style('Rich_Web_Tabs');
		wp_register_script('Rich_Web_Tabs',plugins_url('/Scripts/Tabs-Rich-Web-Widget.js',__FILE__),array('jquery','jquery-ui-core', 'jquery-effects-blind', 'jquery-effects-bounce', 'jquery-effects-clip', 'jquery-effects-drop', 'jquery-effects-explode', 'jquery-effects-fade', 'jquery-effects-fold', 'jquery-effects-highlight', 'jquery-effects-pulsate', 'jquery-effects-scale', 'jquery-effects-shake', 'jquery-effects-slide', 'jquery-effects-size', 'jquery-effects-puff'));
		wp_localize_script('Rich_Web_Tabs', 'object', array('ajaxurl' => admin_url('admin-ajax.php')));
		wp_enqueue_script('Rich_Web_Tabs');
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-effects-blind');
		wp_enqueue_script('jquery-effects-bounce');
		wp_enqueue_script('jquery-effects-clip');
		wp_enqueue_script('jquery-effects-drop');
		wp_enqueue_script('jquery-effects-explode');
		wp_enqueue_script('jquery-effects-fade');
		wp_enqueue_script('jquery-effects-fold');
		wp_enqueue_script('jquery-effects-highlight');
		wp_enqueue_script('jquery-effects-pulsate');
		wp_enqueue_script('jquery-effects-scale');
		wp_enqueue_script('jquery-effects-shake');
		wp_enqueue_script('jquery-effects-slide');
		wp_enqueue_script('jquery-effects-size');
		wp_enqueue_script('jquery-effects-puff');
		wp_register_style( 'fontawesome-css', plugins_url('/Style/richwebicons.css', __FILE__)); 
		wp_enqueue_style( 'fontawesome-css' );
	}

	add_action("admin_menu", 'Rich_Web_Tabs_Admin_Menu' );
	function Rich_Web_Tabs_Admin_Menu() 
	{
		$complete_url = wp_nonce_url( '', 'edit-menu_', 'Rich_Web_Tabs_Nonce' );

		add_menu_page('Rich-Web Tabs Admin' . $complete_url,'Tabs','manage_options','Rich-Web Tabs Admin' . $complete_url,'Manage_Rich_Web_Tabs_Admin', plugins_url('/Images/admin.png',__FILE__));
		add_submenu_page( 'Rich-Web Tabs Admin' . $complete_url, 'Rich-Web Tabs Admin', 'Tabs Manager', 'manage_options', 'Rich-Web Tabs Admin' . $complete_url, 'Manage_Rich_Web_Tabs_Admin');
		add_submenu_page( 'Rich-Web Tabs Admin' . $complete_url, 'Rich-Web Tabs Themes', 'Tabs Themes', 'manage_options', 'Rich-Web Tabs Themes' . $complete_url, 'Manage_Rich_Web_Tabs_Themes');
		add_submenu_page( 'Rich-Web Tabs Admin' . $complete_url, 'Rich-Web Tabs Products', 'Our Products', 'manage_options', 'Rich-Web Tabs Products', 'Manage_Rich_Web_Tabs_Products');
	}
	function Manage_Rich_Web_Tabs_Admin()
	{
		require_once(dirname(__FILE__) . '/Tabs-Rich-Web-Admin.php');
	}
	function Manage_Rich_Web_Tabs_Themes()
	{
		require_once(dirname(__FILE__) . '/Tabs-Rich-Web-Theme.php');
		require_once(dirname(__FILE__) . '/Scripts/Tabs-Rich-Web-Theme.js.php');
		require_once(dirname(__FILE__) . '/Style/Tabs-Rich-Web-Theme.css.php');
	}
	function Manage_Rich_Web_Tabs_Products()
	{
		require_once(dirname(__FILE__) . '/Rich-Web-Products.php');
	}

	add_action('admin_init', 'Rich_Web_Tabs_Admin_Init');

	function Rich_Web_Tabs_Admin_Init(){
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker');

		wp_register_style('Rich_Web_Tabs', plugins_url('/Style/Tabs-Rich-Web-Admin.css',__FILE__));
		wp_enqueue_style('Rich_Web_Tabs');
		wp_register_script('Rich_Web_Tabs', plugins_url('Scripts/Tabs-Rich-Web-Admin.js',__FILE__),array('jquery','jquery-ui-core'));
		wp_localize_script('Rich_Web_Tabs', 'object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
		wp_enqueue_script('Rich_Web_Tabs');
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-sortable');

		wp_register_style( 'fontawesome-css', plugins_url('/Style/richwebicons.css', __FILE__)); 
		wp_enqueue_style( 'fontawesome-css' );
	}

	register_activation_hook(__FILE__, 'Ric_Web_Tabs_wp_activate');
	function Ric_Web_Tabs_wp_activate()
	{
		require_once('Tabs-Rich-Web-Install.php');
	}
	function Rich_Web_Tabs_Color() 
	{
		wp_enqueue_script(
			'alpha-color-picker',
			plugins_url('/Scripts/alpha-color-picker.js', __FILE__),
			array( 'jquery', 'wp-color-picker' ), // You must include these here.
			null,
			true
		);
		wp_enqueue_style(
			'alpha-color-picker',
			plugins_url('/Style/alpha-color-picker.css', __FILE__),
			array( 'wp-color-picker' ) // You must include these here.
		);
	}
	add_action( 'admin_enqueue_scripts', 'Rich_Web_Tabs_Color' );
?>