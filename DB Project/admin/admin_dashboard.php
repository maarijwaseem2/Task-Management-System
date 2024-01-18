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
            window.location.href = 'admin_dashboard.php';
            </script>
            ";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
    background-image: url("../bg.jpeg");
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
<body>
    <div class="home">
        <div class="navbar" id="myNavbar">
            <div class="active">T<small>ask</small> M<small>anagment</small> S<small>ystem</small></div>
            <div class="name-show">
                <span><b>Email: </b><?php echo $_SESSION['email'];?></span>
                <span><b>Name: </b><?php echo $_SESSION['name'];?></span>
            </div>
        </div>
        <div>
            <table class="table">
                <tr>
                    <td class="tr"><a href="admin_dashboard.php" type="button" >Admin Dashboard</a></td>
                    <td class="tr"><a href="view_user.php" type="button" >View Users</a></td>
                    <td class="tr"><a href="create_task.php" type="button">Create task</a></td>
                    <td class="tr"><a href="manage_task.php" type="button">Manage task</a></td>
                    <td class="tr"><a href="view_leave.php" type="button">Leave applications</a></td>
                    <td class="tr"><a href="../logout.php" type="button">Logout</a></td>
                </tr>
            </table>
        </div>
    </div>
    </div>
    <!-- <script>
        // View Users
        document.addEventListener("DOMContentLoaded", function () {
        var createTaskButton = document.getElementById("view_user");

        createTaskButton.addEventListener("click", function () {
            var rightSidebar = document.getElementById("right_sidebar");

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    rightSidebar.innerHTML = xhr.responseText;
                }
            };
            xhr.open("GET", "view_user.php", true);
            xhr.send();
        });
    });

        // Create Task
    document.addEventListener("DOMContentLoaded", function () {
        var createTaskButton = document.getElementById("create_task");

        createTaskButton.addEventListener("click", function () {
            var rightSidebar = document.getElementById("right_sidebar");

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    rightSidebar.innerHTML = xhr.responseText;
                }
            };
            xhr.open("GET", "create_task.php", true);
            xhr.send();
        });
    });

    // Manage Task
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
            xhr.open("GET", "manage_task.php", true);
            xhr.send();
        });
    });
    // Leave View
    document.addEventListener("DOMContentLoaded", function () {
        var createTaskButton = document.getElementById("view_leave");

        createTaskButton.addEventListener("click", function () {
            var rightSidebar = document.getElementById("right_sidebar");

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    rightSidebar.innerHTML = xhr.responseText;
                }
            };
            xhr.open("GET", "view_leave.php", true);
            xhr.send();
        });
    });
</script> -->

</body>
</html>