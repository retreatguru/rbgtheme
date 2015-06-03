<?php
/**
 * The Template for Single Programs.
 */

get_header(); ?>

<div class="row">
    <div class="small-12 large-12 columns bg-white pad-30" role="main" style="<?php if ( get_theme_mod( 'theme_highlight_color' ) ) { echo "border-top: 3px solid ".get_theme_mod( 'theme_highlight_color' ); } ?>">
        <?php do_action('rs_before_templates'); ?>

        <div id="<?php rs_container_id(); ?>" class="<?php rs_container_class(); ?>rs-container">
            <div id="<?php rs_content_id(); ?>" role="main" class="<?php rs_content_class(); ?>rs-single-program">

                <?php do_action( 'rs_before_single_program_page' ) ?>

                <?php if ( have_posts() ) while ( have_posts() ) : the_post();   ?>

                    <div id="rs-program-<?php the_ID(); ?>" <?php post_class('rs-program-detail'); ?>>

                        <?php do_action( 'rs_before_single_program' ) ?>

                        <?php // Thumbnail ?>
                        <?php if ( has_post_thumbnail() && ! rs_post_has_image() ) : ?>
                            <div class="rs-program-photo">
                                <?php the_post_thumbnail( 'program-medium' ) ?>
                                <?php rs_post_thumbnail_caption(); ?>
                            </div>

                        <?php endif; ?>

                        <?php edit_post_link( __( 'Edit Program' ), '<div class="edit-link">', '</div>' ); ?>

                        <?php // Program Title ?>
                        <h1 class="rs-program-title" style="<?php if ( get_theme_mod( 'theme_highlight_color' ) ) { echo "color: ".get_theme_mod( 'theme_highlight_color' ); } ?>"><?php the_title(); ?></h1>

                        <?php // Teacher(s) ?>
                        <?php if ( function_exists('rs_has_teachers') && rs_has_teachers() ) : ?>
                            <h3 class="rs-program-teacher"><?php rs_teacher_prefix() ?><?php rs_the_teachers_list(); ?></h3>
                        <?php endif; ?>

                        <?php // Date ?>
                        <p class="rs-program-date"><?php rs_the_date(); ?></p>

                        <?php // Registration (link or message) ?>
                        <div class="rs-regsitration-wrap"><?php rs_the_registration() ?></div>

                        <?php
                        // show program details if they exist
                        $price_details = rs_get_pricing_details();
                        $date_time     = rs_get_datetime_details();
                        $location      = rs_get_location();
                        $address       = rs_get_location_address();
                        $contact       = rs_get_contact_details();
                        $custom        = rs_get_custom();
                        $message       = rs_get_program_message();

                        if ( $price_details || $date_time || $location || $address || $contact || $custom || $message ) :
                            ?>
                            <div class="rs-program-meta">

                                <?php // Pricing ?>
                                <?php if ( $price_details ) : ?>
                                    <div class="rs-program-price"><?php echo $price_details ?></div>
                                <?php endif; ?>

                                <?php // Datetime details ?>
                                <?php if ( $date_time ) : ?>
                                    <p class="rs-program-datetime"><span class="rs-program-label">Date and Time Details:</span> <?php echo $date_time; ?></p>
                                <?php endif; ?>

                                <?php // Location ?>
                                <?php if ( $location ) : ?>
                                    <p class="rs-program-location"><span class="rs-program-label">Location:</span> <?php echo $location; ?></p>
                                <?php endif; ?>

                                <?php // Location Address ?>
                                <?php if ( $address ) : ?>
                                    <p class="rs-program-location-address"><span class="rs-program-label">Address:</span> <?php echo $address; ?></p>
                                <?php endif; ?>

                                <?php // Contact details ?>
                                <?php if ( $contact ) : ?>
                                    <p class="rs-program-contact"><?php echo $contact ?></p>
                                <?php endif; ?>

                                <?php // Custom fields ?>
                                <?php if ( $custom ) : ?>
                                    <div class="rs-program-custom-wrap"><?php echo $custom; ?></div>
                                <?php endif; ?>

                            </div>
                        <?php endif; ?>

                        <?php // Program Details ?>
                        <div class="rs-program-content">
                            <?php the_content(); ?>
                        </div>

                    </div><!-- #program-## -->

                    <?php do_action( 'rs_after_single_program' ) ?>


                    <?php // About the Teacher ?>
                    <?php
                    if ( function_exists( 'rs_has_teachers' ) && rs_has_teachers() ) :
                        $teachers = rs_get_teachers( null, 'objects' );
                        ?>
                        <h2 class="rs-about-teacher">
                            <?php $about_teachers_title =  _n( 'About the Teacher', 'About the Teachers', count( $teachers ), 'programs' ); ?>
                            <?php echo apply_filters( 'rs_about_the_teacher', $about_teachers_title, count( $teachers ) ); ?>
                        </h2>
                        <?php
                        foreach ( $teachers as $post ) : setup_postdata( $post );
                            ?>
                            <div class="rs-teacher-bio">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="rs-teacher-thumbnail"><?php the_post_thumbnail( array( 200,200 ) ); ?></div>
                                <?php endif; ?>
                                <h3 class="rs-teacher-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <?php the_excerpt(); ?>
                            </div>
                        <?php
                        endforeach;
                        wp_reset_query();
                    endif; // end rs_has_teachers
                    ?>

                    <?php // Category(ies) ?>
                    <?php $program_cats = class_exists( 'RS_Enhanced_Plugin') ? rs_has_program_categories() : null; ?>
                    <?php if ( $program_cats ) : ?>
                        <p class="rs-program-categories">
                            <span class="rs-program-label"><?php echo _n( 'Category', 'Categories', count( $program_cats ) ) ?>:</span>
                            <?php echo get_the_term_list( 0, 'program_category', '', ', ' ); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ( $programs_additional_info = rs_get_programs_additional_info() ) : ?>
                        <div class="rs-program-additional-info"><?php echo $programs_additional_info; ?></div>
                    <?php endif; ?>

                    <?php //comments_template( '', true ); ?>

                <?php endwhile; // end of the loop. ?>

                <?php do_action( 'rs_after_single_program_page' ) ?>

            </div><!-- #content -->
        </div><!-- #container -->

        <?php do_action('rs_after_templates'); ?>

        <?php do_action('rs_after_templates_sidebar'); ?>

    </div></div>

<?php get_footer(); ?>
