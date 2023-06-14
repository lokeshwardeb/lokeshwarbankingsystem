<?php
// this is for getting the data
// class views_info extends sql_info{
//     // declare the method name, table name and the row names as from the array
//     public function view_data($method_name, $table_name, $row_names){
//         foreach ($row_names as $row){
//             $result =  $this->$method_name($table_name);
//             foreach ($result as $data){
//               echo $the[] =   $data[$row];

//               print_r($the);
//             //   print_r($view_data);
//             }
//         }

//     }
// }
class views_info extends sql_info
{
    // declare the method name, table name and the row names as from the array
    public function view_data($method_name, $table_name, $row_names, $table_heading1, $table_heading2, $table_heading3)
    {
        echo '
        <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">'.$table_heading1.'</th>
            <th scope="col">'.$table_heading2.'</th>
            <th scope="col">'.$table_heading3.'</th>
          </tr>
        </thead>
        <tbody>
  
        ';

        $sl_no = 1;

        foreach ($row_names as $row) {
            $result =  $this->$method_name($table_name);

            echo '        
            <tr>
            <th scope="row">'.$sl_no  .'</th>
            
            
          ';

            foreach ($result as $data) {

                //   echo  $view_data[] =  $data[$row];
                $view_data =  $data[$row];

                echo '
               
       
                    <td>'. $view_data.'</td>
                
                  
    
              ';




                //   print_r($view_data);
            }

            echo '     
            </tr>
           
 
                      ';
                      $sl_no ++;
        }

        echo '
      
            
        </tbody>
        </table>
        ';
    }
}

class views_table extends views_info
{
    public function view_table_data($get_data)
    {

        // $this->view_data();

        // foreach($get_data as $view_table_data){
        //     print_r($view_table_data);
        // }
        echo $get_data;
    }
}
