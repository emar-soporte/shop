<?php
/*
Element: Instagram
*/
class vcInstagram extends WPBakeryShortCode {

    function __construct() {
        $this->_mapping();
        add_shortcode( 'kapee_instagram', array( $this, '_html' ) );
	}
	public function _mapping() {
		if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
		
		vc_map( array(
			'name'			=> esc_html__( 'Instagram', 'kapee-extensions' ),
			'base'			=> 'kapee_instagram',
			'category' 		=> esc_html__( 'Kapee', 'kapee-extensions' ),
			'description' 	=> esc_html__( 'Instagram.', 'kapee-extensions' ),
        	'icon' 			=> KAPEE_URI.'/inc/admin/assets/images/vc-icon.png',
			'params' 		=> array(
				//General
				array(
					'type' 			=> 'kapee_title',
					'heading' 		=> wp_kses( __( 'You must need to installed/activated the <a target="_blank" href="https://wordpress.org/plugins/instagram-feed/">Smash Balloon Instagram Feed</a> plugin and connected your Instagram account via WP Dashboard > Instagram Feed.', 'kapee-extensions' ), 
										array(
												'a' => array(
												  'target' => array(),
												  'href' => array(),
												),
											) 
										),
					'param_name' 	=> 'notice',
				),
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Title', 'kapee-extensions' ),
					'param_name' 	=> 'title',
					'description' 	=> esc_html__( 'Enter title.', 'kapee-extensions' ),
					'std' 			=> esc_html__( 'Instagram', 'kapee-extensions' ),
					'admin_label'   	=> true,
				),
				array(
					'type' 				=> 'kapee_number',
					'param_name' 		=> 'number_of_photos',
					'heading' 			=> esc_html__( 'Number Of Photos', 'kapee-extensions' ),
					'description' 		=> esc_html__( 'Display maximum 33 photos.', 'kapee-extensions' ),
					'std' 				=> 8,
				),
				array(
					'type' 				=> 'kapee_number',
					'param_name' 		=> 'number_of_cols',
					'heading' 			=> esc_html__( 'Number Of Grid', 'kapee-extensions' ),
					'description' 		=> esc_html__( 'Display maximum 10.', 'kapee-extensions' ),
					'std' 				=> 8,
				),
				array(
					'type' 				=> 'dropdown',
					'param_name' 		=> 'size',
					'heading' 			=> esc_html__( 'Photo Size', 'kapee-extensions' ),
					'value' 			=> array(
						esc_html__('Thumbnail', 'kapee-extensions') => 'thumbnail',
						esc_html__('Medium', 'kapee-extensions') 	=> 'medium',
						esc_html__('Large', 'kapee-extensions') 	=> 'full',
					),
					'std' 				=> 'medium',
					"edit_field_class"	=> "vc_col-md-6",
				),
				
				array(
					'type' 				=> 'checkbox',
					'param_name' 		=> 'space_between_photos',
					'heading' 			=> esc_html__( 'Add Space Between Photos', 'kapee-extensions' ),
					'value' 			=> array( esc_html__( 'Yes, please', 'kapee-extensions' ) => 1 ),
					'std' 				=> 0,
				),
				array(
					'type' 				=> 'kapee_number',
					'param_name' 		=> 'space_photos',
					'heading' 			=> esc_html__( 'Sapce Between Photos', 'kapee-extensions' ),
					'description' 		=> esc_html__( 'Number of space between photos.', 'kapee-extensions' ),
					'std' 				=> 5,
					'dependency' 	=> array(
						'element' 	=> 'space_between_photos',
						'value' 	=> array( '1' ),
					),
				),
				array(
					'type' 				=> 'checkbox',
					'param_name' 		=> 'show_follow_button',
					'heading' 			=> esc_html__( 'Show Follow Button', 'kapee-extensions' ),
					'value' 			=> array( esc_html__( 'Yes', 'kapee-extensions' ) => 1 ),
					'std' 				=> 0,
					"edit_field_class"	=> "vc_col-md-6",
				),
				array(
					'type' 				=> 'textfield',
					'heading' 			=> esc_html__( 'Link Text', 'kapee-extensions' ),
					'param_name' 		=> 'follow_button_text',
					'description' 		=> esc_html__( 'Enter link text.', 'kapee-extensions' ),
					'std' 				=> esc_html__( 'Follow Us', 'kapee-extensions' ),
					'dependency' 	=> array(
						'element' 	=> 'show_follow_button',
						'value' 	=> array( '1' ),
					),
					"edit_field_class"	=> "vc_col-md-6",
				),
				array(
					'type' 				=> 'checkbox',
					'param_name' 		=> 'disablemobile',
					'heading' 			=> esc_html__( 'Disable mobile layout', 'kapee-extensions' ),
					'description' 		=> esc_html__( 'By default on mobile devices the layout automatically changes to use fewer columns. Checking this setting disables the mobile layout.', 'kapee-extensions' ),
					'value' 			=> array( esc_html__( 'Yes', 'kapee-extensions' ) => 1 ),
					'std' 				=> 0,
					"edit_field_class"	=> "vc_col-md-6",
				),
				( function_exists( 'vc_map_add_css_animation' ) ) ? vc_map_add_css_animation( true ) : '',
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Extra class name', 'kapee-extensions' ),
					'param_name' 	=> 'el_class',
					'description' 	=> esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'kapee-extensions' )
				),
				//Style
				array(
					'type' 			=> 'css_editor',
					'heading' 		=> esc_html__( 'CSS box', 'kapee-extensions' ),
					'param_name' 	=> 'css',
					'group' 		=> esc_html__( 'Design Options', 'kapee-extensions' )
				)
			),
		) );
	}
	
	public function _html( $atts, $content ) {
		$args = shortcode_atts( array(
			'title' 					=> 'Instagram',
			'number_of_photos' 			=> '8',
			'number_of_cols' 			=> '4',
			'size' 						=> 'medium',
			'space_between_photos'		=> 0,
			'space_photos'				=> 5,
			'show_follow_button'		=> 0,
			'follow_button_text' 		=> 'Follow Us',
			'disablemobile' 			=> 0,
			'css_animation' 			=> 'none',	
			'el_class'					=> '',
			"css"            			=> "", 	
		), $atts );		
		extract($args);
		
		$class					= array();
		$class[]				= 'kapee-element';
		$class[]				= 'kapee-instagram';
		$class[]				= $el_class;
		$class[]				= kapee_get_css_animation($css_animation);
		$css_class 				= vc_shortcode_custom_css_class( $css, ' ' );
		$class[]				= $css_class;
		$args['class'] 			= implode(' ',array_filter($class));
		$args['id'] 			= kapee_uniqid('kapee-instagram-');
		
		$num					= (int) $number_of_photos;
		$cols					= (int) $number_of_cols;
		$imagepadding			= $space_between_photos ? $space_photos : 0;
		$showfollow				= $show_follow_button ? 'true' : 'false';
		$followtext				= $follow_button_text;
		$args['num'] 			= $num ;
		$args['cols'] 			= $cols ;
		$args['imagepadding'] 	= $imagepadding ;
		$args['imageres'] 		= $size ;
		$args['showfollow'] 	= $showfollow ;
		$args['followtext'] 	= $followtext ;
		$args['disablemobile'] 	= $disablemobile ? true : false ;
		
		$args 					= wp_parse_args($args,$atts);
		ob_start();
			kapee_get_pl_templates('shortcodes/instagram',$args );	
		return ob_get_clean();
	}	
}
new vcInstagram();