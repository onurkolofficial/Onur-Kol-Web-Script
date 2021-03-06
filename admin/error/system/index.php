<!doctype html>
<html>
<?php
// Set error mode
$setmode=0x3E6;
// Include Config
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

require WebConfig::ConfigPath."/head.php";
?>
<body>
<!-- Navigation Main !-->
<?php require WebConfig::ConfigPath."/navigation.php"; ?>
<div class="content-main">
    <div class="page-details">
        <p><i class="fad fa-exclamation-triangle"></i> <?php echo $_LANG['string_error_system_title']; ?></p>
        <h4><?php echo $_LANG['string_error_system_title_summary']; ?></h4>
    </div>
    <div class="page-section">
        <!-- Temporary Notes !-->
        <div style="text-align:center;">
            <h2><?php echo $_LANG['string_error_system_text']; ?></h2>
            <p><?php echo $_LANG['string_error_system_text_summary']; ?></p>
        </div>
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
