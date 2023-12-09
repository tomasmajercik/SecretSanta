<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="ChooseSantaStyle.css">
    <title></title>
    <link rel="icon" href="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<?php
session_start();
if ($_SESSION['choose'] != "1") {
    header("Location: index.php");
}
include "connectiontodb.php";

$read = "SELECT * FROM users";
$resultread = mysqli_query($connection, $read);

if (isset($_GET['username'])) {
    $SANTATO = $_GET['username'];
}

$activeuser;
$getback = true;
while ($row = mysqli_fetch_assoc($resultread)) {
    $username = $row["username"];
    if ($username == $SANTATO) {
        $activeuser = $username;
        $getback = false;
        break;
    }
}

<<<<<<< HEAD
    if($getback)
        header("Location: choose.php");
=======
if ($getback) {
    header("Location: choose.php");
}
>>>>>>> 39b4c7202a75f5935d70ceedc4bc87aadef4858c

?>

<body>

<<<<<<< HEAD
    <h1 class="headline">You are santa to:</h1>

    <?php

        $read_s = "SELECT * FROM already_santa";
        $resultread_s = mysqli_query($connection,$read_s);

        //echo $activeuser . "<br><br>";

        $santatowhom = "x";
        $read_s = "SELECT santaTo FROM users WHERE username = '$activeuser'";
        $result = mysqli_query($connection, $read_s);

        $row = mysqli_fetch_assoc($result);
        $santatowhom = $row['santaTo'];
        //echo $santatowhom;

        if($santatowhom == "")
        {

            $usercount = 0;
            mysqli_data_seek($resultread, 0);
            while ($row = mysqli_fetch_assoc($resultread)) 
            {
                $usercount++;
                // echo $usercount . " ~ " . $row["username"] . "<br>";
            }
            
            $santa = "x";
            $fix = 0;
            
            mysqli_data_seek($resultread, 0);
       
            
            $SPECIAL_sql = "SELECT * FROM users";
            $SPECIAL_result = $connection->query($SPECIAL_sql);
            $users = array();
    
            //naplnenie pola databazou
            while ($row = $SPECIAL_result->fetch_assoc()) 
            {
                $users[] = $row;
            }
            
            $breakout = false;
            $Breakout = false;
            $limit = 1;
            do
            {
                $limit++;
                if($limit >= 100)
                {
                    echo "<h1 class='errormessage'>We have somehow run out of santas</h1>";
                    $Breakout = true;
                }
                //inicializacia
                $already = false;
                $result = rand(1, $usercount) - 1;
                $compare = $users[$result]['username'];
    
                //pozrie ci uz nahodou nie je santa
                $BREAK = 0;
                mysqli_data_seek($resultread_s, 0);
                while ($row = mysqli_fetch_assoc($resultread_s)) 
                {
                    if($compare == $row["username"])
                    {
                        $already = true;
                        break;
                    }
                }
                if($already || $compare == $activeuser || ($compare == "Lenka" && $activeuser == "Zdenko") || ($compare == "Zdenko" && $activeuser == "Lenka"))
                    continue;
                else
                {
                    $santa = $compare;
                    $breakout = true;
                }    
    
            }while(!$breakout && !$Breakout);
            
            //poslanie do databazy
            if($breakout)
            {
                $query = "INSERT INTO `already_santa` (`ID`, `username`) VALUES (NULL, '$santa')";
                $result = mysqli_query($connection,$query);
                $query = "UPDATE `users` SET `santaTo` = '$santa' WHERE `username` = '$activeuser'";
                $result = mysqli_query($connection,$query);
                echo "<br><br><h1 class='output'>" . $santa . "</h1><br><br>";
    
            }
        }
        else
        {
            echo "<h1 class='alreadyissanta'>You already are santa!</h1>";
        }



=======
    <h2 class="generator">Generating who are you santa to...</h2>

    <?php

    echo $activeuser;
>>>>>>> 39b4c7202a75f5935d70ceedc4bc87aadef4858c

    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>
</body>

</html>