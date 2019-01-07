<h1>Admisiter Les Categories</h1>


<a href="?p=admin.categorie.add" class="btn btn-success">Ajouter</a>
<table class="table">
    <thead>
    <tr>
        <td>ID de Categorie</td>
        <td>Titre de Categorie</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $categorie) : ?>
        <tr>
            <td><?= $categorie->id ?></td>
            <td><?= $categorie->titre ?></td>
            <td>
                <a class="btn btn-primary" href="?p=admin.categorie.edit&id=<?= $categorie->id ?>">Editer</a>

                <!-- en mette ce form pour protege vers les images ou les liens qui envoie au session admin avec method GET['id']-->
                <form class="newform" action="?p=admin.categorie.delete" method="post" style="display: inline">
                    <input type="hidden" name="id" value="<?= $categorie->id ?>">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>