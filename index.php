<?php
session_start();
require './includes/DB.php';
?>
<!DOCTYPE html>
<html lang="he">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/item.css">
    <link rel="stylesheet" media="screen and (min-width: 650px)" href="css/index.css">
    <link rel="stylesheet" media="screen and (max-width: 650px)" href="css/indexMobile.css">
    <link rel="stylesheet" href="css/nav.css">
    <title>Suppl</title>
</head>
<body>
<?php
require './includes/nav.php';
?>
    <header class="container PrimeHeader">
        <div class="headerVid">
            <video autoplay loop muted src="RingVideo.mp4"></video>
        </div>
        <div class="overlay"></div>
        <div class="headerCont">
            <h1>Suppl</h1>
            <form class="Callform">
                <button type="submit">התקשר</button>
            </form>
        </div>
    </header>
    
    <div class="CardsSection">

        <div class="card on-screen">
            <span><img src="Ring1.jpg" alt="Quality"></span>
            <div class="Card-content">
                <h3>איכות</h3>
                <span>bla bla bla blaaalsaf jibk bb asfasf</span>
            </div>
        </div>

        <div class="card on-screen">
            <span><img src="Ring2.jpg" alt="Quality"></span>
            <div class="Card-content">
                <h3>שירות</h3>
                <span>bla bla bla blaaalsaf jibk bb asfasf</span>
            </div>
        </div>

        <div class="card on-screen">
            <span><img src="Ring3.jpg" alt="Quality"></span>
            <div class="Card-content">
                <h3>מחיר</h3>
                <span>bla bla bla blaaalsaf jibk bb asfasf</span>
            </div>
        </div>
    </div>
    <section class="ItemSection">
        <div class="newSection">
            <span class="ribbon">!חדש</span>

            <?php
            require 'includes/item.php';
            $sql = 'SELECT TOP 3 * FROM items';
            ItemDisplay($sql);
            ?>

        </div>
    </section>

<script src="javascript/index.js"></script>
</body>
</html>