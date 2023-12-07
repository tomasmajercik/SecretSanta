<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="chooseStyle.css">
    <title></title>
    <link rel="icon" href="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<?php
    session_start();
    if($_SESSION['choose'] != "1")
    {
        header("Location: index.php");
    }
    include "connectiontodb.php";

    $read = "SELECT * FROM users";
    $resultread = mysqli_query($connection,$read);

    if (isset($_GET['username'])) 
    {
        $SANTATO = $_GET['username'];
    }

    $activeuser;
    $getback = true;
    while ($row = mysqli_fetch_assoc($resultread)) 
    {
        $username = $row["username"];
        if($username == $SANTATO)
        {
            $activeuser = $username;
            $getback = false;
            break;
        }
    }

    if($getback)
    {
        header("Location: choose.php");
    }

?>

<body>

    <h1>generating who are you santa to</h1>

    <?php

        echo $activeuser;

    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>
</body>
</html>
