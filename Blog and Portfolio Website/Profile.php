
<?php require_once("Includes/DB.php");?>
<?php require_once("Includes/Functions.php");  ?>
<?php require_once("Includes/Sessions.php"); ?>
<!-- Fetching Existing data -->
<?php
$SearchQueryParamater = $_GET['username'];
global $ConnectingDB;
$sql = "SELECT aname,aheadline,abio,aimage FROM admins WHERE username=:userName";
$stmt = $ConnectingDB->prepare($sql);
$stmt->bindValue(':userName', $SearchQueryParamater);
$stmt->execute();
$Result = $stmt->rowcount();
if ($Result==1) {
  while ($DataRows=$stmt->fetch()) {
    $ExistingName = $DataRows['aname'];
    $ExistingBio  = $DataRows['abio'];
    $ExistingImage = $DataRows['aimage'];
    $ExistingHeadline = $DataRows['aheadline'];

  }
}else {
  $_SESSION["ErrorMessage"]="User does not exist";
  Redirect_to("Blog.php?page=1");
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
    <title>Profile</title>

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
       <a href="Blog.php" class="nav-link"> Home</a>
   </li>

   <li class="nav-item">
       <a href="#" class="nav-link"> About Us </a>
   </li>

   <li class="nav-item">
       <a href="Blog.php" class="nav-link"> Blog </a>
   </li>

   <li class="nav-item">
       <a href="#" class="nav-link"> Contact Us </a>
   </li>

   <li class="nav-item">
       <a href="#" class="nav-link"> Features </a>
   </li>


</ul>

<ul class="navbar-nav ml-auto">
     <form class="form-inline d-none d-sm-block" action="Blog.php" >
       <div class="form-group">
        <input class="form-control mr-2"type="text" name="Search" placeholder="Search here" value="">
        <button  class="btn btn-primary" name="searchButton"> Go </button>

       </div>
     </form>


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
      <div class="col-md-6">
        <h1><i class="fas fa-user text-success mr-2" style="color:#27aae1"></i> <?php echo $ExistingName; ?></h1>
        <h3><?php echo $ExistingHeadline; ?></h3>
      </div>

    </div>

  </div>
</header>

<br>



<!-- Header End -->
<section class="container py-2 mb-4">
  <div class="row">
    <div class="col-md-3">
      <img src="Images/<?php echo $ExistingImage; ?>" class="d-block img-fluid mb-3 rounded-circle" alt="">

    </div>
    <div class="col-md-9" style="min-height:400px;">
      <div class="card">
        <div class="card-body">
          <p class="lead"> <?php echo $ExistingBio; ?></p>

        </div>

      </div>

    </div>

  </div>

</section>

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
