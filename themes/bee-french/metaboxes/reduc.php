<?php

class ReducMetaBox {

    const META_KEY = 'montheme_Reduc';
    const NONCE = '_montheme_Reduc_nonce';

    public static function register () {
        add_action('add_meta_boxes', [self::class, 'add'], 10, 2);
        add_action('save_post', [self::class, 'save']);
    }

    public static function add ($postType, $post) {
        if ($postType === 'post' && current_user_can('publish_posts', $post)) {
            add_meta_box(self::META_KEY, 'Réduction', [self::class, 'render'], 'post', 'side');
        }
    }

    public static function render ($post) {
        $value = get_post_meta($post->ID, self::META_KEY, true);
        wp_nonce_field(self::NONCE, self::NONCE);
        ?>
        <input type="hidden" value="0" name="<?= self::META_KEY ?>">
        <div>
        <input type="radio" value="5" name="<?= self::META_KEY ?>" <?php checked($value, '5') ?>>
        <label for="<?= self::META_KEY ?>">5%</label>
        </div>
        <div>
        <input type="radio" value="10" name="<?= self::META_KEY ?>" <?php checked($value, '10') ?>>
        <label for="<?= self::META_KEY ?>">10%</label>
        </div>
        <div>
        <input type="radio" value="15" name="<?= self::META_KEY ?>" <?php checked($value, '15') ?>>
        <label for="<?= self::META_KEY ?>">15%</label>
        </div>
        <div>
        <input type="radio" value="20" name="<?= self::META_KEY ?>" <?php checked($value, '20') ?>>
        <label for="<?= self::META_KEY ?>">20%</label>
        </div>
        <div>
        <input type="radio" value="25" name="<?= self::META_KEY ?>" <?php checked($value, '25') ?>>
        <label for="<?= self::META_KEY ?>">25%</label>
        </div>
        <div>
        <input type="radio" value="30" name="<?= self::META_KEY ?>" <?php checked($value, '30') ?>>
        <label for="<?= self::META_KEY ?>">30%</label>
        </div>
        <div>
        <input type="radio" value="40" name="<?= self::META_KEY ?>" <?php checked($value, '40') ?>>
        <label for="<?= self::META_KEY ?>">40%</label>
        </div>
        <div>
        <input type="radio" value="45" name="<?= self::META_KEY ?>" <?php checked($value, '45') ?>>
        <label for="<?= self::META_KEY ?>">45%</label>
        </div>
        <div>
        <input type="radio" value="50" name="<?= self::META_KEY ?>" <?php checked($value, '50') ?>>
        <label for="<?= self::META_KEY ?>">50%</label>
        </div>
        <div>
        <input type="radio" value="60" name="<?= self::META_KEY ?>" <?php checked($value, '60') ?>>
        <label for="<?= self::META_KEY ?>">60%</label>
        </div>
        <div>
        <input type="radio" value="70" name="<?= self::META_KEY ?>" <?php checked($value, '70') ?>>
        <label for="<?= self::META_KEY ?>">70%</label>
        </div>
        <div>
        <input type="radio" value="80" name="<?= self::META_KEY ?>" <?php checked($value, '80') ?>>
        <label for="<?= self::META_KEY ?>">80%</label>
        </div>
        <?php
    }

    public static function save ($post) {
        if (
            array_key_exists(self::META_KEY, $_POST) && 
            current_user_can('publish_posts', $post) &&
            wp_verify_nonce($_POST[self::NONCE], self::NONCE)
            ) {
            if ($_POST[self::META_KEY] === '0') {
                delete_post_meta($post, self::META_KEY);
            } else {
                update_post_meta($post, self::META_KEY, $_POST[self::META_KEY]);
            }
        }
    }

}
