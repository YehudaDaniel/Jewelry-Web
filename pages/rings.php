<?php
session_start();
require '../includes/DB.php';
?>
<!DOCTYPE html>
<html lang="he">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type = "text/css" href="../css/item.css" >
    <link rel="stylesheet" type = "text/css" href="../css/nav.css" >
    <link rel="stylesheet" type = "text/css" href="../css/item.css" >
    <link rel="stylesheet" type = "text/css" href="../css/rings.css" >
    <title>טבעות</title>
</head>
<body>
    <?php
    require '../includes/nav.php';
    ?>

    <main>
        <div class="recommends">
            <?php
            include '../includes/item.php';
            include '../includes/item.php';
            include '../includes/item.php';
            ?>
        </div>
    </main>

<script src="../javascript/index.js"></script>
</body>
</html>