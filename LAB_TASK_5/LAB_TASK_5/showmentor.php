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

<div class="container">
<table class="table table-hover" >
	<tr>
		<th>Name</th>
		
		<th>Phone</th>
		<th>Password</th>
		<th>Image</th>
	</tr>
	<tr>
		<td><a href="editmentor.php?id=<?php echo $mentor['User_ID'] ?>"><?php echo $mentor['Name'] ?></a></td>
		<td><?php echo $mentor['Phone'] ?></td>
		
		<td><?php echo $mentor['Password'] ?></td>
		<td><img width="100px" src="uploads/<?php echo $mentor['Image'] ?>" alt="<?php echo $mentor['Name'] ?>"></td>
	</tr>

</table>
</div>

</body>
</html>