<?php
$count = absint(get_comments_number());
?>

<?php if ($count > 0) : ?>
    <h2><?= $count ?> Commentaire<?= $count > 1 ? 's' : '' ?></h2>
<?php else : ?>
    <h2>Laisser un commentaire</h2>
<?php endif ?>
<?php comment_form([
    'submit_field' => '
    <input type="submit" value="Post Comment" class="button_comments">
    ',
    'title_reply' => '
        <p>
        ',
    'comment_notes_after' => '',
    'comment_notes_before' => '',
    'comment_field' => '
                    <div class="mb-3">
                        <label for="CommentaireArea" class="form-label">Commentaire</label>
                        <textarea class="form-control" id="CommentaireArea" rows="3"></textarea>
                    </div>
        ',
]); ?>
<?php wp_list_comments(['style' => 'div']); ?>
<?php paginate_comments_links(); ?>