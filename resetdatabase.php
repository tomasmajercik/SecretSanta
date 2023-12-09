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

    include "connectiontodb.php";
    $reset = " ";

    

    function clearDatabase($connection) {
        // Clear the 'santaTo' column in the 'users' table
        $query = "UPDATE users SET santaTo = NULL";
        $result = mysqli_query($connection, $query);
    
        // Delete all rows from the 'already_santa' table
        $query = "DELETE FROM already_santa";
        $result = mysqli_query($connection, $query);
    
        return $result;
    }

    if (isset($_POST['resetDB'])) 
    {
        $reset = $_POST['resetDB'];
    }

    if($reset == "hesielko123")
    {
        clearDatabase($connection);
        header("Location: index.php");
    }

?>

<body>

    <form action="resetdatabase.php" method="post">
        <h1>!enter password if you are really sure and you want to reset database!</h1>
        <input type="password" name="resetDB" value="">
    </form>


    <style>
        input {
            padding: 10px;
            margin: 5px 0;  
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
            font-size: 16px;
        }

        /* Style for input focus */
        input:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
        }

        /* Style for submit button */
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        /* Style for submit button on hover */
        input[type="submit"]:hover {
            background-color: #45a049;
        }


    </style>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>
</body>
</html>
