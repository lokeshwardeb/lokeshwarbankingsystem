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

    <div class="container-fluid " style="min-height: 100vh; height:auto">
        <?php
        include "inc/_navbar.php";



        ?>


   
            <div class="col-10 bg-light" style="min-height: 100vh; height:auto">
                <div class="container">
                    <?php

include 'inc/_search.php';

$sql = new sql_info;


?>


<div class="container-fluid">


<table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
      <th scope="col">Account No (Ac no)</th>
      <th scope="col">Account Holder Name</th>
      <th scope="col">Account Type</th>
      <th scope="col">Account Created On</th>
      <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div class="text-center fs-5 fw-bold mb-4 mt-4 pt-4">
                             Search Results

                             <div class="container">

                             <?php

echo $search_txt = $sql->get_html_special($_GET['search_txt']);


                             ?>
                             </div>


                        </div>

                        <!-- <button type="submit" class="btn btn-dark mb-4 btn-sm-sm d-print-none" onclick="window.print()">Print out</button> -->
                       <a href="/"><button type="submit" class="btn btn-outline-dark ms-4 mb-4 btn-sm-sm d-print-none" >go back</button></a>

                        <?php



$sql = new sql_info();

// $ac_no = $sql->get_html_special($_GET['ac_no']);

$search_txt = $sql->get_html_special($_GET['search_txt']);


$result = $sql->ac_holder_all_search_sql($search_txt);
// $result = $sql->all_where_sql("ac_transactions", "account_no", "$ac_no");

                        $num  =  $result->num_rows;

                        if ($num > 0) {
                            $sl_no = 1;
                            while ($row = $result->fetch_assoc()) {


                                echo '

                                <th scope="row">'.$sl_no.'</th>
                                <td>'.$row["account_no"].'</td>
                                <td>'.$row["ac_holder_name"].'</td>
                                <td>'.$row["ac_type"].'</td>
                                <td >'.$row["datetime"].'</td>
                                <td ><a href="/manage_account?ac_no='.$row['account_no'].'"><button class="btn btn-dark">Mannage account</button></a></td>
          </tr>
            
            ';

                                $sl_no++;
                            }
                        } else {

                            echo error_msg("The sheet has no entry with the searching result <b> '".$search_txt."'</b>");
                            // echo 'the sheet has no entry';
                        }


                        ?>


                    </tbody>
                </table>


</div>



                </div>





                </div>





           
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        </div>





    </div>

    








</main>

<?php

require "inc/_footer.php";

?>