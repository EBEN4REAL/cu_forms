 <?php
session_start();
include '../includes/config.php';



//section that selects each unique  user ID
$username = $_SESSION['username'];
  $select_from_db = "SELECT * FROM user where email = '$_SESSION[username]'";
   $sql_query = mysqli_query($connected , $select_from_db);
  while ($rows = mysqli_fetch_array($sql_query)) {
    # code...
     $first_name  = $username;
     $last_name   = $rows['last_name'];
     $first_name  = $rows['first_name'];
     $phone       = $rows['phone'];

     $name        = $first_name .'  '. $last_name;
     
 
}

///  Priviledges/security to the page

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
  $appointments_status = '';
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
  if (empty($_POST['searchrequest'])) {
    # code...
    $status = '<div class="alert alert-danger" style="border-radius:0;">Please Enter request</div>';

  }else{
     $date = date("Y-m-d h:i:s");
  $request = $_POST['searchrequest'];
  $patient_name = $first_name .'  '. $last_name;
 
  $send_request = "INSERT INTO requests (request,status,patient_name,request_date) VALUES ('$request','Approve' , '$patient_name' , '$date')";
  $sql_query = mysqli_query($connected , $send_request);
 $status = '<div class="alert alert-success" style="border-radius:0;">Request sent succesfully</div>';
  }
 
}

//GEtting total number of patients requests from the database
// section that fetches the total number of a specific  amont of request of a user

$fetch_total_requests = "SELECT * FROM requests WHERE user_id = $_SESSION[user_id]";
$sql_query = mysqli_query($connected , $fetch_total_requests);
$total_requests = mysqli_num_rows($sql_query);


//GEtting total number of alerts from the database
$fetch_total_alerts = "SELECT * FROM alerts";
$sql_query = mysqli_query($connected , $fetch_total_alerts);
$total_alerts = mysqli_num_rows($sql_query);

//GEtting total number of patient's sent appointments from the database
$fetch_total_appointments = "SELECT * FROM appointments WHERE user_id = $_SESSION[user_id]";
$sql_query = mysqli_query($connected , $fetch_total_appointments);
$total_appointments = mysqli_num_rows($sql_query);



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
   header{
  width: 95%;
  margin: 0 auto;
  /*transform: translateY(10px);*/

}
 ul{
    background-color: white;
    cursor: pointer;
    box-shadow: 3px  3px 10px#cbcbcb ;
  }
  li{
    padding:12px;
  }
body{
  width: 95%;
  font-family: 'Josefin Slab', serif;
  margin: 0 auto;
  width: 95%;
}
article{
  width: 95%;
}
  </style>

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
 
   <div class="col-lg-4 text-center"  id="" style="color: white;transform: translateY(-40px);">
   

   <?php include 'patient_sidebar.php';  ?>

  </div>

<section >



 <div class="col-lg-8"  id="divz">
   <div class="panel panel-primary">
     <div class="panel-heading"> <h1 class="text-center ">My Sent Appointments</h1></div>
     <div class="panel-body">
        <table class=" table table-striped table-responsive">
      <thead>
       <tr>
         <th>S/N</th>
         <th>Message</th>
         
         <th>Date sent</th>
         <th>Status</th>
         <th>View</th>

         <th>Trash</th>


       </tr>

      </thead>
      <tbody>
       <?php
         //section that delete alerts from database
       if (isset($_GET['del_id'])) {
          # code...
          $delete = "DELETE FROM appointments WHERE appointment_id = '$_GET[del_id]'";
          $sql_query = mysqli_query($connected , $delete);
        }
      
        //section that displays the specific message of the patient
           $user_id = $_SESSION['user_id'];
          $fetch_requests = "SELECT * FROM appointments WHERE user_id = $_SESSION[user_id]";
          $sql_query = mysqli_query($connected , $fetch_requests);
          $serial_no_listing = 1;
           while ($rows = mysqli_fetch_array($sql_query)) {
            # code...
            $appointment = substr($rows['appointment'], 0,20);
            $date = $rows['appointment_date'];
            
            $status = $rows['status'];


            echo ' 
              <tr>
               <td>'.$serial_no_listing.'</td>
               
               <td>'.  $appointment.'...</td>
                
               <td>'.$date.'</td>
               <td>'.($status == 'Approve'? '<a href="view_request.php?new_status=Approved&id='.$rows['appointment_id'].'" class="btn btn-default btn-xs"><span class=""><img src="../img/cancel.png" width="18px"> Unapproved</span></a>' : '<a href="view_request.php?new_status=Approve&id='.$rows['appointment_id'].'" class="btn btn-primary btn-xs"><span class=""><img src="../img/maps-and-flags.png" width="18px">&nbsp; Approved</span></a>').'
                </td>
               <td><a href="view_appointments.php?appointment_id='.$rows['appointment_id'].'" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;View</a></td>
               
               <td><a href="appointments.php?del_id='.$rows['appointment_id'].'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a></td>
                
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