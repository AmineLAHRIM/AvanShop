<?php
//Affectation Vers DB return number of affectation qui a faite soit vers DB et tjrs 0 vers PHP
//$count=$pdo->exec('INSERT INTO ArticleTable SET titre="titre7",date="'.date('Y-m-d H:i:s').'"');
?>

<h2>Home</h2>


<?php
//$data = $db->query('SELECT * FROM ArticleTable','\App\Table\ArticleTable');

?>

<div class="row">
    <div class="col-sm-8">
        <? foreach ($articles as $article): ?>
            <!--soit en fait comme ca mais pas bon 100%-->
            <!--<h2>
        <a href="index.php?p=post&id=<?= $article->id; ?>">
            <?= $article->titre; ?>
        </a>
    </h2>-->
            <h2><a href="<?= $article->url; ?>"><?= $article->titre; ?></a></h2>

            <p><?= $article->categorie; ?></p>
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


