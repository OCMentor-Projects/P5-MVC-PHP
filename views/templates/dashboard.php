<?php

/** 
 * Affichage de la partie admin : liste des articles avec un bouton "modifier" pour chacun. 
 * Et un formulaire pour ajouter un article. 
 */

$invertSortDirection = $sortDirection == "ASC" ? "DESC" : "ASC";

?>

<h2>Monitoring</h2>

<div>
    <table class="table monitoring">
        <thead>
            <tr>
                <?php foreach ($columns as $columnName => $column) : ?>
                    <th>
                        <a href="<?= Utils::route("dashboard", ["sortByColumn" => $column["sort"], "sortDirection" => $invertSortDirection]) ?>">
                            <?= $columnName ?>
                            <?php if ($sortByColumn == $column["sort"]) {
                                Utils::sortDirectionIndicator($sortDirection);
                            } ?>
                        </a>
                    </th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article) { ?>
                <tr>
                    <td><?= $article->getId() ?></td>
                    <td><?= $article->getTitle() ?></td>
                    <td><?= $article->getContent(200) ?></td>
                    <td><?= $article->getViewed() ?></td>
                    <td><a class="submit" href="<?= Utils::route("comments", ["id" => $article->getId()]) ?>"><?= $article->getCommentNumber() ?></a></td>
                    <td><?= date("d/m/Y H:i", $article->getDateCreation()->getTimestamp()) ?></td>
                </tr>
            <?php } ?>
    </table>
</div>

<a class="submit" href="index.php?action=showUpdateArticleForm">Ajouter un article</a>