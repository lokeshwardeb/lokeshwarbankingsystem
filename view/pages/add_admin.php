<?php
$website_name = "lokbanksys";
// include __DIR__ . "/../../inc/_header.php";
require __DIR__ . "/inc/_header.php";
// require __DIR__ . "/inc/_"
require __DIR__ .  "/../../config/conn.php";
require __DIR__ . "/../../models/get_sql_db_info.php";
require __DIR__ . "/../views.php";
// require __DIR__ . "/../../view/img/"
// require __DIR__ . "/../../assets/img/upload/ac_holders/img/"
// require __DIR__ . "/inc/const.php";

// $sql = new mysqli()
// $sql->all_sql_info('admin_users');

// echo __DIR__;



?>


<main class="bg-dark">
    <!-- Welcome to the banking system -->
    <?php

    // $sql = new sql_info();

    // $result = $sql->all_sql_info("admin_users");
    // // $result->fetch_assoc();

    // if($result->num_rows > 0){
    //     while($row = $result->fetch_assoc()){
    //         // echo $row['admin_username'];
    //         $data[] = $row;
    //     }

    //     foreach ($data as $datas){
    //         echo $datas['admin_username'];
    //         echo $datas['admin_password'];
    //     }


    // }

    // $views = new views_info();

    // $DATA = $views->view_data("all_sql_info", "admin_users", array("admin_password", "admin_username"), "ADMIN_PASSWORD", "ADMIN_USERNAME", "DATETIME");








    // echo $view_data;

    // $table_data = new views_table();
    // $table_data->view_table_data($view_data);

    // foreach ($d as $the_data){
    //     echo $the_data;
    // }


    // echo $result;

    ?>

    <div class="container-fluid " style="height: auto; min-height: 100vh;">
        <?php
        include "inc/_navbar.php";



        ?>









        <div class="col-10 bg-light" style="height: auto; min-height: 100vh;">
            
<!-- <div class="container-fluid mt-4">
<?php
                    include "inc/_search.php";
                    ?>
</div> -->


            <div class="container-fluid mt-4">

<div class="container">
    <div class="container text-center fs-4">
        Create Admin Ac Holder Account
    </div>


<?php

$sql = new sql_info;


if(isset($_POST['submit_form'])){
    $admin_ac_holder_name = $sql->get_html_special($_POST['admin_ac_holder_name']) ;
    $admin_ac_holder_age = $sql->get_html_special($_POST['admin_ac_holder_age']) ;
    $admin_password = $sql->get_html_special($_POST['admin_password']) ;
    $admin_cpassword = $sql->get_html_special($_POST['admin_cpassword']) ;
    $admin_ac_holder_img = $_FILES['admin_ac_holder_img']['name'] ;
    $admin_ac_holder_img_tmp = $_FILES['admin_ac_holder_img']['tmp_name'] ;
    $admin_ac_holder_c_address = $sql->get_html_special($_POST['admin_ac_holder_c_address']) ;
    $admin_ac_holder_p_address = $sql->get_html_special($_POST['admin_ac_holder_p_address']) ;
    $admin_email = $sql->get_html_special($_POST['admin_email']) ;


    if($admin_cpassword == $admin_password){
        $result = $sql->all_where_sql("admin_users", "admin_username", "$admin_ac_holder_name");
       
        if(!$result->num_rows == 1){

            $hash = password_hash($admin_password, PASSWORD_DEFAULT);
            $img_name = time() . '_admin.jpeg';
            
            $image_dest = __DIR__ . "/../../assets/img/upload/admin_ac_holders/img/" . $img_name;
            
            compress_image($admin_ac_holder_img_tmp, $image_dest, 60);
            
            $sql->insert_sql("admin_users", "`admin_username`, `admin_ac_holder_age`,  `admin_password`, `admin_ac_holder_img`, `admin_ac_holder_c_address`, `admin_ac_holder_p_address`, `admin_email`", "'$admin_ac_holder_name', '$admin_ac_holder_age', '$hash', '$img_name', '$admin_ac_holder_c_address', '$admin_ac_holder_p_address', '$admin_email'");
            
            echo success_msg("Admin ac holder account has been created successfully !");

        }else{
            echo error_msg("User already exist !");
        }




    }else{
        echo error_msg("Password does not match !");
    }



}





?>






    <form action="" method="post" enctype="multipart/form-data">

    <div class="container form mb-5">
        
    <label for="inputPassword5" class="form-label">Admin Account Holder Name</label>
<input name="admin_ac_holder_name" type="text" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
<div id="passwordHelpBlock" class="form-text">
  Please Upload the information correctly
</div>


<label for="inputPassword5" class="form-label">Admin Age</label>
<input name="admin_ac_holder_age" type="number" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
<div id="passwordHelpBlock" class="form-text">
  
</div>
<label for="inputPassword5" class="form-label">Admin Password</label>
<input name="admin_password" type="text" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
<div id="passwordHelpBlock" class="form-text">
  
</div>
<label for="inputPassword5" class="form-label">Admin Confirm Password</label>
<input name="admin_cpassword" type="text" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
<div id="passwordHelpBlock" class="form-text">
  
</div>
<label for="inputPassword5" class="form-label">Admin Email</label>
<input name="admin_email" type="email" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
<div id="passwordHelpBlock" class="form-text">
  
</div>

<?php
// echo __DIR__;

// $n = '/';
// echo $n;
?>

<span class="">Account Type</span>
<select class="form-select mt-2" aria-label="Default select example" name="ac_type" onchange="change_ac()" id="account_type">
  <option value="" >Select Account Type</option>
  <option value="Admin Account">Admin Account</option>
  
</select>

<div class="input-group mb-3 mt-4">
  <label class="input-group-text" for="inputGroupFile01">Upload Account Holder Image</label>
  <input name="admin_ac_holder_img" type="file" class="form-control" id="inputGroupFile01">
</div>


<label for="inputPassword5" class="form-label mt-2">Current Address</label>
<input name="admin_ac_holder_c_address" type="text" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
<div id="passwordHelpBlock" class="form-text">
  
</div>

<label for="inputPassword5" class="form-label mt-2">Permanent Address</label>
<input name="admin_ac_holder_p_address" type="text" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
<div id="passwordHelpBlock" class="form-text">
  
</div>

<button name="submit_form" type="submit" id="main_submit" class="btn btn-primary mt-4">Submit Form</button>

    </div>

 





    </form>
</div>

            
                <!-- <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Account No (Ac no)</th>
                            <th scope="col">Account Holder Name</th>
                            <th scope="col">Account Created On</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div class="text-center fs-4 fw-bold mb-4 mt-4 pt-4">
                            All Account holder details

                        </div>

                        <button type="submit" class="btn btn-dark mb-4 btn-sm-sm">Create a Account</button>

                        <?php

                        $sql = new sql_info();
                        $result = $sql->all_sql_info("ac_holders");

                        $num  =  $result->num_rows;

                        if ($num > 0) {
                            $sl_no = 1;
                            while ($row = $result->fetch_assoc()) {


                                echo '
            
            <tr>
            <th scope="row">'.$sl_no.'</th>
            <td>' . $row["account_no"] . '</td>
            <td>' . $row["ac_holder_name"] . '</td>
            <td >' . $row["datetime"] . '</td>
            <td ><a href="manage_account.php"><button class="btn btn-dark">Mannage account</button></a></td>
          </tr>
            
            ';

                                $sl_no++;
                            }
                        } else {

                            echo error_msg("The sheet has no entry");
                            // echo 'the sheet has no entry';
                        }


                        ?>


                    </tbody>
                </table> -->

            </div>





        </div>

























    </div>





    </div>










</main>

<?php

require "inc/_footer.php";

?>