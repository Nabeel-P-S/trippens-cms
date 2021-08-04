<?php 

    $query=mysqli_query($conn,"select customer_id from customers order by customer_id desc LIMIT 1
     ");
    $fetch=mysqli_fetch_array($query);
     $customer_id=$fetch['customer_id']+1;
     ?>
     <div class="col-md-4">
<form class="form-group" >
<fieldset>

<!-- Form Name -->
<legend>ADD CUSTOMER    <p style="float: right;">No : <?php echo $customer_id ?> </p> </legend>    


<!-- Text input-->

<div class="form-group" style="display: none;">
 <div class="input-group">
    <span class="input-group-addon">CUSTOMER ID</span>
    <input id="customer_id" type="text" class="form-control" name="customer_id" value="<?php echo $customer_id?>" >
  </div></div>





<div class="form-group">
 <div class="input-group">
    <span class="input-group-addon"> NAME</span>
    <input id="customer_name" type="text" class="form-control" name="customer_name" placeholder="NAME"  >
  </div></div>

<div class="form-group">
 <div class="input-group">
    <span class="input-group-addon"> ADDRESS / PLACE</span>
    <input id="customer_address" type="text" class="form-control" name="customer_address" placeholder="ADDRESS"  >
  </div></div>

  <div class="form-group">
 <div class="input-group">
    <span class="input-group-addon"> PHONE *</span>
    <input id="customer_phone" type="number" class="form-control" name="customer_phone" placeholder="PHONE"  >
  </div></div>
  <div class="form-group">
 <div class="input-group">
    <span class="input-group-addon">WHATSAPP NUMBER *</span>
    <input id="customer_whatsapp" type="number" class="form-control" name="customer_whatsapp" placeholder="WHATSAPP NUMBER"  >
  </div></div>
    <div class="form-group">
 <div class="input-group">
    <span class="input-group-addon">Current Location </span>
    <input id="customer_location" type="text" class="form-control" name="customer_location"placeholder="CURRENT LOCATION">
 
  </div></div>

 <div class="form-group">
 <div class="input-group">
    <span class="input-group-addon">vehicle </span>
    <input id="customer_vehicle" type="text" class="form-control" name="customer_vehicle" placeholder="VEHICLE" >
 
  </div></div>

   <div class="form-group">
 <div class="input-group">
    <span class="input-group-addon">Group Of *</span>
    <input id="customer_count" type="number" class="form-control" name="customer_count" placeholder="COUNT ">
    
  </div></div>

    <div class="w3-half">
   <label>CUSTOMER TYPE  </label>
     <select class="form-control" id="customer_type"> 
                  <option value=0 >SINGLE</option>
                  <option value=1 >FAMILY </option>
                  <option value=2 >FRIENDS </option>
                </select>
  </div>
 <div class="w3-half">
   <label>VEHICLE TYPE  </label>
     <select class="form-control" id="vehicle_type"> 
                  <option value=0 >NON</option>
                  <option value=1 >2 WHEELER </option>
                  <option value=2 >4 WHEELER </option>
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
              <option value="<?php echo $fetch['customer_category_id']; ?>"><?php echo $fetch['customer_category']; ?> </option>
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
              <option value="<?php echo $fetch['tour_id']; ?>"><?php echo $fetch['tour_type']; ?> </option>
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
    <button id="save" name="save" onclick="save_customer()" class="btn btn-success">SAVE CUSTOMER</button>
  </div>
</div>

</fieldset>
</form></div>
   <div class="col-md-8">
     <h4 style="text-align: center;"><b>Customer Remarks </b></h4>

       <table id="article_table" class="table-striped table" >
          <tr>
 <!-- <td>Date Time</td> -->
  <td>DATE</td>
  <!-- <td>TIME</td> -->
   <td>Staff</td>
  <td>Response</td>
  <td>Reply</td>
 

</tr>
<tr>
<!--   <td>
    <div class="input-group">
   
    <input id="respose_id" type="number" class="form-control" name="sales_date"  >
      
  </div>
  </td> -->
<!--   <td>
    <input  type="text" readonly="0" value="<?php echo $datetime;?>" >
  </td> -->
 <td>
    <div class="input-group">
  <input  type="hidden" value="1" id="last_id" >
    <input id="response_date" type="date" class="form-control" name="response_date"   >
      
  </div>
  </td>
<td>
   <div class="input-group">
     <input id="staff" type="text" class="form-control"   name="staff"  >
  </div>
</td>
     <td>
 <div class="input-group">
      <textarea id="response" name="response"  class="form-control" rows="3" cols="20"> </textarea>
  
  </div>
  </td>
     <td>
 <div class="input-group">
   
       <textarea id="reply" name="reply"  class="form-control" rows="3" cols="20"> </textarea>
  </div>
  </td>
  <td><button type="button"  id="add" name="add" class="btn btn-success" onclick="add_row(this,'article_table')">+ ADD</button></td>
</tr>


   </table></div>
  <script type="text/javascript">
          function save_customer()
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
var article_element4=document.getElementsByName('response_date');

          var article_array=[];
          var article_array2=[];
          var article_array3=[];
          var article_array4=[];

   var n=0;
   for (var i = 0; i <article_element.length; i++) 
   {
      var article_id=article_element[i].value;
      var article_id2=article_element2[i].value;
      var article_id3=article_element3[i].value;
      var article_id4=article_element4[i].value;

      if (article_id!="")
      {
         article_array[n]=article_id;
         article_array2[n]=article_id2;
         article_array3[n]=article_id3;
         article_array4[n]=article_id4;
        // alert(article_array[n]);
         n++;
      }
   }
   var article_array_json=JSON.stringify(article_array);
   var article_array2_json=JSON.stringify(article_array2);
   var article_array3_json=JSON.stringify(article_array3);
   var article_array4_json=JSON.stringify(article_array4);

  

    if(customer_phone==""){ customer_phone=0;}
    if(customer_whatsapp==""){ customer_whatsapp=customer_phone;}
    if(customer_count==""){ customer_count=0;}
   
    
            if(customer_name=="")
            {       
             
               alert("Enter atleast name and Phone number");

             }
          
else{ 
            $.ajax( 
            {

              type:"POST",
              url:"../insert/customer_insert.php",
          dataType:"json",
              data:{

                 article_array_json:article_array_json,
                 article_array2_json:article_array2_json,
                 article_array3_json:article_array3_json,
                 article_array4_json:article_array4_json,
             
                customer_id:customer_id,
                customer_name:customer_name,
                customer_address:customer_address,
                customer_whatsapp:customer_whatsapp,
                customer_location:customer_location,
                customer_vehicle:customer_vehicle,
                customer_count:customer_count,
                customer_type:customer_type,
                vehicle_type:vehicle_type,
                customer_category_id:customer_category_id,
                tour_id:tour_id,
                customer_phone:customer_phone
              },

              success: function(data)

              {
                 
                  
                   
window.reload();
                  
                     }    
                   });        alert("succcess!!");



          }

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
            var cell5 = row.insertCell(4);
           



            // var cell7 = row.insertCell(6);
            // id="art_name'+last_id+'"

            cell1.innerHTML ='<div class="input-group"> <input id="response_date'+last_id+'" type="date" class="form-control" name="response_date"  </div>  ';

            // cell2.innerHTML ='<input id="sales_time'+last_id+'" type="time" class="form-control"   name="sales_time" value="<?php echo $time?>" >';
            
 
   cell2.innerHTML ='<div class="input-group"> <input id="staff'+last_id+'" type="text" class="form-control" name="staff"> </div>';

            cell3.innerHTML ='<div class="input-group">   <textarea id="response'+last_id+'" name="response"  class="form-control" rows="3" cols="20"> </textarea> </div>';
            cell4.innerHTML ='<div class="input-group">   <textarea id="reply'+last_id+'" name="reply"  class="form-control" rows="3" cols="20"> </textarea></div>';

         

            cell5.innerHTML = '<button id="add" name="add"  class="btn btn-warning" onclick="delete_rowf(this)">-</button></td>';

      }

</script>
<script>
  function  delete_rowf(element) {
    var row_id = element.parentNode.parentNode.rowIndex;
    document.getElementById("article_table").deleteRow(row_id);
    // add_total();
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


        location.href = "http://localhost/stock/view/view_customer.php";
        
      }

    });
  } 
  else {
    swal("Your detail is safe!");
  }
});

   
  }
</script>