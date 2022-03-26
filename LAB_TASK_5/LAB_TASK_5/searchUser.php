
<!DOCTYPE html>
<html>
  <body>
<?php 
    include "nav.php";

?>
    <!-- [SEARCH FORM] -->
    <form class="container" method="post" action="controller/findUser.php">
      <h1>SEARCH FOR USERS</h1>
      <input class="form-control" type="text" name="name" />
      <input class= "btn btn-info" type="submit" name="findUser" value="Search"/>
    </form>


 
  </body>
</html>