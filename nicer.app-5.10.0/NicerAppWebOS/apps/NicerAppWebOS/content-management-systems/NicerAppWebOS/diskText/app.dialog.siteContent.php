<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);    

$myPath_diskText_userSpecific = realpath(dirname(__FILE__).'/../../../../../..');
require_once ($myPath_diskText_userSpecific.'/NicerAppWebOS/boot.php');
require_once ($myPath_diskText_userSpecific.'/NicerAppWebOS/logic.vividUserInterface/v5.y.z/photoAlbum/4.0.0/functions.php');
global $naWebOS;
$view = (array)$naWebOS->view;
//$view = json_decode (base64_decode_url($_GET['apps']), true);
?>

<?php
global $naWebOS;
global $rootPath_na;
//echo '<pre>'; var_dump ($view);

foreach ($view as $fp1 => $rec) {
    $rec = (array)$rec;
    $fp1 = $rootPath_na.$fp1;
    if (substr($rec['file'],0,1)=='/')
        $fPath = $rootPath_na.$rec['file'];
    else
        $fPath = $fp1.'/'.$rec['file'];
    echo require_return ($fPath);
    //echo $fPath;
}
?>
