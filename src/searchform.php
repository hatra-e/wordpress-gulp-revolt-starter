<?php
/**
 * Search form Template
 */
?>
<form role="search"
      method="get"
      action="<?php echo esc_url( home_url( '/' ) ); ?>"
>

    <input type="search"
           name="s"
           value="<?php if ( have_posts() ) echo get_search_query(); ?>"
           placeholder="<?php _e( 'Enter search term and hit enter', 'rvn' ); ?>"
    />

</form>