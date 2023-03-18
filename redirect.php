<?include_once "config/connect.php";
include_once "config/request.php";
include_once "request.php";
$short = $_SERVER["REQUEST_URI"];
$short = trim($short,"/");

if(mb_strlen($short)>0){
    $check=$requestBd->redirect($connect,$short);
}