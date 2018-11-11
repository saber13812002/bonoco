<?php
	class Rich_Web_Tabs extends WP_Widget
	{
		function __construct()
 	  	{
 			$params=array('name'=>'Rich-Web Tabs','description'=>'This is the widget of Rich-Web Tabs plugin');
			parent::__construct('Rich_Web_Tabs','',$params);
 	  	}
		function Tab($instance)
 		{
 			$defaults = array('Rich_Web_Tabs'=>'');
		    $instance = wp_parse_args((array)$instance, $defaults);

		   	$Rich_Web_Tabs = $instance['Rich_Web_Tabs'];
		   	?>
		   	<div>			  
			   	<p>
			   		Slider Title:
			   		<select name="<?php echo $this->get_field_name('Rich_Web_Tabs'); ?>" class="widefat">
				   		<?php
				   			global $wpdb;
							$table_name2  = $wpdb->prefix . "rich_web_Tabs_manager";
							$Rich_Web_Tabs=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id > %d", 0));
				   			
				   			foreach ($Rich_Web_Tabs as $Rich_Web_Tabs1)
				   			{
				   				?> <option value="<?php echo $Rich_Web_Tabs1->id; ?>"> <?php echo $Rich_Web_Tabs1->Tabs_name; ?> </option> <?php 
				   			}
				   		?>

			   		</select>
			   	</p>
		   	</div>
		   	<?php	
 		}
 		function widget( $args, $instance )
 		{
 			extract($args);
 		 	$Rich_Web_Tabs = empty($instance['Rich_Web_Tabs']) ? '' : $instance['Rich_Web_Tabs'];
 		 	global $wpdb;

 		 	$table_name   = $wpdb->prefix . "rich_web_font_family";
			$table_name1  = $wpdb->prefix . "rich_web_icons";
			$table_name2  = $wpdb->prefix . "rich_web_tabs_id";
			$table_name3  = $wpdb->prefix . "rich_web_tabs_manager";
			$table_name4  = $wpdb->prefix . "rich_web_tabs_fields";
			$table_name5  = $wpdb->prefix . "rich_web_tabs_effects_data";
			$table_name6  = $wpdb->prefix . "rich_web_tabs_effect_1";
			$table_name7  = $wpdb->prefix . "rich_web_tabs_effect_2";

			$Rich_Web_Tabs_Manager = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE id=%d", $Rich_Web_Tabs));
			$Rich_Web_Tabs_Fields  = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE Tabs_ID=%d order by id", $Rich_Web_Tabs));
			$Rich_Web_Tabs_Themes  = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE Rich_Web_Tabs_T_T = %s", $Rich_Web_Tabs_Manager[0]->Tabs_theme));

		 	if($Rich_Web_Tabs_Themes[0]->Rich_Web_Tabs_T_Ty=='Rich_Tabs_1' || $Rich_Web_Tabs_Themes[0]->Rich_Web_Tabs_T_Ty=='Rich_Tabs_2')
		 	{
				$Rich_Web_Tabs_Theme = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE Tabs_T_ID = %s", $Rich_Web_Tabs_Themes[0]->id));
		 	}
 		 	echo $before_widget;
 		 	?>
 		 	
			<input type="text" style="display: none;" class="id_rw_tab" value="<?php echo $Rich_Web_Tabs;?>">
			<?php
 		 	if($Rich_Web_Tabs_Themes[0]->Rich_Web_Tabs_T_Ty=='Rich_Tabs_1')
		 	{
			?>
				<style type="text/css">
					 ul.Rich_Web_Tabs_tt_tabs li.active{
					    height:auto;
					    min-height:50px;
					  }

					  div.Rich_Web_Tabs_tt_tab.active {
						  visibility: visible; 
						  height:auto;
						}


					.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?>
					{
						<?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_Al == 'center'){ ?>
  							margin: 0 auto !important;
						<?php }else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_Al == 'right'){?>
  							margin-left: <?php echo 100-$Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_W;?>% !important;
						<?php }else{ ?>
							margin: 0 !important;
						<?php }?>
					}
					.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> > ul.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?>
					{
						background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBgC;?>;
					}
					.Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?> {
						text-align:left;
					}
					.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> > ul.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?> p{
						<?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM == 'vertical'){ ?>
							vertical-align: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavAl;?>;
						<?php }else { ?>
							text-align: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavAl;?>;
						<?php }?>
					}
					.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?>>li
					{
						<?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM == 'vertical' || $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM == 'accordion' ){ ?>
							margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px;
						<?php }else { ?>
							margin-right: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB-5;?>px;
						<?php }?>
						background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?>;
						color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?>;
						-webkit-box-shadow: 
						    inset 0 0 6px  <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_IBSh;?>,
						          0 0 10px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_OBSh;?>; 
						-moz-box-shadow: 
						    inset 0 0 6px  <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_IBSh;?>,
						          0 0 10px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_OBSh;?>; 
						box-shadow: 
						    inset 0 0 6px  <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_IBSh;?>,
						          0 0 10px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_OBSh;?>;
						position: relative;
						/*display: block;*/
						overflow: hidden;
					}
					.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?>>li:hover
					{
						background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
						color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC;?>;
					}
					.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?>>li.active
					{
						background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?>;
						color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?>;
					}
					.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?>>li:nth-last-child(1)
					{
						<?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM == 'vertical' || $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM == 'accordion' ){ ?>
							margin-bottom: 0px !important;
						<?php }?>
					}
					.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?>>li i
					{
						font-size: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_IS;?>px;
					}
					.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?>>li span
					{
						font-size: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_FS;?>px;
						font-family: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_FF;?>;
					}
					.rich_web_tab_li_span{
						padding: 18px 20px;
						display: block;
						min-width: 100%;
						text-align: center;
					}
					.vertical span.rich_web_tab_li_span{
						padding:5px;
					}
					.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> > div.Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?>
					{
						<?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM == 'accordion' ){ ?>
							-webkit-box-shadow: 
							    inset 0 0 20px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_IBSC;?>,
							          0 0 20px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_OBSC;?>; 
							-moz-box-shadow: 
							    inset 0 0 20px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_IBSC;?>,
							          0 0 20px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_OBSC;?>; 
							box-shadow: 
							    inset 0 0 20px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_IBSC;?>,
							          0 0 20px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_OBSC;?>;
							border-radius: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BR;?>px;    
							-webkit-border-radius: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BR;?>px;
							-moz-border-radius: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BR;?>px;  
							border: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BW;?>px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BC;?>; 
							<?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgT=='color'){ ?>
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>;
							<?php }else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgT=='transparent'){ ?>
								background: transparent;
							<?php }else{ ?>
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>;
							    background: -webkit-linear-gradient(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>);
							    background: -o-linear-gradient(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>);
							    background: -moz-linear-gradient(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>);
							    background: linear-gradient(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>);
							<?php }?> 
						<?php }?> 
						width: 100%;
					}
					.vertical div.Rich_Web_Tabs_tt_container<?php echo $Rich_Web_Tabs;?>{
						overflow: unset !important;
					}
					.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> > div.Rich_Web_Tabs_tt_container<?php echo $Rich_Web_Tabs;?>
					{
						/*overflow: auto;*/
						<?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM == 'horizontal' ){ ?>
							-webkit-box-shadow: 
							    inset 0 0 20px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_IBSC;?>,
							          0 0 20px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_OBSC;?>; 
							-moz-box-shadow: 
							    inset 0 0 20px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_IBSC;?>,
							          0 0 20px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_OBSC;?>; 
							box-shadow: 
							    inset 0 0 20px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_IBSC;?>,
							          0 0 20px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_OBSC;?>;
							border-radius: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BR;?>px; 
							-webkit-border-radius: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BR;?>px;
							-moz-border-radius: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BR;?>px;  
							border: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BW;?>px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BC;?>; 
							<?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgT=='color'){ ?>
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>;
							<?php }else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgT=='transparent'){ ?>
								background: transparent;
							<?php }else{ ?>
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>;
							    background: -webkit-linear-gradient( <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>);
							    background: -o-linear-gradient( <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>);
							    background: -moz-linear-gradient( <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>);
							    background: linear-gradient( <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>);
							<?php }?> 
						<?php }?>
						<?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM == 'vertical'){ ?>
							-webkit-box-shadow: 
							    inset 0 0 20px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_IBSC;?>,
							          0 0 20px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_OBSC;?>; 
							-moz-box-shadow: 
							    inset 0 0 20px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_IBSC;?>,
							          0 0 20px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_OBSC;?>; 
							box-shadow: 
							    inset 0 0 20px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_IBSC;?>,
							          0 0 20px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_OBSC;?>;
							border-radius: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BR;?>px;    
							-webkit-border-radius: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BR;?>px;
							-moz-border-radius: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BR;?>px;  
							border: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BW;?>px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BC;?>; 
							<?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgT=='color'){ ?>
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>;
							<?php }else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgT=='transparent'){ ?>
								background: transparent;
							<?php }else{ ?>
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>;
							    background: -webkit-linear-gradient(left, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>);
							    background: -o-linear-gradient(right, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>);
							    background: -moz-linear-gradient(right, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>);
							    background: linear-gradient(to right, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>);
							<?php }?> 
						<?php }?>


					}
					<?php if( $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM == 'horizontal' ){ ?>
						/*****************************/
						/* Bar */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_1 {
							border: 4px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_1 li {
							padding: 0;
							overflow: visible !important;
						}
						/*****************************/
						/* Icon Box */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_2 {
							border: 2px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_2 li  {
							overflow: visible !important;
							position: relative;
							padding: 1em;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_2 li.active {
							z-index: 100;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_2 li.active::after {
							position: absolute;
							top: 100%;
							left: 50%;
							margin-left: -10px;
							width: 0;
							height: 0;
							border: solid transparent;
							border-width: 10px;
							border-top-color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?>;
							content: '';
							pointer-events: none;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_2 li i::before {
							position: relative;
						    display: block;
						    left: 0%;
						    text-align: center;
						}	
						/*****************************/
						/* Underline */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_3 li {
							padding: 18px 20px;
							-webkit-transition: color 0.2s;
							transition: color 0.2s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_3 li::after {
							position: absolute;
							bottom: 0;
							left: 0;
							width: 100%;
							height: 6px;
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?>;
							content: '';
							-webkit-transition: -webkit-transform 0.3s;
							transition: transform 0.3s;
							-webkit-transform: translate3d(0,150%,0);
							transform: translate3d(0,150%,0);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_3 li.active::after {
							-webkit-transform: translate3d(0,0,0);
							transform: translate3d(0,0,0);
						}
						/*****************************/
						/* Triangle and Line */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_4
						{
							margin-bottom: 3px !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_4 li {
							padding: 18px 20px;
							overflow: visible !important;
							border-bottom: 1px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?>;
							-webkit-transition: color 0.2s;
							transition: color 0.2s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_4 li::after {
							position: absolute;
							top: 100%;
							left: 50%;
							width: 0;
							height: 0;
							border: solid transparent;
							content: '';
							pointer-events: none;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_4 li::before {
							position: absolute;
							top: 100%;
							left: 50%;
							width: 0;
							height: 0;
							display: block !important;
							border: solid transparent;
							content: '' !important;
							pointer-events: none;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_4 li.active::after {
							margin-left: -10px;
							border-width: 10px;
							border-top-color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?>;
							z-index: 100;
						}						
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_4 li.active::before {
							margin-left: -11px;
							border-width: 11px;
							border-top-color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?>;
							z-index: 100;
						}
						/*****************************/
						/* Top Line */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_5 li {
							padding:1em;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_5 li.active {
							background: none;
							box-shadow: inset 0 3px 0 <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_5 li i::before {
							display: block;
							position: relative;
							left: 0%;
							text-align: center;
						}
						/*****************************/
						/* Falling Icon */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_6 li {
							display: inline-block;
							overflow: visible;
							padding: 1em 2em;
							-webkit-transition: color 0.3s cubic-bezier(0.7,0,0.3,1); 
							transition: color 0.3s cubic-bezier(0.7,0,0.3,1);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_6 li::before {
							position: absolute;
							display: block !important;
							bottom: 0;
							width: 100%;
							left: 0;
							height: 4px;
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?>;
							content: '';
							opacity: 0;
							-webkit-transition: -webkit-transform 0.2s ease-in;
							transition: transform 0.2s ease-in;
							-webkit-transform: scale3d(0,1,1);
							transform: scale3d(0,1,1);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_6 li.active::before {
							opacity: 1;
							-webkit-transform: scale3d(1,1,1);
							transform: scale3d(1,1,1);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_6 li i::before {
							display: block;
							position: relative;
							left: 0%;
							text-align: center;
							opacity: 0;
							-webkit-transition: -webkit-transform 0.2s, opacity 0.2s;
							transition: transform 0.2s, opacity 0.2s;
							-webkit-transform: translate3d(0,-100px,0);
							transform: translate3d(0,-100px,0);
							pointer-events: none;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_6 li.active i::before {
							opacity: 1;
							-webkit-transform: translate3d(0,0,0);
							transform: translate3d(0,0,0);
						}
						@media screen and (max-width: 570px) {
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_18 {
								border-radius: 0 !important;
							}
							/*--------- New Style 1 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
								transition: all 500ms ease 0s !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li:hover span.rich_web_tab_li_span:before {
							    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li:hover span.rich_web_tab_li_span:before {
							    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li:hover span.rich_web_tab_li_span:after {
							    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li.active span.rich_web_tab_li_span:before {
							    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li.active span.rich_web_tab_li_span:before {
							    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li.active span.rich_web_tab_li_span:after {
							    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 1 ---------*/

							/*--------- New Style 2 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li:hover span.rich_web_tab_li_span:before {
							    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li:hover span.rich_web_tab_li_span:before {
							    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li:hover span.rich_web_tab_li_span:after {
							    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li.active span.rich_web_tab_li_span:before {
							    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li.active span.rich_web_tab_li_span:before {
							    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li.active span.rich_web_tab_li_span:after {
							    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 2 ---------*/

							/*--------- New Style 3 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_18 {
								display: block !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_18 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_18 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_18 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_18 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 3 ---------*/

							/*--------- New Style 4 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_19 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_19 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_19 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_19 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 4 ---------*/

							/*--------- New Style 5 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_20 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_20 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_20 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_20 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 5 ---------*/

							/*--------- New Style 6 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_21 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_21 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_21 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_21 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 6 ---------*/

							/*--------- New Style 7 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_22 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_22 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_22 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_22 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_22 li:hover:after{
								background: none !important;
							}
							/*--------- End New Style 7 ---------*/

							/*--------- New Style 8 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_23 li:after {
								height: 0 !important;
								border-radius: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_23 li.active:after {
								height: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_23 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
								border-radius: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_23 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_23 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_23 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 8 ---------*/

							/*--------- New Style 9 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
								border-radius: 0 !important;
								margin-bottom: 2px !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 9 ---------*/

							/*--------- New Style 10 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_25 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
								border-radius: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_25 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_25 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_25 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 10 ---------*/

							/*--------- New Style 11 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_26 {
								display: block !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_26 div.rich_web_tab_ul_line {
								opacity: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_26 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
								border-radius: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_26:before {
								content: none !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_26:after {
								content: none !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_26 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_26 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_26 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 11 ---------*/


							/*--------- New Style 12 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_27 {
								background: none !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_27 li {
								left: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_27 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
								border-radius: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_27 {
								border: none !important;
								height: 100% !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_27 div.rich_web_tab_ul_div {
								top: 0 !important;
								height: 100% !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_27 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_27 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_27 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 12 ---------*/

							/*--------- New Style 13 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_28 li {
								transform: none !important;
								-webkit-transform: none !important;
								-moz-transform: none !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?>>li:hover {
								margin-right: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?>>li.active {
								margin-right: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_28 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
								border-radius: 0 !important;
								transform: rotateX(360deg) rotateY(0deg) rotateZ(0deg) skewX(330deg);
								-webkit-transform: rotateX(360deg) rotateY(0deg) rotateZ(0deg) skewX(330deg);
								-moz-transform: rotateX(360deg) rotateY(0deg) rotateZ(0deg) skewX(330deg);
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_28 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_28 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_28 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 13 ---------*/

							/*--------- New Style 14 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_29 {
								border-radius: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?> {
								padding-left: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?>>li {
								margin-right: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 li:after {
								content: none !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 14 ---------*/

							/*--------- New Style 14 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?> {
								padding-left: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?>>li {
								margin-right: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 li:after {
								content: none !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 14 ---------*/

							/*--------- New Style 15 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?> {
								padding-left: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 li {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
								border-radius: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 li div.Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?>:before {
								padding-left: 10000px !important;
								margin-left: 10000px !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 :last-child:before {
								padding-left: 10000px !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_30 li.active:before {
								padding-left: 10000px !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_30 li:last-child:before {
								padding-left: 10000px !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_30 li:first-child:before {
								padding-left: 10000px !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_30 li:hover:before {
								padding-left: 10000px !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_30 li:last-child:hover:before {
								margin-left: 10000px !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?> li.active div.Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?>:before {
								content: none !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> li.active div.Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?>:before {
								content: none !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30:last-child.active:before {
								content: none !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?>>li {
								margin-right: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 li:after {
								content: none !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 15 ---------*/

							/*--------- New Style 16 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_31 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
								border-radius: 0 !important;
								padding: 10px 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_31 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_31 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_31 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 16 ---------*/

							/*--------- New Style 17 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_32 {
								border-radius: 0 !important;
								display: block !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_32 li.active:after {
								content: none !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_32 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
								border-radius: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_32 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_32 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_32 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 17 ---------*/


							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> li {
								/*background: none !important;*/
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .responsive .Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?> li {
								padding: 1px !important;	
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> > li.active > .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> li.active div.Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?> {
								padding: 0 5px 20px 5px !important;
								<?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgT=='color'){ ?>
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?> !important;
								<?php }else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgT=='transparent'){ ?>
									background: transparent !important;
								<?php }else{ ?>
									background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?> !important;
								    background: -webkit-linear-gradient(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>) !important;
								    background: -o-linear-gradient(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>) !important;
								    background: -moz-linear-gradient(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>) !important;
								    background: linear-gradient(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>) !important;
								<?php }?>
							}


						}
						/*****************************/
						/* Moving Line */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_7 li::before {
							position: absolute;
							display: block !important;
							bottom: 0;
							left: 0;
							width: 100% !important;
							height: 4px;
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?>;
							content: '';
							-webkit-transition: -webkit-transform 0.3s !important;
							transition: transform 0.3s !important;
							-webkit-transform: translate3d(101%,0,0);
								transform: translate3d(101%,0,0);
						}
	                	.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_7 li.active::before {
							-webkit-transform: translate3d(0%,0,0);
							transform: translate3d(0%,0,0);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_7 li.active{
							-webkit-transform: translate3d(0,4px,0);
							transform: translate3d(0,4px,0);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_7 li {
							padding: 1em 0.5em;
							margin: 0 0 5px -2px !important;
						}	
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_7 li:nth-child(1) {
							margin: 0 0 5px 0px !important;
						}					
						/*****************************/
						/* Line */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_8 li {
							padding: 0.7em 0.4em;
							box-shadow: inset 0 -2px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							-webkit-box-shadow: inset 0 -2px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							text-align: left;
							letter-spacing: 1px;
							-webkit-transition: color 0.3s, box-shadow 0.3s !important;
							transition: color 0.3s, box-shadow 0.3s !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_8 li:hover, .Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_8 li:focus {
							box-shadow: inset 0 -2px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC;?> !important;
							-webkit-box-shadow: inset 0 -2px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC;?> !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_8 li.active {
							box-shadow: inset 0 -2px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							-webkit-box-shadow: inset 0 -2px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
						}				
						/*****************************/
						/* Circle */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_9 li::before {
							position: absolute;
							display: block !important;
							top: 0%;
							left: 0%;
							width: 100%;
							height: 100%;
							border: 1px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?>;
							border-radius: 50%;
							content: '';
							opacity: 0;
							-webkit-transition: -webkit-transform 0.2s, opacity 0.2s;
							transition: transform 0.2s, opacity 0.2s;
							-webkit-transition-timing-function: cubic-bezier(0.7,0,0.3,1);
							transition-timing-function: cubic-bezier(0.7,0,0.3,1);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_9 li.active::before {
							opacity: 1;
							-webkit-transform: scale3d(0.9,0.9,0.9);
							transform: scale3d(0.9,0.9,0.9);
						}

						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_9 li {
							overflow: visible;
							-webkit-transition: color 0.3s cubic-bezier(0.7,0,0.3,1); 
							transition: color 0.3s cubic-bezier(0.7,0,0.3,1);
							padding: 1.5em; 
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_9 li i::before {
							display: block;
							position: relative;
							left: 0%;
							text-align: center;
							-webkit-transition: -webkit-transform 0.3s cubic-bezier(0.7,0,0.3,1);
							transition: transform 0.3s cubic-bezier(0.7,0,0.3,1);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_9 li i span {
							-webkit-transition: -webkit-transform 0.3s cubic-bezier(0.7,0,0.3,1);
							transition: transform 0.3s cubic-bezier(0.7,0,0.3,1);
							display: block;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_9 li.active i span {
							-webkit-transform: translate3d(0,2px,0);
							transform: translate3d(0,2px,0);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_9 li i::before {
							display: block;
							margin: 0;
							pointer-events: none;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_9 li.active i::before {
							-webkit-transform: translate3d(0,-2px,0);
							transform: translate3d(0,-2px,0);
						}
						/*****************************/
						/* Line Box */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_11 li {
							-webkit-flex: none;
							flex: none;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_11 li {
							padding: 1em;
							z-index: 10;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_11 li i::after {
							position: absolute;
							top: 0;
							left: 0;
							z-index: -1;
							width: 100%;
							height: 100%;
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?>;
							content: '';
							-webkit-transition: background 0.8s, -webkit-transform 0.8s !important;
							transition: background 0.8s, transform 0.8s !important;
							-webkit-transition-timing-function: ease, cubic-bezier(0.7,0,0.3,1);
							transition-timing-function: ease, cubic-bezier(0.7,0,0.3,1);
							-webkit-transform: translate3d(0,100%,0) translate3d(0,-2px,0);
							transform: translate3d(0,100%,0) translate3d(0,-2px,0);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_11 li:hover i::after {
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_11 li.active i::after {
							-webkit-transform: translate3d(0,0,0);
							transform: translate3d(0,0,0);
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?>;
						}
						/*****************************/
						/* Flip */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_12 li {
							padding: 1em;							
							z-index: 10;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_12 li::after {
							position: absolute;
							top: 0;
							left: 0;
							z-index: -1;
							width: 100%;
							height: 100%;
							background-color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?>;
							content: '';
							-webkit-transition: -webkit-transform 0.7s, background-color 0.3s !important;
							transition: transform 0.7s, background-color 0.3s !important;
							-webkit-transform: perspective(900px) rotate3d(1,0,0,90deg);
							transform: perspective(900px) rotate3d(1,0,0,90deg);
							-webkit-transform-origin: 50% 100%;
							transform-origin: 50% 100%;
							-webkit-perspective-origin: 50% 100%;
							perspective-origin: 50% 100%;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_12 li.active{
							background-color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_12 li.active::after {
							background-color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?>;
							-webkit-transform: perspective(900px) rotate3d(1,0,0,0deg);
							transform: perspective(900px) rotate3d(1,0,0,0deg);
						}
						/*****************************/
						/* Circle Fill */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_13 li {
							overflow: hidden;
							background: none !important;
							z-index: 10;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_13 li i {
							padding: 1.5em !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_13 li::after {
							position: absolute;
							top: 0%;
							z-index: -1;
							left: 0%;
							width: 99%;
							height: 99%;
							border-radius: 50%;
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?>;
							content: '';
							-webkit-transition: -webkit-transform 0.8s !important;
							transition: transform 0.8s !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_13 li:hover::after {
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_13 li.active::after {
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?>;
							-webkit-transform: scale3d(2.5,2.5,1);
							transform: scale3d(2.5,2.5,1);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_13 li span {
							display: block;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_13 li i::before {
							display: block;
							margin: 0;
							pointer-events: none;
							text-align: center;
						}		
						/*****************************/
						/* Fill Up */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_14 li, .Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_14 li:hover {
							z-index: 10;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_14 li i {
							padding: 1em 1em;
							-webkit-backface-visibility: hidden;
							backface-visibility: hidden;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_14 li i.active {
							z-index: 100;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_14 li i::after {
							position: absolute;
							top: 0;
							left: 0;
							z-index: -1;
							width: 100%;
							height: 100%;
							height: calc(100% + 1px);
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?>;
							content: '';
							-webkit-transition: -webkit-transform 0.8s !important;
							transition: transform 0.8s !important;
							-webkit-transform: translate3d(0,100%,0);
							transform: translate3d(0,100%,0);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_14 li.active i::after {
							-webkit-transform: translate3d(0,0,0);
							transform: translate3d(0,0,0);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_14 li i span, .Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_14 li i::before {
							-webkit-transition: -webkit-transform 0.5s;
							transition: transform 0.5s;
							-webkit-transform: translate3d(0,5px,0);
							transform: translate3d(0,5px,0);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_14 li i span {
							display: block;							
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_14 li i::before {
							display: block;
							margin: 0;
							position: relative;
							left: 0%;
							text-align: center;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_14 li.active span {
							-webkit-transform: translate3d(0,-5px,0);
							transform: translate3d(0,-5px,0);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_14 li.active i::before {
							-webkit-transform: translate3d(0,-10px,0);
							transform: translate3d(0,-10px,0);
						}
						/*****************************/
						/* Trapezoid */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_15 li, .Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_15 li:hover, .Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_15 li.active {
							background: none !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_15 li {
							-webkit-backface-visibility: hidden;
							backface-visibility: hidden;
							z-index: 10;
							margin-right: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB-9;?>px !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_15 li i {
							padding: 0.5em 1em;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_15 li i::after {
							position: absolute;
							top: 0;
							right: 0;
							bottom: 0;
							left: 0;
							z-index: -1;
							outline: 1px solid transparent;
							border-radius: 10px 10px 0 0;
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?>;
							box-shadow: inset 0 -3px 3px rgba(0,0,0,0.05);
							content: '';
							-webkit-transform: perspective(5px) rotateX(0.93deg) translateZ(-1px);
							transform: perspective(5px) rotateX(0.93deg) translateZ(-1px);
							-webkit-transform-origin: 0 0;
							transform-origin: 0 0;
							-webkit-backface-visibility: hidden;
							backface-visibility: hidden;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_15 li:hover i::after{
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_15 li.active i::after{
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?>;
							box-shadow: none;
						}
						/*****************************/
						/* New Style 1 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 {
							border: 4px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li span.rich_web_tab_li_span {
							position: relative;
							display: inline-block;
							height: 100%;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li span.rich_web_tab_li_span:after {
							content: "";
						    width: 100%;
						    height: 1px;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?>;
						    display: block;
						    transform: scale(0);
						    -webkit-transform: scale(0);
						    -moz-transform: scale(0);
						    transition: all 700ms;
						    -webkit-transition: all 700ms;
						    -moz-transition: all 700ms;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li span.rich_web_tab_li_span:before {
							content: "";
						    width: 7px;
						    height: 7px;
						    display: inline;
						    position: absolute;
						    left: 50%;
						    bottom: -3px;
						    z-index: 1;
						    border-radius: 50%;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?>;
						    transform: scale(0);
						    -webkit-transform: scale(0);
						    -moz-transform: scale(0);
						    transition: all 700ms ease 0s;
						    -webkit-transition: all 700ms ease 0s;
						    -moz-transition: all 700ms ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li:hover span.rich_web_tab_li_span:before {
							content: "";
						    width: 7px;
						    height: 7px;
						    display: inline;
						    position: absolute;
						    left: 50%;
						    bottom: -3px;
						    z-index: 1;
						    border-radius: 50%;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC;?>;
						    transform: scale(1);
						    -webkit-transform: scale(1);
						    -moz-transform: scale(1);
						    transition: all 700ms ease 0s;
						    -webkit-transition: all 700ms ease 0s;
						    -moz-transition: all 700ms ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li.active span.rich_web_tab_li_span:before {
							content: "";
						    width: 7px;
						    height: 7px;
						    display: inline;
						    position: absolute;
						    left: 50%;
						    bottom: -3px;
						    z-index: 1;
						    border-radius: 50%;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?>;
							transition: all 700ms ease 0s;
							-webkit-transition: all 700ms ease 0s;
							-moz-transition: all 700ms ease 0s;
						    transform: scale(1);
						    -webkit-transform: scale(1);
						    -moz-transform: scale(1);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li:hover span.rich_web_tab_li_span:after {
							content: "";
						    width: 100%;
						    display: block;
						    transform: scale(1);
						    -webkit-transform: scale(1);
						    -moz-transform: scale(1);
						    height: 1px;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li.active span.rich_web_tab_li_span:after {
							content: "";
						    width: 100%;
						    display: block;
						    transform: scale(1);
						    -webkit-transform: scale(1);
						    -moz-transform: scale(1);
						    height: 1px;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li {
							padding: 18px 20px;
							overflow: visible !important;
						}
						/*****************************/
						/* New Style 2 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 {
							border: 4px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li {
							transition: all 500ms ease 0s;
							-webkit-transition: all 500ms ease 0s;
							-moz-transition: all 500ms ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li span.rich_web_tab_li_span {
							position: relative;
							display: inline-block;
							height: 100%;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li span.rich_web_tab_li_span:after {
							content: "";
						    width: 0;
						    margin: 0;
						    height: 1px;
						    background: #fff;
						    display: block;
						    transition: all 0.2s ease 0s;
						    -webkit-transition: all 0.2s ease 0s;
						    -moz-transition: all 0.2s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li span.rich_web_tab_li_span:before {
							content: "";
						    width: 0px;
						    height: 0px;
						    display: block;
						    position: absolute;
						    left: 10%;
						    bottom: -3px;
						    z-index: 1;
						    border-radius: 50%;
						    background: #4cc985;
						    transition: all 0.1s !important;
						    -webkit-transition: all 0.1s !important;
						    -moz-transition: all 0.1s !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li:hover span.rich_web_tab_li_span:before {
							content: "";
						    width: 7px;
						    height: 7px;
						    display: block;
						    position: absolute;
						    left: 10%;
						    bottom: -3px;
						    z-index: 1;
						    border-radius: 50%;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC;?>;
						    transition: all 700ms ease 0s;
						    -webkit-transition: all 700ms ease 0s;
						    -moz-transition: all 700ms ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li:hover span.rich_web_tab_li_span:after {
							content: "";
						    width: 50%;
						    margin: 0 0 0 10%;
						    display: block;
						    height: 1px;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC;?>;
						    transition: all 0.2s ease 0s;
						    -webkit-transition: all 0.2s ease 0s;
						    -moz-transition: all 0.2s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li.active span.rich_web_tab_li_span:before {
							content: "";
						    width: 7px;
						    height: 7px;
						    display: block;
						    position: absolute;
						    left: 10%;
						    bottom: -3px;
						    z-index: 1;
						    border-radius: 50%;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?>;
							transition: all 700ms ease 0s;
							-webkit-transition: all 700ms ease 0s;
							-moz-transition: all 700ms ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li.active span.rich_web_tab_li_span:after {
							content: "";
						    width: 50%;
						    margin: 0 0 0 10%;
						    display: block;
						    height: 1px;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?>;
						    transition: all 0.2s ease 0s;
						    -webkit-transition: all 0.2s ease 0s;
						    -moz-transition: all 0.2s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li {
							padding: 18px 20px;
							overflow: visible !important;
						}
						/*****************************/
						/* New Style 3 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_18 {
							border: 4px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
							border-radius: 50px;
							display: inline-block !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_18 li {
						    padding: 18px 20px;
						    overflow: visible !important;
						    border-radius: 50px;
						}
						/*****************************/
						/* New Style 4 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_19 {
							border: none !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_19 li {
						    padding: 18px 20px;
						    overflow: visible !important;
						    transition: all 0.1s ease 0s;
						    -webkit-transition: all 0.1s ease 0s;
						    -moz-transition: all 0.1s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_19 li.active {
						    padding: 16px 20px;
						    overflow: visible !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_19 li.active {
							border-top: 2px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						    border-bottom: 2px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						/*****************************/
						/* New Style 5 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_20 {
							border: 4px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_20 li {
						    padding: 18px 20px;
						    overflow: visible !important;
						    transition: all 0.5s ease 0s;
						    -webkit-transition: all 0.5s ease 0s;
						    -moz-transition: all 0.5s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_20 li span {
							position: relative;
							z-index: 2;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_20 li:after {
							content: "";
						    width: 0;
						    display: block;
						    height: 100%;
						    position: absolute;
						    top: 0;
						    left: 0;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
						    transition: all 0.5s ease 0s;
						    -webkit-transition: all 0.5s ease 0s;
						    -moz-transition: all 0.5s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_20 li.active {
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_20 li.active:after {
							opacity: 0;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_20 li:hover:after {
						    width: 100%;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
						}
						/*****************************/
						/* New Style 6 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_21 {
							border: 4px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_21 li {
						    padding: 18px 20px;
						    overflow: visible !important;
						    transition: all 0.5s ease 0s;
						    -webkit-transition: all 0.5s ease 0s;
						    -moz-transition: all 0.5s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_21 li span {
							position: relative;
							z-index: 2;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_21 li:after {
							content: "";
						    width: 0;
						    display: block;
						    height: 0;
						    position: absolute;
						    top: 0;
						    left: 0;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
						    transition: all 0.5s ease 0s;
						    -webkit-transition: all 0.5s ease 0s;
						    -moz-transition: all 0.5s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_21 li.active {
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_21 li.active:after {
							opacity: 0;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_21 li:hover:after {
						    width: 100%;
						    height: 100%;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
						}
						/*****************************/
						/* New Style 7 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_22 {
							border: 4px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_22 li {
						    padding: 18px 20px;
						    overflow: hidden !important;
						    transition: all 0.5s ease 0s;
						    -webkit-transition: all 0.5s ease 0s;
						    -moz-transition: all 0.5s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_22 li span {
							position: relative;
							z-index: 2;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_22 li:after {
							content: "";
						    width: 0;
						    display: block;
						    height: 0;
						    position: absolute;
						    top: 50%;
						    left: 50%;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
						    opacity: 0;
						    transform: translateY(-50%) translateX(-50%);
						    -webkit-transform: translateY(-50%) translateX(-50%);
						    -moz-transform: translateY(-50%) translateX(-50%);
						    transition: all 0.5s ease 0s;
						    -webkit-transition: all 0.5s ease 0s;
						    -moz-transition: all 0.5s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_22 li:hover:after {
						    width: 100%;
						    opacity: 1;
						    /*transform: scale(1,1);*/
						    /*-webkit-transform: scale(1,1);
						    -moz-transform: scale(1,1);*/
						    height: 100%;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
						}
						/*.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> div.Rich_Web_Tabs_tt_container<?php echo $Rich_Web_Tabs;?> {
							box-shadow: none;
						}*/
						/*****************************/
						/* New Style 8 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_23 {
							border: 4px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_23 li span {
							position: relative;
							z-index: 2;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_23 li {
						    padding: 18px 20px;
						    transition: all 0.3s ease 0s;
						    -webkit-transition: all 0.3s ease 0s;
						    -moz-transition: all 0.3s ease 0s;
						    overflow: visible !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_23 li:after {
							content: "";
						    width: 100%;
						    display: block;
						    height: 100%;
						    position: absolute;
						    bottom: 0;
						    left: 0;
						    opacity: 0;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
						    transition: all 0.3s ease 0s;
						    -webkit-transition: all 0.3s ease 0s;
						    -moz-transition: all 0.3s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_23 li:hover:after {
						    opacity: 1;
						    bottom: 0;
						    height: 130%;
						    transition: all 0.3s ease 0s;
						    -webkit-transition: all 0.3s ease 0s;
						    -moz-transition: all 0.3s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_23 li.active:after {
						    opacity: 1;
						    bottom: 0;
						    height: 130%;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
						    transition: all 0.3s ease 0s;
						    -webkit-transition: all 0.3s ease 0s;
						    -moz-transition: all 0.3s ease 0s;
						}
						
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_23 :first-child {
						    border-radius: 15px 0 0 15px;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_23 li:first-child:after {
							border-radius: 15px 0 0 15px;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_23 :last-child {
						    border-radius: 0 15px 15px 0;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_23 li:last-child:after {
						    border-radius: 0 15px 15px 0;
						}
						/*****************************/
						/* New Style 9 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 {
							border: 0 solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 li {
						    padding: 18px 20px;
						    overflow: visible !important;
						    transition: all 0.4s ease 0s;
						    -webkit-transition: all 0.4s ease 0s;
						    -moz-transition: all 0.4s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 li span {
							position: relative;
							z-index: 2;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 li:before {
							content: "";
						    width: 100%;
						    display: block;
						    height: 3px;
						    position: absolute;
						    top: 100%;
						    left: 0;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						    transition: all 0.4s ease 0s;
						    -webkit-transition: all 0.4s ease 0s;
						    -moz-transition: all 0.4s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 li:after {
							content: "";
						    width: 100%;
						    display: block;
						    height: 0;
						    position: absolute;
						    top: 100%;
						    left: 0;
						    opacity: 0;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
						    transition: all 0.4s ease 0s;
						    -webkit-transition: all 0.4s ease 0s;
						    -moz-transition: all 0.4s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 li:hover {
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 li:hover:before {
							top: 0;
							z-index: 1;
							transition: all 0.4s ease 0s;
							-webkit-transition: all 0.4s ease 0s;
							-moz-transition: all 0.4s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 li:hover:after {
						    opacity: 1;
						    top: 0;
						    height: 100%;
						    transition: all 0.4s ease 0s;
						    -webkit-transition: all 0.4s ease 0s;
						    -moz-transition: all 0.4s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 li.active:before {
							top: 0;
							z-index: 1;
							transition: all 0.4s ease 0s;
							-webkit-transition: all 0.4s ease 0s;
							-moz-transition: all 0.4s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 li.active:after {
						    opacity: 1;
						    top: 0;
						    height: 100%;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
						}
						/*****************************/
						/* New Style 10 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_25 {
							border: 0 solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_25 li {
						    padding: 18px 20px;
						    overflow: visible !important;
						    transition: all 0.4s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_25 li span {
							position: relative;
							z-index: 2;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_25 li:before {
							content: "";
						    width: 100%;
						    display: block;
						    height: 3px;
						    position: absolute;
						    top: 0;
						    left: 0;
						    transform: scale(0);
						    -webkit-transform: scale(0);
						    -moz-transform: scale(0);
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						    opacity: 0;
						    transition: all 0.4s ease 0s;
						    -webkit-transition: all 0.4s ease 0s;
						    -moz-transition: all 0.4s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_25 li:hover:before {
							content: "";
						    width: 100%;
						    display: block;
						    height: 3px;
						    position: absolute;
						    top: 0;
						    transform: scale(1);
						    -webkit-transform: scale(1);
						    -moz-transform: scale(1);
						    left: 0;
							z-index: 1;
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
							opacity: 1;
							transition: all 0.4s ease 0s;
							-webkit-transition: all 0.4s ease 0s;
							-moz-transition: all 0.4s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_25 li.active:before {
							content: "";
						    width: 100%;
						    display: block;
						    height: 3px;
						    position: absolute;
						    top: 0;
						    transform: scale(1);
						    -webkit-transform: scale(1);
						    -moz-transform: scale(1);
						    left: 0;
							z-index: 1;
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
							opacity: 1;
							transition: all 0.4s ease 0s;
							-webkit-transition: all 0.4s ease 0s;
							-moz-transition: all 0.4s ease 0s;
						}
						/*****************************/
						/* New Style 11 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_26 {
							border: 0 solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
							display: inline-block !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_26 li {
							border: 2px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
						    padding: 18px 20px;
						    overflow: visible !important;
						    transition: all 0.4s ease 0s;
						    -webkit-transition: all 0.4s ease 0s;
						    -moz-transition: all 0.4s ease 0s;
						    z-index: 1;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_26 li span {
							position: relative;
							z-index: 2;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_26 {
							position: relative;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_26 li:last-child {
							margin-right: 0 !important; 
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_26 div.rich_web_tab_ul_line {
							border-color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?> !important;
							opacity: 1;
						}
						/*****************************/
						/* New Style 12 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_27 {
							background: none !important;
							position: relative;
							margin-bottom: 15px !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_27 li {
						    padding: 18px 20px;
						    overflow: visible !important;
						    transition: all 0.4s ease 0s;
						    -webkit-transition: all 0.4s ease 0s;
						    -moz-transition: all 0.4s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_27 div.rich_web_tab_ul_div {
								border: 4px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
							    width: 100%;
							    position: absolute;
							    height: 80%;
							    top: 10%;
							    display: inline-block;
							    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBgC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_27 li span {
							position: relative;
							z-index: 2;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_27 {
							height: 100%;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_27 li {
							position: relative;
							/*top: -18px;*/
							left: 5px;
							padding: 30px 20px;
						}
						/*****************************/
						/* New Style 13 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_28 {
							border: 4px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_28 li {
						    padding: 18px 20px;
						    overflow: visible !important;
						    transition: all 0.4s ease 0s;
						    -webkit-transition: all 0.4s ease 0s;
						    -moz-transition: all 0.4s ease 0s;
						    transform:rotateX(0deg) rotateY(0deg) rotateZ(0deg) skewX(330deg);
						    -webkit-transform:rotateX(0deg) rotateY(0deg) rotateZ(0deg) skewX(330deg);
						    -moz-transform:rotateX(0deg) rotateY(0deg) rotateZ(0deg) skewX(330deg);
						    margin-left: 0 !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_28 li:hover {
						    margin-right: 10px !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_28 li.active {
						    transform:rotateX(360deg) rotateY(0deg) rotateZ(0deg) skewX(330deg);
						    -webkit-transform:rotateX(360deg) rotateY(0deg) rotateZ(0deg) skewX(330deg);
						    -moz-transform:rotateX(360deg) rotateY(0deg) rotateZ(0deg) skewX(330deg);
						    margin-left: 0 !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_28 li span {
							position: relative;
							z-index: 2;
						}
						/*****************************/
						/* New Style 14 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 {
							border: 0px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
							padding-left: 0 !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 li {
						    padding: 18px 15px;
						    overflow: visible !important;
						    transition: all 0.4s ease 0s;
						    -webkit-transition: all 0.4s ease 0s;
						    -moz-transition: all 0.4s ease 0s;
						    margin-right: 12px !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_29 {
							border-radius: 30px;
							padding-left: 18px;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_29 {
							position: relative;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_29:before {
						    width: 100%;
						    display: block;
						    height: 2px;
						    position: absolute;
						    top: 50%;
						    left: 0;
						    background: #ea3c6e;
						    transition: all 0.5s ease 0s;
						    -webkit-transition: all 0.5s ease 0s;
						    -moz-transition: all 0.5s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 li:after {
							content: "";
						    width: 2px;
						    display: block;
						    height: 100%;
						    position: absolute;
						    top: 0;
						    right: -8px;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						    transform:rotateX(360deg) rotateY(0deg) rotateZ(0deg) skewX(353deg);
						    -webkit-transform:rotateX(360deg) rotateY(0deg) rotateZ(0deg) skewX(353deg);
						    -moz-transform:rotateX(360deg) rotateY(0deg) rotateZ(0deg) skewX(353deg);
						    transition: all 0.5s ease 0s;
						    -webkit-transition: all 0.5s ease 0s;
						    -moz-transition: all 0.5s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 :last-child:after {
						   content: none !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 li span {
							position: relative;
							z-index: 2;
						}
						/*****************************/
						/* New Style 15 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 {
							border: 4px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 li {
						    padding: 18px 20px;
						    overflow: visible !important;
						    transition: all 0.4s ease 0s !important;
						    -webkit-transition: all 0.4s ease 0s !important;
						    -moz-transition: all 0.4s ease 0s !important;
						    margin-right: -5px !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 li span {
							position: relative;
							z-index: 2;

						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 li:before {
						    border-bottom: 30px solid rgba(0, 0, 0, 0);
						    border-left: 15px solid rgba(140,80,224,0.33);
						    border-top: 30px solid rgba(0, 0, 0, 0);
						    content: "";
						    position: absolute;
						    display: block;
						    right: -13px;
						    opacity: 0;
						    top: 0;
						    z-index: 2;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 li:hover:before {
						    border-bottom: 30px solid rgba(0, 0, 0, 0);
						    border-left: 15px solid  <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
						    border-top: 30px solid rgba(0, 0, 0, 0);
						    transition: all 0.3s ease 0s;
						    -webkit-transition: all 0.3s ease 0s;
						    -moz-transition: all 0.3s ease 0s;
						    content: "";
						    position: absolute;
						    display: block;
						    right: -13px;
						    opacity: 1;
						    top: 0;
						    z-index: 2;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 li.active:before {
						    border-bottom: 30px solid rgba(0, 0, 0, 0);
						    border-left: 15px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?>;
						    border-top: 30px solid rgba(0, 0, 0, 0);
						    content: "";
						    position: absolute;
						    display: block;
						    right: -13px;
						    opacity: 1;
						    top: 0;
						    z-index: 2;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 :last-child:before {
							border-bottom: 30px solid rgba(0, 0, 0, 0) !important;
						    border-left: 15px solid transparent !important;
						    border-top: 30px solid rgba(0, 0, 0, 0) !important;
						    content: "" !important;
						    position: absolute !important;
						    display: block !important;
						    left: 0 !important;
						    opacity: 1 !important;
						    top: 0 !important;
						    z-index: 2 !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 li:last-child:hover:before {
							border-bottom: 30px solid rgba(0, 0, 0, 0) !important;
						    border-left: 15px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
						    border-top: 30px solid rgba(0, 0, 0, 0) !important;
						    content: "" !important;
						    position: absolute !important;
						    display: block !important;
						    left: 0 !important;
						    opacity: 1 !important;
						    top: 0 !important;
						    z-index: 1 !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 :last-child.active:before {
							border-bottom: 30px solid rgba(0, 0, 0, 0) !important;
						    border-left: 15px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
						    border-top: 30px solid rgba(0, 0, 0, 0) !important;
						    content: "" !important;
						    position: absolute !important;
						    display: block !important;
						    left: 0 !important;
						    opacity: 1 !important;
						    top: 0 !important;
						    z-index: 1 !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 :first-child {
						   border-radius: 5px 0 0 5px;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 :last-child {
						   border-radius: 0 5px 5px 0;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 :last-child:before {
						   content: none !important;
						}
						/*****************************/
						/* New Style 16 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_31 {
							border: 0 solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_31 li {
						    padding: 18px 20px;
						    overflow: visible !important;
						    transition: all 0.3s ease 0s !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_31 li span {
							position: relative;
							z-index: 2;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_31 li span.rich_web_tab_li_span {
							display: block;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_31 li span.rich_web_tab_li_span i {
							display: block !important;
						    margin: 0 auto;
						    line-height: 30px;
						    width: 30px;
						    height: 30px;
						    text-align: center;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						    transform: rotate(43deg);
						    -webkit-transform: rotate(43deg);
						    -moz-transform: rotate(43deg);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_31 li span.rich_web_tab_li_span i:before {
							display: block;
							transform: rotate(-43deg);
							-webkit-transform: rotate(-43deg);
							-moz-transform: rotate(-43deg);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_31 li span span {
							display: block;
							padding-top: 5px;
						}
						/*****************************/
						/* New Style 17 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_32 {
							/*border: 4px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;*/
							display: inline-block !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_32 li {
						    padding: 18px 20px;
						    overflow: visible !important;
						    transition: all 0.3s ease 0s !important;
						    -webkit-transition: all 0.3s ease 0s !important;
						    -moz-transition: all 0.3s ease 0s !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_32 li.active:after {
						    content: "";
						    position: absolute;
						    left: 45%;
						    bottom: -14px;
						    border: 7px solid transparent;
						    border-top: 7px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?>;
						    z-index: 1;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_32 {
							border-radius: 0 25px 0 25px;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_32 :first-child {
						  border-radius: 0 0 0 25px;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_32 :last-child {
						  border-radius: 0 25px 0 0;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_32 li span {
							position: relative;
							z-index: 2;
						}
					<?php } else if( $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM == 'vertical' ){ ?>
						/*****************************/
						/* Bar */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_1 {
							border: 4px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_1 li {
							padding: 18px 20px;
							overflow: visible !important;
						}
						/*****************************/
						/* Icon Box */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_2 {
							border: 2px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_2 li  {
							overflow: visible !important;
							position: relative;
							padding: 1em;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_2 li.active {
							z-index: 100;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_2 li.active::after {
							position: absolute;
							top: 50%;
							left: 100%;
							margin-top: -10px;
							width: 0;
							height: 0;
							border: solid transparent;
							border-width: 10px;
							border-left-color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?>;
							content: '';
							pointer-events: none;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_2 li i::before {
							position: relative;
						    display: block;
						    left: 0%;
						}	
						/*****************************/
						/* Underline */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_3 li {
							padding: 18px 20px;
							-webkit-transition: color 0.2s;
							transition: color 0.2s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_3 li::after {
							position: absolute;
							bottom: 0;
							left: 0;
							width: 100%;
							height: 6px;
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?>;
							content: '';
							-webkit-transition: -webkit-transform 0.3s;
							transition: transform 0.3s;
							-webkit-transform: translate3d(0,150%,0);
							transform: translate3d(0,150%,0);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_3 li.active::after {
							-webkit-transform: translate3d(0,0,0);
							transform: translate3d(0,0,0);
						}
						/*****************************/
						/* Triangle and Line */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_4
						{
							margin-bottom: 3px !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_4 li {
							padding: 18px 20px;
							overflow: visible !important;
							border-right: 1px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?>;
							-webkit-transition: color 0.2s;
							transition: color 0.2s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_4 li::after {
							position: absolute;
							top: 50%;
							left: 100%;
							width: 0;
							height: 0;
							border: solid transparent;
							content: '';
							pointer-events: none;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_4 li::before {
							position: absolute;
							top: 50%;
							left: 100%;
							width: 0;
							height: 0;
							display: block !important;
							border: solid transparent;
							content: '' !important;
							pointer-events: none;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_4 li.active::after {
							margin-top: -10px;
							border-width: 10px;
							border-left-color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?>;
							z-index: 100;
						}						
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_4 li.active::before {
							margin-top: -11px;
							border-width: 11px;
							border-left-color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?>;
							z-index: 100;
						}
						/*****************************/
						/* Top Line */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_5 li {
							padding:1em;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_5 li.active {
							background: none;
							box-shadow: inset 0 3px 0 <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_5 li i::before {
							display: block;
							position: relative;
							left: 0%;
						}
						/*****************************/
						/* Falling Icon */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_6 li {
							display: inline-block;
							overflow: visible;
							padding: 1em 2em;
							-webkit-transition: color 0.3s cubic-bezier(0.7,0,0.3,1); 
							transition: color 0.3s cubic-bezier(0.7,0,0.3,1);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_6 li::before {
							position: absolute;
							display: block !important;
							bottom: 0;
							width: 100%;
							left: 0;
							height: 4px;
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?>;
							content: '';
							opacity: 0;
							-webkit-transition: -webkit-transform 0.2s ease-in;
							transition: transform 0.2s ease-in;
							-webkit-transform: scale3d(0,1,1);
							transform: scale3d(0,1,1);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_6 li.active::before {
							opacity: 1;
							-webkit-transform: scale3d(1,1,1);
							transform: scale3d(1,1,1);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_6 li i::before {
							display: block;
							position: relative;
							left: 0%;
							opacity: 0;
							-webkit-transition: -webkit-transform 0.2s, opacity 0.2s;
							transition: transform 0.2s, opacity 0.2s;
							-webkit-transform: translate3d(0,-100px,0);
							transform: translate3d(0,-100px,0);
							pointer-events: none;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_6 li.active i::before {
							opacity: 1;
							-webkit-transform: translate3d(0,0,0);
							transform: translate3d(0,0,0);
						}
						@media screen and (max-width: 570px) {
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> li {
								/*background: none !important;*/
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_6 li i::before {
								opacity: 1;
								-webkit-transform: translate3d(0,0,0);
								transform: translate3d(0,0,0);
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> {
								width: 100% !important;
								display: block !important;
								padding: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul {
								padding: 0 !important;
								width: 100% !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> > .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> > li.active > .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> > div {
								padding: 0 5px !important;
								<?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgT=='color'){ ?>
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?> !important;
								<?php }else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgT=='transparent'){ ?>
									background: transparent !important;
								<?php }else{ ?>
									background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?> !important;
								    background: -webkit-linear-gradient(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>) !important;
								    background: -o-linear-gradient(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>) !important;
								    background: -moz-linear-gradient(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>) !important;
								    background: linear-gradient(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>) !important;
								<?php }?>
							}
							/*--------- New Style 1 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
								transition: all 500ms ease 0s !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li:hover span.rich_web_tab_li_span:before {
							    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li:hover span.rich_web_tab_li_span:before {
							    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li:hover span.rich_web_tab_li_span:after {
							    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li.active span.rich_web_tab_li_span:before {
							    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li.active span.rich_web_tab_li_span:before {
							    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li.active span.rich_web_tab_li_span:after {
							    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 1 ---------*/

							/*--------- New Style 2 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li:hover span.rich_web_tab_li_span:before {
							    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li:hover span.rich_web_tab_li_span:before {
							    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li:hover span.rich_web_tab_li_span:after {
							    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li.active span.rich_web_tab_li_span:before {
							    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li.active span.rich_web_tab_li_span:before {
							    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li.active span.rich_web_tab_li_span:after {
							    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 2 ---------*/

							/*--------- New Style 3 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_18 {
								display: block !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_18 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_18 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_18 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_18 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 3 ---------*/

							/*--------- New Style 4 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_19 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_19 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_19 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_19 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 4 ---------*/

							/*--------- New Style 5 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_20 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_20 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_20 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_20 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 5 ---------*/

							/*--------- New Style 6 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_21 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_21 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_21 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_21 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 6 ---------*/

							/*--------- New Style 7 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_22 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_22 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_22 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_22 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_22 li:hover:after{
								background: none !important;
							}
							/*--------- End New Style 7 ---------*/

							/*--------- New Style 8 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_23 li:after {
								height: 0 !important;
								border-radius: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_23 li.active:after {
								height: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_23 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
								border-radius: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_23 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_23 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_23 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 8 ---------*/

							/*--------- New Style 9 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
								border-radius: 0 !important;
								margin-bottom: 2px !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 9 ---------*/

							/*--------- New Style 10 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_25 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
								border-radius: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_25 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_25 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_25 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 10 ---------*/

							/*--------- New Style 11 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_26 {
								display: block !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_26 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
								border-radius: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_26:before {
								content: none !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_26:after {
								content: none !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_26 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_26 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_26 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 11 ---------*/


							/*--------- New Style 12 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_27 {
								background: none !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_27 li {
								left: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_27 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
								border-radius: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_27 {
								border: none !important;
								height: 100% !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_27 div.rich_web_tab_ul_div {
								top: 0 !important;
								height: 100% !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_27 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_27 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_27 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 12 ---------*/

							/*--------- New Style 13 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_28 li {
								transform: none !important;
								-webkit-transform: none !important;
								-moz-transform: none !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?>>li:hover {
								margin-right: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?>>li.active {
								margin-right: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_28 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
								border-radius: 0 !important;
								transform: rotateX(360deg) rotateY(0deg) rotateZ(0deg) skewX(330deg);
								-webkit-transform: rotateX(360deg) rotateY(0deg) rotateZ(0deg) skewX(330deg);
								-moz-transform: rotateX(360deg) rotateY(0deg) rotateZ(0deg) skewX(330deg);
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_28 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_28 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_28 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 13 ---------*/

							/*--------- New Style 14 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_29 {
								border-radius: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?> {
								padding-left: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?>>li {
								margin-right: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 li:after {
								content: none !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 14 ---------*/

							/*--------- New Style 14 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?> {
								padding-left: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?>>li {
								margin-right: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 li:after {
								content: none !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 14 ---------*/

							/*--------- New Style 15 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?> {
								padding-left: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
								border-radius: 0 !important;
							}
							
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_30 li:last-child:before {
								padding-left: 10000px !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_30 li:first-child:before {
								padding-left: 10000px !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_30 li:hover:before {
								padding-left: 10000px !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_30 li:last-child:hover:before {
								margin-left: 10000px !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?> li.active div.Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?>:before {
								content: none !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> li.active div.Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?>:before {
								content: none !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30:last-child.active:before {
								content: none !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?>>li {
								margin-right: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 li:after {
								content: none !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 15 ---------*/

							/*--------- New Style 16 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_31 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
								border-radius: 0 !important;
								padding: 10px 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_31 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_31 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_31 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 16 ---------*/

							/*--------- New Style 17 ---------*/
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_32 {
								border-radius: 0 !important;
								display: block !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_32 li.active:after {
								content: none !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_32 li .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
								border-radius: 0 !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_32 li.active .rich_web_tab_li_span {
								background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_32 li span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							}
							.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_32 li.active span.rich_web_tab_li_span {
								color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							}
							/*--------- End New Style 17 ---------*/
						}
						/*****************************/
						/* Moving Line */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_7 li::before {
							position: absolute;
							display: block !important;
							top: 0;
							right: 0;
							width: 4px !important;
							height: 100%;
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?>;
							content: '';
							-webkit-transition: -webkit-transform 0.3s !important;
							transition: transform 0.3s !important;
							-webkit-transform: translate3d(0,101%,0);
								transform: translate3d(0,101%,0);
						}
	                	.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_7 li.active::before {
							-webkit-transform: translate3d(0%,0,0);
							transform: translate3d(0%,0,0);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_7 li.active{
							-webkit-transform: translate3d(-4px,0,0);
							transform: translate3d(-4px,0,0);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_7 li {
							padding: 1em 0.5em;
							margin: 2px 5px 0px 0px !important;
						}						
						/*****************************/
						/* Line */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_8 li {
							padding: 0.7em 0.4em;
							box-shadow: inset -2px 0 <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							-webkit-box-shadow: inset -2px 0 <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
							text-align: left;
							letter-spacing: 1px;
							-webkit-transition: color 0.3s, box-shadow 0.3s !important;
							transition: color 0.3s, box-shadow 0.3s !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_8 li:hover, .Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_8 li:focus {
							box-shadow: inset -2px 0 <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC;?> !important;
							-webkit-box-shadow: inset -2px 0 <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC;?> !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_8 li.active {
							box-shadow: inset -2px 0 <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
							-webkit-box-shadow: inset -2px 0 <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?> !important;
						}				
						/*****************************/
						/* Circle */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_9 li::before {
							position: absolute;
							display: block !important;
							top: 0%;
							left: 0%;
							width: 100%;
							height: 100%;
							border: 1px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?>;
							border-radius: 50%;
							content: '';
							opacity: 0;
							-webkit-transition: -webkit-transform 0.2s, opacity 0.2s;
							transition: transform 0.2s, opacity 0.2s;
							-webkit-transition-timing-function: cubic-bezier(0.7,0,0.3,1);
							transition-timing-function: cubic-bezier(0.7,0,0.3,1);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_9 li.active::before {
							opacity: 1;
							-webkit-transform: scale3d(0.9,0.9,0.9);
							transform: scale3d(0.9,0.9,0.9);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_9 li {
							overflow: visible;
							-webkit-transition: color 0.3s cubic-bezier(0.7,0,0.3,1); 
							transition: color 0.3s cubic-bezier(0.7,0,0.3,1);
							padding: 1.5em; 
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_9 li i::before {
							display: block;
							position: relative;
							left: 0%;
							-webkit-transition: -webkit-transform 0.3s cubic-bezier(0.7,0,0.3,1);
							transition: transform 0.3s cubic-bezier(0.7,0,0.3,1);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_9 li i span {
							-webkit-transition: -webkit-transform 0.3s cubic-bezier(0.7,0,0.3,1);
							transition: transform 0.3s cubic-bezier(0.7,0,0.3,1);
							display: block;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_9 li.active i span {
							-webkit-transform: translate3d(0,2px,0);
							transform: translate3d(0,2px,0);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_9 li i::before {
							display: block;
							margin: 0;
							pointer-events: none;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_9 li.active i::before {
							-webkit-transform: translate3d(0px,-2px,0);
							transform: translate3d(0px,-2px,0);
						}
						/*****************************/
						/* Line Box */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_11 li {
							-webkit-flex: none;
							flex: none;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_11 li {
							padding: 1em;
							z-index: 10;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_11 li i::after {
							position: absolute;
							top: 0;
							left: 0;
							z-index: -1;
							width: 100%;
							height: 100%;
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?>;
							content: '';
							-webkit-transition: background 0.8s, -webkit-transform 0.8s !important;
							transition: background 0.8s, transform 0.8s !important;
							-webkit-transition-timing-function: ease, cubic-bezier(0.7,0,0.3,1);
							transition-timing-function: ease, cubic-bezier(0.7,0,0.3,1);
							-webkit-transform: translate3d(100%,0,0) translate3d(-2px,0,0);
							transform: translate3d(100%,0,0) translate3d(-2px,0,0);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_11 li:hover i::after {
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_11 li.active i::after {
							-webkit-transform: translate3d(0,0,0);
							transform: translate3d(0,0,0);
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?>;
						}
						/*****************************/
						/* Flip */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_12 li {
							padding: 1em;							
							z-index: 10;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_12 li::after {
							position: absolute;
							top: 0;
							left: 0;
							z-index: -1;
							width: 100%;
							height: 100%;
							background-color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?>;
							content: '';
							-webkit-transition: -webkit-transform 0.9s, background-color 0.3s !important;
							transition: transform 0.9s, background-color 0.3s !important;
							-webkit-transform: perspective(900px) rotate3d(0,-1,0,90deg);
							transform: perspective(900px) rotate3d(0,-1,0,90deg);
							-webkit-transform-origin: 100% 0%;
							transform-origin: 100% 0%;
							-webkit-perspective-origin: 100% 0%;
							perspective-origin: 100% 0%;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_12 li.active{
							background-color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_12 li.active::after {
							background-color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?>;
							-webkit-transform: perspective(900px) rotate3d(0,-1,0,0deg);
							transform: perspective(900px) rotate3d(0,-1,0,0deg);
						}
						/*****************************/
						/* Circle Fill */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_13 li {
							overflow: hidden;
							background: none !important;
							z-index: 10;
							padding: 0px !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_13 li i {
							padding: 1.5em;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_13 li::after {
							position: absolute;
							top: 0%;
							z-index: -1;
							left: 0%;
							width: 99%;
							height: 99%;
							border-radius: 50%;
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?>;
							content: '';
							-webkit-transition: -webkit-transform 0.8s !important;
							transition: transform 0.8s !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_13 li:hover::after {
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_13 li.active::after {
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?>;
							-webkit-transform: scale3d(2.5,2.5,1);
							transform: scale3d(2.5,2.5,1);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_13 li span {
							display: block !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_13 li i::before {
							display: block;
							margin: 0;
							pointer-events: none;
							text-align: center;
						}	
						/*****************************/
						/* Fill Up */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_14 li, .Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_14 li:hover {
							z-index: 10;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_14 li i {
							padding: 1em 1em;
							-webkit-backface-visibility: hidden;
							backface-visibility: hidden;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_14 li i.active {
							z-index: 100;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_14 li i::after {
							position: absolute;
							top: 0;
							left: 0;
							z-index: -1;
							width: 100%;
							width: 100%;
							height: 100%;
							/*height: calc(100% + 1px);*/
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?>;
							content: '';
							-webkit-transition: -webkit-transform 0.8s !important;
							transition: transform 0.8s !important;
							-webkit-transform: translate3d(-100%,0,0);
							transform: translate3d(-100%,0,0);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_14 li.active i::after {
							-webkit-transform: translate3d(0,0,0);
							transform: translate3d(0,0,0);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_14 li i span, .Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_14 li i::before {
							-webkit-transition: -webkit-transform 0.5s;
							transition: transform 0.5s;
							-webkit-transform: translate3d(0,5px,0);
							transform: translate3d(0,5px,0);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_14 li i span {
							display: block;							
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_14 li i::before {
							display: block;
							margin: 0;
							position: relative;
							left: 0%;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_14 li.active span {
							-webkit-transform: translate3d(0,-5px,0);
							transform: translate3d(0,-5px,0);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_14 li.active i::before {
							-webkit-transform: translate3d(0,-10px,0);
							transform: translate3d(0,-10px,0);
						}
						/*****************************/
						/* Trapezoid */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_15 li, .Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_15 li:hover, .Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_15 li.active {
							background: none !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_15 li {
							-webkit-backface-visibility: hidden;
							backface-visibility: hidden;
							z-index: 10;
							margin-right: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB-9;?>px !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_15 li i {
							padding: 0.5em 1em;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_15 li i::after {
							position: absolute;
							top: 0;
							right: 0;
							bottom: 0;
							left: 0;
							z-index: -1;
							outline: 1px solid transparent;
							border-radius: 0px 0px 10px 10px;
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?>;
							box-shadow: inset 0 -3px 3px rgba(0,0,0,0.05);
							content: '';
							-webkit-transform: perspective(5px) rotateX(0.93deg) translateZ(-1px);
							transform: perspective(5px) rotateX(0.93deg) translateZ(-1px);
							-webkit-transform-origin: 0 0;
							transform-origin: 0 0;
							-webkit-backface-visibility: hidden;
							backface-visibility: hidden;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_15 li:hover i::after{
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_15 li.active i::after{
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?>;
							box-shadow: none;
						}
						/*****************************/
						/* New Style 1 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 {
							border: 4px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li span.rich_web_tab_li_span {
							position: relative;
							display: inline-block;
							height: 100%;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li span.rich_web_tab_li_span:after {
							content: "";
						    width: 100%;
						    height: 1px;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?>;
						    display: block;
						    transform: scale(0);
						    -webkit-transform: scale(0);
						    -moz-transform: scale(0);
						    transition: all 700ms ease 0s;
						    -webkit-transition: all 700ms ease 0s;
						    -moz-transition: all 700ms ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li span.rich_web_tab_li_span:before {
							content: "";
						    width: 7px;
						    height: 7px;
						    display: inline;
						    position: absolute;
						    left: 50%;
						    bottom: -3px;
						    z-index: 1;
						    border-radius: 50%;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?>;
						    transform: scale(0);
						    -webkit-transform: scale(0);
						    -moz-transform: scale(0);
						    transition: all 700ms ease 0s;
						    -webkit-transition: all 700ms ease 0s;
						    -moz-transition: all 700ms ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li:hover span.rich_web_tab_li_span:before {
							content: "";
						    width: 7px;
						    height: 7px;
						    display: inline;
						    position: absolute;
						    left: 50%;
						    bottom: -3px;
						    z-index: 1;
						    border-radius: 50%;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC;?>;
						    transform: scale(1);
						    -webkit-transform: scale(1);
						    -moz-transform: scale(1);
						    transition: all 700ms ease 0s;
						    -webkit-transition: all 700ms ease 0s;
						    -moz-transition: all 700ms ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li.active span.rich_web_tab_li_span:before {
							content: "";
						    width: 7px;
						    height: 7px;
						    display: inline;
						    position: absolute;
						    left: 50%;
						    bottom: -3px;
						    z-index: 1;
						    border-radius: 50%;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?>;
							transition: all 700ms ease 0s;
							-webkit-transition: all 700ms ease 0s;
							-moz-transition: all 700ms ease 0s;
						    transform: scale(1);
						    -webkit-transform: scale(1);
						    -moz-transform: scale(1);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li:hover span.rich_web_tab_li_span:after {
							content: "";
						    width: 100%;
						    display: block;
						    transform: scale(1);
						    -webkit-transform: scale(1);
						    -moz-transform: scale(1);
						    height: 1px;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li.active span.rich_web_tab_li_span:after {
							content: "";
						    width: 100%;
						    display: block;
						    transform: scale(1);
						    -webkit-transform: scale(1);
						    -moz-transform: scale(1);
						    height: 1px;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_16 li {
							padding: 18px 20px;
							overflow: visible !important;
						}
						/*****************************/
						/* New Style 2 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 {
							border: 4px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li {
							transition: all 500ms ease 0s;
							-webkit-transition: all 500ms ease 0s;
							-moz-transition: all 500ms ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li span.rich_web_tab_li_span {
							position: relative;
							display: inline-block;
							height: 100%;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li span.rich_web_tab_li_span:after {
							content: "";
						    width: 0;
						    margin: 0;
						    height: 1px;
						    background: #fff;
						    display: block;
						    transition: all 0.2s ease 0s;
						    -webkit-transition: all 0.2s ease 0s;
						    -moz-transition: all 0.2s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li span.rich_web_tab_li_span:before {
							content: "";
						    width: 0px;
						    height: 0px;
						    display: block;
						    position: absolute;
						    left: 10%;
						    bottom: -3px;
						    z-index: 1;
						    border-radius: 50%;
						    background: #4cc985;
						    transition: all 0.1s !important;
						    -webkit-transition: all 0.1s !important;
						    -moz-transition: all 0.1s !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li:hover span.rich_web_tab_li_span:before {
							content: "";
						    width: 7px;
						    height: 7px;
						    display: block;
						    position: absolute;
						    left: 10%;
						    bottom: -3px;
						    z-index: 1;
						    border-radius: 50%;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC;?>;
						    transition: all 700ms ease 0s;
						    -webkit-transition: all 700ms ease 0s;
						    -moz-transition: all 700ms ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li:hover span.rich_web_tab_li_span:after {
							content: "";
						    width: 50%;
						    margin: 0 0 0 10%;
						    display: block;
						    height: 1px;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC;?>;
						    transition: all 0.2s ease 0s;
						    -webkit-transition: all 0.2s ease 0s;
						    -moz-transition: all 0.2s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li.active span.rich_web_tab_li_span:before {
							content: "";
						    width: 7px;
						    height: 7px;
						    display: block;
						    position: absolute;
						    left: 10%;
						    bottom: -3px;
						    z-index: 1;
						    border-radius: 50%;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?>;
							transition: all 700ms ease 0s;
							-webkit-transition: all 700ms ease 0s;
							-moz-transition: all 700ms ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li.active span.rich_web_tab_li_span:after {
							content: "";
						    width: 50%;
						    margin: 0 0 0 10%;
						    display: block;
						    height: 1px;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?>;
						    transition: all 0.2s ease 0s;
						    -webkit-transition: all 0.2s ease 0s;
						    -moz-transition: all 0.2s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_17 li {
							padding: 18px 20px;
							overflow: visible !important;
						}
						/*****************************/
						/* New Style 3 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_18 {
							border: 4px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
							border-radius: 0 !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_18 li {
						    padding: 18px 20px;
						    overflow: visible !important;
						    border-radius: 40px !important;
						}
						/*****************************/
						/* New Style 4 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_19 {
							border: none !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_19 li {
						    padding: 18px 20px;
						    overflow: visible !important;
						    transition: all 0.1s ease 0s;
						    -webkit-transition: all 0.1s ease 0s;
						    -moz-transition: all 0.1s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_19 li.active {
						    padding: 16px 20px;
						    overflow: visible !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_19 li.active {
							border-top: 2px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						    border-bottom: 2px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						/*****************************/
						/* New Style 5 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_20 {
							border: 4px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_20 li {
						    padding: 18px 20px;
						    overflow: visible !important;
						    transition: all 0.5s ease 0s;
						    -webkit-transition: all 0.5s ease 0s;
						    -moz-transition: all 0.5s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_20 li span {
							position: relative;
							z-index: 2;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_20 li:after {
							content: "";
						    width: 0;
						    display: block;
						    height: 100%;
						    position: absolute;
						    top: 0;
						    left: 0;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
						    transition: all 0.5s ease 0s;
						    -webkit-transition: all 0.5s ease 0s;
						    -moz-transition: all 0.5s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_20 li.active {
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_20 li.active:after {
							opacity: 0;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_20 li:hover:after {
						    width: 100%;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
						}
						/*****************************/
						/* New Style 6 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_21 {
							border: 4px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_21 li {
						    padding: 18px 20px;
						    overflow: visible !important;
						    transition: all 0.5s ease 0s;
						    -webkit-transition: all 0.5s ease 0s;
						    -moz-transition: all 0.5s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_21 li span {
							position: relative;
							z-index: 2;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_21 li:after {
							content: "";
						    width: 0;
						    display: block;
						    height: 0;
						    position: absolute;
						    top: 0;
						    left: 0;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
						    transition: all 0.5s ease 0s;
						    -webkit-transition: all 0.5s ease 0s;
						    -moz-transition: all 0.5s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_21 li.active {
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_21 li.active:after {
							opacity: 0;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_21 li:hover:after {
						    width: 100%;
						    height: 100%;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
						}
						/*****************************/
						/* New Style 7 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_22 {
							border: 4px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_22 li {
						    padding: 18px 20px;
						    overflow: visible !important;
						    transition: all 0.5s ease 0s;
						    -webkit-transition: all 0.5s ease 0s;
						    -moz-transition: all 0.5s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_22 li span {
							position: relative;
							z-index: 2;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_22 li:after {
							content: "";
						    width: 100%;
						    display: block;
						    height: 100%;
						    position: absolute;
						    top: 0;
						    left: 0;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
						    opacity: 0;
						    transform: scale(0,0);
						    -webkit-transform: scale(0,0);
						    -moz-transform: scale(0,0);
						    transition: all 0.5s ease 0s;
						    -webkit-transition: all 0.5s ease 0s;
						    -moz-transition: all 0.5s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_22 li:hover:after {
						    width: 100%;
						    opacity: 1;
						    transform: scale(1,1);
						    -webkit-transform: scale(1,1);
						    -moz-transform: scale(1,1);
						    height: 100%;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
						}
						/*****************************/
						/* New Style 8 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_23 {
							border: 4px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_23 li {
						    padding: 18px 20px;
						    
						    transition: all 0.2s ease 0s;
						    -webkit-transition: all 0.2s ease 0s;
						    -moz-transition: all 0.2s ease 0s;
						    overflow: visible !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_23 li:hover {
							padding: 22px 20px 22px 20px;
							z-index: 1;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_23 li.active {
							padding: 22px 20px 22px 20px;
							z-index: 1;
						}
						/*****************************/
						/* New Style 9 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 {
							border: 0 solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 li {
						    padding: 18px 20px;
						    overflow: visible !important;
						    transition: all 0.4s ease 0s;
						    -webkit-transition: all 0.4s ease 0s;
						    -moz-transition: all 0.4s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 li span {
							position: relative;
							z-index: 2;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 li:before {
							content: "";
						    width: 100%;
						    display: block;
						    height: 3px;
						    position: absolute;
						    top: 100%;
						    left: 0;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						    transition: all 0.4s ease 0s;
						    -webkit-transition: all 0.4s ease 0s;
						    -moz-transition: all 0.4s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 li:after {
							content: "";
						    width: 100%;
						    display: block;
						    height: 0;
						    position: absolute;
						    top: 100%;
						    left: 0;
						    opacity: 0;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
						    transition: all 0.4s ease 0s;
						    -webkit-transition: all 0.4s ease 0s;
						    -moz-transition: all 0.4s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 li:hover {
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 li:hover:before {
							top: 0;
							z-index: 1;
							transition: all 0.4s ease 0s;
							-webkit-transition: all 0.4s ease 0s;
							-moz-transition: all 0.4s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 li:hover:after {
						    opacity: 1;
						    top: 0;
						    height: 100%;
						    transition: all 0.4s ease 0s;
						    -webkit-transition: all 0.4s ease 0s;
						    -moz-transition: all 0.4s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 li.active:before {
							top: 0;
							z-index: 1;
							transition: all 0.4s ease 0s;
							-webkit-transition: all 0.4s ease 0s;
							-moz-transition: all 0.4s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_24 li.active:after {
						    opacity: 1;
						    top: 0;
						    height: 100%;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?> !important;
						}
						/*****************************/
						/* New Style 10 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_25 {
							border: 0 solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_25 li {
						    padding: 18px 20px;
						    overflow: visible !important;
						    transition: all 0.4s ease 0s;
						    -webkit-transition: all 0.4s ease 0s;
						    -moz-transition: all 0.4s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_25 li span {
							position: relative;
							z-index: 2;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_25 li:before {
							content: "";
						    width: 100%;
						    display: block;
						    height: 3px;
						    position: absolute;
						    top: 0;
						    left: 0;
						    transform: scale(0);
						    -webkit-transform: scale(0);
						    -moz-transform: scale(0);
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						    opacity: 0;
						    transition: all 0.4s ease 0s;
						    -webkit-transition: all 0.4s ease 0s;
						    -moz-transition: all 0.4s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_25 li:hover:before {
							content: "";
						    width: 100%;
						    display: block;
						    height: 3px;
						    position: absolute;
						    top: 0;
						    transform: scale(1);
						    -webkit-transform: scale(1);
						    -moz-transform: scale(1);
						    left: 0;
							z-index: 1;
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
							opacity: 1;
							transition: all 0.4s ease 0s;
							-webkit-transition: all 0.4s ease 0s;
							-moz-transition: all 0.4s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_25 li.active:before {
							content: "";
						    width: 100%;
						    display: block;
						    height: 3px;
						    position: absolute;
						    top: 0;
						    transform: scale(1);
						    -webkit-transform: scale(1);
						    -moz-transform: scale(1);
						    left: 0;
							z-index: 1;
							background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
							opacity: 1;
							transition: all 0.4s ease 0s;
							-webkit-transition: all 0.4s ease 0s;
							-moz-transition: all 0.4s ease 0s;
						}
						/*****************************/
						/* New Style 11 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_26 {
							border: 0 solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
							display: inline-block !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_26 li {
							border: 2px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
						    padding: 18px 20px;
						    overflow: visible !important;
						    transition: all 0.4s ease 0s;
						    -webkit-transition: all 0.4s ease 0s;
						    -moz-transition: all 0.4s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_26 li span {
							position: relative;
							z-index: 2;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_26 div.rich_web_tab_ul_line {
							opacity: 0;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_26 {
							position: relative;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_26 li {
							margin-right: 5px; 
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_26:before {
							content: "";
						    width: 2px;
						    display: block;
						    height: 100%;
						    position: absolute;
						    top: 0;
						    left: 50%;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						    transition: all 0.5s ease 0s;
						    -webkit-transition: all 0.5s ease 0s;
						    -moz-transition: all 0.5s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_26 li.active:after {
							opacity: 0;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_26 li:after {
							content: "";
						    width: 100%;
						    display: block;
						    height: 0;
						    position: absolute;
						    top: 0;
						    left: 0;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
						    transition: all 0.5s ease 0s;
						    -webkit-transition: all 0.5s ease 0s;
						    -moz-transition: all 0.5s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_26 li:hover:after {
						    height: 100%;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
						}
						/*****************************/
						/* New Style 12 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_27 {
							border: 4px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_27 li {
						    padding: 18px 20px;
						    overflow: visible !important;
						    transition: all 0.4s ease 0s;
						    -webkit-transition: all 0.4s ease 0s;
						    -moz-transition: all 0.4s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_27 li span {
							position: relative;
							z-index: 2;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_27 li {
							position: relative;
							padding: 18px 20px;
						}
						/*****************************/
						/* New Style 13 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_28 {
							border: 4px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_28 li {
						    padding: 18px 20px;
						    overflow: visible !important;
						    transition: all 0.4s ease 0s;
						    -webkit-transition: all 0.4s ease 0s;
						    -moz-transition: all 0.4s ease 0s;
						    transform:rotateX(0deg) rotateY(0deg) rotateZ(0deg) skewX(340deg);
						    -webkit-transform:rotateX(0deg) rotateY(0deg) rotateZ(0deg) skewX(340deg);
						    -moz-transform:rotateX(0deg) rotateY(0deg) rotateZ(0deg) skewX(340deg);
						    margin-left: 0 !important;
						}
						
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_28 li.active {
						    transform:rotateX(360deg) rotateY(0deg) rotateZ(0deg) skewX(340deg);
						    -webkit-transform:rotateX(360deg) rotateY(0deg) rotateZ(0deg) skewX(340deg);
						    -moz-transform:rotateX(360deg) rotateY(0deg) rotateZ(0deg) skewX(340deg);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_28 li span {
							position: relative;
							z-index: 2;
						}
						/*****************************/
						/* New Style 14 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 {
							border: 0 solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 li {
						    padding: 18px 20px;
						    overflow: visible !important;
						    transition: all 0.4s ease 0s;
						    -webkit-transition: all 0.4s ease 0s;
						    -moz-transition: all 0.4s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_29 {
							position: relative;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 li:after {
							content: "";
						    width: 100%;
						    display: block;
						    height: 2px;
						    position: absolute;
						    bottom: -7px;
						    left: 0;
						    background: #ea3c6e;
						    transform:rotateX(360deg) rotateY(0deg) rotateZ(2deg) skewX(353deg);
						    -webkit-transform:rotateX(360deg) rotateY(0deg) rotateZ(2deg) skewX(353deg);
						    -moz-transform:rotateX(360deg) rotateY(0deg) rotateZ(2deg) skewX(353deg);
						    transition: all 0.5s ease 0s;
						    -webkit-transition: all 0.5s ease 0s;
						    -moz-transition: all 0.5s ease 0s;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 :last-child:after {
						   content: none !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_29 li span {
							position: relative;
							z-index: 2;
						}
						/*****************************/
						/* New Style 15 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 {
							border: 4px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 li {
						    padding: 18px 20px;
						    overflow: visible !important;
						    transition: all 0.3s ease 0s !important;
						    -webkit-transition: all 0.3s ease 0s !important;
						    -moz-transition: all 0.3s ease 0s !important;
						    border-radius: 5px 0 0 5px !important;
						    margin-right: 17px !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 li span {
							position: relative;
							z-index: 2;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 li:before {
						    border-bottom: 30px solid rgba(0, 0, 0, 0);
						    border-left: 15px solid rgba(140,80,224,0.33);
						    border-top: 30px solid rgba(0, 0, 0, 0);
						    content: "";
						    position: absolute;
						    display: block;
						    right: -15px;
						    opacity: 0;
						    top: 0;
						    z-index: 2;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 li:hover:before {
						    border-bottom: 30px solid rgba(0, 0, 0, 0);
						    border-left: 15px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
						    border-top: 30px solid rgba(0, 0, 0, 0);
						    transition: all 0.3s ease 0s;
						    -webkit-transition: all 0.3s ease 0s;
						    -moz-transition: all 0.3s ease 0s;
						    content: "";
						    position: absolute;
						    display: block;
						    right: -15px;
						    opacity: 1;
						    top: 49%;
						    transform: translate(0, -50%);
						    -webkit-transform: translate(0, -50%);
						    -moz-transform: translate(0, -50%);
						    z-index: 2;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_30 li.active:before {
						    border-bottom: calc(20px + <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_FS;?>px - 3px) solid rgba(0, 0, 0, 0);
						    border-left: 15px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?>;
						    border-top: calc(20px + <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_FS;?>px - 3px) solid rgba(0, 0, 0, 0);
						    content: "";
						    position: absolute;
						    display: block;
						    right: -15px;
						    opacity: 1;
						    top: 49%;
						    transform: translate(0, -50%);
						    -webkit-transform: translate(0, -50%);
						    -moz-transform: translate(0, -50%);
						    z-index: 2;
						}
						/*****************************/
						/* New Style 16 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_31 {
							border: 0 solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_31 li {
						    padding: 18px 20px;
						    overflow: visible !important;
						    transition: all 0.3s ease 0s !important;
						    -webkit-transition: all 0.3s ease 0s !important;
						    -moz-transition: all 0.3s ease 0s !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_31 li span {
							position: relative;
							z-index: 2;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_31 li span.rich_web_tab_li_span {
							display: block;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_31 li span.rich_web_tab_li_span i {
							display: block !important;
						    margin: 0 auto;
						    line-height: 30px;
						    width: 30px;
						    height: 30px;
						    text-align: center;
						    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						    transform: rotate(43deg);
						    -webkit-transform: rotate(43deg);
						    -moz-transform: rotate(43deg);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_31 li span.rich_web_tab_li_span i:before {
							display: block;
							transform: rotate(-43deg);
							-webkit-transform: rotate(-43deg);
							-moz-transform: rotate(-43deg);
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_31 li span span {
							display: block;
							padding-top: 5px;
						}
						/*****************************/
						/* New Style 17 */
						/*****************************/
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_32 {
							border: 4px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_32 li:first-child {
							border-radius: 0 0 0 25px;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_32 li {
						    padding: 18px 20px;
						    overflow: visible !important;
						    transition: all 0.3s ease 0s !important;
						    -webkit-transition: all 0.3s ease 0s !important;
						    -moz-transition: all 0.3s ease 0s !important;
						    border-radius: 0 0 0 25px !important;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> ul.Rich_Web_Tabs_tabs_32 {
							border-radius: 0 0 0 25px;
						}
						.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_32 li span {
							position: relative;
							z-index: 2;
						}
					<?php }?>	

				</style>
				
				<div class="Rich_Web_Tabs_Tab Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?>">
		            <!-- - - - - - Tab navigation - - - - - - -->
		            <ul class="<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S;?> Rich_Web_Tabs_tt_tabs Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?>">
		            <?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_tabs_26') { ?>
		            	<div class="rich_web_tab_ul_line"></div>
		            <?php } ?>
		            <?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_tabs_27') { ?>
		           	 	<div class="rich_web_tab_ul_div"></div>
		           	<?php } ?>
		            	<?php for( $i = 0; $i < count($Rich_Web_Tabs_Fields); $i++ ){ ?>
		                	<li class="<?php if($i==0){echo 'active';}?>">
		                		<span class="rich_web_tab_li_span">
			                		<i class='rich_web rich_web-<?php echo $Rich_Web_Tabs_Fields[$i]->Tabs_Subicon;?>'>
			                		<?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S != 'Rich_Web_Tabs_tabs_31') { ?>
			                			<span><?php echo html_entity_decode($Rich_Web_Tabs_Fields[$i]->Tabs_Subtitle);?></span>
			                		<?php } ?>
			                		</i>
			                		<?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_tabs_31') { ?>
			                			<span><?php echo html_entity_decode($Rich_Web_Tabs_Fields[$i]->Tabs_Subtitle);?></span>
			                		<?php } ?>
		                		</span>
		                	</li>
		            	<?php }?>
		            </ul>
		            <!-- - - - - Tab Content - - - - - -->
		            <div class="Rich_Web_Tabs_tt_container Rich_Web_Tabs_tt_container<?php echo $Rich_Web_Tabs;?>">
		            	<?php for( $i = 0; $i < count($Rich_Web_Tabs_Fields); $i++ ){ ?>
		                	<div class="Rich_Web_Tabs_tt_tab Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?> <?php if($i==0){echo 'active';}?>"><?php echo do_shortcode(html_entity_decode($Rich_Web_Tabs_Fields[$i]->Tabs_Subcontent));?></div>
		            	<?php }?>
		            </div><!-- .container<?php echo $Rich_Web_Tabs;?> -->
			    </div><!-- #myTab -->
			    <script type="text/javascript">
			    	var arr = ["safa", "sodf"];
			    	var startVal = arr.length;
			    	arr[11] = "osdfc";
			    	

				    var el_height_32 = jQuery('.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_32').height();
				    if(el_height_32 > 65) {
				    	jQuery('.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_32 :first-child').css({"border-radius" : "25px 0 0 0"});
				    	jQuery('.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_32 :last-child').css({"border-radius" : "0 0 25px 0"});
				    }
				    var el_height_18 = jQuery('.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_18').height();
				     if(el_height_18 > 65) {
				     	jQuery('.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_18').css({"border-radius" : "25px"});
				     }
				      var el_height_26 = jQuery('.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_26').height();
				      if(el_height_26 < 65) {
				     	jQuery('.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_26 div.rich_web_tab_ul_line').css({"position" : "absolute", "border" : "1px solid #000", "border-left" : "0", "border-right" : "0", "width" : "100%", "transform" : "translateY(-50%)", "top" : "50%", "border-top" : "none"});
				     }
				     if(el_height_26 > 65) {
				     	jQuery('.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tabs_26 div.rich_web_tab_ul_line').css({"position" : "absolute", "border" : "1px solid #000", "border-left" : "none", "border-right" : "none", "height" : "50%", "width" : "100%", "transform" : "translateY(-50%)", "top" : "50%"});
				     }
			    	jQuery(document).ready(function(){
					    jQuery('.Rich_Web_Tabs_Tab_<?php echo $Rich_Web_Tabs;?>').turbotabs<?php echo $Rich_Web_Tabs;?>({
					    	mode: '<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>',
					        animation : '<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_CA;?>',
				            width: '<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_W;?>%',
					    }); 
					});
			    </script>
			<?php } 
			if($Rich_Web_Tabs_Themes[0]->Rich_Web_Tabs_T_Ty=='Rich_Tabs_2'){
				$Rich_Web_Tabs_Themes_2  = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name7 WHERE Tabs_T_ID = %s",$Rich_Web_Tabs_Theme[0]->Tabs_T_ID));
			?>
			<style>
				.Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?> {
					height:0;
					overflow:hidden;
					width: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_W;?>%;
					<?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_Al == 'center') { ?>
					margin: 20px auto 30px auto;
					<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_Al == 'right') { ?>
					margin: 20px calc(100% - <?=$Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_W;?>%);
					margin: 20px -webkit-calc(100% - <?=$Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_W;?>%);
					<?php } ?>
					position: relative;
					z-index: 1;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?>  {
					position: relative;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
					<?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_02 == 'style_bg_1') { ?>
						background: linear-gradient(to right, <?=$Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC?> 50%, <?=$Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?> 50%);
						background-size: 200% 100%;
						background-position:left bottom;
						transition:all 1s ease;
						 -webkit-transition:all 1s ease;
						 -moz-transition:all 1s ease;
					<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_02 == 'style_bg_2') { ?> 
						background: linear-gradient(to left, <?=$Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC?> 50%, <?=$Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?> 50%);
						background-size: 200% 100%;
						background-position:right bottom;
						transition:all 1s ease;
						 -webkit-transition:all 1s ease;
						 -moz-transition:all 1s ease;
					<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_02 == 'style_bg_3') { ?>
						background-size: 100% 200%;
					    background-image: linear-gradient(to bottom, <?=$Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC?> 50%, <?=$Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?> 50%);
					    transition: background-position 1s;
					    -webkit-transition: background-position 1s;
					    -moz-transition: background-position 1s;
					<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_02 == 'style_bg_4') { ?>
						background-size: 100% 200%;
					    background-image: linear-gradient(to top, <?=$Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC?> 50%, <?=$Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?> 50%);
					    transition: background-position 1s;
					    -webkit-transition: background-position 1s;
					    -moz-transition: background-position 1s;
					<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_02 == 'style_bg_5') { ?>
						background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?>;
						/*box-shadow: inset 0 0 0 0 <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;*/
						-webkit-transition: all ease 0.8s;
						-moz-transition: all ease 0.8s;
						transition: all ease 0.8s;
					<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_02 == 'style_bg_6') { ?>
						background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?>;
					<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_02 == 'style_bg_none') { ?>
						background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?>;
					<?php } else { ?>
						background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?>;
					<?php } ?>
					color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
					/*text-align: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavAl;?>;*/
					border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px;
					/*box-shadow: inset 0 0 6px  <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_IBSh;?>, 0 0 10px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_IBSh;?>;*/
					<?php if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_1') { ?>
						box-shadow: 4px -4px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_IBSh;?>;
					<?php } else if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_2') { ?>
						box-shadow: 5px 5px 3px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_IBSh;?>;
					<?php } else if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_3') { ?>
					  box-shadow: 2px 2px white, 4px 4px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_IBSh;?>;
					<?php } else if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_4') { ?>
						box-shadow:  inset 0 0 18px 7px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_IBSh;?>;
					<?php } else if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_5') {  ?>
						box-shadow:  inset 8px 8px 18px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_IBSh;?>;
					<?php } else if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_6') { ?>
						box-shadow:5px 5px 5px #a5aaab, 9px 9px 5px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_IBSh;?>;
					<?php } else if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_9') { ?>
						box-shadow: 0 8px 6px -6px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_IBSh;?>;
					<?php } else if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_15') { ?>
						box-shadow: 0 0 10px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_IBSh;?>;
					<?php }  else { ?>
						box-shadow: none;
					<?php } ?>
					padding: 16px 12px;
					cursor: pointer;
					margin-top: 0 !important;
					margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
					padding-right: 40px;
					position: relative;
					transition: all 0.4s;
					-webkit-transition: all 0.4s;
					-moz-transition: all 0.4s;
					border:  <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_style;?> <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_col;?>;
					line-height: 0 !important;
				}
				<?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_9' || $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_12') {$RW_ACD_DIV_CONT = 'Rich_Web_Tabs_Accordion'; $RW_ACD_DIV = 'div'; $RW_ACD_DIV_CONT_B = 'none !important';} else {$RW_ACD_DIV_CONT = 'Rich_Web_Tabs_Accordion_Content'; $RW_ACD_DIV = 'h3'; $RW_ACD_DIV_CONT_B = '""';} ?>
				<?php if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_7') { ?>
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?> {
						box-shadow: none;
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:before, .<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:after {
					  position:absolute;
					  content:"";
					  bottom:25px;
					  left:15px;
					   height: 5px;
					  top:45%;
					  width:45%;
					  background:none;
					  z-index: -1;
					  box-shadow: 0 22px 14px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_IBSh;?>;
					  -webkit-transform: rotate(-5deg);
					  -moz-transform: rotate(-5deg);
					  transform: rotate(-5deg);
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:after{
					  -webkit-transform: rotate(5deg);
					  -moz-transform: rotate(5deg);
					  transform: rotate(5deg);
					  right: 15px;
					  left: auto;
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:hover:before, .<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:hover:after {
						  position:absolute;
						  content:"";
						  bottom:25px;
						  left:15px;
						   height: 5px;
						  top:45%;
						  width:45%;
						  background:none;
						  z-index: -1;
						  box-shadow: 0 22px 14px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_OBSh;?>;
						  -webkit-transform: rotate(-5deg);
						  -moz-transform: rotate(-5deg);
						  transform: rotate(-5deg);
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:hover:after{
					  -webkit-transform: rotate(5deg);
					  -moz-transform: rotate(5deg);
					  transform: rotate(5deg);
					  right: 15px;
					  left: auto;
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>.active:before, .<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>.active:after {
						  position:absolute;
						  content:"";
						  left:15px;
						<?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_9' || $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_12') { ?>
						top: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px;
						height: 8px;
						<?php } else { ?>
						bottom: calc(100% - <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px - 5px);
						bottom: -webkit-calc(100% - <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px - 5px);
						top:45%;
						<?php } ?>	
						  width:45%;
						  height: 5px;
						  background:none;
						  z-index: -1;
						  box-shadow: 0 22px 14px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_03;?>;
						  -webkit-transform: rotate(-5deg);
						  -moz-transform: rotate(-5deg);
						  transform: rotate(-5deg);
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>.active:after{
					  -webkit-transform: rotate(5deg);
					  -moz-transform: rotate(5deg);
					  transform: rotate(5deg);
					  right: 15px;
					  left: auto;
					}
				<?php } ?>
				<?php if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_8') { ?>
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:before, .<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:after {
					  position:absolute;
					  content:"";
					  top:36px;
					  bottom: 143px;
					   height: 5px;
					  width:50%;
					  right: 91px !important;
					  z-index:-1;
					  -webkit-transform: rotate(-5deg);
					  -moz-transform: rotate(-5deg);
					  transform: rotate(-5deg);
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:after {
						bottom: calc(100% - <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px - 22px) !important;
						bottom: -webkit-calc(100% - <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px - 22px) !important;
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:before{
					  box-shadow:85px -11px 13px 2px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_IBSh;?>;
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:after{
					  -webkit-transform: rotate(5deg);
					  -moz-transform: rotate(5deg);
					  transform: rotate(5deg);
					  bottom: 11px;

					  top: auto;
					  box-shadow:84px -14px 13px 2px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_IBSh;?>;
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:hover:before {
						 box-shadow:85px -11px 13px 2px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_OBSh;?>;
						  height: 5px;
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:hover:after {
						 box-shadow:84px -14px 13px 2px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_OBSh;?>;
						  height: 5px;
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>.active:before {
						 box-shadow:85px -11px 13px 2px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_03;?>;
						  height: 5px;
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>.active:after {
						box-shadow:84px -14px 13px 2px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_03;?>;
						 height: 5px;
					}
				<?php } ?>

				<?php if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_10') { ?>
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?> {
						box-shadow: none;
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:before, .<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:after {
					  position:absolute;
					  content:"";
					  bottom: 30px;
					  left: 8px;
					  top: 35%;
					  width: 45%;
					  background:none;
					  z-index: -1;
					  box-shadow: 0 22px 10px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_IBSh;?>;
					  -webkit-transform: rotate(-3deg);
					  -moz-transform: rotate(-3deg);
					  transform: rotate(-3deg);
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:after{
					  -webkit-transform: rotate(3deg);
					  -moz-transform: rotate(3deg);
					  transform: rotate(3deg);
					  right: 8px;
					  left: auto;
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:hover:before, .<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:hover:after {
						  position:absolute;
						  content:"";
						  bottom: 30px;
						  left: 8px;
						  top: 35%;
						  width: 45%;
						  background:none;
						  z-index: -1;
						  box-shadow: 0 22px 10px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_OBSh;?>;
						  -webkit-transform: rotate(-3deg);
						  -moz-transform: rotate(-3deg);
						  transform: rotate(-3deg);
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:hover:after{
					  -webkit-transform: rotate(3deg);
					  -moz-transform: rotate(3deg);
					  transform: rotate(3deg);
					  right: 8px;
					  left: auto;
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>.active:before, .<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>.active:after {
						  position:absolute;
						  content:"";
						  bottom: calc(100% - <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px - 0px);
						  bottom: -webkit-calc(100% - <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px - 0px);
						  left: 8px;
						  top: 0;
						  width: 45%;
						  background:none;
						  z-index: -1;
						  box-shadow: 0 25px 10px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_03;?>;
						  -webkit-transform: rotate(-3deg);
						  -moz-transform: rotate(-3deg);
						  transform: rotate(-3deg);
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>.active:after{
					  -webkit-transform: rotate(3deg);
					  -moz-transform: rotate(3deg);
					  transform: rotate(3deg);
					  right: 8px;
					  left: auto;
					}
				<?php } ?>

				<?php if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_11') { ?>
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:before {
					  position:absolute;
					  content:"";
					  bottom: 25px;
					  left: 5px;
					   height: 5px;
					  width: 48%;
					  background:none;
					  z-index: -1;
					  box-shadow: 0px 20px 14px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_IBSh;?>;
					  -webkit-transform: rotate(-3deg);
					  -moz-transform: rotate(-3deg);
					  transform: rotate(-3deg);
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:hover:before {
						  position:absolute;
						  content:"";
						  bottom: 25px;
					      left: 5px;
					       height: 5px;
					      width: 48%;
						  background:none;
						  z-index: -1;
						  box-shadow: 0px 20px 14px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_OBSh;?>;
						  -webkit-transform: rotate(-3deg);
						  -moz-transform: rotate(-3deg);
						  transform: rotate(-3deg);
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>.active:before {
						  position:absolute;
						  content:"";
						  bottom: calc(100% - <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px - 7px);
						  bottom: -webkit-calc(100% - <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px - 7px);
					      left: 5px;
					       height: 5px;
					      width: 48%;
						  background:none;
						  z-index: -1;
						  box-shadow: 0px 20px 14px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_03;?>;
						  -webkit-transform: rotate(-3deg);
						  -moz-transform: rotate(-3deg);
						  transform: rotate(-3deg);
					}
				<?php } ?>
				<?php if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_12') { ?>
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:before {
					  position:absolute;
					  content:"";
					  bottom: 25px;
					  right: 5px;
					   height: 5px;
					  width: 48%;
					  z-index: -1;
					  box-shadow: 0 19px 10px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_IBSh;?>;
					  -webkit-transform: rotate(3deg);
					  -moz-transform: rotate(3deg);
					  transform: rotate(3deg);
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:hover:before {
						position:absolute;
						content:<?=$Rich_Web_Tabs?>;
						 height: 5px;
						bottom: 25px;
					    right: 5px;
					    width: 48%;
						z-index: -1;
						box-shadow: 0 19px 10px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_OBSh;?>;
						-webkit-transform: rotate(3deg);
						-moz-transform: rotate(3deg);
						transform: rotate(3deg);
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>.active:before {
						position:absolute;
						content:"";
						bottom: calc(100% - <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px - 7px);
						bottom: -webkit-calc(100% - <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px - 7px);
					    right: 5px;
					     height: 5px;
					    width: 48%;
						z-index: -1;
						box-shadow: 0 19px 10px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_03;?>;
						-webkit-transform: rotate(3deg);
						-moz-transform: rotate(3deg);
						transform: rotate(3deg);
					}
				<?php } ?>

				<?php if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_13') { ?>
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:before {
					  position:absolute;
					  content:"";
					  bottom: 11px;
					  left: 5%;
					  top: 35%;
					  width: 90%;
					  background:none;
					  z-index: -1;
					  box-shadow: 0 17px 20px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_IBSh;?>;
					  -webkit-transform: rotate(0deg);
					  -moz-transform: rotate(0deg);
					  transform: rotate(0deg);
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:hover:before {
						  position:absolute;
						  content:"";
						  bottom: 11px;
					      left: 5%;
					      top: 35%;
					      width: 90%;
						  background:none;
						  z-index: -1;
						  box-shadow: 0 17px 20px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_OBSh;?>;
						  -webkit-transform: rotate(0deg);
						  -moz-transform: rotate(0deg);
						  transform: rotate(0deg);
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>.active:before {
						  position:absolute;
						  content:"";
						  bottom: calc(100% - <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px - 20px);
						  bottom: -webkit-calc(100% - <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px - 20px);
					      left: 5%;
					      top: 0;
					      width: 90%;
						  background:none;
						  z-index: -1;
						  box-shadow: 0 17px 20px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_03;?>;
						  -webkit-transform: rotate(0deg);
						  -moz-transform: rotate(0deg);
						  transform: rotate(0deg);
					}
				<?php } ?>

				<?php if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_14') { ?>
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:before, .<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:after {
					    position:absolute;
					    content:"";
					    bottom: 0px;
					    right: 0px;
					    top: 0;
					    width: 98%;
					    background:none;
					    z-index: -1;
					    box-shadow: 0 0px 31px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_IBSh;?>;
					    -webkit-transform: rotate(0deg);
					    -moz-transform: rotate(0deg);
					    transform: rotate(0deg);
					    border-radius: 50%;
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:hover:before, .<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:hover:after {
					    position:absolute;
					    content:"";
					    bottom: 0px;
					    right: 0px;
					    top: 0;
					    width: 98%;
					    background:none;
					    z-index: -1;
					    box-shadow: 0 0px 31px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_OBSh;?>;
					    -webkit-transform: rotate(0deg);
					    -moz-transform: rotate(0deg);
					    transform: rotate(0deg);
					    border-radius: 50%;
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:hover:after{
					    position:absolute;
					    content:"";
					    bottom: 0px;
					    left: 0px;
					    top: 0;
					    width: 98%;
					    background:none;
					    z-index: -1;
					    box-shadow: 0 0px 31px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_OBSh;?>;
					    -webkit-transform: rotate(0deg);
					    -moz-transform: rotate(0deg);
					    transform: rotate(0deg);
					    border-radius: 50%;
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>:after{
					    position:absolute;
					    content:"";
					    bottom: 0px;
					    left: 0px;
					    top: 0;
					    width: 98%;
					    background:none;
					    z-index: -1;
					    box-shadow: 0 0px 31px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_IBSh;?>;
					    -webkit-transform: rotate(0deg);
					    -moz-transform: rotate(0deg);
					    transform: rotate(0deg);
					    border-radius: 50%;
					}
					
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>.active:before {
						position:absolute;
					    content:"";
					    bottom: calc(100% - <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px - 31px);
					    bottom: -webkit-calc(100% - <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px - 31px);
					    right: 0px;
					    top: 0;
					    width: 98%;
					    background:none;
					    z-index: -1;
					    box-shadow: 0 0px 31px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_03;?>;
					    transform: rotate(0deg);
					    -webkit-transform: rotate(0deg);
					    -moz-transform: rotate(0deg);
					    border-radius: 50%;
					}
					.<?=$RW_ACD_DIV_CONT?>_<?=$Rich_Web_Tabs?> > <?=$RW_ACD_DIV?>.active:after {
						position:absolute;
					    content:"";
					    bottom: calc(100% - <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px - 31px);
					    bottom: -webkit-calc(100% - <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px - 31px);
					    left: 0px;
					    top: 0;
					    width: 98%;
					    background:none;
					    z-index: -1;
					    box-shadow: 0 0px 31px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_03;?>;
					    -webkit-transform: rotate(0deg);
					    -moz-transform: rotate(0deg);
					    transform: rotate(0deg);
					    border-radius: 50%;
					}
				<?php } ?>

				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3:hover {
					<?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_02 == 'style_bg_1') { ?>
						background-position:right bottom;
					<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_02 == 'style_bg_2') { ?>
						background-position:left bottom;
					<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_02 == 'style_bg_3') { ?>
						background-position: 0 -100%;
					<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_02 == 'style_bg_4') { ?>
						background-position: 100% 100%;
					<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_02 == 'style_bg_5') { ?>
						box-shadow: inset 200px 100px 0 0 <?=$Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?> !important;
					<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_02 == 'style_bg_6') { ?>
						/*background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;*/
						background-image: linear-gradient(-75deg, rgba(0,0,0,.1) 30%, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?> 50%, rgba(0,0,0,.1) 70%);
					    background-size: 200%;
					    animation: shine 1.5s infinite;
					<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_02 == 'style_bg_7') { ?>
						/*background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;*/
						background-image: linear-gradient(-8deg, rgba(0,0,0,.6) 30%, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?> 50%, rgba(0,0,0,.6) 70%);
					   background-size: 200%;
					    animation: shine 1.5s infinite;
					<?php }  else { ?>
						background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
					<?php } ?>
					<?php if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_1') { ?>
						box-shadow: 7px -5px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_OBSh;?>;
					<?php } else if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_2') { ?>
						box-shadow: 5px 5px 6px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_OBSh;?>;
					<?php } else if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_3') { ?>
						 box-shadow: 3px 3px white, 5px 5px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_OBSh;?>;
					<?php } else if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_4') { ?>
						box-shadow:  inset 0 0 5px 5px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_OBSh;?>;
					<?php } else if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_5') { ?>
						box-shadow:  inset 10px 10px 26px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_OBSh;?>;
					<?php } else if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_6') { ?>
						box-shadow:5px 5px 5px #a5aaab, 9px 9px 5px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_OBSh;?>;
					<?php } else if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_9') { ?>
						box-shadow: 0 8px 6px -6px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_OBSh;?>;
					<?php } else if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_15') { ?>
						box-shadow: 0 0 10px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_OBSh;?>;
					<?php } else { ?>
						box-shadow: none;
					<?php } ?>
					color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC;?>;
					border:  <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_style;?> <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_col_hover;?>;
				}

				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3:hover i#rich-web-acd-icon<?=$Rich_Web_Tabs?> {
					color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?>;
				}

				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3:hover div.collapseIcon<?=$Rich_Web_Tabs?> i {
					color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_08;?>;
				}

				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active {
					background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBgC;?> !important;
					color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_03;?> !important;
					border:  <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_style;?> <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_col_active;?>;
					<?php if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_1') { ?>
						box-shadow: 7px -5px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_03;?>;
					<?php } else if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_2') { ?>
						box-shadow: 5px 5px 6px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_03;?>;
					<?php } else if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_3') { ?>
						box-shadow: 3px 3px white, 5px 5px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_03;?>;
					<?php } else if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_4') { ?>
						box-shadow:  inset 0 0 5px 5px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_03;?>;
					<?php } else if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_5') { ?>
						box-shadow:  inset 10px 10px 26px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_03;?>;
					<?php } else if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_6') { ?>
						box-shadow:5px 5px 5px #a5aaab, 9px 9px 5px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_03;?>;
					<?php } else if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_9') { ?>
						box-shadow: 0 8px 6px -6px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_03;?>;
					<?php } else if($Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_02 == 'style_bsh_15') { ?>
						box-shadow: 0 0 10px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_03;?>;
					<?php } else { ?>
						box-shadow: none;
					<?php } ?>
					transition: none ;
				}

				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span {
					<?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_04 == 'style_ti_1') { ?>
						text-shadow: 0 0 4px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
					    color: transparent;
					    transition: all 1s !important;
					    -webkit-transition: all 1s !important;
					    -moz-transition: all 1s !important;
					<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_04 == 'style_ti_2') { ?>
						text-shadow: 1px 1px 0  <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?>,
		                1px -1px 0  <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?>,
		                -1px 1px 0  <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?>,
		                -1px -1px 0  <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?> !important;
		  			    color: white !important;
		    			transition: all 1s;
		    			-webkit-transition: all 1s;
		    			-moz-transition: all 1s;
					<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_04 == 'style_ti_3') { ?>
						text-shadow: 1px 1px 0 <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?>,
		                1px 1px 0 #aaaaaa,
		                2px 2px 0 #dbdbdb,
		                3px 3px 0 #eaeaea !important;
		    			color:<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_C;?>;
		   				transition: all 1s;
		   				-webkit-transition: all 1s;
		    			-moz-transition: all 1s;
					<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_04 == 'style_ti_4') { ?>
						text-shadow: 2px 2px !important;
					<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_04 == 'style_ti_5') { ?>

						text-shadow: 0px 1px 0px #999, 0px 2px 0px #888, 0px 3px 0px #777,  0px 5px 7px #001135 !important;
					<?php } ?>
				} 
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3:hover .arrowDown<?=$Rich_Web_Tabs?> {
					border-color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBgC;?> transparent transparent transparent;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3:hover span {
					<?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_04 == 'style_ti_1') { ?>
						text-shadow: 0 0 0 <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC;?> !important;
					<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_04 == 'style_ti_2') { ?>
						text-shadow: 1px 1px 0 <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC;?>, 1px -1px 0 yellowgreen, -1px 1px 0 <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC;?>, -1px -1px 0 <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC;?> !important;
		    			color: white;
					<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_04 == 'style_ti_3') { ?>
						text-shadow: 1px 1px 0 <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC;?>,
		                1px -1px 0 #aaaaaa,
		                2px -2px 0 #dbdbdb,
		                3px -3px 0 #eaeaea !important;
		    			color:<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HC;?>;
				}
					<?php } ?>
				}

				<?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_02 == 'style_bg_5') { ?>
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3:hover .arrowDown<?=$Rich_Web_Tabs?> {border-color: <?=$Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?> transparent transparent transparent !important;}
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_02 == 'style_bg_6' || $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_02 == 'style_bg_7') { ?>

					@-webkit-keyframes shine {
						from {
						    background-position: 150%;
						}
						to {
						    background-position: -50%;
						}
					}
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_02 == 'style_bg_8') { ?>
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3:after {
						content: '';
						position: absolute;
					    left: 0;
					    display: inline-block;
					    height: 1em;
					    width: 100%;
					    border-bottom: 1px solid;
					    margin-top: 10px;
					    opacity: 0;
						-webkit-transition: opacity 0.35s,
						-webkit-transform: 0.35s;
						transition: opacity 0.35s, transform 0.35s;
						-moz-transition: opacity 0.35s, transform 0.35s;
						-webkit-transform: scale(0,1);
						transform: scale(0,1);
					}

					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> h3:hover:after {
						opacity: 1;
						-webkit-transform: scale(1);
						-moz-transform: scale(1);
						transform: scale(1);
					}
				<?php } ?>

				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active span {
					text-shadow: none;
					color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_03;?>;
					<?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_04 == 'style_ti_2') { ?>
						text-shadow: 1px 1px 0 <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_03;?>, 1px -1px 0 <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_03;?>, -1px 1px 0 <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_03;?>, -1px -1px 0 <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_03;?> !important;
		    			color: white;
					<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_04 == 'style_ti_3') { ?>
					text-shadow: 1px 1px 0 <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_03;?>,
		                1px 1px 0 #aaaaaa,
		                2px 2px 0 #dbdbdb,
		                3px 3px 0 #eaeaea !important;
		    			color:<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_03;?>;
		   				transition: all 1s;
		   				-webkit-transition: all 1s;
		   				-moz-transition: all 1s;
					<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_04 == 'style_ti_5') { ?>
						text-shadow: 0px 1px 0px #999, 0px 2px 0px #888, 0px 3px 0px #777, 0px 5px 7px #001135 !important;
					<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_04 == 'style_ti_6') { ?>

					<?php } ?>
				}

				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active i#rich-web-acd-icon<?=$Rich_Web_Tabs?> {
					color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_05;?>;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active div.collapseIcon<?=$Rich_Web_Tabs?> {
					color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_09;?>;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 div.collapseIcon<?=$Rich_Web_Tabs?> i {
					font-style: normal !important;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.alignLeft {
					padding-left: 35px;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 i#rich-web-acd-icon<?=$Rich_Web_Tabs?> {
					color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CC;?>;
					font-size: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px;
					width: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px;
					position: absolute;
					top: 50%;
					left:12px;
					z-index: 9;
					transform: translate(0, -50%);
					-webkit-transform: translate(0, -50%);
					-moz-transform: translate(0, -50%);
					margin-right: 8px;
					font-style: normal !important;
					box-sizing: border-box !important;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 i#rich-web-acd-icon<?=$Rich_Web_Tabs?>:hover {
					color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?>;
				}

				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 i::before {
					display: block;
					text-align: center;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?>  > h3 i:hover {
					color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_CBgC;?>;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 div.collapseIcon<?=$Rich_Web_Tabs?> i {
					color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_07;?>;
					font-size: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px;
					width: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px;
					position: relative;
					z-index: 9;
					
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active div.collapseIcon<?=$Rich_Web_Tabs?> i {
					color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_09;?>;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 div.collapseIcon<?=$Rich_Web_Tabs?> i::before {
					display: block;
					text-align: center;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 div.collapseIcon<?=$Rich_Web_Tabs?> i:hover {
					color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_08;?>;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?>> div {
					/*display: none;*/
					display:block;
					box-shadow: inset 0 0 6px  <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_IBSC;?>, 0 0 10px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_IBSC;?>;
					<?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgT=='color'){ ?>
						background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>;
					<?php }else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgT=='transparent'){ ?>
						background: transparent;
					<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgT=='gradient') { ?>
						background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>;
					    background: -webkit-linear-gradient(left, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>);
					    background: -o-linear-gradient(right, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>);
					    background: -moz-linear-gradient(right, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>);
					    background: linear-gradient(to right, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>);
					<?php } else { ?>
						background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?> !important;
						background: -webkit-linear-gradient(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>) !important;
						background: -o-linear-gradient(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>) !important;
						background: -moz-linear-gradient(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>) !important;
						background: linear-gradient(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC;?>, <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BgC2;?>) !important;
					<?php } ?>
					border-radius: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BR;?>px;
					border: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BW;?>px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BC;?>;
					text-align: left;
					padding: 20px;
					margin: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_01;?>px 0 10px 0;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > div:hover {
					box-shadow: inset 0 0 6px  <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_OBSC;?>, 0 0 10px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_OBSC;?>;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .arrowDown<?=$Rich_Web_Tabs?> {
					width: 0;
					height: 0;
					border-style: solid;
					border-width: 13.0px 7.5px 0 7.5px;
					border-color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBgC;?> transparent transparent transparent;
					position: absolute;
					bottom: 0;
					left: 40px;
					opacity: 0;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .active .arrowDown<?=$Rich_Web_Tabs?> {
					bottom: -13px;
					border-color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBgC;?> transparent transparent transparent;
					opacity: 1;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .collapseIcon<?=$Rich_Web_Tabs?> {
					position: absolute;
					color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_07;?>;
					font-size: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px !important;
					right: 0;
					top: 50%;
					font-size: 25px;
					font-weight: 300;
					-ms-transform: translate(0, -50%);
					transform: translate(0, -50%);
					-webkit-transform: translate(0, -50%);
					margin-right: 10px;
					z-index: 2;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .collapseIcon<?=$Rich_Web_Tabs?>:hover {
					color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_08;?>;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .collapseIcon<?=$Rich_Web_Tabs?>.alignLeft {
					right: initial;
					left: 20px;
				}
				<?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_1') { ?>
				.Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?> > div {
					margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
					margin-bottom: 0 !important;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_l<?=$Rich_Web_Tabs?> {
					width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 23px);
					width: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 23px);
					height: 100%;
					display: inline-block;
					position: absolute;
					background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
					top: 0;
					left: 0;
					border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px 0 <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px;
					z-index: 1;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .active .arrowDown<?=$Rich_Web_Tabs?> {
					opacity: 0;
				}
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_2') { ?>
				.Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?> > div {
					margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
					margin-bottom: 0 !important;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_r<?=$Rich_Web_Tabs?> {
					width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 17px);
					width: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 17px);
					height: 100%;
					display: inline-block;
					position: absolute;
					background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
					top: 0;
					right: 0;
					border-radius: 0 <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px;
					z-index: 1;
				}
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_3') { ?>
				.Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?> > div {
					margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
					margin-bottom: 0 !important;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_l<?=$Rich_Web_Tabs?> {
					width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 23px);
					width: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 23px);
					height: 100%;
					display: inline-block;
					position: absolute;
					background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
					top: 0;
					left: 0;
					border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px 0 <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px;
					z-index: 1;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .active .arrowDown<?=$Rich_Web_Tabs?> {
					opacity: 0;
				}

				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_r<?=$Rich_Web_Tabs?> {
					width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 23px);
					height: 100%;
					display: inline-block;
					position: absolute;
					background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
					top: 0;
					right: 0;
					border-radius: 0 <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px;
					z-index: 1;
				}
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_4') { ?>
				.Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?> > div {
					margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
					margin-bottom: 0 !important;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_l<?=$Rich_Web_Tabs?> {
					width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 23px);
					width: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 23px);
					height: 100%;
					display: inline-block;
					position: absolute;
					border-right: 2px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
					top: 0;
					left: 0;
					z-index: 1;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_r<?=$Rich_Web_Tabs?> {
					width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 23px);
					width: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 23px);
					height: 100%;
					display: inline-block;
					position: absolute;
					border-left: 2px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
					top: 0;
					right: 0;
					z-index: 1;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .active .arrowDown<?=$Rich_Web_Tabs?> {
					left: 49%;
				}
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_5') { ?>
					.Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?> > div {
						margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
						margin-bottom: 0 !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
						transition: all 0.3s !important;
						-webkit-transition: all 0.3s !important;
						-moz-transition: all 0.3s !important;
						border-right: 1px solid transparent;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 div.collapseIcon<?=$Rich_Web_Tabs?> i {
						background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						border-radius: 50px;
						padding: 1px 1px 0 1px;
						box-sizing: content-box;
						transition: all 0.4s !important;
						-webkit-transition: all 0.4s !important;
						-moz-transition: all 0.4s !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3:hover {
						border-right: 9px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 div.collapseIcon<?=$Rich_Web_Tabs?> i {
						width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 2px);
						width: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 2px);
						height: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 2px);
						height: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 2px);
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3:hover div.collapseIcon<?=$Rich_Web_Tabs?> i {
						background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active {
						border-right: 9px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
					}
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_6') { ?>
				.Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?> > div {
					margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
					margin-bottom: 0 !important;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_l<?=$Rich_Web_Tabs?> {
					width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 23px);
					height: 100%;
					display: inline-block;
					position: absolute;
					background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
					top: 0;
					left: 0;
					border-radius: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BR;?>px 0 <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BR;?>px <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BR;?>px;
					z-index: 1;
					-webkit-transform: skew(-35deg);
				    -moz-transform: skew(-35deg);
				    -o-transform: skew(-35deg);
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .active .arrowDown<?=$Rich_Web_Tabs?> {
					opacity: 0;
				}
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_7') { ?>
				.Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?> > div {
					margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
					margin-bottom: 0 !important;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
					border-left: 1px solid transparent;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3:hover {
					border-left: 9px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
				}
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_8') { ?>
				.Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?> > div {
					margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
					margin-bottom: 0 !important;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
					border-bottom: 1px solid transparent;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3:hover {
					border-bottom: 5px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
					box-shadow: none;
					opacity: 1;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active {
					border-bottom: 5px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
					box-shadow: none;
					opacity: 1;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3:hover i#rich-web-acd-icon<?=$Rich_Web_Tabs?> {
					opacity: 1;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 i#rich-web-acd-icon<?=$Rich_Web_Tabs?> {
					left: 15px;
					opacity: 0.3;
					box-shadow: 1px 1px 40px 1px #fff;
					border-radius: 50px;
					background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
					padding: 5px;
					width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 10px);
					width: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 10px);
					height: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 10px);
					height: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 10px);
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3:hover span.rw_tabs_act_st_l<?=$Rich_Web_Tabs?> {
					opacity: 1 !important;
					box-shadow: none !important;
				}
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_9') { ?>
					.Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?> > div {
						margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
						margin-bottom: 0 !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?>  h3 {
						transform: skewX(25deg);
						-webkit-transform: skewX(25deg);
						-moz-transform: skewX(25deg);
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> h3 i#rich-web-acd-icon<?=$Rich_Web_Tabs?> {
						transform: translate(0, -50%) skewX(-25deg) !important;
						-webkit-transform: translate(0, -50%) skewX(-25deg) !important;
						-moz-transform: translate(0, -50%) skewX(-25deg) !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> h3 i {
						transform: skewX(-25deg) !important;
						-webkit-transform: skewX(-25deg) !important;
						-moz-transform: skewX(-25deg) !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> h3 span {
						transform: skewX(-25deg) !important;
						-webkit-transform: skewX(-25deg) !important;
						-moz-transform: skewX(-25deg) !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> span.rw_tabs_act_st_title {
						display: inline;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .active .arrowDown<?=$Rich_Web_Tabs?> {
						opacity: 0;
				 	 }
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_10') { ?>
					.Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?> > div {
						margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
						margin-bottom: 0 !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active {
						border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px 0 0 !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .active .arrowDown<?=$Rich_Web_Tabs?> {
						opacity: 0;
					}
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_11') { ?>
					.Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?> > div {
						margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
						margin-bottom: 0 !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
						border-bottom: 2px solid <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_col;?>;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3:hover {
						border-bottom: 2px solid <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_col_hover;?>;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active {
						border-bottom: 2px solid <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_col_active;?> !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .active .arrowDown<?=$Rich_Web_Tabs?> {
						border-color: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_col_active;?> transparent transparent transparent !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .active .arrowDown<?=$Rich_Web_Tabs?> {
						opacity: 0;
					}
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_12') { ?>
					.Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?> > div {
						margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
						margin-bottom: 0 !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> h3 {
						transform: skewX(25deg);
						-webkit-transform: skewX(25deg);
						-moz-transform: skewX(25deg);
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> h3 i#rich-web-acd-icon<?=$Rich_Web_Tabs?> {
						transform: translate(0, -50%) skewX(-25deg) !important;
						-webkit-transform: translate(0, -50%) skewX(-25deg) !important;
						-moz-transform: translate(0, -50%) skewX(-25deg) !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> h3  i {
						transform: skewX(-25deg) !important;
						-webkit-transform: skewX(-25deg) !important;
						-moz-transform: skewX(-25deg) !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> h3 span {
						transform: skewX(-25deg) !important;
						-webkit-transform: skewX(-25deg) !important;
						-moz-transform: skewX(-25deg) !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?>:nth-child(even)  h3 {
						transform: skewX(-25deg);
						-webkit-transform: skewX(-25deg);
						-moz-transform: skewX(-25deg);
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?>:nth-child(even) h3 i#rich-web-acd-icon<?=$Rich_Web_Tabs?> {
						transform: translate(0, -50%) skewX(25deg) !important;
						-webkit-transform: translate(0, -50%) skewX(25deg) !important;
						-moz-transform: translate(0, -50%) skewX(25deg) !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?>:nth-child(even) h3  i {
						transform: skewX(25deg) !important;
						-webkit-transform: skewX(25deg) !important;
						-moz-transform: skewX(25deg) !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?>:nth-child(even) h3 span {
						transform: skewX(25deg) !important;
						-webkit-transform: skewX(25deg) !important;
						-moz-transform: skewX(25deg) !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?>:nth-child(even) h3 span.rw_tabs_act_st_title {
						transform: skewX(25deg) !important;
						-webkit-transform: skewX(25deg) !important;
						-moz-transform: skewX(25deg) !important;
					}

				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_13') { ?>
					.Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?> > div {
						margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
						margin-bottom: 0 !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 div.rw_tabs_act_st_div_l<?=$Rich_Web_Tabs?> {
						width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 40px);
						width: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 40px);
					    height: 100%;
					    overflow: hidden;
					    display: inline-block;
					    position: absolute;
					    top: 0;
					    border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px 0 0 <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px;
					    left: 0;
					    z-index: 1;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_l<?=$Rich_Web_Tabs?> {
					    width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 40px);
					    width: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 40px);
					    height: 100%;
					    display: inline-block;
					    position: absolute;
					    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
					    top: 0;
					    left: -15px;
					    z-index: 1;
					    -webkit-transform: skewX(-25deg);
					    -moz-transform: skewX(-25deg);
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .active .arrowDown<?=$Rich_Web_Tabs?> {
						opacity: 0;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > div.rw_tabs_acd_cont<?=$Rich_Web_Tabs?> > {
						border-left: 5px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_C_BC;?>;
					}
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_14') { ?>
					.Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?> > div {
						margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
						margin-bottom: 0 !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
						border-left: none !important;
						border-right: none !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_l<?=$Rich_Web_Tabs?> {
					    width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 45px);
					    width: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 45px);
					    height: 100%;
					    display: inline-block;
					    position: absolute;
					    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
					    top: 0;
					    left: 0;
					    z-index: 1;
					  }
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 i#rich-web-acd-icon<?=$Rich_Web_Tabs?> {
						margin-left: 20px !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_title {
						padding-left: 40px !important;
					}
    				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_r<?=$Rich_Web_Tabs?> {
					    width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 45px) !important;
					    width: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 45px) !important;
					    height: 100%;
					    box-sizing: border-box;
					    display: inline-block;
					    position: absolute;
					    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
					    top: 0;
					    right: 0;
					    z-index: 1;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_r<?=$Rich_Web_Tabs?> {
					  	content: "";
					    position: absolute;
					    bottom: 0;
					    height: 100%;
					    right: 0px;
					    border-top: 26px solid transparent;
					    border-bottom: 26px solid transparent;
					    border-right: 21px solid #fff;
					  }
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_l<?=$Rich_Web_Tabs?> {
					  	content: "";
					    position: absolute;
					    box-sizing: border-box;
					    display: inline-block;
					    bottom: 0;
					    height: 100%;
					    left: 0px;
					    border-top: 26px solid transparent;
					    border-bottom: 26px solid transparent;
					    border-left: 21px solid #fff;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .collapseIcon<?=$Rich_Web_Tabs?> {
						margin-right: 30px;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .arrowDown<?=$Rich_Web_Tabs?> {
						left: 49%;
					}
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_15') { ?>
					.Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?> > div {
						margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > div {
						margin-bottom: 0 !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> {
						border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
						border: none !important;
						margin-bottom: 0 !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active {
						 border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px 0 0;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active span.rw_tabs_act_st_l<?=$Rich_Web_Tabs?> {
						border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px 0 0 0 !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > div {
						border-radius: 0 0 <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_l<?=$Rich_Web_Tabs?> {
					    width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px);
					    width: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px);
					    height: 100%;
					    position: absolute;
					    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
					    top: 0;
					    left: 0px;
					    opacity: 0;
					    z-index: 1;
					    border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px 0 0 <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
					  }
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 #rich-web-acd-icon<?=$Rich_Web_Tabs?> {
						opacity: 0;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 .rw_tabs_act_st_title {
						left: 0 !important;
						transition: all 0.4s !important;
						-webkit-transition: all 0.4s !important;
						-moz-transition: all 0.4s !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active .rw_tabs_act_st_l<?=$Rich_Web_Tabs?> {
						left: 0 !important;
						transition:all 0.4s;
						-webkit-transition:all 0.4s;
						-moz-transition:all 0.4s;
						opacity: 1;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active .rw_tabs_act_st_title {
						left: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px + 15px) !important;
						left: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px + 15px) !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active #rich-web-acd-icon<?=$Rich_Web_Tabs?>  {
						opacity: 1 !important;
						margin-right: 8px !important;
					}
					
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3:hover .rw_tabs_act_st_l<?=$Rich_Web_Tabs?> {
						left: 0 !important;
						transition:all 0.4s;
						-webkit-transition:all 0.4s;
						-moz-transition:all 0.4s;
						opacity: 1;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3:hover .rw_tabs_act_st_title {
						left: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px + 15px) !important;
						left: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px + 15px) !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3:hover #rich-web-acd-icon<?=$Rich_Web_Tabs?>  {
						opacity: 1;
						margin-right: 8px !important;
					}

					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> {
						border:  <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_style;?> <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_col;?>;
						margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .active .arrowDown<?=$Rich_Web_Tabs?> {
						opacity: 0;
					}
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_16') { ?>
					.Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?> > div {
						margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
						margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > div {
						margin: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_01;?>px 0 0 0;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
						border: none !important;
						margin-bottom: 0 !important;
						background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
						border-radius: 0 <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px 0 <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3:hover {
						background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?> !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > div.rw_tabs_acd_cont<?=$Rich_Web_Tabs?> {
						border-radius: 0 0 0 <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active {
						border-radius: 0 <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px 0 0 !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> {
						border:  <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_style;?> <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_col;?>;
						border-radius: 0 <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px 0 <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
						margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
						background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?> !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> {
						background: none !important;
					}
					
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .active .arrowDown<?=$Rich_Web_Tabs?> {
					opacity: 0;
				}
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_17') { ?>
				.Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?> > div {
					margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
					margin-bottom: 0 !important;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> {
					border-left: 4px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
					border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
					margin-bottom: 0 !important;
					margin-top: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .active .arrowDown<?=$Rich_Web_Tabs?> {
					opacity: 0;
				}
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_18') { ?>
				.Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?> > div {
					margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
					margin-bottom: 0 !important;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > div {
					margin-left: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px);
					margin-left: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px);
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_l<?=$Rich_Web_Tabs?> {
				    width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px);
				    width: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px);
				    height: 100%;
				    position: absolute;
				    background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
				    top: 0;
				    left: 0;
				    z-index: 1;
				    border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px 0 0 <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
				  }
				 .Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?>::before {
				 	border: 1px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
				 	content: "";
				 	position: absolute;
				 	height: 99%;
				 	z-index: 1;
				 	left: calc((<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px) / 2);
				 	left: -webkit-calc((<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px) / 2);
				 }
				 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .active .arrowDown<?=$Rich_Web_Tabs?> {
					opacity: 0;
				}
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_19') { ?>
				.Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?> > div {
					margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
					margin-bottom: 0 !important;
				}
				 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .active .arrowDown<?=$Rich_Web_Tabs?> {
					opacity: 0;
				  }
				  .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_title {
				  	padding-left: 0 !important;
				  }
				 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_title::after {
				  	content: '';
				  	padding-top: 3px;
					display: block;
					border-bottom: 3px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
					width: 0;
					-webkit-transition: 1s ease;
					-moz-transition: 1s ease;
					transition: 1s ease;
				  }
				  .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active span.rw_tabs_act_st_title::after {
				  	content: '';
					display: block;
					border-bottom: 3px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
					width: 100%;
					transition: 1s ease;
					-webkit-transition: 1s ease;
					-moz-transition: 1s ease;
				  }
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_20') { ?>
					.Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?> > div {
						margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
						margin-bottom: 0 !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > div {
						margin-right: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 8px);
						margin-right: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 8px);
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 div.collapseIcon<?=$Rich_Web_Tabs?> i {
						background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						border-radius: 50px;
						padding: 1px 1px 0 1px;
						width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 2px);
						width: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 2px);
					 	height: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 2px);
					 	height: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 2px);
					 	box-sizing: content-box;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3:hover div.collapseIcon<?=$Rich_Web_Tabs?> i {
						background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						box-sizing: content-box;
					}
					.Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?>::before {
					 	border: 1px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
					 	content: "";
					 	position: absolute;
					 	height: 99%;
					 	z-index: 1;
					 	right: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px / 2 + 12px);
					 	right: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px / 2 + 12px);
					 }
					 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .active .arrowDown<?=$Rich_Web_Tabs?> {
						opacity: 0;
				 	 }
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_21') { ?>
					.Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?> > div {
						margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
						margin-bottom: 0 !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .active .arrowDown<?=$Rich_Web_Tabs?> {
						opacity: 0;
				 	 }
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> {
				 	 	border:  <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_style;?> <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_col;?>;
						border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
						margin-bottom:  <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px;
				 	 }
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
				 	 	border-radius: none !important;
				 	 	border: none !important;
				 	 }
				 	.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active {
				 		border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px 0 0 !important;
				 	}
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 i#rich-web-acd-icon<?=$Rich_Web_Tabs?> {
				 	 	/*width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 5px);
				 	 	width: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 5px);
				 	 	height: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 5px);
				 	 	height: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 5px);*/
				 	 	width: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 5px);
				 	 	padding: 3px;
				 	 	/*left: calc(-<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px / 2);
				 	 	left: -webkit-calc(-<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px / 2);*/
				 	 	background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
				 	 	border: none !important;
				 	 	border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
				 	 }
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > div {
				 	 	margin: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_01;?>px 0 0 0;
				 	 	border-radius:0 0 <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
				 	 }
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
				 	 	margin-bottom: 0 !important;
				 	 }
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_22') { ?>
					.Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?> > div {
						margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
						margin-bottom: 0 !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > div {
						border: none !important;
						margin: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_01;?>px 0 0 0 !important;
						border-radius:0 0 <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active {
				 		border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px 0 0 !important;
				 	}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .active .arrowDown<?=$Rich_Web_Tabs?> {
						opacity: 0;
				 	 }
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> {
				 	 	border:  <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_style;?> <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_col;?>;
						border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
						margin-bottom:  <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px;
				 	 }
				 	 
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 i#rich-web-acd-icon<?=$Rich_Web_Tabs?> {
				 	 	width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 10px);
				 	 	width: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 10px);
				 	 	height: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 10px);
				 	 	height: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 10px);
				 	 	padding: 3px;
				 	 	top: 0;
				 	 	left:calc(-<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 10px);
				 	 	left:-webkit-calc(-<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 10px);
				 	 	background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
				 	 	border:  <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_style;?> <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_col;?>;
				 	 	border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
				 	 }
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_title {
				 	 	padding-left: 0 !important;
				 	 	margin-left: 0 !important;
				 	 }
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > div {
				 	 	margin: 0 0 10px 0;
				 	 }
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
				 	 	margin-bottom: 0 !important;
				 	 }
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_23') { ?>
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > div {
						border: none !important;
						border-radius:0 0 <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
						margin-bottom: 0;
						margin-top: ;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
				 	 	border: none !important;
				 	 	margin: 0 !important;
				 	 }
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active {
				 	 	border-radius:<?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px 0 0 !important;
				 	 }
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_l<?=$Rich_Web_Tabs?> {
						width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px);
						width: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px);
						height: calc(100% + <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px + <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px);
						height: -webkit-calc(100% + <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px + <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px);
						position: absolute;
						background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						top: -<?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px;
						left: -12px;
						z-index: 1;
						left:calc(-<?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px - 11px);
						left:-webkit-calc(-<?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px - 11px);
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_l<?=$Rich_Web_Tabs?>::before {
					    content: "";
					    position: absolute;
					    bottom: -11px;
					    left: -0;
					    border-bottom: 11px solid transparent;
					    border-right: 12px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .active .arrowDown<?=$Rich_Web_Tabs?> {
						opacity: 0;
				 	 }
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> {
				 	 	border:  <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_style;?> <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_col;?>;
						border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
						margin-bottom:  <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px;
				 	 }
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 i#rich-web-acd-icon<?=$Rich_Web_Tabs?> {
				 	 	left: 1px;
				 	 }
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_24') { ?>
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > div {
						border: none !important;
						border-radius:0 0  <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
						margin-bottom: 0 !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
				 	 	border: none !important;
				 	 	margin: 0 !important;
				 	 }
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active {
				 	 	border-radius:<?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px 0 0 !important;
				 	 }
				 	  .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active span.rw_tabs_act_st_l<?=$Rich_Web_Tabs?> {
				 	  	border-radius:<?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px 0 0 0 !important;
				 	  }
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_l<?=$Rich_Web_Tabs?> {
						width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px);
						width: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px);
						height: 100%;
						position: absolute;
						background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px 0 0 <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
						top: 0;
						left: 0;
						z-index: 1;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_l<?=$Rich_Web_Tabs?>::before {
					    content: "";
					    position: absolute;
					    left: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px);
					    left: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px);
					    width: 0;
					    top: 50%;
					    transform: translate(0, -50%);
					    -webkit-transform: translate(0, -50%);
					    height: 0; 
					    border-top: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px / 2 + 4px) solid transparent;
					    border-top: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px / 2 + 4px) solid transparent;
					    border-bottom: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px / 2 + 3px) solid transparent;
					    border-bottom: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px / 2 + 3px) solid transparent;
  					    border-left: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px / 2 + 2px) solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
  					    border-left: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px / 2 + 2px) solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .active .arrowDown<?=$Rich_Web_Tabs?> {
						opacity: 0;
				 	 }
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> {
				 	 	border:  <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_style;?> <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_col;?>;
						border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
						margin-bottom:  <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px;
				 	 }
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_title {
				 	 	padding-left: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px - 12px + 10px) !important;
				 	 	padding-left: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px - 12px + 10px) !important;
				 	 }
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_25') { ?>
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > div {
						border: none !important;
						border-radius:0 0 <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
						margin-bottom: 0 !important;
					}
					.Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?> {
						width: 95%;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
				 	 	border: none !important;
				 	 	margin: 0 !important;
				 	 	transition: none;
				 	 	-webkit-transition: none;
				 	 	-moz-transition: none;
				 	 }
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_l<?=$Rich_Web_Tabs?> {
						width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px);
						width: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px);
						height: calc(100% + <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px + <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px);
						height: -webkit-calc(100% + <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px + <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px);
						position: absolute;
						background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						top: -<?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px;
						left:0px;
						z-index: 1;
						/*left:calc(-<?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px - 22px);
						left:-webkit-calc(-<?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px - 22px);*/
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_r<?=$Rich_Web_Tabs?> {
						/*width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 23px);*/
						height: 0;
						display: inline-block;
						position: absolute;
						background: none;
						z-index: 1;
						border-left: 24px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_BgC;?>;
					    border-top: calc((<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px + 32px) / 2) solid transparent;
					    border-top: -webkit-calc((<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px + 32px) / 2) solid transparent;
					    border-bottom: calc((<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px + 32px) / 2) solid transparent;
					    border-bottom: -webkit-calc((<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px + 32px) / 2) solid transparent;
					    top: 50%;
					    transform: translate(0, -50%);
					    -webkit-transform: translate(0, -50%);
					    right: -24px;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active span.rw_tabs_act_st_l<?=$Rich_Web_Tabs?>::before {
					    content: "";
					    position: absolute;
					    bottom: -18px;
					    left: 0;
					    border-bottom: 18px solid transparent;
					    border-right: 22px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .active .arrowDown<?=$Rich_Web_Tabs?> {
						opacity: 0;
				 	 }
				 	.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3:hover span.rw_tabs_act_st_r<?=$Rich_Web_Tabs?> {
				 		border-left: 24px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_S_HBgC;?>;
				 	}
				 	.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active span.rw_tabs_act_st_r<?=$Rich_Web_Tabs?> {
				 	 	border-left: 24px solid <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBgC;?>;
				 	}
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> {
				 	 	border:  <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_style;?> <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_col;?>;
						border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
						margin-bottom:  <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px;
				 	 }
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 i#rich-web-acd-icon<?=$Rich_Web_Tabs?> {
				 	 	/*left: -10px;*/
				 	 }
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_26') { ?>
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
						border-bottom: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_style;?> <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_col;?>;
						border-top: none;
						border-right: none;
						border-left: none;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?>:first-child {
						border-top: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_style;?> <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_col;?>;
						border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 i#rich-web-acd-icon<?=$Rich_Web_Tabs?> {
				 	 	width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 8px);
				 	 	width: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 8px);
				 	 	height: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 8px);
				 	 	height: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 8px);
				 	 	padding: 4px;
				 	 	left: 0;
				 	 	margin-left: 7px;
				 	 	background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
				 	 	border: none !important;
				 	 	border-radius: 50% !important;
				 	 }
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .active .arrowDown<?=$Rich_Web_Tabs?> {
						opacity: 0;
				 	 }
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3:hover {
				 	 	border-top: none;
						border-right: none;
						border-left: none;
				 	 }
				 	  .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active {
				 	 	border: none;
				 	 }
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_27') { ?>
					.Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?> > div {
						margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
						margin-bottom: 0 !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 i#rich-web-acd-icon<?=$Rich_Web_Tabs?> {
				 	 	width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px);
				 	 	width: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px);
				 	 	height: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 11px);
				 	 	height: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 11px);
				 	 	padding: 4px;
				 	 	left: 9px;
				 	 	background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
				 	 	border: none !important;
				 	 	border-radius: 50% !important;
				 	}
				 	.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_title {
				 		padding-left: 20px !important;
				 	}
				 	.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 div.collapseIcon<?=$Rich_Web_Tabs?> i {
				 		color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_07;?>;
						font-size: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px;
						width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 22px);
						width: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 22px);
						height: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 11px);
						height: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 11px);
						position: relative;
						padding: 4px;
						z-index: 9;
						background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						border-radius: 50% !important;
						box-sizing: border-box;
				 	}
				 	.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .active .arrowDown<?=$Rich_Web_Tabs?> {
						opacity: 0;
				 	}
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_28') { ?>.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > div {
						border: none !important;
						border-radius: 0 0  <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px  <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
						margin-bottom: 0 !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
				 	 	border: none !important;
				 	 	margin: 0 !important;
				 	 }
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active {
				 	 	border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px 0  0;
				 	 }
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 div.collapseIcon<?=$Rich_Web_Tabs?> {
				 	 	transition: all ease 0.8s;
				 	 	-webkit-transition: all ease 0.8s;
				 	 	-moz-transition: all ease 0.8s;
				 	 }
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 div.collapseIcon<?=$Rich_Web_Tabs?> i {
				 		color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_07;?>;
						font-size: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px;
						width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 15px);
						width: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 15px);
						height: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 6px);
						height: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 6px);
						position: relative;
						padding: 4px;
						z-index: 9;
						background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
				 	 }
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active div.collapseIcon<?=$Rich_Web_Tabs?> {
				 	 	margin-right: calc(10px + 25px);
				 	 	margin-right: -webkit-calc(10px + 25px);
				 	 }
				 	.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active div.collapseIcon<?=$Rich_Web_Tabs?> i {
				 		
				 		color: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_07;?>;
						font-size: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px;
						width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 22px);
						width: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 22px);
						height: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 11px);
						height: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_10;?>px + 11px);
						position: relative;
						padding: 4px;
						z-index: 9;
						background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
				 	}
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> {
				 	 	border:  <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_style;?> <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_col;?>;
						border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
						margin-bottom:  <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px;
				 	 }
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .active .arrowDown<?=$Rich_Web_Tabs?> {
						opacity: 0;
				 	}
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_29') { ?>
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > div {
						border: none !important;
						border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
						margin-bottom: 0 !important;
					}
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> {
				 	 	border:  <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_style;?> <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_col;?>;
						border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
						margin-bottom:  <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px;
				 	 }
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_title {
				 	 	padding-left: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px - 12px + 10px) !important;
				 	 	padding-left: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px - 12px + 10px) !important;
				 	 }
				 	 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?>:hover {
				 	 	 		border:  <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_style;?> <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_col_hover;?>;
				 	 	 }
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
				 	 	border: none !important;
				 	 	margin: 0 !important;
				 	 	border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
				 	 }
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active {
				 	 	border-bottom: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_style;?> <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_col;?> !important;
				 	 	border-top: none !important;
				 	 	border-right: none !important;
				 	 	border-left: none !important;
				 	 	border-radius:  <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px  <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px 0 0 !important;
				 	 }
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active:hover {
				 	 	border-bottom: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_style;?><?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_col_hover;?> !important;
				 	 }
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_l<?=$Rich_Web_Tabs?> {
						width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px);
						width: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px);
						height: 100%;
						position: absolute;
						background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						top: 0;
						left: 0;
						z-index: 1;
						border-radius:  <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px 0 0 <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px  !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active span.rw_tabs_act_st_l<?=$Rich_Web_Tabs?> {
						border-radius:  <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px 0 0 0 !important;
					}

					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .active .arrowDown<?=$Rich_Web_Tabs?> {
						opacity: 0;
				 	 }
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > div {
				 	 	border-radius: 0 0  <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px  <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
				 	 }
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_30') { ?>
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > div {
						border: none !important;
						border-radius: 0 0 <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
						margin: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_01;?>px 0 0 0 !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
				 	 	border: none !important;
				 	 	margin: 0 !important;
				 	 }
				 	  .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3.active {
				 	 	border-radius:  <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px  <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px 0 0 !important;
				 	 }
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_l<?=$Rich_Web_Tabs?> {
						width: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px);
						width: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px);
						height: calc(100% + <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px + <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px);
						height: -webkit-calc(100% + <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px + <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px);
						position: absolute;
						background: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
						top: -<?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px;
						left: 0;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_l<?=$Rich_Web_Tabs?>::before {
					    content: "";
					    bottom: -11px;
					    width: 0;
					    height: 0;
					    border-top: 20px solid #fff;
					    border-left: calc((<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px) / 2) solid transparent;
					    border-left: -webkit-calc((<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px) / 2) solid transparent;
					    border-right: calc((<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px) / 2) solid transparent;
					    border-right: -webkit-calc((<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px) / 2) solid transparent;
					    position: absolute;
					    top: 0;
					    left: 0;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_l<?=$Rich_Web_Tabs?>::after {
					    content: "";
					    width: 0;
					    height: 0;
					    border-top: 20px solid  <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_MBC;?>;
					    border-left:calc((<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px) / 2) solid transparent;
					    border-left:-webkit-calc((<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px) / 2) solid transparent;
					    border-right: calc((<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px) / 2) solid transparent;
					    border-right: -webkit-calc((<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px + 22px) / 2) solid transparent;
					    position: absolute;
					    bottom: -20px;
					    left: 0;
					    z-index: 5;
					    z-index: 1;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 i#rich-web-acd-icon<?=$Rich_Web_Tabs?> {
						bottom: 0;
						transform: none !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .active .arrowDown<?=$Rich_Web_Tabs?> {
						opacity: 0;
				 	 }
				 	 .Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> {
				 	 	border:  <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_width;?>px <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_style;?> <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Acd_border_col;?>;
						border-radius: <?php echo $Rich_Web_Tabs_Themes_2[0]->Rich_Web_Tabs_T_01;?>px !important;
						margin-bottom:  <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px;
				 	 }
				<?php } else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_S == 'Rich_Web_Tabs_acd_31') { ?>
					.Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?> > div {
						margin-bottom: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_PB;?>px !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 {
						margin-bottom: 0 !important;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 i#rich-web-acd-icon<?=$Rich_Web_Tabs?> {
						transition:all 0.5s;
						-webkit-transition:all 0.5s;
						-moz-transition:all 0.5s;
					}
					.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .active .arrowDown<?=$Rich_Web_Tabs?> {
				        border-width: 23px 1px 0 48.5px !important;
				        bottom: -22px !important;
					}
				<?php } ?>
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_title {
					font-family: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_FF;?>;
					font-size: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px !important;
					position: relative;
					z-index: 2;
					display: inline-block;
					left: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px + 10px);
					left: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px + 10px);
					line-height: <?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_NavM;?>px !important;
					margin-right: 70px;
					margin-left: calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px - 15px);
					margin-left: -webkit-calc(<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_06;?>px - 15px);
				}
				.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> .rw_tabs_acd_cont<?=$Rich_Web_Tabs?> p {
					margin: 0 !important;
				}
			</style>
			
			<div class="Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?>">
					<?php for( $i = 0; $i < count($Rich_Web_Tabs_Fields); $i++ ){ ?>
						<div class="Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?>">
							<h3 class="Rich_Web_Tabs_h3_<?=$Rich_Web_Tabs?>">
								<i id="rich-web-acd-icon<?=$Rich_Web_Tabs?>" class='rich_web rich_web-<?php echo $Rich_Web_Tabs_Fields[$i]->Tabs_Subicon;?>'></i>
								<div class="rw_tabs_act_st_div_l<?=$Rich_Web_Tabs?>"><span class="rw_tabs_act_st_l<?=$Rich_Web_Tabs?>"></span></div>
								<span class="rw_tabs_act_st_r<?=$Rich_Web_Tabs?>"></span>
								<span class="rw_tabs_act_st_title"><?=$Rich_Web_Tabs_Fields[$i]->Tabs_Subtitle?></span>
							</h3>
							<div class="rw_tabs_acd_cont<?=$Rich_Web_Tabs?>">
								<div id="rw_tabs_acd_cont<?=$Rich_Web_Tabs?>">
									<?php echo do_shortcode(html_entity_decode($Rich_Web_Tabs_Fields[$i]->Tabs_Subcontent));?>
								</div>
							</div>
						</div>
					<?php }?>
			</div>
			<?php
				if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_FS == 'sort-desc') {
					$rw_t_acd_up = 'sort-desc';
					$rw_t_acd_down = 'sort-asc';
				} else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_FS == 'circle') {
					$rw_t_acd_up = 'circle';
					$rw_t_acd_down = 'circle-o';
				} else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_FS == 'angle-double-up') {
					$rw_t_acd_up = 'angle-double-down';
					$rw_t_acd_down = 'angle-double-up';
				} else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_FS == 'arrow-circle-up') {
					$rw_t_acd_up = 'arrow-circle-down';
					$rw_t_acd_down = 'arrow-circle-up';
				} else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_FS == 'angle-up') {
					$rw_t_acd_up = 'angle-down';
					$rw_t_acd_down = 'angle-up';
				} else if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_N_FS == 'plus') {
					$rw_t_acd_up = 'plus';
					$rw_t_acd_down = 'minus';
				}
			?>
			<script type="text/javascript">
				// jQuery(".Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?>").css("height","auto")
				jQuery(".Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?>> div").animate({"display":"block",},500,function(){
					jQuery(".Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?>> div").slideUp(500,function(){
						jQuery(".Rich_Web_Tabs_Accordion_<?=$Rich_Web_Tabs?>").css("height","auto")
					});
				})
				jQuery(document).ready(function() {
					(function(jQuery) {
						var settings<?=$Rich_Web_Tabs?>;
						var y<?=$Rich_Web_Tabs?>=0;
						jQuery.fn.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> = function(actionOrSettings<?=$Rich_Web_Tabs?>, parameter<?=$Rich_Web_Tabs?>) {
							if (typeof actionOrSettings<?=$Rich_Web_Tabs?> === 'object' || actionOrSettings<?=$Rich_Web_Tabs?> === undefined) {
								settings<?=$Rich_Web_Tabs?> = jQuery.extend({
									headline<?=$Rich_Web_Tabs?>: 'h3',
									prefix<?=$Rich_Web_Tabs?>: false,
									highlander<?=$Rich_Web_Tabs?>: true,
									collapsible<?=$Rich_Web_Tabs?>: false,
									arrow<?=$Rich_Web_Tabs?>: true,
									collapseIcons<?=$Rich_Web_Tabs?>: {
										opened<?=$Rich_Web_Tabs?>: '<i class="rich_web rich_web-<?=$rw_t_acd_down?>"></i>',
										closed<?=$Rich_Web_Tabs?>: '<i class="rich_web rich_web-<?=$rw_t_acd_up?>"></i>'
									},
									collapseIconsAlign<?=$Rich_Web_Tabs?>: 'right',
									scroll<?=$Rich_Web_Tabs?>: true
								}, actionOrSettings<?=$Rich_Web_Tabs?>);
							}
							if (actionOrSettings<?=$Rich_Web_Tabs?> == "open<?=$Rich_Web_Tabs?>") {

								if (settings<?=$Rich_Web_Tabs?>.highlander<?=$Rich_Web_Tabs?>) {
									jQuery(this).Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?>('forceCloseAll<?=$Rich_Web_Tabs?>');

								}
								var ogThis<?=$Rich_Web_Tabs?> = jQuery(this);
								if (settings<?=$Rich_Web_Tabs?>.collapseIcons<?=$Rich_Web_Tabs?>) {
									jQuery('.ic_<?=$Rich_Web_Tabs?>', ogThis<?=$Rich_Web_Tabs?>).html(settings<?=$Rich_Web_Tabs?>.collapseIcons<?=$Rich_Web_Tabs?>.opened<?=$Rich_Web_Tabs?>);

								}
								// y<?=$Rich_Web_Tabs?>++;
								jQuery(this).parent().addClass('active');
								// console.log(jQuery(this));
								jQuery(this).addClass('active').next('div.rw_tabs_acd_cont<?=$Rich_Web_Tabs?>').slideDown(300, function() {
									if (parameter<?=$Rich_Web_Tabs?> !== false) {
										smoothScrollTo<?=$Rich_Web_Tabs?>(jQuery(this).prev(settings<?=$Rich_Web_Tabs?>.collapseIcons<?=$Rich_Web_Tabs?>));
									}

								});

								<?php if($Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_CA != 'none') { ?>

								jQuery(".active").next('div.rw_tabs_acd_cont<?=$Rich_Web_Tabs?>').find( jQuery("div #rw_tabs_acd_cont<?=$Rich_Web_Tabs?>") ).hide();
								jQuery(".active").next('div.rw_tabs_acd_cont<?=$Rich_Web_Tabs?>').find( jQuery("div #rw_tabs_acd_cont<?=$Rich_Web_Tabs?>") ).show( '<?php echo $Rich_Web_Tabs_Theme[0]->Rich_Web_Tabs_T_CA;?>', 1000 );
								<?php } ?>
								return this;
							} else if (actionOrSettings<?=$Rich_Web_Tabs?> == "close<?=$Rich_Web_Tabs?>" || actionOrSettings<?=$Rich_Web_Tabs?> == "forceClose<?=$Rich_Web_Tabs?>") {
								if (actionOrSettings<?=$Rich_Web_Tabs?> == "close<?=$Rich_Web_Tabs?>" && !settings<?=$Rich_Web_Tabs?>.collapsible<?=$Rich_Web_Tabs?> && jQuery(".Rich_Web_Tabs_h3_<?=$Rich_Web_Tabs?>" + '[class="active"]').length == 1) {
									return this;
								}
								var ogThis<?=$Rich_Web_Tabs?> = jQuery(this);
								if (settings<?=$Rich_Web_Tabs?>.collapseIcons<?=$Rich_Web_Tabs?>) {
									jQuery('.ic_<?=$Rich_Web_Tabs?>', ogThis<?=$Rich_Web_Tabs?>).html(settings<?=$Rich_Web_Tabs?>.collapseIcons<?=$Rich_Web_Tabs?>.closed<?=$Rich_Web_Tabs?>);
								}
								// y<?=$Rich_Web_Tabs?>--
								jQuery(this).removeClass('active').next('div.rw_tabs_acd_cont<?=$Rich_Web_Tabs?>').slideUp(200, function() {
								jQuery(this).parent().removeClass('active');
								});
								return this;
							} else if (actionOrSettings<?=$Rich_Web_Tabs?> == "closeAll") {
								jQuery(".Rich_Web_Tabs_h3_<?=$Rich_Web_Tabs?>").Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?>('close<?=$Rich_Web_Tabs?>');
							} else if (actionOrSettings<?=$Rich_Web_Tabs?> == "forceCloseAll<?=$Rich_Web_Tabs?>") {
								jQuery(".Rich_Web_Tabs_h3_<?=$Rich_Web_Tabs?>").Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?>('forceClose<?=$Rich_Web_Tabs?>');
							}

							if (settings<?=$Rich_Web_Tabs?>.prefix<?=$Rich_Web_Tabs?>) {
								jQuery(".Rich_Web_Tabs_h3_<?=$Rich_Web_Tabs?>", this).attr('data-prefix<?=$Rich_Web_Tabs?>', settings<?=$Rich_Web_Tabs?>.prefix<?=$Rich_Web_Tabs?>);
							}
							if (settings<?=$Rich_Web_Tabs?>.arrow<?=$Rich_Web_Tabs?>) {
								jQuery(".Rich_Web_Tabs_h3_<?=$Rich_Web_Tabs?>", this).append('<div class="arrowDown<?=$Rich_Web_Tabs?>"></div>');
							}
							// console.log(settings<?=$Rich_Web_Tabs?>.headline<?=$Rich_Web_Tabs?>);
							if (settings<?=$Rich_Web_Tabs?>.collapseIcons<?=$Rich_Web_Tabs?>) {
								jQuery(".Rich_Web_Tabs_h3_<?=$Rich_Web_Tabs?>", this).each(function(index, el) {
									if (jQuery(this).hasClass('active')) {
										jQuery(this).append('<div class="collapseIcon<?=$Rich_Web_Tabs?> ic_<?=$Rich_Web_Tabs?>">'+settings<?=$Rich_Web_Tabs?>.collapseIcons<?=$Rich_Web_Tabs?>.opened<?=$Rich_Web_Tabs?>+'</div>');
									} else {
										jQuery(this).append('<div class="collapseIcon<?=$Rich_Web_Tabs?> ic_<?=$Rich_Web_Tabs?>">'+settings<?=$Rich_Web_Tabs?>.collapseIcons<?=$Rich_Web_Tabs?>.closed<?=$Rich_Web_Tabs?>+'</div>');
									}
								});
							}
							if (settings<?=$Rich_Web_Tabs?>.collapseIconsAlign<?=$Rich_Web_Tabs?> == 'left') {
								jQuery('.collapseIcon<?=$Rich_Web_Tabs?>, ' + settings<?=$Rich_Web_Tabs?>.headline<?=$Rich_Web_Tabs?>).addClass('alignLeft');
							}

							jQuery(".Rich_Web_Tabs_h3_<?=$Rich_Web_Tabs?>", this).click(function() {
								// y<?=$Rich_Web_Tabs?>++
								// console.log(jQuery(this));
								// console.log(settings<?=$Rich_Web_Tabs?>.headline<?=$Rich_Web_Tabs?>);

								if (jQuery(this).hasClass('active')) {

									jQuery(this).Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?>('close<?=$Rich_Web_Tabs?>');
								} else {
									jQuery(this).Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?>('open<?=$Rich_Web_Tabs?>', settings<?=$Rich_Web_Tabs?>.scroll<?=$Rich_Web_Tabs?>);
								}
								
							});
						};
					}(jQuery));

					function smoothScrollTo<?=$Rich_Web_Tabs?>(element, callback) {
						var time = 400;
						jQuery('html').animate({
							/*scrollTop: jQuery(element).offset().top*/
						}, time, callback);
					}
					
					// jQuery(".Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?>> div").css("height","auto");
					// jQuery(".Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?>> div").css("display","none");
				});
			</script>
			<script>
			jQuery(document).ready(function() {
				var d_height = jQuery('.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?> > h3').height();
				jQuery('.Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?>').Rich_Web_Tabs_Accordion_Content_<?=$Rich_Web_Tabs?>({
						collapsible<?=$Rich_Web_Tabs?>: true,
					});
			});
			</script>
			
			
			<?php }
			?>
				<script>
 		 		(function ( $ ) {
				    $.fn.turbotabs<?php echo $Rich_Web_Tabs;?> = function(options){
				        // setting the defaults
				        var settings<?php echo $Rich_Web_Tabs;?> = $.extend({
				            mode: 'horizontal',
				            width: '100%',
				            animation: 'Scale',
				            cb_after_animation: function(){},
				        },options);
				        if( settings<?php echo $Rich_Web_Tabs;?>.deinitialize === 'true' ){
				            return
				        }
				        var tabs<?php echo $Rich_Web_Tabs;?> = this.find('.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?>');
				        var container<?php echo $Rich_Web_Tabs;?> = this.find('.Rich_Web_Tabs_tt_container<?php echo $Rich_Web_Tabs;?>');
				        var tab<?php echo $Rich_Web_Tabs;?>=this.find('.Rich_Web_Tabs_tt_container<?php echo $Rich_Web_Tabs;?> .Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?>'); 
				       
				        var tabLength<?php echo $Rich_Web_Tabs;?> = tab<?php echo $Rich_Web_Tabs;?>.length;
				        // console.log(tab<?php echo $Rich_Web_Tabs;?>);
				        var sel<?php echo $Rich_Web_Tabs;?> = this;
				        var random<?php echo $Rich_Web_Tabs;?> =  'tab<?php echo $Rich_Web_Tabs;?>-' + Math.floor( Math.random() * 100 ); // for assigning random class (tobe used for hover effect)
				        var animation = settings<?php echo $Rich_Web_Tabs;?>.animation;
				        var animationIn = '';
				        var animationOut = '';
				        var once<?php echo $Rich_Web_Tabs;?> = 0;
				        var primWidth<?php echo $Rich_Web_Tabs;?> = []; // create an array that will store the primary widths, before resizing (used in responsive function)
				        var tabsResponsive<?php echo $Rich_Web_Tabs;?> = false;
				        var timer<?php echo $Rich_Web_Tabs;?> = 340;
				        var tabHeights<?php echo $Rich_Web_Tabs;?> = '';
				        var maxHeight<?php echo $Rich_Web_Tabs;?> = '';

				        setTimeout(function(){ // delay setting the heigh for small interval, giving it a time to collect right value
				        calcHeight<?php echo $Rich_Web_Tabs;?>();
				        },150);
				        if( settings<?php echo $Rich_Web_Tabs;?>.mode == 'vertical' ){ // check if mode is set to vertical
				            sel<?php echo $Rich_Web_Tabs;?>.addClass('vertical');
				        }
				        // applying the color, background and other options to the actual tab<?php echo $Rich_Web_Tabs;?>
				        this.css({width: settings<?php echo $Rich_Web_Tabs;?>.width,});
				        /*==============================================
				                            ANIMATIONS
				        ================================================*/
				        function return_animation<?php echo $Rich_Web_Tabs;?>(animation){
				            if( 'Scale' === animation ){
				                animationIn = 'zoomIn';
				                animationOut = 'zoomOut';
				            }
				            else if( 'FadeUp' === animation ){
				                animationIn = 'fadeInUp';
				                animationOut = 'fadeOutDown';
				            }
				            else if( 'FadeDown' === animation ){
				                animationIn = 'fadeInDown';
				                animationOut = 'fadeOutUp';
				            }
				            else if( 'FadeLeft' === animation ){
				                animationIn = 'fadeInLeft';
				                animationOut = 'fadeOutLeft';
				            }
				            else if( 'FadeRight' === animation ){
				                animationIn = 'fadeInRight';
				                animationOut = 'fadeOutRight';
				            }
				             else if( 'SlideUp' === animation ){
				                animationIn = 'slideInUp';
				                animationOut = 'slideOutUp';
				                timer<?php echo $Rich_Web_Tabs;?> = 80;
				            }
				            else if( 'SlideDown' === animation ){
				                animationIn = 'slideInDown';
				                animationOut = 'slideOutDown';
				                timer<?php echo $Rich_Web_Tabs;?> = 80;
				            }
				            else if( 'SlideLeft' === animation ){
				                animationIn = 'slideInLeft';
				                animationOut = 'slideOutLeft';
				                timer<?php echo $Rich_Web_Tabs;?> = 80;
				            }
				            else if( 'SlideRight' === animation ){
				                animationIn = 'slideInRight';
				                animationOut = 'slideOutRight';
				                timer<?php echo $Rich_Web_Tabs;?> = 80;
				            }
				            else if( 'ScrollDown' === animation ){
				                animationIn = 'fadeInUp';
				                animationOut = 'fadeOutUp';
				            }
				            else if( 'ScrollUp' === animation ){
				                animationIn = 'fadeInDown';
				                animationOut = 'fadeOutDown';
				            }
				            else if( 'ScrollRight' === animation ){
				                animationIn = 'fadeInLeft';
				                animationOut = 'fadeOutRight';
				            }
				            else if( 'ScrollLeft' === animation ){
				                animationIn = 'fadeInRight';
				                animationOut = 'fadeOutLeft';
				            }
				            else if( 'Bounce' === animation ){
				                animationIn = 'bounceIn';
				                animationOut = 'bounceOut';
				            }
				            else if( 'BounceLeft' === animation ){
				                animationIn = 'bounceInLeft';
				                animationOut = 'bounceOutLeft';
				            }
				            else if( 'BounceRight' === animation ){
				                animationIn = 'bounceInRight';
				                animationOut = 'bounceOutRight';
				            }
				            else if( 'BounceDown' === animation ){
				                animationIn = 'bounceInDown';
				                animationOut = 'bounceOutDown';
				            }
				            else if( 'BounceUp' === animation ){
				                animationIn = 'bounceInUp';
				                animationOut = 'bounceOutUp';
				            } 
				            else if( 'HorizontalFlip' === animation ){
				                animationIn = 'flipInX';
				                animationOut = 'flipOutX';
				            }
				            else if( 'VerticalFlip' === animation ){
				                animationIn = 'flipInY';
				                animationOut = 'flipOutY';
				            }
				            else if( 'RotateDownLeft' === animation ){
				                animationIn = 'rotateInDownLeft';
				                animationOut = 'rotateOutDownLeft';
				            }
				            else if( 'RotateDownRight' === animation ){
				                animationIn = 'rotateInDownRight';
				                animationOut = 'rotateOutDownRight';
				            } 
				            else if( 'RotateUpLeft' === animation ){
				                animationIn = 'rotateInUpLeft';
				                animationOut = 'rotateOutUpLeft';
				            }
				            else if( 'RotateUpRight' === animation ){
				                animationIn = 'rotateInUpRight';
				                animationOut = 'rotateOutUpRight';
				            } 
				            else if( 'TopZoom' === animation ){
				                animationIn = 'zoomInUp';
				                animationOut = 'zoomOutUp';
				            }
				            else if( 'BottomZoom' === animation ){
				                animationIn = 'zoomInDown';
				                animationOut = 'zoomOutDown';
				            }
				            else if( 'LeftZoom' === animation ){
				                animationIn = 'zoomInLeft';
				                animationOut = 'zoomOutLeft';
				            }
				            else if( 'RightZoom' === animation ){
				                animationIn = 'zoomInRight';
				                animationOut = 'zoomOutRight';
				            }
				        }

				        /*==============================================
				                       Initialize Tabs
				        ===============================================*/
				        return_animation<?php echo $Rich_Web_Tabs;?>(animation);
				        var $tag<?php echo $Rich_Web_Tabs;?>;
				        function resp<?php echo $Rich_Web_Tabs;?>(p){
				        	$tag<?php echo $Rich_Web_Tabs;?> = $(p).parent();
				        }
				        resp<?php echo $Rich_Web_Tabs;?>;
				        jQuery(window).resize(function(){
				            resp<?php echo $Rich_Web_Tabs;?>;
				        })
				        jQuery(".Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?>>li>span").on('click', function(){
				            resp<?php echo $Rich_Web_Tabs;?>(this);
				            if( true === tabsResponsive<?php echo $Rich_Web_Tabs;?> ){
				                if( !$tag<?php echo $Rich_Web_Tabs;?>.hasClass("active") ) {
				                	$tag<?php echo $Rich_Web_Tabs;?>.addClass('active').find('.Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?>').slideDown(400, settings<?php echo $Rich_Web_Tabs;?>.cb_after_animation).parent().siblings().removeClass('active').find('.Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?>').slideUp();
				                } else {
				                    $tag<?php echo $Rich_Web_Tabs;?>.removeClass('active').find('.Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?>').slideUp();
				                }// else
				            } else {

				                if( !$tag<?php echo $Rich_Web_Tabs;?>.hasClass("active") ) {
				                    if( 'random<?php echo $Rich_Web_Tabs;?>' === animation ){
				                        var animations_array<?php echo $Rich_Web_Tabs;?> = Array("Scale","Bounce","FadeUp","FadeDown","FadeLeft","FadeRight","SlideUp","SlideDown","SlideLeft","SlideRight","ScrollUp","ScrollDown","ScrollLeft","ScrollRight","BounceUp","BounceDown","BounceLeft","BounceRight","HorizontalFlip","VerticalFlip","RotateDownLeft","RotateDownRight","RotateUpLeft","RotateUpRight","TopZoom","BottomZoom","LeftZoom","RightZoom");
				                        var rand_animation<?php echo $Rich_Web_Tabs;?> = animations_array<?php echo $Rich_Web_Tabs;?>[Math.floor(Math.random()*animations_array<?php echo $Rich_Web_Tabs;?>.length)];
				                        return_animation<?php echo $Rich_Web_Tabs;?>(rand_animation<?php echo $Rich_Web_Tabs;?>);
				                    }
				                    var index<?php echo $Rich_Web_Tabs;?> = $tag<?php echo $Rich_Web_Tabs;?>.index();
				                    var current<?php echo $Rich_Web_Tabs;?> = $tag<?php echo $Rich_Web_Tabs;?>;
				                    $tag<?php echo $Rich_Web_Tabs;?>.parent().find("li.active").removeClass("active");
				                    $tag<?php echo $Rich_Web_Tabs;?>.addClass("active");
				                    $tag<?php echo $Rich_Web_Tabs;?>.closest(sel<?php echo $Rich_Web_Tabs;?>).find("div.Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?>.active").attr('class', 'Rich_Web_Tabs_tt_tab Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?> Rich_Web_Tabs_animated ' + animationOut); 
				                     setTimeout(function(){
				                        current<?php echo $Rich_Web_Tabs;?>.closest(sel<?php echo $Rich_Web_Tabs;?>).find("div.Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?>").eq(index<?php echo $Rich_Web_Tabs;?>).attr('class', 'Rich_Web_Tabs_tt_tab Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?> active Rich_Web_Tabs_animated '+ animationIn);
				                        settings<?php echo $Rich_Web_Tabs;?>.cb_after_animation();
				                    },timer<?php echo $Rich_Web_Tabs;?>);
				                }// if
				            }// else
				        });
				        /*==============================================
				                        RESPONSIVENESS
				        ===============================================*/
				        // create variables that will store values that will be added later
				            var tabsWidth<?php echo $Rich_Web_Tabs;?> = 0;
				            var currWidth<?php echo $Rich_Web_Tabs;?> = 0;
				            var conWidth<?php echo $Rich_Web_Tabs;?> = 0;
				            var mobile<?php echo $Rich_Web_Tabs;?> = true;
				            var tabW<?php echo $Rich_Web_Tabs;?> = 0;
				            var called<?php echo $Rich_Web_Tabs;?> = 0;
				            var resized<?php echo $Rich_Web_Tabs;?> = 0;
				            primWidth<?php echo $Rich_Web_Tabs;?>['resized<?php echo $Rich_Web_Tabs;?>'] = 0;           
				            calcWidth<?php echo $Rich_Web_Tabs;?>(); 
				        if( settings<?php echo $Rich_Web_Tabs;?>.mode != 'accordion' ) {   

				            if( settings<?php echo $Rich_Web_Tabs;?>.mode != 'vertical' ) {
				               
				                if( tabW<?php echo $Rich_Web_Tabs;?> < tabsWidth<?php echo $Rich_Web_Tabs;?> + 20 ){ // if starting from small screen transform it to accordion now
				                    resize<?php echo $Rich_Web_Tabs;?>(); 

				                    mobile<?php echo $Rich_Web_Tabs;?> = true;
				                }
				                
				                $(window).resize(function(){
				                	
				                    // resp<?php echo $Rich_Web_Tabs;?>(this);
				                    var windowWidth<?php echo $Rich_Web_Tabs;?> = parseInt( $(window).outerWidth() ); // check for device width;
				                    calcWidth<?php echo $Rich_Web_Tabs;?>(); //callback

				                    if( !mobile<?php echo $Rich_Web_Tabs;?>) { // if viewed on larger screen and then resized<?php echo $Rich_Web_Tabs;?> to smaller one 
				                       
				                        if( true === tabsResponsive<?php echo $Rich_Web_Tabs;?> && currWidth<?php echo $Rich_Web_Tabs;?> > primWidth<?php echo $Rich_Web_Tabs;?>['container<?php echo $Rich_Web_Tabs;?>'] ||  tabs<?php echo $Rich_Web_Tabs;?>.width() > primWidth<?php echo $Rich_Web_Tabs;?>['container<?php echo $Rich_Web_Tabs;?>'] ){
				                           resize<?php echo $Rich_Web_Tabs;?>(); 
				                           $("div.Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?>").removeClass('Rich_Web_Tabs_animated');
				                        } else if( false === tabsResponsive<?php echo $Rich_Web_Tabs;?> && tabW<?php echo $Rich_Web_Tabs;?> < ( tabsWidth<?php echo $Rich_Web_Tabs;?> + 10 ) ){
				                           
				                           reset<?php echo $Rich_Web_Tabs;?>(); 
				                        } else if( primWidth<?php echo $Rich_Web_Tabs;?>['resized<?php echo $Rich_Web_Tabs;?>'] != 0 ){
				                            
				                            if( currWidth<?php echo $Rich_Web_Tabs;?> > primWidth<?php echo $Rich_Web_Tabs;?>['resized<?php echo $Rich_Web_Tabs;?>'] + 40 ) {

				                                resize<?php echo $Rich_Web_Tabs;?>(); 
				                            }

				                        }

				                    } else { 
				                        
				                       // if starting from small screen
				                       if( windowWidth<?php echo $Rich_Web_Tabs;?> <= 553 ) {
				                       //alert(111);
				                           //if(  true === tabsResponsive<?php echo $Rich_Web_Tabs;?> && currWidth<?php echo $Rich_Web_Tabs;?> > primWidth<?php echo $Rich_Web_Tabs;?>['container<?php echo $Rich_Web_Tabs;?>']  * 1.5 ) { 
				                             
				                                reset<?php echo $Rich_Web_Tabs;?>(); 
				                                $("div.Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?>").removeClass('Rich_Web_Tabs_animated');
				                                setTimeout(function(){
				                                calcHeight<?php echo $Rich_Web_Tabs;?>();    
				                                if( 1 === once<?php echo $Rich_Web_Tabs;?> ){
				                                    primWidth<?php echo $Rich_Web_Tabs;?>['disposal'] = tabW<?php echo $Rich_Web_Tabs;?> + 130;
				                                } //if
				                                },120);
				                                
				                            //} //if 
				                            
				                        } else if( windowWidth<?php echo $Rich_Web_Tabs;?> >= 553  ){
				                              
				                            var zbr = tabs<?php echo $Rich_Web_Tabs;?>.find('li').length * 170; // calculate approximate width for each tab<?php echo $Rich_Web_Tabs;?> nav
				                            if( currWidth<?php echo $Rich_Web_Tabs;?> > zbr ) {
				                                //alert(2)
				                                resize<?php echo $Rich_Web_Tabs;?>();
				                            } else {
				                                //alert(22)
				                                 resize<?php echo $Rich_Web_Tabs;?>();
				                            }
				                        }    
				                    }//else
				                }); //window.resize()
				            } else { // if vertical mode 
				                var windowWidth<?php echo $Rich_Web_Tabs;?> = parseInt( $(window).outerWidth() );
				                
				                if( windowWidth<?php echo $Rich_Web_Tabs;?> < 760 ){ // if starting from small screen transform it to accordion now
				                       reset<?php echo $Rich_Web_Tabs;?>();
				                       mobile<?php echo $Rich_Web_Tabs;?> = true;
				                       $("div.Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?>").removeClass('Rich_Web_Tabs_animated');
				                }

				                $(window).resize(function(){
				                    // resp<?php echo $Rich_Web_Tabs;?>(this);
				                    windowWidth<?php echo $Rich_Web_Tabs;?> = parseInt( $(window).outerWidth() ); //  updatedevice width;
				                    calcWidth<?php echo $Rich_Web_Tabs;?>(); 
				                    if( !mobile<?php echo $Rich_Web_Tabs;?> ) { // if viewed on larger screen and then resized<?php echo $Rich_Web_Tabs;?> to smaller one
				                        if( windowWidth<?php echo $Rich_Web_Tabs;?> < 553 ){
				                            reset<?php echo $Rich_Web_Tabs;?>(); 
				                        } else {
				                            resize<?php echo $Rich_Web_Tabs;?>(); 
				                        }  
				                    } else {

				                        if( windowWidth<?php echo $Rich_Web_Tabs;?> > 553 ){
				                            resize<?php echo $Rich_Web_Tabs;?>();
				                            setTimeout(function(){
				                                calcHeight<?php echo $Rich_Web_Tabs;?>();    
				                            },120);
				                        } else {
				                            reset<?php echo $Rich_Web_Tabs;?>();
				                        }//else

				                    }//else
				                });//window.resize()
				            } // else (is vertical)
				        } else {
				            // alert(111);
				            reset<?php echo $Rich_Web_Tabs;?>();
				        }//else( is accordion)
				        
				        /*==============================================
				                        HELPER FUNCTIONS
				        ===============================================*/
				        function calcWidth<?php echo $Rich_Web_Tabs;?>(){
				            // resp<?php echo $Rich_Web_Tabs;?>(this);
				             // reset<?php echo $Rich_Web_Tabs;?> variables before adding new values
				             tabsWidth<?php echo $Rich_Web_Tabs;?> = 0;
				             currWidth<?php echo $Rich_Web_Tabs;?> = 0;
				             conWidth<?php echo $Rich_Web_Tabs;?> = 0;
				             // get the widths of both navigations and container<?php echo $Rich_Web_Tabs;?>
				             currWidth<?php echo $Rich_Web_Tabs;?> = parseInt( tabs<?php echo $Rich_Web_Tabs;?>.find('li').first().outerWidth(true) ); // get current<?php echo $Rich_Web_Tabs;?> width of resized<?php echo $Rich_Web_Tabs;?> tab<?php echo $Rich_Web_Tabs;?> li
				             conWidth<?php echo $Rich_Web_Tabs;?> = parseInt( container<?php echo $Rich_Web_Tabs;?>.outerWidth(true) );
				             if( tabsResponsive<?php echo $Rich_Web_Tabs;?> === false ){
				                 tabs<?php echo $Rich_Web_Tabs;?>.find('li').each(function(){ // loop through navs and add width to variable
				                    tabsWidth<?php echo $Rich_Web_Tabs;?> += parseInt( $(this).outerWidth(true) );
				                 }); //if
				            } else {
				                tabsWidth<?php echo $Rich_Web_Tabs;?> = primWidth<?php echo $Rich_Web_Tabs;?>['tabs<?php echo $Rich_Web_Tabs;?>'];
				            }//else
				            // use the array created in the beginning to store primary widths
				            //make sure that this process is done only once<?php echo $Rich_Web_Tabs;?> (preventing the new values to override the old ones)
				            if( 0 === once<?php echo $Rich_Web_Tabs;?> ) {
				                once<?php echo $Rich_Web_Tabs;?>++ ;
				                primWidth<?php echo $Rich_Web_Tabs;?>['tabs<?php echo $Rich_Web_Tabs;?>'] = tabsWidth<?php echo $Rich_Web_Tabs;?> + 10;
				                primWidth<?php echo $Rich_Web_Tabs;?>['container<?php echo $Rich_Web_Tabs;?>'] = conWidth<?php echo $Rich_Web_Tabs;?>;
				            } else if ( 0 === once<?php echo $Rich_Web_Tabs;?> && mobile<?php echo $Rich_Web_Tabs;?> ){
				                primWidth<?php echo $Rich_Web_Tabs;?>['container<?php echo $Rich_Web_Tabs;?>'] = sel<?php echo $Rich_Web_Tabs;?>.find('.Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?> li.active .Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?>').width();
				            }
				            tabW<?php echo $Rich_Web_Tabs;?> = parseInt( $('.Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?>').width() );
				        }// calcWidth<?php echo $Rich_Web_Tabs;?>()

				        function calcHeight<?php echo $Rich_Web_Tabs;?>(){
				            //seting the the tab<?php echo $Rich_Web_Tabs;?> content height to the tallest tab<?php echo $Rich_Web_Tabs;?> content
				            // src = http://stackoverflow.com/questions/6781031/use-jquery-css-to-find-the-tallest-of-all-elements
				            // Get an array of all element heights
				            // console.log(tab<?php echo $Rich_Web_Tabs;?>);
				            tabHeights<?php echo $Rich_Web_Tabs;?> = tab<?php echo $Rich_Web_Tabs;?>.map(function() {
				            return $(this).outerHeight(true);
				            }).get();
				            // console.log(tab<?php echo $Rich_Web_Tabs;?>);
				            // Math.max takes a variable number of arguments
				            // `apply` is equivalent to passing each height as an argument
				            maxHeight<?php echo $Rich_Web_Tabs;?> = Math.max.apply(null, tabHeights<?php echo $Rich_Web_Tabs;?>);
				            container<?php echo $Rich_Web_Tabs;?>.css('min-height', (maxHeight<?php echo $Rich_Web_Tabs;?>+20)+"px");
				            container<?php echo $Rich_Web_Tabs;?>.css('height', "auto");
				        }

				        function reset<?php echo $Rich_Web_Tabs;?>(){ 
				        // transform tab<?php echo $Rich_Web_Tabs;?> to accordion if number of nav tabs exceeds container<?php echo $Rich_Web_Tabs;?> width
				            tabsResponsive<?php echo $Rich_Web_Tabs;?> = true;
				            if( called<?php echo $Rich_Web_Tabs;?> === 0 ){
				                primWidth<?php echo $Rich_Web_Tabs;?>['resized<?php echo $Rich_Web_Tabs;?>'] = parseInt( container<?php echo $Rich_Web_Tabs;?>.width() );
				                called<?php echo $Rich_Web_Tabs;?>++;
				            }
				            // sel.addClass('responsive');
				            jQuery(".Rich_Web_Tabs_Tab").each(function(){
				            	jQuery(this).addClass("responsive");
				            })
				            
				            if( tabs<?php echo $Rich_Web_Tabs;?>.find('li').first().find('h3').length != 1 ){
				                // tabs.find('li').wrapInner('<h3></h3>');
				            }
				            // resp<?php echo $Rich_Web_Tabs;?>(this);
				            var index<?php echo $Rich_Web_Tabs;?> = -1;
				            var zbir<?php echo $Rich_Web_Tabs;?> = tab<?php echo $Rich_Web_Tabs;?>.length;
				            // console.log(jQuery(".Rich_Web_Tabs_tt_tab").length);
				            // console.log(jQuery(".Rich_Web_Tabs_tt_tabs li").length);
				            for(var i=0;i<jQuery(".Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?>").length;i++){
				            	(jQuery(".Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?>").eq(i)).appendTo(jQuery(".Rich_Web_Tabs_tt_tabs<?php echo $Rich_Web_Tabs;?> li").eq(i));
				            }

				            for( var i = 0; i < zbir<?php echo $Rich_Web_Tabs;?>; i++ ){
				                (tab<?php echo $Rich_Web_Tabs;?>.eq(i)).appendTo(tabs<?php echo $Rich_Web_Tabs;?>.find('> li').eq(i));
				            }

				            if( resized<?php echo $Rich_Web_Tabs;?> === 0 ){
				                resized<?php echo $Rich_Web_Tabs;?>++;
				            }
				            // console.log(resized<?php echo $Rich_Web_Tabs;?>);
				            sel<?php echo $Rich_Web_Tabs;?>.find('.Rich_Web_Tabs_tt_tabs .Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?>').not('.active').slideUp();
				            sel<?php echo $Rich_Web_Tabs;?>.find('.Rich_Web_Tabs_tt_tabs').removeClass('Rich_Web_Tabs_tabs_2').addClass('Rich_Web_Tabs_tabs_1');
				            sel<?php echo $Rich_Web_Tabs;?>.find('.Rich_Web_Tabs_tt_tabs').removeClass('Rich_Web_Tabs_tabs_3').addClass('Rich_Web_Tabs_tabs_1');
				            sel<?php echo $Rich_Web_Tabs;?>.find('.Rich_Web_Tabs_tt_tabs').removeClass('Rich_Web_Tabs_tabs_4').addClass('Rich_Web_Tabs_tabs_1');
				            sel<?php echo $Rich_Web_Tabs;?>.find('.Rich_Web_Tabs_tt_tabs').removeClass('Rich_Web_Tabs_tabs_5').addClass('Rich_Web_Tabs_tabs_1');
				            sel<?php echo $Rich_Web_Tabs;?>.find('.Rich_Web_Tabs_tt_tabs').removeClass('Rich_Web_Tabs_tabs_6').addClass('Rich_Web_Tabs_tabs_1');
				            sel<?php echo $Rich_Web_Tabs;?>.find('.Rich_Web_Tabs_tt_tabs').removeClass('Rich_Web_Tabs_tabs_7').addClass('Rich_Web_Tabs_tabs_1');
				            sel<?php echo $Rich_Web_Tabs;?>.find('.Rich_Web_Tabs_tt_tabs').removeClass('Rich_Web_Tabs_tabs_8').addClass('Rich_Web_Tabs_tabs_1');
				            sel<?php echo $Rich_Web_Tabs;?>.find('.Rich_Web_Tabs_tt_tabs').removeClass('Rich_Web_Tabs_tabs_9').addClass('Rich_Web_Tabs_tabs_1');
				            sel<?php echo $Rich_Web_Tabs;?>.find('.Rich_Web_Tabs_tt_tabs').removeClass('Rich_Web_Tabs_tabs_11').addClass('Rich_Web_Tabs_tabs_1');
				            sel<?php echo $Rich_Web_Tabs;?>.find('.Rich_Web_Tabs_tt_tabs').removeClass('Rich_Web_Tabs_tabs_12').addClass('Rich_Web_Tabs_tabs_1');
				            sel<?php echo $Rich_Web_Tabs;?>.find('.Rich_Web_Tabs_tt_tabs').removeClass('Rich_Web_Tabs_tabs_13').addClass('Rich_Web_Tabs_tabs_1');
				            sel<?php echo $Rich_Web_Tabs;?>.find('.Rich_Web_Tabs_tt_tabs').removeClass('Rich_Web_Tabs_tabs_14').addClass('Rich_Web_Tabs_tabs_1');
				            sel<?php echo $Rich_Web_Tabs;?>.find('.Rich_Web_Tabs_tt_tabs').removeClass('Rich_Web_Tabs_tabs_15').addClass('Rich_Web_Tabs_tabs_1');

				          
				            $("div.Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?>").removeClass('Rich_Web_Tabs_animated');
				        }// reset<?php echo $Rich_Web_Tabs;?>

				        function resize<?php echo $Rich_Web_Tabs;?>(){ // reset<?php echo $Rich_Web_Tabs;?> accordion to tab<?php echo $Rich_Web_Tabs;?> again
				            // resp<?php echo $Rich_Web_Tabs;?>(this);
				            if( !mobile<?php echo $Rich_Web_Tabs;?> && settings<?php echo $Rich_Web_Tabs;?>.mode != 'vertical' ){
				                tabsWidth<?php echo $Rich_Web_Tabs;?> = 0;
				                currWidth<?php echo $Rich_Web_Tabs;?> = 0;
				                conWidth<?php echo $Rich_Web_Tabs;?> = 0;
				             }
				            var activeIndex<?php echo $Rich_Web_Tabs;?> = tabs<?php echo $Rich_Web_Tabs;?>.find('li.active').index();
				            sel<?php echo $Rich_Web_Tabs;?>.removeClass('responsive');  
				            tabsResponsive<?php echo $Rich_Web_Tabs;?> = false;
				            tabs<?php echo $Rich_Web_Tabs;?>.find('li').each(function(){
				                var h3 = $(this).find('h3');
				                var value = h3.html();
				                $(this).find('.Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?>').appendTo(container<?php echo $Rich_Web_Tabs;?>);
				                $(this).html(value).find(h3).remove();
				                tab<?php echo $Rich_Web_Tabs;?>.css('display', 'block');
				            });
				            tabs<?php echo $Rich_Web_Tabs;?>.find('li').eq(activeIndex<?php echo $Rich_Web_Tabs;?>).addClass('active').siblings().removeClass('active');
				            container<?php echo $Rich_Web_Tabs;?>.find('.Rich_Web_Tabs_tt_tab<?php echo $Rich_Web_Tabs;?>').eq(activeIndex<?php echo $Rich_Web_Tabs;?>).addClass('active').siblings().removeClass('active');
				            if( mobile<?php echo $Rich_Web_Tabs;?> ){
				                tabW<?php echo $Rich_Web_Tabs;?> = 0;
				                tabs<?php echo $Rich_Web_Tabs;?>.find('li').each(function(){ // loop through navs and add width to variable
				                    tabW<?php echo $Rich_Web_Tabs;?> += parseInt( $(this).outerWidth(true) ); 
				                });    
				                conWidth<?php echo $Rich_Web_Tabs;?> = parseInt( container<?php echo $Rich_Web_Tabs;?>.outerWidth(true) );
				            }   
				        }// resize
				       
				        return this;

				    }; // turbotabs<?php echo $Rich_Web_Tabs;?>

				}( jQuery ));
 		 	</script>
			<?php
 		 	echo $after_widget;
 		}
	}
?>