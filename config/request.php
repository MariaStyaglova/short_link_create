<?php
class Request{
    private $connect;
    private $tableName = "urls";
    private $url = "url";
    private $short = "short";

    public function __construct($connect){
        $this->connect = $connect;

    }

    public function shortGen($min,$max){
        $chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $new_chars = str_split($chars);
    
        $short='';
        $rand_end=mt_rand($min,$max);
    
        for($i=0; $i<$rand_end; $i++){
            $short .= $new_chars[ mt_rand(0,count($new_chars) - 1)];
        }
        return $short;
    }
    public function check($connect,$short){
        $check = mysqli_query($connect, "SELECT * FROM ".$this->tableName." WHERE ".$this->short." = '".$short."'");

        if(!mysqli_num_rows($check)){
            $search=true;
            return $search;
        }
    }
    public function write($connect,$request,$short){
        $add = mysqli_query($connect, "INSERT INTO ".$this->tableName." (".$this->url.",".$this->short.") VALUES ('".$request."','".$short."')");
        return $add;
    }
    public function redirect($connect,$short){
        $check = mysqli_query($connect, "SELECT * FROM ".$this->tableName." WHERE ".$this->short." = '".$short."'");
    
        if(mysqli_num_rows($check)>0){
            $row=mysqli_fetch_assoc($check);
            return header("Location: ".$row['url']);
            exit;
        } else {
            return die("Ошибка");
        }
    }
}