<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= \App\App::getInstance()->getTitle(); ?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--STYLE0-->
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/css.css">
    <?php $page = isset($_GET['p']) ? $_GET['p'] : null; ?>

    <?php if ($page != null && $page === 'posts.contactus') { ?>
        <!--STYLE1-->
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/nivo-lightbox.css">
        <link rel="stylesheet" href="css/nivo_themes/default/default.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/contactus.css">

        <?php
    } elseif (($page != null && $page === 'posts.acceuil') || $page == null || $page === 'posts.splash') { ?>
        <!--STYLE2-->
        <link rel="stylesheet" href="css/reset.min.css">
        <link rel="stylesheet" href="css/Article.css">
        <link rel="stylesheet" href="css/product.css">


        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootshape.css">
        <link rel="stylesheet" href="css/style.css">

        <?php
    } elseif ($page !== 'posts.contactus') { ?>
        <!--STYLE3-->


        <link rel="stylesheet" href="css/reset.min.css">
        <link rel="stylesheet" href="css/Article.css">
        <link rel="stylesheet" href="css/product.css">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/boutique.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/boutique.css">


    <?php } ?>


</head>

<body>


<div class="cont">
    <div class="topbar">
        <label>AvanShop</label>

        <?php
        $auth = \App\Auth\UtilAuth::getInstance();
        if ($auth->logged()) {
            ?>
            <a href="index.php?p=panier.espace.index&id=<?= $auth->getPanierId() ?>" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-shopping-cart"></span> Panier
            </a>
            <?php
        }
        ?>


    </div>
    <div class="menu" data-sticky>
        <a href="index.php?p=posts.splash">Home</a>
        <a href="index.php?p=posts.acceuil">Special Offers</a>
        <a href="index.php?p=posts.boutique">Sell</a>
        <a href="index.php?p=posts.contactus">Contact</a>
        <a href="index.php?p=posts.login">Login</a>
        <a href="index.php?p=posts.signup">Register</a>
    </div>
</div>

<p>
    <?= $content; // c'est comme html mais c'est de faire echo+"html" ou inserer html dans $content                ?>
</p>
<div style="clear: both"></div>


<!--SCRIPT -->
<script src="js/fixed.js"></script>
<script src="js/jquery-2.1.0.min.js"></script>
<script src="js/categorie.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/blocs.min.js"></script>
<script src="js/lazysizes.min.js"></script>
<script src="js/TweenMax.min.js"></script>
<script src="js/login.js"></script>
<script src="js/bootshape.js"></script>
<script src="js/SpinnerNumber.js"></script>


<!-- SCRIPT Contact us -->

<script src="js/jquery.parallax.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/nivo-lightbox.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
