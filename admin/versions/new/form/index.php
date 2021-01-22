<?php
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

// Get Form Data
$VersionName=$_POST['version'];
$VersionMessage=$_POST['message'];

if(empty($VersionName)){
    echo '<script>alert("'.$_LANG['string_empty_version_name_text'].'"); window.location.href="../";</script>';
}
else{
    if(empty($VersionMessage)){
        echo '<script>alert("'.$_LANG['string_empty_version_message_text'].'"); window.location.href="../";</script>';
    }
    else{
        // Fixed new Line
        $FixedVersionMessage=nl2br($VersionMessage);
        // Save
        $TableRows="VersionName,VersionText";
        $TableValues="'$VersionName','$FixedVersionMessage'";
        $QString="INSERT INTO versionlog ($TableRows) VALUES ($TableValues)";
        if($WebConfig->Query($QString)){
            // Success.
            header("Location: ../../");
        }
        else{
            echo '<script>alert("'.$_LANG['string_exists_version_name_text'].'"); window.location.href="../";</script>';
            //echo '<script>alert("'.$_LANG['string_unknown_error'].'"); window.location.href="../";</script>';
        }

    }
}
?>