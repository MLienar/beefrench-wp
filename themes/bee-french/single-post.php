<?php get_header() ?>

<main>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php if(get_post_meta(get_the_ID(), 'montheme_Reduc', true)) {?>
        <p>Réduction : <?= get_post_meta($post->ID, 'montheme_Reduc', true)?>%</p>
    <?php }; ?>
    <h1><?php the_terms( get_the_ID(), 'shoes'); ?></h1>
    <p><?php the_content(); ?></p>
<?php endwhile;
endif; ?>

</main>

<?php get_footer() ?>