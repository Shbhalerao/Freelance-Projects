<?php require_once("Includes/DB.php");?>
 <?php require_once("Includes/Functions.php");  ?>
  <?php require_once("Includes/Sessions.php"); ?>
  <?php
$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
  Confirm_Login(); ?>




<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <script src="https://kit.fontawesome.com/47ec3636cd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="Css/design.css">
    <title>Comments</title>

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
        <h1><i class="fas fa-comments"></i> Manage Comments</h1>
      </div>

    </div>

  </div>
</header>

<br>



<!-- Header End -->
<!-- Main Area Start -->
<section class="container py-2 mb-4">
  <div class="row" style="min-height:30px;">
    <div class="col-lg-12" style="min-height:400px;">
      <?php
            echo ErrorMessage();
            echo SuccessMessage();
       ?>

       <h2>Un-Approved Comments</h2>

      <table class="table table-stripped table-hover">
        <thead class="thead-dark">
          <tr>
            <th>No.</th>
            <th>Date&Time</th>
            <th>Name</th>
            <th>Comment</th>
            <th>Approve</th>
            <th>Action</th>
            <th>Details</th>

          </tr>

        </thead>






     <?php
      global $ConnectingDB;
      $sql = "SELECT * FROM comments WHERE status='OFF' ORDER BY id desc";
      $Execute = $ConnectingDB->query($sql);
      $SrNo = 0;
      while ($DataRows=$Execute->fetch()) {
       $CommentId         = $DataRows["id"];
       $DateTimeOfComment = $DataRows["datetime"];
       $CommenterName     = $DataRows["name"];
       $CommentContent    = $DataRows["comment"];
       $CommentPostId     = $DataRows["post_id"];
       $SrNo++;


      ?>
      <tbody>
        <tr>
          <td><?php echo htmlentities($SrNo); ?></td>
          <td><?php echo htmlentities($DateTimeOfComment); ?></td>
          <td><?php echo htmlentities($CommenterName); ?></td>
          <td><?php echo htmlentities($CommentContent); ?></td>
          <td> <a href="ApproveComment.php?id=<?php echo $CommentId; ?>" class="btn btn-success"> Approve </a> </td>
            <td> <a href="DeleteComment.php?id=<?php echo $CommentId; ?>" class="btn btn-danger"> Delete </a> </td>
          <td style="min-width:140px;"> <a class="btn btn-primary" href="FullPost.php?id=<?php echo $CommentPostId;?>" target="_blank">Live Preview</a> </td>
        </tr>
      </tbody>

      <?php } ?>
      </table>


      <h2>Approved Comments</h2>

     <table class="table table-stripped table-hover">
       <thead class="thead-dark">
         <tr>
           <th>No.</th>
           <th>Date&Time</th>
           <th>Name</th>
           <th>Comment</th>
           <th>Revert</th>
           <th>Action</th>
           <th>Details</th>

         </tr>

       </thead>






    <?php
     global $ConnectingDB;
     $sql = "SELECT * FROM comments WHERE status='ON' ORDER BY id desc";
     $Execute = $ConnectingDB->query($sql);
     $SrNo = 0;
     while ($DataRows=$Execute->fetch()) {
      $CommentId         = $DataRows["id"];
      $DateTimeOfComment = $DataRows["datetime"];
      $CommenterName     = $DataRows["name"];
      $CommentContent    = $DataRows["comment"];
      $CommentPostId     = $DataRows["post_id"];
      $SrNo++;


     ?>
     <tbody>
       <tr>
         <td><?php echo htmlentities($SrNo); ?></td>
         <td><?php echo htmlentities($DateTimeOfComment); ?></td>
         <td><?php echo htmlentities($CommenterName); ?></td>
         <td><?php echo htmlentities($CommentContent); ?></td>
         <td style="min-width:140px;"> <a href="DisApproveComment.php?id=<?php echo $CommentId; ?>" class="btn btn-warning"> Dis-Approve </a> </td>
           <td> <a href="DeleteComment.php?id=<?php echo $CommentId; ?>" class="btn btn-danger"> Delete </a> </td>
         <td style="min-width:140px;"> <a class="btn btn-primary" href="FullPost.php?id=<?php echo $CommentPostId;?>" target="_blank">Live Preview</a> </td>
       </tr>
     </tbody>

     <?php } ?>
     </table>
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
