<?php
  session_start();

  $_SESSION['email']= ""; 

$message = '';  
$error = '';  
 if($_SERVER["REQUEST_METHOD"] == "POST") 
 {  
      
      if(empty($_POST["email"]))  
      {  
           $error = "<label class='text-danger'>Enter an e-mail</label>";  
      }  

      else
      {
        $error = "";
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
    if($_POST['email']===$row["e-mail"] )  
      {
        $_SESSION['email']=$_POST['email']; 
        $islogin=true;
        //echo 'success' ;
        header('Location: http://localhost/dashboard/WEB%20TECHNOLOGIES/LAB_TASK_4/Resetpassword.php');
        exit;
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
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  
<?php 
		include 'navbar.php';
		
	 ?>
	
	

	
  <div class="container" style="width:500px;">
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
Enter Your Email:  
<input type="email" name="email" class="form-control" id="email">  <span class="error"> <?php echo $error;?> </span> <br>

<input type="submit" name="submit" class="btn btn-info" > 

</form>
    </div>

<?php 
		include 'footer.php';
		

	 ?>

</body>
</html>