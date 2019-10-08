<?php
include 'includes/config.php';
//section that selests users from the database
// $fetch_users = "SELECT * FROM user";
// $sql_query = mysqli_query($connected , $fetch_users);
// $rows = mysqli_fetch_array($sql_query);




//section that sends users medical profile to the database
if (isset($_POST['submit'])) {
   echo $_POST['dept'];
   $student_name = $_POST['student_name'];
   $matric_number  =  $_POST['matric_number'];
   $dept = $_POST['dept'];

    $store_record = "INSERT INTO 	student_records (student_name,matric_number,dept) VALUES ('$student_name','$matric_number','$dept')";
    $sql_query = mysqli_query($connected , $store_record);


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
      background-image: url("img/bg_img.jpg");
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
      <a class="navbar-brand" href="#"><img src="img/culogo.png" width="30"></span></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       
        
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li><a href="register_new.php"><span class=""><img src="img/capturec.PNG" width="25px"></span> Sign up</a></li>
        <li class=""><a href="login.php"><span class=""><img src="img/login (3).png" width="25px"></span> Patient Login</a></li>
         <li class=""><a href="doctor_login.php"><span class=""><img src="img/login (3).png" width="25px"></span> Doctor Login</a></li>
       
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


</header>


 
<div style="height: 150px;"></div>


<article style="width: 100%">
  <div class="row">
  <div class="col-md-3">
    
  </div>

  <div class="col-md-6" id="">
    <div class="panel panel-default" style="border-radius: 0;">
      <div class="panel-heading" >
        <h1 class="text-center"><span class=""><img src="img/culogo.png" width="150px" style=" "></span></h1>
        <h3 class="text-center">Final Clearance Form</h3>
      </div>
      <div class="panel-body">
        <form class="form-vertical" role="form" class="login_form"  action="register_new.php" method="POST" style="width: 100%">
          <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
              <label><span class="glyphicon glyphicon-user"></span> &nbsp; Student  Name</label>
            </div>
             <div class="col-sm-8">
              <input type="text" name="student_name" placeholder="Student Name"  class="form-control" required>
            </div>
              
            </div>
          </div>

          <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
              <label><span class="glyphicon glyphicon-user"></span> &nbsp;Matric Number</label>
            </div>
             <div class="col-sm-8">
              <input type="text" name="matric_number" placeholder="Matric Number"  class="form-control" required>
            </div>
              
            </div>
          </div>



           <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
              <label><img src="img/mail-black-envelope-symbol.png" width="20px"> &nbsp;Department</label>
            </div>
             <div class="col-sm-8">
              <input type="text" name="dept" placeholder="Department"  class="form-control" required>
            </div>
              
            </div>
          </div>

          <div>
            <h5>You are pleae required to comment on the outstanding indebtedness of the above named student(if any)
            in order to clear him/her for graduation</h5>
          </div>
          <hr>

          <div>
            <h3>Financial Services Department</h3>
          </div>
          <hr>

           <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
              <label>Tuition/Related Fees</label>
            </div>
             <div class="col-sm-8">
              <input type="text" name="tuition_fees" placeholder="Department"  class="form-control" required>
            </div>
              
            </div>
          </div>

           <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
              <label>Make Up Resit</label>
            </div>
             <div class="col-sm-8">
              <input type="text" name="make_up_resit" placeholder="Department"  class="form-control" required>
            </div>
              
            </div>
          </div>

           <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
              <label>CMFB loan</label>
            </div>
             <div class="col-sm-8">
              <input type="text" name="cmfb_loan" placeholder="CMFB loan"  class="form-control" required>
            </div>
              
            </div>
          </div>

           <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
              <label>Laptop Loan</label>
            </div>
             <div class="col-sm-8">
              <input type="text" name="laptop_loan" placeholder="Laptop Loan"  class="form-control" required>
            </div>
              
            </div>
          </div>
          
           <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
              <label>Staff Guarantee</label>
            </div>
             <div class="col-sm-8">
              <input type="text" name="staff_guarantee" placeholder="Staff Guarantee"  class="form-control" required>
            </div>
              
            </div>
          </div>

           <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
              <label>Personal Financial Integrity</label>
            </div>
             <div class="col-sm-8">
              <input type="text" name="personal_financial_integrity" placeholder="Personal Financial IntegrityStaff Guarantee"  class="form-control" required>
            </div>
              
            </div>
          </div>

           <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
              <label>Others</label>
            </div>
             <div class="col-sm-8">
              <input type="text" name="others" placeholder="Others"  class="form-control" required>
            </div>
              
            </div>
          </div>

          <hr>
          <h3>Center for learning Resources</h3>
          <hr>
          <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
              <label>Books outstanding</label>
            </div>
             <div class="col-sm-8">
              <input type="text" name="books_outstanding" placeholder="Books Outstanding"  class="form-control" required>
            </div>
              
            </div>
          </div>

          <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
              <label>Outstanding bills on damaged books </label>
            </div>
             <div class="col-sm-8">
              <input type="text" name="others" placeholder="Others"  class="form-control" required>
            </div>
              
            </div>
          </div>

          <hr>
          <h3>Center for Systems & information Services</h3>
          <hr>

          <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
              <label>Registration Clearance</label>
            </div>
             <div class="col-sm-8">
              <input type="text" name="registration_clearance" placeholder="Registration Clearance"  class="form-control" required>
            </div>
            </div>
          </div>

          <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
              <label>Equipment Damage Clearance</label>
            </div>
             <div class="col-sm-8">
              <input type="text" name="others" placeholder="Others"  class="form-control" required>
            </div>
              
            </div>
          </div>
          

           <div class='form-group'>
            <div class="row">
            <div class="col-sm-4">
             
            </div>
             <div class="col-sm-8">
              <input type="submit"  style="border-radius: 0;" name="submit" placeholder="password"  value="Add Records" class="form-control btn btn-primary" required/>
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