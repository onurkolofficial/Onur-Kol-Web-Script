<?php
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

// Get Form Data
$AppId=$_POST['appid'];
$AppCategory=$_POST['category'];
$AppName=$_POST['name'];
$AppAuthor=$_POST['author'];
$AppImageUrl=$_POST['image'];
$AppSource=$_POST['source'];
$AppDownload=$_POST['download'];

if(empty($AppName)){
    echo '<script>alert("'.$_LANG['string_empty_app_name_text'].'"); window.location.href="../?id='.$AppId.'";</script>';
}
else{
    if(empty($AppImageUrl)){
        echo '<script>alert("'.$_LANG['string_empty_app_image_text'].'"); window.location.href="../?id='.$AppId.'";</script>';
    }
    else{
        // Update Data
        $WebConfig->Query("UPDATE applications SET CategoryId='$AppCategory',AppName='$AppName',AppAuthor='$AppAuthor',AppImage='$AppImageUrl',AppDownloadUrl='$AppDownload',AppSourceUrl='$AppSource' WHERE AppId='$AppId'");

        // Redirect Back
        header("Location: ../../");
    }
}
?>