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

            self::register_example_controls();
        }



        /**
         * Register Example Controls
         *
         * @since 1.0.0
         */
        public static function register_example_controls()
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
                'type'    => 'text',
                'id'      => 'example_text',
                'label'   => __( 'Example Text', 'rvn' ),
//                'default' => 'My default example text',
            ) );

            self::add_control( array(
                'type'  => 'textarea',
                'id'    => 'example_textarea',
                'label' => __( 'Example Textarea', 'rvn' ),
            ) );

            self::add_control( array(
                'type'    => 'checkbox',
                'id'      => 'example_checkbox',
                'label'   => __( 'Example Checkbox', 'rvn' ),
//                'default' => true,
            ) );

            self::add_control( array(
                'type'    => 'select',
                'id'      => 'example_select',
                'label'   => __( 'Example Select', 'rvn' ),
                'choices' => array(
                    'choice1' => __( 'Choice 1', 'rvn' ),
                    'choice2' => __( 'Choice 2', 'rvn' ),
                    'choice3' => __( 'Choice 3', 'rvn' ),
                ),
                'default' => 'choice1',
//                'default' => '',
            ) );

            self::add_control( array(
                'type'    => 'dropdown-pages',
                'id'      => 'example_link',
                'label'   => __( 'Example Link', 'rvn' ),
            ) );

            self::add_control( array(
                'type'      => 'color',
                'id'        => 'example_color',
                'label'     => __( 'Example Color', 'rvn' ),
                'default'   => '#555555',
                'transport' => 'postMessage', // Live-update
            ) );

            self::add_control( array(
                'type'  => 'file',
                'id'    => 'example_file',
                'label' => __( 'Example File', 'rvn' ),
            ) );

            self::add_control( array(
                'type'      => 'media',
                'id'        => 'example_media',
//                'mime_type' => 'audio',
                'label'     => __( 'Example Media', 'rvn' ),
            ) );

            self::add_control( array(
                'type'  => 'image',
                'id'    => 'example_image',
                'label' => __( 'Example Image', 'rvn' ),
            ) );

            self::add_control( array(
                'type'        => 'cropped_image',
                'id'          => 'example_cropped_image',
                'label'       => __( 'Example Cropped Image', 'rvn' ),
                'flex_width'  => false,
                'flex_height' => false,
                'width'       => 500,
                'height'      => 500,
            ) );
        }



    }

    add_action( 'customize_register', array( 'RVN_Customizer_Controls', 'register' ) );
endif;
