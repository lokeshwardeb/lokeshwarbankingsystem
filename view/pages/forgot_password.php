<?php
session_start();

$website_name = "lokbanksys";
// include __DIR__ . "/../../inc/_header.php";
// require __DIR__ . "/inc/_header.php";
// require __DIR__ . "/inc/_"
require __DIR__ .  "/../../config/conn.php";
include __DIR__ . "/../../models/get_sql_db_info.php";
include __DIR__ . "/../views.php";
require __DIR__ . "/inc/functions.php";
require "sent_mail.php";
require "inc/mail_template.php";
// require __DIR__ . "/inc/const.php";

// $sql = new mysqli()
// $sql->all_sql_info('admin_users');

// echo __DIR__;
// $connect = new connect;


$sql = new sql_info;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $website_name ?> || Banking system</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <link rel="stylesheet" href="assets/css/style.css">

<!-- <script>
    document.body.classList.remove('bg-secondary');
    document.body.classList.add('bg-light');
</script> -->
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="assets/css/sign-in.css" rel="stylesheet">
    
  </head>
  <body class="text-center bg-light">

 


    
<main class="form-signin w-100 m-auto">

<?php
$sql = new sql_info;

if(isset($_POST['forgot_password'])){
    $admin_username = $sql->get_html_special($_POST['admin_username']);
    $admin_email = $sql->get_html_special($_POST['admin_email']);

   $result =  $sql->all_where_sql("admin_users", "admin_username", "$admin_username");

   if($result->num_rows == 1){
    while($row = $result->fetch_assoc()){
        $admin_email = $row['admin_email'];
        
        $otp = rand('1111', '9999');
       

        sent_mail("Lokeshwar Bank Limited", $admin_email, $admin_username, "Verify your email -- Lokeshwar Bank Limited",mail_template_new("Lokeshwar Bank Limited", "verify_your_email", "", "", $admin_username, "", "", "", $otp));

        $_SESSION['fp_pass'] = 1;
        $_SESSION['fp_admin_username'] = $admin_username;

        
        $sql->update_all_sql("admin_users", "otp", "$otp", "admin_username", "$admin_username");


        header("location: fp_pass");

        // $new_password;


        // $sql->update_all_sql("")


// echo 'this';
      

    }
   }else{
    echo error_msg("User doesnot exist");
   }

    


}













  ?>



  <form action="" method="post">
    <img class="mb-4 text-center" src="assets/img/upload/admin_ac_holders/img/1687793233_admin.jpeg" alt="" width="100px" height="100px" style="margin-left:0px;">
    <h1 class="h3 mb-3 text-center fw-normal">Are you have forgot your password ?</h1>

    <div class="form-floating">
      <input type="text" name="admin_username" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="email" name="admin_email" class="form-control" id="floatingPassword" placeholder="Email">
      <label for="floatingPassword">Email</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" name="forgot_password" type="submit">Forgot Password</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
  </form>
</main>

<script src="assets/js/bootstrap.min.js"></script>
    
  </body>
</html>
