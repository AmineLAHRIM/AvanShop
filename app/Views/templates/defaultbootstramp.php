<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../public/css">

    <title><?= \App\App::getInstance()->getTitle(); ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/defaultbootstrapcss.css">


</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php?p=posts.splash">AvanShop</a>
        </div>
    </div>
</nav>

<div class="container">

    <div class="starter-template" style="padding-top:100px">

        <?= $content; // c'est comme html mais c'est de faire echo+"html" ou inserer html dans $content                ?>
    </div>

</div><!-- /.container -->
<script src="js/jquery.js"></script>
<script src="js/uplod.js"></script>

</body>
</html>
