<!DOCTYPE html>
<?php
include ("connect.php");
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s");?>

<html>
<head>
<!-- 	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>z
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->

  <script src="jquery.min.js"></script>

  <script src="bootstrap.min.js"></script>
  <link rel="stylesheet" href="bootstrap.min.css">
	<title>Vogel Stock Management</title>
</head>
<body>
<?php include("navbar.php") ?>


 <div class="col-md-3"> <?php include "forms/add_supplier.php"; ?></div>
 <div class="col-md-2"> <?php include "forms/add_customer.php"; ?></div>
 <div class="col-md-3"> <?php include "forms/add_article.php"; ?></div>
 <div class="col-md-2"> <?php include "forms/add_branch.php"; ?></div>
 <div class="col-md-2"> <?php include "forms/add_staff.php"; ?></div>
</div>

</body>
</html>
