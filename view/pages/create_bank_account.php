<?php
$website_name = "lokbanksys";
// include __DIR__ . "/../../inc/_header.php";
require __DIR__ . "/inc/_header.php";
// require __DIR__ . "/inc/_"
require __DIR__ .  "/../../config/conn.php";
require __DIR__ . "/../../models/get_sql_db_info.php";
require __DIR__ . "/../views.php";
require "sent_mail.php";
require "inc/mail_template.php";
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
                        Create Bank Ac Holder Account
                    </div>


                    <?php

                    $sql = new sql_info;


                    if (isset($_POST['submit_form'])) {
                        $ac_holder_name = $sql->get_html_special($_POST['ac_holder_name']);
                        // $ac_holder_age = $sql->get_html_special($_POST['admin_ac_holder_age']);
                        $ac_holder_age = $sql->get_html_special($_POST['ac_holder_age']);
                        $account_starting_amount = $sql->get_html_special($_POST['account_starting_amount']);
                        $ac_holder_email = $sql->get_html_special($_POST['ac_holder_email']);
                        $ac_holder_mobile_no = $sql->get_html_special($_POST['ac_holder_mobile_no']);
                        $ac_type = $sql->get_html_special($_POST['ac_type']);
                        $account_status = "Account Running";

                        $ac_holder_img = $_FILES['ac_holder_img']['name'];
                        $ac_holder_img_tmp = $_FILES['ac_holder_img']['tmp_name'];
                        $ac_holder_c_address = $sql->get_html_special($_POST['ac_holder_c_address']);
                        $ac_holder_p_address = $sql->get_html_special($_POST['ac_holder_p_address']);
                        $ac_holder_email = $sql->get_html_special($_POST['ac_holder_email']);

                        // if account type is not blank
                        if ($ac_type !== '') {
                            $result = $sql->all_where_sql("ac_holders", "ac_holder_name", "$ac_holder_name");

                            // if there is not user fond with the submitted name
                            if (!$result->num_rows > 0) {

                                // if account type is savings account and the account holder age is under 18years old then will stop the process and show the error
                                if ($ac_type == 'Savings Account' && $ac_holder_age < 18) {
                                    error_msg("Savings Account Holder cannot be under 18years old !");
                                }
                                // if account type is savings account and the account holder age is not under 18years old then will continue the process
                                else {
                                    
                                    // if the submitted ac holder image is blank then will stop the process and show the error
                                    if($ac_holder_img == ''){
                                        echo error_msg("Image cannot be blank! Please upload your image to create an account");
                                    }
                                    // if the submitted ac holder image is not blank the will continue the process
                                    else{
                                        
                                    $sql = new sql_info;
                                    $id = $sql->all_sql_info('ac_holders');
                                    while ($row = $id->fetch_assoc()) {
                                        $id_no =  $row['id'] + 1;
                                        //   echo '<br>';
                                        //   echo $id_no;
                                    }
                                    $rand = rand(1111, 9999);
                                    $account_no = 'lokeshwarbank-' . $id_no .  $rand . date("dmY");
            
                                    $ac_holder_image_name = $account_no . '_main.jpeg';
            
                                    $image_dest = __DIR__ . "/../../assets/img/upload/ac_holders/img/" . $ac_holder_image_name;
            
                                                            compress_image($ac_holder_img_tmp, $image_dest, 60);
            
            
                                   $insert_ac_data_query =  $sql->insert_sql("ac_holders", "`account_no`, `ac_holder_name`, `ac_holder_current_balance`, `ac_holder_age`, `ac_type`, `ac_holder_img`, `ac_holder_c_address`, `ac_holder_p_address`, `account_status`, `ac_holder_email`, `ac_holder_mobile_no`", "'$account_no', '$ac_holder_name', '$account_starting_amount', '$ac_holder_age', '$ac_type', '$ac_holder_image_name', '$ac_holder_c_address', '$ac_holder_p_address', '$account_status', '$ac_holder_email', '$ac_holder_mobile_no'");

                                    $transaction_info = "Account Starting Amount";
                                    $requested_for_transaction = $ac_holder_name . " (Owner) ";
                                    
                                   $insert_ac_data_query =  $sql->insert_sql("ac_transactions", "`account_no`, `transaction_info`, `requested_for_transaction`, `transaction_amount`, `last_balance_after_transaction`", "'$account_no', '$transaction_info', '$requested_for_transaction', '$account_starting_amount', '$account_starting_amount'");
            



                                    // if the ac holder submitted email is not blank then will sent an email to the user email address
                                        
                                if($ac_holder_email !== ''){

                                    

                                    sent_mail("Lokeshwar Bank Limited", $ac_holder_email, $ac_holder_name, $ac_type . "account has been created - Lokeshwar bank Limited", mail_template_new("Lokeshwar Bank Limited", "new_user_signup", $ac_holder_name));
                                }
                                    // if the ac holder submitted email is blank then will not sent an email to the user email address

                                    echo success_msg("Account has been created successfully !");

                                // else{

                                // }



                                // //    if the ac data query runs then will continue the process and show the success massege

                                //    if($insert_ac_data_query){
                                //     echo success_msg("Account has been created successfully !");
                                //    }
                                // //    if the ac data query not runs then will stop the process and show the error
                                   
                                //    else{
                                //     echo error_msg("Account cannot created ! Error has been occured !");
                                //    }
            
                                    }




                                }
                            }
                            // if there already has any user with the submitted name then it will show an error
                            else {
                                echo error_msg("User already exist !");
                            }
                        }
                        // if account type is blank
                        else {
                            echo error_msg("Account type cannot be blank ! Please select an account type");
                        }
                    }





                    ?>






                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="container form mb-5">

                            <label for="inputPassword5" class="form-label"> Account Holder Name</label>
                            <input name="ac_holder_name" type="text" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
                            <div id="passwordHelpBlock" class="form-text">
                                Please Upload the information correctly
                            </div>


                            <label for="inputPassword5" class="form-label"> Age</label>
                            <input name="ac_holder_age" type="number" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
                            <div id="passwordHelpBlock" class="form-text">

                            </div>
                            <label for="inputPassword5" class="form-label">Account Starting Amount</label>
                            <input name="account_starting_amount" type="number" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
                            <div id="passwordHelpBlock" class="form-text">

                            </div>
                            <label for="inputPassword5" class="form-label">Account Holder Mobile No</label>
                            <input name="ac_holder_mobile_no" type="number" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
                            <div id="passwordHelpBlock" class="form-text">

                            </div>
                            <label for="inputPassword5" class="form-label">Account Holder Email</label>
                            <input name="ac_holder_email" type="email" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
                            <div id="passwordHelpBlock" class="form-text">

                            </div>

                            <?php
                            // echo __DIR__;

                            // $n = '/';
                            // echo $n;
                            ?>

                            <span class="">Account Type</span>
                            <select class="form-select mt-2" aria-label="Default select example" name="ac_type" onchange="change_ac()" id="account_type">
                                <option value="">Select Account Type</option>
                                <option value="Savings Account">Savings Account</option>
                                <option value="Student Account">Student Account</option>


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
            <th scope="row">' . $sl_no . '</th>
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