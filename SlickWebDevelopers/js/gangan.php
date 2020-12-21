<?php
if($_POST["submit"]) {
    $recipient="slickwebdevelopers@gmail.com"; //Enter your mail address
    $subject="Contact from Website"; //Subject 
    $sender=$_POST["name"];
    $senderEmail=$_POST["email"];
    $message=$_POST["message"];
    $mailBody="Name: $sender\nEmail Address: $senderEmail\n\nMessage: $message";
    mail($recipient, $subject, $mailBody);
    sleep(1);
    header("Location:http://www.slickwebdevelopers.in/success.html"); // Set here redirect page or destination page
}
?>


<!DOCTYPE html>
<html>
<head>
<title>
SlickWebDevelopers
</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
	  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


<!-- Latest compiled and minified JavaScript -->
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	   <link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
       <link href="https://fonts.googleapis.com/css?family=Kelly+Slab|Reem+Kufi" rel="stylesheet">
	   <script src="https://use.fontawesome.com/3a295e6b58.js"></script>
	   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	  
	   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	   <script src="https://use.fontawesome.com/3a295e6b58.js"></script>
	  

<style>
#Intro{
background-image:url("bg11.png");
color:#696969;

}

#headerbtn
{
color:white;
}

.fa-border{
 border-radius: 100px;
 }

 .navbar{
background-color:#eeeeee;
padding-top:-10px;

}
.navigation .navbar-brand {
  height: 80px;
  font-family:Kelly Slab, cursive; 
  font-size:45px;
}

.navigation .nav >li >a {
  padding-top: 30px;
  padding-bottom: 30px;
  padding-right:50px;
  font-family:"Trebuchet MS", Helvetica, sans-serif;
  font-size:20px;
 
}


.navigation .navbar-toggle {
  padding: 10px;
  margin: 25px 15px 25px 0;
}

 


#services{
background-color:#eeeeee;
padding-left:30px;

}

#contact-img{
background-image: url("contact2.jpg");
font-family: 'Montserrat', sans-serif;

}

#Contact {
padding-top:43px;
padding-bottom:43px;

}

#contact-details {
padding-top:43px;
padding-left:30px;
}

#form
{
padding-top:43px;
padding-right:30px;
}



#formbtn{
background-color:Gray;
color:white;
}






.footer{
font-family:Kelly Slab, cursive;
padding-bottom:20px;
background-image: url("footerimg.jpg");
padding-top:32px;
}

@media (min-width: 1271px) {
.image2{
width:50%;
}
}

@media (min-width: 980px) {

.image1{
width:60%;
height:500px;
}

.image2{
width:55%;
height:500px
}

.image3{
width:50%;
height:500px;
}
  
}



</style>
	 
<body>
<div class="conatainer-fluid" id="Intro" style="height:800px; width:100%;">
<img src="Logo1.gif" class="img-responsive center-block"><br>
<h1 class="text-center"style="font-family:Kelly Slab, cursive; font-size:45px;">Welcome to Slick Web Developers</h1>
<h4 class="text-center"style="font-family:Kelly Slab, cursive; font-size:21px;">We are digital agency that loves crafting beautiful websites</h4><br>
<br><br>
<a class="btn center-block" href="#navbar" id="headerbtn">
 <i class="fa fa-angle-double-down fa-4x animate fa-border "></i>
</a>



</div><!--end of Intro-->







<div class="navigation">
  <nav class="navbar navbar-default " id="navbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><h3><b>Slick Web Developers</b></h3>
        </a>
      </div>
      <div id="navbar3" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li ><a href="#">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#contact-img">Contact</a></li>
          
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
  </nav>
  </div>
</div><!-- end of  nav bar-->








 

<div class="container-fluid" id="about">


   
       <img src="gadgets1.png" alt="image" class="image1 pull-left img-responsive">
       
	     <h2 style="font-family:sans serif, arial black; font-size:45px;">Welcome!<h2>
             <h4 style="font-family:sans serif, arial; font-size:28px;color:gray;">The Possibilities Are Unlimited</h4><br>
			    <p style="font-family:sans serif, arial; font-size:22px;color:gray;">Responsive Web Design always plays important role 
				whenever going to promote your website</p>
				</br>
				
				 <h5 style="font-family:sans serif, arial; font-size:20px;">What we do?</h5>
				   <p style="font-family:sans serif, arial; font-size:16px;color:gray;">We craft beautiful websites for 
				   our precious clients.And we also
				   design logos for startups or any
				   other business.</p>
				 
				 <h5 style="font-family:sans serif, arial; font-size:20px;" >Who we are?</h5>
				   <p style="font-family:sans serif, arial; font-size:16px;color:gray;">We are Web design and development 
				   company in India.We love making websites,We hope you'll love them too.</p>
				   
				   
				   
				   
   








</div><!--end of about id-->

















<div class="container-fluid" id="services">
<h2 class="text-center" style="font-family:sans serif, arial black; font-size:45px;">Services</h2>
<h6 class="text-center" style="font-family:sans serif, arial; font-size:18px;color:gray;">We offer exceptional service with complimentary hugs</h6>


<img src="servicesnew.png" alt="servicesnew" class="image2 img-responsive pull-right" ><br><br>



<div class="row">

    <div class="col-sm-5  ">

       
    <h5 style="font-family:sans serif, arial ; font-size:30px;"> <i class="fa fa-gear fa-1x   "></i>  Web Development </h5>
     <p style="font-family:sans serif, arial ; font-size:16px;color:gray;">   We create Slick Websites.We are a Web Development company
      so it is quite obvious that We create websites. We are very reliable and Slick Web developers. </p>
    
   
     <br>


    
 
    </div><!--end of Webdevelopment desc-->
    

    <div class="col-sm-5">
     <h5 style="font-family:sans serif, arial ; font-size:30px;">  <i class="fa fa-tablet fa-1x  "></i> Responsive design </h5>

     <p style="font-family:sans serif, arial; font-size:16px;color:gray;">    Responsive web design is the keyword which you need through a site, no different versions for different devices, but your site automatically 
      reacts to the screen size and makes the layout to be compatible and the information in a flexible and optimal manner.</p>
  </div>
   
  </div><!--end of Responsive design desc-->


          <img src="branding3.png" alt="servicesnew" class="image3 img-responsive pull-left" style="height:400px width:600px;>
                       <br>
                       <br>



<div class="row">

    <div class="col-sm-6  ">

       
 <h5 style="font-family:sans serif, arial; font-size:30px;"> <i class="fa fa-ravelry fa-1.5x   "></i>  Branding and Designing </h5>
     <p style="font-family:sans serif, arial; font-size:16px;color:gray;">   Want to create your brand logo? We will do that for you.
      We design brand logos at our own <b>Design Bakery</b>. Every logo and design will be personalised according to your needs.</p>
       <br>
       <br>

    </div>
   <div class="col-sm-6">
     <h5 style="font-family:sans serif, arial; font-size:30px;">  <i class="fa fa-user-circle fa-1x  "></i>   Friendly Support  </h5>

      <p style="font-family:sans serif, arial; font-size:16px;color:gray;">   Our customer support is very friendly and understanding.If you want
       to contact us for anything related to websites, logo or design you can call us or Email us anytime.We are always available for our 
       customers.  </p>
    </div>

	
</div>
</div><!-- end of services-->

<div class="conatainer-fluid" id="contact-img" >

<p class="text-center" style="padding-top:36px;padding-bottom:36px;font-size:43px;color:white;">LET'S TALK BUSINESS.</p>
</div><!--end of contact img-->


<div class="conatainer-fluid" id="Contact">
    
	 <div class="row">
    <div class="col-md-6" >
       <div id="contact-details">
	  <p style="font-family:; font-size:20px;"><i class="fa fa-phone fa-1x  "></i><span style="padding-left:10px;">Phone :</span><span style="font-family:sans serif, arial; font-size:16px;color:gray;padding-left:10px;">   +91 9167178295 / +91 8378868784 </span> </p>
	  <br>
	  
	  
	  <p style="font-family:; font-size:20px;"><i class="fa fa-pencil fa-1x  "></i><span style="padding-left:10px;">Email :<span style="font-family:sans serif, arial; font-size:16px;color:gray;padding-left:10px;">   slickwebdevelopers@gmail.com </span> </p>
	  
	  </div>
	  <br>
	  <br><br>
	  
	  <div id="icons" class="text-center">
	  <a class="btn " href="#" >
         <i class="fa fa-facebook fa-3x "></i>
      </a>
	   	  <a class="btn " href="#" >
         <i class="fa fa-instagram fa-3x "></i>
       </a>
	  
	  </div>
	  
	  
    </div>
	<br>
	<br>
	
	
	
	
	
	
	

	
    <div class="col-md-5" >
      
	  
	  <form role = "form" method="POST">
         
   <fieldset>
      <input class = "form-control input-lg" type ="name" name="name" placeholder ="Your Name" >
	 
   </fieldset>
      <br>
	<fieldset>
      <input class = "form-control input-lg" type ="email" name="email" placeholder ="Your Email" >
	  
  </fieldset>
	  <br>
	  
	<fieldset>
      <input class = "form-control input-lg" type ="subject"  placeholder ="Subject" >
    </fieldset>
	 <br>
	  
     <fieldset id="textarea">
      <textarea class="form-control" rows="4" type="message" name="message"  placeholder="Message" id="comment" style="font-size:20px;"></textarea>
     </fieldset>
	
	<br>
	<fieldset>
	<input class=" btn btn-outline-primary btn-lg" type="submit" name="submit" value="Send Message">
     </fieldset>
    </div> 	
   
   
   
  
   
     </form>
     </div>
     
	 </div><!--end of contact-->


	
<div class="footer text-center">

  
    <p style="font-size:32px; color:white;"> Slick Web Developers</p>
     <p style="color:white">Copyright © 2017</h6>
</div><!--end of footer-->



</body>
</head>
</html>