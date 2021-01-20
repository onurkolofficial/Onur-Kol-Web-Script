<!doctype html>
<html>
<?php
// Include Main Config
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

require WebConfig::ConfigPath."/head.php";
?>
<body>
<!-- Navigation Main !-->
<?php require WebConfig::ConfigPath."/navigation_error.php"; ?>
<div class="content-main">
    <div class="page-details">
        <p><i class="fad fa-list"></i> <?php echo $_LANG['string_page_404_text']; ?></p>
        <h4><?php echo $_LANG['string_page_404_summary']; ?></h4>
    </div>
    <div class="page-section">
        <br><br>
        <div style="text-align:center;">
            <a href="/">
                <button style="font-size:20px; width:160px; height:75px;"><?php echo $_LANG['string_home_text']; ?></button>
            </a>
        </div>
        <br><br>
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
