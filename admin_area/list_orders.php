<h3 class="text-center text-success">All Orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">

    <?php 
    $get_orders="select * from `user_orders`";
    $result=mysqli_query($con,$get_orders);
    $row_count=mysqli_num_rows($result);
    echo "<tr>
    <th>S/N</th>
    <th>Due Amount</th>
    <th>Invoice number</th>
    <th>Total products</th>
    <th>Order Date</th>
    <th>Status</th>
    <th>Delete</th>
  </tr>
</thead>
<tbody class='bg-secondary text-light'>";


if($row_count==0){
    echo "<h2 class='bg-danger text-center mt-5'>No orders yet</h2>";
}else{
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $order_id=$row_data['order_id'];
        $user_id=$row_data['user_id'];
        $amount_due=$row_data['amount_due'];
        $invoice_number=$row_data['invoice_number'];
        $total_products=$row_data['total_products'];
        $order_date=$row_data['order_date'];
        $order_status=$row_data['order_status'];
        $number++;
        ?>
        <tr>
        <td><?php echo $number?></td>
        <td><?php echo $amount_due ?></td>
        <td><?php echo $invoice_number?></td>
        <td><?php echo $total_products?></td>
        <td><?php echo $order_date?></td>
        <td><?php echo $order_status?></td>
        <td><a href='index.php?delete_orders=<?php echo $order_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
         </tr>
         <?php
    }
}
    
    ?>
    </tbody>

</table>