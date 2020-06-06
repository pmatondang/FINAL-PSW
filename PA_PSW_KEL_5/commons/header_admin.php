<?php
    session_start();
    if(isset($_GET['out'])){
        session_start();
        session_destroy();
        header('location : index.php');
    }
?>
    <div class="navbar">
  <h3 class="admin">Dashboard Admin</h3>
 </div>
 <div class="sidebar">
  <div class="nav"></div>
  <a href=""><button class="btnt"><i style="margin-right: 5px" class="fa fa-home"></i></button><br></a>
  <a href="insert.php"><button class="btn"><i style="margin-right: 5px" class="fa fa-book"></i></button><br></a>
  <a href="../../dapur"><button class="btn"><i style="margin-right: 5px" class="fa fa-list"></i></button><br></a>
  <a href="../../kasir"><button class="btn"><i style="margin-right: 5px" class="fa fa-lock"></i></button><br></a>
  <a href="../../logout.php"><button class="btnn"><i style="margin-right: 5px" class="fa fa-user"></i></button><br></a>
 </div>
 <div class="wrapper">
  <div class="boxx">
   <div class="box1">
    <i class="fa fa-home fa-5x" style="color: white;margin:30px 20px"></i>
    <div class="title"><h2 class="int">Home</h2></div>
   </div>
   <div class="box2">
    <i class="fa fa-book fa-5x" style="color: white;margin:30px 20px"></i>
    <div class="title"><h2 class="intt">Menu</h2></div>
   </div>
   <div class="box3">
    <i class="fa fa-list fa-5x" style="color: white;margin:30px 20px"></i>
    <div class="title"><h2 class="inttt">alala</h2></div>
   </div>
   <div class="box4">
    <i class="fa fa-unlock fa-5x" style="color: white;margin:30px 20px"></i>
    <div class="title"><h2 class="intttt">Kasir</h2></div>
   </div>
  </div>

 </div>
    </header>
    <!-- header-end -->