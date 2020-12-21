<?php require_once("Includes/DB.php");?>
<?php require_once("Includes/Functions.php");  ?>
<?php require_once("Includes/Sessions.php"); ?>

<?php $SearchQueryParamter = $_GET['id']; ?>
<?php
if (isset($_POST["Submit"])) {
$Name = $_POST["CommenterName"];
$Email = $_POST["CommenterEmail"];
$Comment = $_POST["Comment"];

date_default_timezone_set("Asia/Kolkata");
$CurrentTime=time();
$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);



if(empty($Name)||empty($Email)||empty($Comment)){
  $_SESSION["ErrorMessage"] = "All feilds must be filled out";
  Redirect_to("FullPost.php?id={$SearchQueryParamter}");
} elseif (strlen($Comment)>500) {
  $_SESSION["ErrorMessage"] = "Comment length should be less than 500 characters";
  Redirect_to("FullPost.php?id={$SearchQueryParamter}");

}else {
  // Query to insert comment in DB when everything is fine
  global $ConnectingDB; //Required only in case of php 5.6
  $sql="INSERT INTO comments(datetime, name, email,comment,approvedby,status,post_id)";
  $sql .= "VALUES(:dateTime,:name,:email,:comment,'pending','OFF',:postIdFromURL)";
  $stmt = $ConnectingDB->prepare($sql);
  $stmt->bindValue(':dateTime', $DateTime);
  $stmt->bindValue(':name',$Name);
  $stmt->bindValue(':email', $Email);
  $stmt->bindValue(':comment',$Comment);
  $stmt->bindValue(':postIdFromURL',$SearchQueryParamter);
  $Execute =$stmt->execute();

  if($Execute){
     $_SESSION["SuccessMessage"]="Comment Added Successfully";
     Redirect_to("FullPost.php?id={$SearchQueryParamter}");
  }else {
    $_SESSION["ErrorMessage"] = "Something went Wrong, Try Again";
    Redirect_to("FullPost.php?id={$SearchQueryParamter}");
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
    <link rel="stylesheet" href="Css/design.css">
    <title>Full Post</title>

  </head>
  <body>
            <!-- NAVBAR -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light navbar fixed-top">

              <div class="container" >
                <a href="#" class="navbar-brand Genuine" style="font-size: 35px;"> 'Shubham, </a>
                  <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
                     <span class="navbar-toggler-icon">    </span>
                  </button>
                    <div class="collapse navbar-collapse" id="navbarcollapseCMS">


                  <ul class="navbar-nav align-right ml-auto RubikL" style="font-size: 25px;">


                     <li class="nav-item mr-4">
                         <a href="Intro.php" class="nav-link"> Intro</a>
                     </li>

                     <li class="nav-item mr-4">
                         <a href="Portfolio.php" class="nav-link"> Portfolio </a>
                     </li>

                     <li class="nav-item mr-4">
                         <a href="Blog.php?page=1" class="nav-link"> Blog </a>
                     </li>

                     <li class="nav-item mr-2">
                         <a href="Contact.php" class="nav-link"> Contact </a>
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

<div class="container">
  <div class="row mt-4">

    <!-- Main Area -->
    <div class="col-lg-12 " style="min-height:40px; ">
      <br>
      <br>
      <br>
      <?php
            echo ErrorMessage();
            echo SuccessMessage();
       ?>
      <?php
       global $ConnectingDB;
       if (isset($_GET["searchButton"])){
         $Search = $_GET["Search"];
         $sql = "SELECT * FROM posts
         WHERE  datetime LIKE :search
         OR title LIKE :search
         OR category LIKE :search
         OR post LIKE :search";
         $stmt = $ConnectingDB->prepare($sql);
         $stmt -> bindValue(':search','%'.$Search.'%');
         $stmt->execute();

      }
       //The default SQL query
      else {
              $PostIdFromURL = $_GET["id"];
              if (!isset($PostIdFromURL)) {
                $_SESSION["ErrorMessage"] = "Wrong request";
                Redirect_to("Blog.php?page=1");
              }
               $sql ="SELECT * FROM posts WHERE id='$PostIdFromURL' ";
               $stmt =$ConnectingDB->query($sql);
              $Result = $stmt->rowcount();
              if ($Result!=1) {
                $_SESSION["ErrorMessage"]="Page does not exist";
                Redirect_to("Blog.php?page=1");
              }
             }

           while ($DataRows = $stmt->fetch()) {
           $PostId = $DataRows["id"];
           $DateTime = $DataRows["datetime"];
           $PostTitle = $DataRows["title"];
           $Category = $DataRows["category"];
           $Admin     = $DataRows["author"];
           $Image     = $DataRows["image"];
           $PostDescription  = $DataRows["post"];

       ?>
       <div class="container mb-4">
         <img src="Uploads/<?php echo htmlentities($Image); ?> " style="max-height:450px;"class="img-fluid card-img-top" />
         <div class="">
           <h2 class="RubikL"> <b><?php echo htmlentities($PostTitle); ?></b></h2>
               <small class="text-muted RubikL">Category:<span class="text-dark"> <a href="Blog.php?category=<?php echo $Category;  ?>"><?php echo $Category; ?> </a> </span> & Written by <span class="text-dark"> <a href="Profile.php?username=<?php echo htmlentities($Admin); ?>"> <?php echo htmlentities($Admin); ?> </a>
               </span> on <span class="text-dark"><?php echo htmlentities($DateTime); ?></span></small>

           <hr>
           <p class="card-text RubikL">
             <?php
              echo nl2br($PostDescription);
              ?>
           </p>

         </div>

       </div>
     <?php } ?>
       <!-- Comment Part Start -->
         <span class="FieldInfo">Comments</span>
         <br><br>
 <?php
global $ConnectingDB;
$sql = "SELECT * FROM comments
WHERE post_id= '$SearchQueryParamter' AND status ='ON'";
$stmt=$ConnectingDB->query($sql);
while ($DataRows=$stmt->fetch()) {
  $CommentDate = $DataRows['datetime'];
  $CommenterName = $DataRows['name'];
  $CommentContent = $DataRows['comment'];

  ?>

    <div >

      <div class="media CommentBlock">
        <img class="d-block img-fluid align-self-start" src="Images/comment.png"alt="">
        <div class="media-body ml-2">
          <h6 class="lead"><?php echo $CommenterName; ?></h6>
          <p class="small"><?php echo $CommentDate; ?></p>
          <p><?php echo $CommentContent; ?></p>
        </div>

      </div>

    </div>
    <hr>
  <?php } ?>
 <!-- Fetching existing Comments Start -->













 <!-- Fetching existing Comments End -->



        <div class="">
          <form class="" action="FullPost.php?id=<?php echo $SearchQueryParamter; ?>" method="post">
            <div class="card mb-3">
              <div class="card-header">
                <h5 class="FieldInfo"> Share your thoughts about this post </h5>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i> </span>

                      </div>

                    <input class="form-control" type="text" name="CommenterName" placeholder="Name" value="">
                   </div>
                 </div>

                 <div class="form-group">
                   <div class="input-group">
                     <div class="input-group-prepend">
                       <span class="input-group-text"><i class="fas fa-envelope"></i> </span>

                     </div>

                   <input class="form-control" type="email" name="CommenterEmail" placeholder="Email" value="">
                  </div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="Comment" rows="6" cols="80"></textarea>

                </div>
                  <div class="">
                    <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
                  </div>

                </div>

            </div>

          </form>

        </div>


         <!-- Comment Part End      -->
    </div>
    <!-- Main Area end -->

    <!-- Side Area Start -->

    <!-- Side Area END -->


  </div>

</div>




<!-- Header End -->
<br>
<!-- Footer Start -->
<div class="container-fluid text-center" style="background:#F6F7F9;">
  <br>
  <br>
  <h2 class="text-uppercase Genuine" style="font-size: 40px;">'Shubham Bhalerao,</h2>
  <h5 class="text-uppercase Genuine" style="font-size: 20px;"> You can follow me on : </h5>
   <a href=""><i class="fab fa-facebook fa-2x mr-2"> </i></a>
   <a href=""> <i class="fab fa-instagram fa-2x mr-2"> </i></a>
   <a href=""><i class="fab fa-linkedin fa-2x mr-2"></i></a>
   <a href=""><i class="fab fa-twitter fa-2x mr-2"></i></a>
   <br>
   <br>
</div>
<!-- Footer End -->
<!-- All rights Reserved start -->
<div class="container-fluid text-center" style="background:#F6F7F9;">
  <h4 class="RubikL" style="font-size:15px;"> <i class="far fa-copyright"></i>All Rights Reserved. Coded and Designed by Shubham Bhalerao. </h4>

</div>
<!-- All rights Reserved End -->


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script>
  $('#year').text(new Date().getFullYear());
</script>
  </body>
</html>
