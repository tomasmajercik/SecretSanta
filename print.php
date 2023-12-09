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


<body>
    
<?php 

    include "connectiontodb.php";
    $reset = " ";

    function printUserTable($connection) {
        $query = "SELECT * FROM users";
        $result = mysqli_query($connection, $query);

        // Start printing the HTML table
        echo '<table border="1">';
        echo '<tr><th>username</th><th>SantaTo</th></tr>';

        // Loop through the rows and print data
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['username'] . '</td>';
            echo '<td>' . $row['santaTo'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    }

    $show = true;
    if (isset($_POST['print'])) 
        $reset = $_POST['print'];

    if($reset == "123hesielko")
        $show = false;  

    if($show)
    {
        echo "<form action='print.php' method='post'>";
        echo "<h1>enter password</h1>";
        echo "<input type='password' name='print'>";
        echo "</form>";
    }
    else
    {
        printUserTable($connection);
    }


    

?>

    


    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr {
            background-color: #ddd;
        }
        tr:nth-child(even) {
            background-color: #eee;
        }





    </style>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>
</body>
</html>
