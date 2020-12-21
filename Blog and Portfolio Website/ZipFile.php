<?php require_once("Includes/DB.php");?>
 <?php require_once("Includes/Functions.php");  ?>
  <?php require_once("Includes/Sessions.php"); ?>
  <?php
$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
  Confirm_Login(); ?>

<?php
 if(isset($_POST["Submit"])) {
$FileName  = $_POST["FileName"];
$ZipFile     = $_FILES["ZipFile"]["name"];
$FileDescription = $_POST["FileDescription"];
$Target     = "Files/".basename($_FILES["ZipFile"]["name"]);


$Admin = $_SESSION["UserName"];

date_default_timezone_set("Asia/Kolkata");
$CurrentTime=time();
$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);

if(empty($FileName)){
  $_SESSION["ErrorMessage"] = "File name can't be empty";
  Redirect_to("ZipFile.php");
}elseif (strlen($FileName)<3) {
  $_SESSION["ErrorMessage"] = "File Name should be greater than 3 characters";
  Redirect_to("ZipFile.php");
}elseif (empty($FileDescription)) {
  $_SESSION["ErrorMessage"] = "File Description can't be empty";
  Redirect_to("ZipFile.php");
}
else {
  //Query to insert zip file into SQL Database
  global $ConnectingDB; //Required only in case of php 5.6
  $sql="INSERT INTO files(datetime,filename,filedescription,file)";
  $sql .= "VALUES(:dateTime,:fileName,:fileDiscription,:file)";
  $stmt = $ConnectingDB->prepare($sql);
  $stmt->bindValue(':dateTime',$DateTime);
  $stmt->bindValue(':fileName',$FileName);
  $stmt->bindValue(':fileDiscription',$FileDescription);
  $stmt->bindValue(':file',$ZipFile);

  $Execute =$stmt->execute();
  move_uploaded_file($_FILES["ZipFile"]["tmp_name"],$Target);

}
if($Execute){
   $_SESSION["SuccessMessage"]="File added Successfully";
   Redirect_to("ZipFile.php");
}else {
  $_SESSION["ErrorMessage"] = "Something went Wrong, Try Again";
  Redirect_to("ZipFile.php");
}


}



 ?>


<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <script src="https://kit.fontawesome.com/47ec3636cd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="Css/design.css">
    <title>Document</title>

  </head>
  <body>
            <!-- NAVBAR -->
            <div style="height:10px; background:#B22222">

            </div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container" >
      <a href="#" class="navbar-brand"> 'Shubham, </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
           <span class="navbar-toggler-icon">    </span>
        </button>
          <div class="collapse navbar-collapse" id="navbarcollapseCMS">


        <ul class="navbar-nav  mr-auto">
           <li class="nav-item">
               <a href="MyProfile.php" class="nav-link"> <i class="fas fa-user-tie"></i> My Profile</a>
           </li>

           <li class="nav-item">
               <a href="Dashboard.php" class="nav-link"> DashBoard</a>
           </li>

           <li class="nav-item">
               <a href="Posts.php" class="nav-link"> Posts </a>
           </li>

           <li class="nav-item">
               <a href="Categories.php" class="nav-link"> Categories </a>
           </li>

           <li class="nav-item">
               <a href="Admins.php" class="nav-link"> Manage admins </a>
           </li>

           <li class="nav-item">
               <a href="Comments.php" class="nav-link"> Comments </a>
           </li>

           <li class="nav-item">
               <a href="Blog.php?page=1" class="nav-link"> Live Blog </a>
           </li>

        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="Logout.php" class="nav-link text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
          </div>
    </div>

  </nav>
  <div style="height:10px; background:#B22222">

  </div>
     <!-- NAVBAR END -->

<!-- Header -->
<header class="bg-dark text-white py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1><i class="fas fa-text-height"></i> Zip File</h1>
           <h3>Zip File</h3>


      </div>

    </div>

  </div>
</header>

<br>




<!-- Header End -->
<!-- Main Area Start -->
<section class="container py-2 mb-4">
  <div class="row" >
    <div class="offset-lg-1 col-lg-10" style="min-height:400px;" >
      <?php
            echo ErrorMessage();
            echo SuccessMessage();
       ?>
     <form class="" action="ZipFile.php" method="post" enctype="multipart/form-data">
       <div class="card bg-secondary text-light mb-3">

         <div class="card-body bg-dark">
           <div class="form-group">
             <label for="title"> <span class="FieldInfo"> File Name: </span></label>
             <input class="form-control" type="text" name="FileName" id="filename" placeholder="Type File name here" value="">
          </div>

          <div class="form-group">
             <label for="Post"><span class="FieldInfo"> File Description: </span></label>
             <textarea class="form-control" name="FileDescription" id="Post" rows="5" cols="50"></textarea>
           </div>

         <div class="form-group mb-1">
            <div class="custom-file">
            <input class="custom-file-input" type="File" name="ZipFile" id="ZipSelect" value="">
            <label for="ZipSelect" class="custom-file-label"> Select Zip file </label>
           </div>
         </div>


          <div class="row" >
           <div class="col-lg-6 mb-2">
            <a href="Dashboard.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
           </div>
           <div class="col-lg-6 mb-2">
            <button type="submit" name="Submit" class="btn btn-block btn-success">
               <i class="fas fa-check"></i> Publish
            </button>
           </div>
          </div>
         </div>

       </div>
     </form>
    </div>
  </div>

</section>
<!-- Main Area End -->
   <!-- FOOTER -->

   <footer class="bg-dark text-white" >
     <div class="container">
         <div class="row">
           <div class="col">
           <p class="lead text-center">Theme by | Shubham Bhalerao |<span id="year"></span> &copy; ----All rights reserved</p>
         </div>
         </div>
     </div>


   </footer>
   <div style="height:10px; background:#B22222">

   </div>
 <!-- Footer end -->

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script>
  $('#year').text(new Date().getFullYear());
</script>
  </body>
</html>
