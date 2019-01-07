<?php


?>

<h2><?= $categorie->titre ?></h2>
<p><a href="index.php?p=posts.home">Home</a></p>
<div class="row">
    <div class="col-sm-8">
        <?php foreach ($articles as $article): ?>


            <h2><a href="<?= $article->url; ?>"><?= $article->titre; ?></a></h2>
            <p><?= $article->extrait; ?></p>


        <?php endforeach; ?>
    </div>
    <div class="col-sm-4">
        <ul>
            <?php foreach ($categories as $categorie): ?>
                <li>
                    <a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a>
                </li>

            <?php endforeach; ?>
        </ul>
    </div>
</div>