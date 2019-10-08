<?php

include 'includes/config.php';

//section that selests users from the database

$status = '';

if (isset($_POST['submit_login'])) {
  # code...
  if ( !empty($_POST['username'])  &&  !empty($_POST['password'])) {
    # code...
    $get_user_name  = mysqli_real_escape_string($connected , $_POST['username']);
    $get_password  = mysqli_real_escape_string($connected , $_POST['password']);
    $sql = "SELECT * FROM  user WHERE email = '$get_user_name'  AND  password = '$get_password'";
    if ($result = mysqli_query($connected , $sql)) {
      # code...
      if (mysqli_num_rows($result) == 1) {
        # code...
        session_start();
        while ($rows = mysqli_fetch_array($result)) {
          # code...
          session_start();
          $_SESSION['role'] = $rows['role'];
          $_SESSION['username'] = $get_user_name;
          $_SESSION['user_id']  = $rows['id'];
          if ($rows['role'] == 'Medical Professional') {
            # code...
             header('Location: doctor/doctor_dashboard.php');
          }else{
             header('Location: patient/user_dashboard.php');
          }

        }
       
      }else{
               $status = '<div class="alert alert-danger">Wrong details</div>';
      }
    }else{
       $status = '<div class="alert alert-danger">Query Error</div>';
    }

  }else{
    $status = '<div class="alert alert-danger">Empty Form Fields!</div>';
  }

}else{

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
  </style>
	

</head>
<body class="">

<header style="margin: 0 auto;padding: none;">
  <nav class="navbar navbar-default navbar-fixed-top" style="border-radius: 0 0 10px 10px;">
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
        <li><a href="register_new.php"><span class=""><img src="img/capturec.PNG" width="25px"></span> Sign up</a></li>
        <li class=""><a href="login.php"><span class=""><img src="img/login (3).png" width="25px"></span> Patient Login</a></li>
         <li class=""><a href="doctor_login.php"><span class=""><img src="img/login (3).png" width="25px"></span> Doctor Login</a></li>
       
      </ul>
   </div><!-- /.container-fluid -->
</nav>


</header>

 
 
<div style="height: 170px;"></div>


<article>
  <div class="row">
  <div class="col-md-3">
    
  </div>

  <div class="col-md-6" id="divq">
    <div class="panel panel-primary" style="border-radius: 0;">
      <div class="panel-heading" >
        <h1 class="text-center"><span class=""><img src="img/login (3).png" width="50px"></span> Login</h1>
       
      </div>
       <?php echo $status; ?>
      <div class="panel-body">
        <form  role="form"   action="login.php" method="post">
          <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
              <label><span class="glyphicon glyphicon-user"></span> &nbsp;Username</label>
            </div>
             <div class="col-sm-8">
              <input type="text" name="username" placeholder="username"  class="form-control" >
            </div>
              
            </div>
          </div>




           <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
              <label><span class="glyphicon glyphicon-lock"></span> &nbsp;Password</label>
            </div>
             <div class="col-sm-8">
              <input type="password" name="password" placeholder="password"  class="form-control" >
            </div>
              
            </div>
          </div>


          
           <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
              
            </div>
             <div class="col-sm-8">
              <input type="checkbox" name="checkbox"  > Remember me
            </div>
              
            </div>
          </div>



           <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
             
            </div>
             <div class="col-sm-8">
              <input type="submit"   name="submit_login"  value="Login" class="form-control btn btn-primary" required style="border-radius: 0;"/>
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
<div style="height: 100px;"></div>






 
 <script src="js/ajax_jquery.js"></script> 
 <script src="js/jquery.js"></script> 
 <script src="js/bootstrap.min.js"></script>
 
</body>
</html>