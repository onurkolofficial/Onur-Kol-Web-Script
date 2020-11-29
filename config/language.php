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

// Convert Language strings (ini) to PHP Variables.
$languagefile=$_SERVER['DOCUMENT_ROOT']."/language/".$langf.".ini";
$langKeys=$Ini->Read($languagefile);
foreach($langKeys as $pdkey => $pdval){
    if(is_array($pdval)){
        foreach($pdval as $plkey => $plval){
            $_LANG[$pdkey][$plkey]=$plval;
        }
    }
    else{
        $_LANG[$pdkey]=$pdval;
    }
}
?>