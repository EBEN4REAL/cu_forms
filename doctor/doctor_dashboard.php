<?php
session_start();
include '../includes/config.php';

//section that selects each uniques  user ID
$username = $_SESSION['username'];
  $select_from_db = "SELECT * FROM user where email = '$_SESSION[username]'";
   $sql_query = mysqli_query($connected, $select_from_db);
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
$fetch_total_users = "SELECT * FROM user WHERE role = 'Patient'";
$sql_query = mysqli_query($connected , $fetch_total_users);
$total_users = mysqli_num_rows($sql_query);

//GEtting total number of patients requests from the database
$fetch_total_requests = "SELECT * FROM requests";
$sql_query = mysqli_query($connected , $fetch_total_requests);
$total_requests = mysqli_num_rows($sql_query);

//GEtting total number of appointments from the database
$fetch_total_Appointments = "SELECT * FROM appointments";
$sql_query = mysqli_query($connected , $fetch_total_Appointments);
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




<?php include "doctor_sidebar.php";  ?>
 


   

<section >



 <div class="col-lg-8"  id="divz">
  <a href="" style="">
  
    <div class="panel panel-primary" style="border-radius: 0; transform: translateY(-20px);">
      <div class=" panel-heading" >
      <h3 class="text-center">Welcome Doctor <?php echo $name;  ?></h3>
    </div>
  
    
  </div>
  </a><br>
<div class="row" id="rowa">
  <div class="col-md-2">
     <a href="send_alerts.php" class="btn btn-primary"><img src="../img/fire-alarm.png" width="25px">  Send Broadcast mesage</a>
    


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
              <span class="badge"><?php echo $total_requests   ?></span> 
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
     <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-5">
              <img src="../img/alarm.png" width="100%">
            </div>
            <div class="col-xs-7 text-right">
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

  <!--  <div class="col-md-4">
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
       
       <div class="panel-footer"><a href="send_reminder.php"><div class="pull-left">  Send reminder</div>
        <div class="pull-right">  <i class="glyphicon glyphicon-circle-arrow-right"></i></div>
        <div class="clearfix"></div>
        </a></div>
      </div>
    </div> -->


    <div class="col-md-6">
      <div class="panel panel-success">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-5">
              <img src="../img/ambulance.png" width="100%">
            </div>
            <div class="col-xs-7 text-right">
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
          Developed by  <a href=""><strong> Learnd</strong></a> 
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