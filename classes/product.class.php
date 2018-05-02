<?
class Product{
    public static function getNumberInstock($pro_id){
        if(!$pro_id) return 0;
        $db_query = new db_query('SELECT pro_number_in_stock,pro_status_in_stock
                                 FROM products
                                 WHERE pro_id = '.$pro_id);
        $number = mysql_fetch_assoc($db_query->result);
        if(!$number || !$number['pro_number_in_stock'])    return 0;
        if($number['pro_status_in_stock'] != 1) return 0;
        return $number['pro_number_in_stock'];
    }
}
?>