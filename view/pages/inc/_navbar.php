<?php

// session_start();
include __DIR__ .  "/const.php";

?>
<div class="row">
            <div class="col-12 text-center fs-1 m-auto bg-success text-light">
                WELCOME TO THE BANKING SYSTEM
            </div>
            <div class="col-2 bg-dark text-light">
                <div class="col-12 navbar-title">
                    Dashboard
                </div>
                <div class="col-12">
                    <ul>
                        <li><a href="<?php echo  '/dashboard' ?>">Dashboard</a></li>
                        <li><a href="<?php echo  '/users' ?>">User Account</a></li>
                        <li><a href="<?php echo  '/total_fund' ?>">Total </a></li>
                        <li><a href="">Revenue</a></li>
                        <li><a href="<?php echo  '/add_admin' ?>">Add Admin</a></li>
                        <li><a href="<?php echo  '/logout' ?>">logout</a></li>
                    </ul>
                    <div class="toggle-bar">
                        <img src="./assets/img/upload/admin_ac_holders/img/<?php echo $_SESSION['admin_photo'] ?>" width="30px" height="30px" alt="" class="rounded-circle"> <?php echo $_SESSION['admin_username'] ?>
                    </div>
                </div>
            </div>