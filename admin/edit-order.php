<?php include('partials/menu.php'); ?>

<?php
if(isset($_GET['id'])){
    $order_id = $_GET['id'];

    //Create an SQL query to get all the food data from database
    $order_query = "SELECT * FROM tbl_order WHERE id= '$order_id' ";
    $order_result = mysqli_query($connection, $order_query);

    $row = mysqli_fetch_assoc($order_result);
    $id = $row['id'];
    $food_name = $row['food'];
    $food_price = $row['price'];
    $food_qty = $row['qty'];
    $food_status = $row['status'];
    $customer_name = $row['customer_name'];
    $customer_contact = $row['customer_contact'];
    $customer_email = $row['customer_email'];
    $customer_address = $row['customer_address'];
}else{
    //Redirect to home page
    header('location: ' . ROOT_URL. 'admin/manage-order.php');
}
?>
<!-- fOOD sEARCH Section Starts Here -->
<section class="main-content">
    <div class="inner-wrapper">
        <div class="wrapper">
            <br><br>
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form class="tbl" action="<?php echo ROOT_URL ?>admin/edit-order-logic.php" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>
                            <div class="set">
                                <h4>Food name:</h4>
                                <b><?php echo $food_name; ?></b>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="set">
                                <h4>Food Price:</h4>
                                <b><?php echo $food_price; ?></b>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="set">
                                <h4>Quantity:</h4>
                                <input class="new" type="number" name="food_qty" value="<?php echo $food_qty; ?>">
                            </div>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                            <div class="set">
                                <h4>Status: </h4>
                                <select name="status">
                                    <option <?php if($food_status =="Ordered"){echo 'selected';}?> value="Ordered">Ordered</option>
                                    <option <?php if($food_status =="On Delivery"){echo 'selected';}?> value="On Delivery">On Delivery</option>
                                    <option <?php if($food_status =="Delivered"){echo 'selected';}?> value="Delivered">Delivered</option>
                                    <option <?php if($food_status =="Cancelled"){echo 'selected';}?> value="Cancelled">Cancelled</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><h4>Customer Name: </h4></td>
                        <td>
                            <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td><h4>Customer Contact : </h4></td>
                        <td>
                            <input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td><h4>Customer email: </h4></td>
                        <td>
                            <input type="text" name="customer_email" value="<?php echo $customer_email; ?>">
                        </td>
                    </tr>
                    <!-- <tr>
                        <td>
                            <div class="set">
                                <h4>Customer address:</h4>
                                <textarea name="customer_address" cols="30" rows="5" value= "<?php echo $customer_address ?>" placeholder="Customer Address"></textarea>
                            </div>
                        </td>
                    </tr> -->
                </table>
                <div>
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="hidden" name="food_price" value="<?php echo $food_price?>">
                    <input type="submit" name="submit" value="Update Order" class="btn-secondary">
                </div>
            </form>
        </div>
    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<?php include('partials/footer.php'); ?>
