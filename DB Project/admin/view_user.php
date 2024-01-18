<?php
    include('../connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: blueviolet;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }

        table {
            width: 80vw;
            background-color: #fff;
            border-collapse: collapse;
            margin-top: 20px;
        }

        button{
            margin-top:20px;
            width:300px;
            background-color: #4CAF59;
            font-size:18px;
            color: #fff;
            cursor: pointer;
            border: none;
            padding: 12px 15px;
            border-radius: 4px;
        }
        button a{
            color:white;
            text-decoration:none;
        }
        center h3{
            margin-top: -18vh;
            font-size:50px;
            color:white;
        }
        button:hover {
            background-color: #45a049;
        }
        th, td {
            font-size: 18px;
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: white;
        }

        h3 {
            font-size: 24px;
            color: #333;
        }
    </style>
</head>
<body>
<center><h3>View All Users</h3></center><br>
        <table>
            <tr>
                <th>S.No</th>
                <th>User ID</th>
                <th>USer Name</th>
                <th>No. of Tasks Assigned</th>
                <th>No. of Leaves Applied</th>
            </tr>

            <?php  
                $sno=1; 
                $query = "SELECT users.uid, users.name FROM users";
                $query_run = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($query_run)){
                    $uid = $row['uid'];
                    $name = $row['name'];
                    $task_count_query = "SELECT get_task_count($uid) AS task_count";
                    $leave_count_query = "SELECT get_leave_count($uid) AS leave_count";
                    $task_result = mysqli_query($connection, $task_count_query);
                    $leave_result = mysqli_query($connection, $leave_count_query);
                    $task_row = mysqli_fetch_assoc($task_result);
                    $leave_row = mysqli_fetch_assoc($leave_result);
                    $task_count = $task_row['task_count'];
                    $leave_count = $leave_row['leave_count'];
                    ?>
                    <tr>
                        <td><?php echo $sno; ?></td>
                        <td><?php echo $uid; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $task_count; ?></td>
                        <td><?php echo $leave_count; ?></td>
                    </tr>
                    <?php
                    $sno=$sno+1;
                }
                ?>
                </table>
                <center><button><a href="admin_dashboard.php">Go To Dashboard</a></button></center>
                
</body>
</html>