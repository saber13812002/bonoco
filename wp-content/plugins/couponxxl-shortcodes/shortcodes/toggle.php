<?php
function couponxxl_toggle_func( $atts, $content ){
	extract( shortcode_atts( array(
		'title' => '',
		'toggle_content' => '',
		'state' => '',
	), $atts ) );

	$rnd = couponxxl_random_string();

	return '
		<div class="panel-group shortcode" id="accordion_'.$rnd.'" role="tablist" aria-multiselectable="true">
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="heading_'.$rnd.'">
		      <div class="panel-title">
		        <a class="'.( $state == 'in' ? '' : 'collapsed' ).'" data-toggle="collapse" data-parent="#accordion_'.$rnd.'" href="#coll_'.$rnd.'" aria-expanded="true" aria-controls="coll_'.$rnd.'">
		        	'.$title.'
		        	<i class="fa fa-chevron-circle-down animation"></i>
		        </a>
		      </div>
		    </div>
		    <div id="coll_'.$rnd.'" class="panel-collapse collapse '.$state.'" role="tabpanel" aria-labelledby="heading_'.$rnd.'">
		      <div class="panel-body">
		        '.apply_filters( 'the_content', $toggle_content ).'
		      </div>
		    </div>
		  </div>
		</div>';
}

add_shortcode( 'toggle', 'couponxxl_toggle_func' );

function couponxxl_toggle_params(){
	return array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Title","couponxxl"),
			"param_name" => "title",
			"value" => '',
			"description" => esc_html__("Input toggle title.","couponxxl")
		),
		array(
			"type" => "textarea_raw_html",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Content","couponxxl"),
			"param_name" => "toggle_content",
			"value" => '',
			"description" => esc_html__("Input toggle title.","couponxxl")
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Default State","couponxxl"),
			"param_name" => "state",
			"value" => array(
				esc_html__( 'Closed', 'couponxxl' ) => '',
				esc_html__( 'Opened', 'couponxxl' ) => 'in',
			),
			"description" => esc_html__("Select default toggle state.","couponxxl")
		),

	);
}

if( function_exists( 'vc_map' ) ){
	vc_map( array(
	   "name" => esc_html__("Toggle", 'couponxxl'),
	   "base" => "toggle",
	   "category" => esc_html__('Content', 'couponxxl'),
	   "params" => couponxxl_toggle_params()
	) );
}

?>