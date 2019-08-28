<?php

/**
 * Template Name: Home Page Template
 *
 * Description: It's a single page integration where you can find the about , skills , experience , education and personal information
 *
 * @package WordPress
 * @subpackage portfolio
 * @since portfolio 1.0
 */
get_header();
?>


<?php

while (have_posts()) :
    the_post();
    ?>


    <?php get_template_part('custom-parts/content', 'about'); ?>
    <?php get_template_part('custom-parts/content', 'skills'); ?>
    <?php get_template_part('custom-parts/content', 'education'); ?>
    <?php get_template_part('custom-parts/content', 'experience'); ?>
    <?php get_template_part('custom-parts/content', 'projects'); ?>
    <?php get_template_part('custom-parts/content', 'contact'); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
