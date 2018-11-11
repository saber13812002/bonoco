<?php
	if(!defined('ABSPATH')) exit;
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
?>
<script type="text/javascript">
	function Rich_Web_Tabs_Added_Theme()
	{
		alert("This is free version. For more adventures click to buy Pro version.");
	}
	function Rich_Web_Tabs_Theme_Canceled()
	{
		location.reload();
	}
	function Rich_Web_Tabs_Edit_Theme(Theme_ID)
	{
		var ajaxurl = object.ajaxurl;
		var data = {
		action: 'Rich_Web_Tabs_Edit_Theme', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: Theme_ID, // translates into $_POST['foobar'] in PHP
		};
		jQuery.post(ajaxurl, data, function(response) {
			var arr=Array();

			var spl=response.split('=>');
			for(var i=3;i<spl.length;i++) { arr[arr.length]=spl[i].split('[')[0].trim(); }
			arr[arr.length-1]=arr[arr.length-1].split(')')[0].trim();
			jQuery('#Rich_Web_Tabs_Upd_ID_Theme').val(arr[0]);
			jQuery('#Rich_Web_Tabs_T_T').val(arr[1]);
			jQuery('#Rich_Web_Tabs_T_Ty').val(arr[2]);
			jQuery('#Rich_Web_Tabs_T_Ty').hide();

			jQuery('.Rich_Web_Tabs_Content_Table3_Theme').hide();
			if(arr[2]=='Rich_Tabs_1')
			{
				jQuery('.Rich_Web_Tabs_Content_Table3_Theme_1').show();

				jQuery('#Rich_Web_Tabs_T_W').val(arr[3]); jQuery('#Rich_Web_Tabs_T_Al').val(arr[4]); jQuery('#Rich_Web_Tabs_T_CA').val(arr[5]); jQuery('#Rich_Web_Tabs_T_NavM').val(arr[6]); jQuery('#Rich_Web_Tabs_T_NavAl').val(arr[7]); jQuery('#Rich_Web_Tabs_T_N_S').val(arr[8]); jQuery('#Rich_Web_Tabs_T_N_MBgC').val(arr[9]); jQuery('#Rich_Web_Tabs_T_N_MBC').val(arr[10]); jQuery('#Rich_Web_Tabs_T_N_PB').val(arr[11]); jQuery('#Rich_Web_Tabs_T_N_IBSh').val(arr[12]); jQuery('#Rich_Web_Tabs_T_N_OBSh').val(arr[13]); jQuery('#Rich_Web_Tabs_T_N_FS').val(arr[14]); jQuery('#Rich_Web_Tabs_T_N_FF').val(arr[15]); jQuery('#Rich_Web_Tabs_T_N_IS').val(arr[16]); jQuery('#Rich_Web_Tabs_T_S_BgC').val(arr[17]); jQuery('#Rich_Web_Tabs_T_S_C').val(arr[18]); jQuery('#Rich_Web_Tabs_T_S_HBgC').val(arr[19]); jQuery('#Rich_Web_Tabs_T_S_HC').val(arr[20]); jQuery('#Rich_Web_Tabs_T_S_CBgC').val(arr[21]); jQuery('#Rich_Web_Tabs_T_S_CC').val(arr[22]); jQuery('#Rich_Web_Tabs_T_C_BgT').val(arr[23]); jQuery('#Rich_Web_Tabs_T_C_BgC').val(arr[24]); jQuery('#Rich_Web_Tabs_T_C_BgC2').val(arr[25]); jQuery('#Rich_Web_Tabs_T_C_BW').val(arr[26]); jQuery('#Rich_Web_Tabs_T_C_BC').val(arr[27]); jQuery('#Rich_Web_Tabs_T_C_BR').val(arr[28]); jQuery('#Rich_Web_Tabs_T_C_IBSC').val(arr[29]); jQuery('#Rich_Web_Tabs_T_C_OBSC').val(arr[30]);
				if( arr[6] == 'horizontal' || arr[6] == 'accordion' )
				{
					jQuery('.Rich_Web_Tabs_T_NavM_H').show(); jQuery('.Rich_Web_Tabs_T_NavM_V').hide();
				}
				else if( arr[6] == 'vertical' )
				{
					jQuery('.Rich_Web_Tabs_T_NavM_V').show(); jQuery('.Rich_Web_Tabs_T_NavM_H').hide();
				}
				if(arr[8] == 'Rich_Web_Tabs_tabs_19' || arr[8] == 'Rich_Web_Tabs_tabs_24' || arr[8] == 'Rich_Web_Tabs_tabs_25'|| arr[8] == 'Rich_Web_Tabs_tabs_26' || arr[8] == 'Rich_Web_Tabs_tabs_29' || arr[8] == 'Rich_Web_Tabs_tabs_31')
				{
					jQuery(".Rich_Web_Tabs_T_N_S_Span").text('Style Color');
				}
				else { jQuery(".Rich_Web_Tabs_T_N_S_Span").text('Main Border Color'); }
				if(arr[8] == 'Rich_Web_Tabs_tabs_32')
				{
					jQuery(".Rich_Web_Tabs_T_N_S_Span").hide(); jQuery(".Rich_Web_Tabs_T_N_S_Div").hide();
				}
				if(arr[8] == 'Rich_Web_Tabs_tabs_29' || arr[8] == 'Rich_Web_Tabs_tabs_30') { jQuery(".Rich_Web_Tabs_T_N_S_PB_Span").hide(); }
				else { jQuery(".Rich_Web_Tabs_T_N_S_PB_Span").show(); }
				jQuery('input.Rich_Web_Tab_Col').alphaColorPicker();
				jQuery('.wp-color-result').attr('title','Select');
				jQuery('.wp-color-result').attr('data-current','Selected');
				Rich_Web_Tabs_RangeSlider();
			}
			else if(arr[2]=='Rich_Tabs_2')
			{
				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'Rich_Web_Tabs_Edit_Theme_ACD', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: Theme_ID, // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {
					var arr=Array();

					var spl=response.split('=>');
					for(var i=3;i<spl.length;i++) { arr[arr.length]=spl[i].split('[')[0].trim(); }
					arr[arr.length-1]=arr[arr.length-1].split(')')[0].trim();

					jQuery('#Rich_Web_Acd_border_col').val(arr[1]); jQuery('#Rich_Web_Acd_border_col_hover').val(arr[2]); jQuery('#Rich_Web_Acd_border_col_active').val(arr[3]); jQuery('#Rich_Web_Acd_border_style').val(arr[5]).prop('selected', true); jQuery('#Rich_Web_Acd_border_width').val(arr[4]); jQuery('#Rich_Web_Acd_border_width_Span').text(arr[4]); jQuery('#Rich_Web_Acd_border_radius').val(arr[6]); jQuery('#Rich_Web_Acd_border_radius_Span').text(arr[6]); jQuery('#Rich_Web_Acd_border_bsh_style').val(arr[7]).prop('selected', true); jQuery('#Rich_Web_Tabs_bsh_act_col_ACD').val(arr[8]);

					jQuery('input.Rich_Web_Tab_Col').alphaColorPicker();
					jQuery('.wp-color-result').attr('title','Select');
					jQuery('.wp-color-result').attr('data-current','Selected');
					Rich_Web_Tabs_RangeSlider();
				});
				jQuery('.Rich_Web_Tabs_Content_Table3_Theme_1').hide();
				jQuery('.Rich_Web_Tabs_Content_Table3_Theme_2').show();
				jQuery('#Rich_Web_Tabs_T_W_ACD').val(arr[3]); jQuery('#Rich_Web_Tabs_T_Al_ACD').val(arr[4]); jQuery('#Rich_Web_Tabs_T_CA_ACD').val(arr[5]); jQuery('#Rich_Web_Tabs_T_N_S_ACD').val(arr[8]).prop('selected', true);
				if(arr[8] == 'Rich_Web_Tabs_acd_none' || arr[8] == 'Rich_Web_Tabs_acd_9' || arr[8] == 'Rich_Web_Tabs_acd_10' || arr[8] == 'Rich_Web_Tabs_acd_11' || arr[8] == 'Rich_Web_Tabs_acd_12' || arr[8] == 'Rich_Web_Tabs_acd_16' || arr[8] == 'Rich_Web_Tabs_acd_31')
				{
					jQuery(".Rich_Web_Tabs_acd_sBg").hide(); jQuery(".Rich_Web_Tabs_T_Stle_Col_ACD_div").hide();
				}
				else
				{
					jQuery(".Rich_Web_Tabs_acd_sBg").show(); jQuery(".Rich_Web_Tabs_T_Stle_Col_ACD_div").show();
				}
				if(arr[8] == 'Rich_Web_Tabs_acd_16') { jQuery(".Rich_Web_Tabs_Cont_BR_ACD").hide(); }
				else if(arr[8] == 'Rich_Web_Tabs_acd_15' || arr[8] == 'Rich_Web_Tabs_acd_22' || arr[8] == 'Rich_Web_Tabs_acd_23' || arr[8] == 'Rich_Web_Tabs_acd_24' || arr[8] == 'Rich_Web_Tabs_acd_25' || arr[8] == 'Rich_Web_Tabs_acd_28' || arr[8] == 'Rich_Web_Tabs_acd_29' || arr[8] == 'Rich_Web_Tabs_acd_30')
				{
					jQuery(".Rich_Web_Tabs_Cont_BR_ACD").hide(); jQuery(".Rich_Web_Tabs_Cont_BR_Width_ACD").hide(); jQuery(".Rich_Web_Tabs_Cont_BR_color_ACD").hide();
				}
				else
				{
					jQuery(".Rich_Web_Tabs_Cont_BR_ACD").show(); jQuery(".Rich_Web_Tabs_Cont_BR_Width_ACD").show(); jQuery(".Rich_Web_Tabs_Cont_BR_color_ACD").show();
				}

				jQuery('#Rich_Web_Tabs_T_S_BgC_ACD').val(arr[17]); jQuery('#Rich_Web_Tabs_T_S_HBgC_ACD').val(arr[19]); jQuery('#Rich_Web_Tabs_T_N_MBgC_ACD').val(arr[9]); jQuery('#Rich_Web_Tabs_T_N_PB_ACD').val(arr[11]); jQuery('#Rich_Web_Tabs_T_N_PB_Span_ACD').val(arr[11]); jQuery('#Rich_Web_Tabs_T_S_C_ACD').val(arr[18]); jQuery('#Rich_Web_Tabs_T_S_HC_ACD').val(arr[20]); jQuery('#Rich_Web_Tabs_T_AlTit_ACD').val(arr[7]).prop('selected', true); jQuery('#Rich_Web_Tabs_T_S_CC_ACD').val(arr[22]); jQuery('#Rich_Web_Tabs_T_S_CBgC_ACD').val(arr[21]); jQuery('#Rich_Web_Tabs_T_N_IBSh_ACD').val(arr[12]); jQuery('#Rich_Web_Tabs_T_N_OBSh_ACD').val(arr[13]); jQuery('#Rich_Web_Tabs_T_C_BgT_ACD').val(arr[23]).prop('selected', true); jQuery('#Rich_Web_Tabs_T_C_BgC_ACD').val(arr[24]); jQuery('#Rich_Web_Tabs_T_C_BgC2_ACD').val(arr[25]); jQuery('#Rich_Web_Tabs_T_C_BW_ACD').val(arr[26]); jQuery('#Rich_Web_Tabs_T_C_BW_Span_ACD').val(arr[26]); jQuery('#Rich_Web_Tabs_T_C_BC_ACD').val(arr[27]); jQuery('#Rich_Web_Tabs_T_C_BR_ACD').val(arr[28]); jQuery('#Rich_Web_Tabs_T_C_BR_Span').val(arr[28]); jQuery('#Rich_Web_Tabs_T_C_IBSC_ACD').val(arr[29]); jQuery('#Rich_Web_Tabs_T_C_OBSC_ACD').val(arr[30]); jQuery('#Rich_Web_Tabs_T_N_PB_2_ACD').val(arr[31]); jQuery('#Rich_Web_Tabs_T_N_PB_2s_Span_ACD').val(arr[31]); jQuery('#Rich_Web_Tabs_T_N_SBG_ACD').val(arr[32]).prop('selected', true); jQuery('#Rich_Web_Tabs_T_S_AC_ACD').val(arr[33]); jQuery('#Rich_Web_Tabs_T_AlTit_style_ACD').val(arr[34]).prop('selected', true); jQuery('#Rich_Web_Tabs_T_N_IBSh_active_ACD').val(arr[35]); jQuery('#Rich_Web_Tabs_T_N_IS_ACD').val(arr[36]); jQuery('#Rich_Web_Tabs_T_N_IS_ACD_Span').val(arr[36]); jQuery('#Rich_Web_Tabs_T_S_CC_2_ACD').val(arr[37]); jQuery('#Rich_Web_Tabs_T_S_CBgC_2_ACD').val(arr[38]); jQuery('#Rich_Web_Tabs_T_N_IBSh_active_2_ACD').val(arr[39]); jQuery('#Rich_Web_Tabs_T_N_IS_2_ACD').val(arr[40]); jQuery('#Rich_Web_Tabs_T_N_IS_ACD_2_Span').val(arr[40]); jQuery('#Rich_Web_Tabs_T_N_Title_S_2_ACD').val(arr[6]); jQuery('#Rich_Web_Tabs_T_N_Title_S_2_ACD_Span').val(arr[6]); jQuery('#Rich_Web_Tabs_T_Stle_Col_ACD').val(arr[10]); jQuery('#Rich_Web_Tabs_T_Icon_style_ACD').val(arr[14]).prop('selected', true); jQuery('#Rich_Web_Tabs_T_N_FF_ACD').val(arr[15]).prop('selected', true);
			}
		})
		setTimeout(function(){
			jQuery('.Rich_Web_Tabs_Content_Data1_Theme').css('display','none');
			jQuery('.Rich_Web_Tabs_Add_Theme').addClass('Rich_Web_Tabs_AddAnim_Theme');
			jQuery('.Rich_Web_Tabs_Content_Data2_Theme').css('display','block');
			jQuery('.Rich_Web_Tabs_Update_Theme').addClass('Rich_Web_Tabs_SaveAnim_Theme');
			jQuery('.Rich_Web_Tabs_Cancel_Theme').addClass('Rich_Web_Tabs_CancelAnim_Theme');
		},500)
	}
	function Rich_Web_Tabs_Copy_Theme(Theme_ID)
	{
		var ajaxurl = object.ajaxurl;
		var data = {
		action: 'Rich_Web_Tabs_Clone_Theme', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: Theme_ID, // translates into $_POST['foobar'] in PHP
		};
		jQuery.post(ajaxurl, data, function(response) {
			location.reload();
		})
	}
	function Rich_Web_Tabs_RangeSlider()
	{
		var slider = jQuery('.Rich_Web_Tabs_Range'), range = jQuery('.Rich_Web_Tabs_Range__range'), value = jQuery('.Rich_Web_Tabs_Range__value');
		slider.each(function()
		{ 
			value.each(function()
			{ 
				var value = jQuery(this).prev().attr('value');
				jQuery(this).html(value);
			});
			range.on('input', function()
			{
				jQuery(this).next(value).html(this.value);
			});
		});
	}
	function Rich_Web_Tabs_T_NavM_Ch()
	{
		var Rich_Web_Tabs_T_NavM = jQuery('#Rich_Web_Tabs_T_NavM').val();

		if( Rich_Web_Tabs_T_NavM == 'horizontal' || Rich_Web_Tabs_T_NavM == 'accordion' )
		{
			jQuery('.Rich_Web_Tabs_T_NavM_H').show();
			jQuery('.Rich_Web_Tabs_T_NavM_V').hide();
			jQuery('#Rich_Web_Tabs_T_NavAl').val('left');
		}
		else if( Rich_Web_Tabs_T_NavM == 'vertical' )
		{
			jQuery('.Rich_Web_Tabs_T_NavM_V').show();
			jQuery('.Rich_Web_Tabs_T_NavM_H').hide();
			jQuery('#Rich_Web_Tabs_T_NavAl').val('top');
		}
	}
	function Rich_Web_Tabs_T_Ty_Changed()
	{
		var Rich_Web_Tabs_T_Ty=jQuery('#Rich_Web_Tabs_T_Ty').val();
		jQuery('.Rich_Web_Tabs_Content_Table3_Theme').hide();
		if(Rich_Web_Tabs_T_Ty=='Rich_Tabs_1')
		{
			jQuery('.Rich_Web_Tabs_Content_Table3_Theme_1').show();
		}
		else if(Rich_Web_Tabs_T_Ty=='Rich_Tabs_2')
		{
			jQuery('.Rich_Web_Tabs_Content_Table3_Theme_2').show();
		}
	}
	jQuery("#Rich_Web_Tabs_T_N_S").change(function() {
		var value = jQuery( this ).val();
		if(value == 'Rich_Web_Tabs_tabs_19' || value == 'Rich_Web_Tabs_tabs_24' || value == 'Rich_Web_Tabs_tabs_25'|| value == 'Rich_Web_Tabs_tabs_26' || value == 'Rich_Web_Tabs_tabs_29' || value == 'Rich_Web_Tabs_tabs_31')
		{
			jQuery(".Rich_Web_Tabs_T_N_S_Span").text('Style Color');
		}
		else { jQuery(".Rich_Web_Tabs_T_N_S_Span").text('Main Border Color'); }
		if(value == 'Rich_Web_Tabs_tabs_32') { jQuery(".Rich_Web_Tabs_T_N_S_Span").hide(); jQuery(".Rich_Web_Tabs_T_N_S_Div").hide(); }
		if(value == 'Rich_Web_Tabs_tabs_29' || value == 'Rich_Web_Tabs_tabs_30') { jQuery(".Rich_Web_Tabs_T_N_S_PB_Span").hide(); }
		else { jQuery(".Rich_Web_Tabs_T_N_S_PB_Span").show(); }
	});
	jQuery("#Rich_Web_Tabs_T_N_S_ACD").change(function() {
		var value = jQuery( this ).val();
		if(value == 'Rich_Web_Tabs_acd_none' || value == 'Rich_Web_Tabs_acd_9' || value == 'Rich_Web_Tabs_acd_10'|| value == 'Rich_Web_Tabs_acd_11' || value == 'Rich_Web_Tabs_acd_12' || value == 'Rich_Web_Tabs_acd_16' || value == 'Rich_Web_Tabs_acd_31')
		{
			jQuery(".Rich_Web_Tabs_acd_sBg").hide(); jQuery(".Rich_Web_Tabs_T_Stle_Col_ACD_div").hide();
		}
		else { jQuery(".Rich_Web_Tabs_acd_sBg").show(); jQuery(".Rich_Web_Tabs_T_Stle_Col_ACD_div").show(); }
		if(value == 'Rich_Web_Tabs_acd_16') { jQuery(".Rich_Web_Tabs_Cont_BR_ACD").hide(); }
		else if(value == 'Rich_Web_Tabs_acd_15' || value == 'Rich_Web_Tabs_acd_22' || value == 'Rich_Web_Tabs_acd_23' || value == 'Rich_Web_Tabs_acd_24' || value == 'Rich_Web_Tabs_acd_25' || value == 'Rich_Web_Tabs_acd_28' || value == 'Rich_Web_Tabs_acd_29' || value == 'Rich_Web_Tabs_acd_30')
		{
			jQuery(".Rich_Web_Tabs_Cont_BR_ACD").hide(); jQuery(".Rich_Web_Tabs_Cont_BR_Width_ACD").hide(); jQuery(".Rich_Web_Tabs_Cont_BR_color_ACD").hide();
		}
		else { jQuery(".Rich_Web_Tabs_Cont_BR_ACD").show(); jQuery(".Rich_Web_Tabs_Cont_BR_Width_ACD").show(); jQuery(".Rich_Web_Tabs_Cont_BR_color_ACD").show(); }
	});
</script>