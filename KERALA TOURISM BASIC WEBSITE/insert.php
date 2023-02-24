<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="web.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>REGISTRATION</title>
</head>

<body style="background-color: lightcoral;">

<!-- navtop -->
<div class="navtop" style="color: white;">
    <a href="https://www.facebook.com/gujtourism/" class="fa fa-facebook "></a>
    <a href="https://www.instagram.com/gujarattourism/" class="fa fa-instagram "></a> 
    <a class="fa fa-phone">-1800 203 1111</a> 
    <a href="mailto:vksp199@gmail.com" class="fa fa-envelope ">-info@gujarattourism.com</a>
  </div>
  

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand"> <img src="image/logo.jpg" class="img img-responsive" alt="its an image"> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav text-center">
                <li class="nav-item active"><a href="index.html" class="nav-link">HOME</a></li>
                <li class="nav-item"><a href="exp.html" class="nav-link">EXPLORE</a></li>
                <li class="nav-item"><a href="about.html" class="nav-link">ABOUT KERALA</a></li>
                <li class="nav-item"><a href="reg.html" class="nav-link">REGISTER FOR THE TOUR</a></li>
            </ul>
        </div>
    </nav>
    <hr/>



<!-- form -->
<div class="container insert" style="color: teal;background-color: white;text-align:center;margin-top:50px;padding-top:20px;padding-bottom:20px;border-radius:20px;">
<?php
$username = $_POST['username'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phoneCode = $_POST['phoneCode'];
$phone = $_POST['phone'];
if (!empty($username) || !empty($password) || !empty($gender) || !empty($email) || !empty($phoneCode) || !empty($phone)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "youtube";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From register Where email = ? Limit 1";
     $INSERT = "INSERT Into register (username, password, gender, email, phoneCode, phone) values(?, ?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $stmt->store_result();
     $stmt->fetch();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssii", $username, $password, $gender, $email, $phoneCode, $phone);
      $stmt->execute();
      echo "Registration successful-We will notify/call you on your email/phone number for furthur details.";
     } else {
         echo "Someone already register using this email.Try another email-id";
         }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>
</div>
   <br><br><hr/>    
<!-- footer -->

  <footer class="footer-distributed">
      <div class="footer-left"> <img src="image/logo.jpg">
        <p class="footer-links"> <a href="index.html">Home</a> | <a href="exp.html">Explore</a> | <a href="about.html">About</a> | <a href="reg.html">Register</a></p>
      </div>
      <div class="footer-center">
          <div> <i class="fa fa-map-marker"></i>
              <p>Udyog Bhavan, Block No. 16,
                4th Floor, Sector-11,
               <span>kochi - 382 011.</span> </p>
          </div>
          <div> <i class="fa fa-phone"></i>
              <p>1800 203 1111</p>
          </div>
          <div> <i class="fa fa-envelope"></i>
              <p><a href="mailto:vksp199@gmail.com">info@keralatourism.com</a></p>
          </div>
      </div>
      <div class="footer-right">
          <p class="footer-company-about"> <span>About KERALA</span>Named as one of the ten paradises of the world by National Geographic Traveler, Kerala is famous especially for its ecotourism initiatives and beautiful backwaters. Its unique culture and traditions, coupled with its varied demography, have made Kerala one of the most popular tourist destinations in the world.</p>
          <div class="footer-icons"> <a href="https://www.facebook.com/gujtourism/"><i class="fa fa-facebook"></i></a> <a href="https://www.instagram.com/gujarattourism/"><i class="fa fa-instagram"></i></a> </div>
      </div>
  </footer>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>