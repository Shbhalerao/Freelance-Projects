<?php require_once("Includes/DB.php");?>
 <?php require_once("Includes/Functions.php");  ?>
  <?php require_once("Includes/Sessions.php");?>
  <?php
$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
//echo $_SESSION["TrackingURL"];
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
    <title>Blog Posts</title>

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
        <h1><i class="fas fa-blog"></i> Blog Posts</h1>
      </div>
      <div class="col-lg-3 mb-2">
        <a href="AddNewPost.php" class="btn btn-primary btn-block">
           <i class="fas fa-edit"></i> Add New Post
        </a>
      </div>

      <div class="col-lg-3 mb-2">
        <a href="Categories.php" class="btn btn-info btn-block">
           <i class="fas fa-folder-plus"></i> Add New Category
        </a>
      </div>

      <div class="col-lg-3 mb-2">
        <a href="Admins.php" class="btn btn-warning btn-block">
           <i class="fas fa-user-plus"></i> Add New Admin
        </a>
      </div>

      <div class="col-lg-3 mb-2">
        <a href="Comments.php" class="btn btn-success btn-block">
           <i class="fas fa-check"></i> Approve Comments
        </a>
      </div>

    </div>

  </div>
</header>





<!-- Header End -->

<!--Main Area-->
<section class="container py-2 mb-4">
    <div class="row">
      <div class="col-lg-12">
        <?php
              echo ErrorMessage();
              echo SuccessMessage();
         ?>
        <table class="table table-striped table-hover">
          <thead class="thead-dark">

          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Category</th>
            <th>Date&Time</th>
            <th>Author</th>
            <th>Banner</th>
            <th>Comments</th>
            <th>Action</th>
            <th>Live Preview</th>
          </tr>
        </thead>

            <?php
            global $ConnectingDB;
            $sql = "SELECT * FROM posts";
            $stmt = $ConnectingDB ->query($sql);
            $Sr = 0;
            while($DataRows = $stmt->fetch()) {
              $Id        = $DataRows["id"];
              $DateTime  = $DataRows["datetime"];
              $PostTitle = $DataRows ["title"];
              $Category  = $DataRows["category"];
              $Admin     = $DataRows["author"];
              $Image     = $DataRows["image"];
              $PostText  = $DataRows ["post"];
              $Sr++;

              // code...


             ?>
             <tbody>

              <tr>
                <td><?php echo $Sr; ?></td>

                <td>
                  <?php
                  if(strlen($PostTitle)>12){$PostTitle= substr($PostTitle,0,12).'..';}
                   echo $PostTitle;
                  ?>
                </td>

                <td>
                  <?php
                    if(strlen($Category)>8){$Category= substr($Category,0,8).'..';}
                    echo $Category;

                  ?>
                </td>

                <td>
                 <?php
                 if(strlen($DateTime)>11){$DateTime= substr($DateTime,0,11).'..';}
                 echo $DateTime; ?>
               </td>

                <td>
                    <?php
                    if(strlen($Admin)>8){$Admin= substr($Admin,0,5).'..';}
                    echo $Admin;
                    ?>
                </td>

                <td><img src="Uploads/<?php echo $Image ; ?>" width="170px;" height="60px"</td>

                <td>

                    <?php
                     $Total=ApprovedCommentsAccordingToPost($Id);
                        if ($Total>0) {
                          ?>
                          <span class="badge badge-success">
                           <?php  echo $Total; ?>
                           </span>
                       <?php }  ?>

                       <?php
                         $Total=DisApprovedCommentsAccordingToPost($Id);
                           if ($Total>0) {
                             ?>
                             <span class="badge badge-danger">
                              <?php  echo $Total; ?>
                              </span>
                          <?php }  ?>


                </td>

                <td>
                  <a href="EditPost.php?id=<?php echo   $Id; ?>"><span class="btn btn-warning ">Edit</span></a>
                  <a href="DeletePost.php?id=<?php echo   $Id; ?>"><span class="btn btn-danger">Delete</span></a>
                </td>

                <td><a href="FullPost.php?id=<?php echo   $Id; ?>" target="_blank">  <span class="btn btn-primary"> Live preview </span></a></td>
              </tr>
            </tbody>

     <?php } ?>
        </table>

      </div>

    </div>




</section>







<!-- End Main Area -->

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
