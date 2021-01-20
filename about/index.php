<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

// Set active page
$page="about";

require WebConfig::ConfigPath."/head.php";
?>
<body>
<!-- Navigation Main !-->
<?php require WebConfig::ConfigPath."/navigation.php"; ?>
<div class="content-main">
    <div class="page-details">
        <p><i class="fad fa-info"></i> <?php echo $_LANG['string_about_text']; ?></p>
        <h4><?php echo $_LANG['string_about_summary']; ?></h4>
    </div>
    <div class="page-section">
        <h2 class="page-title"><?php echo $_LANG['string_version_history_text']; ?></h2>
        <p class="page-title"><?php echo $_LANG['string_version_history_summary']; ?></p>
        <h2><?php echo $_LANG['string_versions_text']; ?></h2>
    </div>
    <?php
        // Get Version Log
        $QueryResult=$WebConfig->Query("SELECT * FROM `versionlog` ORDER BY `VersionReleaseDate` DESC");
        // Print Version Log
        while($Row=$WebConfig->FetchAssoc($QueryResult)){
            $VersionName=$Row['VersionName'];
            // Check VersionText exists to Language Key.
            $VersionText="";
            $verLanguageKey=trim($Row['VersionText'],"$");
            // Check Language Key.
            if(isset($_LANG[$verLanguageKey])){
                // Convert '\n' to '<br>'.
                $FixedNewLine=$_LANG[$verLanguageKey];
                // Replace
                $VersionText=str_replace('\n','<br>',$FixedNewLine);
            }
            else
                $VersionText=$Row['VersionText'];

            // Print Version Log
            echo '<div class="page-section">
            <h2 class="page-title">'.$VersionName.'</h2>
            <p>'.$VersionText.'</p>
        </div>';
        }
    ?>
</div>
<?php 
// Footer
require WebConfig::ConfigPath."/footer.php";
// Scripts
require WebConfig::ConfigPath."/scripts.php"; 
?>
</body>
</html>
