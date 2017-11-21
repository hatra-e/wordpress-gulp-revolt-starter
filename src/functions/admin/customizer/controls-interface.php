<?php
/**
 * Class for the customizer controls.
 *
 * This is a helper class that make it easier to add panels, sections and
 * controls.
 */



if ( ! class_exists( 'RVN_Customizer_Controls_Interface' ) ) :
    /**
     * Helper class for the customizer controls.
     *
     * @since 1.0.0
     */
    class RVN_Customizer_Controls_Interface
    {

        /**
         * Holds the wp_customize object.
         *
         * @var object
         */
        public static $wp_customize;

        /**
         * Current customizer section.
         *
         * @var string
         */
        public static $current_section;

        /**
         * Current customizer priority.
         *
         * @var string
         */
        public static $current_priority = 99;



        /**
         * Returns an increasing priority number.
         *
         * @param int $step The number by which the priority increments
         * @return int
         * @since 1.0.0
         */
        public static function priority( $step = 1 )
        {
            self::$current_priority += $step;
            return self::$current_priority;
        }



        /**
         * Adds a customizer panel.
         *
         * @param array $args
         * @since 1.0.0
         */
        public static function add_panel( $args )
        {
            $args['priority'] = isset( $args['priority'] ) ? $args['priority'] : self::priority();
            $id = $args['id'];
            unset( $args['id'] );

            self::$wp_customize->add_panel( $id, $args );
        }



        /**
         * Adds a customizer section.
         *
         * @param array $args
         * @since 1.0.0
         */
        public static function add_section( $args )
        {
            self::$current_section = $args['id'];
            $args['priority'] = isset( $args['priority'] ) ? $args['priority'] : self::priority();
            unset( $args['id'] );

            self::$wp_customize->add_section( self::$current_section, $args );
        }



        /**
         * Adds a customizer control.
         *
         * @param array $args
         * @since 1.0.0
         */
        public static function add_control( $args )
        {
            $id        = $args['id'];
            $type      = isset( $args['type'] )      ? $args['type']      : '';
            $default   = isset( $args['default'] )   ? $args['default']   : '';
            $transport = isset( $args['transport'] ) ? $args['transport'] : 'refresh';

            $args['settings'] = $id;
            $args['priority'] = isset( $args['priority'] )      ? $args['priority'] : self::priority();
            $args['section']  = empty( self::$current_section ) ? $args['section']  : self::$current_section;

            // Unset args that we don't need to add setting
            unset( $args['id'] );
            unset( $args['default'] );

            // Add setting
            self::$wp_customize->add_setting( $id, array(
                'default'   => $default,
                'transport' => $transport,
            ) );

            // Add control
            switch( $type ) {
                case 'color':
                    unset( $args['type'] );
                    self::$wp_customize->add_control( new WP_Customize_Color_Control( self::$wp_customize, $id, $args ));
                    break;
                case 'image':
                    unset( $args['type'] );
                    self::$wp_customize->add_control( new WP_Customize_Image_Control( self::$wp_customize, $id, $args ));
                    break;
                case 'cropped_image':
                    unset( $args['type'] );
                    self::$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( self::$wp_customize, $id, $args ));
                    break;
                case 'file':
                    unset( $args['type'] );
                    self::$wp_customize->add_control( new WP_Customize_Upload_Control( self::$wp_customize, $id, $args ));
                    break;
                case 'media':
                    unset( $args['type'] );
                    self::$wp_customize->add_control( new WP_Customize_Media_Control( self::$wp_customize, $id, $args ));
                    break;
                default:
                    self::$wp_customize->add_control( $id, $args );
                    break;
            }
        }



    }
endif;