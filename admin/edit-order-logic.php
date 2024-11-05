<?php require('config/database.php');

 
// Process the value from form and save it in database
if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $food_price = $_POST['food_price'];
    $food_qty = $_POST['food_qty'];
    $total_food = $food_price * $food_qty;
    $food_status = $_POST['status'] ; // Ordered, On Delivery, Delivered, Cancelled
    $customer_name = $_POST['customer_name'];
    $customer_contact = $_POST['customer_contact'];
    $customer_email = $_POST['customer_email'];
    // $customer_address = $_POST['customer_address'];
    

    //Create SQL Query to insert category into Database
    $order_query = "UPDATE tbl_order SET price = $food_price, qty = $food_qty, 
    total = $total_food, status = '$food_status', customer_name = '$customer_name', 
    customer_contact = $customer_contact, customer_email = '$customer_email' WHERE id=$id ";
    $result = mysqli_query($connection, $order_query);

    // echo $food_query; die();

    if($result == true){
        //Query executed and category added
        $_SESSION['update'] = "<div class = 'success'> Food Ordered Updated Successfully.</div>";
        header('location:' . ROOT_URL. 'admin/manage-order.php' );
        die();
    }else{
        //Failed to Add category
        $_SESSION['update-failed'] = "<div class = 'error'> Fail to Update Food ordered.";
        header('location:' . ROOT_URL . 'admin/manage-order.php');
        die();
    }
    
}

?>