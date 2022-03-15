<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.error{
			color: red;
		}
	</style>
</head>
<body>
<?php
	
    $nameErr = $emailErr =$dateErr  =$genderErr = $degreeErr = $bloodgroupErr= "";
    $name = $email =$date =$gender = $degree = $bloodgroup= "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  if (empty($_POST["name"])) {
	    $nameErr = "Name is required";
	  } else {
	    $name = test_input($_POST["name"]);
		if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
		  $nameErr = "Only letters and white space allowed";
		  $name = "";
		}
	  }

	  if (empty($_POST["email"])) {
	    $emailErr = "Email is required";
	  } else {
	    $email = test_input($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $emailErr = "Invalid email format";
		  $email="";
		}
	  }

    //   if (empty($_POST["date"])) {
	//     $dateErr = "date is required";
	//   } else {
	//     $date = test_input($_POST["date"]);
	// 	if (!filter_var($date, FILTER_VALIDATE_DATE)) {
	// 	  $dateErr = "Invalid date format";
	// 	  $date="";
	// 	}
	//   }

	  

	  if (empty($_POST["gender"])) {
	    $genderErr = "Gender is required";
	  } else {
	    $gender = test_input($_POST["gender"]);
	  }
	}
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	 ?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

        Name:
         <input type="text" name="name" value="<?php echo $name;?>">
		<span class="error">* <?php echo $nameErr;?></span>
		<br><br>
		
        E-mail:
		<input type="text" name="email" value="<?php echo $email;?>">
		<span class="error">* <?php echo $emailErr;?></span>
		<br><br>

        Date of Birth:
        <input type="date" name="day" value="<?php echo $date;?>">
        <span class="error">* <?php echo $dateErr;?></span>
       
        

        <br><br>


        Gender:
		<input type="radio" name="gender"
		<?php if (isset($gender) && $gender=="female") echo "checked";?>
		value="female">Female
		<input type="radio" name="gender"
		<?php if (isset($gender) && $gender=="male") echo "checked";?>
		value="male">Male
		<input type="radio" name="gender"
		<?php if (isset($gender) && $gender=="other") echo "checked";?>
		value="other">Other
		<span class="error">* <?php echo $genderErr;?></span>
		<br><br>

Degree:
<input type="checkbox" id="ssc" name="ssc" value="ssc">
<label for="ssc"> SSC </label>

<input type="checkbox" id="hsc" name="hsc" value="hsc">
<label for="hsc"> HSC </label>

<input type="checkbox" id="bsc" name="bsc" value="bsc">
<label for="bsc">BSc</label>
<input type="checkbox" id="msc" name="msc" value="msc">
<label for="msc">MSc</label><br><br><br>

Blood Group:
  <label for="blood Group"></label>
<select name="bloodgroup" id="bloodgroup">
	<option value="">--- Choose a Blood Group ---</option>
	<option value="a+">A+</option>
	<option value="a-">A-</option>
	<option value="b+">B+</option>
    <option value="o+">O+</option>
    <option value="ab+">AB+</option>
    <option value="ab-">AB-</option>
    <option value="o">O-</option>
    
</select>
  <br>
  
  <input type="submit" name="submit" value="Submit">
	</form>


</form>

<h2>Your input</h2>
	<?php 
			echo $name."<br>";
			echo $email."<br>";
			echo $date."<br>";
		    echo $gender."<br>";
            echo $degree."<br>";
            echo $bloodgroup."<br>";
	 ?>

	
</body>
</html>