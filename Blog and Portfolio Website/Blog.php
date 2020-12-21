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
    <link rel="stylesheet" href="Css/blog.css">
    <title>Blog</title>
    <style media="screen">
    .heading{
       font-family: Bitter,Georgia,"Times New Roman",Times,serif;
       font-weight: bold;
       color: #005E90;

    }

    .heading:hover{
      color: #0090DB;
    }
    </style>

  </head>
  <body>
            <!-- NAVBAR -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light navbar fixed-top">

              <div class="container" >
                <a href="Intro.php" class="navbar-brand Genuine" style="font-size: 35px;"> 'Shubham, </a>
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

                     <li class="nav-item mr-4 active">
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
  <!-- <div style="height:10px; background:#B22222">

  </div> -->
     <!-- NAVBAR END -->
 <!-- Header Image START -->
     <div class="outer-div text-left">
       <img src="Css/Image/Avatar8.png" class="img-fluid d-none d-lg-block d-xl-none d-none d-xl-block"
       height="450" width="450"style="float: right; margin-right:200px; margin-top:100px;" alt="">
       <div class="inner-div jumbotron" style="background:none;">
          <h1 class="text-uppercase Genuine" style="font-size: 65px; color:white;">'BLOG,</h1>
          <h4 class="text-uppercase Genuine" style="font-size: 25px; color:white;"> A practical blog for impractical people</h4>
       </div>


     </div>
<!-- Header Image End -->
<!-- Header -->

<div class="container">
  <div class="row mr-2">

    <!-- Main Area -->
    <div class="col-sm-8 " style="min-height:40px; ">
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

      }//Query when pagination is Active i.e Blog.php?page=1
      elseif (isset($_GET["page"])) {
        $Page = $_GET["page"];
        if ($Page==0 || $Page<1) {
          $ShowPostFrom = 0;
       }else {
           $ShowPostFrom=($Page*5)-5;
       }
        $sql = "SELECT * FROM posts ORDER BY id desc LIMIT $ShowPostFrom,5";
        $stmt=$ConnectingDB->query($sql);
      }
       //Query when Category is active in URL Tab
      elseif (isset($_GET["category"])) {
        $Category = $_GET["category"];
        $sql ="SELECT * FROM posts WHERE category='$Category' ORDER BY id desc";
        $stmt = $ConnectingDB->query($sql);
      }
       //The default SQL query
      else {
               $sql ="SELECT * FROM posts ORDER BY id desc LIMIT 0,3";
               $stmt =$ConnectingDB->query($sql);
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
       <div class="card mb-4">
         <img src="Uploads/<?php echo htmlentities($Image); ?> " style="max-height:450px;" class="img-fluid card-img-top" />
         <div class="card-body">
           <h4 class="card-title RubikL"><b><?php echo htmlentities($PostTitle); ?></b></h4>
           <small class="text-muted RubikL">Category:<span class="text-dark"> <a href="Blog.php?category=<?php echo $Category;  ?>"><?php echo $Category; ?> </a> </span> & Written by <span class="text-dark"> <a href="Profile.php?username=<?php echo htmlentities($Admin); ?>"> <?php echo htmlentities($Admin); ?> </a>
           </span> on <span class="text-dark"><?php echo htmlentities($DateTime); ?></span></small>
           <span style="float:right;" class="badge badge-dark text-light">Comments
             <?php
              echo ApprovedCommentsAccordingToPost($PostId);
            ?>
          </span>
           <hr>
           <p class="card-text RubikL">
             <?php if (strlen($PostDescription)>150) { $PostDescription = substr($PostDescription,0,150)."....";} echo htmlentities($PostDescription); ?>
           </p>
           <a href="FullPost.php?id= <?php echo $PostId; ?>" style="float:right;">
            <span class="btn btn-info"> Read more >> </span>
           </a>
         </div>

       </div>
     <?php } ?>
     <!-- Pagination Start -->
      <nav>
        <ul class="pagination pagination-md">
          <!-- Creating Backward Button -->
          <?php if (isset($Page)) {
            if ($Page>1) {
            ?>
          <li class="page-item">
            <a href="Blog.php?page=<?php echo $Page-1; ?>" class="page-link">&laquo;</a>
          </li>
        <?php } } ?>
        <!-- Backword Button End -->
         <?php
         global $ConnectingDB;
         $sql = "SELECT COUNT(*) FROM posts";
         $stmt = $ConnectingDB->query($sql);
         $RowPagination = $stmt->fetch();
         $TotalPosts=array_shift($RowPagination);
         // echo $TotalPosts;
        $PostPagination = $TotalPosts/5;
        $PostPagination=ceil($PostPagination);
         // echo $PostPagination;
         for ($i=1; $i<= $PostPagination;$i++) {
           if (isset($Page)) {
             if ($i==$Page) {
           ?>
         <li class="page-item active">
           <a href="Blog.php?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
         </li>
       <?php }else { ?>
         <li class="page-item">
           <a href="Blog.php?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
         </li>
       <?php } } } ?>
       <!-- Creating Forward Button -->
       <?php if (isset($Page)&&!empty($Page)) {
         if ($Page+1<=$PostPagination) {
         ?>
       <li class="page-item">
         <a href="Blog.php?page=<?php echo $Page+1; ?>" class="page-link">&raquo;</a>
       </li>
     <?php } } ?>
       </ul>
      </nav>


     <!-- Pagination End -->
    </div>
    <!-- Main Area end -->

    <!-- Side Area Start -->
    <div class="col-sm-4">

      <br>
      <br>
      <div class="card">
        <div class="card-header bg-primary text-light">
          <h2 class="lead RubikL">Categories</h2>
            </div>
          <div class="card-body">
            <?php
           global $ConnectingDB;
           $sql = "SELECT * FROM category ORDER BY id desc";
           $stmt = $ConnectingDB->query($sql);
           while ($DataRows = $stmt->fetch()) {
             $CategoryId = $DataRows["Id"];
             $CategoryName = $DataRows["title"];

             ?>
            <a href="Blog.php?category=<?php echo $CategoryName; ?>"><span class="heading"> <?php echo $CategoryName; ?></span></a> <br>
           <?php } ?>
          </div>
        </div>
        <br>
        <div class="card">
          <div class="card-header bg-info text-white">
            <h2 class="lead">Recent Posts</h2>

          </div>
          <div class="card-body">
            <?php
             global $ConnectingDB;
             $sql = "SELECT * FROM posts ORDER BY id desc LIMIT 0,5";
             $stmt = $ConnectingDB->query($sql);
             while ($DataRows=$stmt->fetch()) {
               $Id         = $DataRows['id'];
               $Title      = $DataRows['title'];
               $DateTime   = $DataRows['datetime'];
               $Image      = $DataRows['image'];
            ?>
            <div class="media">
               <img src="Uploads/<?php echo htmlentities($Image); ?>" class="d-block img-fluid align-self-start" width="90" height="94" alt="">
               <div class="media-body ml-2">
              <a href="FullPost.php?id=<?php echo htmlentities($Id); ?>" target="_blank">   <h6 class="lead"><?php echo htmlentities($Title); ?></h6></a>
                 <p class="small"><?php echo $DateTime; ?></p>
               </div>
            </div>
            <hr>
            <?php }  ?>
          </div>

        </div>

    </div>
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
   <hr>
</div>
<div class="container-fluid text-center" style="background:#F6F7F9;">
  <h4 class="RubikL" style="font-size:18px;"> <i class="far fa-copyright"></i>All Rights Reserved. Coded and Designed by Shubham Bhalerao. </h4>

</div>

<!-- Footer End -->
<!-- All rights Reserved start -->
<!-- All rights Reserved End -->

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script>
  $('#year').text(new Date().getFullYear());
</script>
  </body>
</html>
