<?php include('partials/menu.php'); ?>

    <!-- Main Content Section Start -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1>
            <?php if(isset($_SESSION['add-admin-success'])) : ?>
                <div class="alert_message text-center success">
                    <p>
                        <?= $_SESSION['add-admin-success'];
                        unset($_SESSION['add-admin-success']);
                        ?>
                    </p>
                </div>
            <?php elseif(isset($_SESSION['edit-admin'])) : ?>
                <div class="alert_message text-center error">
                    <p>
                        <?= $_SESSION['edit-admin'];
                        unset($_SESSION['edit-admin']);
                        ?>
                    </p>
                </div>
            <?php elseif(isset($_SESSION['edit-admin-success'])) : ?>
            <div class="alert_message text-center success">
                <p>
                    <?= $_SESSION['edit-admin-success'];
                    unset($_SESSION['edit-admin-success']);
                    ?>
                </p>
            </div>
            <?php elseif(isset($_SESSION['change-password'])) : // shows if change password was not seccessfull?>
            <div class="alert_message text-center error">
                <p>
                    <?= $_SESSION['change-password'];
                    unset($_SESSION['change-password']);
                    ?>
                </p>
            </div>
            <?php elseif(isset($_SESSION['change-password-success'])) : // shows if change password was seccessfull?>
                <div class="alert_message text-center success">
                    <p>
                        <?= $_SESSION['change-password-success'];
                        unset($_SESSION['change-password-success']);
                        ?>
                    </p>
                </div>
            <?php endif ?>
           
            <br><br>
            <!-- Button to Add Admin -->
            <div class="button-style">
            <a href="add-admin.php" class="btn-primary">Add Admin</a>
            </div>
            <br><br>
            <?php
            // Fetch tbl_admin data from database
            $admin_query = "SELECT * FROM tbl_admin";
            $admin_result = mysqli_query($connection, $admin_query);
            $sn=1;
            ?>
            <?php if(mysqli_num_rows($admin_result) > 0) : ?>
                <div class="arrange">
                    <table class="tbl-full">
                        <tr>
                            <th>S.N.</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Action</th>
                        </tr>
                        <?php while($admin = mysqli_fetch_assoc($admin_result)) : ?>
                            <tr>
                                <td><?= $sn++ ?></td>
                                <td><?= $admin['full_name'] ?></td>
                                <td><?= $admin['username'] ?></td>
                                <td>
                                    <a href="<?= ROOT_URL ?>admin/change-password.php?id=<?= $admin['id'] ?>" class="btn-primary size1"><img src="<?= ROOT_URL ?>images/change-pins.png" alt=""></a>
                                    <a href="<?= ROOT_URL ?>admin/edit-admin.php?id=<?= $admin['id'] ?>" class="btn-secondary1 size1"><img src="<?= ROOT_URL ?>images/edit.png" alt=""></a>
                                    <a href="<?= ROOT_URL ?>admin/delete-admin.php?id=<?= $admin['id'] ?>" class="btn-danger size1"><img src="<?= ROOT_URL ?>images/trash.png" alt=""></a>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </table>
                </div>
            <?php else : ?>
                <div class="alert_message error lg">
                    <p>No Post found For this Category</p>
                </div>
            <?php endif ?>
        </div>
    </div>
    <!-- Main Content Section End -->

<?php include('partials/footer.php'); ?>
