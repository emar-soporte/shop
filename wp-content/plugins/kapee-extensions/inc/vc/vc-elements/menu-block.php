<?php
/*
Element: Menu Block
*/
class vcMenuBlock extends WPBakeryShortCode {

    function __construct() {
        $this->_mapping();
        add_shortcode( 'kapee_menu_block', array( $this, '_html' ) );
	}
	public function _mapping() {
		if ( !defined( 'WPB_VC_VERSION' ) ) { return; }		
		vc_map( array(
			'name' 			=> esc_html__( 'Menu Block', 'kapee-extensions' ),
			'base' 			=> 'kapee_menu_block',
			'as_parent' 	=> array( 'only' => 'kapee_menu_item' ),
			'category' 		=> esc_html__( 'Kapee', 'kapee-extensions' ),
			'description' 	=> esc_html__( 'Display menu block.', 'kapee-extensions' ),
        	'icon' 			=> KAPEE_URI.'/inc/admin/assets/images/vc-icon.png',
			'params' 		=> array(
				//General
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Title', 'kapee-extensions' ),
					'param_name' 	=> 'title',
					'description' 	=> esc_html__( 'Enter menu title.', 'kapee-extensions' ),
					'admin_label'	=> true,
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Menu icon/image', 'kapee-extensions' ),
					'value' 		=> array(
						esc_html__( 'Default', 'kapee-extensions' ) 	=> '',
						esc_html__( 'With icon', 'kapee-extensions' ) 	=> 'icon',
						esc_html__( 'With image', 'kapee-extensions' ) 	=> 'image'
					),
					'param_name' 	=> 'menu_block_icon_image'
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__('Icon library', 'kapee-extensions'),
					'value' 		=> array(
						esc_html__('Font Awesome', 'kapee-extensions') 	=> 'fontawesome',
						esc_html__('Open Iconic', 'kapee-extensions') 	=> 'openiconic',
						esc_html__('Typicons', 'kapee-extensions') 		=> 'typicons',
						esc_html__('Entypo', 'kapee-extensions') 		=> 'entypo',
						esc_html__('Linecons', 'kapee-extensions')		=> 'linecons',
						esc_html__('Kapee Icons', 'kapee-extensions')	=> 'kapee',
					),
					'std'			=> 'fontawesome',
					'param_name' 	=> 'icon_type',
					'description' 	=> esc_html__('Select icon library.', 'kapee-extensions'),
					'dependency' 	=> array('element' => 'menu_block_icon_image', 'value' => array('icon')),
				),
				array(
					'type' 			=> 'iconpicker',
					'heading' 		=> esc_html__('Icon', 'kapee-extensions'),
					'param_name' 	=> 'icon_fontawesome',
					'value' 		=> 'fa fa-adjust', // default value to backend editor admin_label
					'settings' 		=> array(
						'emptyIcon' => false,
						// default true, display an "EMPTY" icon?
						'iconsPerPage' => 1000,
						// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
					),
					'dependency' 	=> array('element' => 'icon_type', 'value' => 'fontawesome'),
					'description' 	=> esc_html__('Select icon from library.', 'kapee-extensions'),
				),
				array(
					'type' 			=> 'iconpicker',
					'heading' 		=> esc_html__('Icon', 'kapee-extensions'),
					'param_name' 	=> 'icon_openiconic',
					'value' 		=> 'vc-oi vc-oi-dial', // default value to backend editor admin_label
					'settings' 		=> array(
						'emptyIcon' 	=> false, // default true, display an "EMPTY" icon?
						'type' 			=> 'openiconic',
						'iconsPerPage' 	=> 1000, // default 100, how many icons per/page to display
					),
					'dependency' 	=> array(
						'element' 		=> 'icon_type',
						'value' 		=> 'openiconic',
					),
					'description' 	=> esc_html__('Select icon from library.', 'kapee-extensions'),
				),
				array(
					'type' 			=> 'iconpicker',
					'heading' 		=> esc_html__('Icon', 'kapee-extensions'),
					'param_name' 	=> 'icon_typicons',
					'value' 		=> 'typcn typcn-adjust-brightness', // default value to backend editor admin_label
					'settings' 		=> array(
						'emptyIcon' 	=> false, // default true, display an "EMPTY" icon?
						'type' 			=> 'typicons',
						'iconsPerPage' 	=> 1000, // default 100, how many icons per/page to display
					),
					'dependency' 	=> array(
						'element' 	=> 'icon_type',
						'value' 	=> 'typicons',
					),
					'description' 	=> esc_html__('Select icon from library.', 'kapee-extensions'),
				),
				array(
					'type' 			=> 'iconpicker',
					'heading' 		=> esc_html__('Icon', 'kapee-extensions'),
					'param_name' 	=> 'icon_entypo',
					'value' 		=> 'entypo-icon entypo-icon-note', // default value to backend editor admin_label
					'settings' 		=> array(
						'emptyIcon' 	=> false, // default true, display an "EMPTY" icon?
						'type' 			=> 'entypo',
						'iconsPerPage' 	=> 1000, // default 100, how many icons per/page to display
					),
					'dependency' 	=> array(
						'element' 	=> 'icon_type',
						'value' 	=> 'entypo',
					),
				),
				array(
					'type'        	=> 'iconpicker',
					'heading'     	=> esc_html__( 'Icon', 'kapee-extensions' ),
					'param_name'  	=> 'icon_linecons',
					'value'  		=> 'vc_li vc_li-heart',
					'settings'    	=> array(
						'emptyIcon'    => true,
						'type'         => 'linecons',
						'iconsPerPage' => 1000,
					),
					'dependency'  	=> array(
						'element' 	=> 'icon_type',
						'value'   	=> 'linecons',
					),
				),
				array(
					'type'        	=> 'iconpicker',
					'heading'     	=> esc_html__( 'Icon', 'kapee-extensions' ),
					'param_name'  	=> 'icon_kapee',
					'value'  		=> 'kp kp-heart1',
					'settings'    	=> array(
						'emptyIcon'    => true,
						'type'         => 'kapee',
						'iconsPerPage' => 1000,
					),
					'dependency'  	=> array(
						'element' 	=> 'icon_type',
						'value'   	=> 'kapee',
					),
				),
				array(
					'type' 			=> 'attach_image',
					'heading' 		=> esc_html__( 'Image', 'kapee-extensions' ),
					'param_name' 	=> 'image',
					'value' 		=> '',
					'description' 	=> esc_html__( 'Select image from media library.', 'kapee-extensions' ),
					'dependency' 	=> array(
						'element' 	=> 'menu_block_icon_image',
						'value' 	=> array( 'image' ),
					),
				),
				array(
					'type' 			=> 'vc_link',
					'heading' 		=> esc_html__( 'Menu Link', 'kapee-extensions'),
					'param_name' 	=> 'link'
				),
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Label', 'kapee-extensions' ),
					'param_name' 	=> 'menu_label_txt',
					'description' 	=> esc_html__( 'Enter label.', 'kapee-extensions' )
				),
				array(
					'type' 			=> 'colorpicker',
					'heading' 		=> esc_html__( 'Label Color', 'kapee-extensions' ),
					'param_name' 	=> 'menu_label_color',
				),
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Extra class name', 'kapee-extensions' ),
					'param_name' 	=> 'el_class',
					'description' 	=> esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'kapee-extensions' )
				)				
			),
			'js_view' 				=> 'VcColumnView'
		) );
	}
	
	public function _html( $atts, $content ) {
		$args = ( shortcode_atts( array(
			'title' 				=> '',
			'menu_block_icon_image' => '',
			'icon_type' 				=> 'fontawesome',     
            'icon_fontawesome' 			=> 'fa fa-adjust',  
            'icon_openiconic' 			=> 'vc-oi vc-oi-dial',     
            'icon_typicons' 			=> 'typcn typcn-adjust-brightness',     
            'icon_entypo' 				=> 'entypo-icon entypo-icon-note',    
            'icon_linecons' 			=> 'vc_li vc_li-heart ',
			'icon_kapee' 			=> 'kp kp-heart1',
			'image' 				=> '',
			'link' 					=> '',
			'menu_label_txt' 		=> '',
			'menu_label_color' 		=> '',
			'el_class' 				=> ''				
		), $atts ) );
		extract( $args );
		
		$id 			= kapee_uniqid('kapee-menu-block-');		
		$class			= array();
		$class[]		= 'kapee-menu-element';
		$class[]		= 'kapee-megamenu-list';		
		$class[]		= $el_class;
		
		$liclass 		= 'menu-item';
		
		$icon_html 	= '';
		
		if($menu_block_icon_image == 'icon'){
			vc_icon_element_fonts_enqueue( $icon_type );
			$iconClass 	= $args["icon_". $icon_type];
			$icon_html = '<i class="' .  esc_attr($iconClass).' " aria-hidden="true"></i>';				
		} else if($menu_block_icon_image == 'image'){ 
			$icon_html = '<img src="'.esc_url(kapee_get_image_src($image,'thumbnail')).'" alt="Icon image">';
		}
		
		$attributes 		= kapee_get_link_attributes($link);
		$args['id'] 		= $id; 
		$args['class'] 		= implode(' ',array_filter($class));
		$args['liclass'] 	= $liclass; 
		$args['attributes'] = empty($attributes) ? ' href="#"' :$attributes;		
		$args['icon_html'] 	= $icon_html;		
		$args['label_html'] = kapee_menu_label($menu_label_txt,$menu_label_color,false);
		$args['content'] 	= $content;		
				
		ob_start();
			kapee_get_pl_templates('shortcodes/menu-block',$args );
		return ob_get_clean();
	}	
}
new vcMenuBlock();
?>