<?php /* Template Name: Competizioni */ ?>
<?php get_header(); ?>

<main id="tbi-vue" class="box_width container">
    <?php !is_active_sidebar('competitions') || dynamic_sidebar('competitions'); ?>
</main>

<?php get_footer(); ?>