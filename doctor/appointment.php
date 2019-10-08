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

//Emergency rport section
if (isset($_POST['search_submit'])) {
  # code...

  $report = $_POST['search'];
  $author = $first_name  .' '.  $last_name;
  $date   = date("Y-m-d h:i:s");
  $send_emergency_report = "INSERT INTO emergency_report (report , author , emergency_date) VALUES ('$report' , '$author' , '$date')";
  $sql_query = mysqli_query($connected , $send_emergency_report);

}

//SECTION THAT UPDATES APPOINTMENTS STATUS IN  THE DATABASE
if (isset($_GET['new_status'])) {
  # code...
  $update_sql = "UPDATE appointments set status = '$_GET[new_status]' WHERE id = '$_GET[id]'";
  $sql_query = mysqli_query($connected , $update_sql);
}


//section that selects users  from the database 
$sql = "SELECT * FROM user WHERE id = '$_GET[appointment_id]'";
$run_query = mysqli_query($connected , $sql);
while ($row = mysqli_fetch_array($run_query)) {
  # code...
  $first_name = $row['first_name'];
  $last_name  = $row['last_name'];
  $full_name  = $first_name  . '  '.$last_name;

}





?>


<?php include "doctor_sidebar.php";  ?>

<section >



 <div class="col-lg-8"  id="divz">
   
   <div class="panel panel-primary">
     <div class="panel-heading">
       <h4>Appointments</h4>
     </div>
     <div class="body">
       <table class=" table table-striped">
      <thead>
       <tr>
         <th>S/N</th>
        
        
         <th>Patient</th>
         <th>Date Sent</th> 
          <th>View</th>
          <th>Subject</th>

         <th>Status</th>
         <th>Action</th>
         <th>Trash</th>
       </tr>
        
      </thead>
      <tbody>
       <?php
          // section that deletes emergencies from database
       if (isset($_GET['del_id'])) {
          # code...
          $delete = "DELETE FROM appointments WHERE appointment_id = '$_GET[del_id]'";
          $sql_query = mysqli_query($connected , $delete);
        }
       //section that fetches appointments from the database
          $fetch_appoitments = "SELECT * FROM appointments, user WHERE appointments.user_id = user.id ORDER BY appointments.appointment_id";
          $sql_query = mysqli_query($connected , $fetch_appoitments);
          $serial_no_listing = 1;
           while ($rows = mysqli_fetch_array($sql_query)) {
            # code...
            $appointment = substr($rows['appointment'], 0,20);
            $patient = $rows['first_name'];
           
            $date = $rows['appointment_date'];
            $status = $rows['status'];
            $last_name = $rows['last_name'];
            $patient = $patient . '  '.$last_name;

           
            


            echo ' 
              <tr>
               <td>'.$serial_no_listing.'</td>
                <td>'.$patient.'</td>
               
               
                <td>'. $date .'</td>
                <td><a href="view_appointment.php?appointment_id='.$rows['appointment_id'].'" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-eye-open"></span> View</a></td>
                <td>'.$appointment.'</td>
                <td>'.($status == 'Approve' ? '<a href="appointment.php?new_status=Approved&id='.$rows['id'].'" class="btn btn-default btn-xs"><span><img src="../img/cancel.png" width="18px">&nbsp; Unapproved</span></a>' :  '<a href="appointment.php?new_status=Approve&id='.$rows['id'].'" class="btn btn-primary btn-xs"><span><img src="../img/maps-and-flags.png" width="18px">&nbsp; Approved</span></a>'  ).'</td>
               

                <td>'.($status == 'Approve' ? '<a href="appointment.php?new_status=Approved&id='.$rows['id'].'" class="btn btn-default btn-xs"><span><img src="../img/settings.png" width="18px">&nbsp; Approve</span></a>' :  '<a href="appointment.php?new_status=Approve&id='.$rows['id'].'" class="btn btn-default btn-xs"><span><img src="../img/settings.png" width="18px">&nbsp; Disapprove</span></a>'  ).'</td>
                <td><a href="appointment.php?del_id='.$rows['id'].'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a></td>

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
  <div class="clearfix"></div>
</section> 

</div>
  

</article>
</div>


<div style="height: 300px;"></div>


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