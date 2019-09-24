
<!doctype html>
<html lang="fr">
<head>
    <meta name="author" content="Dylan carluccio">
    <meta name="description" content="Portfolio Dylan Carluccio">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site</title>
    <link rel="stylesheet" type="text/css" href="css/uikit.css" />
    <link rel="stylesheet" type="text/css" href="css/menu.css" />
    <link rel="stylesheet" type="text/css" href="css/index.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body >
<header >
</header>
<!-- Nav -->
<nav>
    <a href="#"><label class="Logo">Site</label></a>
    <input class="MenuBouton" type="checkbox" id="MenuBouton" />
    <label class="MenuIcone" for="MenuBouton"><span class="NavIcone"></span></label>
    <ul class="Menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="content/about.php">A propos</a></li>
        <li><a href="content/contact.php">Contact</a></li>
    </ul>
</nav>
<?php


include 'content/home.php';


include 'main/footer.php';
?>
