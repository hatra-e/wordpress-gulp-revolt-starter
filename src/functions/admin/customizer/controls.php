<?php
/**
 * Customizer Controls
 */



if ( ! class_exists( 'RVN_Customizer_Controls' ) ) :
    /**
     * Registers all customizer controls.
     *
     * @wp-hook customize_register
     * @since 1.0.0
     */
    class RVN_Customizer_Controls extends RVN_Customizer_Controls_Interface
    {


        /**
         * Register all controls.
         *
         * @since 1.0.0
         */
        public static function register( $wp_customize )
        {
            self::$wp_customize = $wp_customize;

            self::register_example_section();
        }



        /**
         * Register Example Section
         *
         * @since 1.0.0
         */
        public static function register_example_section()
        {
            self::add_panel( array(
                'id'    => 'examplepanel',
                'title' => _x('Example Panel', 'Customizer Panel', 'rvn'),
            ) );

            self::add_section( array(
                'id'          => 'examplesection',
                'panel'       => 'examplepanel',
                'title'       => _x( 'Example Section', 'Customizer Section', 'rvn' ),
                'description' => __( 'My example description.', 'rvn' ),
            ) );

            self::add_control( array(
                'id'      => 'example_text',
                'label'   => __( 'Example Text', 'rvn' ),
                'type'    => 'text',
//                'default' => 'My default example text',
            ) );

            self::add_control( array(
                'id'    => 'example_textarea',
                'label' => __( 'Example Textarea', 'rvn' ),
                'type'  => 'textarea',
            ) );

            self::add_control( array(
                'id'      => 'example_checkbox',
                'label'   => __( 'Example Checkbox', 'rvn' ),
                'type'    => 'checkbox',
//                'default' => true,
            ) );

            self::add_control( array(
                'id'      => 'example_select',
                'label'   => __( 'Example Select', 'rvn' ),
                'type'    => 'select',
                'choices' => array(
                    'choice1' => __( 'Choice 1', 'rvn' ),
                    'choice2' => __( 'Choice 2', 'rvn' ),
                    'choice3' => __( 'Choice 3', 'rvn' ),
                ),
                'default' => 'choice1',
//                'default' => '',
            ) );

            self::add_control( array(
                'id'      => 'example_link',
                'label'   => __( 'Example Link', 'rvn' ),
                'type'    => 'dropdown-pages',
            ) );

            self::add_control( array(
                'id'        => 'example_color',
                'label'     => __( 'Example Color', 'rvn' ),
                'type'      => 'color',
                'default'   => '#555555',
                'transport' => 'postMessage', // Live-update
            ) );

            self::add_control( array(
                'id'    => 'example_file',
                'label' => __( 'Example File', 'rvn' ),
                'type'  => 'file',
            ) );

            self::add_control( array(
                'id'        => 'example_media',
                'label'     => __( 'Example Media', 'rvn' ),
                'type'      => 'media',
//                'mime_type' => 'audio',
            ) );

            self::add_control( array(
                'id'    => 'example_image',
                'label' => __( 'Example Image', 'rvn' ),
                'type'  => 'image',
            ) );

            self::add_control( array(
                'id'          => 'example_cropped_image',
                'label'       => __( 'Example Cropped Image', 'rvn' ),
                'type'        => 'cropped_image',
                'flex_width'  => false,
                'flex_height' => false,
                'width'       => 500,
                'height'      => 500,
            ) );
        }



    }

    add_action( 'customize_register', array( 'RVN_Customizer_Controls', 'register' ) );
endif;
