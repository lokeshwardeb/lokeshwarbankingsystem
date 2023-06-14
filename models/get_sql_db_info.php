<?php
// include "inc/_info.php";

// include "config/conn.php";



class sql_info extends connect {
    public function all_sql_info($table_name){
        $sql_all_info = "SELECT * FROM `$table_name`";
        $result = $this->db_connect()->query($sql_all_info);

        return $result;

    }

    public function all_where_sql($table_name, $condition_row_name, $equal_condition){
        $sql_all_where = "SELECT * FROM `$table_name` WHERE `$condition_row_name` = $equal_condition";
        $result = $this->db_connect()->query($sql_all_where);

        return $result;
    }

    public function get_sql_info($table_name, $row_name){
        // use comma (,) after each $row_name when it is more than once. here is the example bellow
        // get_sql_info("table_name", "row_name1, row_name2")
        $get_sql_info = "SELECT '$row_name' FROM `$table_name` WHERE 1;";
        $result = $this->db_connect()->query($get_sql_info);

        return $result;
    }
    public function get_where_sql($table_name, $row_name, $condition_row_name, $equal_condition){
        // use comma (,) after each $row_name when it is more than once. here is the example bellow
        // get_sql_info("table_name", "row_name1, row_name2")
        $get_sql_info = "SELECT '$row_name' FROM `$table_name` WHERE '$condition_row_name' = '$equal_condition';";
        $result = $this->db_connect()->query($get_sql_info);

        return $result;
    }


}




?>