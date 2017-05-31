<?php
/**
 * Page Functions
 *
 * Helper output functions for pages.
 */



if ( ! function_exists( 'rvn_get_page_header_array' ) ) :
    /**
     * Page heading
     *
     * @since 1.5.3
     */
    function rvn_get_page_header_array()
    {
        $output = array(
            'title'           => '',
            'extensive_title' => '',
            'description'     => '',
        );

        if ( is_category() )
        {
            $category_title       = single_cat_title( '', false );
            $category_description = category_description();

            //$output['title']       = sprintf( __( 'Category Archives: %s', 'rvn' ), $category_title );
            $output['title']       = $category_title;
            $output['description'] = $category_description;
        }

        elseif ( is_tag() )
        {
            $tag_title       = single_tag_title( '', false );
            $tag_description = tag_description();

            //$output['title']       = sprintf( __( 'Tag Archives: %s', 'rvn' ), $tag_title );
            $output['title']       = $tag_title;
            $output['description'] = $tag_description;
        }

        elseif ( is_tax() )
        {
            global $wp_query;
            $term = $wp_query->get_queried_object();

            $tax_name        = $term->name;
            $tax_description = $term->description;

            //$output['title']       = sprintf( __( 'Taxonomy Archives: %s', 'rvn' ), $tax_name );
            $output['title']       = $tax_name;
            $output['description'] = $tax_description;
        }

        elseif ( is_author() )
        {
            $queried_object = get_queried_object();

            $author_name = $queried_object->display_name;

            //$output['title'] = sprintf( __( 'Author Archives: %s', 'rvn' ), $author_name );
            $output['title'] = $author_name;
        }

        elseif ( is_search() )
        {
            $search_query = get_search_query();

            $output['title'] = sprintf( __( 'Search Results for: &ldquo;%s&rdquo;', 'rvn' ), $search_query );
            //$output['title'] = $search_query;
        }

        elseif ( is_day() )
        {
            $date = get_the_date();

            //$output['title'] = sprintf( __( 'Daily Archives: %s', 'rvn' ), $date );
            $output['title'] = $date;
        }

        elseif ( is_month() )
        {
            $date = get_the_date( 'F Y' );

            //$output['title'] = sprintf( __( 'Monthly Archives: %s', 'rvn' ), $date );
            $output['title'] = $date;
        }

        elseif ( is_year() )
        {
            $date = get_the_date( 'Y' );

            //$output['title'] = sprintf( __( 'Yearly Archives: %s', 'rvn' ), $date );
            $output['title'] = $date;
        }

        elseif ( rvn_is_portfolio() )
        {
            $portfolio_title = get_the_title();

            $output['title'] = $portfolio_title;
        }

        elseif ( rvn_is_portfolio_item() )
        {
            $query = new WP_Query( array(
                'post_type'  => 'page',
                'meta_key'   => '_wp_page_template',
                'meta_value' => 'template-portfolio.php',
            ));

            if ( $query->have_posts() ) {
                $query->the_post();
                $portfolio_item_title = get_the_title( $query->post->ID );
                wp_reset_query();
            }
            else {
                $portfolio_item_title = __( 'Portfolio', 'rvn' );
            }

            $output['title'] = $portfolio_item_title;
        }

        return $output;
    }
endif;
