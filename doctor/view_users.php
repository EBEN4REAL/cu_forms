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

//Emergency report section
if (isset($_POST['search_submit'])) {
  # code...

  $report = $_POST['search'];
  $author = $first_name  .' '.  $last_name;
  $date   = date("Y-m-d h:i:s");
  $send_emergency_report = "INSERT INTO emergency_report (report , author , emergency_date) VALUES ('$report' , '$author' , '$date')";
  $sql_query = mysqli_query($connected , $send_emergency_report);

}

//GEtting total number of users from the database
$fetch_total_users = "SELECT * FROM user";
$sql_query = mysqli_query($connected , $fetch_total_users);
$total_users = mysqli_num_rows($sql_query);



//section for bulk sendidng of messages and alerts and reminders

if (isset($_POST['checkBoxArray'])) {
 # code...
foreach ($_POST['checkBoxArray'] as $checkBoxValue ) {
    # code...
   
 $bulk_options = $_POST['bulk_options'];

 switch ($bulk_options) {
     case 'Send alert':
         # code...
     $query = "UPDATE user SET alert = '$bulk_options' WHERE post_id = '$checkBoxValue'";
     $sql_query = mysqli_query($connection , $query);
         break;
     
 }


}
}






?>

<?php include "doctor_sidebar.php";  ?>

   

<section >
<div class="col-lg-8"  id="divz">
   <div class="panel panel-primary">
     <div class="panel-heading"> <h1 class="text-center ">All Users</h1></div>
     <div class="panel-body">
     <form action=""  method="">
       <table class=" table table-striped">


      <thead>
       <tr>
         <th><input type="checkbox" name="" id="selectAllBoxes"> </th>
         <th>S/N</th>
         <th>Name of Patients</th>
         <th>Location</th>
         <th>Records</th>
         <th>Send Alert</th>

       </tr>

      </thead>
      <tbody>
       <?php
       //section that fetches user medical records from the database
           $fetch_emergencies = "SELECT * FROM user where role = 'Patient'";
          $sql_query = mysqli_query($connected , $fetch_emergencies);
          $serial_no_listing = 1;

          //section that fetches the user data from thde database

          $fetch_med_profile = "SELECT * FROM user    WHERE role = 'Patient'";
          $sql_query = mysqli_query($connected , $fetch_med_profile);
          $serial_no_listing = 1;
           while ($rows = mysqli_fetch_array($sql_query)) {
            # code...
            $patient = ucfirst($rows['first_name']) .'&nbsp;&nbsp;'. ucfirst($rows['last_name']);
            $address = $rows['Location'];
            $user_id = $rows['id'];
            
           
            
            

            echo ' 
              <tr>

              <td><input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="'.$user_id.';"></td>
               <td>'.$serial_no_listing.'</td>
                <td><img src="../img/capturec.PNG"  width="30px"> '.$patient.'</td>
                <td>'.$address.'</td>
               
                <td><a href="user_record.php?user_id='.$rows['email'].'" class="btn btn-primary btn-xs" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;View Record</a></td>
                 <td><a href="send_user_alert.php?user_id='.$user_id.'" class="btn btn-success btn-xs" class="btn btn-success btn-xs"><img src="../img/fire-alarm.png" width="25px">&nbsp; Send Alert</a></td>
                
              </tr>

        
            ';
            $serial_no_listing++;
              
           }



       ?>
       
      </tbody>
        
    </table>
     <?php

         echo '
           
           <a href="send_group_alerts.php?alert_id='.$user_id.'" class="btn btn-primary"><img src="../img/fire-alarm.png" width="25px">  Send bulk alert</a>
          
         ';

        

        ?>

     </form>
        
     </div>
   </div>


   
   
  </div>
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

 <script type="text/javascript">

$(document).ready(function(){
  $('#selectAllBoxes').click(function(event){
    if (this.checked) {
        $('.checkBoxes').each(function(){
            this.checked = true;
        });
    } else{
         $('.checkBoxes').each(function(){
            this.checked = false;
        });
    }

  });
});
</script>





 
</body>
</html>