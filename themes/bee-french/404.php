<?php get_header() ?>

<main>

    <section class="cd_404error">
        <img src="<?php echo get_template_directory_uri(); ?>/code/images/jpg/shaq_shoes.jpg" alt="Shaq phone shoes" class="hero_404">
        <h1>Page introuvable</h1>
        <h2>Cette page n'existe pas</h2>
        <p>Tu n'as pas trouvé la paire que tu espérais ? Clique <a href="<?= get_post_type_archive_link('post') ?>">ici</a> pour trouver ton bonheur de snekaer addict</p>
    </section>
</main>

<?php get_footer() ?>