<?php
	if(!defined('ABSPATH')) exit;
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}

	global $wpdb;
	$table_name  = $wpdb->prefix . "rich_web_font_family";
	$table_name5 = $wpdb->prefix . "rich_web_tabs_effects_data";
	$table_name6 = $wpdb->prefix . "rich_web_tabs_effect_1";
	$table_name7 = $wpdb->prefix . "rich_web_tabs_effect_2";

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if (check_admin_referer( 'edit-menu_', 'Rich_Web_Tabs_Nonce' ))
		{
			$Rich_Web_Tabs_T_T = sanitize_text_field($_POST['Rich_Web_Tabs_T_T']); $Rich_Web_Tabs_T_Ty = sanitize_text_field($_POST['Rich_Web_Tabs_T_Ty']);

			$Rich_Web_Tabs_T_W = sanitize_text_field($_POST['Rich_Web_Tabs_T_W']); $Rich_Web_Tabs_T_Al = sanitize_text_field($_POST['Rich_Web_Tabs_T_Al']); $Rich_Web_Tabs_T_N_FS = sanitize_text_field($_POST['Rich_Web_Tabs_T_N_FS']); $Rich_Web_Tabs_T_N_IS = sanitize_text_field($_POST['Rich_Web_Tabs_T_N_IS']); $Rich_Web_Tabs_T_C_BR = sanitize_text_field($_POST['Rich_Web_Tabs_T_C_BR']); $Rich_Web_Tabs_T_NavAl = sanitize_text_field($_POST['Rich_Web_Tabs_T_NavAl']); $Rich_Web_Tabs_T_C_BW = sanitize_text_field($_POST['Rich_Web_Tabs_T_C_BW']);

			$Rich_Web_Tabs_T_W_ACD = sanitize_text_field($_POST['Rich_Web_Tabs_T_W_ACD']); $Rich_Web_Tabs_T_Al_ACD = sanitize_text_field($_POST['Rich_Web_Tabs_T_Al_ACD']); $Rich_Web_Tabs_T_N_PB_2_ACD = sanitize_text_field($_POST['Rich_Web_Tabs_T_N_PB_2_ACD']); $Rich_Web_Acd_border_radius = sanitize_text_field($_POST['Rich_Web_Acd_border_radius']); $Rich_Web_Tabs_T_N_Title_S_2_ACD = sanitize_text_field($_POST['Rich_Web_Tabs_T_N_Title_S_2_ACD']); $Rich_Web_Tabs_T_N_IS_ACD = sanitize_text_field($_POST['Rich_Web_Tabs_T_N_IS_ACD']); $Rich_Web_Tabs_T_N_IS_2_ACD = sanitize_text_field($_POST['Rich_Web_Tabs_T_N_IS_2_ACD']); $Rich_Web_Tabs_T_C_BR_ACD = sanitize_text_field($_POST['Rich_Web_Tabs_T_C_BR_ACD']);

			if(isset($_POST['Rich_Web_Tabs_Update_Theme']))
			{
				$Rich_Web_Tabs_Upd_ID_Theme=sanitize_text_field($_POST['Rich_Web_Tabs_Upd_ID_Theme']);
				$wpdb->query($wpdb->prepare("UPDATE $table_name5 set Rich_Web_Tabs_T_T = %s, Rich_Web_Tabs_T_Ty = %s WHERE id = %d", $Rich_Web_Tabs_T_T, $Rich_Web_Tabs_T_Ty, $Rich_Web_Tabs_Upd_ID_Theme));

				if($Rich_Web_Tabs_T_Ty == 'Rich_Tabs_1')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name6 set Rich_Web_Tabs_T_T = %s, Rich_Web_Tabs_T_Ty = %s, Rich_Web_Tabs_T_W = %s, Rich_Web_Tabs_T_Al = %s, Rich_Web_Tabs_T_N_FS = %s, Rich_Web_Tabs_T_N_IS = %s, Rich_Web_Tabs_T_C_BR = %s, Rich_Web_Tabs_T_NavAl = %s, Rich_Web_Tabs_T_C_BW = %s WHERE Tabs_T_ID = %d", $Rich_Web_Tabs_T_T, $Rich_Web_Tabs_T_Ty, $Rich_Web_Tabs_T_W, $Rich_Web_Tabs_T_Al, $Rich_Web_Tabs_T_N_FS, $Rich_Web_Tabs_T_N_IS, $Rich_Web_Tabs_T_C_BR, $Rich_Web_Tabs_T_NavAl, $Rich_Web_Tabs_T_C_BW, $Rich_Web_Tabs_Upd_ID_Theme));
				}
				else if ($Rich_Web_Tabs_T_Ty == 'Rich_Tabs_2') 
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name6 set Rich_Web_Tabs_T_T = %s, Rich_Web_Tabs_T_Ty = %s  WHERE Tabs_T_ID = %d", $Rich_Web_Tabs_T_T, $Rich_Web_Tabs_T_Ty, $Rich_Web_Tabs_Upd_ID_Theme));

					$wpdb->query($wpdb->prepare("UPDATE $table_name6 set Rich_Web_Tabs_T_T = %s, Rich_Web_Tabs_T_Ty = %s, Rich_Web_Tabs_T_W = %s, Rich_Web_Tabs_T_Al = %s, Rich_Web_Tabs_T_01 = %s, Rich_Web_Tabs_T_N_IS = %s, Rich_Web_Tabs_T_C_BR = %s, Rich_Web_Tabs_T_NavM = %s, Rich_Web_Tabs_T_06 = %s, Rich_Web_Tabs_T_C_BR = %s, Rich_Web_Tabs_T_10 = %s WHERE Tabs_T_ID = %d", $Rich_Web_Tabs_T_T, $Rich_Web_Tabs_T_Ty, $Rich_Web_Tabs_T_W_ACD, $Rich_Web_Tabs_T_Al_ACD, $Rich_Web_Tabs_T_N_PB_2_ACD, $Rich_Web_Tabs_T_N_IS, $Rich_Web_Tabs_T_C_BR, $Rich_Web_Tabs_T_N_Title_S_2_ACD, $Rich_Web_Tabs_T_N_IS_ACD, $Rich_Web_Tabs_T_C_BR_ACD, $Rich_Web_Tabs_T_N_IS_2_ACD, $Rich_Web_Tabs_Upd_ID_Theme));

					$wpdb->query($wpdb->prepare("UPDATE $table_name7 set Rich_Web_Tabs_T_01 = %s WHERE Tabs_T_ID = %s", $Rich_Web_Acd_border_radius, $Rich_Web_Tabs_Upd_ID_Theme));
				}
			}
		}
		else
		{
			wp_die('Security check fail'); 
		}
	}
	$Rich_WebFontCount = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id>%d",0));
	$Rich_Web_Tabs_Dat = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE id>%d",0));
	$Rich_Web_Tabs_T1  = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE id>%d",0));
	$Rich_Web_Tabs_T2  = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name7 WHERE id>%d",0));

	$Rich_Web_Tabs_T1_ACD = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE Rich_Web_Tabs_T_Ty=%s",'Rich_Tabs_2'));
	$Rich_Web_Tabs_T2_ACD = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name7 WHERE Tabs_T_ID=%s",$Rich_Web_Tabs_T1_ACD[0]->id));
?>
<form method="POST" enctype="multipart/form-data">
	<?php wp_nonce_field( 'edit-menu_', 'Rich_Web_Tabs_Nonce' );?>
	<?php require_once( 'Tabs-Rich-Web-Header.php' ); ?>
	<?php require_once( 'Tabs-Rich-Web-Install.php' ); ?>
	<div style="position: relative; width: 99%; height: 50px;">
		<input type='button' class='Rich_Web_Tabs_Add_Theme'    value='New Theme (Pro)'    onclick='Rich_Web_Tabs_Added_Theme()'/>
		<input type='submit' class='Rich_Web_Tabs_Update_Theme' value='Update Theme' name='Rich_Web_Tabs_Update_Theme'/>
		<input type='button' class='Rich_Web_Tabs_Cancel_Theme' value='Cancel'       onclick='Rich_Web_Tabs_Theme_Canceled()'/>
		<input type='text' style='display:none' id="Rich_Web_Tabs_Upd_ID_Theme" name='Rich_Web_Tabs_Upd_ID_Theme' value="">
	</div>
	<div class="Rich_Web_Tabs_Fixed_Div"></div>
	<div class="Rich_Web_Tabs_Absolute_Div">
		<div class="Rich_Web_Tabs_Relative_Div">
			<p> Are you sure you want to remove ? </p>
			<span class="Rich_Web_Tabs_Relative_No">No</span>
			<span class="Rich_Web_Tabs_Relative_Yes">Yes</span>
		</div>
	</div>
	<div class='Rich_Web_Tabs_Content_Theme'>
		<div class='Rich_Web_Tabs_Content_Data1_Theme'>
			<table class='Rich_Web_Tabs_Content_Table_Theme'>
				<tr class='Rich_Web_Tabs_Content_Table_Tr_Theme'>
					<td>No</td>
					<td>Theme Name</td>
					<td>Copy</td>
					<td>Edit</td>
					<td>Delete</td>
				</tr>
			</table>
			<table class='Rich_Web_Tabs_Content_Table2_Theme'>
			<?php for($i=0;$i<count($Rich_Web_Tabs_Dat);$i++){?> 
				<tr class='Rich_Web_Tabs_Content_Table_Tr2_Theme'>
					<td><?php echo $i+1; ?></td>
					<td><?php echo $Rich_Web_Tabs_Dat[$i]->Rich_Web_Tabs_T_T; ?></td>
					<td onclick="Rich_Web_Tabs_Copy_Theme(<?php echo $Rich_Web_Tabs_Dat[$i]->id;?>)"><i class='Rich_Web_Tabs_Copy rich_web rich_web-files-o'></i></td>
					<td onclick="Rich_Web_Tabs_Edit_Theme(<?php echo $Rich_Web_Tabs_Dat[$i]->id;?>)"><i class='Rich_Web_Tabs_Edit rich_web rich_web-pencil'></i></td>
					<td onclick="Rich_Web_Tabs_Added_Theme()"><i class='Rich_Web_Tabs_Del rich_web rich_web-trash'></i></td>
				</tr>
			<?php } ?>
			</table>
		</div>
		<div class='Rich_Web_Tabs_Content_Data2_Theme'>
			<table class="Rich_Web_Tabs_Content_Table3_Theme1">
				<tr>
					<td>Theme Name</td>
					<td>Theme Type <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
				</tr>
				<tr>
					<td>
						<input type="text" name="Rich_Web_Tabs_T_T" id="Rich_Web_Tabs_T_T" placeholder="Theme Title. . ."  required>
					</td>
					<td>
						<select name="Rich_Web_Tabs_T_Ty" id="Rich_Web_Tabs_T_Ty">
							<option value="Rich_Tabs_1"> Tabs      </option>
							<option value="Rich_Tabs_2"> Accordion </option>
						</select>
					</td>
				</tr>
			</table>
			<table class="Rich_Web_Tabs_Content_Table3_Theme Rich_Web_Tabs_Content_Table3_Theme_1">
				<tr>
					<td colspan="4">General Options</td>
				</tr>
				<tr>
					<td>Width (%)</td>
					<td>Align</td>
					<td>Content Animation <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Navigation Mode <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
				</tr>
				<tr>
					<td>
						<div class="Rich_Web_Tabs_Range">  
							<input class="Rich_Web_Tabs_Range__range" type="range" id="Rich_Web_Tabs_T_W" name="Rich_Web_Tabs_T_W" value="" min="0" max="100">
							<span class="Rich_Web_Tabs_Range__value" id="Rich_Web_Tabs_T_W_Span">0</span>
						</div>
					</td>
					<td>
						<select name="Rich_Web_Tabs_T_Al" id="Rich_Web_Tabs_T_Al">
							<option value="left">   Left   </option>
							<option value="right">  Right  </option>
							<option value="center"> Center </option>
						</select>
					</td>
					<td>
						<select name="" id="Rich_Web_Tabs_T_CA">
							<option value="Random">          Random            </option>
							<option value="Scale">           Scale             </option>
							<option value="FadeUp">          Fade Up           </option>
							<option value="FadeDown">        Fade Down         </option>
							<option value="FadeLeft">        Fade Left         </option>
							<option value="FadeRight">       Fade Right        </option>
							<option value="SlideUp">         Slide Up          </option>
							<option value="SlideDown">       Slide Down        </option>
							<option value="SlideLeft">       Slide Left        </option>
							<option value="SlideRight">      Slide Right       </option>
							<option value="ScrollDown">      Scroll Down       </option>
							<option value="ScrollUp">        Scroll Up         </option>
							<option value="ScrollRight">     Scroll Right      </option>
							<option value="ScrollLeft">      Scroll Left       </option>
							<option value="Bounce">          Bounce            </option>
							<option value="BounceLeft">      Bounce Left       </option>
							<option value="BounceRight">     Bounce Right      </option>
							<option value="BounceDown">      Bounce Down       </option>
							<option value="BounceUp">        Bounce Up         </option>
							<option value="HorizontalFlip">  Horizontal Flip   </option>
							<option value="VerticalFlip">    Vertical Flip     </option>
							<option value="RotateDownLeft">  Rotate Down Left  </option>
							<option value="RotateDownRight"> Rotate Down Right </option>
							<option value="RotateUpLeft">    Rotate Up Left    </option>
							<option value="RotateUpRight">   Rotate Up Right   </option>
							<option value="TopZoom">         Top Zoom          </option>
							<option value="BottomZoom">      Bottom Zoom       </option>
							<option value="LeftZoom">        Left Zoom         </option>
							<option value="RightZoom">       Right Zoom        </option>
						</select>
					</td>
					<td>
						<select name="" id="Rich_Web_Tabs_T_NavM" onchange="Rich_Web_Tabs_T_NavM_Ch()">
							<option value="horizontal"> Horizontal </option>
							<option value="vertical">   Vertical   </option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Navigation Align</td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td>
						<select name="Rich_Web_Tabs_T_NavAl" id="Rich_Web_Tabs_T_NavAl">
							<option class="Rich_Web_Tabs_T_NavM_H" value="left">   Left   </option>
							<option class="Rich_Web_Tabs_T_NavM_H" value="right">  Right  </option>
							<option class="Rich_Web_Tabs_T_NavM_H" value="center"> Center </option>
							<option class="Rich_Web_Tabs_T_NavM_V" value="top">    Top    </option>
							<option class="Rich_Web_Tabs_T_NavM_V" value="bottom"> Bottom </option>
						</select>
					</td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan="4">Navigation Options</td>
				</tr>
				<tr>
					<td>Style <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Main Background Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td><span class="Rich_Web_Tabs_T_N_S_Span">Main Border Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></span></td>
					<td><span class="Rich_Web_Tabs_T_N_S_PB_Span">Place Between (px) <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></span></td>
				</tr>
				<tr>
					<td>
						<select name="" id="Rich_Web_Tabs_T_N_S">
							<option value="Rich_Web_Tabs_tabs_1">  Bar               </option>
							<option value="Rich_Web_Tabs_tabs_2">  Icon box          </option>
							<option value="Rich_Web_Tabs_tabs_3">  Underline         </option>
							<option value="Rich_Web_Tabs_tabs_4">  Triangle and line </option>
							<option value="Rich_Web_Tabs_tabs_5">  Top Line          </option>
							<option value="Rich_Web_Tabs_tabs_6">  Falling Icon      </option>
							<option value="Rich_Web_Tabs_tabs_7">  Moving Line       </option>
							<option value="Rich_Web_Tabs_tabs_8">  Line              </option>
							<option value="Rich_Web_Tabs_tabs_9">  Circle            </option>
							<option value="Rich_Web_Tabs_tabs_11"> Line Box          </option>
							<option value="Rich_Web_Tabs_tabs_12"> Flip              </option>
							<option value="Rich_Web_Tabs_tabs_13"> Circle fill       </option>
							<option value="Rich_Web_Tabs_tabs_14"> Fill up           </option>
							<option value="Rich_Web_Tabs_tabs_15"> Trapezoid         </option>
							<option value="Rich_Web_Tabs_tabs_16"> New Style 1       </option>
							<option value="Rich_Web_Tabs_tabs_17"> New Style 2       </option>
							<option value="Rich_Web_Tabs_tabs_18"> New Style 3       </option>
							<option value="Rich_Web_Tabs_tabs_19"> New Style 4       </option>
							<option value="Rich_Web_Tabs_tabs_20"> New Style 5       </option>
							<option value="Rich_Web_Tabs_tabs_21"> New Style 6       </option>
							<option value="Rich_Web_Tabs_tabs_22"> New Style 7       </option>
							<option value="Rich_Web_Tabs_tabs_23"> New Style 8       </option>
							<option value="Rich_Web_Tabs_tabs_24"> New Style 9       </option>
							<option value="Rich_Web_Tabs_tabs_25"> New Style 10      </option>
							<option value="Rich_Web_Tabs_tabs_26"> New Style 11      </option>
							<option value="Rich_Web_Tabs_tabs_27"> New Style 12      </option>
							<option value="Rich_Web_Tabs_tabs_28"> New Style 13      </option>
							<option value="Rich_Web_Tabs_tabs_29"> New Style 14      </option>
							<option value="Rich_Web_Tabs_tabs_30"> New Style 15      </option>
							<option value="Rich_Web_Tabs_tabs_31"> New Style 16      </option>
							<option value="Rich_Web_Tabs_tabs_32"> New Style 17      </option>
						</select>
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_N_MBgC" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td class="Rich_Web_Tabs_T_N_S_Div">
						<input type="text" name="" id="Rich_Web_Tabs_T_N_MBC" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<div class="Rich_Web_Tabs_Range Rich_Web_Tabs_T_N_S_PB_Span">  
							<input class="Rich_Web_Tabs_Range__range" type="range" id="Rich_Web_Tabs_T_N_PB" name="" value="" min="0" max="15">
							<span class="Rich_Web_Tabs_Range__value" id="Rich_Web_Tabs_T_N_PB_Span">0</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Inset Box Shadow Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Outset Box Shadow Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Font Size (px)</td>
					<td>Font Family <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
				</tr>
				<tr>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_N_IBSh" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_N_OBSh" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<div class="Rich_Web_Tabs_Range">  
							<input class="Rich_Web_Tabs_Range__range" type="range" id="Rich_Web_Tabs_T_N_FS" name="Rich_Web_Tabs_T_N_FS" value="" min="8" max="48">
							<span class="Rich_Web_Tabs_Range__value" id="Rich_Web_Tabs_T_N_FS_Span">0</span>
						</div>
					</td>
					<td>
						<select id="Rich_Web_Tabs_T_N_FF" name="">
							<?php for($i=0;$i<count($Rich_WebFontCount);$i++){ ?> 
								<option value="<?php echo $Rich_WebFontCount[$i]->Font_family;?>"><?php echo $Rich_WebFontCount[$i]->Font_family;?></option>
							<?php }?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Icon Size (px)</td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td>
						<div class="Rich_Web_Tabs_Range">  
							<input class="Rich_Web_Tabs_Range__range" type="range" id="Rich_Web_Tabs_T_N_IS" name="Rich_Web_Tabs_T_N_IS" value="" min="8" max="72">
							<span class="Rich_Web_Tabs_Range__value" id="Rich_Web_Tabs_T_N_IS_Span">0</span>
						</div>
					</td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan="4">SubTitle Options</td>
				</tr>
				<tr>
					<td>Background Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Hover Background Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Hover Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
				</tr>
				<tr>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_S_BgC" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_S_C" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_S_HBgC" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_S_HC" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
				</tr>
				<tr>
					<td>Current Background Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Current Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_S_CBgC" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_S_CC" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td colspan="4">Content Options</td>
				</tr>
				<tr>
					<td>Background Type <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Background Color 1 <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Background Color 2 <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Border Width (px)</td>
				</tr>
				<tr>
					<td>
						<select name="" id="Rich_Web_Tabs_T_C_BgT">
							<option value="color">       Color       </option>
							<option value="transparent"> Transparent </option>
							<option value="gradient">    Gradient    </option>
						</select>
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_C_BgC" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_C_BgC2" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<div class="Rich_Web_Tabs_Range">  
							<input class="Rich_Web_Tabs_Range__range" type="range" id="Rich_Web_Tabs_T_C_BW" name="Rich_Web_Tabs_T_C_BW" value="" min="0" max="10">
							<span class="Rich_Web_Tabs_Range__value" id="Rich_Web_Tabs_T_C_BW_Span">0</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Border Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Border Radius (px)</td>
					<td>Inset Box Shadow Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Outset Box Shadow Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
				</tr>
				<tr>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_C_BC" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<div class="Rich_Web_Tabs_Range">  
							<input class="Rich_Web_Tabs_Range__range" type="range" id="Rich_Web_Tabs_T_C_BR" name="Rich_Web_Tabs_T_C_BR" value="" min="0" max="20">
							<span class="Rich_Web_Tabs_Range__value" id="Rich_Web_Tabs_T_C_BW_Span">0</span>
						</div>
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_C_IBSC" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_C_OBSC" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
				</tr>
			</table>
			<!-- Accordion Content -->
			<table class="Rich_Web_Tabs_Content_Table3_Theme Rich_Web_Tabs_Content_Table3_Theme_2">
				<tr>
					<td colspan="4">General Options</td>
				</tr>
				<tr>
					<td>Width (%)</td>
					<td>Align</td>
					<td>Content Animation <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td></td>
				</tr>
				<tr>
					<td>
						<div class="Rich_Web_Tabs_Range">  
							<input class="Rich_Web_Tabs_Range__range" type="range" id="Rich_Web_Tabs_T_W_ACD" name="Rich_Web_Tabs_T_W_ACD" value="" min="0" max="100">
							<span class="Rich_Web_Tabs_Range__value" id="Rich_Web_Tabs_T_W_Span_ACD">0</span>
						</div>
					</td>
					<td>
						<select name="Rich_Web_Tabs_T_Al_ACD" id="Rich_Web_Tabs_T_Al_ACD">
							<option value="left">   Left   </option>
							<option value="right">  Right  </option>
							<option value="center"> Center </option>
						</select>
					</td>
					<td>
						<select name="" id="Rich_Web_Tabs_T_CA_ACD">
							<option value="none">      None      </option>
							<option value="bounce">    Bounce    </option>
							<option value="clip">      Clip      </option>
							<option value="drop">      Drop      </option>
							<option value="fade">      Fade      </option>
							<option value="highlight"> Highlight </option>
							<option value="pulsate">   Pulsate   </option>
							<option value="shake">     Shake     </option>
							<option value="size">      Size      </option>
							<option value="slide">     Slide     </option>
						</select>
					</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="4">Navigation Options</td>
				</tr>
				<tr>
					<td>Style <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Place Between Navigation (px) <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Place Between Navigation And Content (px)</td>
					<td><div class="Rich_Web_Tabs_acd_sBg" style="display: none;">Style Background <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></div></td>
				</tr>
				<tr>
					<td>
						<select name="" id="Rich_Web_Tabs_T_N_S_ACD">
							<option value="Rich_Web_Tabs_acd_none"> None     </option>
							<option value="Rich_Web_Tabs_acd_1">    Style 1  </option>
							<option value="Rich_Web_Tabs_acd_2">    Style 2  </option>
							<option value="Rich_Web_Tabs_acd_3">    Style 3  </option>
							<option value="Rich_Web_Tabs_acd_4">    Style 4  </option>
							<option value="Rich_Web_Tabs_acd_5">    Style 5  </option>
							<option value="Rich_Web_Tabs_acd_6">    Style 6  </option>
							<option value="Rich_Web_Tabs_acd_7">    Style 7  </option>
							<option value="Rich_Web_Tabs_acd_8">    Style 8  </option>
							<option value="Rich_Web_Tabs_acd_9">    Style 9  </option>
							<option value="Rich_Web_Tabs_acd_10">   Style 10 </option>
							<option value="Rich_Web_Tabs_acd_11">   Style 11 </option>
							<option value="Rich_Web_Tabs_acd_12">   Style 12 </option>
							<option value="Rich_Web_Tabs_acd_13">   Style 13 </option>
							<option value="Rich_Web_Tabs_acd_14">   Style 14 </option>
							<option value="Rich_Web_Tabs_acd_15">   Style 15 </option>
							<option value="Rich_Web_Tabs_acd_16">   Style 16 </option>
							<option value="Rich_Web_Tabs_acd_17">   Style 17 </option>
							<option value="Rich_Web_Tabs_acd_18">   Style 18 </option>
							<option value="Rich_Web_Tabs_acd_19">   Style 19 </option>
							<option value="Rich_Web_Tabs_acd_20">   Style 20 </option>
							<option value="Rich_Web_Tabs_acd_21">   Style 21 </option>
							<option value="Rich_Web_Tabs_acd_22">   Style 22 </option>
							<option value="Rich_Web_Tabs_acd_23">   Style 23 </option>
							<option value="Rich_Web_Tabs_acd_24">   Style 24 </option>
							<option value="Rich_Web_Tabs_acd_25">   Style 25 </option>
							<option value="Rich_Web_Tabs_acd_26">   Style 26 </option>
							<option value="Rich_Web_Tabs_acd_27">   Style 27 </option>
							<option value="Rich_Web_Tabs_acd_28">   Style 28 </option>
							<option value="Rich_Web_Tabs_acd_29">   Style 29 </option>
							<option value="Rich_Web_Tabs_acd_30">   Style 30 </option>
							<option value="Rich_Web_Tabs_acd_31">   Style 31 </option>
						</select>
					</td>
					<td>
						<div class="Rich_Web_Tabs_Range">  
							<input class="Rich_Web_Tabs_Range__range" type="range" id="Rich_Web_Tabs_T_N_PB_ACD" name="" value="" min="0" max="35">
							<span class="Rich_Web_Tabs_Range__value" id="Rich_Web_Tabs_T_N_PB_Span_ACD">0</span>
						</div>
					</td>
					<td>
						<div class="Rich_Web_Tabs_Range">  
							<input class="Rich_Web_Tabs_Range__range" type="range" id="Rich_Web_Tabs_T_N_PB_2_ACD" name="Rich_Web_Tabs_T_N_PB_2_ACD" value="" min="0" max="35">
							<span class="Rich_Web_Tabs_Range__value" id="Rich_Web_Tabs_T_N_PB_2s_Span_ACD">0</span>
						</div>
					</td>
					<td>
						<div class="Rich_Web_Tabs_T_Stle_Col_ACD_div Rich_Web_Tabs_acd_sBg" style="display: none;">
							<input type="text" name="" id="Rich_Web_Tabs_T_Stle_Col_ACD" class="Rich_Web_Tab_Col alpha-color-picker" value="">
						</div>
					</td>
				</tr>
				<tr>
					<td>Background Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Hover Background Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Current Background Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Background Style <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
				</tr>
				<tr>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_S_BgC_ACD" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_S_HBgC_ACD" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_N_MBgC_ACD" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<select name="" id="Rich_Web_Tabs_T_N_SBG_ACD">
							<option value="style_bg_none"> None    </option>
							<option value="style_bg_1">    Style 1 </option>
							<option value="style_bg_2">    Style 2 </option>
							<option value="style_bg_3">    Style 3 </option>
							<option value="style_bg_4">    Style 4 </option>
							<option value="style_bg_5">    Style 5 </option>
							<option value="style_bg_6">    Style 6 </option>
							<option value="style_bg_7">    Style 7 </option>
							<option value="style_bg_8">    Style 8 </option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="4">Border Options</td>
				</tr>
				<tr>
					<td>Border Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Hover Border Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Current Border Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Border Style <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
				</tr>
				<tr>
					<td>
						<input type="text" name="" id="Rich_Web_Acd_border_col" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_Acd_border_col_hover" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_Acd_border_col_active" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<select name="" id="Rich_Web_Acd_border_style">
							<option value="none">   None   </option>
							<option value="solid">  Solid  </option>
							<option value="dotted"> Dotted </option>
							<option value="dashed"> Dashed </option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Border Width (px) <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Box Shadow Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Box Shadow Hover Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Box Shadow Current Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
				</tr>
				<tr>
					<td>
						<div class="Rich_Web_Tabs_Range">  
							<input class="Rich_Web_Tabs_Range__range" type="range" id="Rich_Web_Acd_border_width" name="" value="" min="0" max="10">
							<span class="Rich_Web_Tabs_Range__value" id="Rich_Web_Acd_border_width_Span"></span>
						</div>
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_N_IBSh_ACD" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_N_OBSh_ACD" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_bsh_act_col_ACD" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
				</tr>
				<tr>
					<td>Box Shadow Style <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td><span class="Rich_Web_Acd_border_radius">Border Radius</span></td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td>
						<select name="" id="Rich_Web_Acd_border_bsh_style">
							<option value="none">         None     </option>
							<option value="style_bsh_1">  Style 1  </option>
							<option value="style_bsh_2">  Style 2  </option>
							<option value="style_bsh_3">  Style 3  </option>
							<option value="style_bsh_4">  Style 4  </option>
							<option value="style_bsh_5">  Style 5  </option>
							<option value="style_bsh_6">  Style 6  </option>
							<option value="style_bsh_7">  Style 7  </option>
							<option value="style_bsh_8">  Style 8  </option>
							<option value="style_bsh_9">  Style 9  </option>
							<option value="style_bsh_10"> Style 10 </option>
							<option value="style_bsh_11"> Style 11 </option>
							<option value="style_bsh_12"> Style 12 </option>
							<option value="style_bsh_13"> Style 13 </option>
							<option value="style_bsh_14"> Style 14 </option>
						</select>
					</td>
					<td>
						<div class="Rich_Web_Tabs_Range Rich_Web_Acd_border_radius">  
							<input class="Rich_Web_Tabs_Range__range" type="range" id="Rich_Web_Acd_border_radius" name="Rich_Web_Acd_border_radius" value="" min="0" max="30">
							<span class="Rich_Web_Tabs_Range__value" id="Rich_Web_Acd_border_radius_Span"></span>
						</div>
					</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td colspan="4">Title Options</td>
				</tr>
				<tr>
					<td>Title Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Hover Title Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Current Title Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Title Style <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
				</tr>
				<tr>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_S_C_ACD" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_S_HC_ACD" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_S_AC_ACD" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<select name="" id="Rich_Web_Tabs_T_AlTit_style_ACD">
							<option value="style_ti_none"> None    </option>
							<option value="style_ti_1">    Style 1 </option>
							<option value="style_ti_2">    Style 2 </option>
							<option value="style_ti_3">    Style 3 </option>
							<option value="style_ti_4">    Style 4 </option>
							<option value="style_ti_5">    Style 5 </option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Title Font Family <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Title Size (px)</td>
					<td colspan="2"></td>
				</tr>
				
				<tr>
					<td>
						<select id="Rich_Web_Tabs_T_N_FF_ACD" name="">
							<?php for($i=0;$i<count($Rich_WebFontCount);$i++){ ?> 
								<option value="<?php echo $Rich_WebFontCount[$i]->Font_family;?>"><?php echo $Rich_WebFontCount[$i]->Font_family;?></option>
							<?php }?>
						</select>
					</td>
					<td>
						<div class="Rich_Web_Tabs_Range">  
							<input class="Rich_Web_Tabs_Range__range" type="range" id="Rich_Web_Tabs_T_N_Title_S_2_ACD" name="Rich_Web_Tabs_T_N_Title_S_2_ACD" value="" min="8" max="50">
							<span class="Rich_Web_Tabs_Range__value" id="Rich_Web_Tabs_T_N_Title_S_2_ACD_Span"></span>
						</div>
					</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td colspan="4">Icon Options</td>
				</tr>
				<tr>
					<td>Left Icon Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Hover Left Icon Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Current Left Icon Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Left Icon Size (px)</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_S_CC_ACD" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_S_CBgC_ACD" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_N_IBSh_active_ACD" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<div class="Rich_Web_Tabs_Range">  
							<input class="Rich_Web_Tabs_Range__range" type="range" id="Rich_Web_Tabs_T_N_IS_ACD" name="Rich_Web_Tabs_T_N_IS_ACD" value="" min="8" max="50">
							<span class="Rich_Web_Tabs_Range__value" id="Rich_Web_Tabs_T_N_IS_ACD_Span"></span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Right Icon Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Hover Right Icon Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Current Right Icon Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Right Icon Size (px)</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_S_CC_2_ACD" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_S_CBgC_2_ACD" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_N_IBSh_active_2_ACD" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<div class="Rich_Web_Tabs_Range">  
							<input class="Rich_Web_Tabs_Range__range" type="range" id="Rich_Web_Tabs_T_N_IS_2_ACD" name="Rich_Web_Tabs_T_N_IS_2_ACD" value="" min="8" max="50">
							<span class="Rich_Web_Tabs_Range__value" id="Rich_Web_Tabs_T_N_IS_ACD_2_Span"></span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Right Icon Type <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td>
						<select name="" id="Rich_Web_Tabs_T_Icon_style_ACD">
							<option value="none">            None    </option>
							<option value="sort-desc">       Style 1 </option>
							<option value="circle">          Style 2 </option>
							<option value="angle-double-up"> Style 3 </option>
							<option value="arrow-circle-up"> Style 4 </option>
							<option value="angle-up">        Style 5 </option>
							<option value="plus">            Style 6 </option>
						</select>
					</td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan="4">Content Options</td>
				</tr>
				<tr>
					<td>Background Type <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Background Color 1 <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Background Color 2 <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td><div class="Rich_Web_Tabs_Cont_BR_Width_ACD">Border Width (px) <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></div></td>
				</tr>
				<tr>
					<td>
						<select name="" id="Rich_Web_Tabs_T_C_BgT_ACD">
							<option value="color">       Color       </option>
							<option value="transparent"> Transparent </option>
							<option value="gradient">    Gradient    </option>
						</select>
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_C_BgC_ACD" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_C_BgC2_ACD" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<div class="Rich_Web_Tabs_Range Rich_Web_Tabs_Cont_BR_Width_ACD">  
							<input class="Rich_Web_Tabs_Range__range" type="range" id="Rich_Web_Tabs_T_C_BW_ACD" name="" value="" min="0" max="10">
							<span class="Rich_Web_Tabs_Range__value" id="Rich_Web_Tabs_T_C_BW_Span_ACD"></span>
						</div>
					</td>
				</tr>
				<tr>
					<td><div class="Rich_Web_Tabs_Cont_BR_color_ACD">Border Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></div></td>
					<td><div class="Rich_Web_Tabs_Cont_BR_ACD">Border Radius (px)</div></td>
					<td>Inset Box Shadow Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
					<td>Outset Box Shadow Color <span class="Rich_Web_Tabs_T_Pro">(Pro)</span></td>
				</tr>
				<tr>
					<td>
						<div class="Rich_Web_Tabs_Cont_BR_color_ACD">
							<input type="text" name="" id="Rich_Web_Tabs_T_C_BC_ACD" class="Rich_Web_Tab_Col alpha-color-picker" value="">
						</div>
					</td>
					<td>
						<div class="Rich_Web_Tabs_Range Rich_Web_Tabs_Cont_BR_ACD">  
							<input class="Rich_Web_Tabs_Range__range" type="range" id="Rich_Web_Tabs_T_C_BR_ACD" name="Rich_Web_Tabs_T_C_BR_ACD" value="" min="0" max="20">
							<span class="Rich_Web_Tabs_Range__value" id="Rich_Web_Tabs_T_C_BR_Span_ACD"></span>
						</div>
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_C_IBSC_ACD" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_Tabs_T_C_OBSC_ACD" class="Rich_Web_Tab_Col alpha-color-picker" value="">
					</td>
				</tr>
			</table>
		</div>
	</div>
</form>