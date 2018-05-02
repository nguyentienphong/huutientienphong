<? 
require 'inc_security.php';
$rer_id = getValue('rer_id','int','GET',0);
$field = getValue('field','str','GET','');
if($rer_id > 0){
   $file_name = db_one("SELECT ".$field." FROM ".$bg_table." WHERE rer_id =".$rer_id);

$path = $_SERVER['DOCUMENT_ROOT']."/file/resume/"; // change the path to fit your websites document structure
$fullPath = $path.$file_name;
if(file_exists($fullPath)){
   if ($fd = fopen ($fullPath, "r")) {
       $fsize = filesize($fullPath);
       $path_parts = pathinfo($fullPath);
       $ext = strtolower($path_parts["extension"]);

switch ($ext) {
  case "pdf": $ctype="application/pdf"; break;
  case "exe": $ctype="application/octet-stream"; break;
  case "zip": $ctype="application/zip"; break;
  case "docx":
  case "doc": $ctype="application/msword"; break;
  case "csv":
  case "xls":
  case "xlsx": $ctype="application/vnd.ms-excel"; break;
  case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
  case "gif": $ctype="image/gif"; break;
  case "png": $ctype="image/png"; break;
  case "jpeg":
  case "jpg": $ctype="image/jpg"; break;
  case "tif":
  case "tiff": $ctype="image/tiff"; break;
  case "psd": $ctype="image/psd"; break;
  case "bmp": $ctype="image/bmp"; break;
  case "ico": $ctype="image/vnd.microsoft.icon"; break;
  default: $ctype="application/force-download";
}

header("Pragma: public"); // required
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false); // required for certain browsers
header("Content-Type: $ctype");
header("Content-Disposition: attachment; filename=\"".$file_name."\";" );
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".$fsize);
ob_clean();
flush();
readfile( $fullPath );
   }
}
else echo "file không tồn tại !";
exit;
}
?>