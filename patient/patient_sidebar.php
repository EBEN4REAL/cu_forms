<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
 <?php
///section that fetches all users medical record from the database
 echo $username;
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
                <th>Age</th>
                <th >Weight</th>
              </tr>
       </thead>

       <tbody>
             <td  id="i" ><?php echo  $age;  ?></td>
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
   </aside>

    <a href="chat_room.php">
         <div class="well" id="chat_room"><h1 style="margin-top: 50px"><span id="chat"><img src="../img/chat.png"> <span  >Chat room</span>  </h1>
         </div>
        </a>

    

  </div>
  </div>
