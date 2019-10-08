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

  $report = $_POST['search'];

  $author = $first_name .' '. $last_name;
  $send_emergency_report = "INSERT INTO emergency_report (report , author) VALUES ('$report' , '$author')";
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
  $patient_name = $first_name .'  '. $last_name;
 
  $send_request = "INSERT INTO requests (request,status,patient_name,request_date) VALUES ('$request','Approve' , '$patient_name' , '$date')";
  $sql_query = mysqli_query($connected , $send_request);
 $status = '<div class="alert alert-success" style="border-radius:0;">Request sent succesfully</div>';
  }
 
}



//section that fetches all users medical record from the database

$fetch_medical_profile = "SELECT * FROM  medical_profile WHERE  email = '$username'";
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
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">


  <style type="text/css">
    
    #chat_room{
  width: 325px;
  height: 200px;
  color: black;
}
#chat{
  margin-top: 70px;
  transform: translateY(50px);
}
#messages{
  width: 100%;
  height: 400px;
  transform: translateY(-60px);
  overflow: auto;

}
#message{
 /* */height: 100px;
  
}
#send{
  border-radius: 50%;
  padding: 20px;
  margin-right: none;
  border: 1px solid white;


}


#chat_section{
  transform: translateY(-50px);
}
body{
  width: 95%;
  margin: 0 auto;
}


  </style>
  <style type="text/css">
   header{
  width: 95%;
  margin: 0 auto;
  transform: translateY(10px);

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
 
   <div class="col-lg-4 text-center"  id="" style="transform: translateY(-10px);">
   

  <div class="panel panel-primary" style="border-radius: 0; " style="transform: translateY(-25px);">
    <div class="panel-heading" style="height: auto">
   
    
    <img src="../img/user.png" class="img-circle"  width="70%" height=""><br>
    <h4><?php echo  $name ;   ?></h4>
    <img src="../img/mobile-phone.png" width="20px"> <?php echo $phone;    ?><br>
    <h5><strong>Role: </strong>  <?php echo $_SESSION['role']; ?> </h5>
    <hr class="page-heading">

    <h4 class="text-center">Summary</h4>
     <table class="table table-striped">
        <thead>
              <tr>
                <th >Age</th>
                <th >Weight</th>
              </tr>
       </thead>

       <tbody>
             <td  id="i"><?php echo  $age;  ?></td>
             <td id="i"><?php echo  $weight;  ?></td>
       </tbody>
       
     </table>

     <table class="table table-striped">
        <thead>
              <tr>
                <th></th>
                <th >Height</th>
              </tr>
       </thead>

       <tbody>
             <td><img src="../img/standing-up-man-.png" width="30px"></td>
             <td id="i"><?php  echo $height;  ?></td>
       </tbody>
       
     </table><br>
    
   <aside class="list-group-item" href="">
        <div class="col-sm-2"><img src="../img/stethoscope (1).png" width="40px"></div>
        <div class="col-sm-8">
          <p class="list-group-item-text" id="i">Health Challenge<br><?php echo  $last_visit;  ?></p>
        </div>
        <div style="clear:both;"></div>
   </aside>
   <aside class="list-group-item" href="">
        <div class="col-sm-2"><img src="../img/house-visiting.png" width="40px"></div>
        <div class="col-sm-8">
          <p class="list-group-item-text" id="i">Last Visit<br><?php echo  $sickness;  ?></p>
        </div>
        <div style="clear:both;"></div>
   </aside><br>

    <a href="chat_room.php">
         <div class="well" id="chat_room"><h1 style="margin-top: 50px"><span id="chat"><img src="../img/chat.png"> <span  >Chat room</span>  </h1>
         </div>
        </a>

    

  </div>
  </div>








  </div>

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
             <input type="hidden" name="sender" id="sender" value="'. $full_name.'">

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