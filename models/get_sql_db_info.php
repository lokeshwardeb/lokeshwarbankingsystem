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
        $sql_all_where = "SELECT * FROM `$table_name` WHERE `$condition_row_name` = '$equal_condition'";
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
    public function insert_sql($table_name, $row_name, $values){
        // use comma (,) after each $row_name when it is more than once. here is the example bellow
        // get_sql_info("table_name", "row_name1, row_name2")
        $insert_sql = "INSERT INTO `$table_name` ($row_name) VALUES ($values);";
        $result = $this->db_connect()->query($insert_sql);

        return $result;
    }
    public function get_html_special($info){
        // use comma (,) after each $row_name when it is more than once. here is the example bellow
        // get_sql_info("table_name", "row_name1, row_name2")
       $result =  htmlspecialchars(mysqli_real_escape_string($this->db_connect(), $info));
        // $result = $this->db_connect()->query($insert_sql);

        return $result;
    }
    public function transaction_join_sql($account_no){
        // use comma (,) after each $row_name when it is more than once. here is the example bellow
        // get_sql_info("table_name", "row_name1, row_name2")

        // SELECT * FROM `ac_holders` ah JOIN ac_transactions act ON ah.account_no = act.account_no;

        
        $transaction_sql = "SELECT * FROM `ac_holders` ah JOIN ac_transactions act ON ah.account_no = act.account_no WHERE  ah.account_no = '$account_no'; ";
        $result = $this->db_connect()->query($transaction_sql);
        

        return $result;
    }
    public function transaction_sql($account_no){
        // use comma (,) after each $row_name when it is more than once. here is the example bellow
        // get_sql_info("table_name", "row_name1, row_name2")

        // SELECT * FROM `ac_holders` ah JOIN ac_transactions act ON ah.account_no = act.account_no;

        
        $transaction_sql = "SELECT * FROM `ac_holders` WHERE account_no = '$account_no';";
        $result = $this->db_connect()->query($transaction_sql);
        

        return $result;
    }
    public function update_all_sql($table_name, $row_name, $value, $grab_point, $grab_point_value){
        // use comma (,) after each $row_name when it is more than once. here is the example bellow
        // get_sql_info("table_name", "row_name1, row_name2")

        // SELECT * FROM `ac_holders` ah JOIN ac_transactions act ON ah.account_no = act.account_no;

        
        $update_sql = "UPDATE `$table_name` SET `$row_name` = '$value' WHERE `$table_name`.`$grab_point` = '$grab_point_value';";
        $result = $this->db_connect()->query($update_sql);
        

        return $result;
    }
    public function ac_holder_all_search_sql($search_txt){
        // use comma (,) after each $row_name when it is more than once. here is the example bellow
        // get_sql_info("table_name", "row_name1, row_name2")

        // SELECT * FROM `ac_holders` ah JOIN ac_transactions act ON ah.account_no = act.account_no;

        
        $search_sql = "SELECT * FROM `ac_holders` WHERE `account_no` LIKE '%$search_txt%' OR `ac_holder_name` LIKE '%$search_txt%' OR `ac_holder_age` LIKE '%$search_txt%' OR `ac_type` LIKE '%$search_txt%' OR `ac_holder_c_address` LIKE '%$search_txt%' OR `ac_holder_p_address` LIKE '%$search_txt%' OR `datetime` = '$search_txt'";
        $result = $this->db_connect()->query($search_sql);
        

        return $result;
    }


}




?>