<!DOCTYPE html>  
 <html>  
      <head>  
        <title></title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
      </head>  
      <body>  
        <div class="container" style="width:500px;">              
                <div class="table-responsive"> 
                     <table class="table table-bordered">  
                          <tr>  
                               <th>Name</th> 
                               <th>E-mail</th>  
                               <th>User name</th>
                               <th>Phone</th> 
                               <th>Institution</th> 
                               <th>Subject</th>    
                               <th>Gender</th>   
                               <th>Date of Birth</th>   
                          </tr>  
                          <?php   
                          $data = file_get_contents("data.json");  
                          // echo $data;
                          $data = json_decode($data, true);  
                          foreach($data as $row)  
                          {  
                               echo '<tr>
                               <td>'.$row["name"].'</td>
                               <td>'.$row["e-mail"].'</td>
                               <td>'.$row["username"].'</td>
                               <td>'.$row["phone"].'</td>
                               <td>'.$row["institution"].'</td>
                               <td>'.$row["subject"].'</td>
                               <td>'.$row["gender"].'</td>
                               <td>'.$row["dob"].'</td>
                               </tr>';  
                          }  
                          ?>  
                     </table>  
                   </div>
                 </div>
      </body>  
 </html>  