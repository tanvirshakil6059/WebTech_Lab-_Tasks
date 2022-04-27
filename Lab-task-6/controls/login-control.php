<?php 
        require("../models/data-model.php");
        session_start();

        
        $_SESSION["username"] = "";
        $_SESSION["auth-msg"] = "";

        if(isset($_POST['log'])){
            $username = $_POST['username'];
            $password =  $_POST['password'];
            
            $data = showUser($username, $password);

            if($data != NULL){
                $_SESSION["username"] = $data["username"];
                header("location: ../views/dashboard.php");
            }

        }
    ?>