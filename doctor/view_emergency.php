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

//Emergency reports from database






?>



<?php include "doctor_sidebar.php";  ?>

<section >



 <div class="col-lg-8"  id="divz">
   
   <div class="panel panel-primary">
     <div class="panel-heading">
       <h4>Emergency cases</h4>
     </div>
     <div class="body">
       <table class=" table table-striped table-responsive">
      <thead>
       <tr>
         <th>S/N</th>
         <th>Emergency Description</th>
         <th>Author</th>
         <th>Date</th>
          <th>View</th>
         <th>Trash</th>
       </tr>
        
      </thead>
      <tbody>
       <?php
          // section that deletes emergencies from database
       if (isset($_GET['del_id'])) {
         # code...
        $delete_from_db = "DELETE FROM emergency_report WHERE id = '$_GET[del_id]' ";
        $sql_query = mysqli_query($connected , $delete_from_db);
       }
          $fetch_emergencies = "SELECT * FROM emergency_report ORDER BY ID DESC";
          $sql_query = mysqli_query($connected , $fetch_emergencies);
          $serial_no_listing = 1;
           while ($rows = mysqli_fetch_array($sql_query)) {
            # code...
            $report = substr($rows['report'], 0,50);
            $author = $rows['name'];
           
            $date = $rows['emergency_date'];

            echo ' 
              <tr>
               <td>'.$serial_no_listing.'</td>
                <td>'.$report.'...</td>
                <td>'.$author.'</td>
                <td>'.$date.'</td>
                  <td><a href="open_emergency.php?emergency_id='.$rows['id'].'" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;View</a></td>
                <td><a href="view_emergency.php?del_id='.$rows['id'].'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"> Delete</span></td>
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