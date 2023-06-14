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

    <div class="container-fluid " style="height: 100vh;">
        <?php
        include "inc/_navbar.php";



        ?>


   
            <div class="col-10 bg-light" style="height: 100vh;">
                <div class="container-fluid">
                    <?php
                    include "inc/_search.php";
                    ?>

                    <div class="container-fluid mt-4">
                        <div class="row">
                            <div class="col-3 bg-success text-light p-3 border-5 border-end border-light">total user account holder</div>
                            <div class="col-3 bg-success text-light p-3 border-5 border-end border-light">Total Admin Account holder</div>
                            <div class="col-3 bg-success text-light p-3 border-5 border-end border-light">Total Savings Account Holder</div>
                            <div class="col-3 bg-success text-light p-3 border-5 border-end border-light">Total Student Account Holder</div>
                        </div>
                        <div class="row">
                            <div class="col-3 bg-dark text-light p-3 border-5 border-end border-light">1r welcome to users</div>
                            <div class="col-3 bg-dark text-light p-3 border-5 border-end border-light">4r</div>
                            <div class="col-3 bg-dark text-light p-3 border-5 border-end border-light">8</div>
                            <div class="col-3 bg-dark text-light p-3 border-5 border-end border-light">7</div>
                        </div>
                    </div>

                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-3">
                                <a href="">Create a new savings account</a>

                            </div>
                            <div class="col-3">
                                <a href="">Create a new savings account</a>

                            </div>
                            <div class="col-3">
                                <a href="">Create a new savings account</a>

                            </div>
                            <div class="col-3">
                                <a href="">Create a new savings account</a>

                            </div>
                        </div>
                    </div>

                </div>



                <div class="container-fluid mt-4">
                <table class="table">
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

       if($num > 0 ){
        $sl_no = 1;
        while($row = $result->fetch_assoc()){
            

            echo '
            
            <tr>
            <th scope="row">1</th>
            <td>'.$row["account_no"].'</td>
            <td>'.$row["ac_holder_name"].'</td>
            <td class="badge-primary bg-primary">'.$row["datetime"].'</td>
          </tr>
            
            ';

            $sl_no++;

        }
       }else{
        
        echo error_msg("The sheet has no entry");
        // echo 'the sheet has no entry';
       }


    ?>

    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td class="badge-primary bg-primary">Thornton</td>
      <td>@fat</td>
      <!-- <span class="badge bg-danger">Breaking</span> -->
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>

                </div>





            </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        </div>





    </div>

    








</main>

<?php

require "inc/_footer.php";

?>