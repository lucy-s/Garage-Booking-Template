<?php

$errors = array();

include 'scripts/dbConn.php';
//actions to be performed if the register button is clicked
if(isset($_POST['Register'])){
  
    //validation check for first name, checks if its empty and only contains letters
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         if (empty($_POST['fName'])){
            $errors[fName] = "First Name is Required";
        } else {
            $fName = $_POST['fName'];
            if(!preg_match("/^[a-zA-Z ]*$/", $fName)) {
                $errors[fName] = "First name may only contain letters";
            } 
        }
        //validation check for surname, checks if its empty and only contains letters
        if (empty($_POST['sName'])){
            $errors[sName] = "Surname is Required";
        } else {
            $sName = $_POST['sName'];
            if(!preg_match("/^[a-zA-Z ]*$/", $sName)) {
                $errors[sName] = "Surname may only contain letters and spaces";
            }
        }
        //validation check for address, checks if its empty and only contains letters and numbers
         if (empty($_POST['Address'])){
            $errors[Address] = "Address field is Required";
        } else {
            $Address =  $_POST['Address'];
            if(!preg_match("/^[a-zA-Z0-9 ]*$/", $Address)) {
                $errors[Address] = "Address may only contain letters, numbers and spaces";
            }
        }
        //validation check for county, checks if its empty and only contains letters
         if (empty($_POST['County'])){
            $errors[County] = "County is Required";
        } else {
            $County =  $_POST['County'];
            if(!preg_match("/^[a-zA-Z ]*$/", $County)) {
                $errors[County] = "County may only contain letters and spaces";
            }
        }
        //validation check for postcode, checks if it only contains letters numbers and spaces
         if (!empty($_POST['Postcode'])){
          $Postcode =  $_POST['Postcode'];
             if(!preg_match("/^[a-zA-Z0-9 ]*$/", $Postcode)) {
                $errors[Postcode] = "Postcode may only contain letters, numbers and spaces";
            }    
        }
        //validation check for contact number, checks if its empty and only contains numbers
          if (empty($_POST['contactNo'])){
            $errors[contactNo] = "Contact Number is Required";
        } else {
            $contactNo =  $_POST['contactNo'];
            if(!preg_match("/^[0-9]*$/", $contactNo)) {
                $errors[contactNo] = "Contact Number may only contain numbers";
            }
        }
        //validation checkfor email, checks if its empty and is formatted correctly
           if (empty($_POST['Email'])){
            $errors[Email] = "Email is Required";
        } else {
            $Email =  $_POST['Email'];
            if(!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            $errors[Email] = "Invalid Email";
             $sql = "SELECT * FROM customer WHERE Email=?";
             $stmt = mysqli_stmt_init($conn);
             if (!mysqli_stmt_prepare($stmt, $sql) ) {
   echo "SQL statement failed";
  } else {
     mysqli_stmt_bind_param($stmt, "s" ,  $Email);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_store_result($stmt);
     if(mysqli_stmt_num_rows($stmt) > 0) {
    $errors[Email] = "Email already exists";
     }
  } 
            
             
            
         }
       }
        
        
       
     
     //validation check for password, checks if it is empty
           if (empty($_POST['Password'])){
            $errors[Password] = "Password is Required";
        } else {
            $Password = md5($_POST['Password']);//md5 uses RSA message digest algorithm to encrypt password
        } 
         
    }//end of validation
    
    

//if the errors array is empty then run the insert query, create and run the prepared statement  
if (empty($errors)) {
  $sql =  "INSERT INTO customer (fName, sName, Address, County, Postcode, contactNo, Email, Password) VALUES (?,?,?,?,?,?,?,?)";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql) ) {
   echo "SQL statement failed";
  } else {
     mysqli_stmt_bind_param($stmt, "ssssssss" , $fName, $sName, $Address, $County, $Postcode, $contactNo, $Email, $Password);
     mysqli_stmt_execute($stmt);
     echo "signed up successful";
  }

 
// Close statement
$stmt->close();
 
// Close connection
$conn->close();

}// end off insert 
} //end off registration isset   


if(isset($_POST['Login'])) {
$loginEmail =  $_POST['loginEmail'];
$loginPassword = md5($_POST['loginPassword']);
//the db should only be queried if both email and password are filled in
    if (empty($loginEmail) || empty($loginPassword)) {
        $Error = "Email and Password can't be left blank";  
    } else {   
$sql = "SELECT * FROM customer WHERE Email=? AND Password=?";
$stmt = mysqli_stmt_init($conn);
if (mysqli_stmt_prepare($stmt, $sql) ) {
   
   
     mysqli_stmt_bind_param($stmt, "ss", $loginEmail, $loginPassword);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_store_result($stmt);
     
     if (mysqli_stmt_num_rows($stmt) == 1) {
     header("Location: http://shanelucy.pcriot.com/bookingtemplate/homepage.php");
die();
     } else {
     $Error = "Username or password is incorrect";
     }
    
  }

         }
}//end of sign in isset

?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Template Booking Website">
    <meta name="author" content="Shane Lucy">
    <title>Login Or Create Account</title>

    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="scripts/custom.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head> 
    <body>
    <!--javascript sdk for facebook login-->
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.12&appId=565979043757060&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


        <div class="container">
        <div class="row">
        <h1>Insert Title Here</h1> <br><br>
        </div>
                   <!--This row contains the signup and login forms--> 
         <div class="row">
            <div class="col-sm-7">
            <div class="jumbotron">
  <h3>Create An Account</h3>
  <label>* Indicates a Required Field</label>
   <!--Post method used to prevent form data from appearing in the URL & htmlspecialchars to prevent XSS-->
              <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"> 
  <!--Form is split into rows with each row containing 2 input fields-->
      <div class="form-row">
          <div class="col">
              <div class="form-group"><label for="fName">First Name:</label>                              
     <input type="text" class="form-control" id="fName"  placeholder="Enter First Name *" name="fName" value="<?php echo $fName; ?>">         
      <span><?php echo $errors[fName];?></span>
          </div>
              </div>

    
  <div class="col">
      <div class="form-group">
    <label for="sName">Surname:</label>
    <input type="text" class="form-control" id="sName" placeholder="Enter Surname *" name="sName" value="<?php echo $sName; ?>">
          <span><?php echo $errors[sName];?></span>
  </div>
      </div>
  
      </div>
                  <div class="form-row">
                      <div class="col">
                          <div class="form-group">
    <label for="Address">Address:</label>
    <input type="text" class="form-control" id="Address"  placeholder="Enter Address *" name="Address" value="<?php echo $Address; ?>">
            <span><?php echo $errors[Address];?></span>
  </div>
      </div>
                      <div class="col"><div class="form-group">
    <label for="County">County:</label>
    <input type="text" class="form-control" id="County" placeholder="Enter County *" name="County" value="<?php echo $County; ?>">
            <span><?php echo $errors[County];?></span>   
  </div>
                      </div>
                      </div>
      
  
  
                  <div class="form-row">
                      <div class="col">
                          <div class="form-group">
    <label for="Postcode">Postcode:</label>
    <input type="text" class="form-control" id="Postcode"  placeholder="Enter Postcode" name="Postcode" value="<?php echo $Postcode; ?>">
            <span><?php echo $errors[Postcode];?></span>
  </div>
                     </div>
                      <div class="col"><div class="form-group">
    <label for="contactNo">Contact Number:</label>
    <input type="text" class="form-control" id="contactNo" placeholder="Enter Contact Number *" name="contactNo" value="<?php echo $contactNo; ?>">
            <span><?php echo $errors[contactNo];?></span>
  </div>
                      </div>
                      </div>
   
  
                  <div class="form-row">
                      <div class="col"><div class="form-group">
    <label for="Email">Email:</label>
    <input type="email" class="form-control" id="Email"  placeholder="Enter Email *" name="Email" value="<?php echo $Email; ?>">
            <span><?php echo $errors[Email];?></span>
  </div>
                      </div>
                      <div class="col"><div class="form-group">
    <label for="Password">Password:</label>
    <input type="password" class="form-control" id="Password" placeholder="Enter Password *" name="Password">
            <span><?php echo $errors[Password];?></span>
  </div>
                      </div>
                      </div>
                  
                  <div class="form-row">
                      
                      <div class="col"> <br> <button type="submit" class="btn btn-primary" name="Register">Submit</button></div>
                      </div>
    
  
                  
    

</form>
</div>
               
             </div>
             <div class="col-sm-5">
             
             <div class="jumbotron">
  <h3>Log In</h3>
  <form id="loginForm" method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                 <div class="form-row">
                     <div class="col">
                         <div class="form-group">
      <label for="loginEmail">Email:</label>
      
        <input type="email" class="form-control" id="loginEmail" placeholder="Email" name="loginEmail">
      
    </div>
                     </div>
                 </div>
                 
                    <div class="form-row">
                    <div class="col"> 
                        <div class="form-group">
      <label for="loginPassword">Password:</label>
    
        <input type="password" class="form-control" id="loginPassword" placeholder="Password" name="loginPassword">
     
    </div>
                        </div>
                    </div>
    
   
   
    <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
      <span><?php echo $Error;?></span>
        <div class="col">
           <button type="submit" class="btn btn-primary" name="Login">Sign in</button><hr>
           <div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>
           
           </div>
           <div class="offset-sm-2 col-sm-10">
           <div class="row">
            
            </div>
            </div>
      </div>
           
    </div>
    
  </form>
 
</div>
                
  
 
             </div>
            </div>
        
  
</div>
<script>
 $(document).ready(function(){
        //toggles the login form when the signup button is pressed
		
     
     
     $("#btnSignup").click(function(){
         $("#id01").show();
     });
     
     
     
     
			
    });</script>
        
        <script src="Scripts/fbLogin.js" type="text/javascript"></script>
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      
      
    </body>