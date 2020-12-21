<?php require_once("Includes/DB.php");?>
<?php require_once("Includes/Functions.php");  ?>
<?php require_once("Includes/Sessions.php"); ?>




<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <script src="https://kit.fontawesome.com/47ec3636cd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="Css/portfolio.css" rel="stylesheet" type="text/css"/>
    <title>Portfolio</title>
    <!-- <style media="screen">

    </style> -->

  </head>
  <body>
    <!-- NAVBAR START -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar fixed-top">

      <div class="container" >
        <a href="Intro.php" class="navbar-brand Genuine" style="font-size: 35px;"> 'Shubham, </a>
          <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
             <span class="navbar-toggler-icon">    </span>
          </button>
            <div class="collapse navbar-collapse" id="navbarcollapseCMS">


          <ul class="navbar-nav align-right ml-auto RubikL" style="font-size: 25px;">


             <li class="nav-item mr-4 ">
                 <a href="Intro.php" class="nav-link "> Intro</a>
             </li>

             <li class="nav-item mr-4 active">
                 <a href="#" class="nav-link"> Portfolio </a>
             </li>

             <li class="nav-item mr-4">
                 <a href="Blog.php?page=1" class="nav-link"> Blog </a>
             </li>

             <li class="nav-item mr-2">
                 <a href="Contact.php" class="nav-link"> Contact </a>
             </li>


          </ul>


            </div>
      </div>

    </nav>
    <!-- NAVBAR END -->

    <!-- HEADER IMAGE START -->
<div class="portfolioheader text-left">
  <img src="Css/Image/Avatar2.png" class="img-fluid d-none d-lg-block d-xl-none d-none d-xl-block"
  height="370" width="370"style="float: right; margin-right:200px; margin-top:100px;" alt="">
  <div class="p-inner-div jumbotron" style="background:none;" >
     <h1 class="text-uppercase Genuine" style="font-size: 60px; color:white;">'PORTFOLIO,</h1>
      <h4 class="text-uppercase Genuine" style="font-size: 25px; color:white;"> Showcase of my tiny abilities which i am constantly trying to improve</h4>
  </div>


</div>
   <!-- HEADER IMAGE END -->
   <!-- Main Area Start -->
   <!-- Java Programs Start -->
   <div class="container-fluid" style="min-height:100px; background:white;">
     <br>
     <h1 class="Genuine text-center underline">Java-Programs</h1>
     <br>
   </div>


    <div class="container-fluid" style="background:White;">
      <br>
      <br>
      <div class="container-fluid">
      <div class="row mb-2 ">
        <?php
       global $ConnectingDB;
       $sql = "SELECT * FROM files ORDER BY id desc";
       $stmt=$ConnectingDB->query($sql);
       while ($DataRows= $stmt->fetch()) {
         $FileId    = $DataRows['id'];
         $DateTime = $DataRows['datetime'];
         $FileName = $DataRows['filename'];
         $FileDescription = $DataRows['filedescription'];
         $ZipFile = $DataRows['file'];

         ?>

        <div class=" col-lg-4 d-flex justify-content-around " >
          <div class="card mb-3" style="width:22rem; height: 33rem;">
  <img src="Images/Java1.png" height="320px;" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title RubikL"> <b> <?php echo htmlentities($FileName); ?>  <p RubikL style="font-size:12px;">uploaded on: <?php echo $DateTime; ?></p></b></h5>

    <p class="card-text RubikL"> <?php echo htmlentities($FileDescription); ?></p>
    <a href="Files/<?php echo htmlentities($ZipFile); ?>" class="btn btn-success" download>Download Code</a>
  </div>

</div>
      </div>


<?php } ?>
      </div>
<br>
<br>
      </div>
      </div>
<!-- Java Programs End -->

<!-- Algorithm Based Programs Start -->
<div class="container-fluid" style="min-height:100px; background:#F6F7F9;">
  <br>
  <h1 class="Genuine text-center underline">Algorithm Based Programs</h1>
  <br>
</div>
      <div class="container-fluid" style="background:#F6F7F9;">
        <br>
        <div class="container-fluid">
        <div class="row mb-2 ">
          <?php
         global $ConnectingDB;
         $sql = "SELECT * FROM algorithms ORDER BY id desc";
         $stmt=$ConnectingDB->query($sql);
         while ($DataRows= $stmt->fetch()) {
           $AlgoId    = $DataRows['id'];
           $DateTime = $DataRows['datetime'];
           $AlgoName = $DataRows['algoname'];
           $AlgoDescription = $DataRows['algodescription'];
           $AlgoFile = $DataRows['algo'];

           ?>

          <div class=" col-lg-4 d-flex justify-content-around " >
            <div class="card mb-3" style="width:22rem; height: 33rem;">
    <img src="Images/Algorithms2.jpg" height="320px;" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title RubikL"> <b> <?php echo htmlentities($AlgoName); ?><p RubikL style="font-size:12px;">uploaded on:<?php echo $DateTime; ?></p></b></h5>
      <p class="card-text RubikL"> <?php echo htmlentities($AlgoDescription); ?></p>
      <a href="Algorithms/<?php echo htmlentities($AlgoFile); ?>" class="btn btn-success" download>Download Code</a>
    </div>

  </div>
        </div>


  <?php } ?>
        </div>
  <br>
  <br>
        </div>

</div>






<!-- Algorith Based Programs End -->

   <!-- Main Area End -->


   <!-- Footer Start -->
   <div class="container-fluid text-center" style="background:white;">
     <br>
     <br>
     <h2 class="text-uppercase Genuine" style="font-size: 40px;">'Shubham Bhalerao,</h2>
     <h5 class="text-uppercase Genuine" style="font-size: 20px;"> You can follow me on : </h5>
      <a href=""><i class="fab fa-facebook fa-2x mr-2"> </i></a>
      <a href=""> <i class="fab fa-instagram fa-2x mr-2"> </i></a>
      <a href=""><i class="fab fa-linkedin fa-2x mr-2"></i></a>
      <a href=""><i class="fab fa-twitter fa-2x mr-2"></i></a>
      <br>
   </div>
   <hr>
   <div class="container-fluid text-center">
     <h4 class="RubikL" style="font-size:18px;"> <i class="far fa-copyright"></i>All Rights Reserved. Coded and Designed by Shubham Bhalerao. </h4>

   </div>
   <!-- Footer End -->
   <!-- All rights Reserved start -->

   <!-- All rights Reserved End -->


   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

 </body>

 </html>
