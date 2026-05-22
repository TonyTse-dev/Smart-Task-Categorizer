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
    
        $sql = "INSERT INTO tasks (Name, Due_date, Category, Status) VALUES ('$task', '$date', '$category', '$status')";
        
        
        $insert = mysqli_query($link, $sql);


        header("Location: home.php");
        exit();
    
?>