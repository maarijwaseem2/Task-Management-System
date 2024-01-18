<?php
include('../connection.php');

if (isset($_POST['add_comment'])) {
    $commentText = mysqli_real_escape_string($connection, $_POST['comment_text']);
    $taskId = mysqli_real_escape_string($connection, $_POST['task_id']);
    // $date = NOW();
    $timestamp = time(); $date = gmdate('Y-m-d', $timestamp);
    // die(var_dump($date));
    
    $query = "INSERT INTO comments (commentTxt) VALUES ('$commentText' )";
    // var_dump($query);
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        echo "<script type='text/javascript'>
            alert('Comment Submitted Successfully...');
            window.location.href = 'admin_dashboard.php';
            </script>";
    } else {
        // die(var_dump($query));
        echo "<script type='text/javascript'>
            alert('Error...Please try again.');
            window.location.href = 'manage_task.php';
            </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            width: 75vw;
            height: 20vh;
            background-color: whitesmoke;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            font-size:18px;
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        td a{
            display:inline;
            text-decoration:none;
            color:blue;
        }
        th {
            background-color: #333;
            color: white;
        }

        h3{
            margin-top: -20vh;
            font-size:50px;
            color:white;
        }
        .comment-form {
            display: flex;
            align-items: center;
        }

        .comment-textarea {
            resize: none;
            width: 250px;
            margin-right: 10px;
            padding: 8px;
            box-sizing: border-box;
        }

        .comment-button {
            font-size:15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 4px;
        }

        .comment-button:hover {
            background-color: #45a049;
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

        button:hover {
            background-color: #45a049;
        }
    </style>
    <title>Manage task</title>
</head>
<body>
    <center><h3>All assigned Task</h3></center>
    <table >
        <tr>
            <th>S.No</th>
            <th>Task ID</th>
            <th>User Name</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Status</th>
            <th>Action</th>
            <th>Add Comment</th>
        </tr>
        <?php
            $sno = 1;
            $query = "SELECT tasks.tid, users.name, tasks.description, tasks.start_date, tasks.end_date, tasks.status
                    FROM tasks
                    JOIN users ON tasks.uid = users.uid";
            $query_run = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($query_run)) {
        ?>
        <tr>
            <td><?php echo $sno;?></td>
            <td><?php echo $row['tid'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['description'];?></td>
            <td><?php echo $row['start_date'];?></td>
            <td><?php echo $row['end_date'];?></td>
            <td><?php echo $row['status'];?></td>
            <td>
                <a href="edit_task.php?id=<?php echo $row['tid'];?>">Edit</a> | 
                <a href="delete_task.php?id=<?php echo $row['tid'];?>">Delete</a>
            </td>
            <td>
                <form class="comment-form" action="" method="post">
                    <textarea class="comment-textarea" name="comment_text" cols="30" rows="2" placeholder="Add a comment"></textarea><br>
                    <input type="hidden" name="task_id" value="<?php echo $row['tid']; ?>">
                    <input type="submit" name="add_comment" value="Add Comment" class="comment-button">
                </form>
            </td>
        </tr>
        <?php
                $sno = $sno + 1;
            }
        ?>
    </table>
    <center><button><a href="admin_dashboard.php">Go To Admin Dashboard</a></button></center>
</body>
</html>
