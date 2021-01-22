<?php
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

// Get Form Data
$AppCategory=$_POST['category'];
$AppName=$_POST['name'];
$AppAuthor=$_POST['author'];
$AppImageUrl=$_POST['image'];
$AppSource=$_POST['source'];
$AppDownload=$_POST['download'];
// Generate Application ID (keygen module:/config/modules/keygen.php)
$AppId=$KeyGen->CreateKey(50);

if(empty($AppName)){
    echo '<script>alert("'.$_LANG['string_empty_app_name_text'].'"); window.location.href="../";</script>';
}
else{
    if(empty($AppImageUrl)){
        echo '<script>alert("'.$_LANG['string_empty_app_image_text'].'"); window.location.href="../";</script>';
    }
    else{
        $TableRows="AppId,CategoryId,AppName,AppAuthor,AppImage,AppDownloadUrl,AppSourceUrl";
        $TableValues="'$AppId','$AppCategory','$AppName','$AppAuthor','$AppImageUrl','$AppDownload','$AppSource'";
        $QString="INSERT INTO applications ($TableRows) VALUES ($TableValues)";
        if($WebConfig->Query($QString)){
            // Success.
            header("Location: ../../");
        }
        else{
            echo '<script>alert("'.$_LANG['string_unknown_error'].'"); window.location.href="../";</script>';
        }

    }
}
?>