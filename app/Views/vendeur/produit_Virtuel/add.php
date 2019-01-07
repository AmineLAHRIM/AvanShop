<?php if (isset($errors) != null && $errors == true) { ?>
    <div class="alert alert-danger">
        AJOUTE INVALIDE
    </div>
<?php } elseif (isset($errors) != null && $errors == false) { ?>
    <div class="alert alert-success">Le Produit Bien ete Ajouté</div>
<? } ?>


<form class="newform" action="" method="post" class="espacevendeur" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-4">
            <h3>Information Produit</h3>
        </div>
        <div class="col-lg-4">

        </div>
        <div class="col-lg-4">
            <h3>Dimension</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->input('Libelle_Produit', 'Libelle du Produit', null, null, 'maxlength="20"'); ?>
            <?= $form->input('ShortdescriptionP', 'Short description', ['type' => 'textarea'], null, 'maxlength="40" rows="2"'); ?>
            <?= $form->input('Longdescription', 'Long description', ['type' => 'textarea'], null, 'maxlength="100" rows="11"'); ?>

        </div>
        <div class="col-lg-4">
            <?= $form->input('Prix_Unitaire', 'Prix Unitaire', null, '(MAD)'); ?>
            <?= $form->input('TagP', 'Les Tags Du Produit', null, "Tag1, Tag2, Tag3, ...", 'maxlength="20"'); ?>
            <?= $form->input('Quantite_stock', 'La Quantite du stock'); ?>
            <?= $form->input('Prix_promotion', 'Le Prix du promotion', null, '(MAD)'); ?>
            <?= $form->input('PrixLivraison', 'Le Prix de Livraison', null, '(MAD)'); ?>
            <?= $form->select('Id_Categorie', 'Categorie du Produit', \App\Table\CategorieTable::extract('Id_Categorie', 'Nom_categorie')); ?>

        </div>
        <div class="col-lg-4">
            <?= $form->input('Longeur_Dimension', 'La Longeur du Produit', null, '(Metere)'); ?>
            <?= $form->input('Largeur_Dimension', 'La Largeur du Produit', null, "(Metere)"); ?>
            <?= $form->input('Hauteur_Dimension', 'La Hauteur du Produit', null, "(Metere)"); ?>
            <?= $form->input('Poid_Dimension', 'Le Poid du Produit', null, '(Kg)'); ?>
            <br>

            <h3>Upload Image</h3>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>640px × 448px</label>
                        <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file">
                                Browse… <input name="img[]" type="file" id="imgInp">
                            </span>
                        </span>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <img id='img-upload'/>
                    </div>

                </div>
                <div style="display: none" class="col-lg-6">

                    <div class="form-group2">
                        <label>640px×448px</label>
                        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Browse… <input name="img[]" type="file" id="imgInp2">
                </span>
            </span>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <img id='img-upload'/>
                    </div>

                </div>
            </div>
            <div class="row">
                <div style="display: none" class="col-lg-6">
                    <div class="form-group3">
                        <label>640px×448px</label>
                        <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file">
                                Browse… <input name="img[]" type="file" id="imgInp3">
                            </span>
                        </span>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <img id='img-upload'/>
                    </div>

                </div>
                <div style="display: none" class="col-lg-6">
                    <div class="form-group4">
                        <label>640px×448px</label>
                        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Browse… <input name="img[]" type="file" id="imgInp4">
                </span>
            </span>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <img id='img-upload'/>
                    </div>

                </div>
            </div>

        </div>


    </div>

    </div>
    <?= $form->submit('AJOUTER'); ?>

</form>
