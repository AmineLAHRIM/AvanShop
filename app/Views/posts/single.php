<h2>SINGLE</h2>
<p><a href="index.php?p=posts.home">Home</a></p>
<?php
//cela va faire une injection sql
//$post=$db->query('SELECT * FROM post WHERE id='.$_GET['id']);


?>

<h1><?= $article->id; ?></h1>
<p><em><?= $categorie->titre; ?></em></p>


<p><?= $article->contenu; ?></p>
