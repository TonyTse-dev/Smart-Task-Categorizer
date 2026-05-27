<?php
    $host     = 'localhost';
    $db_name  = 'smart-task-categorizer-db';
    $username = 'root';
    $password = '';

    $link = mysqli_connect($host, $username, $password, $db_name);
    
    // Check if the form actually posted data
        $task = $_POST['task'];
        $date = $_POST['date'];
        $category = $_POST['category'];
        $status = $_POST['status'];
        $sql = "SELECT * FROM tasks ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($result);

        // 1. Calculate the next ID safely outside of the string
        $next_id = $row['id'] + 1;

        // 2. Insert using the clean variable
        $sql = "INSERT INTO tasks (Name, Due_date, Category, Status, id) VALUES ('$task', '$date', '$category', '$status', '$next_id')";

        mysqli_query($link, $sql);

        header("Location: home.php");
        exit();
    
?>