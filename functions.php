<?php
/*
Author: Ole Fredrik Lie
URL: http://olefredrik.com
*/


// Various clean up functions
require_once('library/cleanup.php');

// Required for Foundation to work properly
require_once('library/foundation.php');

// Register all navigation menus
require_once('library/navigation.php');

// Add menu walkers
require_once('library/menu-walker.php');
require_once('library/offcanvas-walker.php');

// Create widget areas in sidebar and footer
require_once('library/widget-areas.php');

// Return entry meta information for posts
require_once('library/entry-meta.php');

// Enqueue scripts
require_once('library/enqueue-scripts.php');

// Add theme support
require_once('library/theme-support.php');

// Add Header image
require_once('library/custom-header.php');


function theme_customizer( $wp_customize ) {

    $wp_customize->remove_control('header_image');
//    $wp_customize->remove_control('footer-widgets-footer-widgets');
//    $wp_customize->remove_control('sidebar-widgets-sidebar-widgets');

    $wp_customize->add_section( 'theme_logo_section' , array(
        'title'       => __( 'Logo', 'themeslug' ),
        'priority'    => 30,
        'description' => 'Upload a logo to replace the default site name and description in the header',
    ) );

    $wp_customize->add_section( 'theme_styles_section' , array(
        'title'       => __( 'Styles', 'themeslug' ),
        'priority'    => 30,
        'description' => 'Customize the site style',
    ) );

    $wp_customize->add_section( 'theme_links_section' , array(
        'title'       => __( 'Links', 'themeslug' ),
        'priority'    => 30,
        'description' => 'Customize outbound links',
    ) );


    $wp_customize->add_setting( 'theme_logo' );
    $wp_customize->add_setting( 'theme_logo_top_spacing' );
    $wp_customize->add_setting( 'theme_logo_bottom_spacing' );

    $wp_customize->add_setting( 'theme_background_color' );
    $wp_customize->add_setting( 'theme_highlight_color' );

    $wp_customize->add_setting( 'theme_link_homepage' );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_logo', array(
        'label'    => __( 'Logo', 'themeslug' ),
        'section'  => 'theme_logo_section',
        'settings' => 'theme_logo',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_logo_top_spacing', array(
        'label'          => __( 'Top spacing', 'top_spacing' ),
        'section'        => 'theme_logo_section',
        'settings'       => 'theme_logo_top_spacing'
    ) ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_logo_bottom_spacing', array(
        'label'          => __( 'Bottom spacing', 'bottom_spacing' ),
        'section'        => 'theme_logo_section',
        'settings'       => 'theme_logo_bottom_spacing'
    ) ) );


    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_background_color', array(
        'label'          => __( 'Background Color', 'theme_background_color' ),
        'section'        => 'theme_styles_section',
        'settings'       => 'theme_background_color'
    ) ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_highlight_color', array(
        'label'          => __( 'Highlight Color', 'theme_highlight_color' ),
        'section'        => 'theme_styles_section',
        'settings'       => 'theme_highlight_color'
    ) ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_link_homepage', array(
        'label'          => __( 'Site Link', 'theme_link_homepage' ),
        'section'        => 'theme_links_section',
        'settings'       => 'theme_link_homepage'
    ) ) );


}
add_action( 'customize_register', 'theme_customizer' );
