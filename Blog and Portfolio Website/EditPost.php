<?php
require_once("Includes/DB.php");?>
 <?php
 require_once("Includes/Functions.php");  ?>
  <?php
  require_once("Includes/Sessions.php"); ?>
  <?php Confirm_Login(); ?>

<?php
$SarchQueryParameter = $_GET['id'];
if (isset($_POST["Submit"])) {
$PostTitle  = $_POST["PostTitle"];
$Category   = $_POST["Category"];
$Image      = $_FILES["Image"]["name"];
$Target     = "Uploads/".basename($_FILES["Image"]["name"]);
$PostText   = $_POST["PostDescription"];

$Admin = "Shubham";

date_default_timezone_set("Asia/Kolkata");
$CurrentTime=time();
$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);



if(empty($PostTitle)){
  $_SESSION["ErrorMessage"] = "Title can't be empty";
  Redirect_to("Posts.php");
} elseif (strlen($PostTitle)<5) {
  $_SESSION["ErrorMessage"] = "Post title should be greater than 5 characters";
  Redirect_to("Posts.php");

}elseif (strlen($PostText)>9999) {
  $_SESSION["ErrorMessage"] = "Post description should be less than 10000 characters";
  Redirect_to("Posts.php");
}else {
  // Query to update category in DB when everything is fine
  global $ConnectingDB; //Required only in case of php 5.6
  if (!empty($_FILES["Image"]["name"])) {
    $sql ="UPDATE posts
                  SET title='$PostTitle', category ='$Category', image = '$Image', post ='$PostText'
                  WHERE id='$SarchQueryParameter'";
                }else {
                  $sql ="UPDATE posts
                                SET title='$PostTitle', category ='$Category', post ='$PostText'
                                WHERE id='$SarchQueryParameter'";
                }

   $Execute = $ConnectingDB->query($sql);
  move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
   //var_dump($Execute);
   if($Execute){
      $_SESSION["SuccessMessage"]="Post with id: " .$ConnectingDB->lastInsertId()." Updated Successfully";
      Redirect_to("Posts.php");
   }else {
     $_SESSION["ErrorMessage"] = "Something went Wrong, Try Again";
     Redirect_to("Posts.php");
   }
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
    <link rel="stylesheet" href="Css/Styles.css">
    <title>Edit Post</title>

  </head>
  <body>
            <!-- NAVBAR -->
            <div style="height:10px; background:#B22222">

            </div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container" >
      <a href="#" class="navbar-brand"> BHALERAOSHUBHAM.COM </a>
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
        <h1><i class="fas fa-text-height"></i> Edit Post</h1>
      </div>

    </div>

  </div>
</header>





<!-- Header End -->

<!-- Main area -->
<section class="container py-2 mb-4">
  <div class="row" >
    <div class="offset-lg-1 col-lg-10" style="min-height:400px;" >
      <?php
            echo ErrorMessage();
            echo SuccessMessage();
            //Fetching Existing Content according to Our
            global $ConnectingDB;
            $sql  = "SELECT * FROM posts WHERE id='$SarchQueryParameter'";
            $stmt =  $ConnectingDB ->query($sql);
            while ($DataRows=$stmt->fetch()) {
              $TitleToBeUpdated    = $DataRows['title'];
              $CategoryToBeUpdated = $DataRows['category'];
              $ImageToBeUpdated    = $DataRows['image'];
              $PostToBeUpdated     = $DataRows['post'];
              // code...
            }
       ?>
     <form class="" action="EditPost.php?id=<?php echo $SarchQueryParameter ?>" method="post" enctype="multipart/form-data">
       <div class="card bg-secondary text-light mb-3">

         <div class="card-body bg-dark">
           <div class="form-group">
             <label for="title"> <span class="FieldInfo"> Post Title: </span></label>
             <input class="form-control" type="text" name="PostTitle" id="title" placeholder="Type Title here" value="<?php echo $TitleToBeUpdated; ?>">
          </div>
          <div class="form-group">
            <span class="FieldInfo">Existing Category: </span>
            <?php echo $CategoryToBeUpdated; ?>
            <br>
            <label for="CategoryTitle"> <span class="FieldInfo"> Choose Category: </span></label>
            <select class="form-control" id="CategoryTitle"  name="Category">
                 <?php
                 //Fetchinng all the categories from category table
                 global $ConnectingDB;
                 $sql = "SELECT id,title FROM category";
                 $stmt = $ConnectingDB->query($sql);
                 while ($DataRows = $stmt->fetch()) {
                   $Id = $DataRows["id"];
                   $CategoryName = $DataRows["title"];
                  ?>
                  <option> <?php echo $CategoryName; ?></option>
                  <?php } ?>
               </select>
         </div>

         <div class="form-group mb-1">
           <span class="FieldInfo">Existing Image: </span>
          <img class="mb-1" src="Uploads/<?php echo $ImageToBeUpdated; ?>" width="170px;" height="70px;">
            <div class="custom-file">
            <input class="custom-file-input" type="File" name="Image" id="imageSelect" value="">
            <label for="imageSelect" class="custom-file-label"> Select Image </label>
           </div>
         </div>

         <div class="form-group">
            <label for="Post"><span class="FieldInfo"> Post: </span></label>
            <textarea class="form-control" name="PostDescription" id="Post" rows="8" cols="80">
               <?php echo $PostToBeUpdated; ?>
            </textarea>
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


<!-- Main area end -->










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
