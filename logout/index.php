<?php
// Include Main Config
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

// Close Session
$WebConfig->CloseSession();

// Redirect Home
header("Location: /");
?>
