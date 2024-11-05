<?php require('admin/config/database.php');

 
// Process the value from form and save it in database
if(isset($_POST['submit'])) {
    $food_name = $_POST['food'];
    $food_price = $_POST['price'];
    $food_qty = $_POST['qty'];
    $total_food = $food_price * $food_qty;
    $order_date = date("Y-m-d h:i:sa");
    $status = "Ordered"; // Ordered, On Delivery, Delivered, Cancelled
    $customer_name = $_POST['full-name'];
    $customer_contact = $_POST['contact'];
    $customer_email = $_POST['email'];
    $customer_address = $_POST['address'];
    
    //Create SQL Query to insert category into Database
    $food_query = "INSERT INTO tbl_order SET food = '$food_name', price = $food_price, qty = $food_qty, 
    total = $total_food, order_date = '$order_date', status = '$status', customer_name = '$customer_name', 
    customer_contact = $customer_contact, customer_email = '$customer_email', customer_address = '$customer_address' ";
    $result = mysqli_query($connection, $food_query);

    // echo $food_query; die();

    if($result == true){
        //Query executed and category added
        $_SESSION['order'] = "<div class = 'success'> Food Ordered Successfully.</div>";
        header('location:' . ROOT_URL );
        die();
    }else{
        //Failed to Add category
        $_SESSION['order-failed'] = "<div class = 'error'> Fail to Add Food.";
        header('location:' . ROOT_URL . 'order.php');
        die();
    }
    
}

?>