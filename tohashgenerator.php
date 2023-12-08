<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <link rel= "stylesheet" href="bootstrap 5/css/bootstrap.css">
    <link rel= "stylesheet" href="adminpage_style.css">
    <title></title>
    <link rel="icon" href= "">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;600&family=Yusei+Magic&display=swap" rel="stylesheet">
    <link rel= "stylesheet" href="style.css" href="https://fonts.googleapis.com/css?family=Sofia">
</head>


<?php 

        $tohash = "a";
        //zahashovanie hesla
        $hash_format = "$2y$10$";
        $salt = "qwertyuiopasdfghjklzxc";
        $hash_salt = $hash_format . $salt;
        $tohash = crypt($tohash, $hash_salt);

        
?>






<body>
    <header>

    </header>

    <main>

    <?php echo $tohash; ?>

    </main>

    <footer>
        
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>
</body>
</html>