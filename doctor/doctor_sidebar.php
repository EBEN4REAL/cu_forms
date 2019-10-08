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
  transform: translateY(-40px);
}
article{
  
  margin: 0 auto;
  width: 95%;

  
}
#chat_room{
  width: 325px;
  height: 200px;
  color: black;
}
#chat{
  margin-top: 100px;
  transform: translateY(50px);
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
  <div class="col-lg-4 text-center"  id="" style="color: white;transform: translateY(-22px); border-radius: 0">
    <div class="panel panel-primary" style="" >
      <div class="panel-heading">
       <img src="../img/surgeon (1).png" class="img-circle"  width="100%" height=""><br>
        <h4><?php echo  $name ;   ?></h4>
        <img src="../img/mobile-phone.png" width="20px"> <?php  echo $phone;  ?><br>
        <h5><strong>Role: </strong> <?php echo $_SESSION['role']; ?> </h5>
             <hr class="page-heading">

        <a href="chat_room.php">
         <div class="well" id="chat_room"><h1 style="margin-top: 50px"><span id="chat"><img src="../img/chat.png"> <span >Chat room</span>  </h1></div></span>
        </a>
 
       </div>


  </div>

  
  </div>
 