<?php

session_start();

echo $_SESSION['email']; 

    $currPass = "abc@1234";
    $newpass = $repass = "";
   $newpassErr = $repassErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        

          if (empty($_POST["newpass"])) {
            $newpassErr = "Password is required";
          }
          else {
              $newpass = test_input($_POST["newpass"]);
              if(!preg_match('/^(?=.{8,})(?=.*[a-zA-Z])(?=.*[@#$%^&+=]).*$/', $newpass)) {
                $newpassErr = "Invalid Password";
                $newpass = "";
              }
          }

          if (empty($_POST["repass"])) {
            $repassErr = "Password is required";
          }
          else {
              $repass = test_input($_POST["repass"]);
              if(!preg_match('/^(?=.{8,})(?=.*[a-zA-Z])(?=.*[@#$%^&+=]).*$/', $repass)) {
                $repassErr = "Invalid Password";
                $repass = "";
              }
          }
          
          
        

          if($newpass != $repass){
            $repassErr = "Password doesnot match";
          }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?>

<?php
  if(isset($_POST["submit"])){
   
    $data = file_get_contents("data.json");  
    // echo $data;
    $data = json_decode($data, true);  
    $islogin=false;
    foreach($data as $row)  
    {  
      if($_SESSION['email']===$row["e-mail"]  )  
        {
          $data[$row]['pass'] = "shakilpass";
          
          $newJsonString = json_encode($data);
        file_put_contents('data.json', $newJsonString);
          echo 'Success' ;
          $islogin=true;
          break;
        }
              
    } 
      if($islogin==false)
          {
          echo 'error' ;
          } 

  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php 
		include 'navbar.php';
		
	 ?>
<div class="container" style="width:500px;">   
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <!-- Current Password:  
    <input type="password" name="oldpass" class="form-control id="oldpass" value="<?php echo $oldpass;?>"> <span class="error"> <?php echo $oldpassErr;?></span> <br> -->
    New Password:
    <input type="password" name="newpass" class="form-control" id="newpass" value="<?php echo $newpass;?>"> <span class="error"> <?php echo $newpassErr;?></span> <br>
    Retype New Password:
    <input type="password" name="repass" class="form-control" id="repass" value="<?php echo $repass;?>"> <span class="error"> <?php echo $repassErr;?></span> <br>
    <input type="submit" name='submit'>
</form>
    </div>

    <?php 
		include 'footer.php';
		

	 ?>

</body>
</html>