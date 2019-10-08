<?php
session_start();
require('../includes/core.inc.php');
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
  
    <div class="panel panel-primary" style="border-radius: 0;">
      <div class=" panel-heading" >
      <h3 class="text-center">Welcome  <?php echo $name;  ?></h3>
    </div>
  
    
  </div>
  </a><br>
 <!-- Messages section starts -->
 <div class="row">
   <div class="col-xs-7">
       <div class="well"  id="messages" style="transform: translateY(5px);">
    
      </div>
<!-- Messages section ends -->
<div class="" >
   <div class="row" id="chat_section" >
       <div id="feedback"></div>
         <form action="#" method="post" id="form_input" style="transform: translateY(50px);">

           <div class="col-xs-10">
             <div class="form-group">

               <textarea  name="message" id="message" class="form-control" placeholder="Enter your message..."></textarea>
               
             </div>
            </div>
             <div class="col-xs-2">
             <div class="form-group">
               <button type="submit" name="send" id="send"   class=" btn btn-primary" style="" ><span>Send </span><b style="font-size: 30px; "></b></button>
             </div>
           </div>

          <?php 
          

           echo '
             <input type="hidden" name="sender" id="sender" value="'. $name.'">

           ';



           ?>
         </form>
        </div>
</div>
   </div>
   <div class=" well col-xs-5">
     <div class="panel panel-primary" style="border-radius: 0;">
      <div class=" panel-heading" >
      <h3 class="text-center">Conversations</h3>
    </div>
   </div>
   

    <a class="list-group-item  " href="">
      <div class="col-sm-2"><img src="../img/user.png" width="20px"></div>
      <div class="col-sm-8">
        <p class="list-group-item-text">Igbinoba Ebenezer</p>
      </div>
      <div style="clear:both;"></div>
      </a>

       <a class="list-group-item  " href="">
      <div class="col-sm-2"><img src="../img/user.png" width="20px"></div>
      <div class="col-sm-8">
        <p class="list-group-item-text">Samuel Ojumah</p>
      </div>
      <div style="clear:both;"></div>
      </a>

       <a class="list-group-item  " href="">
      <div class="col-sm-2"><img src="../img/user.png" width="20px"></div>
      <div class="col-sm-8">
        <p class="list-group-item-text">Daniel Irokazi</p>
      </div>
      <div style="clear:both;"></div>
      </a>

      <a class="list-group-item  " href="">
      <div class="col-sm-2"><img src="../img/user.png" width="20px"></div>
      <div class="col-sm-8">
        <p class="list-group-item-text">Prisca Peters</p>
      </div>
      <div style="clear:both;"></div>
      </a>

       <a class="list-group-item  " href="">
      <div class="col-sm-2"><img src="../img/user.png" width="20px"></div>
      <div class="col-sm-8">
        <p class="list-group-item-text">Gbenga Aeoye</p>
      </div>
      <div style="clear:both;"></div>
      </a>

       <a class="list-group-item  " href="">
      <div class="col-sm-2"><img src="../img/user.png" width="20px"></div>
      <div class="col-sm-8">
        <p class="list-group-item-text">Chima Powerful</p>
      </div>
      <div style="clear:both;"></div>
      </a>

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




 
  <!-- <script src="../js/jquery-1.2.6.min.js"></script> -->
  <script src="../js/ajax_jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/auto_chat.js"></script>
 <script src="../js/send.js"></script>

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


var objDiv = document.getElementById("messages");
objDiv.scrollTop = objDiv.scrollHeight;



</script>


<script>
$(function () {
  setInterval(function() {
    var element = document.getElementById("messages");
    element.scrollTop = element.scrollHeight;
  }, 0);
});
</script>



 
</body>
</html>