<?php
session_start();
include '../includes/config.php';
 //


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

     $name = $first_name .'  '. $last_name;
 
}
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

     $full_name = $first_name .' '. $last_name;
 
}

//section that selects each user's sent emergency report
$username = $_SESSION['username'];
  $select_from_db = "SELECT * FROM emergency_report where user_id = $_SESSION[user_id]";

   $sql_query = mysqli_query($connected , $select_from_db);
  while ($rows = mysqli_fetch_array($sql_query)) {
    # code...
     
     // $author = $rows['author'];
    
    
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

//Emergency report section... sends to db
 $emergency_status = '';
  $appointments_status = '';
if (isset($_POST['sendEmergency'])) {
  # code...

  $report   = $_POST['search'];
   $user_id  = $_SESSION['user_id'];


  $author = $name;
  $send_emergency_report = "INSERT INTO emergency_report (report, user_id,name) VALUES ('$report', '$user_id'  ,'$name')";
  $sql_query = mysqli_query($connected , $send_emergency_report);
   $emergency_status = '<div class="alert alert-success" style="border-radius:0;">Emergency report has been sent succesfully</div>';

}else{
  $status = '';
}



//Section which sends requests to the database
 $status = '';
if (isset($_POST['sendrequest'])) {
  # code...
  if (empty($_POST['searchrequest'])) {
    # code...
    $status = '<div class="alert alert-danger" style="border-radius:0;">Please Enter request</div>';

  }else{
     $date = date("Y-m-d h:i:s");
  $request = $_POST['searchrequest'];
  
  $user_id  = $_SESSION['user_id'];
  $send_request = "INSERT INTO requests (request,status,request_date,user_id) VALUES ('$request','Approve' , '$date' , '$user_id')";
  $sql_query = mysqli_query($connected , $send_request);
 $status = '<div class="alert alert-success" style="border-radius:0;">Request sent succesfully</div>';
  }
 
}

//GEtting total number of patients requests from the database
// section that fetches the total number of a specific  amont of request of a user

$fetch_total_requests = "SELECT * FROM requests WHERE user_id=  $_SESSION[user_id]";
$sql_query = mysqli_query($connected , $fetch_total_requests);
$total_requests = mysqli_num_rows($sql_query);


//GEtting total number of alerts from the database
$fetch_total_alerts = "SELECT * FROM alerts";
$sql_query = mysqli_query($connected , $fetch_total_alerts);
$total_alerts = mysqli_num_rows($sql_query);

//GEtting total number of patient's sent appointments from the database
$fetch_total_appointments = "SELECT * FROM appointments WHERE user_id =  $_SESSION[user_id]";
$sql_query = mysqli_query($connected , $fetch_total_appointments);
$total_appointments = mysqli_num_rows($sql_query);

//query to find the number of rows in the emergency database
$select_from_db = "SELECT * FROM emergency_report where user_id =  $_SESSION[user_id]";
$sql_query = mysqli_query($connected , $select_from_db);
$num_of_rows = mysqli_num_rows($sql_query);


//section that fetches all users medical record from the database

$fetch_medical_profile = "SELECT * FROM  medical_profile WHERE  user_id =  $_SESSION[user_id]";
$sql_query = mysqli_query($connected , $fetch_medical_profile);
$rows = mysqli_fetch_assoc($sql_query) ;
  # code...
  $age = $rows['age'];
  $height = $rows['height'];
  $weight = $rows['weight'];
  $last_visit = $rows['last_visit'];
  $sickness = $rows['sickness'];
  $email = $rows['email'];








?>



<!DOCTYPE html>
<html>
<head>
  <title>Medical App</title>
   <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
 <!--  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet"> -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

  
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 
</head>
<body>
<div id="overallcontent" style="">
  <header  style="margin-top: 10px">
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
 
   <div class="col-lg-4 text-center"  id="" style="color: white;transform: translateY(-45px); ">
   

   <?php include 'patient_sidebar.php';  ?>

  





  </div>

<section >



 <div class="col-lg-8"  id="divz">
  <a href="" style="">
  
    <div class="panel panel-primary" style="border-radius: 0; transform: translateY(-20px);">
      <div class=" panel-heading" >
      <h1 class="text-center">Welcome  <?php echo $name;  ?></h1>
    </div>
  
    
  </div>
  </a>
  <!-- <?php echo  $appoitments_status ; ?> -->
<div class="row" id="rowa">
  <div class="col-md-2">

   <form method="post" action="book_appointment.php">
     
     <button type="submit" name="book_appointment" class="btn btn-primary"><img src="../img/appointment.png" width="25px">Book Appointment</button>
      <input type="hidden" name="appointment" class="form-control" value="An Appointment has been booked">
     </form>
  </div>
  
     
  <div class="col-md-2">
    
  </div>
   <div class="col-md-8">
   <?php echo $emergency_status;  ?>
   <form class="" method="post" action="user_dashboard.php">
        <div class="input-group">
            <input type="search" name="search" value="" class="form-control" placeholder="report emergency...">
            <div class="input-group-btn">
              <button type="submit" name="sendEmergency" class="btn btn-danger"><i class="">Send report</i></button>
            </div>
          </div>
         
      </form>
  </div>
</div><br><br>


   <div class="row">
     <div class="col-md-6">
      <div class="panel panel-warning">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-5">
              <img src="../img/confirm-schedule.png" width="100%">
            </div>
            <div class="col-xs-7 text-right">
             <a href="">
              <div style="">
              <span class="badge"><?php echo $total_requests;  ?></span> 
              </div>
              <div>
                Requests
              </div>
              </a>
             
            </div>
          </div>
        </div>
        <?php 
        // print_r($_SESSION['user_id']);

        $fetch_requests = "SELECT * FROM requests";
        $sql_query = mysqli_query($connected , $fetch_requests);
        $rows = mysqli_fetch_assoc($sql_query);
        
           echo '
          
            <div class="panel-footer"><a href="requests.php"><div class="pull-left"> View Requests</div>
        <div class="pull-right">  <i class="glyphicon glyphicon-circle-arrow-right"></i></div>
        <div class="clearfix"></div>

        ';

        ?>
      
        </a>
        </div>
      </div>
    </div>

   <!-- <div class="col-md-4">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <img src="../img/stethoscope (1).png">
            </div>
            <div class="col-xs-9 text-right">
             <a href="">
              <div style="">
                Medications received
              </div>
              <div>
               <span class="badge">4</span> 
              </div>
              
              </a>
             
            </div>
          </div>
        </div>
        <div class="panel-footer"><a href="view_request.php"><div class="pull-left">  Medications</div>
        <div class="pull-right">  <i class="glyphicon glyphicon-circle-arrow-right"></i></div>
        <div class="clearfix"></div>
        </a></div>
      </div>
    </div>
 -->
 
    <div class="col-md-6">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-5">
              <img src="../img/appointment.png" width="100%">
            </div>
            <div class="col-xs-7 text-right">
             <a href="view_appointments.php">
              <div style="">
                 <span style="color: white;">Appointment</span> 
              </div>
              <div>
                <span style="color: ;" class="badge"><?php echo $total_appointments;  ?></span> 
              </div>
              
              </a>
             
            </div>
          </div>
        </div>
        <div class="panel-footer"><a href="appointments.php"><div class="pull-left">  Appointments</div>
        <div class="pull-right">  <i class="glyphicon glyphicon-circle-arrow-right"></i></div>
        <div class="clearfix"></div>
        </a></div>
      </div>
    </div>
   
   </div><br>

  


   <div class="row">
     <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <img src="../img/alarm.png">
            </div>
            <div class="col-xs-9 text-right">
             <a href="">
              <div style="">
              <span style="" class="badge"><?php echo $total_alerts ;?></span> 
              </div>
              <div>
               <span style="color: red;">Broadcast</span> 
              </div>
              </a>
             
            </div>
          </div>
        </div>
        <div class="panel-footer"><a href="view_alerts.php"><div class="pull-left">  Broadcast Messages</div>
        <div class="pull-right">  <i class="glyphicon glyphicon-circle-arrow-right"></i></div>
        <div class="clearfix"></div>
        </a></div>
      </div>
    </div>

   <div class="col-md-4">
      <div class="panel panel-danger">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <img src="../img/battery.png">
            </div>
            <div class="col-xs-9 text-right">
             <a href="">
              <div style="">
               Alerts
              </div>
              <div>
                <span class=""></span>
              </div>
              
              </a>
             
            </div>
          </div>
        </div>
        <div class="panel-footer"><a href="user_alert.php"><div class="pull-left">  See  Alert </div>
        <div class="pull-right">  <i class="glyphicon glyphicon-circle-arrow-right"></i></div>
        <div class="clearfix"></div>
        </a></div>
      </div>
    </div>


    <div class="col-md-4">
      <div class="panel panel-success">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <img src="../img/ambulance.png">
            </div>
            <div class="col-xs-9 text-right">
             <a href="">
              <div style="">
                 Emergency Cases
              </div>
              <div>
               <span class="badge"><?php echo $num_of_rows;  ?></span> 
              </div>
              
              </a>
             
            </div>
          </div>
        </div>
        <div class="panel-footer"><a href="emergency.php"><div class="pull-left"> Emergency cases </div>
        <div class="pull-right">  <i class="glyphicon glyphicon-circle-arrow-right"></i></div>
        <div class="clearfix"></div>
        </a></div>
      </div>
    </div>
   
   </div><br>

    <div class="row">
     <div class="col-sm-6">
      <a href="medical_profile.php" class="btn btn-primary" style="border-radius: 0px"><span class="glyphicon glyphicon-plus"></span> Add Medical Profile here</a>
       
     </div>
     <div class="col-sm-6">
        <form class="" role="form" action="user_dashboard.php" method="post">
        <div class="input-group">
            <input type="search" name="searchrequest" value="" class="form-control" placeholder="Enter your request">
            <div class="input-group-btn">
              <button type="submit" name="sendrequest" class="btn btn-danger"><i class="">Send enquiries</i></button>
            </div>
          </div>
      </form>
        <?php if (isset($_POST['sendrequest'])) {
          # code...
          echo  $status;
        }else{

        }

         ?>
     </div>

     





    <!--  <div class="col-sm-2">
     
     </div> -->

   </div><br><br>

     <div id="columnchart_material" style="width:auto; height: 270px;">
    <div class="row">
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
          <?php

    $element_text   = ['Requests' , 'Appointments' , 'Broadcasts', 'Emergencies'];
    $element_count   = [$total_requests ,$total_appointments,  $total_alerts ,$num_of_rows ];


           for($i = 0; $i < 4;  $i++){
            echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";

           }







          

          ?>
          // ['Posts', 1000],
         
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
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