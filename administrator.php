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


    include "connectiontodb.php";

    if(isset($_POST["submit"]))
    {

        

        $username = $_POST["username"];
        $password = $_POST["password"];

        //sql injection prevent fix
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        //zahashovanie hesla
        $hash_format = "$2y$10$";
        $salt = "qwertyuiopasdfghjklzxc";
        $hash_salt = $hash_format . $salt;
        $password = crypt($password, $hash_salt);

        $read = "SELECT * FROM admin_list";
        $resultread = mysqli_query($connection,$read);

        $accountexist = false;
        while($row = mysqli_fetch_assoc($resultread))
        {
            $checkname = $row["username"];
            $checkpassword = $row["passwd"];
            if($checkname == $username and $checkpassword == $password)
            {
                // header("Location: register_again.php");
                // $name_taken = true;
                $accountexist = true;
            }
        }
        if($accountexist)
        {
            session_start();
            $_SESSION['channel'] = "1";
            header("Location: adminpage.php");

        } 
        else if(!$accountexist)
        {
            session_start();
            $_SESSION['channel'] = "0";
            header("Location: administrator.php?error=Username / password is incorrect");
        }




    }


?>






<body>
    <header>

        <!-- <div class="custom-shape-divider-top-1680717384">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
            <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
        </svg>
        </div> -->

    </header>

    <main>

    

        <h1>Log in:</h1>
        <form action="administrator.php" method="post">
            
            <?php if(isset($_GET['error'])) {?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>    

            <h4>Username</h4>
            <input type="text" name="username" placeholder="username" required minlength="1" maxlength="13">
            <h4>Password</h4>
            <input type="password" name="password" placeholder="password" required minlength="1" maxlength="15">
            <input class= "button" type="submit" name="submit" value="log in" >

        </form>


    </main>

    <footer>
        
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>
</body>
</html>