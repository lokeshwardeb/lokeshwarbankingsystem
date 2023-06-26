<style>
    body{
        background-color: white;
    }
</style>
<?php
$website_name = "lokbanksys";
// include __DIR__ . "/../../inc/_header.php";

require __DIR__ . "/inc/_header.php";
// require __DIR__ . "/inc/_"
require __DIR__ .  "/../../config/conn.php";
include __DIR__ . "/../../models/get_sql_db_info.php";
include __DIR__ . "/../views.php";
// require __DIR__ . "/inc/const.php";

// $sql = new mysqli()
// $sql->all_sql_info('admin_users');

// echo __DIR__;

$sql = new sql_info;

?>

<style>
    body{
        background-color: white !important;
    }
</style>

<script>
    // this js code is to remove secondary bg color from body as a body class
    var body =document.body.classList.remove('bg-secondary');
</script>

<main class="">
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

    <div class="container-fluid pt-4" style="min-height: 100vh; height:auto">
        <?php
        // include "inc/_navbar.php";



        ?>



        <div class="col-12 bg-light" style="min-height:100vh; height: auto;">
            
<!-- <div class="container-fluid mt-4">
<?php
                    // include "inc/_search.php";
                    ?>
</div> -->


            <div class="container-fluid mb-0">
<div class="container text-center fs-4 mb-4">
    Lokeshwar Bank Limited
</div>
<div class="container">
    <div class="row">
    <?php 

  $ac_no =   $sql->get_html_special($_GET['ac_no']);
           
           $result = $sql->all_where_sql('ac_holders', 'account_no', "$ac_no");
            while($row = $result->fetch_assoc()){
                echo '
                <div class="col-12">
                    Account No: <b> #' . $ac_no . '</b>
                    <!-- Account No: <b> #lokbank-125325232452-svs-ac-12525</b> -->
                </div>
                <div class="col-6">
                   Account Holder Name: <b>'.$row['ac_holder_name'].'</b>
                </div>
                <div class="col-6">
                    Age: <b>'.$row['ac_holder_age'].'</b>
                </div>
                <div class="col-6">
                    Account Type: <b>'.$row['ac_type'].'</b>
                </div>
                <div class="col-6">
                    Account Created on: <b>'.$row['datetime'].'</b>
                </div>
                <div class="col-6">
                    Current Address: <b>'.$row['ac_holder_c_address'].'</b>
                </div>
                <div class="col-6">
                    Permanent Address: <b>'.$row['ac_holder_p_address'].'</b>
                </div>';
            }
            
         ?>
    </div>
</div>

<div class="container">
    <!-- <div class="container ms-5 ps-5">
    <img src="../../assets/img/upload/ac_holders/img/download-cs.png" width="auto" height="400px" class="ms-5 ps-5 text-center mt-4" alt="" srcset="">

    </div> -->

    
                        <div class="text-center fs-4 fw-bold mb-4 mt-4 pt-4">
                            Current Balance

                        </div>
                        <div class="container text-center text-warning mt-4 mb-4 fs-4 ">
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

    <table class="table mb-5 pb-5">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                            <th scope="col">Transaction Type (Cash in / Cash out)</th>
                            <th scope="col">Requested by (for the Transaction)</th>
                            <th scope="col">Transaction Amount</th>
                            <th scope="col">Date of the Transaction (Cash-in / Cash-out)</th>
                            <th scope="col">Last balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div class="text-center fs-5 fw-bold mb-4 mt-4 pt-4">
                             Account Summary in details

                        </div>

                        <button type="submit" class="btn btn-dark mb-4 btn-sm-sm d-print-none" onclick="window.print()">Print out</button>
                       <a href="/"><button type="submit" class="btn btn-outline-dark ms-4 mb-4 btn-sm-sm d-print-none" >go back</button></a>

                        <?php

$sql = new sql_info();
$result = $sql->all_where_sql("ac_transactions", "account_no", "$ac_no");

                        $num  =  $result->num_rows;

                        if ($num > 0) {
                            $sl_no = 1;
                            while ($row = $result->fetch_assoc()) {


                                echo '
            
                                <th scope="row">'.$sl_no.'</th>
          
                                <td>' . $row["transaction_info"] . '</td>
                                <td>' . $row["requested_for_transaction"] . '</td>
                                <td>TK. ' . $row["transaction_amount"] . '</td>
                                <td >' . $row["transaction_datetime"] . '</td>
                                <td >TK. ' . $row["last_balance_after_transaction"] . '</td>
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