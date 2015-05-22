<?php get_header(); ?>

<?php do_action('rs_before_templates'); ?>
<div class="row">
    <div class="small-12 large-12 columns bg-white pad-30" role="main" style="<?php if ( get_theme_mod( 'theme_highlight_color' ) ) { echo "border-top: 3px solid ".get_theme_mod( 'theme_highlight_color' ); } ?>">

        <div id="<?php rs_container_id(); ?>" class="<?php rs_container_class(); ?>rs-container">
            <div id="<?php rs_content_id(); ?>" role="main" class="<?php rs_content_class(); ?>rs-program-registration">

                <?php do_action( 'rs_before_registration_form_page' ) ?>

                <?php while(have_posts()) : the_post();	?>

                    <?php do_action( 'rs_before_registration_form' ) ?>

                    <?php edit_post_link( __( 'Edit Program' ), '<div class="edit-link">', '</div>' ); ?>

                    <h1 style="<?php if ( get_theme_mod( 'theme_highlight_color' ) ) { echo "color: ".get_theme_mod( 'theme_highlight_color' ); } ?>"><?php _e('Register', 'programs'); ?></h1>

                    <p class="reg-form-program-details">
                        <a href="<?php the_permalink() ?>">
                            <?php the_title() ?>
                            <?php if ( function_exists( 'rs_has_teachers' ) && rs_has_teachers() ) : ?>
                                &mdash; <?php rs_the_teachers_list() ?>
                            <?php endif; ?>
                        </a><br>

                        <?php rs_the_date(); ?>
                    </p>

                    <?php do_action( 'rs_after_registration_form_details' ) ?>

                    <?php echo rs_get_registration_form(); ?>

                    <?php do_action( 'rs_after_registration_form' ) ?>

                <?php endwhile; ?>


                <?php rs_registration_admin_info(); ?>

                <?php do_action( 'rs_after_registration_form_page' ) ?>

            </div><!-- #content -->
        </div><!-- #container -->

        <?php do_action('rs_after_templates'); ?>

        <?php do_action('rs_after_templates_sidebar'); ?>
    </div></div>

<?php get_footer(); ?>
