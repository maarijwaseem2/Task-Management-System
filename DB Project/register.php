<?php
    include("connection.php");
    if(isset($_POST['userRegistration'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $mobile = $_POST['mobile'];
        $user_id = null; // Set initial value to null
        $query = "CALL insert_user(@user_id, '$name', '$email', '$password', $mobile)";
        // $query = "insert into users values(null,'$_POST[name]','$_POST[email]','$_POST[password]',$_POST[mobile])";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
            echo "<script type='text/javascript'>
            alert('User Registered Successfully...');
            window.location.href = 'index.php';
            </script>
            ";
        }
        else{
            echo "<script type='text/javascript'> 
            alert('Error Please try Again');
            window.location.href = 'register.php';
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
    <title>Register</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing:border-box;
            font-family: Arial, sans-serif;
}
.form {
    display: flex;
    align-items: center;
    height: 98vh;
    border: 5px solid blueviolet;
    background: linear-gradient(blueviolet, white);
}
.form .img {
    width: 50%;
    height: 100%;
}
.form .img img {
    width: 100%;
    height: 100%;
}

.form .login {
    width: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 20px;
    border-left: 5px solid blueviolet;
    height: 100%;
}
.password-container,
.container {
    position: relative;
  }

  .password-container p,
.container p {
    position: absolute;
    top: -25px;
    left: 10px;
background-color: white;
padding: 1px 5px;
color: black;
}

  input {
    width: 300px;
    padding: 13px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: 1px solid blueviolet;
  }

  h1 {
    font-size: 50px;
  }

  .heading {
    font-weight:900;
    font-size:30px;
    color: white;
  }

  button {
    font-size:17px;
    width: 300px;
    padding: 14px 16px;
    background-color: blueviolet;
    border: none;
    outline: none;
    color: white;
    border-radius: 50px;
    transition: .2s ease;
  }
.close a{
    text-decoration: none;
    font-size:17px;
    width: 200px;
    padding: 12px 16px;
    background-color: white;
    border: none;
    outline: none;
    color: blueviolet;
    border-radius: 50px;
    transition: .2s ease;
}
.close a:hover {
    border: 2px solid blueviolet;
    background-color: transparent;
    color: blueviolet;
  }
  button:hover {
    border: 2px solid blueviolet;
    background-color: transparent;
    color: blueviolet;
  }

  #togglePassword {
    position: absolute;
    right: 10px;
    top: 40%;
    transform: translateY(-50%);
    cursor: pointer;
  }
    </style>
</head>
<body>
<div class="form">
<div class="img">
            <img src="./bg.jpg" alt="">
        </div>
        <div class="login">
            <h1>User Registration</h1>
            <p class="heading">Welcome back on task management website</p>
            <form action="register.php" method="post">
                <div class="container">
                    <p>Enter Your Full Name</p>
                    <input type="text" name="name" required>
                </div><br>
                <div class="container">
                    <p>Enter Your Email</p>
                    <input type="email" name="email" required>
                </div><br>
                <div class="password-container">
                    <p>Enter Your password</p>
                    <input type="password" id="password" type="password" name="password">
                    <span id="togglePassword" onclick="togglePasswordVisibility()">👁️</span>
                </div><br>
                <div class="container">
                    <p>Enter Your Mobile Number</p>
                    <input type="number" name="mobile" required>
                </div>
                <button type="submit" name="userRegistration">Register</button>
            </form>
            <div class="close"><a href="index.php">go to home</a></div>
    </div>
    </div>
    <script>
        function togglePasswordVisibility() {
          var passwordField = document.getElementById("password");
          var toggleButton = document.getElementById("togglePassword");
      
          if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleButton.textContent = "👁️";
          } else {
            passwordField.type = "password";
            toggleButton.textContent = "👁️";
          }
        }
      </script>
</body>
</html> 