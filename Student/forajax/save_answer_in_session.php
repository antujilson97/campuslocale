<?php  
        session_start();
        if (!$_SESSION["LoginStudent"])
        {
            header('location:../login/login.php');
        }
        if($_SESSION['LoginStudent']){
            $_SESSION['LoginAdmin'] = "";
        }
            require_once "../connection/connection.php";
            $question_number=$_GET["question_number"];
            $value1=$_GET["value1"];
            $_SESSION["answer"][$question_number]=$value1;
            
    ?>