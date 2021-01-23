<!doctype html>
<html>
<?php
// Include Main Config
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

// Exec Admin Config
require WebConfig::ConfigPath."/admin.php";

// Get User Information
$QueryResult=$WebConfig->Query("SELECT * FROM users WHERE id='$AdminID'");
$User=$WebConfig->FetchAssoc($QueryResult);

require WebConfig::ConfigPath."/head.php";
?>
<body>
<!-- Navigation Main !-->
<?php require WebConfig::ConfigPath."/navigation_admin.php"; ?>
<div class="content-main">
    <div class="page-details">
        <p><i class="fad fa-home"></i> <?php echo $_LANG['string_admin_home_text']; ?></p>
        <h4><?php echo $_LANG['string_admin_home_summary']; ?></h4>
    </div>
    <div class="page-section">
        <!-- Temporary Notes !-->
        <div style="text-align:center;">
            <h2><?php echo $_LANG['string_admin_home_text'] ?></h2>
            <p><?php echo $_LANG['string_admin_text'].": ".$User['UserFirstName']." ".$User['UserLastName']; ?></p>
        </div>
    </div>
    <div class="page-section">
        <h2 class="page-title"><?php echo $_LANG['string_admin_summary']; ?></h2>
        <p>&nbsp;</p>
    </div>
</div>
<?php 
// Footer
require WebConfig::ConfigPath."/footer.php";
// Scripts
require WebConfig::ConfigPath."/scripts.php"; 
?>
</body>
</html>
