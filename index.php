<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Style.css">
    <title>Secret Santa</title>
    <link rel="icon" href="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<?php 

    
    
    if(isset($_POST["submit"]))
    {

        $passcode = $_POST["passcode"];
        $accountexist = false;
        if($passcode == "Santa")
        {
            $accountexist = true;
        }


        if($accountexist)
        {
            session_start();
            $_SESSION['choose'] = "1";
            header("Location: transfer.php");
        } 
        else if(!$accountexist)
        {
            session_start();
            $_SESSION['choose'] = "0";
            header("Location: index.php?error=passcode is incorrect");
        }




    }


?>

<body>


        <form action="index.php" method="post">

            <?php if(isset($_GET['error'])) {?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>   
            <h4>Enter Passcode</h4>
            <input class="input" type="text" name="passcode" placeholder="123a5" required minlength="5" maxlength="5">
            <input class= "button" type="submit" name="submit" value="log in" >
        </form>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>
</body>
</html>
