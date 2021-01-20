<?php
// Copyright (c) 2021 by Onur KOL

// Use Modules.
use \WebConfig\Config as WebConfig;

///! First, Check Admin Session.
if($WebConfig->GetSessionExist('UserID')){
    $UserId=$WebConfig->GetSession('UserID');
    // Now Check Admin Account.
    $QueryResult=$WebConfig->Query("SELECT * FROM `admin` WHERE UserId='$UserId'");
    if($WebConfig->NumRows($QueryResult)<=0){
        // Account is not Admin.
        // Redirect 404 Error
        header("Location: /404");
    }
    else{
        // Set Admin User id
        $AdminID=$UserId;
    }
}
else{
    // Redirect 404 Error
    header("Location: /404");
}