<?php 

    session_start();

    
    require("../models/data-model.php");
        $uname = "";
        $pass = "";
        $gender = "";

        
        $_SESSION["reg-info"] = "";
        if(isset($_POST["sub"])){
            if($_SERVER["REQUEST_METHOD"] == "POST"){

                $uname = $_POST["username"];
                $pass = $_POST["password"];
                $gender = $_POST["gender"];
                

                $data = array("username" => $username, "password"=> $password, "gender"=>$gender);

                //var_dump($data);

                if(addUser($data)){
                    $_SESSION["reg-info"] = "Submitted";
                    header("location: ../views/registration.php");
                }

            }
        }
        
    ?>