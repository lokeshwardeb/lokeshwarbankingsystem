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

?>


<main class="bg-light">
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

<div class="container">
    <div class="row">
        <div class="col-12 fs-4 mb-4 text-center">
            Lokeshwar Bank Limited
        </div>
        <div class="col-12">
            Account No: <b> #lokbank-125325232452-svs-ac-12525</b>
        </div>
        <div class="col-6">
           Account Holder Name: <b>Lokeshwar Deb</b>
        </div>
        <div class="col-6">
            Age: <b>18 years</b>
        </div>
        <div class="col-6">
            Account Type: <b>Savings account</b>
        </div>
        <div class="col-6">
            Account Created on: <b>25/6/2023</b>
        </div>
        <div class="col-6">
            Current Address: <b>Paikpara, Brahamanbaria</b>
        </div>
        <div class="col-6">
            Permanent Address: <b>Paikpara, Brahamanbaria</b>
        </div>
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
                          tk 4545
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

                        <button type="submit" class="btn btn-dark mb-4 btn-sm-sm d-print-none" onclick="window.print()">Print out</button>
                       <a href="/"><button type="submit" class="btn btn-outline-dark ms-4 mb-4 btn-sm-sm d-print-none" >go back</button></a>

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