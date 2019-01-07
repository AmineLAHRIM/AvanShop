<div class="content">
    <div class="main main2">
        <h1>Panier</h1>
        <br>

        <table class="table">
            <thead>
            <tr>
                <td>ID</td>
                <td>Nom Article</td>
                <td>Quantite De Stock</td>
                <td>Prix Unitaire</td>
                <td>Prix promotion</td>
                <td>Prix Livraison</td>
                <td>Actions</td>
            </tr>

            </thead>
            <tbody >
            <?php foreach ($articles as $article): ?>
                <tr>
                    <td><?= $article->Id_article ?></td>
                    <td><?= $article->Nom_article ?></td>
                    <td><?= $article->Qte_Article ?></td>
                    <?php
                    $produit_virtuel=\App\Table\ArticleTable::findbyIdproduit_virtuel($article->Id_ProduitV)
                    ?>
                    <td><?= $produit_virtuel->Prix_Unitaire ?></td>
                    <td><?= $produit_virtuel->Prix_promotion ?></td>
                    <td><?= $produit_virtuel->PrixLivraison ?></td>
                    <td>
                        <a href="index.php?p=posts.product&id=<?= $produit_virtuel->Id_ProduitV ?>"
                           class="btn btn-success">Details</a>
                    </td>
                    <td>
                        <form action="index.php?p=panier.espace.delete" method="post" style="display: inline">
                            <input type="hidden" name="id" value="<?= $article->Id_article ?>">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>


                </tr>
            <? endforeach; ?>
            </tbody>
        </table>
        <p>
        <form action="index.php?p=panier.espace.pdf" method="post" style="display: inline">
            <input type="hidden" name="idpanier" value="<?=$panierId ?>">
            <button type="submit" class="btn btn-success">Faire La Commande</button>
        </form>
        </p>
    </div>
</div>