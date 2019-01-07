<?php if ($errors): ?>
    <div class="alert alert-danger">
        AJOUTE INVALIDE
    </div>
<?php endif; ?>


<form action="" method="post">
    <?= $form->input('titre', 'Titre de l\'article'); ?>
    <?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
    <?= $form->select('categorie_id', 'Categorie', \App\Table\CategorieTable::extract('id', 'titre')); ?>
    <?= $form->submit('AJOUTER'); ?>

</form>
