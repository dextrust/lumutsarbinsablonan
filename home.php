<?php get_header(); ?>

<main class="container">
    <h1>Latest Posts</h1>
    
    <section class="post-list">
        <?php get_template_part('includes/loop', 'posts'); ?>
    </section>
</main>

<?php get_footer(); ?>
