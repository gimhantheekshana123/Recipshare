<?php
    /**
     * Theme options via the Customizer.
     *
     * @package appetizo
     * @since appetizo 1.0
     */

    // ------------- Theme Customizer  ------------- //

    add_action( 'customize_register', 'appetizo_customizer_register' );

    function appetizo_customizer_register( $wp_customize ) {



// Pro Version
        class Appetizo_Customize_Pro_Version extends WP_Customize_Control {
            public $type = 'pro_options';

            public function render_content() {
                echo '<span>For more options, <strong>Upgrade</strong> to</span>';
                echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<strong> '. esc_html__( 'Appetizo Premium', 'appetizo' ) .'<strong></a>';
                echo '</a>';
            }
        }

        // Pro Version Links
        class Appetizo_Customize_Pro_Version_Links extends WP_Customize_Control {
            public $type = 'pro_links';

            public function render_content() {
                ?>
                <ul>
                    <li class="customize-control">
                        <h3><?php esc_html_e( 'Upgrade', 'appetizo' ); ?> <span>*</span></h3>
                        <p><?php esc_html_e( 'There are lots of reasons to upgrade to Pro version. Unlimited custom Colors, rich Typography options, multiple variation of Blog Feed layout and way much more. Also Premium Support included.', 'appetizo' ); ?></p>
                        <a href="<?php echo esc_url('https://www.vinethemes.com/downloads/appetizo-cooking-recipe-wordpress-theme/'); ?>" target="_blank" class="button button-primary widefat"><?php esc_html_e( 'Get Appetizo Premium', 'appetizo' ); ?></a>
                    </li>
                    <li class="customize-control">
                        <h3><?php esc_html_e( 'Documentation', 'appetizo' ); ?></h3>
                        <p><?php esc_html_e( 'Read how to customize the theme, set up widgets, and learn all the possible options available to you.', 'appetizo' ); ?></p>
                        <a href="<?php echo esc_url('https://www.vinethemes.com/documentation/appetizo-cooking-recipe-theme-documentation/'); ?>" target="_blank" class="button button-primary widefat"><?php esc_html_e( 'Documentation', 'appetizo' ); ?></a>
                    </li>
                    <li class="customize-control">
                        <h3><?php esc_html_e( 'Support', 'appetizo' ); ?></h3>
                        <p><?php esc_html_e( 'For Appetizo theme related questions feel free to post on our support forums.', 'appetizo' ); ?></p>
                        <a href="<?php echo esc_url('https://www.vinethemes.com/forums/'); ?>" target="_blank" class="button button-primary widefat"><?php esc_html_e( 'Support', 'appetizo' ); ?></a>
                    </li>

                </ul>
                <?php
            }
        }


        /*
        ** Pro Version =====
        */

        // add Colors section
        $wp_customize->add_section( 'appetizo_pro' , array(
            'title'		 => esc_html__( 'About Appetizo', 'appetizo' ),
            'priority'	 => 1,
            'capability' => 'edit_theme_options'
        ) );

        // Pro Version
        $wp_customize->add_setting( 'pro_version_', array(
            'sanitize_callback' => 'appetizo_sanitize_custom_control'
        ) );
        $wp_customize->add_control( new Appetizo_Customize_Pro_Version_Links ( $wp_customize,
                'pro_version_', array(
                    'section'	=> 'appetizo_pro',
                    'type'		=> 'pro_links',
                    'label' 	=> '',
                    'priority'	=> 1
                )
            )
        );





        //Slick Slider
        $wp_customize->add_section( 'appetizo_customizer_slider', array(
            'title'       => esc_html__( 'Slider Options', 'appetizo' ),
            'description' => esc_html__( 'Configure your Slider here.', 'appetizo' ),
            'priority'    => 1
        ) );


        $wp_customize->add_setting( 'appetizo_customizer_slider_disable', array(
            'default'    => 'enable',
            'section'  => 'appetizo_customizer_slider',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'appetizo_sanitize_radio',
        ) );

        $wp_customize->add_control( 'appetizo_slider_select_box', array(
            'settings' => 'appetizo_customizer_slider_disable',
            'label'    => esc_html__( 'Homepage Slider', 'appetizo' ),
            'section'  => 'appetizo_customizer_slider',
            'type'     => 'select',
            'choices'  => array(
                'enable'  => esc_html__( 'Enable', 'appetizo' ),
                'disable' => esc_html__( 'Disable', 'appetizo' ),
                ),
            'priority' => 6
        ) );
        $wp_customize->add_setting( 'appetizo_slider_category', array(
            'default' => '0',
            'sanitize_callback'	=> 'absint',
            'section'  => 'appetizo_customizer_slider',

        ) );
         $wp_customize->add_control(new appetizo_Customize_Category_Control( $wp_customize, 'appetizo_slider_category', array(
                    'label'    => esc_html__( 'Category for Slider', 'appetizo' ),
                    'section'  => 'appetizo_customizer_slider',
                    'settings' => 'appetizo_slider_category',
                    'priority'	 => 7
                )
            )
        );

        $wp_customize->add_setting( 'appetizo_slider_slides', array(
            'default' => '3',
            'sanitize_callback'	=> 'absint',
            'section'  => 'appetizo_customizer_slider',
        ) );

        $wp_customize->add_control( 'appetizo_slider_slides', array(
                    'label'      => esc_html__('Number of Posts for Slider','appetizo'),
                    'section'    => 'appetizo_customizer_slider',
                    'settings'   => 'appetizo_slider_slides',
                    'type'		 => 'number',
                    'priority'	 => 8
                )
        );

        $wp_customize->add_setting( 'appetizo_slider_designs', array(
            'default'    => 'Slider1',
            'section'  => 'appetizo_customizer_slider',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'appetizo_sanitize_radio',
        ) );

        $wp_customize->add_control( 'appetizo_slider_designs', array(
            'type' => 'radio',
            'label'    => esc_html__( 'Slider Designs', 'appetizo' ),
            'section'  => 'appetizo_customizer_slider',
            'choices'  => array(
                'Slider1'  => esc_html__( 'Carousel', 'appetizo' ),
                'Slider2' => esc_html__( 'Grid', 'appetizo' ),
                'Slider3' => esc_html__( 'Modern Carousel', 'appetizo' ),
            ),
            'priority' => 9
        ) );


        // Featured Boxes Starts

        $wp_customize->add_section( 'appetizo_featured_boxes' , array(
            'title'      => esc_html__( 'Featured Boxes','appetizo'),
            'description'=> esc_html__( 'Configure Featured Boxes', 'appetizo' ),
            'priority'   => 2,
        ) );

        // Featured Boxes
        $wp_customize->add_setting('appetizo_featured_box', array(
            'default'     => false,
            'section'  => 'appetizo_featured_boxes',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'appetizo_sanitize_checkbox',
        ) );
        $wp_customize->add_setting('appetizo_promo1_title', array(
            'default'     => '',
            'section'  => 'appetizo_featured_boxes',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );

        $wp_customize->add_setting('appetizo_promo1_image', array(
            'default' => get_theme_file_uri('images/slider-default.png'), // Add Default Image URL
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_setting(
            'appetizo_promo1_url',
            array(
                'default'     => '',
                'sanitize_callback'	=> 'esc_url_raw',
            )
        );

        $wp_customize->add_setting('appetizo_promo2_title', array(
            'default'     => '',
            'section'  => 'appetizo_featured_boxes',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );

        $wp_customize->add_setting('appetizo_promo2_image', array(
            'default' => get_theme_file_uri('images/slider-default.png'), // Add Default Image URL
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_setting(
            'appetizo_promo2_url',
            array(
                'default'     => '',
                'sanitize_callback'	=> 'esc_url_raw',
            )
        );

        $wp_customize->add_setting('appetizo_promo3_title', array(
            'default'     => '',
            'section'  => 'appetizo_featured_boxes',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );

        $wp_customize->add_setting('appetizo_promo3_image', array(
            'default' => get_theme_file_uri('images/slider-default.png'), // Add Default Image URL
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_setting(
            'appetizo_promo3_url',
            array(
                'default'     => '',
                'sanitize_callback'	=> 'esc_url_raw',
            )
        );

        $wp_customize->add_setting('appetizo_promo4_title', array(
            'default'     => '',
            'section'  => 'appetizo_featured_boxes',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );

        $wp_customize->add_setting('appetizo_promo4_image', array(
            'default' => get_theme_file_uri('images/slider-default.png'), // Add Default Image URL
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_setting(
            'appetizo_promo4_url',
            array(
                'default'     => '',
                'sanitize_callback'	=> 'esc_url_raw',
            )
        );

        $wp_customize->add_setting('appetizo_promo5_title', array(
            'default'     => '',
            'section'  => 'appetizo_featured_boxes',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );

        $wp_customize->add_setting('appetizo_promo5_image', array(
            'default' => get_theme_file_uri('images/slider-default.png'), // Add Default Image URL
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_setting(
            'appetizo_promo5_url',
            array(
                'default'     => '',
                'sanitize_callback'	=> 'esc_url_raw',
            )
        );

        $wp_customize->add_setting('appetizo_promo6_title', array(
            'default'     => '',
            'section'  => 'appetizo_featured_boxes',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );

        $wp_customize->add_setting('appetizo_promo6_image', array(
            'default' => get_theme_file_uri('images/slider-default.png'), // Add Default Image URL
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_setting(
            'appetizo_promo6_url',
            array(
                'default'     => '',
                'sanitize_callback'	=> 'esc_url_raw',
            )
        );

        $wp_customize->add_setting('appetizo_promo7_title', array(
            'default'     => '',
            'section'  => 'appetizo_featured_boxes',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );

        $wp_customize->add_setting('appetizo_promo7_image', array(
            'default' => get_theme_file_uri('images/slider-default.png'), // Add Default Image URL
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_setting(
            'appetizo_promo7_url',
            array(
                'default'     => '',
                'sanitize_callback'	=> 'esc_url_raw',
            )
        );

        $wp_customize->add_setting('appetizo_promo8_title', array(
            'default'     => '',
            'section'  => 'appetizo_featured_boxes',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );

        $wp_customize->add_setting('appetizo_promo8_image', array(
            'default' => get_theme_file_uri('images/slider-default.png'), // Add Default Image URL
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_setting(
            'appetizo_promo8_url',
            array(
                'default'     => '',
                'sanitize_callback'	=> 'esc_url_raw',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'featured_boxes',
                array(
                    'label'      => esc_html__('Enable Featured Boxes','appetizo'),
                    'section'    => 'appetizo_featured_boxes',
                    'settings'   => 'appetizo_featured_box',
                    'type'		 => 'checkbox',
                    'priority'	 => 1
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo1_title',
                array(
                    'label'      => esc_html__('Featured Box1 Title','appetizo'),
                    'section'    => 'appetizo_featured_boxes',
                    'settings'   => 'appetizo_promo1_title',
                    'type'		 => 'text',
                    'priority'	 => 3
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'promo1_image',
                array(
                    'label'      => esc_html__('Featured Box1 Image','appetizo'),
                    'section'    => 'appetizo_featured_boxes',
                    'settings'   => 'appetizo_promo1_image',
                    'priority'	 => 4
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo1_url',
                array(
                    'label'      => esc_html__('Featured Box1 URL','appetizo'),
                    'section'    => 'appetizo_featured_boxes',
                    'settings'   => 'appetizo_promo1_url',
                    'type'		 => 'url',
                    'priority'	 => 5
                )
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo2_title',
                array(
                    'label'      => esc_html__('Featured Box2 Title','appetizo'),
                    'section'    => 'appetizo_featured_boxes',
                    'settings'   => 'appetizo_promo2_title',
                    'type'		 => 'text',
                    'priority'	 => 6
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'promo2_image',
                array(
                    'label'      => esc_html__('Featured Box2 Image','appetizo'),
                    'section'    => 'appetizo_featured_boxes',
                    'settings'   => 'appetizo_promo2_image',
                    'priority'	 => 7
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo2_url',
                array(
                    'label'      => esc_html__('Featured Box2 URL','appetizo'),
                    'section'    => 'appetizo_featured_boxes',
                    'settings'   => 'appetizo_promo2_url',
                    'type'		 => 'url',
                    'priority'	 => 8
                )
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo3_title',
                array(
                    'label'      => esc_html__('Featured Box3 Title','appetizo'),
                    'section'    => 'appetizo_featured_boxes',
                    'settings'   => 'appetizo_promo3_title',
                    'type'		 => 'text',
                    'priority'	 => 9
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'promo3_image',
                array(
                    'label'      => esc_html__('Featured Box3 Image','appetizo'),
                    'section'    => 'appetizo_featured_boxes',
                    'settings'   => 'appetizo_promo3_image',
                    'priority'	 => 10
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo3_url',
                array(
                    'label'      => esc_html__('Featured Box3 URL','appetizo'),
                    'section'    => 'appetizo_featured_boxes',
                    'settings'   => 'appetizo_promo3_url',
                    'type'		 => 'url',
                    'priority'	 => 11
                )
            )
        );


        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo4_title',
                array(
                    'label'      => esc_html__('Featured Box4 Title','appetizo'),
                    'section'    => 'appetizo_featured_boxes',
                    'settings'   => 'appetizo_promo4_title',
                    'type'		 => 'text',
                    'priority'	 => 12
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'promo4_image',
                array(
                    'label'      => esc_html__('Featured Box4 Image','appetizo'),
                    'section'    => 'appetizo_featured_boxes',
                    'settings'   => 'appetizo_promo4_image',
                    'priority'	 => 13
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo4_url',
                array(
                    'label'      => esc_html__('Featured Box4 URL','appetizo'),
                    'section'    => 'appetizo_featured_boxes',
                    'settings'   => 'appetizo_promo4_url',
                    'type'		 => 'url',
                    'priority'	 => 14
                )
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo5_title',
                array(
                    'label'      => esc_html__('Featured Box5 Title','appetizo'),
                    'section'    => 'appetizo_featured_boxes',
                    'settings'   => 'appetizo_promo5_title',
                    'type'		 => 'text',
                    'priority'	 => 15
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'promo5_image',
                array(
                    'label'      => esc_html__('Featured Box5 Image','appetizo'),
                    'section'    => 'appetizo_featured_boxes',
                    'settings'   => 'appetizo_promo5_image',
                    'priority'	 => 16
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo5_url',
                array(
                    'label'      => esc_html__('Featured Box5 URL','appetizo'),
                    'section'    => 'appetizo_featured_boxes',
                    'settings'   => 'appetizo_promo5_url',
                    'type'		 => 'url',
                    'priority'	 => 17
                )
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo6_title',
                array(
                    'label'      => esc_html__('Featured Box6 Title','appetizo'),
                    'section'    => 'appetizo_featured_boxes',
                    'settings'   => 'appetizo_promo6_title',
                    'type'		 => 'text',
                    'priority'	 => 18
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'promo6_image',
                array(
                    'label'      => esc_html__('Featured Box6 Image','appetizo'),
                    'section'    => 'appetizo_featured_boxes',
                    'settings'   => 'appetizo_promo6_image',
                    'priority'	 => 19
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo6_url',
                array(
                    'label'      => esc_html__('Featured Box6 URL','appetizo'),
                    'section'    => 'appetizo_featured_boxes',
                    'settings'   => 'appetizo_promo6_url',
                    'type'		 => 'url',
                    'priority'	 => 20
                )
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo7_title',
                array(
                    'label'      => esc_html__('Featured Box7 Title','appetizo'),
                    'section'    => 'appetizo_featured_boxes',
                    'settings'   => 'appetizo_promo7_title',
                    'type'		 => 'text',
                    'priority'	 => 21
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'promo7_image',
                array(
                    'label'      => esc_html__('Featured Box7 Image','appetizo'),
                    'section'    => 'appetizo_featured_boxes',
                    'settings'   => 'appetizo_promo7_image',
                    'priority'	 => 22
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo7_url',
                array(
                    'label'      => esc_html__('Featured Box7 URL','appetizo'),
                    'section'    => 'appetizo_featured_boxes',
                    'settings'   => 'appetizo_promo7_url',
                    'type'		 => 'url',
                    'priority'	 => 23
                )
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo8_title',
                array(
                    'label'      => esc_html__('Featured Box8 Title','appetizo'),
                    'section'    => 'appetizo_featured_boxes',
                    'settings'   => 'appetizo_promo8_title',
                    'type'		 => 'text',
                    'priority'	 => 24
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'promo8_image',
                array(
                    'label'      => esc_html__('Featured Box8 Image','appetizo'),
                    'section'    => 'appetizo_featured_boxes',
                    'settings'   => 'appetizo_promo8_image',
                    'priority'	 => 25
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'promo8_url',
                array(
                    'label'      => esc_html__('Featured Box8 URL','appetizo'),
                    'section'    => 'appetizo_featured_boxes',
                    'settings'   => 'appetizo_promo8_url',
                    'type'		 => 'url',
                    'priority'	 => 26
                )
            )
        );
        // Featured Boxes End




        // Post Layout Boxes
        // Layoutbox1

        $wp_customize->add_section( 'appetizo_customizer_layoutbox1', array(
            'title'       => esc_html__( 'Layout Box1 Options', 'appetizo' ),
            'description' => esc_html__( 'Configure your Layout Box1 here.', 'appetizo' ),
            'priority'    => 4
        ) );
        $wp_customize->add_setting( 'appetizo_customizer_layoutbox1_disable', array(
            'default'    => 'enable',
            'section'  => 'appetizo_customizer_layoutbox1',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'appetizo_sanitize_radio',
        ) );
        $wp_customize->add_control( 'appetizo_layoutbox1_select_box', array(
            'settings' => 'appetizo_customizer_layoutbox1_disable',
            'label'    => esc_html__( 'Homepage Layout Box1', 'appetizo' ),
            'section'  => 'appetizo_customizer_layoutbox1',
            'type'     => 'select',
            'choices'  => array(
                'enable'  => esc_html__( 'Enable', 'appetizo' ),
                'disable' => esc_html__( 'Disable', 'appetizo' ),
            ),
            'priority' => 6
        ) );
        $wp_customize->add_setting('appetizo_layoutbox1_title', array(
            'default'     => '',
            'section'  => 'appetizo_customizer_layoutbox1',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'layoutbox1_title', array(
                    'label'      => esc_html__('Layout Box1 Title','appetizo'),
                    'section'    => 'appetizo_customizer_layoutbox1',
                    'settings'   => 'appetizo_layoutbox1_title',
                    'type'		 => 'text',
                    'priority'	 => 7
                )
            )
        );
        $wp_customize->add_setting( 'appetizo_layoutbox1_category', array(
            'default' => 0,
            'sanitize_callback'	=> 'absint',
            'section'  => 'appetizo_customizer_layoutbox1',

        ) );
        $wp_customize->add_control(new appetizo_Customize_Category_Control( $wp_customize, 'appetizo_layoutbox1_category', array(
                    'label'    => esc_html__( 'Category for Layout Box1', 'appetizo' ),
                    'section'  => 'appetizo_customizer_layoutbox1',
                    'settings' => 'appetizo_layoutbox1_category',
                    'priority'	 => 8
                )
            )
        );
        $wp_customize->add_setting( 'appetizo_layoutbox1_no', array(
            'default' => '3',
            'sanitize_callback'	=> 'absint',
            'section'  => 'appetizo_customizer_layoutbox1',
        ) );



        $wp_customize->add_control('appetizo_layoutbox1_no', array(
                    'label'      => esc_html__('Number of Posts for Layout Box1','appetizo'),
                    'section'    => 'appetizo_customizer_layoutbox1',
                    'settings'   => 'appetizo_layoutbox1_no',
                    'type'		 => 'number',
                    'priority'	 => 9
                )
        );

        $wp_customize->add_setting( 'appetizo_seemore_layoutbox1_disable', array(
            'default'    => 'enable',
            'section'  => 'appetizo_customizer_layoutbox1',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'appetizo_sanitize_radio',
        ) );
        $wp_customize->add_control( 'appetizo_layoutbox1_select_box_seemore', array(
            'settings' => 'appetizo_seemore_layoutbox1_disable',
            'label'    => esc_html__( 'See More Button', 'appetizo' ),
            'section'  => 'appetizo_customizer_layoutbox1',
            'type'     => 'select',
            'choices'  => array(
                'enable'  => esc_html__( 'Enable', 'appetizo' ),
                'disable' => esc_html__( 'Disable', 'appetizo' ),
            ),
            'priority' => 10
        ) );

        $wp_customize->add_setting('appetizo_layoutbox1_seemore', array(
            'default'     => 'SEE MORE POSTS',
            'section'  => 'appetizo_customizer_layoutbox1',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'layoutbox1_seemore', array(
                    'label'      => esc_html__('See More Button Text','appetizo'),
                    'section'    => 'appetizo_customizer_layoutbox1',
                    'settings'   => 'appetizo_layoutbox1_seemore',
                    'type'		 => 'text',
                    'priority'	 => 11
                )
            )
        );
        // Layoutbox2

        $wp_customize->add_section( 'appetizo_customizer_layoutbox2', array(
            'title'       => esc_html__( 'Layout Box2 Options', 'appetizo' ),
            'description' => esc_html__( 'Configure your Layout Box2 here.', 'appetizo' ),
            'priority'    => 4
        ) );
        $wp_customize->add_setting( 'appetizo_customizer_layoutbox2_disable', array(
            'default'    => 'enable',
            'section'  => 'appetizo_customizer_layoutbox2',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'appetizo_sanitize_radio',
        ) );
        $wp_customize->add_control( 'appetizo_layoutbox2_select_box', array(
            'settings' => 'appetizo_customizer_layoutbox2_disable',
            'label'    => esc_html__( 'Homepage Layout Box2', 'appetizo' ),
            'section'  => 'appetizo_customizer_layoutbox2',
            'type'     => 'select',
            'choices'  => array(
                'enable'  => esc_html__( 'Enable', 'appetizo' ),
                'disable' => esc_html__( 'Disable', 'appetizo' ),
            ),
            'priority' => 6
        ) );
        $wp_customize->add_setting('appetizo_layoutbox2_title', array(
            'default'     => '',
            'section'  => 'appetizo_customizer_layoutbox2',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'layoutbox2_title', array(
                    'label'      => esc_html__('Layout Box2 Title','appetizo'),
                    'section'    => 'appetizo_customizer_layoutbox2',
                    'settings'   => 'appetizo_layoutbox2_title',
                    'type'		 => 'text',
                    'priority'	 => 7
                )
            )
        );
        $wp_customize->add_setting( 'appetizo_layoutbox2_category', array(
            'default' => 0,
            'sanitize_callback'	=> 'absint',
            'section'  => 'appetizo_customizer_layoutbox2',

        ) );
        $wp_customize->add_control(new appetizo_Customize_Category_Control( $wp_customize, 'appetizo_layoutbox2_category', array(
                    'label'    => esc_html__( 'Category for Layout Box2', 'appetizo' ),
                    'section'  => 'appetizo_customizer_layoutbox2',
                    'settings' => 'appetizo_layoutbox2_category',
                    'priority'	 => 8
                )
            )
        );
        $wp_customize->add_setting( 'appetizo_layoutbox2_no', array(
            'default' => '5',
            'sanitize_callback'	=> 'absint',
            'section'  => 'appetizo_customizer_layoutbox2',
        ) );

        $wp_customize->add_control('appetizo_layoutbox2_no', array(
                    'label'      => esc_html__('Number of Posts for Layout Box2','appetizo'),
                    'section'    => 'appetizo_customizer_layoutbox2',
                    'settings'   => 'appetizo_layoutbox2_no',
                    'type'		 => 'number',
                    'priority'	 => 9
                )
        );
        $wp_customize->add_setting( 'appetizo_seemore_layoutbox2_disable', array(
            'default'    => 'enable',
            'section'  => 'appetizo_customizer_layoutbox2',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'appetizo_sanitize_radio',
        ) );
        $wp_customize->add_control( 'appetizo_layoutbox2_select_box_seemore', array(
            'settings' => 'appetizo_seemore_layoutbox2_disable',
            'label'    => esc_html__( 'See More Button', 'appetizo' ),
            'section'  => 'appetizo_customizer_layoutbox2',
            'type'     => 'select',
            'choices'  => array(
                'enable'  => esc_html__( 'Enable', 'appetizo' ),
                'disable' => esc_html__( 'Disable', 'appetizo' ),
            ),
            'priority' => 10
        ) );

        $wp_customize->add_setting('appetizo_layoutbox2_seemore', array(
            'default'     => 'See More Posts',
            'section'  => 'appetizo_customizer_layoutbox2',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'layoutbox2_seemore', array(
                    'label'      => esc_html__('See More Button Text','appetizo'),
                    'section'    => 'appetizo_customizer_layoutbox2',
                    'settings'   => 'appetizo_layoutbox2_seemore',
                    'type'		 => 'text',
                    'priority'	 => 11
                )
            )
        );
        // Layoutbox3

        $wp_customize->add_section( 'appetizo_customizer_layoutbox3', array(
            'title'       => esc_html__( 'Layout Box3 Options', 'appetizo' ),
            'description' => esc_html__( 'Configure your Layout Box3 here.', 'appetizo' ),
            'priority'    => 4
        ) );
        $wp_customize->add_setting( 'appetizo_customizer_layoutbox3_disable', array(
            'default'    => 'enable',
            'section'  => 'appetizo_customizer_layoutbox3',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'appetizo_sanitize_radio',
        ) );
        $wp_customize->add_control( 'appetizo_layoutbox3_select_box', array(
            'settings' => 'appetizo_customizer_layoutbox3_disable',
            'label'    => esc_html__( 'Homepage Layout Box3', 'appetizo' ),
            'section'  => 'appetizo_customizer_layoutbox3',
            'type'     => 'select',
            'choices'  => array(
                'enable'  => esc_html__( 'Enable', 'appetizo' ),
                'disable' => esc_html__( 'Disable', 'appetizo' ),
            ),
            'priority' => 6
        ) );
        $wp_customize->add_setting('appetizo_layoutbox3_title', array(
            'default'     => '',
            'section'  => 'appetizo_customizer_layoutbox3',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'layoutbox3_title', array(
                    'label'      => esc_html__('Layout Box3 Title','appetizo'),
                    'section'    => 'appetizo_customizer_layoutbox3',
                    'settings'   => 'appetizo_layoutbox3_title',
                    'type'		 => 'text',
                    'priority'	 => 7
                )
            )
        );
        $wp_customize->add_setting( 'appetizo_layoutbox3_category', array(
            'default' => 0,
            'sanitize_callback'	=> 'absint',
            'section'  => 'appetizo_customizer_layoutbox3',

        ) );
        $wp_customize->add_control(new appetizo_Customize_Category_Control( $wp_customize, 'appetizo_layoutbox3_category', array(
                    'label'    => esc_html__( 'Category for Layout Box3', 'appetizo' ),
                    'section'  => 'appetizo_customizer_layoutbox3',
                    'settings' => 'appetizo_layoutbox3_category',
                    'priority'	 => 8
                )
            )
        );
        $wp_customize->add_setting( 'appetizo_layoutbox3_no', array(
            'default' => '5',
            'sanitize_callback'	=> 'absint',
            'section'  => 'appetizo_customizer_layoutbox3',
        ) );

        $wp_customize->add_control('appetizo_layoutbox3_no', array(
                    'label'      => esc_html__('Number of Posts for Layout Box3','appetizo'),
                    'section'    => 'appetizo_customizer_layoutbox3',
                    'settings'   => 'appetizo_layoutbox3_no',
                    'type'		 => 'number',
                    'priority'	 => 9
                )
        );
        $wp_customize->add_setting( 'appetizo_seemore_layoutbox3_disable', array(
            'default'    => 'enable',
            'section'  => 'appetizo_customizer_layoutbox3',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'appetizo_sanitize_radio',
        ) );
        $wp_customize->add_control( 'appetizo_layoutbox3_select_box_seemore', array(
            'settings' => 'appetizo_seemore_layoutbox3_disable',
            'label'    => esc_html__( 'See More Button', 'appetizo' ),
            'section'  => 'appetizo_customizer_layoutbox3',
            'type'     => 'select',
            'choices'  => array(
                'enable'  => esc_html__( 'Enable', 'appetizo' ),
                'disable' => esc_html__( 'Disable', 'appetizo' ),
            ),
            'priority' => 10
        ) );

        $wp_customize->add_setting('appetizo_layoutbox3_seemore', array(
            'default'     => 'See More Posts',
            'section'  => 'appetizo_customizer_layoutbox3',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'layoutbox3_seemore', array(
                    'label'      => esc_html__('See More Button Text','appetizo'),
                    'section'    => 'appetizo_customizer_layoutbox3',
                    'settings'   => 'appetizo_layoutbox3_seemore',
                    'type'		 => 'text',
                    'priority'	 => 11
                )
            )
        );

        // Layoutbox4

        $wp_customize->add_section( 'appetizo_customizer_layoutbox4', array(
            'title'       => esc_html__( 'Layout Box4 Options', 'appetizo' ),
            'description' => esc_html__( 'Configure your Layout Box4 here.', 'appetizo' ),
            'priority'    => 4
        ) );
        $wp_customize->add_setting( 'appetizo_customizer_layoutbox4_disable', array(
            'default'    => 'enable',
            'section'  => 'appetizo_customizer_layoutbox4',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'appetizo_sanitize_radio',
        ) );
        $wp_customize->add_control( 'appetizo_layoutbox4_select_box', array(
            'settings' => 'appetizo_customizer_layoutbox4_disable',
            'label'    => esc_html__( 'Homepage Layout Box4', 'appetizo' ),
            'section'  => 'appetizo_customizer_layoutbox4',
            'type'     => 'select',
            'choices'  => array(
                'enable'  => esc_html__( 'Enable', 'appetizo' ),
                'disable' => esc_html__( 'Disable', 'appetizo' ),
            ),
            'priority' => 6
        ) );
        $wp_customize->add_setting('appetizo_layoutbox4_title', array(
            'default'     => '',
            'section'  => 'appetizo_customizer_layoutbox4',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'layoutbox4_title', array(
                    'label'      => esc_html__('Layout Box4 Title','appetizo'),
                    'section'    => 'appetizo_customizer_layoutbox4',
                    'settings'   => 'appetizo_layoutbox4_title',
                    'type'		 => 'text',
                    'priority'	 => 7
                )
            )
        );
        $wp_customize->add_setting( 'appetizo_layoutbox4_category', array(
            'default' => 0,
            'sanitize_callback'	=> 'absint',
            'section'  => 'appetizo_customizer_layoutbox4',

        ) );
        $wp_customize->add_control(new appetizo_Customize_Category_Control( $wp_customize, 'appetizo_layoutbox4_category', array(
                    'label'    => esc_html__( 'Category for Layout Box4', 'appetizo' ),
                    'section'  => 'appetizo_customizer_layoutbox4',
                    'settings' => 'appetizo_layoutbox4_category',
                    'priority'	 => 8
                )
            )
        );
        $wp_customize->add_setting( 'appetizo_layoutbox4_no', array(
            'default' => '6',
            'sanitize_callback'	=> 'absint',
            'section'  => 'appetizo_customizer_layoutbox4',
        ) );

        $wp_customize->add_control('appetizo_layoutbox4_no', array(
                    'label'      => esc_html__('Number of Posts for Layout Box4','appetizo'),
                    'section'    => 'appetizo_customizer_layoutbox4',
                    'settings'   => 'appetizo_layoutbox4_no',
                    'type'		 => 'number',
                    'priority'	 => 9
                )
        );
        $wp_customize->add_setting( 'appetizo_seemore_layoutbox4_disable', array(
            'default'    => 'enable',
            'section'  => 'appetizo_customizer_layoutbox4',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'appetizo_sanitize_radio',
        ) );
        $wp_customize->add_control( 'appetizo_layoutbox4_select_box_seemore', array(
            'settings' => 'appetizo_seemore_layoutbox4_disable',
            'label'    => esc_html__( 'See More Button', 'appetizo' ),
            'section'  => 'appetizo_customizer_layoutbox4',
            'type'     => 'select',
            'choices'  => array(
                'enable'  => esc_html__( 'Enable', 'appetizo' ),
                'disable' => esc_html__( 'Disable', 'appetizo' ),
            ),
            'priority' => 10
        ) );

        $wp_customize->add_setting('appetizo_layoutbox4_seemore', array(
            'default'     => 'See More Posts',
            'section'  => 'appetizo_customizer_layoutbox4',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'layoutbox4_seemore', array(
                    'label'      => esc_html__('See More Button Text','appetizo'),
                    'section'    => 'appetizo_customizer_layoutbox4',
                    'settings'   => 'appetizo_layoutbox4_seemore',
                    'type'		 => 'text',
                    'priority'	 => 11
                )
            )
        );


        // Layoutbox5

        $wp_customize->add_section( 'appetizo_customizer_layoutbox5', array(
            'title'       => esc_html__( 'Layout Box5 Options', 'appetizo' ),
            'description' => esc_html__( 'Configure your Layout Box5 here.', 'appetizo' ),
            'priority'    => 4
        ) );
        $wp_customize->add_setting( 'appetizo_customizer_layoutbox5_disable', array(
            'default'    => 'enable',
            'section'  => 'appetizo_customizer_layoutbox5',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'appetizo_sanitize_radio',
        ) );
        $wp_customize->add_control( 'appetizo_layoutbox5_select_box', array(
            'settings' => 'appetizo_customizer_layoutbox5_disable',
            'label'    => esc_html__( 'Homepage Layout Box5', 'appetizo' ),
            'section'  => 'appetizo_customizer_layoutbox5',
            'type'     => 'select',
            'choices'  => array(
                'enable'  => esc_html__( 'Enable', 'appetizo' ),
                'disable' => esc_html__( 'Disable', 'appetizo' ),
            ),
            'priority' => 6
        ) );
        $wp_customize->add_setting('appetizo_layoutbox5_title', array(
            'default'     => '',
            'section'  => 'appetizo_customizer_layoutbox5',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'layoutbox5_title', array(
                    'label'      => esc_html__('Layout Box5 Title','appetizo'),
                    'section'    => 'appetizo_customizer_layoutbox5',
                    'settings'   => 'appetizo_layoutbox5_title',
                    'type'		 => 'text',
                    'priority'	 => 7
                )
            )
        );
        $wp_customize->add_setting( 'appetizo_layoutbox5_category', array(
            'default' => 0,
            'sanitize_callback'	=> 'absint',
            'section'  => 'appetizo_customizer_layoutbox5',

        ) );
        $wp_customize->add_control(new appetizo_Customize_Category_Control( $wp_customize, 'appetizo_layoutbox5_category', array(
                    'label'    => esc_html__( 'Category for Layout Box5', 'appetizo' ),
                    'section'  => 'appetizo_customizer_layoutbox5',
                    'settings' => 'appetizo_layoutbox5_category',
                    'priority'	 => 8
                )
            )
        );
        $wp_customize->add_setting( 'appetizo_layoutbox5_no', array(
            'default' => '3',
            'sanitize_callback'	=> 'absint',
            'section'  => 'appetizo_customizer_layoutbox5',
        ) );

        $wp_customize->add_control('appetizo_layoutbox5_no', array(
                    'label'      => esc_html__('Number of Posts for Layout Box5','appetizo'),
                    'section'    => 'appetizo_customizer_layoutbox5',
                    'settings'   => 'appetizo_layoutbox5_no',
                    'type'		 => 'number',
                    'priority'	 => 9
                )
        );
        $wp_customize->add_setting( 'appetizo_seemore_layoutbox5_disable', array(
            'default'    => 'enable',
            'section'  => 'appetizo_customizer_layoutbox5',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'appetizo_sanitize_radio',
        ) );
        $wp_customize->add_control( 'appetizo_layoutbox5_select_box_seemore', array(
            'settings' => 'appetizo_seemore_layoutbox5_disable',
            'label'    => esc_html__( 'See More Button', 'appetizo' ),
            'section'  => 'appetizo_customizer_layoutbox5',
            'type'     => 'select',
            'choices'  => array(
                'enable'  => esc_html__( 'Enable', 'appetizo' ),
                'disable' => esc_html__( 'Disable', 'appetizo' ),
            ),
            'priority' => 10
        ) );

        $wp_customize->add_setting('appetizo_layoutbox5_seemore', array(
            'default'     => 'See More Posts',
            'section'  => 'appetizo_customizer_layoutbox5',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'layoutbox5_seemore', array(
                    'label'      => esc_html__('See More Button Text','appetizo'),
                    'section'    => 'appetizo_customizer_layoutbox5',
                    'settings'   => 'appetizo_layoutbox5_seemore',
                    'type'		 => 'text',
                    'priority'	 => 11
                )
            )
        );

        // Layoutbox6

        $wp_customize->add_section( 'appetizo_customizer_layoutbox6', array(
            'title'       => esc_html__( 'Layout Box6 Options', 'appetizo' ),
            'description' => esc_html__( 'Configure your Layout Box6 here.', 'appetizo' ),
            'priority'    => 4
        ) );
        $wp_customize->add_setting( 'appetizo_customizer_layoutbox6_disable', array(
            'default'    => 'enable',
            'section'  => 'appetizo_customizer_layoutbox6',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'appetizo_sanitize_radio',
        ) );
        $wp_customize->add_control( 'appetizo_layoutbox6_select_box', array(
            'settings' => 'appetizo_customizer_layoutbox6_disable',
            'label'    => esc_html__( 'Homepage Layout Box6', 'appetizo' ),
            'section'  => 'appetizo_customizer_layoutbox6',
            'type'     => 'select',
            'choices'  => array(
                'enable'  => esc_html__( 'Enable', 'appetizo' ),
                'disable' => esc_html__( 'Disable', 'appetizo' ),
            ),
            'priority' => 6
        ) );
        $wp_customize->add_setting('appetizo_layoutbox6_title', array(
            'default'     => '',
            'section'  => 'appetizo_customizer_layoutbox6',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'layoutbox6_title', array(
                    'label'      => esc_html__('Layout Box6 Title','appetizo'),
                    'section'    => 'appetizo_customizer_layoutbox6',
                    'settings'   => 'appetizo_layoutbox6_title',
                    'type'		 => 'text',
                    'priority'	 => 7
                )
            )
        );
        $wp_customize->add_setting( 'appetizo_layoutbox6_category', array(
            'default' => 0,
            'sanitize_callback'	=> 'absint',
            'section'  => 'appetizo_customizer_layoutbox6',

        ) );
        $wp_customize->add_control(new appetizo_Customize_Category_Control( $wp_customize, 'appetizo_layoutbox6_category', array(
                    'label'    => esc_html__( 'Category for Layout Box6', 'appetizo' ),
                    'section'  => 'appetizo_customizer_layoutbox6',
                    'settings' => 'appetizo_layoutbox6_category',
                    'priority'	 => 8
                )
            )
        );
        $wp_customize->add_setting( 'appetizo_layoutbox6_no', array(
            'default' => '8',
            'sanitize_callback'	=> 'absint',
            'section'  => 'appetizo_customizer_layoutbox6',
        ) );

        $wp_customize->add_control('appetizo_layoutbox6_no', array(
                    'label'      => esc_html__('Number of Posts for Layout Box6','appetizo'),
                    'section'    => 'appetizo_customizer_layoutbox6',
                    'settings'   => 'appetizo_layoutbox6_no',
                    'type'		 => 'number',
                    'priority'	 => 9
                )
        );
        $wp_customize->add_setting( 'appetizo_seemore_layoutbox6_disable', array(
            'default'    => 'enable',
            'section'  => 'appetizo_customizer_layoutbox6',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'appetizo_sanitize_radio',
        ) );
        $wp_customize->add_control( 'appetizo_layoutbox6_select_box_seemore', array(
            'settings' => 'appetizo_seemore_layoutbox6_disable',
            'label'    => esc_html__( 'See More Button', 'appetizo' ),
            'section'  => 'appetizo_customizer_layoutbox6',
            'type'     => 'select',
            'choices'  => array(
                'enable'  => esc_html__( 'Enable', 'appetizo' ),
                'disable' => esc_html__( 'Disable', 'appetizo' ),
            ),
            'priority' => 10
        ) );

        $wp_customize->add_setting('appetizo_layoutbox6_seemore', array(
            'default'     => 'See More Posts',
            'section'  => 'appetizo_customizer_layoutbox6',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field',
        ) );
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'layoutbox6_seemore', array(
                    'label'      => esc_html__('See More Button Text','appetizo'),
                    'section'    => 'appetizo_customizer_layoutbox6',
                    'settings'   => 'appetizo_layoutbox6_seemore',
                    'type'		 => 'text',
                    'priority'	 => 11
                )
            )
        );
        // Post Layout Boxes End






        //General Options

        $wp_customize->add_section( 'appetizo_general_options', array(
            'title'       => esc_html__( 'General Options', 'appetizo' ),
            'description' => esc_html__( 'Configure Your Theme Settings Here.', 'appetizo' ),
            'priority'    => 3
        ) );

        $wp_customize->add_setting( 'appetizo_general_search_icon', array(
            'section'  => 'appetizo_general_options',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'appetizo_sanitize_checkbox',
        ) );

        $wp_customize->add_control( 'appetizo_general_search_icon', array(
            'settings' => 'appetizo_general_search_icon',
            'label'    => esc_html__( 'Hide Top Search Icon', 'appetizo' ),
            'section'  => 'appetizo_general_options',
            'type'     => 'checkbox',
            'priority' => 6
        ) );
        $wp_customize->add_setting( 'appetizo_general_responsive', array(
            'section'  => 'appetizo_general_options',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'appetizo_sanitize_checkbox',
        ) );

        $wp_customize->add_control( 'appetizo_general_responsive', array(
            'settings' => 'appetizo_general_responsive',
            'label'    => esc_html__( 'Disable Responsive', 'appetizo' ),
            'section'  => 'appetizo_general_options',
            'type'     => 'checkbox',
            'priority' => 6
        ) );
        $wp_customize->add_setting( 'appetizo_general_sidebar_home', array(
            'section'  => 'appetizo_general_options',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'appetizo_sanitize_checkbox',
        ) );

        $wp_customize->add_control( 'appetizo_general_sidebar_home', array(
            'settings' => 'appetizo_general_sidebar_home',
            'label'    => esc_html__( 'Disable Sidebar on Homepage and Archive Pages', 'appetizo' ),
            'section'  => 'appetizo_general_options',
            'type'     => 'checkbox',
            'priority' => 6
        ) );
        $wp_customize->add_setting( 'appetizo_general_sidebar_post', array(
            'section'  => 'appetizo_general_options',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'appetizo_sanitize_checkbox',
        ) );

        $wp_customize->add_control( 'appetizo_general_sidebar_post', array(
            'settings' => 'appetizo_general_sidebar_post',
            'label'    => esc_html__( 'Disable Sidebar on Posts', 'appetizo' ),
            'section'  => 'appetizo_general_options',
            'type'     => 'checkbox',
            'priority' => 6
        ) );
        $wp_customize->add_setting( 'appetizo_general_sidebar_page', array(
            'section'  => 'appetizo_general_options',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'appetizo_sanitize_checkbox',
        ) );

        $wp_customize->add_control( 'appetizo_general_sidebar_page', array(
            'settings' => 'appetizo_general_sidebar_page',
            'label'    => esc_html__( 'Disable Sidebar on Pages', 'appetizo' ),
            'section'  => 'appetizo_general_options',
            'type'     => 'checkbox',
            'priority' => 6
        ) );

        $wp_customize->add_setting( 'appetizo_general_author_post', array(
            'section'  => 'appetizo_general_options',
            'capability' => 'edit_theme_options',
            'sanitize_callback'	=> 'appetizo_sanitize_checkbox',
        ) );

        $wp_customize->add_control( 'appetizo_general_author_post', array(
            'settings' => 'appetizo_general_author_post',
            'label'    => esc_html__( 'Disable Author Box on Posts', 'appetizo' ),
            'section'  => 'appetizo_general_options',
            'type'     => 'checkbox',
            'priority' => 6
        ) );

        $wp_customize->add_setting( 'appetizo_general_post_summary', array(
            'default' => 'excerpt',
            'section'  => 'appetizo_general_options',
            'sanitize_callback'	=> 'appetizo_sanitize_radio',
        ) );

        $wp_customize->add_control( 'appetizo_general_post_summary', array(
            'type' => 'radio',
            'label'    => esc_html__( 'Homepage and Archive Post Summary Type', 'appetizo' ),
            'section'  => 'appetizo_general_options',
            'choices'  => array(
                'excerpt'  => esc_html__( 'Use Excerpt', 'appetizo' ),
                'full' => esc_html__( 'Use Full Post', 'appetizo' ),
            ),
            'priority' => 9
        ) );
        $wp_customize->add_setting( 'appetizo_general_post_layout', array(
            'default' => 'standard',
            'section'  => 'appetizo_general_options',
            'sanitize_callback'	=> 'appetizo_sanitize_radio',
        ) );
        $wp_customize->add_control( 'appetizo_general_post_layout', array(
            'type' => 'radio',
            'label'    => esc_html__( 'Homepage and Archive Post Layout Type', 'appetizo' ),
            'section'  => 'appetizo_general_options',
            'choices'  => array(
                'grid'  => esc_html__( 'Grid Layout', 'appetizo' ),
                'standard' => esc_html__( 'Standard Post', 'appetizo' ),
                'list' => esc_html__( 'List Post [Only in Premium Version]', 'appetizo' ),
            ),
            'priority' => 10
        ) );

        // Pro Version
        $wp_customize->add_setting( 'pro_version_colors2', array(
            'sanitize_callback' => 'appetizo_sanitize_custom_control'
        ) );
        $wp_customize->add_control( new Appetizo_Customize_Pro_Version ( $wp_customize,
                'pro_version_colors2', array(
                    'section'	  => 'appetizo_general_options',
                    'type'		  => 'pro_options',
                    'label' 	  => esc_html__( 'Upgrade', 'appetizo' ),
                    'description' => esc_url_raw( 'https://www.vinethemes.com/downloads/appetizo-cooking-recipe-wordpress-theme/' ),
                    'priority'	  => 100
                )
            )
        );


        // Footer Settings
        $wp_customize->add_section( 'appetizo_footer_settings', array(
            'title'       => esc_html__( 'Footer Settings', 'appetizo' ),
            'description' => esc_html__( 'Configure Your Footer Here. You can\'t change our footer links in the free version of this theme.', 'appetizo' ),
            'priority'    => 8
        ) );

        $wp_customize->add_setting(
            'footer_copyright',
            array(
                'default'     => 'Copyright 2023.',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

        $wp_customize->add_control('footer_copyright', array(
                    'label'      => esc_html__('Footer Copyright Text','appetizo'),
                    'section'    => 'appetizo_footer_settings',
                    'settings'   => 'footer_copyright',
                    'type'		 => 'text',
                    'priority'	 => 1
                )
        );


        // Pro Version
        $wp_customize->add_setting( 'pro_version_colors3', array(
            'sanitize_callback' => 'appetizo_sanitize_custom_control'
        ) );
        $wp_customize->add_control( new Appetizo_Customize_Pro_Version ( $wp_customize,
                'pro_version_colors3', array(
                    'section'	  => 'appetizo_footer_settings',
                    'type'		  => 'pro_options',
                    'label' 	  => esc_html__( 'Upgrade', 'appetizo' ),
                    'description' => esc_url_raw( 'https://www.vinethemes.com/downloads/appetizo-cooking-recipe-wordpress-theme/' ),
                    'priority'	  => 100
                )
            )
        );


    }


// Adding controls to default customizer panel
    add_action('customize_register','appetizo_customizer_options');
    /*
     * Add in our custom Main Color setting and control to be used in the Customizer in the Colors section
     *
     */
    function appetizo_customizer_options( $wp_customize ) {
        $wp_customize->add_setting(
            'appetizo_main_color', //give it an ID
            array(
                'default' => '#fc4544', // Give it a default
                'sanitize_callback' => 'sanitize_hex_color',
                'transport'      => 'refresh'
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'appetizo_custom_main_color', //give it an ID
                array(
                    'label'      => esc_html__( 'Main Color', 'appetizo' ), //set the label to appear in the Customizer
                    'section'    => 'colors', //select the section for it to appear under
                    'settings'   => 'appetizo_main_color' //pick the setting it applies to
                )
            )
        );
        $wp_customize->add_setting(
            'appetizo_main_text', //give it an ID
            array(
                'default' => '#fc4544', // Give it a default
                'sanitize_callback' => 'sanitize_hex_color',
                'transport'      => 'refresh'
            )
        );
        $wp_customize->add_control(
            new Appetizo_Customize_Pro_Version(
                $wp_customize,
                'appetizo_custom_text', //give it an ID
                array(
                    'label'      => esc_html__( 'Upgrade', 'appetizo' ), //set the label to appear in the Customizer
                    'section'    => 'colors', //select the section for it to appear under
                    'settings'   => 'appetizo_main_text', //pick the setting it applies to
                    'description' => esc_url_raw( 'https://www.vinethemes.com/downloads/appetizo-cooking-recipe-wordpress-theme/' ),
                )
            )
        );



    }



    /*
    * Adding a section to manage social links
    */
    function appetizo_sociallink_customizer( $wp_customize ) {
        $wp_customize->add_section( 'appetizo_social_section' , array(
            'title' => esc_html__( 'Social Links', 'appetizo' ),
            'priority' => 30,
            'description' => 'Setting for Social media Icons. Add a link to each of your Social Media Profiles. Leave the field empty for the icons you don\'t want to be displayed.',

        ) );

        $wp_customize->add_setting( 'appetizo_facebook', array(
            'sanitize_callback'	=> 'esc_url_raw',

        ) );
        $wp_customize->add_setting( 'appetizo_twitter', array(
            'sanitize_callback'	=> 'esc_url_raw',

        ) );

        $wp_customize->add_setting( 'appetizo_pinterest', array(
            'sanitize_callback'	=> 'esc_url_raw',

        ) );

        $wp_customize->add_setting( 'appetizo_linkedin', array(
            'sanitize_callback'	=> 'esc_url_raw',

        ) );
        $wp_customize->add_setting( 'appetizo_instagram', array(
            'sanitize_callback'	=> 'esc_url_raw',

        ) );
        $wp_customize->add_setting( 'appetizo_bloglovin', array(
            'sanitize_callback'	=> 'esc_url_raw',

        ) );
        $wp_customize->add_setting( 'appetizo_snapchat', array(
            'sanitize_callback'	=> 'esc_url_raw',

        ) );
        $wp_customize->add_setting( 'appetizo_tumblr', array(
            'sanitize_callback'	=> 'esc_url_raw',

        ) );
        $wp_customize->add_setting( 'appetizo_youtube', array(
            'sanitize_callback'	=> 'esc_url_raw',

        ) );
        $wp_customize->add_setting( 'appetizo_dribbble', array(
            'sanitize_callback'	=> 'esc_url_raw',

        ) );
        $wp_customize->add_setting( 'appetizo_soundcloud', array(
            'sanitize_callback'	=> 'esc_url_raw',

        ) );
        $wp_customize->add_setting( 'appetizo_vimeo', array(
            'sanitize_callback'	=> 'esc_url_raw',

        ) );
        $wp_customize->add_setting( 'appetizo_rss', array(
            'sanitize_callback'	=> 'esc_url_raw',

        ) );


        $wp_customize->add_control( 'facebook', array(
            'type' => 'url',
            'label' => esc_html__( 'Facebook', 'appetizo' ),
            'section' => 'appetizo_social_section',
            'settings' => 'appetizo_facebook',
        ) );
        $wp_customize->add_control( 'twitter', array(
            'type' => 'url',
            'label' => esc_html__( 'Twitter', 'appetizo' ),
            'section' => 'appetizo_social_section',
            'settings' => 'appetizo_twitter',
        ) );
        $wp_customize->add_control( 'linkedin', array(
            'type' => 'url',
            'label' => esc_html__( 'Linkedin', 'appetizo' ),
            'section' => 'appetizo_social_section',
            'settings' => 'appetizo_linkedin',
        ) );
        $wp_customize->add_control( 'pinterest', array(
            'type' => 'url',
            'label' => esc_html__( 'Pinterest', 'appetizo' ),
            'section' => 'appetizo_social_section',
            'settings' => 'appetizo_pinterest',
        ) );

        $wp_customize->add_control( 'instagram', array(
            'type' => 'url',
            'label' => esc_html__( 'Instagram', 'appetizo' ),
            'section' => 'appetizo_social_section',
            'settings' => 'appetizo_instagram',
        ) );
        $wp_customize->add_control( 'bloglovin', array(
            'type' => 'url',
            'label' => esc_html__( 'Bloglovin', 'appetizo' ),
            'section' => 'appetizo_social_section',
            'settings' => 'appetizo_bloglovin',
        ) );
        $wp_customize->add_control( 'snapchat', array(
            'type' => 'url',
            'label' => esc_html__( 'Snapchat', 'appetizo' ),
            'section' => 'appetizo_social_section',
            'settings' => 'appetizo_snapchat',
        ) );
        $wp_customize->add_control( 'tumblr', array(
            'type' => 'url',
            'label' => esc_html__( 'Tumblr', 'appetizo' ),
            'section' => 'appetizo_social_section',
            'settings' => 'appetizo_tumblr',
        ) );
        $wp_customize->add_control( 'youtube', array(
            'type' => 'url',
            'label' => esc_html__( 'Youtube', 'appetizo' ),
            'section' => 'appetizo_social_section',
            'settings' => 'appetizo_youtube',
        ) );
        $wp_customize->add_control( 'dribbble', array(
            'type' => 'url',
            'label' => esc_html__( 'Dribbble', 'appetizo' ),
            'section' => 'appetizo_social_section',
            'settings' => 'appetizo_dribbble',
        ) );
        $wp_customize->add_control( 'soundcloud', array(
            'type' => 'url',
            'label' => esc_html__( 'Soundcloud', 'appetizo' ),
            'section' => 'appetizo_social_section',
            'settings' => 'appetizo_soundcloud',
        ) );
        $wp_customize->add_control( 'vimeo', array(
            'type' => 'url',
            'label' => esc_html__( 'Vimeo', 'appetizo' ),
            'section' => 'appetizo_social_section',
            'settings' => 'appetizo_vimeo',
        ) );
        $wp_customize->add_control( 'rss', array(
            'type' => 'url',
            'label' => esc_html__( 'Rss', 'appetizo' ),
            'section' => 'appetizo_social_section',
            'settings' => 'appetizo_rss',
        ) );


    }
    add_action('customize_register', 'appetizo_sociallink_customizer');

    function appetizo_sanitize_text( $input ) {
        return wp_kses_post( force_balance_tags( $input ) );
    }


    //checkbox sanitization function
    function appetizo_sanitize_checkbox( $input ){

        //returns true if checkbox is checked
        return (( isset( $input ) && true === $input ) ? true : false );
    }

    //radio box sanitization function
    function appetizo_sanitize_radio( $input, $setting ){
    $valid = array(
        'Slider1' => 'Slider1',
        'Slider2' => 'Slider2',
        'Slider3' => 'Slider3',
        'excerpt' => 'excerpt',
        'full' => 'full',
        'standard' => 'standard',
        'grid' => 'grid',
        'enable' => 'enable',
        'disable' => 'disable',
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return $setting->default;
    }
    }

    function appetizo_panels_js() {
        wp_enqueue_style( 'appetizo-customizer-ui-css', get_theme_file_uri( '/customizer-ui.css' ) );
    }
    add_action( 'customize_controls_enqueue_scripts', 'appetizo_panels_js' );
