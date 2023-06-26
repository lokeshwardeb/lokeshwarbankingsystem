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


            // $ac_no = $sql->get_html_special($_GET['ac_no']);



            ?>


            <div class="container-fluid mt-4">

            </div>

            <div class="text-center fs-4 fw-bold mb-4 mt-4 pt-4">
                Current Fund Total Balance

            </div>
            <div class="container text-center text-warning mt-4 pb-4 mb-4 fs-4 ">
                <span class="bg-dark p-3">
                    TK.
                    <?php


                    $result = $sql->all_sql_info('ac_holders');
                    $array_value = [];
                    while ($row = $result->fetch_assoc()) {
                        if ($row['ac_holder_current_balance'] == '') {
                            echo 0;
                        } else {
                            $arr_val = $row['ac_holder_current_balance'];
                            array_push($array_value, $arr_val);

                            // array('dkfk');
                        }
                    }

                    // print_r($array_value);

                    $value_array_sum = array_sum($array_value);

                    print_r($value_array_sum);

                    ?>
                </span>
            </div>













            <?php



            $result = $sql->all_sql_info('ac_holders');
            while ($row = $result->fetch_assoc()) {
                $account_status = $row['account_status'];

                if ($account_status == "Account Closed") {
                    echo '<table class="table mb-5 pb-5 ">';
                } else {
                    echo '<table class="table mb-5 pb-5">';
                }
            } ?>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Account No (Ac no)</th>
                    <th scope="col">Account Holder Name</th>
                    <th scope="col">Account Current Balance</th>
                    <th scope="col">Account Type</th>
                    <th scope="col">Account Created On</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <div class="text-center fs-5 fw-bold mb-4 mt-4 pt-4">
                    Account Summary in details

                </div>

                


                <!-- <a href="make_transaction?"><button type="submit" class="btn btn-dark ms-4 mb-4 btn-sm-sm">Make Transaction</button></a> -->

                <?php

                $sql = new sql_info();
                $result = $sql->all_sql_info("ac_holders");
                // $result = $sql->all_sql_info("ac_holders");

                $num  =  $result->num_rows;



                if ($num > 0) {
                    $sl_no = 1;
                    while ($row = $result->fetch_assoc()) {
                        //                                 $account_status =   $row['account_status'];

                        // if($account_status == "Account Closed"){

                        // }else{

                        // }
                        echo '
            
                                <tr>
                                <th scope="row">' . $sl_no . '</th>
                                <td>' . $row["account_no"] . '</td>
                                <td>' . $row["ac_holder_name"] . '</td>
                                <td>TK. ' . $row["ac_holder_current_balance"] . '</td>
                                <td>' . $row["ac_type"] . '</td>
                                <td >' . $row["datetime"] . '</td>
                                <td ><a href="/manage_account?ac_no=' . $row['account_no'] . '"><button class="btn btn-dark">Mannage account</button></a></td>
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