<?php
    session_start();
    include('../connection.php');
    if(isset($_POST['create_task'])){
        $query = "insert into tasks values(null,$_POST[id],'$_POST[description]','$_POST[start_date]','
            $_POST[end_date]','Not Started',null)";
        $query_run =   mysqli_query($connection,$query);
        if($query_run){
            echo "<script type='text/javascript'>
            alert('Task created Successfully...');
            window.location.href = 'admin_dashboard.php';
            </script>
            ";
        }
        else{
            echo "<script type='text/javascript'>
            alert('Error...Please try again.');
            window.location.href = 'create_task.php';
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
    <title>Document</title>
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

        input[type="submit"] {
            background-color: #4CAF50;
            font-size:18px;
            color: #fff;
            cursor: pointer;
            border: none;
            padding: 12px 15px;
            border-radius: 4px;
        }
        button{
            margin-bottom:10px;
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
        input[type="submit"]:hover {
            background-color: #45a049;
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
    <h3 style="color:white; text-align: center; font-size:50px;">Create a new Task</h3>
        <div>
            <form action="" method="post" onsubmit="return validateForm()">
                <div>
                    <label >Select User:</label>
                    <select name="id">
                        <option>-Select-</option>
                        <?php
                            include("../connection.php");
                            $query="select uid,name from users";
                            $query_run = mysqli_query($connection,$query);
                            if(mysqli_num_rows($query_run)){
                                while($row = mysqli_fetch_assoc($query_run)){
                                     ?>
                                    <option value="<?php echo $row['uid'];?>">
                                         <?php echo $row['name']; ?> 
                                    </option>
                                    <?php 
                                }
                            }
                                ?>
                        </select>
                    </div>
                <div>
                    <label>Description:</label>
                    <textarea name="description" cols="50" rows="3" 
                    placeholder="mention the task">
                </textarea>
            </div>
            <div>
                <label>Start Date:</label>
                <input type="date" name="start_date" id="start_date" required>
            </div>
            <div>
                <label>End Date:</label>
                    <input type="date" name="end_date" id="end_date" required>
                </div><br>
                <input type="submit"  name="create_task" value="Create">
            </form>
            <center><button><a href="admin_dashboard.php">Go To Admin Dashboard</a></button></center>
        </div>
    </div>
</body>
<script>
        function validateForm() {
            var startDate = document.getElementById("start_date").value;
            var endDate = document.getElementById("end_date").value;

            if (startDate >= endDate) {
                alert("End Date should be greater than Start Date");
                return false;
            }

            return true;
        }
    </script>
</html>