<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?php if ( is_category() ) {
			echo 'Category Archive for &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
		} elseif ( is_tag() ) {
			echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
		} elseif ( is_archive() ) {
			wp_title( '' ); echo ' Archive | '; bloginfo( 'name' );
		} elseif ( is_search() ) {
			echo 'Search for &quot;'.esc_html( $s ).'&quot; | '; bloginfo( 'name' );
		} elseif ( is_home() || is_front_page() ) {
			bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
		}  elseif ( is_404() ) {
			echo 'Error 404 Not Found | '; bloginfo( 'name' );
		} elseif ( is_single() ) {
			wp_title( '' );
		} else {
			echo wp_title( ' | ', 'false', 'right' ); bloginfo( 'name' );
		} ?></title>


		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/apple-touch-icon-144x144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/apple-touch-icon-114x114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/apple-touch-icon-72x72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/apple-touch-icon-precomposed.png">
		
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> style="<?php if ( get_theme_mod( 'theme_background_color' ) ) { echo "background: ".get_theme_mod( 'theme_background_color' ); } ?>">
	<?php do_action( 'foundationPress_after_body' ); ?>

	
	<?php do_action( 'foundationPress_layout_start' ); ?>

	<?php //get_template_part( 'parts/off-canvas-menu' ); ?>

	<?php //get_template_part( 'parts/top-bar' ); ?>

<section class="container" role="document">
	<?php do_action( 'foundationPress_after_header' ); ?>


    <?php
    // Allow different headers for various program categories
    if (function_exists('z_taxonomy_image_url')) {
        $header_image = z_taxonomy_image_url();

        foreach (get_the_terms(get_the_ID(), 'program_category') as $cat) {
            $header_image = z_taxonomy_image_url($cat->term_id);
        }
    }

    if (empty($header_image)) {
        $header_image = esc_url(get_theme_mod('theme_logo'));
    }
    ?>

    <?php if ( get_theme_mod( 'theme_logo' ) ) : ?>
        <?php if(get_theme_mod( 'theme_link_homepage' )) { $site_url = esc_url(get_theme_mod( 'theme_link_homepage' )); } else { $site_url = esc_url( home_url( '/' ) ); } ?>
        <div class='site-logo small-12 columns text-center' style="<?php if ( get_theme_mod( 'theme_logo_top_spacing' ) ) { echo "margin-top:".get_theme_mod( 'theme_logo_top_spacing' )."px;"; } ?>   <?php if ( get_theme_mod( 'theme_logo_bottom_spacing' ) ) { echo "margin-bottom:".get_theme_mod( 'theme_logo_bottom_spacing' )."px;"; } ?>">
            <img src='<?php echo $header_image; ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
        </div>
    <?php endif; ?>


    <div class="row">
        <div class="small-12 large-12 columns bg-white pad-30" role="main" style="<?php if ( get_theme_mod( 'theme_highlight_color' ) ) { echo "border-top: 3px solid ".get_theme_mod( 'theme_highlight_color' ); } ?>">