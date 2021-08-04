<?php
include ("../connect.php");
// $addon_number=$_POST["addon_number"];
$customer_id=$_POST["customer_id"];
$customer_name=$_POST["customer_name"];
$customer_address=$_POST["customer_address"];
$customer_phone=$_POST["customer_phone"];
$customer_whatsapp=$_POST["customer_whatsapp"];
$customer_location=$_POST["customer_location"];
$customer_vehicle=$_POST["customer_vehicle"];
$customer_count=$_POST["customer_count"];
$customer_type=$_POST["customer_type"];
$vehicle_type=$_POST["vehicle_type"];
$customer_category_id=$_POST["customer_category_id"];
$tour_id=$_POST["tour_id"];
$sql="UPDATE `customers` SET
 `customer_name`='$customer_name', `customer_address`='$customer_address'
 , `customer_whatsapp`='$customer_whatsapp'
 , `customer_location`='$customer_location'
 , `customer_vehicle`='$customer_vehicle'
 , `customer_count`='$customer_count'
 , `customer_type`='$customer_type'
 , `vehicle_type`='$vehicle_type'
 ,`customer_phone`='$customer_phone' WHERE customer_id='$customer_id'";
echo $sql;
mysqli_query($conn,"UPDATE `customers` SET
 `customer_name`='$customer_name', `customer_address`='$customer_address'
 , `customer_whatsapp`='$customer_whatsapp'
 , `customer_location`='$customer_location'
 , `customer_vehicle`='$customer_vehicle'
 , `customer_count`='$customer_count'
 , `customer_type`='$customer_type'
 , `customer_category_id`='$customer_category_id'
 , `tour_id`='$tour_id'
 , `vehicle_type`='$vehicle_type'
 ,`customer_phone`='$customer_phone' WHERE customer_id='$customer_id'");

mysqli_query($conn,"DELETE FROM response WHERE customer_id='$customer_id'");
// ========================================== ITEMS INSERTING ======================================================================
$article_id_array=json_decode($_POST['article_array_json']) ;
$article_id_array2=json_decode($_POST['article_array2_json']) ;
$article_id_array3=json_decode($_POST['article_array3_json']) ;
$response_array=json_decode($_POST['response_date_json']);

for ($i=0; $i <sizeof($article_id_array) ; $i++)
 { 
				$sql2="INSERT INTO `response`(`id`, `customer_id`, `date`, `response`,`reply`,`staff`) VALUES (NULL,'$customer_id','$response_array[$i]','$article_id_array[$i]','$article_id_array2[$i]','$article_id_array3[$i]')";

							if($query=mysqli_query($conn,$sql2)) 
							{
							  echo "items inserted success";
							}
							else
							{
							  echo mysqli_error($conn);
							}
		
}
?>
