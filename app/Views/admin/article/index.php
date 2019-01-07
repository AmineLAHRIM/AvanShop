<h1>Admisiter Les Articles</h1>
<p>
    <a href="index.php?p=admin.posts.add" class="btn btn-success">Ajouter</a>
</p>
<table class="table">
    <thead>
    <tr>
        <td>ID</td>
        <td>Titre</td>
        <td>Actions</td>
    </tr>

    </thead>
    <tbody>
    <?php foreach ($articles as $article): ?>
        <tr>
            <td><?= $article->id ?></td>
            <td><?= $article->titre ?></td>
            <td>
                <a href="index.php?p=admin.posts.edit&id=<?= $article->id ?>" class="btn btn-primary">Editer</a>
                <form action="index.php?p=admin.posts.delete" method="post" style="display: inline">
                    <input type="hidden" name="id" value="<?= $article->id ?>">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
    <? endforeach; ?>
    </tbody>
</table>