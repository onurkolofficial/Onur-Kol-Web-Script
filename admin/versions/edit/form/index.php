<?php
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

// Get Form Data
$OldVersionName=$_POST['oldversion'];
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
        // Update Another Data
        if($WebConfig->Query("UPDATE versionlog SET VersionName='$VersionName',VersionText='$FixedVersionMessage' WHERE VersionName='$OldVersionName'")){
            // Success
            // Redirect Back
            header("Location: ../../");
        }
        else{
            echo '<script>alert("'.$_LANG['string_exists_version_name_text'].'"); window.location.href="../?ver='.$OldVersionName.'";</script>';
        }

    }
}
?>