<?php  
 $message = '';  
 $error = '';  
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["name"]))  
      {  
           $error = "<label class='text-danger'>Enter Name</label>";  
      }
      else if(empty($_POST["email"]))  
      {  
           $error = "<label class='text-danger'>Enter an e-mail</label>";  
      }  
      else if(empty($_POST["un"]))  
      {  
           $error = "<label class='text-danger'>Enter a username</label>";  
      }  
      else if(empty($_POST["phone"]))  
      {  
           $error = "<label class='text-danger'>Enter a Phone</label>";  
      } 
      else if(empty($_POST["institution"]))  
      {  
           $error = "<label class='text-danger'>Enter a Institution</label>";  
      } 
      else if(empty($_POST["subject"]))  
      {  
           $error = "<label class='text-danger'>Enter a Subject</label>";  
      } 
      else if(empty($_POST["pass"]))  
      {  
           $error = "<label class='text-danger'>Enter a Password</label>";  
      }
      else if(empty($_POST["Cpass"]))  
      {  
           $error = "<label class='text-danger'>Confirm Password field cannot be empty</label>";  
      } 
      else if(empty($_POST["gender"]))  
      {  
           $error = "<label class='text-danger'>Gender cannot be empty</label>";  
      } 
       
      else  
      {  
           if(file_exists('data.json'))  
           {  
                $current_data = file_get_contents('data.json');  
                // echo "old data: <br>". $current_data."<br>";
                $array_data = json_decode($current_data, true);  
                $new_data = array(  
                     'name'               =>     $_POST['name'],  
                     'e-mail'          =>     $_POST["email"],  
                     'username'     =>     $_POST["un"], 
                     'phone'     =>     $_POST["phone"],  
                     'institution'     =>     $_POST["institution"],
                     'subject'     =>     $_POST["subject"],
                     'gender'     =>     $_POST["gender"],  
                     'dob'     =>     $_POST["dob"] , 
                     'Cpass'     =>     $_POST["pass"] 
                );  

                // echo "new data:";
                // echo json_encode($new_data);
                $array_data[] = $new_data;  
                $final_data = json_encode($array_data);  

                // echo "final data: <br>". $final_data."<br>";
                if(file_put_contents('data.json', $final_data))  
                {  
                     $message = "<label class='text-success'>File Appended Success fully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title></title>  
           
           <link rel="stylesheet" href="style.css">
           
      </head>  
      <body> 
           
      <?php 
		include 'navbar.php';
		
	 ?>
           <br />  
           <div class="container" style="width:500px;">  
                <h3 align=""></h3><br />                 
                <form method="post">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br />  
                     <label>Name</label>  
                     <input type="text" name="name" class="form-control" /><br />  
                     <label>E-mail</label>
                     <input type="text" name = "email" class="form-control" /><br />
                     <label>User Name</label>
                     <input type="text" name = "un" class="form-control" /><br />
                     <label>Phone</label>
                     <input type="text" name = "phone" class="form-control" /><br />
                     <label>Institution</label>
                     <input type="text" name = "institution" class="form-control" /><br />
                     <label>Subject</label>
                     <input type="subject" name = "subject" class="form-control" /><br />
                     <label>Password</label>
                     <input type="password" name = "pass" class="form-control" /><br />
                     <label>Confirm Password</label>
                     <input type="password" name = "Cpass" class="form-control" /><br />

                    <fieldset>
                    <legend>Gender</legend>
                    <input type="radio" id="male" name="gender" value="male">
                     <label for="male">Male</label>                     
                     <input type="radio" id="female" name="gender" value="female">
                     <label for="female">Female</label>
                     <input type="radio" id="other" name="gender" value="other">
                     <label for="other">Other</label><br>

                     <legend>Date of Birth:</legend>
                     <input type="date" name="dob"> <br><br>
                    </fieldset> 
                     
                     <input type="submit" name="submit" value="Submit" class="btn btn-info" /><br />                      
                     <?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?>  
                </form>  
           </div> 
           
           <?php 
		include 'footer.php';
		

	 ?>
           <br />  
      </body>  
 </html>  