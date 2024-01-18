<?php
    include('../connection.php');
    $query = "delete from tasks where tid = $_GET[id]";
    $quer_run = mysqli_query($connection,$query);
    if(!$query_run){
        echo "<script type='text/javascript'>
        alert('Task deleted Successfully...');
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
?>