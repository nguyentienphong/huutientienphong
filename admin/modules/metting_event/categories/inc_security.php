<?
require_once '../../../resources/security/security.php';
require_once '../../../../classes/category.class.php';
$module_id	= 2;
$module_name = 'Quản lý danh mục';
checkLogged();
$bg_errorMsg = '';
$bg_table = 'categories';
$id_field = 'cat_id';
$name_field = 'cat_name';
$alias_field = 'cat_alias';
$cat_type = 'post';
$catBase = new Category;
?>