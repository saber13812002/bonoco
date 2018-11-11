<?php
	// Admin page
	add_action( 'wp_ajax_Rich_Web_Tabs_Del', 'Rich_Web_Tabs_Del_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_Tabs_Del', 'Rich_Web_Tabs_Del_Callback' );

	function Rich_Web_Tabs_Del_Callback()
	{
		$Tabs_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name3 = $wpdb->prefix . "rich_web_tabs_manager";
		$table_name4 = $wpdb->prefix . "rich_web_tabs_fields";

		$wpdb->query($wpdb->prepare("DELETE FROM $table_name3 WHERE id=%d", $Tabs_ID));
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name4 WHERE Tabs_ID=%d", $Tabs_ID));
		die();
	}

	add_action( 'wp_ajax_Rich_Web_Tabs_Edit_Main', 'Rich_Web_Tabs_Edit_Main_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_Tabs_Edit_Main', 'Rich_Web_Tabs_Edit_Main_Callback' );

	function Rich_Web_Tabs_Edit_Main_Callback()
	{
		$Tabs_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name3 = $wpdb->prefix . "rich_web_tabs_manager";

		$Rich_Web_Tabs_Manager=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE id=%d", $Tabs_ID));

		print_r($Rich_Web_Tabs_Manager);
		die();
	}

	add_action( 'wp_ajax_Rich_Web_Tabs_Edit_Tab', 'Rich_Web_Tabs_Edit_Tab_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_Tabs_Edit_Tab', 'Rich_Web_Tabs_Edit_Tab_Callback' );

	function Rich_Web_Tabs_Edit_Tab_Callback()
	{
		$Tabs_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name4 = $wpdb->prefix . "rich_web_tabs_fields";
		$array=array();

		$Rich_Web_Tabs_Fields=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE Tabs_ID=%d order by id", $Tabs_ID));

		for($i = 0; $i < count($Rich_Web_Tabs_Fields); $i++)
		{
			$Rich_Web_Tabs_Fields[$i]->Tabs_Subcontent = html_entity_decode($Rich_Web_Tabs_Fields[$i]->Tabs_Subcontent);
		}
		$array[]=$Rich_Web_Tabs_Fields;
		print json_encode($array);
		die();
	}

	add_action( 'wp_ajax_Rich_Web_Tabs_Copy', 'Rich_Web_Tabs_Copy_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_Tabs_Copy', 'Rich_Web_Tabs_Copy_Callback' );

	function Rich_Web_Tabs_Copy_Callback()
	{
		$Tabs_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name2 = $wpdb->prefix . "rich_web_tabs_id";
		$table_name3 = $wpdb->prefix . "rich_web_tabs_manager";
		$table_name4 = $wpdb->prefix . "rich_web_tabs_fields";

		$Rich_Web_Tabs_Manager=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE id=%d", $Tabs_ID));
		$Rich_Web_Tabs_Fields=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE Tabs_ID=%d order by id", $Tabs_ID));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, Tabs_name, Tabs_theme, SubTitles_Count) VALUES (%d, %s, %s, %d)", '', $Rich_Web_Tabs_Manager[0]->Tabs_name, $Rich_Web_Tabs_Manager[0]->Tabs_theme, $Rich_Web_Tabs_Manager[0]->SubTitles_Count));

		$Tabs_ID_Old=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id>%d order by id desc limit 1",0));
		$Rich_Web_Tabs_Id=$Tabs_ID_Old[0]->Tabs_ID + 1;
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Tabs_ID) VALUES (%d, %d)", '', $Rich_Web_Tabs_Id));

		for( $i=0; $i<$Rich_Web_Tabs_Manager[0]->SubTitles_Count; $i++ )
		{
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, Tabs_ID, Tabs_Subtitle, Tabs_Subicon, Tabs_Subcontent) VALUES (%d, %d, %s, %s, %s)", '', $Rich_Web_Tabs_Id, $Rich_Web_Tabs_Fields[$i]->Tabs_Subtitle, $Rich_Web_Tabs_Fields[$i]->Tabs_Subicon, $Rich_Web_Tabs_Fields[$i]->Tabs_Subcontent));
		}
		die();
	}

	//Theme page
	add_action( 'wp_ajax_Rich_Web_Tabs_Edit_Theme', 'Rich_Web_Tabs_Edit_Theme_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_Tabs_Edit_Theme', 'Rich_Web_Tabs_Edit_Theme_Callback' );

	function Rich_Web_Tabs_Edit_Theme_Callback()
	{
		$Theme_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name5 = $wpdb->prefix . "rich_web_tabs_effects_data";
		$table_name6 = $wpdb->prefix . "rich_web_tabs_effect_1";

		$Rich_Web_Tabs_Themes = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE id = %d", $Theme_ID));

		if($Rich_Web_Tabs_Themes[0]->Rich_Web_Tabs_T_Ty=='Rich_Tabs_1')
		{
			$Rich_Web_Tabs_Theme = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE Tabs_T_ID = %s", $Theme_ID));
		}
		else if($Rich_Web_Tabs_Themes[0]->Rich_Web_Tabs_T_Ty=='Rich_Tabs_2')
		{
			$Rich_Web_Tabs_Theme = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE Tabs_T_ID = %s", $Theme_ID));
		}

		print_r($Rich_Web_Tabs_Theme);
		die();
	}

	add_action( 'wp_ajax_Rich_Web_Tabs_Edit_Theme_ACD', 'Rich_Web_Tabs_Edit_Theme_ACD_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_Tabs_Edit_Theme_ACD', 'Rich_Web_Tabs_Edit_Theme_ACD_Callback' );

	function Rich_Web_Tabs_Edit_Theme_ACD_Callback()
	{
		$Theme_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name7 = $wpdb->prefix . "rich_web_tabs_effect_2";

		$Rich_Web_Tabs_Theme_ACD = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name7 WHERE Tabs_T_ID = %s", $Theme_ID));

		print_r($Rich_Web_Tabs_Theme_ACD);
		die();
	}

	add_action( 'wp_ajax_Rich_Web_Tabs_Clone_Theme', 'Rich_Web_Tabs_Clone_Theme_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_Tabs_Clone_Theme', 'Rich_Web_Tabs_Clone_Theme_Callback' );

	function Rich_Web_Tabs_Clone_Theme_Callback()
	{
		$Theme_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name5 = $wpdb->prefix . "rich_web_tabs_effects_data";
		$table_name6 = $wpdb->prefix . "rich_web_tabs_effect_1";
		$table_name7 = $wpdb->prefix . "rich_web_tabs_effect_2";

		$Rich_Web_Tabs_Themes = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE id = %d", $Theme_ID));

		if($Rich_Web_Tabs_Themes[0]->Rich_Web_Tabs_T_Ty=='Rich_Tabs_1')
		{
			$Rich_Web_Tabs_Theme = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE Tabs_T_ID = %s", $Theme_ID));
		} else if ($Rich_Web_Tabs_Themes[0]->Rich_Web_Tabs_T_Ty=='Rich_Tabs_2') {
			$Rich_Web_Tabs_Theme = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE Tabs_T_ID = %s", $Theme_ID));
			$Rich_Web_Tabs_Theme_ACD = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name7 WHERE Tabs_T_ID = %s", $Theme_ID));
		}

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name5 (id, Rich_Web_Tabs_T_T, Rich_Web_Tabs_T_Ty) VALUES (%d, %s, %s)", '', $Rich_Web_Tabs_Themes[0]->Rich_Web_Tabs_T_T, $Rich_Web_Tabs_Themes[0]->Rich_Web_Tabs_T_Ty));

		$Rich_Web_Tabs_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE id > %d order by id desc limit 1", 0));

		if($Rich_Web_Tabs_Themes[0]->Rich_Web_Tabs_T_Ty == 'Rich_Tabs_1')
		{
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name6 (id, Tabs_T_ID, Rich_Web_Tabs_T_T, Rich_Web_Tabs_T_Ty, Rich_Web_Tabs_T_W, Rich_Web_Tabs_T_Al, Rich_Web_Tabs_T_CA, Rich_Web_Tabs_T_NavM, Rich_Web_Tabs_T_NavAl, Rich_Web_Tabs_T_N_S, Rich_Web_Tabs_T_N_MBgC, Rich_Web_Tabs_T_N_MBC, Rich_Web_Tabs_T_N_PB, Rich_Web_Tabs_T_N_IBSh, Rich_Web_Tabs_T_N_OBSh, Rich_Web_Tabs_T_N_FS, Rich_Web_Tabs_T_N_FF, Rich_Web_Tabs_T_N_IS, Rich_Web_Tabs_T_S_BgC, Rich_Web_Tabs_T_S_C, Rich_Web_Tabs_T_S_HBgC, Rich_Web_Tabs_T_S_HC, Rich_Web_Tabs_T_S_CBgC, Rich_Web_Tabs_T_S_CC, Rich_Web_Tabs_T_C_BgT, Rich_Web_Tabs_T_C_BgC, Rich_Web_Tabs_T_C_BgC2, Rich_Web_Tabs_T_C_BW, Rich_Web_Tabs_T_C_BC, Rich_Web_Tabs_T_C_BR, Rich_Web_Tabs_T_C_IBSC, Rich_Web_Tabs_T_C_OBSC) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $Rich_Web_Tabs_ID[0]->id, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_T, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_Ty, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_W, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_Al, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_CA, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavAl, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBgC, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_IBSh, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_OBSh, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_FS, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_FF, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_IS, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgT, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BW, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BC, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BR, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_IBSC, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_OBSC));
		}
		else if($Rich_Web_Tabs_Themes[0]->Rich_Web_Tabs_T_Ty == 'Rich_Tabs_2')
		{
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name6 (id, Tabs_T_ID, Rich_Web_Tabs_T_T, Rich_Web_Tabs_T_Ty, Rich_Web_Tabs_T_W, Rich_Web_Tabs_T_Al, Rich_Web_Tabs_T_CA, Rich_Web_Tabs_T_NavM, Rich_Web_Tabs_T_NavAl, Rich_Web_Tabs_T_N_S, Rich_Web_Tabs_T_N_MBgC, Rich_Web_Tabs_T_N_MBC, Rich_Web_Tabs_T_N_PB, Rich_Web_Tabs_T_N_IBSh, Rich_Web_Tabs_T_N_OBSh, Rich_Web_Tabs_T_N_FS, Rich_Web_Tabs_T_N_FF, Rich_Web_Tabs_T_N_IS, Rich_Web_Tabs_T_S_BgC, Rich_Web_Tabs_T_S_C, Rich_Web_Tabs_T_S_HBgC, Rich_Web_Tabs_T_S_HC, Rich_Web_Tabs_T_S_CBgC, Rich_Web_Tabs_T_S_CC, Rich_Web_Tabs_T_C_BgT, Rich_Web_Tabs_T_C_BgC, Rich_Web_Tabs_T_C_BgC2, Rich_Web_Tabs_T_C_BW, Rich_Web_Tabs_T_C_BC, Rich_Web_Tabs_T_C_BR, Rich_Web_Tabs_T_C_IBSC, Rich_Web_Tabs_T_C_OBSC, Rich_Web_Tabs_T_01, Rich_Web_Tabs_T_02, Rich_Web_Tabs_T_03, Rich_Web_Tabs_T_04, Rich_Web_Tabs_T_05, Rich_Web_Tabs_T_06, Rich_Web_Tabs_T_07, Rich_Web_Tabs_T_08, Rich_Web_Tabs_T_09, Rich_Web_Tabs_T_10 ) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $Rich_Web_Tabs_ID[0]->id, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_T, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_Ty, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_W, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_Al, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_CA, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavAl, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBgC, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_IBSh, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_OBSh, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_FS, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_FF, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_IS, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgT, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BW, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BC, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BR, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_IBSC, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_OBSC, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_01, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_02, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_03, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_04, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_05, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_07, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_08, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_09, $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10));

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name7 (id, Tabs_T_ID, Rich_Web_Acd_border_col, Rich_Web_Acd_border_col_hover, Rich_Web_Acd_border_col_active, Rich_Web_Acd_border_width, Rich_Web_Acd_border_style, Rich_Web_Tabs_T_01, Rich_Web_Tabs_T_02, Rich_Web_Tabs_T_03, Rich_Web_Tabs_T_04, Rich_Web_Tabs_T_05, Rich_Web_Tabs_T_06, Rich_Web_Tabs_T_07, Rich_Web_Tabs_T_08, Rich_Web_Tabs_T_09, Rich_Web_Tabs_T_10, Rich_Web_Tabs_T_11, Rich_Web_Tabs_T_12, Rich_Web_Tabs_T_13, Rich_Web_Tabs_T_14, Rich_Web_Tabs_T_15, Rich_Web_Tabs_T_16, Rich_Web_Tabs_T_17, Rich_Web_Tabs_T_18, Rich_Web_Tabs_T_19, Rich_Web_Tabs_T_20, Rich_Web_Tabs_T_21, Rich_Web_Tabs_T_22, Rich_Web_Tabs_T_23, Rich_Web_Tabs_T_24, Rich_Web_Tabs_T_25, Rich_Web_Tabs_T_26, Rich_Web_Tabs_T_27, Rich_Web_Tabs_T_28, Rich_Web_Tabs_T_29, Rich_Web_Tabs_T_30, Rich_Web_Tabs_T_31, Rich_Web_Tabs_T_32, Rich_Web_Tabs_T_33, Rich_Web_Tabs_T_34, Rich_Web_Tabs_T_35) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $Rich_Web_Tabs_ID[0]->id, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Acd_border_col, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Acd_border_col_hover, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Acd_border_col_active, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Acd_border_width, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Acd_border_style, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_01, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_02, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_03, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_04, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_05, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_06, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_07, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_08, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_09, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_10, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_11, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_12, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_13, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_14, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_15, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_16, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_17, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_18, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_19, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_20, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_21, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_22, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_23, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_24, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_25, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_26, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_27, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_28, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_29, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_30, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_31, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_32, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_33, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_34, $Rich_Web_Tabs_Theme_ACD[0]->Rich_Web_Tabs_T_35));
		}
		die();
	}
?>