<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Form</title>
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
            font-size:50px;

            color: white;
        }

        form {
            font-size:20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"], textarea {
            font-size:20px;
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: none;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 12px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
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
    <h3>Apply Leave</h3><br>
    <div>
        <div>
            <form action="" method="post">
                <div>
                    <input type="text" name="subject" placeholder="Enter Subject">
                </div><br>
                <div>
                    <textarea name="message" id="" cols="50" rows="3" 
                    placeholder="Type Message"></textarea>
                </div><br>
                <input type="submit" name="submit_leave">
            </form>
            <center><button><a href="user_dashboard.php">Go To Dashboard</a></button></center>
        </div>
    </div>
</body>
</html>