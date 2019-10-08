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
//section that fetches all users medical record from the database
$fetch_medical_profile = "SELECT * FROM  medical_profile INNER JOIN user  ON user.id = medical_profile.user_id  ";
$sql_query = mysqli_query($connected , $fetch_medical_profile);
$rows = mysqli_fetch_assoc($sql_query) ;
  # code...
  $age = $rows['age'];
  $height = $rows['height'];
  $weight = $rows['weight'];
  $last_visit = $rows['last_visit'];
  $sickness = $rows['sickness'];
  $email = $rows['email'];
  $id = $rows['id'];
  $cocument = $rows['document'];
  //section that fetches all users medical record from the database







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
  width: 97%;
  margin: 0 auto;
  /*transform: translateY(10px);*/

}
body{
  width: 97%;
  margin: 0 auto;
}
#userProfile{
 background-image: url("../img/banner-bg.jpg");
}

#section1{
  padding-top: 100px;
  transform: translateY(-30px);
  height: auto;
  background-image: url("../img/banner-bg.jpg");
  background-size: cover;
  /*background-attachment: fixed;*/
  height: auto;
  color: white;
  padding-bottom: 50px;
  padding: 50px;
  padding-left: 50px;
  
}
 header{
  width: 90%;
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
/*article{
  width: 95%;
}*/



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

<article style="width: 90%">
 
 <div class="row" >
  <div class="col-lg-4 text-center" style="transform: translateY(-27px); " id="">
    <div class="panel panel-default" style="border-radius: 0px;"">
    <div class="panel-heading" style="border-radius: 0px; padding-bottom: 160px;">
   
     <img src="../img/surgeon (1).png" class="img-circle"  width="100%" height=""><br>
    <h4><?php echo   $name ;   ?></h4>
    <img src="../img/mobile-phone.png" width="20px"><?php echo $phone;  ?><br>
    <h5><strong>Role: </strong> <?php echo $_SESSION['role']; ?> </h5>
    <hr class="page-heading">

  </div>
  </div>
  </div>
 
 


   

<section style="transform: translateX(-30px);">
<div class="col-lg-8 text-center container"  id="divz" >
  <section class="container-fluid" id="section1">
  <div class="row">
      <div class="col-md-6"><img src="../img/user.png" width="50%" height="50%px" class=" img-thumbnail img-circle" style="transform: translateY(70px); "></div>

      <?php 
      $location = '';
      if (isset($_GET['user_id'])) {
        # code...
         $fetch_emergencies = "SELECT * FROM medical_profile WHERE email = '$_GET[user_id]'";
          $sql_query = mysqli_query($connected , $fetch_emergencies);
          $serial_no_listing = 1;
           while ($rows = mysqli_fetch_array($sql_query)) {
            # code...
             $first_name = $username;
             $last_name = $rows['last_name'];
             $first_name = $rows['first_name'];
             $phone = $rows['phone'];
             $email = $rows['email'];
             $name = $first_name .'  '. $last_name;
             $location =  $rows['Location'];

           
                      
           }

      }
       
        
       ?>
<div class="col-md-6  text-center">
  <h4 class="text-center">User Profile</h4>
  <hr class="page-heading">
  <h4><strong class="name">Name:</strong> <?php echo $name;  ?></h4>
  <h4><strong class="name1">Phone:</strong> <?php echo $phone;  ?></h4>
  <h4><strong class="name2">Email:</strong>
  <?php echo $email;  ?></h4>
    <h4><strong class="name2">Location:</strong>
  <?php echo $location;  ?></h4>

   <?php
   //section that fetches user medical records from the database
   $fetch_emergencies = "SELECT * FROM user where role = 'Patient'";
  $sql_query = mysqli_query($connected , $fetch_emergencies);
  

  //section that fetches the user data from thde database

  $fetch_med_profile = "SELECT * FROM user    WHERE role = 'Patient'";
  $sql_query = mysqli_query($connected , $fetch_med_profile);
  $serial_no_listing = 1;
   $rows = mysqli_fetch_array($sql_query) ;
    # code...
    $patient = ucfirst($rows['first_name']) .'&nbsp;&nbsp;'. ucfirst($rows['last_name']);
    

      echo ' 
        <a class="btn1 btn btn-danger" href="Add_medical_profile.php?user_id='.$email.'"><span class="glyphicon glyphicon-plus"></span> Add Medical records</a>
      ';
      
        
   



 ?>


       
      </div>
    </div><br><br>
     

     <hr class="page-heading">
    <br>
    
   <h1 class="text-center">Medical records and other data</h1><br>

   <div class="row">
     <table class="table table-striped table-inverse table-responsive">
     <?php 

        $fetch_emergencies = "SELECT * FROM medical_profile WHERE email = '$_GET[user_id]'";
          $sql_query = mysqli_query($connected , $fetch_emergencies);
          $serial_no_listing = 1;
           while ($rows = mysqli_fetch_array($sql_query)) {
            # code...
           
             $first_name = $username;
             $last_name = $rows['last_name'];
             $first_name = $rows['first_name'];
             $phone = $rows['phone'];
             $email = $rows['email'];
             $name = $first_name .'  '. $last_name;
             $location =  $rows['Location'];
             $age =  $rows['age'];
             $weight =  $rows['weight'];
             $height =  $rows['height'];
             $last_visit =  $rows['last_visit'];
             $sickness =  $rows['sickness'];
             $document = $rows['document'];
          

           }
        
       ?>
      <thead>
       <tr>
         <th>Age</th>
         <th>Weight</th>
         
         <th>Height</th>
         <th>Health Challenge</th>
         <th>Last Clinic Visit</th>
       </tr>

      </thead>
      <tbody>
      <tr>
        <td style="color: black"><?php echo $age;  ?></td>
        <td style="color: black"><?php echo $weight; ?></td>
        <td style="color: black"><?php echo $height; ?></td>
        <td style="color: black"><?php echo $sickness; ?></td>
        <td style="color: black"><?php echo $last_visit; ?></td>
      </tr>
      
      </tbody>
        
    </table>
   </div>

   <div class="row">
     <img src="../img/<?php echo $document;  ?>" width="100%" height="">
   </div>
   
  </div>
   
    </section>
    
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