<?php
    session_start();
    include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Status</title>
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
            margin-top:-10vh;
            font-size:50px;
            color: white;
        }

        table {
            width: 75%;
            background-color: #fff;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
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
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <center><h3>Your Leave Applications</h3></center><br>
    <table>
        <tr>
            <th>S.No</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Status</th>
        </tr>
        <?php
            $sno=1;
            $query = "select * from leaves where uid = $_SESSION[uid]";
            $query_run = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($query_run)){
                ?>
                <tr>
                    <td><?php echo $sno; ?></td>
                    <td><?php echo $row['subject'];?></td>
                    <td><?php echo $row['message'];?></td>
                    <td><?php echo $row['status'];?></td>
                </tr>
                <?php
                $sno=$sno+1;
            }
            ?>
    </table>
    <center><button><a href="user_dashboard.php">Go To Dashboard</a></button></center>
</body>
</html>