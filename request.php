<?
include_once "config/connect.php";
include_once "config/request.php";
$db=new Connect;
$connect = $db->getConnection();
$requestBd=new Request($connect);

if(isset($_POST["url"])){
    $request = trim($_POST["url"]);
    $protocol=["http://","https://"];
    $protocolAdd=false;
    foreach($protocol as $v){
        if (mb_stripos($request, $v) !== false) {
            $protocolAdd=true;
        }
    }
    if(!$protocolAdd){
        $request='http://'.$request;
    }
    $request= mysqli_real_escape_string($connect, $request);
    $search = false;
    $short='';
    
    while(!$search){
        $short=$requestBd->shortGen(2,7);
        $search=$requestBd->check($connect,$short);
    }
    
    if($search){
        $add = $requestBd->write($connect,$request,$short);
        if($add) {
            $urlShort=$_SERVER["SERVER_NAME"].'/'.$short;
            echo $urlShort;
        } else {
        }
    } else {
    }
}