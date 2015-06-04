<?php
/**
 * The template for programs archive
 */

get_header();
?>

<div class="row">
    <div class="small-12 large-12 columns bg-white pad-30" role="main" style="<?php if ( get_theme_mod( 'theme_highlight_color' ) ) { echo "border-top: 3px solid ".get_theme_mod( 'theme_highlight_color' ); } ?>">

        <?php do_action('rs_before_templates'); ?>

        <div id="<?php rs_container_id(); ?>" class="<?php rs_container_class(); ?>rs-container">
            <div id="<?php rs_content_id(); ?>" role="main" class="<?php rs_content_class(); ?>rs-program-list">

                <?php do_action('rs_before_archive_programs_page'); ?>

                <div class="rs-program-list-intro">
                    <?php if ( is_tax( 'program_category' ) ) : ?>
                        <?php edit_term_link( __('Edit Category'), '<div class="edit-link">', '</div>' ); ?>
                        <h1><?php single_term_title(); ?></h1>
                        <?php echo term_description(); ?>
                    <?php elseif ( rs_is_archive_page() ) : ?>
                        <h1><?php rs_archive_page_title(); ?></h1>
                        <?php rs_archive_edit_link(); ?>
                        <?php rs_archive_page_content(); ?>
                    <?php else : ?>
                        <h1 style=""><?php _e( 'Programs', 'programs' ); ?></h1>
                    <?php endif; ?>
                    <?php if(get_theme_mod( 'theme_link_homepage' )) { $site_url = esc_url(get_theme_mod( 'theme_link_homepage' )); ?>
                        <a href="<?php echo $site_url; ?>" style="color:#757575;">&#171; Go back</a>
                    <?php } ?>
                </div>
                <?php //global $wp_query; echo '<pre> : '; print_r( $wp_query ); echo '</pre>'; ?>
                <?php do_action('rs_after_archive_programs_intro'); ?>

                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div <?php post_class( 'rs-program rs-group' ); ?>>

                            <?php do_action('rs_before_archive_program'); ?>
                            <a href="<?php the_permalink() ?>">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="rs-program-thumbnail"><?php the_post_thumbnail( 'program-thumbnail' ); ?></div>
                                <?php endif; ?>

                                <h2 class="rs-program-title" style="<?php if ( get_theme_mod( 'theme_highlight_color' ) ) { echo "color: ".get_theme_mod( 'theme_highlight_color' ); } ?>"><?php the_title(); ?></h2>

                                <?php if ( function_exists('rs_has_teachers') && rs_has_teachers() ) : ?>
                                    <h3 class="rs-program-teacher"><?php rs_teacher_prefix() ?><?php rs_the_teachers_list() ?></h3>
                                <?php endif; ?>

                                <div class="rs-program-date"><?php rs_the_date() ?></div>

                                <?php if ($location = rs_get_location()) : ?>
                                    <div class="rs-program-location"><?php echo $location; ?></div>
                                <?php endif; ?>

                                <div class="rs-program-excerpt"><?php the_excerpt() ?></div>

                                <?php do_action('rs_after_archive_program'); ?>
                            </a>

                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>Sorry no programs were found.</p>
                <?php endif; ?>

                <?php do_action('rs_after_archive_programs_page'); ?>

            </div><!-- #content -->
        </div><!-- #container -->

        <?php do_action('rs_after_templates'); ?>

        <?php do_action('rs_after_templates_sidebar'); ?>

    </div></div>

<?php get_footer(); ?>
