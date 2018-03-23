<?php
$host = "localhost";
$username = "shaneluc_admin";
$password = "lucys123";
$dbname = "shaneluc_garageBooking";
$fName = $sName = $Address = $County = $Postcode = $contactNo = $Email = $Password = "";
$error_msg = "";
$fNameNull = $sNameNull = $addressNull = $countyNull = $postcodeNull = $contactNoNull = $emailNull = $passwordNull = "";

$errors = array();



if(isset($_POST['Submit'])){
  
    //validation check for first name
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         if (empty($_POST['fName'])){
            $errors[fName] = "First Name is Required";
        } else {
            if(!preg_match("~[a-zA-Z]~", $fName)) {
                $errors[fName] = "First name may only contain letters";
            } 
        }
        //validation check for surname
        if (empty($_POST['sName'])){
            $errors[sName] = "Surname is Required";
        } else {
            $sName = clean_data($_POST['sName']);
            if(!preg_match("/^[a-zA-Z ]*$", $sName)) {
                $errors[sName] = "Surname may only contain letters and spaces";
            }
        }
        //validation check for address
         if (empty($_POST['Address'])){
            $errors[Address] = "Address field is Required";
        } else {
            $Address = clean_data($_POST['Address']);
            if(!preg_match("/^[a-zA-Z0-9 ]*$", $Address)) {
                $errors[Address] = "Address may only contain letters, numbers and spaces";
            }
        }
        //validation check for county
         if (empty($_POST['County'])){
            $errors[County] = "County is Required";
        } else {
            $County = clean_data($_POST['County']);
            if(!preg_match("/^[a-zA-Z ]*$", $County)) {
                $errors[County] = "County may only contain letters and spaces";
            }
        }
        //validation check for postcode
         if (!empty($_POST['Postcode'])){
          $Postcode = clean_data($_POST['Postcode']);
             if(!preg_match("/^[a-zA-Z0-9 ]*$", $Postcode)) {
                $errors[Postcode] = "Postcode may only contain letters, numbers and spaces";
            }    
        }
        //validation check for contact number
          if (empty($_POST['contactNo'])){
            $errors[contactNo] = "Contact Number is Required";
        } else {
            $contactNo = clean_data($_POST['contactNo']);
            if(!preg_match("/^[0-9]*$", $contactNo)) {
                $errors[contactNo] = "Contact Number may only contain numbers";
            }
        }
        //validation checkfor email
          if (empty($_POST['Email'])){
            $errors[Email] = "Email is Required";
        } 
     //validation check for password
           if (empty($_POST['Password'])){
            $errors[Password] = "Password is Required";
        } else {
            $Password = md5($_POST['Password']);//md5 uses RSA message digest algorithm 
        }      
    }//end of validation
    
    

    //only opens a connection to the database if the errors array is empty
if (empty($errors)) {
    //establishing connection to the database
$conn = new mysqli($host, $username, $password, $dbname);

//checks the connection and kills it if any errors present
if (mysqli_connect_error()) {
    die('Connection Aborted: ('. mysqli_connect_errno().')'.mysqli_connect_error());
}//if no errors are present the customer table is updated 
else{
    $sql = "INSERT INTO customer (fName, sName, Address, County, Postcode, contactNo, Email, Password)
    values ('$fName','$sName','$Address','$County','$Postcode','$contactNo','$Email','$Password')";
    if ($conn->query($sql)){
        echo "Database had been updated with your details";
    }
    else{
        echo "Error: ". $sql .$conn->error;
    }//closes connection with the database
    $conn->close();
    }
} else {
    echo "Something went wrong";
}

 }//isset   

//function for cleaning form data and to prevent sql injection
function clean_data($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
$data = mysqli_real_escape_string($conn, $data);
}

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
    <link href="css/custom.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head> 
    <body>
        <div class="container">
            <!--This row contains external login methods-->
            <div class="row">
            <img class="login" src="images/fblogin.jpg" alt="Facebook Login" onClick="FBLogin();">
            </div>
           <!--This row contains the signup form--> 
         <div class="row">
            <div class="col-sm-7">
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
    <input type="text" class="form-control" id="County" placeholder="Enter County *" name="county" value="<?php echo $County; ?>">
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
                      <div class="col">    <div class="form-group">
    <label for="Password">Repeat Password:</label>
    <input type="password" class="form-control" id="rptPassword" placeholder="Repeat Password *" name="rptPassword">
  </div>
                      </div>
                      <div class="col"> <br> <button type="submit" class="btn btn-primary" name="Submit">Submit</button><label>* Indicates a Required Field</label></div>
                      </div>
    
  
                  
    

</form>
             </div>
             <div class="col-sm-5">
                <form id="loginForm">
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
        <button type="submit" class="btn btn-primary">Sign in</button>
      </div>
           
    </div>
  </form>
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