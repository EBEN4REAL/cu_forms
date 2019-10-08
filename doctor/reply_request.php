<?php
session_start();
include '../includes/config.php';

///section that selects each uniques  user ID
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

//section that replies to users request from the database
$message = '';
if (isset($_POST['reply_request'])) {
  # code...
   if (isset($_GET['req_id'])) {
  # code...
  $request_id = $_GET['req_id'];
  $reply = $_POST['reply'];
  $sql = "UPDATE requests SET reply = ' $reply'  WHERE id = '$request_id'";
  $sql_query = mysqli_query($connected , $sql);

  $message = '<div class="alert alert-success" style="border-radius:0">Reply sent Successfully!</div>';

  }
  
}







?>




<?php include "doctor_sidebar.php";  ?>
 
 


   

<section >
<div class="col-lg-8"  id="divz">
   <div class="panel panel-primary">
     <div class="panel-heading"> <h1 class="text-center ">Received Requests</h1></div>
     <div class="panel-body">
        <table class=" table table-striped">
      <thead>
       <tr>
         <th>S/N</th>
         <th>Requests</th>
         <th>Sender</th>
        
         <th>Status</th>
         <th>Reply</th>
         <th>Trash</th>


       </tr>

      </thead>
      <tbody>
       <?php
         if (isset($_GET['del_id'])) {
          # code...
           $delete_from_db = "DELETE FROM requests WHERE id = '$_GET[del_id]'";
           $sql_query = mysqli_query($connected , $delete_from_db);
        }

        //section that opens up a selected request
        if (isset($_GET['req_id'])) {
          # code...

          $fetch_emergencies = "SELECT * FROM requests WHERE id = '$_GET[req_id]'";
          $sql_query = mysqli_query($connected , $fetch_emergencies);
          $serial_no_listing = 1;
           while ($rows = mysqli_fetch_array($sql_query)) {
            # code...
            $request = $rows['request'];
            // $patient = $rows['name'];
             $status = $rows['status'];
             $reply = $rows['reply'];
            echo ' 
              <tr>
               <td>'.$serial_no_listing.'</td>
               <td>'. $request.'</td>
               <td></td>
                <td>'.($status == 'Approve'? '<a href="view_request.php?new_status=Approved&id='.$rows['id'].'" class="btn btn-default btn-xs"><span class=""><img src="../img/cancel.png" width="18px"> Unapproved</span></a>' : '<a href="view_request.php?new_status=Approve&id='.$rows['id'].'" class="btn btn-primary btn-xs"><span class=""><img src="../img/maps-and-flags.png" width="18px">&nbsp; Approved</span></a>').'
                </td>
                 <td>'.$reply.'</a>
                </td>
              
               <td><a href="view_request.php?del_id='.$rows['id'].'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a></td>
                
              </tr>
        
            ';
            $serial_no_listing++;
              
           }
        }
       



       ?>
       
      </tbody>
        
    </table>
     </div>
   </div>
   
  </div>
</section>

<div class="row">
<div class="col-lg-3">
  
</div>
<div class="col-lg-6">
   <form action="" method="post" role="form" >
    <div class="input-group">
      <input type="text" name="reply" class="form-control" style="border-radius: 0px" placeholder="Enter reply here...">
    
    <div class="input-group-btn">
      <button  type="submit" name="reply_request" class="btn  btn-primary" class="form-control" style="border-radius: 0px"><i class="">Reply</i></button>
    </div>
   </div>
  </form>
  <?php echo $message ;  ?>
</div>
<div class="col-lg-3">
  
</div>
 
   
</div>

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