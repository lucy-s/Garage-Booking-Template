 <?php
include 'scripts/upload.php';
?>

<!DOCTYPE html>
<head>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="contact us email phone ">
    <meta name="author" content="Shane Lucy">
    <title>Contact Us</title>

    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom styles for this page -->
    <link href="scripts/styles.php" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-light bg-light navbar-expand-sm">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ">
            <li class="nav-item">
              <a class="nav-link" href="homepage.php">Home            
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contactus.php">Contact Us</a>
                <span class="sr-only">(current)</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="services.php">Services</a>
            </li>
          </ul>
        </div>
          <form class="form-inline my-2 my-lg-0 justify-content-end">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
      </div>
    </nav>
    
    <!-- Form for uploading image to this webpage-->
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" id="uploadContact">
        <input type="file" name="image" data-toggle="tooltip" title="Click here to select an image" id="inputContact">
        <button type="submit" name="uploadImg" class="btn btn-outline-success" id="btnUploadContact" data-toggle="tooltip" title="Click here to upload your image">Upload</button>
        <button class="btn btn-outline-success" id="btnImageContact" data-toggle="tooltip" title="Saved changes can't be undone">Save Images</button>
        <button class="btn btn-outline-success" id="btnNoneContact" data-toggle="tooltip" title="Clicking me cant be undone">I dont want an Image</button>
        <!--outputs the relevant php error message-->
        <span><?php echo $message;?></span>
    </form>
    
    <!-- Setting up bootstrap grid using rows and colums for layout-->
 <div class="container">
 <div class="row" id="imgContact">
 <div class="col-sm-12"
 <!--image source is the image thats just been uploaded-->

<img src="images/<?php echo $imageName;?>" style="max-width: 100%">
</div>
 </div>
    <div class="row">
        <div class="col">
            <h1 contenteditable="true" id="contactHeading" data-toggle="tooltip" title="Click Here To Edit Title">Contact Us</h1>
        </div>
        <button class="btn btn-outline-success" id="btnContactHeading" data-toggle="tooltip" title="Saved Changes cant be Undone">Save Heading</button>
        </div>
        
        <div class="row">
            <div class="col">
                <p contenteditable="true" id="contactContent" data-toggle="tooltip" title="Click here to edit page content">Content goes here</p>
                <button class="btn btn-outline-success" id="btnContactContent" data-toggle="tooltip" title="Saved Changes cant be Undone">Save Content</button>
            </div>
            
        </div>
    </div>
    
    
    <script src="scripts/dynamicContent.js"></script>
    
    
    <!--Bootstrap jQuery, popper and javascript scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>