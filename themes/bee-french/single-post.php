<?php get_header() ?>


<?php 
    $term = get_term_by('id', '5', 'statut');
    $project = new WP_query(array(
        'post_type' => 'Sneakers',
        'posts_per_page' => '1'
    ));
?>


<main>
<?php if($project->have_posts()): $project->the_post(); ?>
        <section class="fil_arianne">
            <div class="back_arianne">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                    </svg>
                </a>
                <a href="#">
                    <p>BACK</p>
                </a>
            </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="produits.php">Produits</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Fiche produits</li>
                    </ol>
                </nav>
        </section>
        <section class="wrap_grid_img">
            <div class="grid_image_produit">
                <?php the_post_thumbnail(['class' => ' one']); ?>
                <?php kdmfi_the_featured_image( 'image-Survol', ['class' => ' two'] ); ?>
                <?php kdmfi_the_featured_image( 'image-sneakers-1', ['class' => ' three'] ); ?>
                <?php kdmfi_the_featured_image( 'image-sneakers-2', ['class' => ' four'] ); ?>

            </div>
            <div class="cd_form_fiche_produit">
                <h3><?php the_title(); ?></h3>
                <div class="info_fiche_produit">
                    <p>HOMME</p>
                    <?php the_content(); ?>
                    <?php the_excerpt(); ?>
                </div>
                <p>TAILLES DISPONIBLES</p>
                <form action="#">
                    <div class="taille_check">
                        <div>
                            <input type="radio" name="taille_checkbox" id="" value="38" checked>
                            <label for="38">38</label>
                        </div>
                        <div> 
                            <input type="radio" name="taille_checkbox"id="" value="39">
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
        <?php else: ?>
        <?php endif; wp_reset_query(); ?>
        <section class="wrap_cd_produit">
            <div class="cd_produit">
                <img src="af1.png" alt="AF1 CUSTOM">
                <h5>AF1 CUSTOM</h5>
                <p>150€</p>
            </div>
            <div class="cd_produit">
                <img src="af1.png" alt="AF1 CUSTOM">
                <h5>AF1 CUSTOM</h5>
                <p>150€</p>
            </div>
            <div class="cd_produit">
                <img src="af1.png" alt="AF1 CUSTOM">
                <h5>AF1 CUSTOM</h5>
                <p>150€</p>
            </div>
        </section>
        <section class="suggestion_crea">
            <article>
                <h4>VOUS AVEZ UNE IDEE PRECISE EN TÊTE ?</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi repudiandae tempora exercitationem nulla perferendis. Corporis molestias veniam at, numquam accusamus</p>
                <button>CREATION SUR MESURE</button>
            </article>
            <img src="custom4.jpeg" alt="AF1 Custom">
        </section>

    </main>

<?php get_footer() ?>