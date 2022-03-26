<?php  
require_once 'controller/mentorInfo.php';

$mentors = fetchAllmentors();


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
	<thead>
		<tr>
			<th>User_ID</th>
			<th>Name</th>
			<th>Phone</th>
			
			<th>Image</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($mentors as $i => $mentor): ?>
			<tr>
				<td><a href="showmentor.php?id=<?php echo $mentor['User_ID'] ?>"><?php echo $mentor['User_ID'] ?></a></td>
				<td><?php echo $mentor['Name'] ?></td>
				<td><?php echo $mentor['Phone'] ?></td>
				<!--<td><?php echo $mentor['Password'] ?></td>-->
				<td><img width="100px" src="uploads/<?php echo $mentor['Image'] ?>" alt="<?php echo $mentor['Name'] ?>"></td>
				<td><a href="editmentor.php?id=<?php echo $mentor['User_ID'] ?>">Edit</a>&nbsp<a href="controller/deletementor.php?id=<?php echo $mentor['User_ID'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>
</div>


</body>
</html>