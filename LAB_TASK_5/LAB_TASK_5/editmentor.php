<?php 

require_once 'controller/mentorInfo.php';
$mentor = fetchmentor($_GET['id']);


 include "nav.php";



 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

 <form class="container" action="controller/updatementor.php" method="POST" enctype="multipart/form-data">
  <label for="name">Name:</label><br>
  <input class="form-control" value="<?php echo $mentor['Name'] ?>" type="text" id="name" name="name"><br>
  <label for="phone">Phone:</label><br>
  <input class="form-control" value="<?php echo $mentor['Phone'] ?>" type="text" id="phone" name="phone"><br>
  <label for="password">Password:</label><br>
  <input class="form-control" type="text" id="password" name="password"><br>
  <input class="form-control" type="file" name="image"><br><br>
  <input  type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
  <input class="btn btn-info" type="submit" name = "updatementor" value="Update">
  <input class="btn btn-warning" type="reset"> 
</form> 

</body>
</html>

