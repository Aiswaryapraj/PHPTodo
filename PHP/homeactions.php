<?php
    session_start();
    include'config.php';
    $task = "";
    $numoftask = 0;
    $numoftasktodo = "0";
    $numofcompletedtask = "0";
    $sessionid =$_SESSION['userid'];
    $update = false;
    $sql = "SELECT * FROM users WHERE id = '$sessionid'";
    $result = $con->query($sql);
    $row=$result->fetch_array();
    $fullname = $row['fullname'];

    $sqlview = "SELECT * FROM todo WHERE deleted='0' AND completed='0' AND user_id='$sessionid'";
    $resultview = $con->query($sqlview);


    /* completed tasks */

    $sqlviewcompleted = "SELECT * FROM todo WHERE completed='1' AND user_id='$sessionid'";
    $resultviewcompleted = $con->query($sqlviewcompleted);


    /* GET THE NUMBER OF TODO TASK*/
    $sqltnoftask = "SELECT COUNT(*) FROM todo WHERE user_id='$sessionid'";
    $resulttnoftask = $con->query($sqltnoftask);
    $totaltask = $resulttnoftask->fetch_row();
    $numoftask = $totaltask[0];


    /* COMPLETED TASK */

    $sqlcompletedtask = "SELECT COUNT(*) FROM todo WHERE user_id = '$sessionid' AND completed='1'";
    $resultcompletedtask = $con->query($sqlcompletedtask);
    $totalcompletedtask = $resultcompletedtask->fetch_row();
    $numofcompletedtask = $totalcompletedtask[0];
    
    /* Num Of Items To Do*/
    $sqlnitdo = "SELECT COUNT(*) FROM todo WHERE completed='0' AND user_id='$sessionid'";
    $resultnitdo = $con->query($sqlnitdo);
    $totalnitdo = $resultnitdo->fetch_row();
    $numoftasktodo = $totalnitdo[0];

    /* ADD TASK TO DB*/

    if(isset($_POST['addtask'])){
        $task = $_POST['task'];

        $sql = "INSERT INTO todo(todo,deleted,completed,user_id) VALUES('$task','0','0','$sessionid')";
        $result = $con->query($sql);

        $_SESSION['message'] = "Your Task Has Been Added..!!";
        $_SESSION['message_type'] = "success";
        $con->close;
        header('location:home.php');
    }

    /* DELETE TASK FROM DB*/

    if(isset($_GET['delete'])){
        $id=$_GET['delete'];
        $sql = "UPDATE todo SET deleted = '2' WHERE todo_id='$id'";
        $result = $con->query($sql);
        $sql = "DELETE * FROM todo WHERE todo_id ='$id'";
        $result = $con->query($sql);
        $_SESION['message']="Record Deleted";
        $_SESSION['message_type'] ="danger";
        header('location:https://todo-php1.herokuapp.com/PHP/home.php');
        $con->close();
    }

    /* UPDATE TASK AS DONE IN DB*/

    if(isset($_GET['done'])){
        $id=$_GET['done'];
        $sql = "UPDATE todo SET completed = '1' WHERE todo_id='$id'";
        $result = $con->query($sql);
        $sql = "DELETE * FROM todo WHERE todo_id ='$id'";
        $result = $con->query($sql);
        $_SESION['message']="Record Marked As Completed";
        $_SESSION['message_type'] ="success";
        header('location:https://todo-php1.herokuapp.com/PHP/home.php');
        $con->close();
    }
    
    /* GET TASK DETAILS WHICH ARE GOING TO BE UPDATED*/

    if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $sql = "SELECT * FROM todo WHERE todo_id='$id'";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        $task = $row['todo']; 
        $update = true;
    }

    /*UPDATE TASK */ 

    if(isset($_POST['updatetask'])){
        $id = $_POST['id'];
        $todo = $_POST['task'];
        $sql = "UPDATE todo set todo='$todo' WHERE todo_id='$id'";
        $result = $con->query($sql);
        $_SESSION['message']="UPDATED Record..!!";
        $_SESSION['message_type'] = "warning";
        header('location:https://todo-php1.herokuapp.com/PHP/home.php');
        $con->close();
    }

?>
