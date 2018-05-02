<?
$action = getValue('action','str','POST');
switch($action){
    case 'sync':
        $cart = json_decode(base64_decode(getValue('cart','str','COOKIE','')),1);
        $array_return = array('code'=>0,'msg'=>'');
        $id = getValue('id','int','POST',0);
        if(isset($cart[$id])){
            $number = getValue('number','int','POST',0);
            $cart[$id] = $number;
            $str_id = '';
            foreach($cart as $k=>$v){
                $str_id .= $k . ',';
            }
            $str_id = trim($str_id,',');
            //lấy ra giá tiền của các sản phẩm
            if($str_id){
                $total = 0;
                $subtotal = 0;
                $db_query = new db_query('SELECT pro_price,pro_id FROM products WHERE pro_active = 1 AND pro_id IN('.$str_id.')');
                while($row = mysql_fetch_assoc($db_query->result)){
                    $total += (int)$row['pro_price'] * $cart[$row['pro_id']];
                    if($row['pro_id'] == $id){

                        $subtotal = $row['pro_price'] * $cart[$row['pro_id']];
                    }
                }
                $array_return['code'] = 1;
                $array_return['subtotal'] = format_price($subtotal);
                $array_return['total'] = format_price($total);
                $cart = base64_encode(json_encode($cart));
                setcookie('cart',$cart,null,'/');
                die(json_encode($array_return));
            }
        }
        break;
    case 'delete':
        $cart = json_decode(base64_decode(getValue('cart','str','COOKIE','')),1);
        $array_return = array('code'=>0,'msg'=>'');
        $id = getValue('id','int','POST',0);
        if(isset($cart[$id])){
            unset($cart[$id]);
            $array_return['code'] = 1;
            $str_id = '';
            foreach($cart as $k=>$v){
                $str_id .= $k . ',';
            }
            $str_id = trim($str_id,',');
            //lấy ra giá tiền của các sản phẩm
            if($str_id){
                $total = 0;
                $db_query = new db_query('SELECT pro_price,pro_id FROM products WHERE pro_active = 1 AND pro_id IN('.$str_id.')');
                while($row = mysql_fetch_assoc($db_query->result)){
                    $total += (int)$row['pro_price'] * $cart[$row['pro_id']];
                }
                $array_return['code'] = 1;
                $array_return['total'] = format_price($total);
                $cart = base64_encode(json_encode($cart));
                setcookie('cart',$cart,null,'/');
                die(json_encode($array_return));
            }
        }
}
?>