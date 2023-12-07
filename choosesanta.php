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
        header("Location: choose.php");

?>

<body>

    <h1>generating who are you santa to</h1>

    <?php

        $read_s = "SELECT * FROM already_santa";
        $resultread_s = mysqli_query($connection,$read_s);

        echo $activeuser . "<br><br>";

        $usercount = 0;
        mysqli_data_seek($resultread, 0);
        while ($row = mysqli_fetch_assoc($resultread)) 
        {
            $usercount++;
            echo $usercount . " ~ " . $row["username"] . "<br>";
        }
        
        $santa = "x";
        $fix = 0;
        
        mysqli_data_seek($resultread, 0);
   
        
        $SPECIAL_sql = "SELECT * FROM users";
        $SPECIAL_result = $connection->query($SPECIAL_sql);
        $users = array();

        while ($row = $SPECIAL_result->fetch_assoc()) 
        {
            $users[] = $row;
        }

        $breakout = false;
        do
        {
            $result = rand(1, $usercount);
            $result -= 1;
            $compare = $users[$result]['username'];

            if($compare == $activeuser || ($compare == "Lenka" && $activeuser == "Zdenko") || ($compare == "Zdenko" && $activeuser == "Lenka"))
                continue;
            else 
            {
                $santa = $compare;
                $breakout = true;
            }    

        }while(!$breakout);
        
        echo "<br><br>" . $santa . "<br><br>";


    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>
</body>
</html>
