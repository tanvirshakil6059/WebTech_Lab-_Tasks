
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		table,td,th{
			border:1px solid black;
		}
	</style>
</head>
<body>

<?php 
    include "nav.php";

?>

<div class="container">
<table class="table table-hover" >
	<thead>
		<tr>
			<th>User_ID</th>
			<th>Name</th>
			<th>Image</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($allSearchedUsers as $i => $user): ?>
			<tr>
				<td><a href="../showmentor.php?id=<?php echo $user['User_ID'] ?>"><?php echo $user['User_ID'] ?></a></td>
				<td><?php echo $user['Name'] ?></td>
				<td><img width="100px" src="uploads/<?php echo $user['Image'] ?>" alt="<?php echo $user['Name'] ?>"></td>
				<td><a href="../editmentor.php?id=<?php echo $user['User_ID'] ?>">Edit</a>&nbsp<a href="deletementor.php?id=<?php echo $user['User_ID'] ?>">Delete</a></td>
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>
		</div>

</body>
</html>