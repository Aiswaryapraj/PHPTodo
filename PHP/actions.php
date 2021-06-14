<?php

    include_once 'config.php';

    if(isset($_POST['create'])){
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];

        if($password1!=$password2){
            echo"<script type='text/javascript'>alert('Passwords Doesnt Match');window.location.href='http://localhost/todo-php1/PHP/signup.php';</script>";
            //echo "<script>alert('Passwords Doesnt Match');</script>";  
        }

        $userexistornot = "SELECT * FROM users WHERE username='$username' LIMIT 1";
        $userexistresult = $con->query($userexistornot);
        $row=$userexistresult->fetch_array();
        //echo $row['username'];
        
        if($row['username'] == $username){
            //echo "<script>alert('msg');</script>";  
            echo"<script type='text/javascript'>alert('Username already exist please try again with another username');window.location.href='https://todo-php1.herokuapp.com/PHP/signup.php';</script>";  
        }else{
            $query = "INSERT INTO users(fullname,username,password) VALUES ('$fullname','$username','$password1')";
            $result = $con->query($query);
            $con->close;
            header('location:https://todo-php1.herokuapp.com/index.php');
        }
    }
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $con->query($sql);
        $row=$result->fetch_array();
        //var_dump($row);
    
        if($row==null){
            //echo "<script>alert('msg');</script>"; 
            echo"<script type='text/javascript'>alert('Username Or Password Error');window.location.href='https://todo-php1.herokuapp.com/PHP/login.php';</script>";
        }else{
            session_start();
            $_SESSION['userid'] = $row['id'];
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location:home.php');
            //echo"<script type='text/javascript'>alert('Username Or Password Error');window.location.href='http://localhost/todo-php1/PHP/login.php';</script>";  
        }
    }

?>
