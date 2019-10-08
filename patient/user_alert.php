<?php
session_start();
include '../includes/config.php';


 //section that selects each uniques  user ID
$username = $_SESSION['username'];
  $select_from_db = "SELECT * FROM user where email = '$_SESSION[username]'";
   $sql_query = mysqli_query($connected , $select_from_db);
  while ($rows = mysqli_fetch_array($sql_query)) {
    # code...
     $first_name = $username;
     $last_name = $rows['last_name'];
     $first_name = $rows['first_name'];
     $phone = $rows['phone'];
     $user_id = $rows['id'];
     $name = $first_name .'  '. $last_name;
     
 
}

//  Priviledges/security to the page

if (isset($_SESSION['username']) && isset($_SESSION['role']) && isset($_SESSION['user_id'])) {
  # code...
  $username = $_SESSION['username'];
  $select_from_db = "SELECT * FROM user WHERE first_name = '$_SESSION[username]'";

  $sql_query = mysqli_query($connected , $select_from_db);
  while ($rows = mysqli_fetch_array($sql_query)) {
    # code...
    $first_name = $username;
     $last_name = $rows['last_name'];
     
     $email = $rows['email'];

   if (mysqli_num_rows($sql_query) == 1 ) {
       if ($rows['role'] == 'Patient') {
         # code...
          header("Location: patient/user_dashboard.php");
       }else{
          #..
       }

     }else{
       header("Location: ../login.php");
     }
    }
}else{
  header('Location: ../login.php');
}
//Emergency report section
 $emergency_status = '';
if (isset($_POST['sendEmergency'])) {
  # code...

  $report = $_POST['search'];
  $author = $first_name .' '. $last_name;
  $send_emergency_report = "INSERT INTO emergency_report (report , author) VALUES ('$report' , '$author')";
  $sql_query = mysqli_query($connected , $send_emergency_report);
   $emergency_status = '<div class="alert alert-success" style="border-radius:0;">Emergency report has been sent succesfully</div>';

}else{
  $status = '';
}

//query to find the number of rows in the emergency database
$select_from_db = "SELECT * FROM emergency_report";
$sql_query = mysqli_query($connected , $select_from_db);
$num_of_rows = mysqli_num_rows($sql_query);

//Section which sends requests to the database
 $status = '';
if (isset($_POST['sendrequest'])) {
  # code...
  $date = date("Y-m-d h:i:s");
  $request = $_POST['searchrequest'];
  $patient_name = $first_name . $last_name;
  $send_request = "INSERT INTO requests (request,patient_name,request_date) VALUES ('$request' , '$patient_name' , '$date')";
  $sql_query = mysqli_query($connected , $send_request);
 $status = '<div class="alert alert-success" style="border-radius:0;">Request sent succesfully</div>';
}

//GEtting total number of patients requests from the database
$fetch_total_requests = "SELECT * FROM requests";
$sql_query = mysqli_query($connected , $fetch_total_requests);
$total_requests = mysqli_num_rows($sql_query);

//book appointment section ..sends into db
$appoitments_status = '';
if (isset($_POST['book_appointment'])) {
  # code...
  
  $appointment = $_POST['appointment'];
  $appointment_date = date("Y-m-d h:i:s");
  $patient = $_SESSION['username'];
  $insert_into_db = "INSERT INTO Appointments (appointment,appointment_date,patient) VALUES ('$appointment','$appointment_date', '$patient')";
  $sql_query = mysqli_query($connected , $insert_into_db);
  $appoitments_status = '<div class="alert alert-success">Appointment booked succesfully!</div>';
}






?>




<!DOCTYPE html>
<html>
<head>
  <title>Medical App</title>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">
  <style type="text/css">
    body{
  
  font-family: 'Josefin Slab', serif;
  margin: 0 auto;
  width: 95%;
  /*background-image: url("../img/bg.jpg");*/
  /*background-attachment: fixed;*/
}
  </style>
  

</head>
<body>
<div id="overallcontent" style="">
  <header >
   <nav class="navbar navbar-default navbar-static-top" style="border-radius: 0 0 10px 10px;">
  <div class="container-fluid"  id="nav_header">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#" style="">Medicapp</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       <li class="active">
         <a href="user_dashboard.php" ><span class="glyphicon glyphicon-home"></span></a>
        </li>
        
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
       <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" style=""><span class="glyphicon glyphicon-user"></span>  Welcome <?php echo $username; ?> <b class="caret" style=""></b></a>
               <ul class="dropdown-menu">
            
            
            <li role="separator" class="divider"></li>
            <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </li>
      
      </ul>
       
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


</header>


<article>
 
 <div class="row">
 
<div class="col-lg-4 text-center"  id="" style="color: white;transform: translateY(-20px);">
   

   <?php include 'patient_sidebar.php';  ?>








  </div>

<section >



 <div class="col-lg-8"  id="divz">
   <div class="panel panel-primary" class="table-responsive">
     <div class="panel-heading"> <h1 class="text-center ">Received Alerts</h1></div>
     <div class="panel-body">
        <table class="table table-striped table-inverse table-bordered table-hover">
      <thead>
       <tr>
         <th>S/N</th>
         <th>alert</th>
         
        


       </tr>

      </thead>
      <tbody>
       <?php
       
         //section that delete alerts from database
       if (isset($_GET['del_id'])) {
         # code...
        $delete = "DELETE FROM requests WHERE id = '$_GET[del_id]'";
        $sql_query = mysqli_query($connected , $delete);

       }
       
      
        //section that displays the specific message of the patient
           // $user_id = $_SESSION['user_id'];
          $alert = "SELECT * FROM user WHERE  id = '$user_id'";
          $sql_query = mysqli_query($connected , $alert);
          $serial_no_listing = 1;
           while ($rows = mysqli_fetch_array($sql_query)) {
            # code...
            $alert  = $rows['alert'];
           


            echo ' 
              <tr>
               <td>'.$serial_no_listing.'</td>
               <td>'. $alert.'</td>
               
           
                
              </tr>
        
             ';
            $serial_no_listing++;
              
           }



       ?>
       
      </tbody>
        
    </table>
     </div>
   </div>






  </div>
</section> 

 

</div>
  

</article>
</div>


<div style="height: 100px;"></div>


 <!--  <footer class="nav ">
    <section class="">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">&copy copyright 2017</div>
        <div class="col-md-4">
          Design by  <a href=""> Learnd</a> 
        </div>
      </div>
    </section>
  </footer> -->






 
 <script src="../js/ajax_jquery.js"></script> 
 <script src="../js/jquery.js"></script> 
 <script src="../js/bootstrap.min.js"></script>
 <script type="text/javascript">
  $('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(50).slideDown(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(50).slideUp(500);
});
 </script>
 
</body>
</html>