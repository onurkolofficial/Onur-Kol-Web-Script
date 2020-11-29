<?php
session_start();

// Variables
$site_version="1.1.0";

// Loading Modules (Client)
require_once $_SERVER['DOCUMENT_ROOT']."/config/client/ini.php";
require_once $_SERVER['DOCUMENT_ROOT']."/config/client/keygen.php";
// Loading Modules (Server)
require_once $_SERVER['DOCUMENT_ROOT']."/config/server/server.php";
require_once $_SERVER['DOCUMENT_ROOT']."/config/server/sql.php";

// Language Settings
require $_SERVER['DOCUMENT_ROOT']."/config/language.php";

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