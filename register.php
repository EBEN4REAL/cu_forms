<?php
include 'includes/config.php';
//section that selests users from the database
$fetch_users = "SELECT * FROM user";
$sql_query = mysqli_query($connected , $fetch_users);
$rows = mysqli_fetch_array($sql_query);




$result = '';
if (isset($_POST['register'])) {
   $first_name = $_POST['user_first-name'];
   $last_name  =  $_POST['user_last_name'];
   $user_email = $_POST['email'];
   $password   =  $_POST['password'];
   $role = $_POST['role'];
   $location = $_POST['location'];
   $phone = $_POST['phone'];
   
  if ($_POST['password'] == $_POST['con_password']) {
    $register_user = "INSERT INTO user (first_name,last_name,Location,role,phone,email,password) VALUES ('$first_name','$last_name','$location','$role','$phone','$user_email','$password')";
    $sql= mysqli_query($connected , $register_user);

    $result = '<div class="alert alert-success">Succcess submitting your form</div>';

    

    
  }else{
    $result = '<div class="alert alert-danger" style="border-radius: 0;">Error! Passwords dont match</div>';

  }

}

//section that sends users medical profile to the database
if (isset($_POST['register'])) {
   $first_name = $_POST['user_first-name'];
   $last_name  =  $_POST['user_last_name'];
   $user_email = $_POST['email'];
   $password   =  $_POST['password'];
   $role = $_POST['role'];
   $location = $_POST['location'];
   $phone = $_POST['phone'];
   
  if ($_POST['password'] == $_POST['con_password']) {
    $register_user = "INSERT INTO medical_profile (first_name,last_name,phone,Location) VALUES ('$first_name','$last_name','$phone','$location')";
    $sql_query = mysqli_query($connected , $register_user);

 
  }else{
    
  }

}









?>



<!DOCTYPE html>
<html>
<head>
	<title>Medical App</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	 <style type="text/css">
    body{
      background-image: url("img/healthcare-telemedicine-banner.jpg");
    }
    header{
      width: 50%;
      margin: 0 auto;
    }



  </style>

</head>
<body class="">
<div id="" style="">
 <header style="margin: 0 auto;padding: none;">
  <nav class="navbar navbar-default navbar-fixed-top " style="border-radius: 0 0 10px 10px;">
  <div class="container-fluid"  id="nav_header">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Medicapp</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       <li>
         <a href="index.html" ><span class="glyphicon glyphicon-home"></span></a>
        </li>
        
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li><a href="register.php"><span class=""><img src="img/capturec.PNG" width="25px"></span> Sign up</a></li>
        <li class=""><a href="login.php"><span class=""><img src="img/login (3).png" width="25px"></span> Login</a></li>
       
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


</header>


 
<div style="height: 100px;"></div>


<article style="width: 100%">
  <div class="row">
  <div class="col-md-3">
    
  </div>

  <div class="col-md-6" id="">
    <div class="panel panel-primary" style="border-radius: 0;">
      <div class="panel-heading" >
        <h1 class="text-center"><span class=""><img src="img/up (1).png" width="50px"></span> Sign Up</h1>
      </div>
      <div class="panel-body">
       <?php  echo $result;     ?>
        <form class="form-vertical" role="form" class="login_form"  action="register.php" method="POST" style="width: 100%">
          <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
              <label><span class="glyphicon glyphicon-user"></span> &nbsp;First Name</label>
            </div>
             <div class="col-sm-8">
              <input type="text" name="user_first-name" placeholder="First name"  class="form-control" required>
            </div>
              
            </div>
          </div>

          <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
              <label><span class="glyphicon glyphicon-user"></span> &nbsp;Last Name</label>
            </div>
             <div class="col-sm-8">
              <input type="text" name="user_last_name" placeholder="Last Name"  class="form-control" required>
            </div>
              
            </div>
          </div>



           <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
              <label><img src="img/mail-black-envelope-symbol.png" width="20px"> &nbsp;Email</label>
            </div>
             <div class="col-sm-8">
              <input type="email" name="email" placeholder="Email"  class="form-control" required>
            </div>
              
            </div>
          </div>


           <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
              <label><img src="img/man-vacuum.png" width="20px"> &nbsp;Role</label>
            </div>
             <div class="col-sm-8">
              <select name="role" class="form-control"> 
                <option value="">Select your role</option>
                <option value="Patient">Patient</option>
                <option value="Medical Professional">Medical Professional</option>
              </select>
            </div>
              
            </div>
          </div>

           
            <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
              <label><img src="img/mobile-phone.png" width="20px"> &nbsp;Phone</label>
            </div>
             <div class="col-sm-8">
              <input type="text" name="phone" class="form-control">
              </select>
            </div>
              
            </div>
          </div>








           <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
              <label><span class="glyphicon glyphicon-lock"></span> &nbsp;Password</label>
            </div>
             <div class="col-sm-8">
              <input type="password" name="password" placeholder="password"  class="form-control" required>
            </div>

            
              
            </div>
          </div>

          <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
              <label><span class="glyphicon glyphicon-lock"></span> &nbsp;Password</label>
            </div>
             <div class="col-sm-8">
              <input type="password" name="con_password" placeholder="Confirm password"  class="form-control" required>
            </div>

            
              
            </div>
          </div>

           <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
              <label><span class=""><img src="img/placeholder.png" width="25px"></span> &nbsp;Location*</label>
            </div>
             <div class="col-sm-8">
             <textarea cols="" rows="5" class="form-control" id="location" name="location"></textarea>
            </div>

            
              
            </div>
          </div>

           <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
             
            </div>
             <div class="col-sm-8">
              <input type="submit"  style="border-radius: 0;" name="register" placeholder="password"  value="Sign Up" class="form-control btn btn-primary" required/>
            </div>
              
            </div>
          </div>
        </form>
      </div>
    </div>

    
  </div>

  <div class="col-md-3">
    
  </div>


</div>

</article>
</div>

<div style="height: 100px;"></div>

<!-- <footer class="nav navbar-default">
    <section class="footer_section">
      <div class="row" style="color: black;">
        <div class="col-md-1"></div>
        <div class="col-md-7">&copy copyright 2017</div>
        <div class="col-md-3">
          Design by  <a href="">Eben</a> 
        </div>
      </div>
    </section>
  </footer>
 -->





 
 <script src="js/ajax_jquery.js"></script> 
 <script src="js/jquery.js"></script> 
 <script src="js/bootstrap.min.js"></script>
 
</body>
</html>