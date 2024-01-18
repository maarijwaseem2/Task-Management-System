<?php
    include('connection.php');
    if (isset($_POST['update'])) {
        $taskId = $_GET['id'];
        $status = $_POST['status'];
        $query = "CALL update_task_status($taskId, '$status')";
        $query_run = mysqli_query($connection, $query);
        if($query_run){
            echo "<script type='text/javascript'>
            alert('Status Update Successfully...');
            window.location.href = 'user_dashboard.php';
            </script>
            ";
        }
        else{
            echo "<script type='text/javascript'>
            alert('Error...Please try again.');
            window.location.href = 'user_dashboard.php';
            </script>
            ";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Task</title>
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

        .navbar {
            margin-top:-20vw;
            color: white;
            text-align: right;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        select {
            font-size:20px;
            width: 300px;
            padding: 12px;
            margin-bottom: 10px;
        }
h3{ margin-bottom:-8px;
    margin-top:20vh;
    font-size:40px;
    color:white;

}
.navbar .active {
    margin-top:10vw;
    color:black;
    font-size: 60px;
    font-weight: 700;
}
.navbar .active small {
    font-size: 40px;
    color: white;
}
button{
            margin-top:20px;
            width:300px;
            background-color: #e69506;
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
            background-color: #ffa500;
        }
        input[type="submit"] {
            font-size:20px;
            width:250px;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="navbar" id="myNavbar" >
    <div class="active">T<small>ask</small> M<small>anagment</small> S<small>ystem</small></div>
    </div>
    <div>
        <div><br>
            <h3>Update the Task</h3><br>
            <?php
                $query = "select * from tasks where tid = $_GET[id]";
                $query_run = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($query_run)){
            ?>
            <form action="" method="post">
                <div>
                    <input type="hidden" name="id" value="" required>
                </div>
                <div>
                    <select name="status" id="status">
                        <option value="test">-Select</option>
                        <option value="In-Progress">In-Progress</option>
                        <option value="Complete">Complete</option>
                    </select>   
                </div>    <br>
                
                <input type="submit" name="update" value="Update">
            </form>
            <button><a href="user_dashboard.php">Go To Dashboard</a></button>
            <?php
                }
            ?>
    </div>
    </div>
</body>
</html>