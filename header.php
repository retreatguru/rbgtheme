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

        <?php
        $headline_font = get_theme_mod( 'theme_headline_font' );
        $headline_size = get_theme_mod( 'theme_headline_size' );
        $body_font = get_theme_mod( 'theme_body_font' );
        $body_size = get_theme_mod( 'theme_body_size' );

        if ( $headline_font || $body_font ) : ?>
            <link href='https://fonts.googleapis.com/css?family=<?php if($headline_font) echo get_theme_mod( 'theme_headline_font' ).'|'; ?><?php echo get_theme_mod( 'theme_body_font' ); ?>' rel='stylesheet' type='text/css'>
            <?php
            $font_family['Open+Sans'] = 'Open Sans';
            $font_family['Open+Sans+Condensed:300'] = 'Opens Sans Condensed';
            $font_family['Lato:300'] = 'Lato';
            $font_family['Oswald'] = 'Oswald';
            $font_family['Source+Sans+Pro'] = 'Source Sans Pro';
            $font_family['Fjalla+One'] = 'Fjalla One';
            $font_family['Abel'] = 'Abel';
            $font_family['Francois+One'] = 'Francois One';
            $font_family['Slabo+27px'] = 'Slabo';
            $font_family['Arvo'] = 'Arvo';
            $font_family['Playfair+Display'] = 'Playfair Display';
            $font_family['Bree+Serif'] = 'Bree Serif';
            $font_family['Rokkitt'] = 'Rokkitt';
            $font_family['EB+Garamond'] = 'EB Garamond';
            $font_family['Josefin+Slab'] = 'Josefin Slab';
            $font_family['Cinzel'] = 'Cinzel';
            ?>

            <style>
                <?php if($body_font) : ?>
                    body { font-family: '<?php echo $font_family[$body_font]; ?>', Sans-Serif; }
                <?php endif; ?>

                <?php if($headline_font) : ?>
                    h1,h2,h3 { font-family: '<?php echo $font_family[$headline_font]; ?>', Sans-Serif; }
                <?php endif; ?>
            </style>
        <?php endif; ?>

        <?php if($headline_size) : ?>
            <style>
                h1 { font-size: <?php echo $headline_size; ?>px; }
                h2 { font-size: <?php echo $headline_size*.8; ?>px; }
                h3 { font-size: <?php echo $headline_size*.6; ?>px; }
            </style>
        <?php endif; ?>

        <?php if($body_size) : ?>
            <style>
                body, p, ul, li, .rs-register-link a { font-size: <?php echo $body_size; ?>px; }
            </style>
        <?php endif; ?>

        <?php $body_bg = get_theme_mod( 'theme_bg' ); ?>
        <?php if($body_bg) : ?>
            <style>
                body { background: url('<?php echo $body_bg; ?>'); }
            </style>
        <?php endif; ?>

        <?php $body_color = get_theme_mod( 'theme_background_color' ); ?>
        <?php if($body_color) : ?>
            <style>
                body { background-color: <?php echo $body_color; ?> }
            </style>
        <?php endif; ?>

        <?php $custom_header = get_theme_mod( 'theme_custom_header' ); ?>
        <?php if($custom_header) : ?>
            <?php echo $custom_header; ?>
        <?php endif; ?>

    </head>
	<body <?php body_class(); ?>>
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

        $cats = get_the_terms(get_the_ID(), 'program_category');
        foreach ((array)$cats as $cat) {
            $header_image = z_taxonomy_image_url($cat->term_id);
        }
    }

    if (empty($header_image)) {
        $header_image = esc_url(get_theme_mod('theme_logo'));
    }
    ?>

    <?php if ( get_theme_mod( 'theme_logo' ) ) : ?>
        <?php if(get_theme_mod( 'theme_link_homepage' )) { $site_url = esc_url(get_theme_mod( 'theme_link_homepage' )); } else { $site_url = esc_url( home_url( '/programs' ) ); } ?>
        <div class="row">
        <div class='site-logo small-12 columns text-center' style="<?php if ( get_theme_mod( 'theme_logo_top_spacing' ) ) { echo "margin-top:".get_theme_mod( 'theme_logo_top_spacing' )."px;"; } ?>   <?php if ( get_theme_mod( 'theme_logo_bottom_spacing' ) ) { echo "margin-bottom:".get_theme_mod( 'theme_logo_bottom_spacing' )."px;"; } ?>">
            <a href="<?php echo $site_url; ?>">
            <img src='<?php echo $header_image; ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
            </a>
        </div>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="small-12 large-12 columns bg-white pad-30" role="main" style="<?php if ( get_theme_mod( 'theme_highlight_color' ) ) { echo "border-top: 3px solid ".get_theme_mod( 'theme_highlight_color' ); } ?>">