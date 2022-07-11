<?php get_header() ?>

<main>
    <?php if (have_posts()) : the_post(); ?>
        <section class="fil_arianne">
            <div class="back_arianne">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                    </svg>
                </a>
                <a href="#">
                    <p>BACK</p>
                </a>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= get_home_url(); ?>">Home</a></li>
                    <li>/</li>
                    <li class="breadcrumb-item"><a href="<?= get_site_url('produits', '/produits'); ?>">Library</a></li>
                    <li>/</li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
        </section>
        <section class="wrap_grille_img">
            <div class="grille_image_produit">
                <img src="<?= the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>" class="one">
                <?php kdmfi_the_featured_image('image-Survol', ['class' => ' two']); ?>
                <?php kdmfi_the_featured_image('image-sneakers-1', ['class' => ' three']); ?>
                <?php kdmfi_the_featured_image('image-sneakers-2', ['class' => ' four']); ?>
                <?php kdmfi_the_featured_image('image-sneakers-3', ['class' => ' five']); ?>

            </div>
            <div class="cd_form_fiche_produit">
                <h2><?php the_title(); ?></h2>
                <div class="info_fiche_produit">
                    <p>HOMME</p>
                    <p><?php echo (get_post_meta($post->ID,'prix',true) . "€"); ?></p>
                </div>
                <p>TAILLES DISPONIBLES</p>
                <form action="#">
                    <div class="taille_check">
                        <div>
                            <input type="radio" name="taille_checkbox" id="" value="38" checked>
                            <label for="38">38</label>
                        </div>
                        <div>
                            <input type="radio" name="taille_checkbox" id="" value="39">
                            <label for="39">39</label>
                        </div>
                        <div>
                            <input type="radio" name="taille_checkbox" id="" value="40">
                            <label for="40">40</label>
                        </div>
                        <div>
                            <input type="radio" name="taille_checkbox" id="" value="41" disabled>
                            <label for="41">41</label>
                        </div>
                        <div>
                            <input type="radio" name="taille_checkbox" id="" value="42">
                            <label for="42">42</label>
                        </div>
                        <div>
                            <input type="radio" name="taille_checkbox" id="" value="43">
                            <label for="43">43</label>
                        </div>
                        <div>
                            <input type="radio" name="taille_checkbox" id="" value="44" disabled>
                            <label for="44">44</label>
                        </div>
                        <div>
                            <input type="radio" name="taille_checkbox" id="" value="45">
                            <label for="45">45</label>
                        </div>
                        <div>
                            <input type="radio" name="taille_checkbox" id="" value="46">
                            <label for="46">46</label>
                        </div>
                        <div>
                            <input type="radio" name="taille_checkbox" id="" value="47" disabled>
                            <label for="47">47</label>
                        </div>
                    </div>
                    <div class="cd_form_button">
                        <div>
                            <label for="taille">QTE</label>
                            <select name="taille" id="taille">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <input type="button" value="Ajouter au panier">
                    </div>
                </form>
            </div>
        </section>
    <?php else : ?>
    <?php endif;
    wp_reset_query(); ?>
    <?php
    $sneakers = new WP_Query([
        'post_type' => 'sneakers',
        'posts_per_page' => 3,
        'orderby' => 'rand',
    ]);
    ?>
    <section class="wrap_all_produit">
        <div class="wrap_cd_produit">
            <?php while ($sneakers->have_posts()) : $sneakers->the_post(); ?>
                <div class="cd_produit">
                    <?php the_post_thumbnail('post-thumbnail', ['class' => 'img_produit', 'alt' => 'AF1 Custom', 'data-aos' => 'fade-up', 'data-aos-easing' => 'ease-out-cubic']) ?>
                    <h3 data-aos="fade-right" data-aos-delay="100" data-aos-easing="ease-out-cubic"><?php the_title(); ?></h3>
                    <p><?php echo (get_post_meta($post->ID, 'prix', true) . "€"); ?></p>
                    <div class="overlay_produit_1">
                        <?php kdmfi_the_featured_image('image-Survol'); ?>
                    </div>
                    <div class="overlay_produit_2">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <p><?php echo (get_post_meta($post->ID, 'prix', true) . "€"); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
    <section id="cd_contenu_index">
        <div class="contenu_index_5">
            <div class="sous_div_contenu_5" data-aos="fade-up-right" data-aos-easing="ease-out-cubic">
                <h3 data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-delay="150">vous avez une
                    idée précise en
                    tête ?</h3>
                <p data-aos="fade-left" data-aos-easing="ease-out-cubic" data-aos-delay="200">Décrivez nous la
                    paire de vos
                    rêves en détails et nous vous ferons une proposition de design
                    parfaitement adaptée à vos besoins</p>
                <button data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-delay="250">CREATION SUR
                    MESURE</button>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/code/images/jpg/custom4.jpeg" alt="AF1 Custom" data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-delay="100">
        </div>
    </section>

</main>

<?php get_footer() ?>