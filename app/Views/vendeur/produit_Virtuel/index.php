<h1>Gerer Les Produits</h1>
<p>
    <a href="index.php?p=vendeur.produit_Virtuel.add" class="btn btn-success">Ajouter</a>
</p>
<table class="table">
    <thead>
    <tr>
        <td>ID</td>
        <td>Libelle</td>
        <td>Prix Unitaire</td>
        <td>Short descriptio</td>
        <td>Long description</td>
        <td>Quantite stock</td>
        <td>Prix_promotion</td>
        <td>PrixLivraison</td>
        <td>Actions</td>
    </tr>

    </thead>
    <tbody>
    <?php foreach ($produits_virtuel as $produit_virtuel): ?>
        <tr>
            <td><?= $produit_virtuel->Id_ProduitV ?></td>
            <td><?= $produit_virtuel->Libelle_Produit ?></td>
            <td><?= $produit_virtuel->Prix_Unitaire ?></td>
            <td><?= $produit_virtuel->short ?></td>
            <td><?= $produit_virtuel->long ?></td>
            <td><?= $produit_virtuel->Quantite_stock ?></td>
            <td><?= $produit_virtuel->Prix_promotion ?></td>
            <td><?= $produit_virtuel->PrixLivraison ?></td>
            <td>
                <a href="index.php?p=vendeur.produit_Virtuel.show&id=<?= $produit_virtuel->Id_ProduitV ?>"
                   class="btn btn-success">Details</a>
            </td>
            <td>
                <a href="index.php?p=vendeur.produit_Virtuel.edit&id=<?= $produit_virtuel->Id_ProduitV ?>"
                   class="btn btn-primary">Editer</a>
            </td>
            <td>
                <form action="index.php?p=vendeur.produit_Virtuel.delete" method="post" style="display: inline">
                    <input type="hidden" name="id" value="<?= $produit_virtuel->Id_ProduitV ?>">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>


        </tr>
    <? endforeach; ?>
    </tbody>
</table>
