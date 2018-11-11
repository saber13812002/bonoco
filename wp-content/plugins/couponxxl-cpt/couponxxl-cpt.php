<?php
/*
Plugin Name: CouponXxL Custom Post Types
Plugin URI: http://demo.powerthemes.club/themes/couponxxl/
Description: Coupon XxL custom post types and taxonomies
Version: 1.3
Author: pebas
Author URI: http://themeforest.net/user/pebas/
License: GNU General Public License version 3.0
*/

if ( ! function_exists( 'couponxxl_post_types_and_taxonomies' ) ) {
	function couponxxl_post_types_and_taxonomies() {
		$offer_args = array(
			'labels'      => array(
				'name'          => __( 'Offers', 'couponxxl' ),
				'singular_name' => __( 'Offer', 'couponxxl' )
			),
			'public'      => true,
			'menu_icon'   => 'dashicons-megaphone',
			'has_archive' => false,
			'supports'    => array(
				'title',
				'editor',
				'thumbnail',
				'author',
				'excerpt',
				'comments'
			)
		);
		if ( class_exists( 'ReduxFramework' ) && function_exists( 'couponxxl_get_option' ) ) {
			$trans_offer = couponxxl_get_option( 'trans_offer' );
			if ( ! empty( $trans_offer ) ) {
				$offer_args['rewrite'] = array( 'slug' => $trans_offer );
			}
		}
		register_post_type( 'offer', $offer_args );

		register_taxonomy( 'location', array( 'offer' ), array(
			'label'        => __( 'Location', 'couponxxl' ),
			'hierarchical' => true,
			'labels'       => array(
				'name'                       => __( 'Location', 'couponxxl' ),
				'singular_name'              => __( 'Location', 'couponxxl' ),
				'menu_name'                  => __( 'Location', 'couponxxl' ),
				'all_items'                  => __( 'All Locations', 'couponxxl' ),
				'edit_item'                  => __( 'Edit Location', 'couponxxl' ),
				'view_item'                  => __( 'View Location', 'couponxxl' ),
				'update_item'                => __( 'Update Location', 'couponxxl' ),
				'add_new_item'               => __( 'Add New Location', 'couponxxl' ),
				'new_item_name'              => __( 'New Location Name', 'couponxxl' ),
				'parent_item'                => __( 'Parent Location', 'couponxxl' ),
				'parent_item_colon'          => __( 'Parent Location:', 'couponxxl' ),
				'search_items'               => __( 'Search Locations', 'couponxxl' ),
				'popular_items'              => __( 'Popular Locations', 'couponxxl' ),
				'separate_items_with_commas' => __( 'Separate locations with commas', 'couponxxl' ),
				'add_or_remove_items'        => __( 'Add or remove locations', 'couponxxl' ),
				'choose_from_most_used'      => __( 'Choose from the most used locations', 'couponxxl' ),
				'not_found'                  => __( 'No locations found', 'couponxxl' ),
			)

		) );


		register_taxonomy( 'offer_cat', array( 'offer' ), array(
			'label'        => __( 'Offer Categories', 'couponxxl' ),
			'hierarchical' => true,
			'labels'       => array(
				'name'                       => __( 'Offer Categories', 'couponxxl' ),
				'singular_name'              => __( 'Offer Category', 'couponxxl' ),
				'menu_name'                  => __( 'Offer Category', 'couponxxl' ),
				'all_items'                  => __( 'All Offer Categories', 'couponxxl' ),
				'edit_item'                  => __( 'Edit Offer Category', 'couponxxl' ),
				'view_item'                  => __( 'View Offer Category', 'couponxxl' ),
				'update_item'                => __( 'Update Offer Category', 'couponxxl' ),
				'add_new_item'               => __( 'Add New Offer Category', 'couponxxl' ),
				'new_item_name'              => __( 'New Offer Category Name', 'couponxxl' ),
				'parent_item'                => __( 'Parent Offer Category', 'couponxxl' ),
				'parent_item_colon'          => __( 'Parent Offer Category:', 'couponxxl' ),
				'search_items'               => __( 'Search Offer Categories', 'couponxxl' ),
				'popular_items'              => __( 'Popular Offer Categories', 'couponxxl' ),
				'separate_items_with_commas' => __( 'Separate offer categories with commas', 'couponxxl' ),
				'add_or_remove_items'        => __( 'Add or remove offer categories', 'couponxxl' ),
				'choose_from_most_used'      => __( 'Choose from the most used offer categories', 'couponxxl' ),
				'not_found'                  => __( 'No offer categories found', 'couponxxl' ),
			)

		) );

		register_taxonomy( 'offer_tag', array( 'offer' ), array(
			'label'        => __( 'Offer Tags', 'couponxxl' ),
			'hierarchical' => false,
			'labels'       => array(
				'name'                       => __( 'Offer Tags', 'couponxxl' ),
				'singular_name'              => __( 'Offer Tag', 'couponxxl' ),
				'menu_name'                  => __( 'Offer Tag', 'couponxxl' ),
				'all_items'                  => __( 'All Offer Tags', 'couponxxl' ),
				'edit_item'                  => __( 'Edit Offer Tag', 'couponxxl' ),
				'view_item'                  => __( 'View Offer Tag', 'couponxxl' ),
				'update_item'                => __( 'Update Offer Tag', 'couponxxl' ),
				'add_new_item'               => __( 'Add New Offer Tag', 'couponxxl' ),
				'new_item_name'              => __( 'New Offer Tag Name', 'couponxxl' ),
				'parent_item'                => __( 'Parent Offer Tag', 'couponxxl' ),
				'parent_item_colon'          => __( 'Parent Offer Tag:', 'couponxxl' ),
				'search_items'               => __( 'Search Offer Tags', 'couponxxl' ),
				'popular_items'              => __( 'Popular Offer Tags', 'couponxxl' ),
				'separate_items_with_commas' => __( 'Separate offer tags with commas', 'couponxxl' ),
				'add_or_remove_items'        => __( 'Add or remove offer tags', 'couponxxl' ),
				'choose_from_most_used'      => __( 'Choose from the most used offer tags', 'couponxxl' ),
				'not_found'                  => __( 'No offer tags found', 'couponxxl' ),
			)

		) );

		$store_args = array(
			'labels'      => array(
				'name'          => __( 'Stores', 'couponxxl' ),
				'singular_name' => __( 'Store', 'couponxxl' )
			),
			'public'      => true,
			'menu_icon'   => 'dashicons-store',
			'has_archive' => false,
			'supports'    => array(
				'title',
				'editor',
				'thumbnail'
			),
		);
		if ( class_exists( 'ReduxFramework' ) && function_exists( 'couponxxl_get_option' ) ) {
			$trans_store = couponxxl_get_option( 'trans_store' );
			if ( ! empty( $trans_store ) ) {
				$store_args['rewrite'] = array( 'slug' => $trans_store );
			}
		}
		register_post_type( 'store', $store_args );

		$order_args = array(
			'labels'      => array(
				'name'          => __( 'Orders', 'couponxxl' ),
				'singular_name' => __( 'Order', 'couponxxl' )
			),
			'public'      => true,
			'menu_icon'   => 'dashicons-cart',
			'has_archive' => false,
			'supports'    => array(
				'title',
				'author',
			)
		);
		register_post_type( 'ord', $order_args );

		if ( class_exists( 'Seravo_Custom_Bulk_Action' ) ) {
			$bulk_actions = new Seravo_Custom_Bulk_Action( array( 'post_type' => 'order' ) );

			$bulk_actions->register_bulk_action( array(
				'menu_text'    => __( 'Process Order', 'couponxxl' ),
				'admin_notice' => '',
				'callback'     => function ( $post_ids ) {
					couponxxl_process_order( $post_ids );

					return true;
				}
			) );

			$bulk_actions->init();
		}

	}
}
add_action( 'init', 'couponxxl_post_types_and_taxonomies', 0 );

function couponxxl_remove_submenu_order() {
	global $submenu;
	unset( $submenu['edit.php?post_type=ord'][10] );
}

add_action( 'admin_menu', 'couponxxl_remove_submenu_order' );

function couponxxl_hide_new_order() {
	if ( 'ord' == get_post_type() ) {
		echo '<style type="text/css">
    			.page-title-action { display:none; }
    		</style>';
	}
}

add_action( 'admin_head', 'couponxxl_hide_new_order' );


use Leafo\ScssPhp\Compiler;

if ( ! defined( 'CXXL_P_PATH' ) ) {
	define( 'CXXL_P_PATH', str_replace( '\\', '/', dirname( __FILE__ ) ) );
}
if ( is_admin() ) {
	require_once CXXL_P_PATH . '/radium-one-click-demo-install/init.php';
	require_once CXXL_P_PATH . '/scssphp/scss.inc.php';
}

require_once CXXL_P_PATH . '/pdf/fpdf.php';

function couponxxl_p_create_sass() {
	if ( function_exists( 'couponxxl_get_option' ) ) {
		$scss = new Compiler();

		$site_logo_padding = couponxxl_get_option( 'site_logo_padding' );
		if ( empty( $site_logo_padding ) ) {
			$site_logo_padding = '0px';
		}

		$customize = array(
			'THEME_FONT'         => couponxxl_get_option( 'theme_font' ),
			'BODY_BG'            => couponxxl_get_option( 'body_background' ),
			'FOOTER_BG'          => couponxxl_get_option( 'footer_background' ),
			'FOOTER_WIDGET_BG'   => couponxxl_get_option( 'footer_widget_background' ),
			'BORDER_COLOR'       => couponxxl_get_option( 'border_color' ),
			'MAIN_FONT_COLOR'    => couponxxl_get_option( 'font_color' ),
			'FONT_LIGHTEN_COLOR' => couponxxl_get_option( 'font_lighten' ),
			'FOOTER_FONT_COLOR'  => couponxxl_get_option( 'font_light' ),
			'FOOTER_WIDGET_FONT' => couponxxl_get_option( 'footer_widget_font' ),
			'MAIN_GREEN'         => couponxxl_get_option( 'main_green_color' ),
			'SEC_RED'            => couponxxl_get_option( 'sec_red_color' ),
			'THIRD_BLUE'         => couponxxl_get_option( 'thr_blue_color' ),
			'BOX_BG'             => couponxxl_get_option( 'box_bg_color' ),
			'LOGO_PADDING'       => $site_logo_padding,
		);

		$content = file_get_contents( get_template_directory() . '/scss/style.scss' );
		foreach ( $customize as $key => $replacement ) {
			$content = str_replace( $key, $replacement, $content );
		}
		$compiled = $scss->compile( $content );

		$file = fopen( get_template_directory() . '/css/customize.css', 'w' );
		if ( $file ) {
			fwrite( $file, $compiled );
			fclose( $file );
		}
	}
}

add_action( 'redux/options/couponxxl_options/saved', 'couponxxl_p_create_sass' );


/*
Extra tables required
*/
if ( ! function_exists( 'couponxxl_create_tables' ) ) {
	function couponxxl_create_tables() {
		global $wpdb;
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE {$wpdb->prefix}store_markers (
	  marker_id mediumint(9) NOT NULL AUTO_INCREMENT,
	  post_id bigint(20) UNSIGNED NOT NULL DEFAULT 0,
	  term_slug varchar(200) NOT NULL,
	  longitude varchar(100) NOT NULL,
	  latitude varchar(100) NOT NULL,
	  name text NOT NULL,
	  UNIQUE KEY marker_id (marker_id)
	) $charset_collate;";
		dbDelta( $sql );

		$sql = "CREATE TABLE {$wpdb->prefix}offers (
	  offer_id mediumint(9) NOT NULL AUTO_INCREMENT,
	  post_id bigint(20) UNSIGNED NOT NULL DEFAULT 0,
	  offer_type varchar(10),
	  offer_start double,
	  offer_expire double,
	  offer_in_slider varchar(3),
	  offer_has_items varchar(1) NOT NULL DEFAULT 0,
	  offer_thumbs_recommend varchar(10) NOT NULL DEFAULT 0,
	  offer_clicks varchar(10) NOT NULL DEFAULT 0,
	  UNIQUE KEY offer_id (offer_id)
	) $charset_collate;";
		dbDelta( $sql );

		$sql = "CREATE TABLE {$wpdb->prefix}order_items (
	  item_id mediumint(9) NOT NULL AUTO_INCREMENT,
	  order_id bigint(20) UNSIGNED NOT NULL DEFAULT 0,
	  price varchar(10),
	  qty int(39),
	  seller_id varchar(30),
	  buyer_id varchar(30),
	  offer_title varchar(255),
	  owner_share varchar(255),
	  seller_share varchar(255),
	  offer_id varchar(255),
	  status varchar(255),
	  UNIQUE KEY item_id (item_id)
	) $charset_collate;";
		dbDelta( $sql );

		$sql = "CREATE TABLE {$wpdb->prefix}vouchers (
	  voucher_id mediumint(9) NOT NULL AUTO_INCREMENT,
	  item_id mediumint(9) NOT NULL DEFAULT 0,
	  voucher_status varchar(1) NOT NULL DEFAULT 0,
	  voucher_code varchar(255),
	  UNIQUE KEY voucher_id (voucher_id)
	) $charset_collate;";
		dbDelta( $sql );

	}

	add_action( 'init', 'couponxxl_create_tables' );
}

/*
Deletion of the post extra tables since myIsam engine has no cascade
*/
if ( ! function_exists( 'couponxxl_extra_tables_cleanup' ) ) {
	function couponxxl_extra_tables_cleanup( $post_id ) {
		global $post_type, $wpdb;
		if ( $post_type == 'store' ) {
			$wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->prefix}store_markers WHERE post_id = %d", $post_id ) );
		} else if ( $post_type == 'offer' ) {
			$wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->prefix}offers WHERE post_id = %d", $post_id ) );
		} else if ( $post_type == 'ord' ) {
			$wpdb->query( $wpdb->prepare( "DELETE vouchers FROM {$wpdb->prefix}vouchers AS vouchers LEFT JOIN {$wpdb->prefix}order_items AS order_items ON vouchers.item_id = order_items.item_id WHERE order_items.order_id = %d", $post_id ) );
			$wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->prefix}order_items WHERE order_id = %d", $post_id ) );
		}
	}

	add_action( 'before_delete_post', 'couponxxl_extra_tables_cleanup', 10, 1 );
}

/*
 * ADDITIONAL FUNCTIONS
 */

/*
Disable admin bar for non admins
*/
if ( ! function_exists( 'couponxxl_remove_bar' ) ) {
	function couponxxl_remove_bar() {
		$user_ID             = get_current_user_id();
		$cxxl_access_backend = get_user_meta( $user_ID, 'cxxl_access_backend', true );
		if ( ! current_user_can( 'administrator' ) && ! is_admin() && ( ! $cxxl_access_backend || $cxxl_access_backend == 'no' ) ) {
			show_admin_bar( false );
		}
	}

	add_action( 'after_setup_theme', 'couponxxl_remove_bar' );
}

/*
Send contact
*/
if ( ! function_exists( 'couponxxl_send_contact' ) ) {
	function couponxxl_send_contact() {
		$errors  = array();
		$name    = isset( $_POST['name'] ) ? esc_sql( $_POST['name'] ) : '';
		$email   = isset( $_POST['email'] ) ? esc_sql( $_POST['email'] ) : '';
		$message = isset( $_POST['message'] ) ? esc_sql( $_POST['message'] ) : '';
		if ( ! isset( $_POST['captcha'] ) ) {
			if ( ! empty( $name ) && ! empty( $email ) && ! empty( $message ) ) {
				if ( filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
					$email_to = couponxxl_get_option( 'contact_mail' );
					$subject  = couponxxl_get_option( 'contact_form_subject' );
					if ( ! empty( $email_to ) ) {
						$message = "
						" . esc_html__( 'Name: ', 'couponxxl' ) . " {$name} \n
						" . esc_html__( 'Email: ', 'couponxxl' ) . " {$email} \n
						" . esc_html__( 'Message: ', 'couponxxl' ) . "\n {$message} \n
					";
						$info    = @wp_mail( $email_to, $subject, $message );
						if ( $info ) {
							echo json_encode( array(
								'success' => esc_html__( 'Your message was successfully submitted.', 'couponxxl' ),
							) );
							die();
						} else {
							echo json_encode( array(
								'error' => esc_html__( 'Unexpected error while attempting to send e-mail.', 'couponxxl' ),
							) );
							die();
						}
					} else {
						echo json_encode( array(
							'error' => esc_html__( 'Message is not send since the recepient email is not yet set.', 'couponxxl' ),
						) );
						die();
					}
				} else {
					echo json_encode( array(
						'error' => esc_html__( 'Email is not valid.', 'couponxxl' ),
					) );
					die();
				}
			} else {
				echo json_encode( array(
					'error' => esc_html__( 'All fields are required.', 'couponxxl' ),
				) );
				die();
			}
		} else {
			echo json_encode( array(
				'error' => esc_html__( 'Captcha is wrong.', 'couponxxl' ),
			) );
			die();
		}
	}

	add_action( 'wp_ajax_contact', 'couponxxl_send_contact' );
	add_action( 'wp_ajax_nopriv_contact', 'couponxxl_send_contact' );
}

/*
Forgot password
*/
if ( ! function_exists( 'couponxxl_recover' ) ) {
	function couponxxl_recover() {
		$response = array();
		if ( wp_verify_nonce( $_POST['recover_field'], 'recover' ) ) {
			$email = $_POST['email'];
			if ( ! empty( $email ) ) {
				if ( filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
					if ( email_exists( $email ) ) {
						$user                  = get_user_by( 'email', $email );
						$new_password          = couponxxl_random_string( 5 );
						$update_fields         = array(
							'ID'        => $user->ID,
							'user_pass' => $new_password,
						);
						$update_id             = wp_update_user( $update_fields );
						$lost_password_message = couponxxl_get_option( 'lost_password_message' );
						$lost_password_message = str_replace( "%USERNAME%", $user->user_login, $lost_password_message );
						$lost_password_message = str_replace( "%PASSWORD%", $new_password, $lost_password_message );

						$email_sender = couponxxl_get_option( 'email_sender' );
						$name_sender  = couponxxl_get_option( 'name_sender' );
						$headers      = array();
						$headers[]    = "MIME-Version: 1.0";
						$headers[]    = "Content-Type: text/html; charset=UTF-8";
						$headers[]    = "From: " . $name_sender . " <" . $email_sender . ">";

						$lost_password_subject = couponxxl_get_option( 'lost_password_subject' );

						$message_info = @wp_mail( $email, $lost_password_subject, $lost_password_message, $headers );
						if ( $message_info ) {
							$response['message'] = '<div class="alert alert-success">' . esc_html__( 'Email with the new password and your username is sent to the provided email address', 'couponxxl' ) . '</div>';
						} else {
							$response['message'] = '<div class="alert alert-danger">' . esc_html__( 'There was an error trying to send an email', 'couponxxl' ) . '</div>';
						}
					} else {
						$response['message'] = '<div class="alert alert-danger">' . esc_html__( 'There is no user with the provided email address', 'couponxxl' ) . '</div>';
					}
				} else {
					$response['message'] = '<div class="alert alert-danger">' . esc_html__( 'Email address is invalid', 'couponxxl' ) . '</div>';
				}
			} else {
				$response['message'] = '<div class="alert alert-danger">' . esc_html__( 'Email address is empty', 'couponxxl' ) . '</div>';
			}
		} else {
			$response['message'] = '<div class="alert alert-danger">' . esc_html__( 'You do not have permission for your action', 'couponxxl' ) . '</div>';
		}

		echo json_encode( $response );
		die();
	}

	add_action( 'wp_ajax_recover', 'couponxxl_recover' );
	add_action( 'wp_ajax_nopriv_recover', 'couponxxl_recover' );
}

/*
Send order message
*/
if ( ! function_exists( 'couponxxl_send_mail' ) ) {
	function couponxxl_send_mail( $to, $subject, $message ) {
		$headers   = array();
		$headers[] = "MIME-Version: 1.0";
		$headers[] = "Content-Type: text/html; charset=UTF-8";

		$from_mail = couponxxl_get_option( 'email_sender' );
		$from_name = couponxxl_get_option( 'name_sender' );
		$headers[] = "From: " . $from_name . " <" . $from_mail . ">";

		$info = @wp_mail( $to, $subject, $message, $headers );
	}
}

/*
Add new agent
*/
if ( ! function_exists( 'couponxxl_add_agent' ) ) {
	function couponxxl_add_agent() {
		$response        = array();
		$agent_username  = isset( $_POST['agent_username'] ) ? $_POST['agent_username'] : '';
		$agent_email     = isset( $_POST['agent_email'] ) ? $_POST['agent_email'] : '';
		$password        = isset( $_POST['password'] ) ? $_POST['password'] : '';
		$repeat_password = isset( $_POST['repeat_password'] ) ? $_POST['repeat_password'] : '';

		if ( ! empty( $agent_username ) && ! empty( $agent_email ) ) {
			if ( ! username_exists( $agent_username ) ) {
				if ( ! email_exists( $agent_email ) ) {
					if ( $repeat_password == $password ) {
						$user_id = wp_insert_user( array(
							'user_login' => $agent_username,
							'user_pass'  => $password,
							'user_email' => $agent_email
						) );
						wp_update_user( array(
							'ID'   => $user_id,
							'role' => 'editor'
						) );
						update_user_meta( $user_id, 'cxxl_vendor_agent_parent', get_current_user_id() );
						update_user_meta( $user_id, 'cxxl_account_type', 'agent' );
						$response['message'] = '<div class="alert alert-success">' . esc_html__( 'Agent has been created', 'couponxxl' ) . '</div>';

						$new_agent_message = couponxxl_get_option( 'new_agent_message' );
						$new_agent_message = str_replace( "%USERNAME%", $agent_username, $new_agent_message );
						$new_agent_message = str_replace( "%PASSWORD%", $password, $new_agent_message );

						$email_sender = couponxxl_get_option( 'email_sender' );
						$name_sender  = couponxxl_get_option( 'name_sender' );
						$headers      = array();
						$headers[]    = "MIME-Version: 1.0";
						$headers[]    = "Content-Type: text/html; charset=UTF-8";
						$headers[]    = "From: " . $name_sender . " <" . $email_sender . ">";

						$new_agent_subject = couponxxl_get_option( 'new_agent_subject' );

						$message_info = @wp_mail( $agent_email, $new_agent_subject, $new_agent_message, $headers );

						$response['message'] = '<div class="alert alert-success">' . esc_html__( 'Agent has been created and an email is sent to the email you have provided', 'couponxxl' ) . '</div>';
					} else {
						$response['message'] = '<div class="alert alert-danger">' . esc_html__( 'Passwords do not match', 'couponxxl' ) . '</div>';
					}
				} else {
					$response['message'] = '<div class="alert alert-danger">' . esc_html__( 'Agent with that email is already registered', 'couponxxl' ) . '</div>';
				}
			} else {
				$response['message'] = '<div class="alert alert-danger">' . esc_html__( 'Agent with that username is already registered', 'couponxxl' ) . '</div>';
			}
		} else {
			$response['message'] = '<div class="alert alert-danger">' . esc_html__( 'Agent name and email are required', 'couponxxl' ) . '</div>';
		}
		echo json_encode( $response );
		die();
	}

	add_action( 'wp_ajax_add_agent', 'couponxxl_add_agent' );
	add_action( 'wp_ajax_nopriv_add_agent', 'couponxxl_add_agent' );
}

?>
