<?php
    include('../connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Application</title>
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

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
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

        h3{
            margin-top: -20vh;
            font-size:50px;
            color:white;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <center><h3>All leave Applications</h3></center><br>
        <table>
            <tr>
                <th>S.No</th>
                <th>User Id</th>
                <th>User Name</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php  
                $sno=1; 
                $query = "SELECT leaves.lid,users.uid, users.name, leaves.subject, leaves.message, leaves.status
                  FROM leaves
                  JOIN users ON leaves.uid = users.uid";
                $query_run = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($query_run)){
                    ?>
                        <tr>
                            <td><?php echo $sno;?></td>
                            <td><?php echo $row['uid'];?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['subject'];?></td>
                            <td><?php echo $row['message'];?></td>
                            <td><?php echo $row['status'];?></td>
                            <td><a href="approve_leave.php?id=<?php echo $row['lid'];?>">Approve</a> |
                            <a href="reject_leave.php?id=<?php echo $row['lid'];?>">Reject</a></td>
                    </tr>
                    <?php
                    $sno=$sno+1;
                }
                ?>
        </table>
        <center><button><a href="admin_dashboard.php">Go To Admin Dashboard</a></button></center>
</body>
</html>