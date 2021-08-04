<?php include "../connect.php";
include("../main/navbar.php");
$customer_id=$_GET['customer_id'];
$query=mysqli_query($conn,"SELECT   customers.customer_id  ,  customers.customer_name  ,   customers.customer_address  ,   customers.customer_phone  ,   customers.customer_whatsapp  ,   customers.customer_location  ,   customers.customer_vehicle  ,   customers.customer_count  ,   customers.vehicle_type  ,   customers.customer_type  ,   customers.customer_category_id  ,tour_type.tour_type,customer_category.customer_category,   customers.tour_id   FROM   customers  LEFT JOIN tour_type
                  ON customers.tour_id = tour_type.tour_id 
                   LEFT JOIN customer_category
                  ON customers.customer_category_id = customer_category.customer_category_id where customer_id='$customer_id'");
$fetch=mysqli_fetch_array($query);
$customer_id=$fetch['customer_id'];
$customer_name=$fetch['customer_name'];
$customer_address=$fetch['customer_address'];
$customer_phone=$fetch['customer_phone'];
$customer_whatsapp=$fetch['customer_whatsapp'];
$customer_location=$fetch['customer_location'];
$customer_vehicle=$fetch['customer_vehicle'];
$customer_count=$fetch['customer_count'];
$customer_type=$fetch['customer_type'];
$vehicle_type=$fetch['vehicle_type'];
$tour_type=$fetch['tour_type'];
$customer_category=$fetch['customer_category'];
$category_id=$fetch['customer_category_id'];
$tour_id0=$fetch['tour_id'];

?>


<!DOCTYPE html>
<html>
<head>
  <title>customer list</title>
</head>
<body>
<div class="col-md-12">
<div class="col-md-4"><form class="form-group">

<fieldset>

<!-- Form Name -->
<legend>EDIT -  <?php echo $customer_name?>    <p style="float: right;">  <?php echo $customer_id ?> </p> </legend>    


<!-- Text input-->

<div class="form-group">
 <div class="input-group">
    <span class="input-group-addon">customer ID </span>
    <input id="customer_id" type="text" class="form-control" name="customer_id" value="<?php echo $customer_id?>" >
  </div></div>





<div class="form-group">
 <div class="input-group">
    <span class="input-group-addon">customer NAME</span>
    <input id="customer_name" type="text" class="form-control" name="customer_name" value="<?php echo $customer_name?>" >
 
  </div></div>

<div class="form-group">
 <div class="input-group">
    <span class="input-group-addon">customer ADDRESS</span>
    <input id="customer_address" type="text" class="form-control" name="customer_address" value="<?php echo $customer_address?>" >
  
  </div></div>

  <div class="form-group">
 <div class="input-group">
    <span class="input-group-addon">customer PHONE</span>
    <input id="customer_phone" type="number" class="form-control" name="customer_phone" value="<?php echo $customer_phone?>" >
    
  </div></div>
  <div class="form-group">
 <div class="input-group">
    <span class="input-group-addon">customer Whatsapp</span>
    <input id="customer_whatsapp" type="text" class="form-control" name="customer_whatsapp" value="<?php echo $customer_whatsapp?>" >
 
  </div></div>

    <div class="form-group">
 <div class="input-group">
    <span class="input-group-addon">Current Location </span>
    <input id="customer_location" type="text" class="form-control" name="customer_location" value="<?php echo $customer_location?>" >
 
  </div></div>

 <div class="form-group">
 <div class="input-group">
    <span class="input-group-addon">vehicle </span>
    <input id="customer_vehicle" type="text" class="form-control" name="customer_vehicle" value="<?php echo $customer_vehicle?>" >
 
  </div></div>

   <div class="form-group">
 <div class="input-group">
    <span class="input-group-addon">Group Of</span>
    <input id="customer_count" type="number" class="form-control" name="customer_count" value="<?php echo $customer_count?>" >
    
  </div></div>
  <div class="w3-half">
   <label>CUSTOMER TYPE  </label>
     <select class="form-control" id="customer_type"> 
                  <option value=0 <?php if ($vehicle_type==0){echo "selected";} ?> >SINGLE</option>
                  <option value=1 <?php if ($vehicle_type==1){echo "selected";} ?> >FAMILY </option>
                  <option value=2 <?php if ($vehicle_type==2){echo "selected";} ?> >FRIENDS </option>
                </select>
  </div>
 <div class="w3-half">
   <label>VEHICLE TYPE  </label>
     <select class="form-control" id="vehicle_type"> 
    
                  <option value=0 <?php if ($vehicle_type==0){echo "selected";} ?>>NON</option>
                  <option value=1 <?php if ($vehicle_type==1){echo "selected";} ?> >2 WHEELER </option>
                  <option value=2 <?php if ($vehicle_type==2){echo "selected";} ?> >4 WHEELER </option>
                </select>
  </div>

    <div class="w3-half">
   <label>CUSTOMER CATEGORY  </label>
     <select class="form-control" id="customer_category_id"> 
                    
              <?php
              $query = mysqli_query($conn, "SELECT * from customer_category");
              while ($fetch = mysqli_fetch_array($query))
              {
              ?>
              <option value="<?php echo $fetch['customer_category_id']; ?>" <?php if($fetch['customer_category_id']==$category_id) {echo "selected";}?>><?php echo $fetch['customer_category']; ?> </option>
              <?php
              }
              ?> 
                </select>
  </div>
 <div class="w3-half">
   <label>TOUR TYPE  </label>
     <select class="form-control" id="tour_id"> 
                     
              <?php
              $query = mysqli_query($conn, "SELECT * from tour_type");
              while ($fetch = mysqli_fetch_array($query))
              {
              ?>
              <option value="<?php echo $fetch['tour_id']; ?>" <?php if($fetch['tour_id']==$tour_id0) {echo "selected";}?> ><?php echo $fetch['tour_type']; ?> </option>
              <?php
              }
              ?> 
                </select>
  </div>
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="save"></label>
  <div class="col-md-4">
    <br>
    <button id="save" name="save" onclick="update_customer()" class="btn btn-info mb1 bg-black">UPDATE CUSTOMER</button>
  </div>
</div>

</fieldset>
</form> </div>
<div class="col-md-8"> 
      <h3 style="text-align: center;"><b>Customer Responses /Remarks </b></h3>

       <table id="response_table" class="table-striped table" >
          <tr>
  <!-- <td>ID</td> -->
  <td>DATE</td>
  <!-- <td>TIME</td> -->
  <td>Staff</td>
  <td>RESPONSE</td>
  <td>reply</td>

</tr>




<!-- ==================================================================================== -->
 <?php
             $sql="SELECT * FROM `response` WHERE customer_id='$customer_id' order by id desc";
               $query2=mysqli_query($conn,$sql);
                 $sleno=1;
                while ($fetch2=mysqli_fetch_array($query2))
                 {
                 $date=$fetch2['date'];
                 $id=$fetch2['id'];
                 // $time=$fetch2['time'];
                 $response=$fetch2['response'];
                 $reply=$fetch2['reply'];
                 $staff=$fetch2['staff'];


         
           


             ?>
           <tr>
  <!-- <td>
    <div class="input-group">
  
    <input id="respose_id" type="number" class="form-control" name="sales_date" value="<?php echo $id ?>" >
      
  </div>
  </td> -->


 <td>
    <div class="input-group">
  
    <input id="response_date" type="date" class="form-control" name="response_date" value="<?php echo $date ?>"  >
      
  </div>
  </td>
<td>
   <div class="input-group">
     <input id="staff" type="text" class="form-control"   name="staff"  value="<?php echo $staff?>">
  </div>
</td>
     <td>
 <div class="input-group">

         <textarea id="response" name="response"  class="form-control" rows="3" cols="20"> <?php echo $response?></textarea>
    
    
  </div>
  </td>

  
     <td>
 <div class="input-group">
   <textarea id="reply" name="reply"  class="form-control" rows="3" cols="20"> <?php echo $reply?></textarea>
    
  </div>
  </td>
</tr>
 <?php $sleno++;}?>
 <tr>
   <td>
    <input  type="hidden" value="1" id="last_id" >
     <button type="button"  id="add" name="add" class="btn btn-success" onclick="add_row(this,'response_table')">+ ADD</button>
   </td>
 </tr>
<!-- ==================================================================================== -->
   </table>
   
     <!-- ---------------------- TABLE HEAD------------------------------ -->
  <!--   <div class="col-md-12">
    <div class="container">
    <div class="col-lg-4" ><input class="form-control" placeholder="Search" id="myInput" type="text" style="width: 10vw; *background-color: white; margin-top: 1vw; color: black;">   </div>
    <div class="col-lg-6" style="float: right;"><button class="btn btn-danger"  onclick="print_page()">PRINT customerS</button>
    </div>  </div>
  
    </div> -->
    <!-- ---------------------- TABLE HEAD------------------------------ -->

     
</div>
</div>



 



</body>
</html>
 <script type="text/javascript">
          function update_customer()
          {
 

            var customer_id=document.getElementById("customer_id").value;
            var customer_name=document.getElementById("customer_name").value;
            var customer_address=document.getElementById("customer_address").value;
            var customer_phone=document.getElementById("customer_phone").value;
            var customer_whatsapp=document.getElementById("customer_whatsapp").value;
            var customer_location=document.getElementById("customer_location").value;
            var customer_vehicle=document.getElementById("customer_vehicle").value;
            var customer_count=document.getElementById("customer_count").value;
            var customer_type=document.getElementById("customer_type").value;
            var vehicle_type=document.getElementById("vehicle_type").value;
            var customer_category_id=document.getElementById("customer_category_id").value;
            var tour_id=document.getElementById("tour_id").value;
            




var article_element=document.getElementsByName('response');
var article_element2=document.getElementsByName('reply');
var article_element3=document.getElementsByName('staff');
var item_qty_element=document.getElementsByName('response_date');
          var article_array=[];
          var article_array2=[];
          var article_array3=[];
   var response_date=[];
   var n=0;
   for (var i = 0; i <article_element.length; i++) 
   {
      var article_id=article_element[i].value;
      var article_id2=article_element2[i].value;
      var article_id3=article_element3[i].value;
      var response_date_element=item_qty_element[i].value;
      if (article_id!="")
      {
         article_array[n]=article_id;
         article_array2[n]=article_id2;
         article_array3[n]=article_id3;
         response_date[n]=response_date_element;
         // alert(item_qty[n]);
         n++;
      }
   }
   var article_array_json=JSON.stringify(article_array);
   var article_array2_json=JSON.stringify(article_array2);
   var article_array3_json=JSON.stringify(article_array3);
   var response_date_json=JSON.stringify(response_date);
   // var response_date=document.getElementById("response_date").value;
   // var sales_time=document.getElementById("sales_time").value;


            if(customer_id=="")
            {       
               // swal("ERROR","Enter Vogel No ","error");
               alert("error");

             }
          
else{
            $.ajax( 
            {

              type:"POST",
              url:"../update/customer_update.php",
              // dataType:"json",
              data:{
                 article_array_json:article_array_json,
                 article_array2_json:article_array2_json,
                 article_array3_json:article_array3_json,
                           response_date_json:response_date_json, 
                customer_id:customer_id,
                customer_name:customer_name,
                customer_address:customer_address,
                customer_phone:customer_phone,
                customer_whatsapp:customer_whatsapp,
                customer_location:customer_location,
                customer_vehicle:customer_vehicle,
                customer_count:customer_count,
                customer_type:customer_type,
                customer_category_id:customer_category_id,
                tour_id:tour_id,
                vehicle_type:vehicle_type
         
              },

              success: function(data)

              {

                   
                      
 location.href = "../view/view_customer.php";

                     }    
                   });



          }
            alert("Updated");

          }
        </script>
          <script type="text/javascript">
     function add_row(x,y) 
     {

            var last_id=document.getElementById("last_id").value;
            // var sum=document.getElementById("total_amount").value;
            last_id=parseInt(last_id)+1;
            document.getElementById('last_id').value=last_id;
            // document.getElementById('total_amount').value=sum;

            var row_id = x.parentNode.parentNode.rowIndex;
            var x=row_id;
            var table = document.getElementById(y);
            var row = table.insertRow(x);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
           



            // var cell7 = row.insertCell(6);
            // id="art_name'+last_id+'"

            cell1.innerHTML ='<div class="input-group">  <input id="response_date'+last_id+'" type="date" class="form-control" name="response_date" value="<?php echo $date ?>" </div>  ';
             cell2.innerHTML ='<div class="input-group"> <input id="staff'+last_id+'" type="text" class="form-control" name="staff"> </div>';

         
             cell3.innerHTML ='<div class="input-group">   <textarea id="response'+last_id+'" name="response"  class="form-control" rows="3" cols="20"> </textarea> </div>';
            cell4.innerHTML ='<div class="input-group">   <textarea id="reply'+last_id+'" name="reply"  class="form-control" rows="3" cols="20"> </textarea></div>';


            cell5.innerHTML = '<button id="add" name="add"  class="btn btn-warning" onclick="delete_rowf(this)">-</button></td>';

      }

</script>
<script>
  function  delete_rowf(element) {
    var row_id = element.parentNode.parentNode.rowIndex;
    document.getElementById("response_table").deleteRow(row_id);
    // add_total();
  }
</script>