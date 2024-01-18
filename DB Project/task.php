<?php
    session_start();
    include('connection.php');
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
            flex-direction: column;
            height: 100vh;
        }

        h3 {
            color: #333;
        }

        table {
            background-color: whitesmoke;
            width: 75vw;
            margin-top: 20px;
            border-collapse: collapse;
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

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            color: #0056b3;
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
h3{ 
    margin-top:-20vh;
    font-size:40px;
    color:white;

}
button:hover {
            background-color: #ffa500;
        }
    </style>
</head>
<body>
    <center><h3>Your tasks</h3></center>
    <table>
        <tr>
            <th>S.No</th>
            <th>Task ID</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
            $query = "select * from tasks where uid = $_SESSION[uid]";
            $sno=1;
            $query_run = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($query_run)){
                ?>
                <tr>
                    <td><?php echo $sno;?></td>
                    <td><?php echo $row['tid'];?></td>
                    <td><?php echo $row['description'];?></td>
                    <td><?php echo $row['start_date'];?></td>
                    <td><?php echo $row['end_date'];?></td>
                    <td><?php echo $row['status'];?></td>
                    <td><a href="update_status.php?id=<?php echo $row['tid'];?>">Update</a></td>
                </tr>
                <?php
                $sno=$sno+1;
            }
            ?>
    </table>
    <button><a href="user_dashboard.php">Go To Dashboard</a></button>
</body>
</html>