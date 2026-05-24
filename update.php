<?php
  
    $host     = 'localhost';
    $db_name  = 'smart-task-categorizer-db';
    $username = 'root';
    $password = '';

    $link = mysqli_connect($host, $username, $password, $db_name);

    $sql = "SELECT COUNT(*) AS total_tasks FROM tasks";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);

   ` $total_tasks = $row['total_tasks'];
    header("Location: home.php");
    exit();
    

?>