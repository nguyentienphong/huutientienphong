<?php
$isAdmin = isset($_SESSION["isAdmin"]) ? intval($_SESSION["isAdmin"]) : 0;
$user_id = isset($_SESSION["user_id"]) ? intval($_SESSION["user_id"]) : 0;
$sql = '';
if($isAdmin != 1){
	$sql = ' INNER JOIN admin_users_right ON(adu_admin_module_id  = mod_id AND adu_admin_id = ' . $user_id . ')';
}
$db_menu = new db_query("SELECT * 
						 FROM modules 
						 " . $sql . "
						 ORDER BY mod_order ASC");
?>

<?php
$menu = $db_menu->resultArray();
foreach($menu as $mod){
    if(!file_exists("modules/" . $mod["mod_path"] . "/inc_security.php") && !file_exists("core/" . $mod["mod_path"] . "/inc_security.php")) continue;
    $filepath = file_exists("modules/" . $mod["mod_path"] . "/inc_security.php") ? 'modules' : 'core';
    ?>
    <li class="menu-list module_link">
      <a href="#" onclick="return false"><i class="fa <?=($mod['mod_icon']) ? $mod['mod_icon']:'fa-home'?> font-size14"></i> <span><?=$mod['mod_name']?></span></a>
        <ul class="sub-menu-list">
        <?php 
        $arraySub = explode("|",$mod["mod_listname"]);
		$arrayUrl = explode("|",$mod["mod_listfile"]);
        ?>
        
            <?php foreach($arraySub as $key=>$value):?>
            <li><a href="<?=$filepath.'/'.$mod['mod_path'].'/'.$arrayUrl[$key]?>" class="load-iframe"> <?=$arraySub[$key]?></a></li>
            
            <?php endforeach;?>
        </ul>
    </li>

    <?php
}
?>

<script>

</script>