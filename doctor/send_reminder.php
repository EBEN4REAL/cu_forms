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

//query to find the number of rows in the emaergency database
$select_from_db = "SELECT * FROM emergency_report";
$sql_query = mysqli_query($connected , $select_from_db);
$num_of_rows = mysqli_num_rows($sql_query);

//GEtting total number of users from the database
$fetch_total_users = "SELECT * FROM user";
$sql_query = mysqli_query($connected , $fetch_total_users);
$total_users = mysqli_num_rows($sql_query);

//GEtting total number of patients requests from the database
$fetch_total_requests = "SELECT * FROM requests";
$sql_query = mysqli_query($connected , $fetch_total_requests);
$total_users = mysqli_num_rows($sql_query);

//GEtting total number of appointments from the database
$fetch_total_Appointments = "SELECT * FROM Appointments";
$sql_query = mysqli_query($connected , $fetch_total_requests);
$total_Appointments = mysqli_num_rows($sql_query);


//GEtting total number of alerts from the database
$fetch_total_alerts = "SELECT * FROM alerts";
$sql_query = mysqli_query($connected , $fetch_total_alerts);
$total_alerts = mysqli_num_rows($sql_query);

//GEtting total number of alerts from the database
$fetch_total_alerts = "SELECT * FROM alerts";
$sql_query = mysqli_query($connected , $fetch_total_alerts);
$total_alerts = mysqli_num_rows($sql_query);



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
  width: 80%;
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


  </style>

  

</head>
<body class="">
<div style="height: 50px;"></div>

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
         <a href="doctor_dashboard.php" ><span class="glyphicon glyphicon-home"></span></a>
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
  <div class="col-lg-4 text-center" style="" id="" >
    <div class="panel panel-primary" style="margin-bottom: 40px; border-radius: 0;" >
    <div class="panel-heading">
   
     <img src="../img/surgeon (1).png" class="img-circle"  width="100%" height=""><br>
    <h4><?php echo    $name ;   ?></h4>
    <img src="../img/mobile-phone.png" width="20px"><?php echo $phone; ?><br>
    <h5><strong>Role: </strong> <?php echo $_SESSION['role']; ?> </h5>
    <hr class="page-heading">


  
   
  
  </div>


  </div>

  
  </div>
 
 


   

<section >



 <div class="col-lg-8"  id="divz">
  
<div class="row" id="rowa">
  <div class="col-md-2">
     <a href="send_alerts.php" class="btn btn-primary"><img src="../img/appointment.png" width="25px">Send Alert</a>
    


  </div>

   <div class="col-md-2">
    
  </div>
   <div class="col-md-6">
   <form class="">
        <div class="input-group">
            <input type="search" name="members" id="members" value="" class="form-control" placeholder="Find users..." id="search">
            <div class="input-group-btn">
              <button type="submit" name="search_submit" class="btn btn-danger "><i class="glyphicon glyphicon-search"></i></button>
            </div>
          </div>
          
      </form>
      <div class="membersList "></div>
  </div>
</div><br><br>


   <div class="row">
     <div class="col-md-4">
      <div class="panel panel-warning">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <img src="../img/stethoscope (1).png">
            </div>
            <div class="col-xs-9 text-right">
             <a href="">
              <div style="">
              <span class="badge"><?php echo $total_users;   ?></span> 
              </div>
              <div>
               Requests
              </div>
              </a>
             
            </div>
          </div>
        </div>
        <div class="panel-footer"><a href="view_request.php"><div class="pull-left"> View Requests</div>
        <div class="pull-right">  <i class="glyphicon glyphicon-circle-arrow-right"></i></div>
        <div class="clearfix"></div>
        </a></div>
      </div>
    </div>

   <div class="col-md-4">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <img src="../img/group (2).png">
            </div>
            <div class="col-xs-9 text-right">
             <a href="">
              <div style="">
                Users
              </div>
              <div>
               <span class="badge"><?php echo $total_users;   ?></span> 
              </div>
              
              </a>
             
            </div>
          </div>
        </div>
          <div class="panel-footer"><a href="view_users.php"><div class="pull-left"> View Patients</div>
        <div class="pull-right">  <i class="glyphicon glyphicon-circle-arrow-right"></i></div>
        <div class="clearfix"></div>
        </a></div></div>
    </div>


    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <img src="../img/moving-truck-on-reminder-calendar-page.png">
            </div>
            <div class="col-xs-9 text-right">
             <a href="">
              <div style="">
                 <span style="">Appointment</span> 
              </div>
              <div>
                <span style="color: ;" class="badge"><?php echo $total_Appointments;  ?></span> 
              </div>
              
              </a>
             
            </div>
          </div>
        </div>
        <div class="panel-footer"><a href="appointment.php"><div class="pull-left">  Appointments</div>
        <div class="pull-right">  <i class="glyphicon glyphicon-circle-arrow-right"></i></div>
        <div class="clearfix"></div>
        </a></div>
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
              <span style="" class="badge"><?php echo $total_alerts;  ?></span> 
              </div>
              <div>
               <span style="color: red;" >Alerts</span> 
              </div>
              </a>
             
            </div>
          </div>
        </div>
         <div class="panel-footer"><a href="view_alerts.php"><div class="pull-left"> View Alerts</div>
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
              <img src="../img/wristwatch-on-calendar-page.png">
            </div>
            <div class="col-xs-9 text-right">
             <a href="">
              <div style="">
                Reminder
              </div>
              <div>
                <span class="badge">5</span>
              </div>
              
              </a>
             
            </div>
          </div>
        </div>
         <form method="post" action="send_reminder.php">
          <input type="text" name="send_reminder" class="form-control">
        </form>
       <div class="panel-footer"><a href="view_request.php"><div class="pull-left">  Send reminder</div>
        <div class="pull-right">  <i class="glyphicon glyphicon-circle-arrow-right"></i></div>
        <div class="clearfix"></div>
        </a></div></div>
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
        <div class="panel-footer"><a href="view_emergency.php"><div class="pull-left"> Emergency cases</div>
        <div class="pull-right">  <i class="glyphicon glyphicon-circle-arrow-right"></i></div>
        <div class="clearfix"></div>
        </a></div>
      </div>
    </div>
   
   </div><br>

    <div class="row">
     <div class="col-sm-2">
       
     </div>
     
     <div class="col-sm-2">
       
     </div>

   </div>
    
  </div>
</section> 

</div>
  

</article>






</div>
<div style="height: 200px;"></div>



  <footer class="nav ">
    <section class="">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">&copy copyright 2017</div>
        <div class="col-md-4">
          Design by  <a href=""> Learnd</a> 
        </div>
      </div>
    </section>
  </footer>




 
  <script src="../js/jquery-1.2.6.min.js"></script>
  <script src="../js/ajax_jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
 <script type="text/javascript">
  $('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(50).slideDown(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(50).slideUp(500);
});
 </script>

 <script type="text/javascript">
$(document).ready(function(){
  $('#members').keyup(function(){
    var query = $(this).val();
    if (query != "") {
      $.ajax({
            url:"search.php",
            method: "POST",
            data: {query: query},
            success:function(data){
              $('.membersList').slideDown(500);
              $('.membersList').html(data);
            }
      });
    };

  });
});
$(document).on('click', 'li' , function(){
   $('#members').val($(this).text());
   $('.membersList').slideUp(500);

});


</script>


 
</body>
</html>