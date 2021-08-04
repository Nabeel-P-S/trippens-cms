<?php
include '../connect.php';
include("../main/navbar.php");
if (!empty($_GET["value"])) 
    {
          $value = $_GET['value'];
     
        echo $customer_id=$value;


        $sql1="
SELECT   customers.customer_id  ,   customers.customer_name  ,   customers.customer_address  ,   customers.customer_phone  ,   customers.customer_whatsapp  ,   customers.customer_location  ,   customers.customer_vehicle  ,   customers.customer_count  ,   customers.vehicle_type  ,   customers.customer_type  ,   customers.customer_category_id  ,tour_type.tour_type,customer_category.customer_category,   customers.tour_id   FROM   customers  LEFT JOIN tour_type
                  ON customers.tour_id = tour_type.tour_id 
                   LEFT JOIN customer_category
                  ON customers.customer_category_id = customer_category.customer_category_id where customer_id='$customer_id' order by customers.customer_id  desc";
 } 
 else
 {
   $sql1="
SELECT   customers.customer_id  ,   customers.customer_name  ,   customers.customer_address  ,   customers.customer_phone  ,   customers.customer_whatsapp  ,   customers.customer_location  ,   customers.customer_vehicle  ,   customers.customer_count  ,   customers.vehicle_type  ,   customers.customer_type  ,   customers.customer_category_id  ,tour_type.tour_type,customer_category.customer_category,   customers.tour_id   FROM   customers  LEFT JOIN tour_type
                  ON customers.tour_id = tour_type.tour_id 
                   LEFT JOIN customer_category
                  ON customers.customer_category_id = customer_category.customer_category_id order by customers.customer_id  desc";
 }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Trippens | CUSTOMER list</title>
</head>
<body>
 <div  style="*background-image: linear-gradient(180deg, rgb(1, 88, 96,.5), #002437); height: 42vw;">
     
     <!-- ---------------------- TABLE HEAD------------------------------ -->
    <div class="col-md-12">
    <div class="container">
    <div class="col-lg-4" ><input class="form-control" placeholder="Search" id="myInput" type="text" style="width: 10vw; *background-color: white; margin-top: 1vw; color: black;">   </div>
    <div class="col-lg-6" > </div>
    <div class="col-lg-8" style="text-align:  right;"><button class="btn btn-info"  onclick="print_page()">PRINT CUSTOMERS</button>
    </div> 
    </div>
    </div>
    <!-- ---------------------- TABLE HEAD------------------------------ -->

    <div id="printableArea"  class="col-md-12" >
      <h3 style="text-align: center;"><b>CUSTOMER LIST </b></h3>
      <table border="1" class="table table-condensed table-hover table-striped"  style=" object-fit: cover;">
      

     
        <thead >



          

          <tr class="table_head">
<th style="*width: 5vw;"> Id</th>
<th style="*width: 5vw;"> Name</th>
<th style="*width: 5vw;"> Address</th>
<th style="*width: 5vw;"> Mobile</th>
<th style="*width: 5vw;">Whatsapp</th>
<th style="*width: 5vw;">Location</th>
<th style="*width: 5vw;">Vehicle</th>
<th style="*width: 5vw;">Count</th>
<th style="*width: 5vw;">Customer Type</th>
<th style="*width: 5vw;">Vehicle Type</th>
<th style="*width: 5vw;">Customer Category</th>
<th style="*width: 5vw;">Tour Type</th>
<th style="*width: 5vw;"> Remarks</th>
<th></th>

</tr>

</thead>
<tbody id="table">
  <?php
  $query=mysqli_query($conn,$sql1);
  while($fetch=mysqli_fetch_array($query))
  {
   $customer_id=$fetch["customer_id"];
   $customer_name=$fetch["customer_name"];
   $customer_address=$fetch["customer_address"];
   $customer_phone=$fetch["customer_phone"];
   $customer_whatsapp=$fetch["customer_whatsapp"];
   $customer_location=$fetch["customer_location"];
   $customer_vehicle=$fetch["customer_vehicle"];
   $customer_count=$fetch["customer_count"];
   $customer_type=$fetch["customer_type"];
   $vehicle_type=$fetch["vehicle_type"];
   $tour_type=$fetch["tour_type"];
   $customer_category=$fetch["customer_category"];
   
  
   
   ?>
   <tr onclick= "open_addon_list('<?php echo $customer_id;?>');">
     <td onclick="delete_customer('<?php echo $customer_id;?>')" style="cursor: pointer;" > <?php echo $customer_id;?> </td>
     <td   style="cursor: pointer;"> <?php echo $customer_name;?> </td>
     <td style="cursor: pointer;"> <?php echo $customer_address;?> </td>
     <td style="cursor: pointer;"> <?php echo $customer_phone;?> </td>
     <td style="cursor: pointer;"> <?php echo $customer_whatsapp;?> </td>
     <td style="cursor: pointer;"> <?php echo $customer_location;?> </td>
     <td style="cursor: pointer;"> <?php echo $customer_vehicle;?> </td>
     <td style="cursor: pointer;"> <?php echo $customer_count;?> </td>
     <td style="cursor: pointer;"> <?php 
if ($customer_type==0){$customer_type="SINGLE";}else if($customer_type==1){$customer_type="FAMILY";}else{$customer_type="FRIENDS";}
     echo $customer_type;?> </td>
     <td style="cursor: pointer;"> 
      <?php
if ($vehicle_type==0){$vehicle_type="NON";}else if($vehicle_type==1){$vehicle_type="2 WHEELER";}else{$vehicle_type="4 WHEELER";}
       echo $vehicle_type;?>
       </td>
           <td style="cursor: pointer;"> <?php echo $customer_category;?> </td>
           <td style="cursor: pointer;"> <?php echo $tour_type;?> </td>

<td>
  <?php
  $sql4="SELECT COUNT(id) as  count_remarks from response
WHERE customer_id='$customer_id'";
  $query4=mysqli_query($conn,$sql4);
  $fetch4=mysqli_fetch_array($query4);
  $count_remarks=$fetch4['count_remarks'];

echo $count_remarks;
   
  
?>

</td>
 <td style="display: <?php if ($user_name=="admin") echo "block"; else echo "none"; ?> ;">

  <button   class="btn"> <a href="../edit/customer_edit.php?customer_id=<?php echo $customer_id;?>"> EDIT</a></button></td>
</tr>

     <!-- ==================================================================================================================== -->
<tr>
    <td colspan="14" style="padding: 0;">
     <div style="display: none;" id="addon_td<?php echo $customer_id; ?>">

      <table border="1" class="table" >
        <thead style="background-color: grey;">
         <tr >
           <th style="width: 12vw;">Date :</th>
             <th   style="text-align: center;">Staff  </th>
           <th   style="text-align: center;">Responses  </th>
           <th   style="text-align: center;">Reply from staff  </th>
         
           <!-- <th style="text-align: center;">item Quantity</th> -->

         </tr>
       </thead>
       <?php
       $query1=mysqli_query($conn,"SELECT `id`, `customer_id`, `date`, `response`,  `reply`, `staff` FROM `response` WHERE customer_id='$customer_id'");
       $sleno=1;
       while ($fetch1=mysqli_fetch_array($query1))
       {
        $id=$fetch1['id'];

        $date=$fetch1['date'];
        $response=$fetch1['response'];
        $reply=$fetch1['reply'];
        $staff=$fetch1['staff'];


        ?>
        <tr>
  <td> <?php echo $date; ?></td>
     <td> <?php echo $staff; ?></td>
          <td> <?php echo $response; ?></td>
          <td> <?php echo $reply; ?></td>
     
          

        </tr>

<?php
$sleno++;
  }
    ?>
  </table>
      </div>
    </td>
  </tr>




     <!-- ==================================================================================================================== -->
 

    <?php

}
?>
</tbody>
</table>
</div>
</div>

<script type="text/javascript">
  function edit_category(color_id)
   {
    // alert(vendor_id);
    $.ajax({
      type:"POST",
      url:"edit/color_edit.php",
      data:{
        color_id:color_id
      },
      success:function(data)
      {
        // alert(data);
        $("#total_div").html(data);
      }

    })
  }
</script>
<script type="text/javascript">
  function delete_customer(customer_id)
   {


swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this data!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Poof!  customer deleted!", {

      icon: "success",
    });
     $.ajax({
      type:"POST",
      url:"../delete/delete_customer.php",
      data:{
        customer_id:customer_id
      },
      success:function(data)
      {

swal("Deleted!");
       
        
      }

    });
  } 
  else {
    swal("Your detail is safe!");
  }
});

   
  }
</script>
  <script>
    function open_addon_list(order_id)
  {
    

if (document.getElementById("addon_td"+order_id).style.display=="block")
{
  document.getElementById("addon_td"+order_id).style.display="none";
  }
  else
  {
   document.getElementById("addon_td"+order_id).style.display="block"; 
  }
}
</script>
</body>
</html>