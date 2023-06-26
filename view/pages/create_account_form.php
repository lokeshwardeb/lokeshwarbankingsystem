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
        Create Account
    </div>



    
<?php

if(isset($_POST['submit_form'])){
   
    $ac_holder_name = $_POST['ac_holder_name'];
    $ac_holder_age = $_POST['ac_holder_age'];
    $ac_type = $_POST['ac_type'];
    $ac_holder_img = $_FILES['ac_holder_img']['name'].'.jpeg';
    $ac_holder_tmp_img = $_FILES['ac_holder_img']['tmp_name'];
    $ac_holder_c_address = $_POST['ac_holder_c_address'];
    $ac_holder_p_address = $_POST['ac_holder_p_address'];
    
$sql = new sql_info;
$id = $sql->all_sql_info('ac_holders');
while($row = $id->fetch_assoc()){
   $id_no =  $row['id'] +1;
//   echo '<br>';
//   echo $id_no;
}
$rand = rand(1111, 9999);
$account_no = 'lokeshwarbank-'. $id_no .  $rand . date("dmY");
if($ac_type == ''){
    echo error_msg("Account Type cannot be blank ! Please select an account type");
    // exit;
}
$sql = new sql_info;
// check the ac_holder_name on ac_holders
$result = $sql->all_where_sql('ac_holders', "ac_holder_name", "$ac_holder_name");
// if the result is > 0
if($result->num_rows > 0){
    // then check if ac_type on ac_holders
$result_ac = $sql->all_where_sql('ac_holders', "ac_type", "$ac_type");

if($result_ac->num_rows > 0){
    echo error_msg('User already exist ! Cannot make a account again !');

}else{
    // echo 'result not runs';

    // if the result_ac not runs that means we have to add the user with the new account type and then the code below will run



    
if($ac_type !==''){

    if($ac_type == 'Savings Account' && $ac_holder_age < 18 ){
        echo error_msg("Under 18years old peoples cannot make savings account.");
        
    }else{
        if($ac_holder_img !== ''){

            $ac_starting_amount = $sql->get_html_special($_POST['ac_starting_amount']);

    $ac_holder_img = $account_no . '_main.jpeg';

    if($ac_starting_amount !== ''){
$account_no;

$trc_info = "Starting account amount Cash-in";

$last_balance = $ac_starting_amount;
        $transaction_insert_query = $sql->insert_sql('ac_transactions', "`account_no`,`transaction_info`,`transaction_amount`,`last_balance_after_transaction`", "'$account_no', '$trc_info','$ac_starting_amount','$last_balance'");

        $insert_query = $sql->insert_sql('ac_holders', "`account_no`, `ac_holder_name`, `ac_holder_current_balance`,`account_status`,`ac_holder_age`, `ac_type`, `ac_holder_img`, `ac_holder_c_address`, `ac_holder_p_address`", "'$account_no', '$ac_holder_name', '$ac_starting_amount','Account Running','$ac_holder_age', '$ac_type', '$ac_holder_img', '$ac_holder_c_address', '$ac_holder_p_address'") ;

        // require __DIR__ . "/../../assets/img/upload/ac_holders/img/"
        
                    // $image_dest = "/assets/img/upload/ac_holders/img/" . $account_no . '_main';
                    $image_dest = __DIR__ . "/../../assets/img/upload/ac_holders/img/" . $account_no . '_main.jpeg';
        
                    compress_image($ac_holder_tmp_img, $image_dest, 60);
        
                if($insert_query){
                   echo success_msg("Account has been created successfully");
                }else{
                   echo error_msg("Account cannot created successfully. Error occured");
                }
    }else{
        echo error_msg("You have to add starting amount to your account to make an account. It is required");
    }

           
        }else{

            echo error_msg("Please Upload an Image to make an account. Image is required for making accounts");

        //     $insert_query = $sql->insert_sql('ac_holders', "`account_no`, `ac_holder_name`, `ac_holder_age`, `ac_type`,  `ac_holder_c_address`, `ac_holder_p_address`", "'$account_no', '$ac_holder_name', '$ac_holder_age', '$ac_type', '$ac_holder_c_address', '$ac_holder_p_address'") ;


        // if($insert_query){
        //    echo success_msg("Account has been created successfully");
        // }else{
        //    echo error_msg("Account cannot created successfully. Error occured");
        // }
        }
        
    }

    if($ac_type == 'Joint Account'){

    $sc_ac_holder_name = $_POST['sc_ac_holder_name'];
    $sc_ac_holder_age = $_POST['sc_ac_holder_age'];
    $ac_type = $_POST['ac_type'];
    // $sc_ac_holder_img = $_FILES['sc_ac_holder_img']['name'].'.jpeg';
    $sc_ac_holder_tmp_img = $_FILES['sc_ac_holder_img']['tmp_name'];
    $sc_ac_holder_c_address = $_POST['sc_ac_holder_c_address'];
    $sc_ac_holder_p_address = $_POST['sc_ac_holder_p_address'];

if($sc_ac_holder_img !==''){
    $sc_ac_holder_img = $account_no . '_sc.jpeg';

    $insert_query = $sql->insert_sql('ac_holders', "`account_no`, `ac_holder_name`,`account_status`, `ac_holder_age`, `ac_type`, `ac_holder_img`, `ac_holder_c_address`, `ac_holder_p_address`", "'$account_no', '$sc_ac_holder_name','Account Running', '$sc_ac_holder_age', '$ac_type', '$sc_ac_holder_img', '$sc_ac_holder_c_address', '$sc_ac_holder_p_address'") ;

    // $image_dest = __DIR__ . "/assets/" . $account_no . '_sc';
    // $image_dest = __DIR__ . "/assets/" . $account_no . '_sc';
    $image_dest = __DIR__ . "/../../assets/img/upload/ac_holders/img/" . $account_no . '_sc.jpeg';
    // $image_dest = "/assets/img/upload/ac_holders/img/" . $account_no . '_sc';

    // __DIR__ . 

    compress_image($sc_ac_holder_tmp_img, $image_dest,60);


        if($insert_query){
           echo success_msg("Account has been created successfully");
        }else{
           echo error_msg("Account cannot created successfully. Error occured");
        }
}else{
    echo error_msg("Please Upload an Image to make an account. Image is required for making accounts");

    // $insert_query = $sql->insert_sql('ac_holders', "`account_no`, `ac_holder_name`, `ac_holder_age`, `ac_type`, `ac_holder_c_address`, `ac_holder_p_address`", "'$account_no', '$sc_ac_holder_name', '$sc_ac_holder_age', '$ac_type',  '$sc_ac_holder_c_address', '$sc_ac_holder_p_address'") ;


    // if($insert_query){
    //    echo success_msg("Account has been created successfully");
    // }else{
    //    echo error_msg("Account cannot created successfully. Error occured");
    // }
}
    
    }



}


}

}else{


if($ac_type !==''){

    if($ac_type == 'Savings Account' && $ac_holder_age < 18 ){
        echo error_msg("Under 18years old peoples cannot make savings account.");
        
    }else{
        if($ac_holder_img !== ''){

            $ac_starting_amount = $sql->get_html_special($_POST['ac_starting_amount']);

    $ac_holder_img = $account_no . '_main.jpeg';

    if($ac_starting_amount !== ''){
$account_no;

$trc_info = "Starting account amount Cash-in";

$last_balance = $ac_starting_amount;
        $transaction_insert_query = $sql->insert_sql('ac_transactions', "`account_no`,`transaction_info`,`transaction_amount`,`last_balance_after_transaction`", "'$account_no', '$trc_info','$ac_starting_amount','$last_balance'");

        $insert_query = $sql->insert_sql('ac_holders', "`account_no`, `ac_holder_name`, `ac_holder_current_balance`,`ac_holder_age`, `ac_type`, `ac_holder_img`, `ac_holder_c_address`, `ac_holder_p_address`", "'$account_no', '$ac_holder_name', '$ac_starting_amount','$ac_holder_age', '$ac_type', '$ac_holder_img', '$ac_holder_c_address', '$ac_holder_p_address'") ;

        // require __DIR__ . "/../../assets/img/upload/ac_holders/img/"
        
                    // $image_dest = "/assets/img/upload/ac_holders/img/" . $account_no . '_main';
                    $image_dest = __DIR__ . "/../../assets/img/upload/ac_holders/img/" . $account_no . '_main.jpeg';
        
                    compress_image($ac_holder_tmp_img, $image_dest, 60);
        
                if($insert_query){
                   echo success_msg("Account has been created successfully");
                }else{
                   echo error_msg("Account cannot created successfully. Error occured");
                }
    }else{
        echo error_msg("You have to add starting amount to your account to make an account. It is required");
    }

           
        }else{

            echo error_msg("Please Upload an Image to make an account. Image is required for making accounts");

        //     $insert_query = $sql->insert_sql('ac_holders', "`account_no`, `ac_holder_name`, `ac_holder_age`, `ac_type`,  `ac_holder_c_address`, `ac_holder_p_address`", "'$account_no', '$ac_holder_name', '$ac_holder_age', '$ac_type', '$ac_holder_c_address', '$ac_holder_p_address'") ;


        // if($insert_query){
        //    echo success_msg("Account has been created successfully");
        // }else{
        //    echo error_msg("Account cannot created successfully. Error occured");
        // }
        }
        
    }

    if($ac_type == 'Joint Account'){

    $sc_ac_holder_name = $_POST['sc_ac_holder_name'];
    $sc_ac_holder_age = $_POST['sc_ac_holder_age'];
    $ac_type = $_POST['ac_type'];
    // $sc_ac_holder_img = $_FILES['sc_ac_holder_img']['name'].'.jpeg';
    $sc_ac_holder_tmp_img = $_FILES['sc_ac_holder_img']['tmp_name'];
    $sc_ac_holder_c_address = $_POST['sc_ac_holder_c_address'];
    $sc_ac_holder_p_address = $_POST['sc_ac_holder_p_address'];

if($sc_ac_holder_img !==''){
    $sc_ac_holder_img = $account_no . '_sc.jpeg';

    $insert_query = $sql->insert_sql('ac_holders', "`account_no`, `ac_holder_name`, `ac_holder_age`, `ac_type`, `ac_holder_img`, `ac_holder_c_address`, `ac_holder_p_address`", "'$account_no', '$sc_ac_holder_name', '$sc_ac_holder_age', '$ac_type', '$sc_ac_holder_img', '$sc_ac_holder_c_address', '$sc_ac_holder_p_address'") ;

    // $image_dest = __DIR__ . "/assets/" . $account_no . '_sc';
    // $image_dest = __DIR__ . "/assets/" . $account_no . '_sc';
    $image_dest = __DIR__ . "/../../assets/img/upload/ac_holders/img/" . $account_no . '_sc.jpeg';
    // $image_dest = "/assets/img/upload/ac_holders/img/" . $account_no . '_sc';

    // __DIR__ . 

    compress_image($sc_ac_holder_tmp_img, $image_dest,60);


        if($insert_query){
           echo success_msg("Account has been created successfully");
        }else{
           echo error_msg("Account cannot created successfully. Error occured");
        }
}else{
    echo error_msg("Please Upload an Image to make an account. Image is required for making accounts");

    // $insert_query = $sql->insert_sql('ac_holders', "`account_no`, `ac_holder_name`, `ac_holder_age`, `ac_type`, `ac_holder_c_address`, `ac_holder_p_address`", "'$account_no', '$sc_ac_holder_name', '$sc_ac_holder_age', '$ac_type',  '$sc_ac_holder_c_address', '$sc_ac_holder_p_address'") ;


    // if($insert_query){
    //    echo success_msg("Account has been created successfully");
    // }else{
    //    echo error_msg("Account cannot created successfully. Error occured");
    // }
}
    
    }



}
}




// echo $account_no;

// echo $id->fetch_assoc();

// $sql->insert_sql('ac_holders', "`account_no`, `ac_holder_name`, `datetime`", "'$ac_holder_name',") 




}






?>






    <form action="" method="post" enctype="multipart/form-data">

    <div class="container form mb-5">
        
    <label for="inputPassword5" class="form-label">Account Holder Name</label>
<input name="ac_holder_name" type="text" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
<div id="passwordHelpBlock" class="form-text">
  Please Upload the information correctly
</div>
    <label for="inputPassword5" class="form-label">Account Starting Amount</label>
<input name="ac_starting_amount" type="number" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
<div id="passwordHelpBlock" class="form-text">
  Please Upload the information correctly
</div>

<label for="inputPassword5" class="form-label">Age</label>
<input name="ac_holder_age" type="number" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
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
  <option value="Savings Account">Savings Account</option>
  <option value="Students Account">Students Account</option>
  <option value="Joint Account">Joint Account</option>
  <option value="Bussiness Account">Bussiness Account</option>
</select>

<div class="input-group mb-3 mt-4">
  <label class="input-group-text" for="inputGroupFile01">Upload Account Holder Image</label>
  <input name="ac_holder_img" type="file" class="form-control" id="inputGroupFile01">
</div>


<label for="inputPassword5" class="form-label mt-2">Current Address</label>
<input name="ac_holder_c_address" type="text" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
<div id="passwordHelpBlock" class="form-text">
  
</div>

<label for="inputPassword5" class="form-label mt-2">Permanent Address</label>
<input name="ac_holder_p_address" type="text" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
<div id="passwordHelpBlock" class="form-text">
  
</div>

<button name="submit_form" type="submit" id="main_submit" class="btn btn-primary mt-4">Submit Form</button>

    </div>

 
<!-- second user name on joint account -->

<div class="joint_second_user d-none" id="joint_second_user">
<div class="container form mb-5">
        
        <label for="inputPassword5" class="form-label">2nd Account Holder Name</label>
    <input name="sc_ac_holder_name" type="text" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
    <div id="passwordHelpBlock" class="form-text">
      Please Upload the information correctly
    </div>
    
    <label for="inputPassword5" class="form-label">Age</label>
    <input name="sc_ac_holder_age" type="number" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
    <div id="passwordHelpBlock" class="form-text">
      
    </div>
    
    
    
    <span class="">Account Type</span>
    <select class="form-select mt-2" aria-label="Default select example" name="sc_ac_type">
      
      <option selected value="Joint Account">Joint Account</option>
      
    </select>
    
    <div class="input-group mb-3 mt-4">
      <label class="input-group-text" for="inputGroupFile01">Upload Account Holder Image</label>
      <input name="sc_ac_holder_img" type="file" class="form-control" id="inputGroupFile01">
    </div>
    
    
    <label for="inputPassword5" class="form-label mt-2">Current Address</label>
    <input name="sc_ac_holder_c_address" type="text" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
    <div id="passwordHelpBlock" class="form-text">
      
    </div>
    
    <label for="inputPassword5" class="form-label mt-2">Permanent Address</label>
    <input name="sc_ac_holder_p_address" type="text" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
    <div id="passwordHelpBlock" class="form-text">
      
    </div>
    
    <button name="submit_form" type="submit" class="btn btn-primary mt-4">Submit Form</button>
    
        </div>
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
            <th scope="row">1</th>
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