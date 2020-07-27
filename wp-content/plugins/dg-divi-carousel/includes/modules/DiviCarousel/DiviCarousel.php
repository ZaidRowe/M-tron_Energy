<?php

class DiviCarousel extends ET_Builder_Module {

	public $slug       = 'dica_divi_carousel';
	public $vb_support = 'on';
	public $child_slug = 'dica_divi_carouselitem';

	protected $module_credits = array(
		'module_uri' => 'https://www.divigear.com/',
		'author'     => 'DiviGear',
		'author_uri' => 'https://www.divigear.com',
	);

	public function init() {
		$this->name = esc_html__( 'Divi Carousel', 'et_builder' );
		$this->icon_path = plugin_dir_path( __FILE__ ). 'icon.svg';
	}

	public function get_settings_modal_toggles(){
		return array(
			'general'  => array(
					'toggles' => array(
							'main_content' 					=> esc_html__( 'Main Content', 'et_builder' ),
							'slider_settings'				=> esc_html__('Slider Settings', 'et_builder'),
							'advanced_slider'				=> esc_html__('Advanced Slider Settings', 'et_builder'),
					),
			),
			'advanced'  =>  array(
					'toggles'   =>  array(
							'image_overlay'		=> esc_html__('Overlay', 'et_buitlder'),
							'image_style'		=> esc_html__('Image', 'et_buitlder'),
							'image_border'		=> esc_html__('Image border', 'et_buitlder'),
							'title_style'		=> esc_html__('Title Text', 'et_buitlder'),
							'body_text_style'	=> esc_html__('Body Text', 'et_buitlder'),
							'next_prev_button'	=> esc_html__('Next & Previous Button', 'et_buitlder'),
							'color_settings'	=> esc_html__('Color Settings', 'et_buitlder'),
							'item_border'		=> esc_html__('Item Border', 'et_buitlder'),
					)
			),
		);
	}

	public function get_advanced_fields_config() {
		$advanced_fields = array();
		$advanced_fields['text'] = false;
		// Image
		$advanced_fields['fonts']  = array(
			// Title
			'title'   => array(
				'label'         => esc_html__( 'Title', 'et_builder' ),
				'toggle_slug'   => 'title_style',
				'tab_slug'		=> 'advanced',
				'hide_text_shadow'  => true,
				'line_height' => array(
						'default' => '1em',
					),
					'font_size' => array(
						'default' => '20px',
					),
				'css'      => array(
					'main' => "%%order_class%% .dica_divi_carouselitem .dica-item-content h4",
				),
			),
			// Body Text
			'body'   => array(
				'label'         => esc_html__( 'Body', 'et_builder' ),
				'toggle_slug'   => 'body_text_style',
				'tab_slug'		=> 'advanced',
				'hide_text_shadow'  => true,
				'line_height' => array(
						'default' => '1.7em',
					),
					'font_size' => array(
						'default' => '14px',
					),
				'css'      => array(
					'main' => "%%order_class%% .dica_divi_carouselitem .dica-item-content",
				),
			),

			'nav_icon'   => array(
				// 'label'         => esc_html__( 'Nav', 'et_builder' ),
				'toggle_slug'   => 'next_prev_button',
				'tab_slug'		=> 'advanced',
				'hide_text_shadow'  => true,
				'hide_font'	=> true,
				'hide_font_size'	=> true,
				'hide_letter_spacing'	=> true,
				'hide_text_color'	=> true,
				'hide_text_align'	=> true,
				'line_height' => array(
					'default' => '0.96em',
				),
				'font_size' => array(
					'default' => '53px',
				),
				'css'      => array(
					'main' => "%%order_class%% .dica-container .swiper-button-next,
					%%order_class%% .dica-container .swiper-button-prev",
				),
			),

		);
		

		$advanced_fields['borders'] = array(
			'default' => array(
				'css'      => array(
					'main' => array(
						'border_styles' => "%%order_class%%.dica_divi_carousel .dica_divi_carouselitem",
						'border_radii'	=> "%%order_class%%.dica_divi_carousel .dica_divi_carouselitem",
						'border_styles_hover' => "%%order_class%%.dica_divi_carousel .dica_divi_carouselitem:hover",
					),
				),
			),
			'image'	=> array(
				'label'         => esc_html__( 'Image Border', 'et_builder' ),
				'css'             => array(
					'main' => array(
						'border_radii' => "%%order_class%%.dica_divi_carousel .dica_divi_carouselitem .dica-image-container img.dica-item-image",
						'border_styles' => "%%order_class%%.dica_divi_carousel .dica_divi_carouselitem .dica-image-container img.dica-item-image",
					)
				),
				'label_prefix'    => esc_html__( 'Image', 'et_builder' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'image_border',
			)
		);
		$advanced_fields['margin_padding'] = array(
			'css'      => array(
				'main' => '%%order_class%%.dica_divi_carousel .dica-container',
				'important' => 'all',
			),
		);
		$advanced_fields['background'] = false;
		$advanced_fields['box_shadow'] = false;
		$advanced_fields['button'] = false;
		$advanced_fields['filters'] = false;
		$advanced_fields['link_options'] = false;
		// $advanced_fields['margin_padding'] = false;
		$advanced_fields['max_width'] = false;
		$advanced_fields['animation'] = false;

		return $advanced_fields;
	}


	public function get_fields() {
		return array(
			// Sliider Settings
			'item_width_auto'	=> array(
				'label'				=> 	esc_html__('Item width control', 'et_builder'),
				'type'				=>	'yes_no_button',
				'description'		=> esc_html__('Control the fixed with for each carousel item for multiple devices.', 'et_builder'),
				'options'         => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'toggle_slug'		=>	'slider_settings',
				'default'			=> 'off'
			),
			// item width
			'item_width'     => array(
                'label'             => esc_html('Item width', 'et_builder'),
                'type'              => 'range',
				'toggle_slug'       => 'slider_settings',
				'description'		=> esc_html__('Specify the width for devices.', 'et_builder'),
				'mobile_options'    => true,
                'range_settings '   => array(
                    'min'       => '50px',
                    'max'       => '550px',
                    'step'      => '1',
                ),
				'default'          => '550px',
				'default_unit'     => 'px',
				'show_if'         => array(
					'item_width_auto' => 'on',
				),
			),
			'item_width_tablet' => array(
				'type'            	=> 'skip',
				// 'tab_slug'        	=> 'advanced',
				'toggle_slug'		=> 'slider_settings',
			),
			'item_width_phone' => array(
				'type'            	=> 'skip',
				// 'tab_slug'        	=> 'advanced',
				'toggle_slug'		=> 'slider_settings',
			),
			'item_width_last_edited' => array(
				'type'            	=> 'skip',
				// 'tab_slug'        	=> 'advanced',
				'toggle_slug'		=> 'slider_settings',
			),

			'show_items_desktop'	=> array(
				'label'				=> 	esc_html__('Show item Desktop', 'et_builder'),
				'type'				=>	'text',
				'default'			=>	'4',
				'toggle_slug'		=> 'slider_settings',
				'show_if_not'         => array(
					'item_width_auto' => 'on',
				),
			),
			'show_items_tablet'	=> array(
				'label'				=> 	esc_html__('Show item Tablet', 'et_builder'),
				'type'				=>	'text',
				'default'			=>	'3',
				'toggle_slug'		=> 'slider_settings',
				'show_if_not'         => array(
					'item_width_auto' => 'on',
				),
			),
			'show_items_mobile'	=> array(
				'label'				=> 	esc_html__('Show item Mobile', 'et_builder'),
				'type'				=>	'text',
				'default'			=>	'1',
				'toggle_slug'		=> 'slider_settings',
				'show_if_not'         => array(
					'item_width_auto' => 'on',
				),
			),
			'multislide'	=> array(
				'label'				=> 	esc_html__('Multislide', 'et_builder'),
				'type'				=>	'yes_no_button',
				'options'         => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'toggle_slug'		=>	'slider_settings',
				'default'			=> 'off',
				'show_if_not'         => array(
					'item_width_control' => 'on',
				),
			),
			'transition_duration'	=> array(
				'label'				=> 	esc_html__('Transition Duration', 'et_builder'),
				'type'				=>	'text',
				'default'			=>	'500',
				'toggle_slug'		=>	'slider_settings'
			),
			'centermode'	=> array(
				'label'				=> 	esc_html__('Center Slide', 'et_builder'),
				'type'				=>	'yes_no_button',
				'options'         => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'toggle_slug'		=>	'slider_settings',
				'default'			=> 'off'
			),
			'loop'	=> array(
				'label'				=> 	esc_html__('Loop', 'et_builder'),
				'type'				=>	'yes_no_button',
				'options'         => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'toggle_slug'		=>	'slider_settings',
				'default'			=> 'off'
			),
			'autoplay'	=> array(
				'label'				=> 	esc_html__('AutoPlay', 'et_builder'),
				'type'				=>	'yes_no_button',
				'options'         => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'toggle_slug'		=>	'slider_settings',
				'default'			=> 'off'
			),
			'hoverpause'	=> array(
				'label'				=> 	esc_html__('Pause on hover', 'et_builder'),
				'type'				=>	'yes_no_button',
				'options'         => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'toggle_slug'		=>	'slider_settings',
				'default'			=> 'off',
				'show_if'         => array(
					'autoplay' => 'on',
				),
			),
			'scroller_effect'	=> array(
				'label'				=> 	esc_html__('Scroller Effect', 'et_builder'),
				'type'				=>	'yes_no_button',
				'options'         => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'toggle_slug'		=>	'slider_settings',
				'default'			=> 'off',
				'show_if'         => array(
					'autoplay' => 'on',
				),
			),
			'autoplay_speed'		=> array(
				'label'				=> 	esc_html__('Auto Play Delay', 'et_builder'),
				'type'				=>	'text',
				'default'			=>	'1000',
				'toggle_slug'		=> 'slider_settings',
				'show_if'         => array(
					'autoplay' => 'on',
				),
				'show_if_not'         => array(
					'scroller_effect' => 'on',
				),
			),
			'arrow_nav'	=> array(
				'label'				=> 	esc_html__('Arrow Navigtion', 'et_builder'),
				'type'				=>	'yes_no_button',
				'options'         => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'toggle_slug'		=>	'slider_settings',
				'default'			=> 'off'
			),
			'arrow_position'	=> array(
				'label'				=> 	esc_html__('Arrow Position Outside', 'et_builder'),
				'type'				=>	'yes_no_button',
				'options'         => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'toggle_slug'		=>	'slider_settings',
				'default'			=> 'off',
				'show_if'         => array(
					'arrow_nav' => 'on',
				),
			),
			'arrow_show_hover'	=> array(
				'label'				=> 	esc_html__('Arrow Show on hover', 'et_builder'),
				'type'				=>	'yes_no_button',
				'options'         => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'toggle_slug'		=>	'slider_settings',
				'default'			=> 'on',
				'show_if'         => array(
					'arrow_nav' => 'on',
				),
			),
			'dot_nav'	=> array(
				'label'				=> 	esc_html__('Dot Navigtion', 'et_builder'),
				'type'				=>	'yes_no_button',
				'options'         => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'toggle_slug'		=>	'slider_settings',
				'default'			=> 'off'
			),
			'dot_alignment'	=> array(
				'label'				=> 	esc_html__('Dots Alignment', 'et_builder'),
				'type'				=>	'text_align',
				'options'         	=> et_builder_get_text_orientation_options( array( 'justified' ) ),
				'toggle_slug'		=>	'slider_settings',
				'default'			=> 'center',
				'default_on_front'	=> 'center',
				'show_if'         => array(
					'dot_nav' => 'on',
				),
			),
			'item_spacing'     => array(
                'label'             => esc_html('Item Spacing', 'et_builder'),
                'type'              => 'range',
				'toggle_slug'       => 'slider_settings',
				'mobile_options'    => true,
                'range_settings '   => array(
                    'min'       => '0',
                    'max'       => '100',
                    'step'      => '1',
                ),
				'default'          => '30',
				'default_unit'     => ''
			),
			'item_spacing_tablet' => array(
				'type'            	=> 'skip',
				'toggle_slug'		=> 'slider_settings',
			),
			'item_spacing_phone' => array(
				'type'            	=> 'skip',
				'toggle_slug'		=> 'slider_settings',
			),
			'item_spacing_last_edited' => array(
				'type'            	=> 'skip',
				'toggle_slug'		=> 'slider_settings',
			),
			'equal_height'	=> array(
				'label'				=> 	esc_html__('Equal Height', 'et_builder'),
				'type'				=>	'yes_no_button',
				'options'         => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'toggle_slug'		=>	'slider_settings',
				'default'			=> 'off'
			),
			'item_vertical_align'	=> array(
				'label'				=> 	esc_html__('Vertical Align', 'et_builder'),
				'type'				=>	'select',
				'options'         => array(
					'flex-start' 	=> esc_html__( 'Top', 'et_builder' ),
					'center'  		=> esc_html__( 'Center', 'et_builder' ),
					'flex-end'  	=> esc_html__( 'Bottom', 'et_builder' ),
				),
				'toggle_slug'		=>	'slider_settings',
				'show_if'      => array(
					'equal_height' => 'off',
				),
			),
			'lazy_loading'	=> array(
				'label'				=> 	esc_html__('Lazy Loading', 'et_builder'),
				'type'				=>	'yes_no_button',
				'options'         => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'toggle_slug'		=>	'slider_settings',
				'default'			=> 'off'
			),
			'load_before_transition'	=> array(
				'label'				=> 	esc_html__('Start Loading before transition Start', 'et_builder'),
				'type'				=>	'yes_no_button',
				'options'         => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'toggle_slug'		=>	'slider_settings',
				'default'			=> 'off',
				'show_if'      => array(
					'lazy_loading' => 'on',
				),
			),
			// Advanced Settings
			'advanced_effect' => array(
				'default'         => 'default',
				'default_on_front'=> true,
				'label'           => esc_html__( 'Slider Effect', 'et_builder' ),
				'type'            => 'select',
				'options'         => array(
					'default' 		=> esc_html__( 'Default', 'et_builder' ),
					'coverflow'  	=> esc_html__( 'Coverflow', 'et_builder' ),
				),
				'toggle_slug'     => 'advanced_slider',
			),
			'coverflow_rotate'     => array(
                'label'             => esc_html('Rotate', 'et_builder'),
                'type'              => 'range',
                'toggle_slug'       => 'advanced_slider',
                'range_settings '   => array(
                    'min'       => '0',
                    'max'       => '100',
                    'step'      => '1',
                ),
				'default'          => '50',
				'show_if'         => array(
					'advanced_effect' => 'coverflow',
				),
			),
			'coverflow_shadow'	=> array(
				'label'				=> 	esc_html__('Coverflow Shadow', 'et_builder'),
				'type'				=>	'yes_no_button',
				'options'         => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'toggle_slug'		=>	'advanced_slider',
				'default'			=> 'on',
				'show_if'         => array(
					'advanced_effect' => 'coverflow',
				),
			),
			// Image
			'overlay_image' => array(
				'label'           => esc_html__( 'Image Overlay', 'et_builder' ),
				'type'            => 'yes_no_button',
				'options'         => array(
					'off'	=> esc_html('No', 'et_builder'),
					'on'	=> esc_html('Yes', 'et_builder')
				),
				'default_on_front' => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'image_overlay',
			),
			'overlay_color'	=> array(
				'label'				=> 	esc_html__('Overlay Color', 'et_builder'),
				'type'				=>	'color-alpha',
				'toggle_slug'		=>	'image_overlay',
				'default'			=> 'rgba(255,255,255,0.85)',
				'tab_slug'          => 'advanced',
				'show_if'         => array(
					'overlay_image' => 'on'
				),
			),
			'overlay_icon_color'	=> array(
				'label'				=> 	esc_html__('Overlay Icon Color', 'et_builder'),
				'type'				=>	'color-alpha',
				'toggle_slug'		=>	'image_overlay',
				'default'			=> '#0c71c3',
				'tab_slug'          => 'advanced',
				'show_if'         => array(
					'overlay_image' => 'on',
				)
			),
			'align' => array(
				'label'           => esc_html__( 'Image Alignment', 'et_builder' ),
				'type'            => 'text_align',
				'options'         => et_builder_get_text_orientation_options( array( 'justified' ) ),
				'default_on_front' => 'left',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'image_style',
				'description'     => esc_html__( 'Here you can choose the image alignment.', 'et_builder' ),
			),
			'image_sizing'     => array(
                'label'             => esc_html('Image Max Width', 'et_builder'),
                'type'              => 'range',
                'toggle_slug'       => 'image_style',
                'tab_slug'          => 'advanced',
                'range_settings '   => array(
                    'min'       => '0',
                    'max'       => '100',
                    'step'      => '1',
                ),
                'default'          => '100%',
                'default_unit'     => '%',
                'allow_empty'      => true,
			),
			// Next & Previous Button
			'use_prev_icon'	=> array(
				'label'				=> 	esc_html__('Use previous custom icon', 'et_builder'),
				'type'				=>	'yes_no_button',
				'options'         => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'		=>	'next_prev_button',
				'default'			=> 'off',
			),
			'prev_icon' => array(
				'label'               => esc_html__( 'Select previous icon', 'et_builder' ),
				'type'                => 'et_font_icon_select',
				'renderer'            => 'select_icon',
				'renderer_with_field' => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'next_prev_button',
				'show_if'         => array(
					'use_prev_icon' => 'on',
				),
			),
			'use_next_icon'	=> array(
				'label'				=> 	esc_html__('Use next custom icon', 'et_builder'),
				'type'				=>	'yes_no_button',
				'options'         => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'		=>	'next_prev_button',
				'default'			=> 'off',
			),
			'next_icon' => array(
				'label'               => esc_html__( 'Select next icon', 'et_builder' ),
				'type'                => 'et_font_icon_select',
				'renderer'            => 'select_icon',
				'renderer_with_field' => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'next_prev_button',
				'show_if'         => array(
					'use_next_icon' => 'on',
				),
			),
			'arrow_font_size' => array(
				'label'             => esc_html__( 'Font Size', 'et_builder' ),
				'type'              => 'range',
				'mobile_options'    => true,
                'responsive'        => true,
                'default'           => '53px',
                'default_unit'      => 'px',
				'range_settings '   => array(
                    'min'       => '0',
                    'max'       => '100',
                    'step'      => '1',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'next_prev_button',
			),
			// Color
			'arrow_nav_color'	=> array(
				'label'				=> 	esc_html__('Arrow Color', 'et_builder'),
				'type'				=>	'color-alpha',
				'toggle_slug'		=>	'color_settings',
				'default'			=> '#0c71c3',
				'tab_slug'          => 'advanced',
			),
			'arrow_bg_color'	=> array(
				'label'				=> 	esc_html__('Arrow Background Color', 'et_builder'),
				'type'				=>	'color-alpha',
				'toggle_slug'		=>	'color_settings',
				'default'			=> '#ffffff',
				'tab_slug'          => 'advanced',
			),
			'dots_color'	=> array(
				'label'				=> 	esc_html__('Dots Color', 'et_builder'),
				'type'				=>	'color-alpha',
				'toggle_slug'		=>	'color_settings',
				'default'			=> '#e0e0e0',
				'tab_slug'          => 'advanced',
			),
			'dots_active_color'	=> array(
				'label'				=> 	esc_html__('Dots Active Color', 'et_builder'),
				'type'				=>	'color-alpha',
				'toggle_slug'		=>	'color_settings',
				'default'			=> '#0c71c3',
				'tab_slug'          => 'advanced',
			),

			'innercontent_padding'		=> array(
				'label'				=> esc_html__('Inner Container Padding', 'et_builder'),
				'type'				=> 'custom_margin',
				// 'option_category'    => 'basic_option',
				'toggle_slug'        => 'margin_padding',
				'tab_slug'		=> 'advanced',
				'default_on_front'		=>	'0|0|0|0'
			)
		);
	}

	
	/**
	 * Apply Custom Margin Padding
	 */
	public function control_width_and_spacing($render_slug, $slug, $type, $class, $important = true) {
		$desktop 				= $this->props[$slug];
		$tablet 				= $this->props[$slug.'_tablet'];
		$phone 					= $this->props[$slug.'_phone'];
		$important_text 		= $important === true ? '!important' : '';

		if(isset($desktop) && !empty($desktop)) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector' => $class,
				'declaration' => sprintf('%1$s:%2$s%3$s;',$type, $desktop, $important_text),
			));
		}
		if (isset($tablet) && !empty($tablet)) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector' => $class,
				'declaration' => sprintf('%1$s:%2$s%3$s;',$type, $tablet, $important_text),
				'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
			));
		}
		if (isset($phone) && !empty($phone)) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector' => $class,
				'declaration' => sprintf('%1$s:%2$s%3$s;',$type, $phone, $important_text),
				'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
			));
		}
	}
	public function return_data_value($value) {
		return (!empty($value)) ? $value : '';
	}
	public function additional_css_styles($render_slug){
		$image_width				=	$this->props['image_sizing'];
		$image_align				=	$this->props['align'];
		$inner_content_padding		=	array_diff(explode("|", $this->props['innercontent_padding']), ['true', 'false']);
		$order_class 				= self::get_module_order_class( $render_slug );
		

		// Apply item width
		if('on' === $this->props['item_width_auto']) {
		$this->control_width_and_spacing(
			$render_slug, 
			'item_width', 
			'width', 
			'%%order_class%%.dica_divi_carousel .dica_divi_carouselitem');
		}
		// Apply margin padding
		if('' !== $inner_content_padding) {
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%% .swiper-container',
                'declaration' => sprintf(
                    'padding:%1$s!important;', implode(' ', $inner_content_padding)),
            ) );
		}
		if('' !== $image_width) {
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%% .dica_divi_carouselitem .dica-image-container img',
                'declaration' => sprintf(
                    'max-width:%1$s;', $image_width),
            ) );
		}
		if('' !== $image_align) {
			if($image_align == 'left'){
				ET_Builder_Element::set_style( $render_slug, array(
                    'selector'    => '%%order_class%% .dica_divi_carouselitem .dica-image-container img',
                    'declaration' => sprintf(
                        'margin-left: 0!important;margin-right: auto!important;'),
                ) );
			}elseif($image_align == 'center'){
				ET_Builder_Element::set_style( $render_slug, array(
                    'selector'    => '%%order_class%% .dica_divi_carouselitem .dica-image-container img',
                    'declaration' => sprintf(
                        'margin-left: auto!important;margin-right: auto!important;'),
                ) );
			}elseif($image_align == 'right') {
				ET_Builder_Element::set_style( $render_slug, array(
                    'selector'    => '%%order_class%% .dica_divi_carouselitem .dica-image-container img',
                    'declaration' => sprintf(
                        'margin-left: auto!important;margin-right: 0!important;'),
                ) );
			}
		}
		if('' !== $this->props['arrow_nav_color']) {
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%% .swiper-button-next:before,%%order_class%% .swiper-button-prev:before',
                'declaration' => sprintf(
                    'color:%1$s!important;', $this->props['arrow_nav_color']),
            ) );
		}
		if('' !== $this->props['arrow_bg_color']) {
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%%.dica_divi_carousel .swiper-button-next,%%order_class%%.dica_divi_carousel .swiper-button-prev',
                'declaration' => sprintf(
                    'background-color:%1$s;', $this->props['arrow_bg_color']),
            ) );
		}
		if('' !== $this->props['dots_color']) {
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%%.dica_divi_carousel .swiper-pagination-bullet',
                'declaration' => sprintf(
                    'background-color:%1$s;', $this->props['dots_color']),
            ) );
		}
		if('' !== $this->props['dots_active_color']) {
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%%.dica_divi_carousel .swiper-pagination-bullet.swiper-pagination-bullet-active',
                'declaration' => sprintf(
                    'background-color:%1$s;', $this->props['dots_active_color']),
            ) );
		}
		if( 'off' !== $this->props['equal_height']) {
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%%.dica_divi_carousel .dica-container .swiper-wrapper .dica_divi_carouselitem',
                // 'declaration' => sprintf('height:%1$s;', 100),
                'declaration' => 'height:100%;',
            ) );
		}
		if( 'on' !== $this->props['equal_height'] && '' !== $this->props['item_vertical_align']) {
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%%.dica_divi_carousel .dica-container .swiper-wrapper .dica_divi_carouselitem',
                'declaration' => sprintf('align-self:%1$s;', $this->props['item_vertical_align']),
            ) );
		}

		if($this->props['dot_nav'] == 'on') {
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%%.dica_divi_carousel .dica-container',
                'declaration' => sprintf('padding-bottom:55px !important;'),
            ) );
		}
		if($this->props['dot_alignment'] !== '') {
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%%.dica_divi_carousel .dica-container .swiper-pagination',
                'declaration' => sprintf('text-align:%1$s;', $this->props['dot_alignment']),
            ) );
		}
		if($this->props['arrow_position'] !== 'on') {
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%%.dica_divi_carousel',
                'declaration' => 'overflow:hidden !important;',
			) );
		}
		if($this->props['overlay_image'] == 'on') {
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%%.dica_divi_carousel .overlay-image .dica-item .dica-image-container a:before',
                'declaration' => sprintf('background-color:%1$s !important;', $this->props['overlay_color']),
			) );
			ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%%.dica_divi_carousel .overlay-image .dica-item .dica-image-container a:after',
                'declaration' => sprintf('color:%1$s !important;', $this->props['overlay_icon_color']),
            ) );
		}

		// arrow width and height and font-size
		if(isset($this->props['arrow_font_size']) && '' !== $this->props['arrow_font_size']) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector' => '%%order_class%% .dica-container .swiper-button-next, %%order_class%% .dica-container .swiper-button-prev',
				'declaration' => sprintf('font-size:%1$s; width:%1$s; height:%1$s;', 
				$this->props['arrow_font_size']),
			));
		}
		if(isset($this->props['arrow_font_size_tablet']) && '' !== $this->props['arrow_font_size_tablet']) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector' => '%%order_class%% .dica-container .swiper-button-next, %%order_class%% .dica-container .swiper-button-prev',
				'declaration' => sprintf('font-size:%1$s; width:%1$s; height:%1$s;', 
				$this->props['arrow_font_size_tablet']),
				'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
			));
		}
		if(isset($this->props['arrow_font_size_phone']) && '' !== $this->props['arrow_font_size_phone']) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector' => '%%order_class%% .dica-container .swiper-button-next, %%order_class%% .dica-container .swiper-button-prev',
				'declaration' => sprintf('font-size:%1$s; width:%1$s; height:%1$s;', 
				$this->props['arrow_font_size_phone']),
				'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
			));
		}

		// smooth scroll effect
		if('on' === $this->props['scroller_effect']) {
			ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%%.dica_divi_carousel .swiper-wrapper',
				'declaration' => '-webkit-transition-timing-function:linear!important;
				-o-transition-timing-function:linear!important;
				transition-timing-function: linear !important; 
				transition-duration:2000ms;',
			) );
		}
	}

	public function get_custom_css_fields_config() {
		return array(
			'title' => array(
				'label'    => esc_html__( 'Title', 'simp-simple' ),
				'selector' => '%%order_class%%.dica_divi_carousel .dica-container .swiper-wrapper .dica_divi_carouselitem h4',
			),
			'content' => array(
				'label'    => esc_html__( 'Content', 'simp-simple' ),
				'selector' => '%%order_class%%.dica_divi_carousel .dica-container .swiper-wrapper .dica_divi_carouselitem .content',
			),
			'image' => array(
				'label'    => esc_html__( 'Image', 'simp-simple' ),
				'selector' => '%%order_class%%.dica_divi_carousel .dica-container .swiper-wrapper .dica_divi_carouselitem .dica-image-container img',
			),
			'button' => array(
				'label'    => esc_html__( 'Button', 'simp-simple' ),
				'selector' => '%%order_class%%.dica_divi_carousel .dica-container .swiper-wrapper .dica_divi_carouselitem .et_pb_button',
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {

		$item_spacing = $this->props['item_spacing'];
		$item_spacing_tablet = isset($this->props['item_spacing_tablet']) && $this->props['item_spacing_tablet'] !== '' ? 
								$this->props['item_spacing_tablet'] : $item_spacing;
		$item_spacing_phone = isset($this->props['item_spacing_phone']) && $this->props['item_spacing_phone'] !== '' ? 
								$this->props['item_spacing_phone'] : $item_spacing;
		$arrow_show_hover_class = $this->props['arrow_show_hover'] == 'on' ? ' arrow-show-hover' : '';
		$arrow_position_class = $this->props['arrow_position'] == 'on' ? ' arrow-outer-position' : '';
		$arrow_class = $arrow_show_hover_class . $arrow_position_class;
		$order_class 	= self::get_module_order_class( $render_slug );
		$order_number	= str_replace('_','',str_replace($this->slug,'', $order_class));

		$this->additional_css_styles($render_slug);
		$coverflow = sprintf('cover-rotate="%1$s" ', 
								$this->return_data_value($this->props['coverflow_rotate'])
							);
		
		$data_value = sprintf('data-desktop=%1$s data-tablet=%2$s data-mobile=%3$s data-speed=%4$s
								 data-arrow=%5$s data-dots=%6$s data-autoplay=%7$s data-autoSpeed=%8$s data-loop=%9$s item-spacing=%10$s 
								 center-mode=%11$s slider-effec=%12$s %13$s pause-onhover=%14$s data-multislide=%15$s data-cfshadow=%16$s 
								 data-order=%17$s data-lazyload=%18$s data-lazybefore=%19$s data-scroller_effect=%20$s
								 data-autowidth=%21$s data-item_spacing_tablet=%22$s data-item_spacing_phone=%23$s', 
								$this->return_data_value($this->props['show_items_desktop']),
								$this->return_data_value($this->props['show_items_tablet']),
								$this->return_data_value($this->props['show_items_mobile']),
								$this->return_data_value($this->props['transition_duration']),
								$this->return_data_value($this->props['arrow_nav']),
								$this->return_data_value($this->props['dot_nav']),
								$this->return_data_value($this->props['autoplay']),
								$this->return_data_value($this->props['autoplay_speed']),
								$this->return_data_value($this->props['loop']),
								$this->props['item_spacing'],
								$this->return_data_value($this->props['centermode']),
								$this->return_data_value($this->props['advanced_effect']),
								$coverflow,
								$this->return_data_value($this->props['hoverpause']),
								$this->return_data_value($this->props['multislide']),
								$this->props['coverflow_shadow'],
								$order_number,
								$this->props['lazy_loading'],
								$this->props['load_before_transition'],
								$this->props['scroller_effect'],
								$this->props['item_width_auto'],
								$item_spacing_tablet,
								$item_spacing_phone
							 );
		
		$data_prev_icon = 'on' === $this->props['use_prev_icon'] ? 
		sprintf( 'data-icon="%1$s"', esc_attr( et_pb_process_font_icon($this->props['prev_icon']) ) ) : 'data-icon="4"';
		$data_next_icon = 'on' === $this->props['use_next_icon'] ? 
		sprintf( 'data-icon="%1$s"', esc_attr( et_pb_process_font_icon($this->props['next_icon']) ) ) : 'data-icon="5"';
		
		$navigation		= ($this->props['arrow_nav'] == 'on') ? 
		sprintf('<div class="swiper-button-next dica-next-btn-%1$s" %3$s></div><div class="swiper-button-prev dica-prev-btn-%1$s" %2$s></div>', 
		$order_number,
		$data_prev_icon,
		$data_next_icon ) 
		: '' ;
		$pagination		= ($this->props['dot_nav'] == 'on') ? sprintf('<div class="swiper-pagination dica-paination-%1$s"></div>', $order_number) : '' ;

		$overlay_class = $this->props['overlay_image'] == 'on' ? ' overlay-image' : '';



		$output = sprintf( '<div class="dica-container %5$s%6$s" %2$s>
							 	<div class="swiper-container">
									<div class="swiper-wrapper">%1$s</div>	
								</div>	
								%3$s
								%4$s						
							</div>', 
							et_core_sanitized_previously( $this->content ),
							$data_value,
							$navigation,
							$pagination,
							$overlay_class,
							$arrow_class );

		return $output;
	}
}

new DiviCarousel;
