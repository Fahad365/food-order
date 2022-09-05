<!-- Include Nav Ber -->
<?php include ('./partials/menu.php');?>

<!-- Search by date form -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header bg-dark text-light">
                    <h4>Generate Order Details Report</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="fw-bold">Form Date</label>
                                    <input type="date" name="from_date" value="<?php if(isset($_POST['from_date'])){echo $_POST['from_date'];}?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="fw-bold">To Date</label> 
                                    <input type="date" name="to_date" value="<?php if(isset($_POST['to_date'])){echo $_POST['to_date'];}?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    
                                    <button type="submit" name="filter" class="btn btn-primary py-2">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Filter Card Body End  -->

            <!-- Filter Output Card Start -->
            <?php 
            if(isset($_POST['filter'])){
                if(isset($_POST['from_date']) && isset($_POST['to_date'])){
                    $from_date=$_POST['from_date'];
                    $to_date=$_POST['to_date'];
              
                    $sql="SELECT * FROM tbl_order WHERE order_date BETWEEN '$from_date' AND '$to_date' ";

                    $result=mysqli_query($conn,$sql);
                    // Assign sn=1 to show serially id in UI
                        $serial_number=1;
  
                ?>
            <div class="card mt-4">
                <div class="card-body" id="exportid">
                    <table class="table text-center align-middle  table-bordered border-dark"  border="1">
                    <?php
                    $hasData = mysqli_num_rows($result)>0;
                    //  Check weather their have data or not in DB
                    if($hasData){
                    ?>
                        <thead class="table-secondary table-bordered border-dark">
                            <tr class="fw-bold align-middle">
                                <td>SN</td>
                                <td>Food Name</td>                      
                                <td>Price</td>
                                <td>Quantity</td>
                                <td>Total Price</td>
                                <td>Order Date</td>
                                <td>Status</td>
                                <td>Customer Name</td>
                                <td>Customer Number</td>
                                <td>Customer Email</td>
                                <td>Customer Address</td>                           
                            </tr>
                        </thead>

                        <tbody class="table-bordered border-dark">
                            <?php
                            while($order=mysqli_fetch_assoc($result)) { 
                                ?>                    
                            <tr>
                                <td><?php echo $serial_number++;?></td>
                                <td><?php echo $order['food'];?></td>
                                <td><?php echo $order['price'];?></td>
                                <td><?php echo $order['qty'];?></td>
                                <td><?php echo $order['total'];?></td>
                                <td><?php echo $order['order_date'];?></td>
                                <td><?php echo $order['status'];?></td>
                                <td><?php echo $order['customer_name'];?></td>
                                <td><?php echo $order['customer_contact'];?></td>
                                <td><?php echo $order['customer_email'];?></td>
                                <td><?php echo $order['customer_address'];?></td>
                            </tr>   
                            <?php
                            }  
                            ?>
                            <?php
                                }else{
                                    echo"<div class='alert alert-danger role='alert'>
                                    No Match Found!
                                    </div>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                
                <?php
                    //  Check weather their have data or not in DB
                    if($hasData){
                    ?>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <form action="../exportpdf.php" method="POST">
                            <input type="hidden"  id="inhtml" name="html"/>
                            <button type="submit" class="btn btn-dark px-3 mx-3 mb-4" onclick="myFunction()">Export</button>
                        </form>
                    </div><?php
                }
                            ?>
            </div>
            <!-- Output card end -->
                <?php
            }
            ?>
           
        </div>
    </div>
</div>
<script>
function myFunction() {
  var html = document.getElementById("exportid").innerHTML;
  document.getElementById("inhtml").value = html;
  //alert(document.getElementById("inhtml").value);
  //return false;
}
</script>
<!-- Include Footer -->
