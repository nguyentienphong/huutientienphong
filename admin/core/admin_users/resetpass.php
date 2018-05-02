<?
require 'inc_security.php';
checkPermission('edit');
$id = getValue('id','int','GET',0);
$db_execute = new db_execute('UPDATE '.$bg_table.' SET adm_password = "'.md5(123456).'" WHERE '.$id_field.'='.$id);
redirect(call_module_file('admin_users','listing'));
?>