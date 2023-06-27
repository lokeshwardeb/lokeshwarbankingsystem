<?php
$website_name = "lokbanksys";
// include __DIR__ . "/../../inc/_header.php";
require __DIR__ . "/inc/_header.php";
// require __DIR__ . "/inc/_"
require __DIR__ .  "/../../config/conn.php";
include __DIR__ . "/../../models/get_sql_db_info.php";
include __DIR__ . "/../views.php";
require "inc/mail_template.php";
require "sent_mail.php";
// require __DIR__ . "/inc/const.php";

// $sql = new mysqli()
// $sql->all_sql_info('admin_users');

// echo __DIR__;
// $connect = new connect;


$sql = new sql_info;


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

    <div class="container-fluid " style="min-height:100vh; height: auto;">
        <?php
        include "inc/_navbar.php";



        ?>



        <div class="col-10 bg-light" style="min-height:100vh;height: auto;">
            
<!-- <div class="container-fluid mt-4">
<?php
                    include "inc/_search.php";
                    ?>
</div> -->

<?php


$ac_no = $sql->get_html_special($_GET['ac_no']);



?>


            <div class="container-fluid mt-4">

<div class="container">
    <div class="text-center fs-4 mb-5">
        Lokeshwar Bank Limited
    </div>
    <div class="row">
    <?php 
           
           $result = $sql->all_where_sql('ac_holders', 'account_no', "$ac_no");
            while($row = $result->fetch_assoc()){
                echo '
                <div class="col-12">
                    Account No: <b> #' . $ac_no . '</b>
                    <!-- Account No: <b> #lokbank-125325232452-svs-ac-12525</b> -->
                </div>
                <div class="col-6">
                   Account Holder Name: <b>'.$ac_holder_name = $row['ac_holder_name'].'</b>
                </div>
                <div class="col-6">
                    Age: <b>'.$row['ac_holder_age'].' years</b>
                </div>
                <div class="col-6">
                    Account Type: <b>'.$row['ac_type'].'</b>
                </div>
                <div class="col-6">
                    Account Created on: <b>'.$row['datetime'].'</b>
                </div>

                 <div class="col-6">
                    Email Address: <b>'.$row['ac_holder_email'].'</b>
                </div>

                 <div class="col-6">
                    Mobile No: <b>'.$row['ac_holder_mobile_no'].'</b>
                </div>

                <div class="col-6">
                    Current Address: <b>'.$row['ac_holder_c_address'].'</b>
                </div>
                <div class="col-6">
                    Permanent Address: <b>'.$row['ac_holder_p_address'].'</b>
                </div>
              
                
                
                
                ';
            }
            
         ?>
    </div>
</div>

<div class="container ms-5 ps-5">
    <div class="container ms-5 ps-5">
        
        <?php

           
$result = $sql->all_where_sql('ac_holders', 'account_no', "$ac_no");
while($row = $result->fetch_assoc()){
    echo '
    <img src="/assets/img/upload/ac_holders/img/'.$row['ac_holder_img'].'" width="auto" height="400px" class="ms-5 ps-5 text-center mt-4" alt="" srcset="">
    ';

    $ac_holder_email = $row['ac_holder_email'];

    $account_mail_hold_name = $row['ac_holder_name'];

}



        
    ?>
    </div>

    <div class="text-center fs-4 fw-bold mb-4 mt-4 pt-4">
                            Current Balance

                        </div>
                        <div class="container text-center text-warning mt-4 mb-5 fs-4 ">
                           <span class="bg-dark p-3">
                            TK.
                           <?php

           
$result = $sql->all_where_sql('ac_holders', 'account_no', "$ac_no");
while($row = $result->fetch_assoc()){
    if($row['ac_holder_current_balance'] == ''){
        echo 0;
    }else{
        echo $row['ac_holder_current_balance'];

    }
}



        
    ?>





                           </span> 
                        </div>


                        <?php

           
$result = $sql->all_where_sql('ac_holders', 'account_no', "$ac_no");
while($row = $result->fetch_assoc()){
    echo '
    <a href="manage_account?ac_no='.$ac_no.'"><button type="submit" class="btn btn-outline-dark me-4 mb-4 btn-sm-sm">Go back</button></a>
    ';
    echo '
    <a href="print_ac_statement?ac_no='.$ac_no.'"><button type="submit" class="btn btn-dark mb-4 btn-sm-sm">Print Statement</button></a>
    ';

    $ac_holder_get_form_email = $row['ac_holder_email'];
    $ac_type = $row['ac_type'];



}
                      ?>

<?php
if(isset($_POST['make_transaction'])){
    $ac_no;
    $trc_requested_per_name = $_POST['trc_requested_per_name'];
    $trc_type = $_POST['trc_type'];
    $transaction_amount = $_POST['transaction_amount'];

   $result =  $sql->transaction_sql($ac_no);

   $account_no = $ac_no;
   


   if($trc_type == 'Cash-in Transaction (add money)'){
    while($row = $result->fetch_assoc()){
        // if($transaction_amount > $row['ac_holder_current_balance']){
        //     echo error_msg("Insuffient Balance ! Your account doesnot have enough balance !");
        // }else{
        //     $last_balance =  $row['ac_holder_current_balance'] + $transaction_amount;

        // }

        $last_balance =  $row['ac_holder_current_balance'] + $transaction_amount;
        $sql->update_all_sql("ac_holders", "ac_holder_current_balance", "$last_balance", "account_no", "$ac_no");

        sent_mail("Lokeshwar Bank Limited", $ac_holder_get_form_email, $ac_holder_name, $ac_type . " Transaction was successful - Lokeshwar bank Limited", mail_template_new("Lokeshwar Bank Limited", "transaction", $ac_type, $account_no, $account_mail_hold_name, $transaction_amount, $trc_type, $last_balance));

    echo success_msg("Transaction was successful");

        echo '

        <script>
        window.location.href = "make_transaction?ac_no='.$ac_no.'"
        </script>
        ';
     }
     
    $account_no = $ac_no;

    $trc_info = $trc_type;
    
    // $last_balance = $transaction_amount;
            $transaction_insert_query = $sql->insert_sql('ac_transactions', "`account_no`,`transaction_info`,`requested_for_transaction`,`transaction_amount`,`last_balance_after_transaction`", "'$account_no', '$trc_info','$trc_requested_per_name','$transaction_amount','$last_balance'");
    
   }
   if($trc_type == 'Cash-out Transaction (get money)'){
    while($row = $result->fetch_assoc()){
        if($transaction_amount > $row['ac_holder_current_balance']){
            echo error_msg("Insuffient Balance ! Your account doesnot have enough balance !");
            // exit;
        }else{

            $last_balance =  $row['ac_holder_current_balance'] - $transaction_amount;

            $sql->update_all_sql("ac_holders", "ac_holder_current_balance", "$last_balance", "account_no", "$ac_no");


            $account_no = $ac_no;

            $trc_info = $trc_type;
            
            // $last_balance = $transaction_amount;
                    $transaction_insert_query = $sql->insert_sql('ac_transactions', "`account_no`,`transaction_info`,`requested_for_transaction`,`transaction_amount`,`last_balance_after_transaction`", "'$account_no', '$trc_info','$trc_requested_per_name','$transaction_amount','$last_balance'");

                    // if the transaction was successfull then sent and email to the account holder email address if the email address exist on the form
                    if($ac_holder_email !== ''){
    //                     mixed $website_name = "Lokeshwar Fashion House",
    // mixed $select_template,
    // mixed $username,
    // mixed $account_type = "",
    // mixed $account_no = "",
    // mixed $ac_holder_name = "",
    // mixed $transaction_amount = "",
    // mixed $transaction_type = "",
    // mixed $transaction_last_balance = "",
    // mixed $order_no = "",
    // mixed $order_phone_no = ""

                        
                                    
// mail

sent_mail("Lokeshwar Bank Limited", $ac_holder_get_form_email, $account_mail_hold_name, $ac_type . " Transaction was successful - Lokeshwar bank Limited", mail_template_new("Lokeshwar Bank Limited", "transaction",  $ac_type, $account_no, $account_mail_hold_name, $transaction_amount, $trc_type, $last_balance));

                    }


    echo success_msg("Transaction was successful");


            echo '

            <script>
            window.location.href = "make_transaction?ac_no='.$ac_no.'"
            </script>
            ';
        }
     }
     

    
   }
   
    // $sql->update_all_sql("ac_holders", "ac_holder_current_balance", "$last_balance", "account_no", "$ac_no");

    // $last_balance = '';

//     $account_no = $ac_no;

// $trc_info = $trc_type;

// // $last_balance = $transaction_amount;
//         $transaction_insert_query = $sql->insert_sql('ac_transactions', "`account_no`,`transaction_info`,`requested_for_transaction`,`transaction_amount`,`last_balance_after_transaction`", "'$account_no', '$trc_info','$trc_requested_per_name','$transaction_amount','$last_balance'");

    // $sql->insert_sql('ac_transactions', "`account_no`, `transaction_info`, `transaction_amount`, `last_balance_after_transaction`", "'$ac_no', '$trc_type', '$trc_requested_per_name', '$transaction_amount', '$last_balance'");

//    header("location: make_transaction");
//    echo '

// <script>
// window.location.href = "make_transaction?ac_no='.$ac_no.'"
// </script>
// ';


}

$result = $sql->all_where_sql("ac_holders", "account_no", "$ac_no");

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $account_holder_name = $row['ac_holder_name'];
    }
}




?>



                        <form action="" method="post" enctype="multipart/form-data">

    <div class="container form mb-5">
        
    <label for="inputPassword5" class="form-label">Requested for the Transaction person Name</label>
<input name="trc_requested_per_name" value="<?php echo $account_holder_name . ' ' . '(owner)' ?>" type="text" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
<div id="passwordHelpBlock" class="form-text">
  Please Upload the information correctly
</div>



<?php
// echo __DIR__;

// $n = '/';
// echo $n;
?>

<span class="">Transaction Type</span>
<select class="form-select mt-2" aria-label="Default select example" name="trc_type" onchange="change_ac()" id="account_type">
  <option value="" >Select Transaction Type</option>
  <option value="Cash-in Transaction (add money)">Cash-in Transaction (add money)</option>
  <option value="Cash-out Transaction (get money)">Cash-out Transaction (get money)</option>
  
</select>


<label for="inputPassword5" class="form-label">Transaction Amount</label>
<input name="transaction_amount" type="number" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
<div id="passwordHelpBlock" class="form-text">
  
</div>


<button name="make_transaction" type="submit" id="main_submit" class="btn btn-primary mt-4">I confirm, Make Transaction</button>

    </div>

 

    
    
    
        </div>
</div>







    </form>
















    <!-- <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Event name (Cash in / Cash out)</th>
                            <th scope="col">Requested by (for the event)</th>
                            <th scope="col">Date of the Event (Cash-in / Cash-out)</th>
                            <th scope="col">Last balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div class="text-center fs-5 fw-bold mb-4 mt-4 pt-4">
                             Account Summary in details

                        </div>

                      <a href="print_ac_statement"><button type="submit" class="btn btn-dark mb-4 btn-sm-sm">Print Statement</button></a>
                      <a href="make_transaction"><button type="submit" class="btn btn-dark ms-4 mb-4 btn-sm-sm">Make Transaction</button></a>

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
            <td >556</td>
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
                </table>
 -->




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