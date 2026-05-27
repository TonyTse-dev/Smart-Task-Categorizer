<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Task Categorizer</title>
    <link rel="stylesheet" href="home-style.css">
</head>
<body>
    <div id="header">
        <h1 id="title">Smart Task Categorizer</h1>
    </div>

    <div id="add_task">
        <div class="form_container">
            <h3>Add more tasks!</h3><br>
            <form action="insert.php" method="post">
                <p>Task:</p>
                <input type="text" name="task" placeholder="Enter task need to do here." required><br><br>   
                <p>Type:</p>
                <select name="category">
                    <option value="work">Work</option>
                    <option value="study">Study</option>
                    <option value="personal">Personal</option>
                    <option value="other">Other</option>    
                </select><br><br>
                <p>Status:</p>
                <select name="status">
                    <option value="Pending">Pending</option>
                    <option value="Completing">Completing</option>
                    <option value="Completed">Completed</option>
                </select><br><br>
                <p>Due date:</p>
                <input type="date" name="date">
                <br><br>
                <p></p>
                <button type="submit">
                    Submit
                </button>
            </form>
        </div>
    </div>

    <?php
        $host     = 'localhost';
        $db_name  = 'smart-task-categorizer-db';
        $username = 'root';
        $password = '';

        $link = mysqli_connect($host, $username, $password, $db_name);

        $query5 = "SELECT * FROM tasks ORDER BY Due_date ASC";
        $result = mysqli_query($link, $query5);
    ?>
        <table id='tasks_table' border="1" cellpadding="10" style="border-collapse: collapse"; >
            <tr>
                <th>Task Name</th>
                <th>Due Date</th>
                <th>Category</th>
                <th>Status</th>
            </tr>
            <!-- Loop through every row in the database -->
    <?php  
        $i = 0;      
        while ($row = mysqli_fetch_assoc($result)) {
            $id = 0;
            echo "<tr>
                <td>{$row['Name']}</td>
                <td>{$row['Due_date']}</td>
                <td>{$row['Category']}</td>
                <td>
                    <form method='post' action='update.php' style='display: inline;'>
                        <input type='hidden' name='record_id' value='{$row['id']}'>
                            <select name='updating_status'>
                                <option value='Pending'>Pending</option>
                                <option value='Completing'>Completing</option>
                                <option value='Completed'>Completed</option>
                            </select>
                    
                </td>
            </tr>
             ";
        }
    ?>
        </table>
            <br>
            <button type='submit' id='update_btn'>Update</button>
        </form>

</body>
</html>