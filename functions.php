<?php
// EXTRACT FOR functions.php of Child Theme

// ENQUEUE CUSTOM STYLES AND SCRIPTS WITH MAIN CSS AND JS FILES (FOR PAGES/POST) - Option 1
function inject_custom_scripts() {

    if( function_exists( 'get_field' ) && $styles = get_field( 'page_specific_styles' ) ):
        add_inline_style( 'main-css-handle', trim( $styles ) );
    endif;
    if( function_exists( 'get_field' ) && $scripts = get_field( 'page_specific_scripts' ) ):
        add_inline_script( 'main-js-handle', trim( $scripts ) );
    endif;
}
add_action( 'wp_enqueue_scripts', 'inject_custom_scripts', 11 );


// INJECT CUSTOM STYLES AND SCRIPT INTO HEAD/FOOT (FOR PAGES/POSTS) - Option 2
function inject_custom_styles() {
    if( ! function_exists( 'get_field' ) || ! is_singular( [ 'page', 'post' ] ) ) return;
    if( false !== ( $styles = get_field( 'page_specific_styles' ) ) ):
        echo '<style>' . trim( $styles ) . '</style>';
    endif;
}
add_action( 'wp_head', 'inject_custom_style', 20 );

function inject_custom_scripts() {
    if( ! function_exists( 'get_field' ) || ! is_singular( [ 'page', 'post' ] ) ) return;
    if( false !== ( $scripts = get_field( 'page_specific_scripts' ) ) ):
        echo '<script>' . trim( $scripts ) . '</script>';
    endif;
}
add_action( 'wp_footer', 'inject_custom_scripts', 20 );


// ENQUEUE CUSTOM STYLES AND SCRIPTS FOR TAXONOMY/TERM
function cpwd_enqueue_taxonomy_assets() {
    if( ! is_tax() ) return;
    $object = get_queried_object();

    if( $styles = get_field( 'page_specific_styles', $object->taxonomy . '_' . $object->term_id ) ):
       add_inline_style( 'main-css-handle', trim( $styles ) );
    endif;

    if( $scripts = get_field( 'page_specific_scripts', $object->taxonomy . '_' . $object->term_id ) ):
        add_inline_script( 'main-js-handle', trim( $scripts ) );
    endif;
}
add_action( 'wp_enqueue_scripts', 'cpwd_enqueue_taxonomy_assets' );
