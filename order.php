<?php include('partials-front/menu.php'); ?>

<?php
if(isset($_GET['food_id'])){
    $food_id = $_GET['food_id'];

    //Create an SQL query to get all the food data from database
    $food_query = "SELECT * FROM tbl_food WHERE id= '$food_id' ";
    $food_result = mysqli_query($connection, $food_query);

    $row = mysqli_fetch_assoc($food_result);
    $food_name = $row['title'];
    $food_price = $row['price'];
    $image_name = $row['image_name'];
}else{
    //Redirect to home page
    header('location: ' . ROOT_URL);
}
?>
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

        <form action="<?php echo ROOT_URL ?>order-logic.php" class="order" method="POST">
            <fieldset>
                <legend>Selected Food</legend>

                <div class="food-menu-img">
                <?php 
                                        
                    //Check whether we have image or not
                    if($image_name != ""){
                        //We have image, so display image
                        ?>
                        <img src="<?= ROOT_URL ?>images/food/<?= $image_name ?>" class="img-responsive img-curve">
                        <?php
                    }else{
                        //We do not have image so display error message
                        ?>
                        <div class="error"><p>Image Not Added</p></div>
                        <?php
                    }
                ?> 
                </div>

                <div class="food-menu-desc">
                    <h3><?php echo $food_name;?></h3>
                    <input type="hidden" name="food" value="<?php echo $food_name; ?>">
                    <p class="food-price">#<?php echo $food_price;?></p>
                    <input type="hidden" name="price" value="<?php echo $food_price; ?>">                    
                    
                    <div class="order-label">Quantity</div>
                    <input type="number" name="qty" class="input-responsive" value="" required>

                </div>

            </fieldset>

            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="E.g. Oyegun Temitope" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="E.g. hi@Temitope.com" class="input-responsive" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
            </fieldset>

        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<?php include('partials-front/footer.php'); ?>
