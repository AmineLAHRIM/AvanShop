<?php if (isset($errors) != null && $errors == true) { ?>
    <div class="alert alert-danger">
        MODIFICATION INVALIDE
    </div>
<?php } elseif (isset($errors) != null && $errors == false) { ?>
    <div class="alert alert-success">Le Produit Bien ete Modifé</div>
<? } ?>


<form action="" method="post" class="espacevendeur">
    <div class="row">
        <div class="col-lg-4">
            <h3>Details Du Produit</h3>
        </div>
        <div class="col-lg-4">

        </div>
        <div class="col-lg-4">
            <h3>Les Dimension</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->input('Libelle_Produit', 'Libelle du Produit', null, null, "Disabled"); ?>

            <?= $form->input('ShortdescriptionP', 'Short description', ['type' => 'textarea'], null, 'maxlength="40" Disabled rows="2"'); ?>
            <?= $form->input('Longdescription', 'Long description', ['type' => 'textarea'], null, 'maxlength="100" Disabled rows="11"'); ?>

        </div>
        <div class="col-lg-4">
            <?= $form->input('Prix_Unitaire', 'Prix Unitaire', null, '(MAD)', "Disabled"); ?>
            <?= $form->input('TagP', 'Les Tags Du Produit', null, "Tag1, Tag2, Tag3, ...", "Disabled"); ?>
            <?= $form->input('Quantite_stock', 'La Quantite du stock', null, null, "Disabled"); ?>
            <?= $form->input('Prix_promotion', 'Le Prix du promotion', null, '(MAD)', "Disabled"); ?>
            <?= $form->input('PrixLivraison', 'Le Prix de Livraison', null, '(MAD)', "Disabled"); ?>
            <?= $form->select('Id_Categorie', 'Categorie du Produit', \App\Table\CategorieTable::extract('Id_Categorie', 'Nom_categorie'), "Disabled"); ?>
        </div>
        <div class="col-lg-4">
            <?= $formDimension->input('Longeur_Dimension', 'La Longeur du Produit', null, '(Metere)', "Disabled"); ?>
            <?= $formDimension->input('Largeur_Dimension', 'La Largeur du Produit', null, "(Metere)", "Disabled"); ?>
            <?= $formDimension->input('Hauteur_Dimension', 'La Hauteur du Produit', null, "(Metere)", "Disabled"); ?>
            <?= $formDimension->input('Poid_Dimension', 'Le Poid du Produit', null, '(Kg)', "Disabled"); ?>
        </div>
    </div>


</form>