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
<div class="txt_gall">
    <h2>COLLECTIONS CUSTOMS</h2>
    <p>Lorem ipsum dolor sit
        amet consectetur adipisicing elit. Fuga veniam pariatur a, iste, id
        tempore, molestiae corrupti ad repellendus cumque nesciunt eius mollitia consectetur
        perspiciatis. Itaque adipisci officiis inventore odit.</p>
</div>
<div class="gallerie">
    <?php
    $arr = (get_post_meta(246, 'vdw_gallery_id', true));

    $i = 0;
    $j = 0;
    foreach ($arr as $ligne) { ?>
        <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="<?= $j ?>" class="cd_img_gallerie">
            <img class="gallery__img" src="<?= wp_get_attachment_url($ligne) ?>" alt=" " title="" />
        </div>
    <?php
        $i = $i + 1;
        $j = $j + 150;
        if ($j >= 1050) {
            $j = 0;
        }
    };
    ?>
</div>
</main>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        once: true
    })
</script>
<?php get_footer(); ?>