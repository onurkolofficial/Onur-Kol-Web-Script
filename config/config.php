<?php
// Copyright (c) 2021 by Onur KOL
session_start();

// WebConfig Module
require $_SERVER['DOCUMENT_ROOT']."/config/WebConfig/webconfig.php";

use \WebConfig\Config as WebConfig;
// Define Web Config Class
$WebConfig=new WebConfig();
///

// PHPMailer Module
require WebConfig::ConfigPath."/PHPMailer/src/Exception.php";
require WebConfig::ConfigPath."/PHPMailer/src/PHPMailer.php";
require WebConfig::ConfigPath."/PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Include All Tools
foreach(glob(WebConfig::ModulesPath."/*.php") as $toolfile){
    require $toolfile;
}

// Language Settings
require WebConfig::ConfigPath."/language.php";
// Database Connection
require WebConfig::ConnectPath."/connect.php";

// Variables
// Get Site Version
$QueryResult=$WebConfig->Query("SELECT * FROM `versionlog` ORDER BY `VersionReleaseDate` DESC");
$Row=$WebConfig->FetchAssoc($QueryResult);
if(isset($Row['VersionName']))
    $WebVersion=$Row['VersionName'];
else
    $WebVersion="0.0.0";

?>