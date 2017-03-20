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
                'title' => _x('Example Panel', 'Customizer Panel', 'rvn'),
                'id'    => 'examplepanel',
            ) );

            self::add_section( array(
                'title'       => _x( 'Example Section', 'Customizer Section', 'rvn' ),
                'id'          => 'examplesection',
                'panel'       => 'examplepanel',
                'description' => __( 'My example description.', 'rvn' ),
            ) );

            parent::add_text_control( array(
                'label'   => __( 'Example Text', 'rvn' ),
                'id'      => 'example_text',
//                'default' => 'My default example text',
            ) );

            parent::add_textarea_control( array(
                'label'   => __( 'Example Textarea', 'rvn' ),
                'id'      => 'example_textarea',
            ) );

            self::add_checkbox_control( array(
                'label'   => __( 'Example Checkbox', 'rvn' ),
                'id'      => 'example_checkbox',
//                'default' => true,
            ) );

            self::add_select_control( array(
                'label'   => __( 'Example Select', 'rvn' ),
                'id'      => 'example_select',
                'choices' => array(
                    'choice1' => __( 'Choice 1', 'rvn' ),
                    'choice2' => __( 'Choice 2', 'rvn' ),
                    'choice3' => __( 'Choice 3', 'rvn' ),
                ),
                'default' => 'choice1',
//                'default' => '',
            ) );

            self::add_color_control( array(
                'label'     => __( 'Example Color', 'rvn' ),
                'id'        => 'example_color',
                'default'   => '#555555',
                'transport' => 'postMessage', // Live-update
            ) );

            parent::add_file_control( array(
                'label' => __( 'Example File', 'rvn' ),
                'id'    => 'example_file',
            ) );

            parent::add_image_control( array(
                'label' => __( 'Example Image', 'rvn' ),
                'id'    => 'example_image',
            ) );
        }



    }

    add_action( 'customize_register', array( 'RVN_Customizer_Controls', 'register' ) );
endif;
