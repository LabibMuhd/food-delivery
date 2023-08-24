<?php
include("../connect/connect.php");
include("../functions/function.php");
session_start();

if(isset($_GET['reference'])){
  $invoice_number=$_GET['reference'];


// getting total item and total price
$get_ip=getIPAddress();
$total_price=0;
$each_price=0;
$select_query="Select * from `cart` where user_ip='$get_ip'";
$result=mysqli_query($con,$select_query);

$user_id=$_SESSION['id'];
$status='pending';
$count_products=mysqli_num_rows($result);
while($row=mysqli_fetch_array($result)){
  $quantity= $row['quantity'];
  $menu_id=$row['menu_id'];
  $address=$row['address'];

  $select_menu= "Select * from menu where id=$menu_id";  
  $result_menu=mysqli_query($con,$select_menu);
  $row_menu=mysqli_fetch_assoc($result_menu);
  
  $product_table_price=$row_menu['price'];
  $each_price = $product_table_price * $quantity;
  $product_price=array($each_price);
  $product_values=array_sum($product_price);
  $total_price += $product_values;   
  
  $insert_order = "Insert into `orders` (user_id,amount,invoice_number,menu_id,quantity,address,date,order_status)
  values ($user_id,'$total_price','$invoice_number',$menu_id,'$quantity','$address',NOW(),'$status')";
  $result_query=mysqli_query($con,$insert_order);
  if($result_query){
    echo "<script>alert('Order submitted succesfully')</script>";
    echo "<script>window.open('../index.php','_self')</script>";
  }

  }
}
// delete items from cart
$empty_cart="Delete from `cart` where user_ip='$get_ip'";
$result_delete=mysqli_query($con,$empty_cart);

?>