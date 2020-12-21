<?php

    if(isset($_POST['submit']))
    {
       $UserName = $_POST['Name'];
       $Email = $_POST['Email'];
       $Subject = $_POST['Subject'];
       $Phone = $_POST['Phone'];
       $Message = $_POST['Message'];

       if(empty($UserName) || empty($Email) || empty($Subject) || empty($Message))
       {
           header('location:Contact.php?error');
       }
       else
       {
           $mailTo = "contact@bhaleraoshubham.com";

           if(mail($mailTo,$Subject,$Message,$Email))
           {
               header("location:Contact.php?success");
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
    <link href="Css/contact.css" rel="stylesheet" type="text/css"/>
    <title>Contact</title>
    <!-- <style media="screen">

    </style> -->

  </head>
  <body>
    <!-- NAVBAR START -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar fixed-top">

      <div class="container" >
        <a href="#" class="navbar-brand Genuine" style="font-size: 35px;"> 'Shubham, </a>
          <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
             <span class="navbar-toggler-icon">    </span>
          </button>
            <div class="collapse navbar-collapse" id="navbarcollapseCMS">


          <ul class="navbar-nav align-right ml-auto RubikL" style="font-size: 25px;">


             <li class="nav-item mr-4">
                 <a href="Intro.php" class="nav-link "> Intro</a>
             </li>

             <li class="nav-item mr-4">
                 <a href="Portfolio.php" class="nav-link"> Portfolio </a>
             </li>

             <li class="nav-item mr-4">
                 <a href="Blog.php?page=1" class="nav-link"> Blog </a>
             </li>

             <li class="nav-item mr-2 active">
                 <a href="#" class="nav-link"> Contact </a>
             </li>


          </ul>


            </div>
      </div>

    </nav>
    <!-- NAVBAR END -->

<!-- Header Img Start -->
<div class="outer-div text-left">
  <img src="Css/Image/Avatar6.png" class="img-fluid d-none d-lg-block d-xl-none d-none d-xl-block"
  height="370" width="370"style="float: right; margin-right:200px; margin-top:100px;" alt="">

  <div class="inner-div jumbotron" style="background:none;">
     <h1 class="text-uppercase Genuine" style="font-size: 60px; color:white;">'Contact,</h1>
       <h4 class="text-uppercase Genuine" style="font-size: 25px; color:white;">Get in touch</h4>
   </div>
  </div>


</div>
<!-- Header Image End -->
<!-- Main Area Start -->

<div class="container-fluid">
  <div class="container ">
    <div class="row">
      <!-- Left Side Contact Details -->
      <div class="col-lg-6" >
        <div class="col-lg-12 row" style="min-height:665px;" >
        <section class="get_in_touch" >
            <h3 class="title Genuine"> 'Shubham, <br> <p style="font-size:15px;">Contact Details</p> </h3>
        <div class="container text-center" style="padding-top:-20px;">
              <img src="Css/Image/Shubham.jpg" class=" rounded-circle" height="150px;" width="150px;"alt="">
              <hr>
              <div class="col-lg-12 ">
              <p class="RubikL" style="font-size:22px; color:#004e92;"> Phone : +91-9167178295 </p>
              <p class=" RubikL" style="font-size:22px; color:#004e92;"> Email Id : shubham-bhalerao@outlook.com </p>

                    <hr>

                 <h5 class="text-uppercase contact-details Genuine " style="font-size: 20px;"> You can also contact me via : </h5>
                 <a href=""><i class="fab fa-facebook fa-2x mr-2"> </i></a>
                 <a href=""> <i class="fab fa-instagram fa-2x mr-2"> </i></a>
                 <a href=""><i class="fab fa-linkedin fa-2x mr-2"></i></a>
                 <a href=""><i class="fab fa-twitter fa-2x mr-2"></i></a>
                 <br>
                  </div>

            </div>
          </section>
        </div>

      </div>
<!-- Left Side Contact Details End -->
      <!-- Right side Contact Form Start -->
      <div class="col-lg-6" >
      <section class="get_in_touch">
          <h1 class="title Genuine"> Hello! <br> <p style="font-size:15px;">Drop a Message</p> </h1>
          <?php
                         $Msg = "";
                         if(isset($_GET['error']))
                         {
                             $Msg = " Please Fill all the feilds, Only Phone is optional ";
                             echo '<div class="alert alert-danger">'.$Msg.'</div>';
                         }

                         if(isset($_GET['success']))
                         {
                             $Msg = " Your Message Has Been Sent ";
                             echo '<div class="alert alert-success">'.$Msg.'</div>';
                         }

                     ?>

      <div class="container">
          <form class="col-lg-12" action="Contact.php" method="post">
        <div class="contact-form row">



          <div class="form-field col-lg-6">
              <input id="name" class="input-text" type="text" name="Name" value="">
            <label for="name" class="label">Name*</label>
         </div>
         <div class="form-field col-lg-6">
           <input id="email" class="input-text" type="email" name="Mail" value="">
           <label for="email" class="label">Email*</label>
        </div>
        <div class="form-field col-lg-6">
          <input id="phone" class="input-text" type="number" name="Phone" value="">
          <label for="phone" class="label">Phone</label>
       </div>
        <div class="form-field col-lg-6">
          <input id="subject" class="input-text" type="text" name="Subject" value="">
          <label for="subject" class="label">Subject*</label>
       </div>
       <div class="form-field col-lg-12">
         <input id="message" class="input-text" type="text" name="Message" rows="8" value="">
         <label for="message" class="label">Message*</label>
      </div>
      <div class="form-field col-lg-12">
        <input class="submit-btn" type="submit" name="submit" value="submit">
     </div>

        </div>
</form>
      </div>
      </section>

     </div>
     <!-- Right side Contact Form End -->
    </div>
   </div>
  </div>
  <section>
    <div class="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3768.0242339334777!2d72.96769681489357!3d19.194143853236067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b9227b91de3b%3A0xd682dc3c248cce8a!2sKasturi%20Towers%2C%20Madras%20Bombay%20Trunk%20Rd%2C%20Panch%20Pakhdi%2C%20Thane%20West%2C%20Thane%2C%20Maharashtra%20400602!5e0!3m2!1sen!2sin!4v1593092710483!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

    </div>
  </section>


<!-- Main Area End -->






    <!-- Footer Start -->
    <div class="container-fluid text-center">
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
    <div class="container-fluid text-center">
      <h4 class="RubikL" style="font-size:15px;"> <i class="far fa-copyright"></i>All Rights Reserved. Coded and Designed by Shubham Bhalerao. </h4>

    </div>
    <!-- Footer End -->
    <!-- All rights Reserved start -->

    <!-- All rights Reserved End -->














        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
      </body>


      </html>
