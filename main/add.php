
<?php
include ("../connect.php");
 include("../main/navbar.php") 
?>

<html>
<head>


</head>
<body>


 <div style="display:


        <?php if ($user_name=="admin"){echo "block";} else {echo "none";} ?>


    ;" class="col-md-12"> <?php include "../forms/add_customer.php"; ?></div>


</div>

</body>
</html>
 
<!--  <div class="col-md-3"> <?php 
// include "../forms/add_zone.php"
; ?></div> -->