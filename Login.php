<?php
    
    
    
    $name = $pass = "";
    $nameErr = $passErr = "";

   /* if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["user"])) {
          $nameErr = "Username is required";
        }
        else {
            $name = test_input($_POST["user"]);
            if(!preg_match('/^\w{2,}$/', $name)) {
              $nameErr = "Invalid Username";
              $name = "";
            }
        }

        if (empty($_POST["pass"])) {
            $passErr = "Password is required";
          }
          else {
              $pass = test_input($_POST["pass"]);
              if(!preg_match('/^(?=.{8,})(?=.*[a-zA-Z])(?=.*[@#$%^&+=]).*$/', $pass)) {
                $passErr = "Invalid Password";
                $pass = "";
              }
          }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }*/
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
	
	

	
  <?php 
  
  if(isset($_POST["submit"])){
   
    $data = file_get_contents("data.json");  
    // echo $data;
    $data = json_decode($data, true);  
    $islogin=false;
    foreach($data as $row)  
    {  
      if($_POST['user']===$row["username"] && $_POST['pass']===$row["pass"] )  
        {
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


  <div class="container" style="width:500px;">
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
User Name:    
<input type="text" name="user" class="form-control" id="user" value="<?php echo $name;?>"> <span class="error"> <?php echo $nameErr;?></span> <br>
Password:    
<input type="password" name="pass" class="form-control" id="pass" value="<?php echo $pass;?>"> <span class="error"> <?php echo $passErr;?></span> <br>

<input type="checkbox" id="rp"  name="rp" value="rp">
<label for="rp">Remember Me</label><br>


<input type="submit" name="submit" class="btn btn-info" > 
<a href="http://localhost/dashboard/WEB%20TECHNOLOGIES/LAB_TASK_4/ForgetPass.php">Froget Password?</a> 
</form>
    </div>

<?php 
		include 'footer.php';
		

	 ?>

</body>
</html>