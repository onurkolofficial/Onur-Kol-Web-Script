<?php
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

// Get Form Data
$UserName=$_POST['username'];
$Password=$_POST['password'];


if(empty($UserName)){
    echo '<script>alert("'.$_LANG['string_empty_username'].'"); window.location.href="../";</script>';
}
else{
    if(empty($Password)){
        echo '<script>alert("'.$_LANG['string_empty_password'].'"); window.location.href="../";</script>';
    }
    else{
        // Login Account and Set Session.
        // Convert Password
        $PasswordMD5=md5($Password);
        // Check Exist Accounts.
        $QueryResult=$WebConfig->Query("SELECT * FROM users WHERE UserName='$UserName' AND UserPassword='$PasswordMD5'");
        if($WebConfig->NumRows($QueryResult)>0){
            // Get User Data
            $UserRow=$WebConfig->FetchAssoc($QueryResult);
            // Found Account and Set Session
            $WebConfig->SetSession('UserID',$UserRow['id']);
            // Redirect Admin Homepage and Check Admin Account.
            header("Location: /admin/");
        }
        else{
            echo '<script>alert("'.$_LANG['string_wrong_account'].'"); window.location.href="../";</script>';
        }
    }
}
?>