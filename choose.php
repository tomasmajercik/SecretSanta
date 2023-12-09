<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="ChooseStyle.css">
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

<<<<<<< HEAD
    if ($_SERVER["REQUEST_METHOD"] === "POST") 
    {
        // Check if the selected_user is set in the form submission
        if (isset($_POST["selected_user"])) 
        {
            // Retrieve the selected_user value from the form submission
            $selectedUser = $_POST["selected_user"];
    
            // Store the selected user in the session variable
            header("Location: choosesanta.php?username=$selectedUser");
        } else 
        {
            // Handle the case when no user is selected
            echo "No user selected.";
        }
=======

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the selected_user is set in the form submission
    if (isset($_POST["selected_user"])) {
        // Retrieve the selected_user value from the form submission
        $selectedUser = $_POST["selected_user"];

        // Store the selected user in the session variable
        header("Location: choosesanta.php?username=$selectedUser");
    } else {
        // Handle the case when no user is selected
        echo '<script>alert("No users selected...")</script>';
>>>>>>> 39b4c7202a75f5935d70ceedc4bc87aadef4858c
    }
}


?>

<body>
    <header>

    </header>

    <main>

<<<<<<< HEAD
    <h1>Who are you?</h1>
    <form action="choose.php" method="post">
    <?php
    while ($row = mysqli_fetch_assoc($resultread)) 
    {
        $username = $row["username"];
        $santaTo = $row["santaTo"];
=======
        <h1>Who are you?</h1>
        <div class="bunka">
            <form action="choose.php" method="post">
                <?php
                while ($row = mysqli_fetch_assoc($resultread)) {
                    $username = $row["username"];
                    $santaTo = $row["santaTo"];
>>>>>>> 39b4c7202a75f5935d70ceedc4bc87aadef4858c

                    echo "<label class='choosename'>";
                    echo "<input type='radio' name='selected_user' value='$username'>";
                    echo "$username";
                    echo "</label>";
                    echo "<br>";
                }
                ?>
                <button type="submit">Select</button>
            </form>
        </div>






        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var choosenameLabels = document.querySelectorAll('.choosename');

                choosenameLabels.forEach(function(label) {
                    label.addEventListener('click', function() {
                        // Remove the 'selected' class from all labels
                        choosenameLabels.forEach(function(item) {
                            item.classList.remove('selected');
                        });

                        // Add the 'selected' class to the clicked label
                        label.classList.add('selected');
                    });
                });
            });
        </script>


    </main>

    <footer>

        <!-- <a href="administrator.php">If you are admin, please log in</a> -->

    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>
</body>

</html>