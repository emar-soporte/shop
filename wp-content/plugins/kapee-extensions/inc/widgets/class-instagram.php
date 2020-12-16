<?php
/**
 *	Kapee Widget: Instagram
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if ( ! class_exists( 'Kapee_Widget_Base' ) ) {
	return;
}

class Kapee_Instagram extends Kapee_Widget_Base {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass 		= 'kapee-instageram';
        $this->widget_description 	= esc_html__("Display instagram images.", 'kapee-extensions');
        $this->widget_id 			= 'kapee-instagram';
        $this->widget_name 			= esc_html__('KP: Instagram', 'kapee-extensions');
		$this->settings = array(
            'title' => array(
                'type' 	=> 'text',
                'label' => esc_html__('Title:', 'kapee-extensions'),
                'std' 	=> esc_html__('Instagram', 'kapee-extensions'),
            ),
			'hide_title' => array(
                'type' 	=> 'checkbox',
                'label' => esc_html__('Hide Widget Title?', 'kapee-extensions'),
                'std' 	=> false,
            ),
			'number_of_photos' => array(
                'type' 	=> 'number',
                'label' => esc_html__('Number Of Photos:', 'kapee-extensions'),
				'std' 	=> 9,
            ),
			'size' => array(
                'type' => 'select',
                'label' 	=> esc_html__('Photo Size:', 'kapee-extensions'),
				'options' 	=> array(
                    'thumbnail' => esc_html__('Thumbnail', 'kapee-extensions'),
                    'medium' 	=> esc_html__('Medium', 'kapee-extensions'),
                    'full' 	=> esc_html__('Large', 'kapee-extensions'),
                ),
				'std' => 'thumbnail',
            ),			
			'link_text' => array(
                'type' 	=> 'text',
                'label' => esc_html__('Link Text:', 'kapee-extensions')
            ),
		);
		parent::__construct();
	}
	
	/**
     * Output widget.
     *
     * @see WP_Widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance){

        ob_start();
		
		$hide_title = (!empty($instance['hide_title'])) ? (bool) $instance['hide_title'] : false;
		if($hide_title) unset($instance['title']);
		
		$this->widget_start($args, $instance);
		
		do_action( 'kapee_before_instagram_widget');
		
		$username 			= (!empty($instance['username'])) ?  $instance['username'] : '';
		$size 				= ($instance['size']) ? esc_attr($instance['size']) : 'thumbnail';	
		$number_of_photos 	= (!empty($instance['number_of_photos'])) ?  $instance['number_of_photos'] : 9;
		$phone_number 		= (!empty($instance['phone_number'])) ?  $instance['phone_number'] : '';
		$link_text 			= (!empty($instance['link_text'])) ?  trim($instance['link_text']) : '';
		$num 				= $number_of_photos;
		$cols				= 3;
		$showfollow			= !empty($link_text) ? 'true' : 'false';
		$followtext			= $link_text;
		$disablemobile		= false;
		$imagepadding 		= 0;
		$imageres 			= $size;
		?>		
		<div class="kapee-instagram-widget">
			<div class="instagram-widget-wrap">
				<?php echo do_shortcode('[instagram-feed num='.$num.' cols='.$cols.' imagepadding='.$imagepadding.' imageres='.$imageres.' showheader=false showbutton=false showfollow='.$showfollow.' followtext="'.$followtext.'" disablemobile='.$disablemobile.']'); ?>	
			</div>
			
		</div>
		<?php
		do_action( 'kapee_after_instagram_widget');

		$this->widget_end($args);

        echo ob_get_clean();
    }

}