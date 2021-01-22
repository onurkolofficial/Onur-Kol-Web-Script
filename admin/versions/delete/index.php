<?php
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

// Get Data (Category Id)
$VersionName=$_GET['ver'];

if(empty($VersionName)){
    echo '<script>alert("'.$_LANG['string_error_text'].' '.$_LANG['string_empty_value_text'].'"); window.location.href="../";</script>';
}
else{
    // Delete Item
    if($WebConfig->Query("DELETE FROM versionlog WHERE VersionName='$VersionName'")){
        // Success.
        header("Location: ../");
    }
    else{
        echo '<script>alert("'.$_LANG['string_unknown_error'].'"); window.location.href="../";</script>';
    }
}
?>