<?php
require 'config/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order Website - Home page</title>
    <link rel="stylesheet" href="../css/admi.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
<div class="main-content login">
    <div class="inner-wrapper inner-login">
        <div class="wrapper">
            <h1>Login</h1>
            <br>
            <br>
            <?php if(isset($_SESSION['login'])) : // shows if login was not seccessfull?>
            <div class="alert_message text-center error">
                <p>
                    <?= $_SESSION['login'];
                    unset($_SESSION['login']);
                    ?>
                </p>
            </div>
            <?php elseif(isset($_SESSION['login-check'])) : // shows if accrss was not seccessfull?>
            <div class="alert_message text-center error">
                <p>
                    <?= $_SESSION['login-check'];
                    unset($_SESSION['login-check']);
                    ?>
                </p>
            </div>
            <?php endif ?>
            <form class="tbl" action="<?= ROOT_URL ?>admin/login-logic.php" method="POST">
                    <table class="tbl-30">
                        <tr>
                            <td>Username</td>
                            <td><input type="text" name="username" placeholder="Username"></td>
                        </tr>
                        <tr>
                            <td>password</td>
                            <td><input type="password" name="password" placeholder="Password"></td>
                        </tr>
                        

                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="login" class="btn-secondary1">
                            </td>
                        </tr>
                    </table>
            </form>
            <div class="footer_copyright">
                <small>copyright and design by Temitope Oyegun &copy; Temmytech Website Design, Contact &copy; 09030357911 </small>
            </div>
        </div>
    </div>
</div>
</body>
</html>