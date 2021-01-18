<?php
session_start();

// WebConfig Module
require_once $_SERVER['DOCUMENT_ROOT']."/config/WebConfig/webconfig.php";

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
    require_once $toolfile;
}

// Variables
$site_version=WebConfig::Version;

// Language Settings
require WebConfig::ConfigPath."/language.php";

/*
*********** FOR NEXT VERSION *************
// Connecting Server
$cncheck=false;
if($setmode==0x3E7 || $setmode==0x3E6)
    $cncheck=true;
else
    $cncheck=false;

if(!$cncheck)
    require $_SERVER['DOCUMENT_ROOT']."/config/server/connect.php";
*/

?>