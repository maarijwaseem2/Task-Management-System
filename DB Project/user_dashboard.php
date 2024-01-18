<?php
    session_start();
    if(isset($_SESSION['email'])){
    include('connection.php');
    if(isset($_POST['submit_leave'])){
        $query = "insert into leaves values(null,$_SESSION[uid],'$_POST[subject]',
        '$_POST[message]','No Action')";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
            echo "<script type='text/javascript'>
            alert('Application Submitted Successfully...');
            window.location.href = 'user_dashboard.php';
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
    <title>User Dashboard</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing:border-box;
        }
        body {
    margin: 0;
    font-family: Arial, sans-serif;
}

.navbar {
    overflow: hidden;
    position: sticky;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 16px;
    background-color: transparent;
}

.navbar a {
  font-weight: 700;
    font-size: 18px;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    color: white;
}

.navbar a:hover {
    background-color: #ddd;
    color: black;
    border-radius: 20px;
}

.navbar .active {
    font-size: 50px;
    font-weight: 700;
}

.navbar .active small {
    font-size: 30px;
    color: blueviolet;
}

.navbar .icon {
    display: none;
}

.home {
    background-image: url("./bg.jpeg");
    background-size: cover;
    height: 100vh;
}

.home .text {
    width: 30%;
    height: calc(100vh - 60px);
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 10px;   
}

.name-show{
    display:flex;
    margin-right:10px;
    font-weight:300;
    font-size:20px;
}
.name-show b{
    margin-top:-6px;
    margin-right:5px;
    color:black;
    font-weight:900;
    font-size:23px;

}
.name-show span{
    color:white;
    display:flex;
    margin-left:50px;    
}
table .tr {
    
    padding:10px;
    border:2px solid black;
    font-size:30px;
    display:flex;
    align-items:center;
    transition: .2s ease;
    cursor: pointer;
}
table .tr a{
    display: flex;
    align-items:center;
    text-align:center;
    color:white;
    text-decoration:none;
}
table .tr:hover {
    border: 2px solid blueviolet;
    background-color: white;
    color: black;
  }
table .tr a:hover {
    background-color: white;
    color: black;
  }
table{
    text-align:center;
    display:inline-block;
    background-color: blueviolet;
}
.home .text div {
    width: 80%;
}

.home .text h1 {
    font-size: 50px;
    font-weight: 900;
}

.home .text span {
    font-weight: 300;
}

.about-sec {
    padding: 30px 0;
}

.about-sec h1 {
    text-align: center;
    margin-bottom: 20px;
}

.about-sec div {
    display: flex;
    align-items: center;
    justify-content: space-evenly;
}

.about-sec div .img {
    width: 40%;
}

.about-sec div .img img {
    width: 100%;
}

.about-sec .text {
    width: 50%;
    line-height: 20px;
    text-align: justify;
}

@media screen and (max-width: 600px) {
    .navbar a:not(:first-child) {
        display: none;
    }

    .navbar a.icon {
        float: right;
        display: block;
    }
}

@media screen and (max-width: 600px) {
    .navbar.responsive {
        position: relative;
    }

    .navbar.responsive a.icon {
        position: absolute;
        right: 0;
        top: 0;
    }

    .navbar.responsive a {
        float: none;
        display: block;
        text-align: left;
    }
}
    </style>
</head>
</head>
<body>
    <div class="home">
        <div class="navbar" id="myNavbar" >
        <div class="active">T<small>ask</small> M<small>anagment</small> S<small>ystem</small></div>
            <div class="name-show">
                <span><b>Email: </b><?php echo $_SESSION['email'];?></span>
                <span><b>Name: </b><?php echo $_SESSION['name'];?></span>
            </div>
        </div>
        <div>
            <table class="table">
                <tr>
                    <td class="tr"><a href="user_dashboard.php" type="button" id="logout_link">User Dashboard</a></td>
                    <td class="tr"><a href="task.php" type="button">Update task</a></td>
                    <td class="tr"><a href="leaveForm.php" type="button">Apply leave</a></td>
                    <td class="tr"><a href="leave_status.php" type="button">Leave status</a></td>
                    <td class="tr"><a href="logout.php" type="button"id="logout_link">Logout</a></td>
                </tr>
            </table>
        </div>
    </div>
    <!-- <script>
        document.addEventListener("DOMContentLoaded", function () {
            var createTaskButton = document.getElementById("manage_task");
            
            createTaskButton.addEventListener("click", function () {
                var rightSidebar = document.getElementById("right_sidebar");
                
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    rightSidebar.innerHTML = xhr.responseText;
                }
            };
            xhr.open("GET", "task.php", true);
            xhr.send();
        });
    });
    // Apply Leave
        document.addEventListener("DOMContentLoaded", function () {
            var createTaskButton = document.getElementById("apply_leave");
            
            createTaskButton.addEventListener("click", function () {
                var rightSidebar = document.getElementById("right_sidebar");
                
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    rightSidebar.innerHTML = xhr.responseText;
                }
            };
            xhr.open("GET", "leaveForm.php", true);
            xhr.send();
        });
    });
    // leave status 
        document.addEventListener("DOMContentLoaded", function () {
            var createTaskButton = document.getElementById("leave_status");
            
            createTaskButton.addEventListener("click", function () {
                var rightSidebar = document.getElementById("right_sidebar");
                
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    rightSidebar.innerHTML = xhr.responseText;
                }
            };
            xhr.open("GET", "leave_status.php", true);
            xhr.send();
        });
    });
    </script> -->
</body>
</html>
<?php
    }
    else{
        header('Location:user_login.php');
    }
?>