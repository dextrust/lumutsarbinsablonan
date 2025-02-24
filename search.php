<?php get_header(); ?>

<div class="container mt-4">
    <h2>Search Results for: <?php echo get_search_query(); ?></h2>

    <?php get_template_part('includes/loop', 'posts'); ?>

</div>

<?php get_footer(); ?>
