<?php require_once("Includes/DB.php");?>
<?php require_once("Includes/Functions.php");  ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php
if (isset($_SESSION["UserId"])) {
Redirect_to("Dashboard.php");
}



if (isset($_POST["submit"])) {
 $UserName = $_POST["Username"];
 $Password = $_POST["Password"];
  if (empty($UserName) || empty($Password)) {
    $_SESSION["ErrorMessage"] = "All fields must be filled out";
    Redirect_to("Login.php");
  }else {
  $Found_Account = Login_Attempt($UserName,$Password);
  if ($Found_Account) {

    $_SESSION["UserId"]=$Found_Account["id"];
    $_SESSION["UserName"]=$Found_Account["username"];
    $_SESSION["AdminName"]=$Found_Account["aname"];
  $_SESSION["SuccessMessage"] = "Welcome ".$_SESSION["AdminName"];
  if (isset($_SESSION["TrackingURL"])) {
Redirect_to($_SESSION["TrackingURL"]);
}else {
  Redirect_to("Dashboard.php");
}

  }else {
    $_SESSION["ErrorMessage"] = "Incorrect Username/Password";
    Redirect_to("Login.php");
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
    <title>Login</title>

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

      </div>

    </div>

  </div>
</header>

<br>



<!-- Header End -->

<!-- Main Area Start -->
<section class="container py-2 mb-4">
  <div class="row">
    <div class="offset-sm-3 col-sm-6" style="min-height:610px; ">

      <br><br><br><br>
      <?php
            echo ErrorMessage();
            echo SuccessMessage();
       ?>
      <div class="card bg-secondary text-light">
        <div class="card-header">
          <h4>Welcome Back !</h4>
        </div>

          <div class="card-body bg-dark">
          <form class="" action="Login.php" method="post">
            <div class="form-group">
              <label for="username"> <span class="FieldInfo"> Username: </span>   </label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text text-white bg-info"> <i class="fas fa-user"></i> </span>
                </div>
                <input type="text" class="form-control" name="Username" id="username" value="">

              </div>

            </div>
            <div class="form-group">
              <label for="password"> <span class="FieldInfo"> Password: </span>   </label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text text-white bg-info"> <i class="fas fa-lock"></i> </span>
                </div>
                <input type="password" class="form-control" name="Password" id="password" value="">

              </div>

            </div>
            <input type="submit" name="submit" class="btn btn-info btn-block" value="Login">


          </form>

        </div>

      </div>

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
