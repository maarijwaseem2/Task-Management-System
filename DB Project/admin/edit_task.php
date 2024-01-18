<?php
    include('../connection.php');
    if(isset($_POST['edit_task'])){
        $query = "update tasks set uid = $_POST[id],description = '$_POST[description]',
        start_date='$_POST[start_date]',end_date='$_POST[end_date]' where tid=$_GET[id]";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
            echo "<script type='text/javascript'>
            alert('Task Update Successfully...');
            window.location.href = 'admin_dashboard.php';
            </script>
            ";
        }
        else{
            echo "<script type='text/javascript'>
            alert('Error...Please try again.');
            window.location.href = 'admin_dashboard.php';
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
    <title>Edit Task</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: blueviolet;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        .navbar .active {
            font-size: 50px;
            font-weight: 700;
        }

.navbar .active small {
    margin:0;
    padding:0;
    font-size: 40px;
    color: white;
}

        select,
        textarea,
        input {
            font-size:18px;
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        h3{
            font-size:35px;
            color:white;
            margin-bottom:0px;
            text-align:center;
        }
        input[type="submit"] {
            background-color: #ffa500;
            font-size:18px;
            color: #fff;
            cursor: pointer;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
        }

        button{
            margin-bottom:10px;
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

        input[type="submit"]:hover {
            background-color: #e69500;
        }

        @media (max-width: 768px) {
            form {
                width: 80%;
            }
        }
    </style>
</head>
<body>
    <div>
        <div class="navbar">
        <center><div class="active">T<small>ask</small> M<small>anagment</small> S<small>ystem</small></div></center>
        </div>
        <div><br><br>
            <h3 >Edit the Task</h3>
            <?php
                $query = "select * from tasks where tid = $_GET[id]";
                $query_run = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($query_run)){
            ?>
            <form action="" method="post">
            <div>
        <input type="hidden" name="id" class="form-control" value="<?php echo $row['tid'];?>" required>
    </div>
    <div>
        <label>Select User:</label>
        <select name="uid" required>
            <option>-Select-</option>
            <?php
            include("../connection.php");
            $query1 = "select uid,name from users";
            $query_run1 = mysqli_query($connection, $query1);
            if (mysqli_num_rows($query_run1)) {
                while ($row1 = mysqli_fetch_assoc($query_run1)) {
            ?>
                    <option value="<?php echo $row1['uid']; ?>">
                        <?php echo $row1['name']; ?>
                    </option>
            <?php
                }
            }
            ?>
        </select>
    </div>
    <div>
        <label>Description:</label>
        <textarea name="description" cols="50" rows="3" required><?php echo $row['description']; ?></textarea>
    </div>
    <div>
        <label>Start Date:</label>
        <input type="date" name="start_date" value="<?php echo $row['start_date']; ?>" required>
    </div>
    <div>
        <label>End Date:</label>
        <input type="date" name="end_date" value="<?php echo $row['end_date']; ?>" required>
    </div><br>
    <input type="submit" class="btn btn-warning" name="edit_task" value="Update">
</form>
<center><button><a href="admin_dashboard.php">Go To Admin Dashboard</a></button></center>
            <?php
                }
            ?>
    </div>
    </div>
</body>
</html>