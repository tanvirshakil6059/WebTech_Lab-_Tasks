<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <?php 
        include "nav.php";

     ?>
   

 <form class="container" action="controller/creatementor.php" method="POST" enctype="multipart/form-data">

  <label for="name">Name:</label><br>
  <input class="form-control" type="text" id="name" name="name"><br>
  <label for="phone">Phone:</label><br>
  <input class="form-control" type="text" id="phone" name="phone"><br>
  <label for="password">Password:</label><br>
  <input class="form-control" type="password" id="password" name="password"><br>
  <input class="form-control"  type="file" name="image"><br><br>
  <input class="btn btn-info" type="submit" name="creatementor" value="Create">
  <input class="btn btn-warning" type="reset"> 
</form> 

</body>
</html>

