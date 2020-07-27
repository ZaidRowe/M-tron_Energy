<?php

class DiviCarouselItem extends ET_Builder_Module {

	public $slug       = 'dica_divi_carouselitem';
	public $vb_support = 'on';
	public $type       = 'child';
	// Module item's attribute that will be used for module item label on modal
	public $child_title_var          = 'title';
	public $child_title_fallback_var = 'admin_label';

	protected $module_credits = array(
		'module_uri' => 'https://www.divigear.com/',
		'author'     => 'DiviGear',
		'author_uri' => 'https://www.divigear.com',
	);

	public function init() {
		$this->name = esc_html__( 'Carousel Item', 'et_builder' );
		
	}
	public function get_settings_modal_toggles(){
		return array(
			'general'  => array(
					'toggles' => array(
							'main_content' 					=> esc_html__( 'Main Content', 'et_builder' ),
							'link' 							=> esc_html__( 'Title & Image Link', 'et_builder' ),
							'button_settings' 				=> esc_html__( 'Button Settings', 'et_builder' ),
							'image_settings'				=> esc_html__('Image Settings', 'et_builder'),
					),
			),
			'advanced'  =>  array(
					'toggles'   =>  array(
							'icon_settings'				=> esc_html__( 'Icon settings', 'et_builder' ),
							'custom_spacing'			=> esc_html__('Image Spacing', 'et_buitlder'),
							'title_style'          		=> esc_html__('Title Style', 'et_builder'),
							'content_style'          	=> esc_html__('Content Style', 'et_builder'),
							'button'          			=> esc_html__('Button', 'et_builder'),
					)
			),
		);
	}

	public function get_fields() {
		return array(
			'title' => array(
				'label'           	=> esc_html__( 'Title', 'et_builder' ),
				'type'            	=> 'text',
				'option_category' 	=> 'basic_option',
				'description'     	=> esc_html__( 'Content entered here will appear inside the module.', 'et_builder' ),
				'toggle_slug'     	=> 'main_content',
			),
			'content' => array(
				'label'           => esc_html__( 'Content', 'et_builder' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'et_builder' ),
				'toggle_slug'     => 'main_content',
			),
			// link
			'url' => array(
				'label'           => esc_html__( 'Url', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'If you would like to make your blurb a link, input your destination URL here.', 'et_builder' ),
				'toggle_slug'     => 'link',
			),
			'url_new_window' => array(
				'label'           => esc_html__( 'Url Opens', 'et_builder' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'In The Same Window', 'et_builder' ),
					'on'  => esc_html__( 'In The New Tab', 'et_builder' ),
				),
				'toggle_slug'     => 'link',
				'description'     => esc_html__( 'Here you can choose whether or not your link opens in a new window', 'et_builder' ),
				'default_on_front'=> 'off',
			),
			'admin_label' => array(
				'label'           => esc_html__( 'Admin Label', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'admin_label',
				'default_on_front'=> 'Carousel Item',
			),
			// button srettings
			'button_text' => array(
				'label'           => esc_html__( 'Button Text', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input your desired button text, or leave blank for no button.', 'et_builder' ),
				'toggle_slug'     => 'button_settings',
			),
			'button_url' => array(
				'label'           => esc_html__( 'Button URL', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input URL for your button.', 'et_builder' ),
				'toggle_slug'     => 'button_settings',
			),
			'button_url_new_window' => array(
				'default'         => 'off',
				'default_on_front'=> true,
				'label'           => esc_html__( 'Url Opens', 'et_builder' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'In The Same Window', 'et_builder' ),
					'on'  => esc_html__( 'In The New Tab', 'et_builder' ),
				),
				'toggle_slug'     => 'button_settings',
				'description'     => esc_html__( 'Choose whether your link opens in a new window or not', 'et_builder' ),
			),
			
			// image settings
			'use_icon' => array(
				'label'           => esc_html__( 'Use Icon', 'et_builder' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'options'         => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'toggle_slug'     => 'image_settings',
				'affects'         => array(
					'image',
					'image_alt',
					'font_icon',
					'icon_color',
					'use_circle',
					'use_icon_font_size',
					'icon_alignment'
				),
				'description' => esc_html__( 'Here you can choose whether icon set below should be used.', 'et_builder' ),
				'default_on_front'=> 'off',
			),
			'font_icon' => array(
				'label'               => esc_html__( 'Icon', 'et_builder' ),
				'type'                => 'select_icon',
				'option_category'     => 'basic_option',
				'class'               => array( 'et-pb-font-icon' ),
				'toggle_slug'         => 'image_settings',
				'description'         => esc_html__( 'Choose an icon to display with your blurb.', 'et_builder' ),
				'depends_show_if'     => 'on',
			),
			'icon_color' => array(
				'default'           => "#2ea3f2",
				'default_on_front'	=> true,
				'label'             => esc_html__( 'Icon Color', 'et_builder' ),
				'type'              => 'color-alpha',
				'description'       => esc_html__( 'Here you can define a custom color for your icon.', 'et_builder' ),
				'depends_show_if'   => 'on',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'icon_settings',
			),
			'use_circle' => array(
				'label'           => esc_html__( 'Circle Icon', 'et_builder' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'affects'           => array(
					'use_circle_border',
					'circle_color',
				),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'icon_settings',
				'description'      => esc_html__( 'Here you can choose whether icon set above should display within a circle.', 'et_builder' ),
				'depends_show_if'  => 'on',
				'default_on_front'=> 'off',
			),
			'circle_color' => array(
				'default'         => "#2ea3f2",
				'label'           => esc_html__( 'Circle Color', 'et_builder' ),
				'type'            => 'color-alpha',
				'description'     => esc_html__( 'Here you can define a custom color for the icon circle.', 'et_builder' ),
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
			),
			'use_circle_border' => array(
				'label'           => esc_html__( 'Show Circle Border', 'et_builder' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'affects'           => array(
					'circle_border_color',
				),
				'description' => esc_html__( 'Here you can choose whether if the icon circle border should display.', 'et_builder' ),
				'depends_show_if'   => 'on',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'icon_settings',
				'default_on_front'  => 'off',
			),
			'circle_border_color' => array(
				'default'         => "#2ea3f2",
				'label'           => esc_html__( 'Circle Border Color', 'et_builder' ),
				'type'            => 'color-alpha',
				'description'     => esc_html__( 'Here you can define a custom color for the icon circle border.', 'et_builder' ),
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
			),
			'use_icon_font_size' => array(
				'label'           => esc_html__( 'Use Icon Font Size', 'et_builder' ),
				'type'            => 'yes_no_button',
				'option_category' => 'font_option',
				'options'         => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'affects'     => array(
					'icon_font_size',
				),
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
				'default_on_front'=> 'off',
			),
			'icon_font_size' => array(
				'label'           => esc_html__( 'Icon Font Size', 'et_builder' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
				'default'         => '96px',
				'default_unit'    => 'px',
				'default_on_front'=> '',
				'range_settings' => array(
					'min'  => '1',
					'max'  => '120',
					'step' => '1',
				),
				'mobile_options'  => true,
				'depends_show_if' => 'on',
				'responsive'      => true,
			),
			'icon_alignment' => array(
				'label'           => esc_html__( 'Icon alignment', 'et_builder' ),
				'type'            => 'text_align',
				'options'         => et_builder_get_text_orientation_options(array( 'justified' )),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
				'depends_show_if' => 'on',
				'default'		  => 'center'	
			),
			'image' => array(
				'label'              => esc_html__( 'Image', 'et_builder' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'et_builder' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'et_builder' ),
				'update_text'        => esc_attr__( 'Set As Image', 'et_builder' ),
				'depends_show_if'    => 'off',
				'description'        => esc_html__( 'Upload an image to display at the top of your blurb.', 'et_builder' ),
				'toggle_slug'        => 'image_settings',
			),
			'image_alt'				=> array(
				'label'				=> esc_html__('Image alt text', 'et_builder'),
				'type'				=> 'text',
				'option_category'    => 'basic_option',
				'toggle_slug'        => 'image_settings',
				'depends_show_if'    => 'off',
			),
			'image_lightbox'		=> array(
				'label'					=> esc_html__('Open in lightbox', 'et_builder'),
				'type'					=> 'yes_no_button',
				'options'         => array(
					'off'	=> esc_html('No', 'et_builder'),
					'on'	=> esc_html('Yes', 'et_builder')
				),
				'option_category'    	=> 'basic_option',
				'toggle_slug'        	=> 'image_settings',
				'depends_show_if'    	=> 'off',
				'show_if'         => array(
					'use_icon' => 'off'
				),
			),
			// 'lazy_loading'	=> array(
			// 	'label'				=> 	esc_html__('Lazy Loading', 'et_builder'),
			// 	'type'				=>	'yes_no_button',
			// 	'options'         => array(
			// 		'off' => esc_html__( 'No', 'et_builder' ),
			// 		'on'  => esc_html__( 'Yes', 'et_builder' ),
			// 	),
			// 	'toggle_slug'		=>	'image_settings',
			// 	'default'			=> 'off'
			// ),
			'button_margin'		=> array(
				'label'				=> esc_html__('Button Margin', 'et_builder'),
				'type'				=> 'custom_margin',
				// 'option_category'    => 'basic_option',
				'toggle_slug'        => 'margin_padding',
				'tab_slug'		=> 'advanced',
				'default'		=>	'10px|10px|0|0'
			),
			'image_padding'		=> array(
				'label'				=> esc_html__('Image Padding', 'et_builder'),
				'type'				=> 'custom_padding',
				// 'option_category'    => 'basic_option',
				'toggle_slug'        => 'margin_padding',
				'tab_slug'		=> 'advanced',
				'default'		=>	'0|0|0|0'
			),
			'content_padding'		=> array(
				'label'				=> esc_html__('Content Padding', 'et_builder'),
				'type'				=> 'custom_padding',
				// 'option_category'    => 'basic_option',
				'toggle_slug'        => 'margin_padding',
				'tab_slug'		=> 'advanced',
				'default'		=>	'0|0|0|0'
			)
		);
	}
	public function get_advanced_fields_config() {
		$advanced_fields = array();
		// $advanced_fields['background'] = false;
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
					'main' => ".dica_divi_carousel %%order_class%%.dica_divi_carouselitem .dica-item-content h4",
				),
			),
			// Body Text
			'body'   => array(
				'label'         => esc_html__( 'Body', 'et_builder' ),
				'toggle_slug'   => 'content_style',
				'tab_slug'		=> 'advanced',
				'hide_text_shadow'  => true,
				'line_height' => array(
						'default' => '1.7em',
					),
					'font_size' => array(
						'default' => '14px',
					),
				'css'      => array(
					'main' => ".dica_divi_carousel %%order_class%%.dica_divi_carouselitem .dica-item-content",
				),
			),
		);

		$advanced_fields['background'] = array(
			'has_background_color_toggle'   => false, // default. Warning: to be deprecated
			'use_background_color'          => true, // default
			'use_background_color_gradient' => true, // default
			'use_background_image'          => true, // default
			'use_background_video'          => false, // default
		);

		$advanced_fields['text'] = false;
		$advanced_fields['borders'] = false;
		$advanced_fields['button'] = array(
			'button'	=> array(
				'label'		=>	esc_html__('Button custom' , 'et_builder'),
				'css'   => array(
					'alignment'   => "%%order_class%% .et_pb_button_wrapper",
				),
				'box_shadow'    => array(
					'css' => array(
						'main' => "%%order_class%% .et_pb_button_wrapper .et_pb_button",
					),
				),
				'use_alignment' => true,
			)
		);
		$advanced_fields['filters'] = false;
		$advanced_fields['margin_padding'] = false;
		$advanced_fields['max_width'] = false;
		$advanced_fields['animation'] = false;
		$advanced_fields['link_options'] = false;
		return $advanced_fields;
	}

	public function additional_css_styles($render_slug){
		$button_margin		=	array_diff(explode("|", $this->props['button_margin']), ['true', 'false']);
		$image_padding		=	array_diff(explode("|", $this->props['image_padding']), ['true', 'false']);
		$content_padding	=	array_diff(explode("|", $this->props['content_padding']), ['true', 'false']);
		$icon_alignment     =	$this->props['icon_alignment'];
		// $button_align		=	$this->props['button_align'];
		$order_class 		= self::get_module_order_class( $render_slug );

		
		if('' !== $button_margin) {
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '.dica_divi_carousel %%order_class%%.dica_divi_carouselitem .et_pb_button_wrapper',
                'declaration' => sprintf(
                    'margin:%1$s;', implode(' ', $button_margin)),
            ) );
		}
		if('' !== $image_padding) {
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '.dica_divi_carousel %%order_class%%.dica_divi_carouselitem .dica-image-container',
                'declaration' => sprintf(
                    'padding:%1$s;', implode(' ', $image_padding)),
            ) );
		}
		if('' !== $content_padding) {
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '.dica_divi_carousel %%order_class%%.dica_divi_carouselitem .dica-item-content',
                'declaration' => sprintf(
                    'padding:%1$s;', implode(' ', $content_padding)),
            ) );
		}
		if('' !== $icon_alignment) {
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '.dica_divi_carousel %%order_class%%.dica_divi_carouselitem .dica-image-container',
                'declaration' => sprintf(
                    'text-align:%1$s;', $icon_alignment),
            ) );
		} else {
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '.dica_divi_carousel %%order_class%%.dica_divi_carouselitem .dica-image-container',
                'declaration' => sprintf(
                    'text-align:center;', null),
            ) );
		}
		
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$title 				=	$this->props['title']; 
		$content			=	$this->props['content'];
		$image 				=	$this->props['image'];
		$image_url 			=	$this->props['image'];
		$image_lightbox		=	$this->props['image_lightbox'];
		$url 				=	$this->props['url'];
		$url_new_window   	=	$this->props['url_new_window'];

		$button_text           = $this->props['button_text'];
		$button_url            = $this->props['button_url'];
		$button_url_new_window = $this->props['button_url_new_window'];
		$font_icon             = $this->props['font_icon'];
		$use_icon              = $this->props['use_icon'];
		$use_circle            = $this->props['use_circle'];
		$use_circle_border     = $this->props['use_circle_border'];
		$icon_color            = $this->props['icon_color'];
		$circle_color          = $this->props['circle_color'];
		$circle_border_color   = $this->props['circle_border_color'];
		$use_icon_font_size    = $this->props['use_icon_font_size'];
		$icon_font_size        = $this->props['icon_font_size'];
		$icon_font_size_tablet = $this->props['icon_font_size_tablet'];
		$icon_font_size_phone  = $this->props['icon_font_size_phone'];
		$icon_font_size_last_edited  = $this->props['icon_font_size_last_edited'];
		// Design related props are added via $this->advanced_options['button']['button']
		$button_custom         = $this->props['custom_button'];
		$button_rel            = $this->props['button_rel'];
		$button_use_icon       = $this->props['button_use_icon'];
		$custom_icon       	   = $this->props['button_icon'];

		
		if ( 'off' !== $use_icon_font_size ) {
			$font_size_responsive_active = et_pb_get_responsive_status( $icon_font_size_last_edited );

			$font_size_values = array(
				'desktop' => $icon_font_size,
				'tablet'  => $font_size_responsive_active ? $icon_font_size_tablet : '',
				'phone'   => $font_size_responsive_active ? $icon_font_size_phone : '',
			);

			et_pb_generate_responsive_css( $font_size_values, '%%order_class%% .et-pb-icon', 'font-size', $render_slug );
		}


		// Render button
		$button = $this->render_button( array(
			'button_text'      => $button_text,
			'button_url'       => $button_url,
			'url_new_window'   => $button_url_new_window,
			'button_custom'    => $button_custom,
			'button_rel'       => $button_rel,
			'custom_icon'      => $custom_icon,
		) );

		$this->additional_css_styles($render_slug);

		$parent_module = self::get_parent_modules('page')['dica_divi_carousel'];
		if ($parent_module->props['lazy_loading'] == 'on') {
			$src_attr = 'data-src';
			$lazy_class = ' swiper-lazy';
			$lazy_preloader = '<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>';
			$loading = ' loading';
		} else {
			$src_attr = 'src';
			$lazy_class = '';
			$lazy_preloader = '';
			$loading = '';
		}

		if ( 'off' === $use_icon ) {
			$image = ( '' !== trim( $image ) ) ? sprintf(
				'<img %3$s="%1$s" alt="%2$s" class="dica-item-image%4$s" />%5$s',
				esc_attr( $image ),
				esc_attr( $this->props['image_alt'] ),
				$src_attr,
				$lazy_class,
				$lazy_preloader
			) : '';					
		} else {
			$icon_style = sprintf( 'color: %1$s;', esc_attr( $icon_color ) );

			if ( 'on' === $use_circle ) {
				$icon_style .= sprintf( ' background-color: %1$s;', esc_attr( $circle_color ) );

				if ( 'on' === $use_circle_border ) {
					$icon_style .= sprintf( ' border-color: %1$s;', esc_attr( $circle_border_color ) );
				}
			}

			$image = ( '' !== $font_icon ) ? sprintf(
				'<span class="et-pb-icon %2$s%3$s" style="%4$s">%1$s</span>',
				esc_attr( et_pb_process_font_icon( $font_icon ) ),
				( 'on' === $use_circle ? ' et-pb-icon-circle' : '' ),
				( 'on' === $use_circle && 'on' === $use_circle_border ? ' et-pb-icon-circle-border' : '' ),
				$icon_style
			) : '';
		}

		if( '' !== $title && '' !== $url) {
			$title = sprintf( '<a href="%1$s"%3$s>%2$s</a>',
				esc_url( $url ),
				esc_html( $title ),
				( 'on' === $url_new_window ? ' target="_blank"' : '' )
			);
		}
		if( '' !== $image && '' !== $url && 'off' == $use_icon && 'on' !== $image_lightbox ) {
			$image = sprintf( '<a class="image" href="%1$s"%3$s>%2$s</a>',
				esc_url( $url ),
				$image,
				( 'on' === $url_new_window ? ' target="_blank"' : '' )
			);
		} else if ( '' !== $image && 'off' == $use_icon && 'on' !== $image_lightbox ) {
			$image = sprintf( '<a class="image">%1$s</a>',
				$image
			);
		} else if ( '' !== $image && 'off' == $use_icon && 'on' == $image_lightbox ) {
			// if the lightbox on
			$image = sprintf( '<a data-lightbox class="image" href="%2$s">%1$s</a>',
				$image,
				$image_url
			);

		} else if ( '' !== $image && '' !== $url && 'on' == $use_icon ) {
			$image = sprintf( '<a href="%1$s"%3$s>%2$s</a>',
				esc_url( $url ),
				$image,
				( 'on' === $url_new_window ? ' target="_blank"' : '' )
			);
		}

		$image_container = '' !== $image ? sprintf('<div class="dica-image-container">%1$s</div>', $image) : '';

		$item_class = '';
		$item_class .= '' === $title && '' === $this->props['content'] && '' === et_core_sanitized_previously( $button ) ?  ' empty-content' :'';

		$output =  sprintf( '<div class="dica-item%5$s%6$s%7$s">
									%3$s
								<div class="dica-item-content">
									<h4>%1$s</h4>
									<div class="content">%2$s</div>
									%4$s
								</div>
							</div>', 
							$title,
							$this->props['content'],
							$image_container,
							et_core_sanitized_previously( $button ),
							$item_class,
							$lazy_class,
							$loading				
						);

		return $output;
	}
}

new DiviCarouselItem;
