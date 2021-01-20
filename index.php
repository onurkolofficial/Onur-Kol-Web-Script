<!doctype html>
<html>
<?php
// Include Main Config
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

// Set active page
$page="home";

require WebConfig::ConfigPath."/head.php";
?>
<body>
<!-- Navigation Main !-->
<?php require WebConfig::ConfigPath."/navigation.php"; ?>
<div class="content-main">
    <div class="page-details">
        <p><i class="fad fa-home"></i> <?php echo $_LANG['string_home_text']; ?></p>
        <h4><?php echo $_LANG['string_home_page_summary']; ?></h4>
    </div>
    <div class="page-section">
        <!-- Temporary Notes !-->
        <div style="text-align:center;">
            <h2><?php echo $_LANG['string_tempNoteReleaseNewWeb']; ?></h2>
            <p><?php echo $_LANG['string_tempNoteSummary']; ?></p>
        </div>
    </div>
    <div class="page-section">
        <h2 class="page-title"><?php echo $_LANG['string_properties_text']; ?></h2>
        <?php
        $FixedNewLine=$_LANG['string_version100_text'];
        // Replace
        $Version100Text=str_replace('\n','<br><br>',$FixedNewLine);
        echo '<p>'.$Version100Text.'</p>';
        ?>
    </div>
    <div class="page-section">
        <h2 class="page-title"><?php echo $_LANG['string_applications_text']; ?></h2>
        <p><?php echo $_LANG['string_click_my_applications_nav']; ?></p>
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
