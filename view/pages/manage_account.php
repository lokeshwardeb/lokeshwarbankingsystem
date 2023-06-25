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


$ac_no = $sql->get_html_special($_GET['ac_no']);



?>


            <div class="container-fluid mt-4">

<div class="container">
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

<div class="container ms-5 ps-5">
    <div class="container ms-5 ps-5">
        
        <?php

           
$result = $sql->all_where_sql('ac_holders', 'account_no', "$ac_no");
while($row = $result->fetch_assoc()){
    echo '
    <img src="/assets/img/upload/ac_holders/img/'.$row['ac_holder_img'].'" width="auto" height="400px" class="ms-5 ps-5 text-center mt-4" alt="" srcset="">
    ';
}



        
    ?>
    </div>

    <div class="text-center fs-4 fw-bold mb-4 mt-4 pt-4">
                            Current Balance

                        </div>
                        <div class="container text-center text-warning mt-4 mb-4 fs-4 ">
                           <span class="bg-dark p-3">
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





                        











    <table class="table">
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
                      
                      <?php

           
$result = $sql->all_where_sql('ac_holders', 'account_no', "$ac_no");
while($row = $result->fetch_assoc()){
    echo '
    <a href="make_transaction?ac_no='.$ac_no.'"><button type="submit" class="btn btn-dark ms-4 mb-4 btn-sm-sm">Make Transaction</button></a>
    ';
}
                      ?>
                      <!-- <a href="make_transaction?"><button type="submit" class="btn btn-dark ms-4 mb-4 btn-sm-sm">Make Transaction</button></a> -->

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