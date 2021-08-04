<?php
include '../connect.php';
include("../main/navbar.php");



 ?> 

<!DOCTYPE html>
<html>
<head>
  <title>Trippens |  Customer Categories</title>
</head>
<body>

 <div class="container" style="height: 42vw;">
    
     <!-- ---------------------- TABLE HEAD------------------------------ -->
    <div class="col-md-12">
    <div class="container">
    <div class="col-lg-4" ><input class="form-control" placeholder="Search" id="myInput" type="text" style="width: 10vw; *background-color: white; margin-top: 1vw; color: black;">   </div>
    <div class="col-lg-6" > </div>
    <div class="col-lg-8" style="text-align:  right;"><button class="btn btn-danger"  onclick="print_page()">Print Customer Categories</button>
    </div> 
    </div>
    </div>
    <!-- ---------------------- TABLE HEAD------------------------------ -->

    <div id="printableArea"  class="col-md-12" >
      <h3 style="text-align: center;"><b>Customer Categories</b></h3>
    <table border="1" class="table" >
        <thead >
                   <tr>
                      <th> SL NO:</th>
                      <th>CATEGORY CODE:</th>
                      <th>CUSTOMER CATEGORY</th>
                  
                    </tr>

        </thead>
<tbody id="table">
<?php
        $sql="SELECT `customer_category_id`, `customer_code`, `customer_category` FROM `customer_category` ";
      $query=mysqli_query($conn,$sql);
      while($fetch=mysqli_fetch_array($query))
      {
       $customer_category_id=$fetch["customer_category_id"];
       $customer_code=$fetch["customer_code"];
       $customer_category=$fetch["customer_category"];

   
?>
   <tr class="table_row">
     <td style="cursor: pointer;" > <?php echo $customer_category_id;?> </td>
     <td style="cursor: pointer;"> <?php echo $customer_code;?> </td>
     <td style="cursor: pointer;"> <?php echo $customer_category;?> </td>

   </tr>
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
  function delete_branch(branch_id)
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
    swal("Poof!  branch deleted!", {

      icon: "success",
    });
     $.ajax({
      type:"POST",
      url:"../delete/delete_branch.php",
      data:{
        branch_id:branch_id
      },
      success:function(data)
      {


        location.href = "../view/view_branch.php";
        
      }

    });
  } 
  else {
    swal("Your detail is safe!");
  }
});

   
  }
</script>
</body>
</html>