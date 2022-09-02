<?php

/**
 * Template Name: Gallery
 */

get_header();
wp_reset_query();

$gallery = new WP_Query([
    'post_type' => 'gallery',
    'orderby' => 'rand',
]);
?>
<div class="gallerie">
    <?php
    $arr = (get_post_meta(246, 'vdw_gallery_id', true));
    
    $i = 0;
    foreach ($arr as $ligne) { ?>
        <div class="cd_img_gallerie">
            <img class="gallery__img" src="<?= wp_get_attachment_url($ligne) ?>" alt=" " title=""/>   
        </div>
    <?php
        $i = $i + 1;
    };
    ?>
</div>
</main>

<?php get_footer(); ?>