<?php
    $currPass = "abc@1234";
    $oldpass = $newpass = $repass = "";
    $oldpassErr = $newpassErr = $repassErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["oldpass"])) {
            $oldpassErr = "Password is required";
          }
          else {
              $oldpass = test_input($_POST["oldpass"]);
              if(!preg_match('/^(?=.{8,})(?=.*[a-zA-Z])(?=.*[@#$%^&+=]).*$/', $oldpass)) {
                $oldpassErr = "Invalid Password";
                $oldpass = "";
              }
          }

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
          if($oldpass != $currPass)
          {
            $oldpassErr = "Wrong old password";
          }
          
          if($oldpass == $newpass){
            $newpassErr = "New Password should not be same as the Current Password";
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    Current Password:  
    <input type="password" name="oldpass" id="oldpass" value="<?php echo $oldpass;?>"> <span class="error"> <?php echo $oldpassErr;?></span> <br>
    New Password:
    <input type="password" name="newpass" id="newpass" value="<?php echo $newpass;?>"> <span class="error"> <?php echo $newpassErr;?></span> <br>
    Retype New Password:
    <input type="password" name="repass" id="repass" value="<?php echo $repass;?>"> <span class="error"> <?php echo $repassErr;?></span> <br>
    <input type="submit">
</form>

</body>
</html>