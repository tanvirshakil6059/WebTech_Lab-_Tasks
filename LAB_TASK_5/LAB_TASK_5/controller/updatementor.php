<?php  
require_once '../model/model.php';


if (isset($_POST['updatementor'])) {
	$data['Name'] = $_POST['name'];
	$data['Phone'] = $_POST['phone'];
	//$data['username'] = $_POST['username'];
	 $data['Password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, ["cost" => 12]);;
	$data['Image'] = basename($_FILES["image"]["name"]);

	$target_dir = "../uploads/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);


  if (updatementor($_POST['id'], $data)) {
  	echo 'Successfully updated!!';
  	//redirect to showStudent
  	header('Location: ../showmentor.php?id=' . $_POST["id"]);
  }
} else {
	echo 'You are not allowed to access this page.';
}


?>