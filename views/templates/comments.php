<?php

/** 
 * Affichage de la partie admin : liste des articles avec un bouton "modifier" pour chacun. 
 * Et un formulaire pour ajouter un article. 
 */

?>

<h2>Commentaires | <?= $article->getTitle() ?></h2>

<div>
    <form action="<?= Utils::route('deleteComment') ?>" method="POST" class="no-style">
        <table class="table monitoring">
            <thead>
                <tr>
                    <th colspan="1"></th>
                    <th>Pseudo</th>
                    <th>Contenu</th>
                    <th>Date de création</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comments as $comment) { ?>
                    <tr>
                        <td>
                            <label for="comment-<?= $comment->getId() ?>"></label>
                            <input type="checkbox" name="comments_to_delete[]" value="<?= $comment->getId() ?>" id="comment-<?= $comment->getId() ?>">
                        </td>
                        <td><?= $comment->getPseudo() ?></td>
                        <td><?= $comment->getContent() ?></td>
                        <td><?= date("d/m/Y H:i", $comment->getDateCreation()->getTimestamp()) ?></td>
                    </tr>
                <?php } ?>
                <?php if (empty($comments)) { ?>
                    <tr>
                        <td colspan="4">Aucun commentaire pour cet article.</td>
                    </tr>
                <?php } ?>
        </table>

        <button class="submit" <?= Utils::askConfirmation("Etes-vous sûr de vouloir supprimer ces commentaires ?") ?>>Supprimer les commentaires sélectionné</button>
    </form>
</div>