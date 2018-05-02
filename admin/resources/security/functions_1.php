<?php
function notifydie($str){
    $noti = $str ? $str : 'Loi truy van CSDL';
    session_unset();
    session_destroy();
    die($noti);
}

function str_debase($encodedStr=""){
    $returnStr = "";
    if(!empty($encodedStr)) {
        $dec = str_rot13($encodedStr);
        $dec = base64_decode($dec);
        $returnStr = $dec;
    }
    return $returnStr;
}
function print_error_msg($errorMsg){                                                                
    if($errorMsg) echo '<div class="alert alert-block alert-danger fade in"><button type="button" class="close close-sm" data-dismiss="alert"><i class="fa fa-times"></i></button>'.$errorMsg.'</div>';
    else echo '';
}
?>