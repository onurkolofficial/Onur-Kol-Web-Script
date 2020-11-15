<?php
// Language Settings
$lang=$_GET['lang'];
$langf="";
if(isset($lang)){
    setcookie("language",$lang,time()+(86400*30), "/");
    $langf=$lang;
}
else{
    if(isset($_COOKIE['language'])){
        $langf=$_COOKIE['language'];
    }
    else{
        setcookie("language","en",time()+(86400*30), "/");
        $langf="en";
    }
}

require $_SERVER['DOCUMENT_ROOT']."/language/".$langf.".php";

?>