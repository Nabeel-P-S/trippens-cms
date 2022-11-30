<?php 
  
  session_start();
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
    date_default_timezone_set('Asia/Kolkata');
     $time=date("h:i:sa");
     $date = date("Y-m-d");
  
  
  
     ob_start();
  include ("../connect.php");
  
   $user_id = $_SESSION["id"];
    $user_name = $_SESSION["username"];
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
   
  }
  
  else if ($user_id==3)
  {
    header("location: ../staff/home1.php");
  }
  else if ($user_id==4)
  {
    header("location: ../staff/home3.php");
  }
  
  function vround( $number)
  {
    $whole = floor($number);     
    $fraction = $number - $whole;
    if (( $fraction <= 0.54 && $fraction>0.04))    
    {
      $result= $whole+.50;
    }
    else if (( $fraction > 0.54 ))  
    {
      $result=$whole+1;
    }
    else{
      $result=$whole;
    }
    return ($result);
  }
  
  
  
     ?>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <!DOCTYPE html>
  <html>
  <head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins"> 
    <!-- <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'> -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../images/trip.png">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/tab.css">
  
    <link rel="stylesheet" type="text/css" href="../css/sweetalert.css"><label hidden="">invalid</label>
    <script src="../sweetalert.min.js"></script>
    
    <style type="text/css">
  
  <?php include ("../css/mycss.php")?>
  
    </style>
  <style>
  body {margin:0;}
  
  
  
  </style>
  </head>
  <body >
  <nav class="navbar navbar-inverse" 
  
  style="background-color:
  
  
          <?php if ($user_name=="admin"){echo "#121c40";} else {echo "#730532";} ?>
  
  
      ;"
  
  
  
  
  
  >
    <div class="container-fluid">
  
      <ul class="nav navbar-nav" style="display:
  
  
          <?php if ($user_name=="admin"){echo "block";} else {echo "none";} ?>
  
  
      ;">
  
      
        <li class="active"><a href="#">TRIPPENS DRIVE</a></li>
        <!-- <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Page 1-1</a></li>
            <li><a href="#">Page 1-2</a></li>
            <li><a href="#">Page 1-3</a></li>
          </ul>
        </li> -->
        <li><a href="../main/add.php">ADD</a></li>
        <li><a  href="../view/view_customer.php">CUSTOMERS</a></li>
        <li><a  href="../view/view_tour_types.php">Tour Types</a></li>
        <li><a  href="../view/view_customer_types.php">Customer Types</a></li>
      
  
  </ul>
  <ul class="nav navbar-nav"><li >
        <input  class="form-control" placeholder="Type customer id and press Enter" id="staff_id" onchange="item_sales(this.value);" type="text" style="width: 20vw; background-color: none;margin-left: 8vw; margin-top: 1vw; color: black;"> 
  
      </li></ul>
      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
        <li class="active"><a href="../logout.php"><span class="glyphicon glyphicon-log-in"></span> <b style="color: yellow;"><?php echo $user_name;?></b> &nbsp; Logout ></a></li>
        
      </ul>
    </div>
  
      
  </nav>
  
  
       <!--   <li ><a class="w3-bar-item w3-button w3-hover-pink navoption" href="../main/home.php">HOME</a></li> -->
  
  
  
  
   <div class="main" id="main_div" style="overflow: auto; height: 42.5vw;"> 
  
  <script type="text/javascript">
       $(document).ready(function(){
  
    $("#myInput").on("keyup", function()
  
     {
  
      var value = $(this).val().toLowerCase();
  
      $("#table tr").filter(function() {
  
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  
      });
  
    });
  
  });
  
        function print_page()
    {
      
      window.print()
    }
  </script>
  
  <script type="text/javascript">
  
    function item_sales(value)
    {
  // alert(value+name);
  window.location="../view/view_customer.php?value=" + value;
  
    }
  
  </script>
  