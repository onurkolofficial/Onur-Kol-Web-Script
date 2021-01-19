<?php
// Copyright (c) 2021 by Onur KOL
// Use Modules.
use \WebConfig\Config as WebConfig;

// Check Connect Configuration File
$ConnectIniFile=WebConfig::ConnectPath."/connect.ini";

if(file_exists($ConnectIniFile)){
    // Get Informations from connect.ini file
    $GetConnectInfoFromIni=$Ini->Read($ConnectIniFile);
    // Get Values
    $Server=$GetConnectInfoFromIni['db_server'];
    $User=$GetConnectInfoFromIni['db_user'];
    $Password=$GetConnectInfoFromIni['db_password'];
    $Database=$GetConnectInfoFromIni['db_name'];
    // Check Server Connection
    $WebConfig->SetConnectInfo($Server,$User,$Password,$Database);
    if(!$WebConfig->Connect()){
        // Fixed Redirect Loop (for Setup Server)
        if(!isset($ServerEditMode)){
            // Connection Failed. Open Web Server Setup.
            header("Location: /admin/setup/");
        }
    }
    else{
        // Connection Success.
        if(isset($ServerEditMode) && $ServerEditMode==true){
            // If tried open setup mode to redirect home page.
            header("Location: /");
        }
    }
}
else{
    // 'connect.ini' File Not Found. Open System Error.
    header("Location: /admin/error/system/");
}
?>