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

// Get Data
$GetVersionName=$_GET['ver'];

// Get Item Data
$QueryResult=$WebConfig->Query("SELECT * FROM versionlog WHERE VersionName='$GetVersionName'");
$Row=$WebConfig->FetchAssoc($QueryResult);

$VersionMessage=$Row['VersionText'];

require WebConfig::ConfigPath."/head.php";
?>
<body>
<!-- Navigation Main !-->
<?php require WebConfig::ConfigPath."/navigation_admin.php"; ?>
<div class="content-main">
    <div class="page-details">
        <p><i class="fad fa-list"></i> <?php echo $_LANG['string_menu_settings_text']; ?></p>
        <h4><?php echo $_LANG['string_menu_settings_summary']; ?></h4>
    </div>
    <div class="page-section">
        <!-- Action Buttons !-->
        <div>
            <a href="../">
                <button style="font-size:14px; width:150px; height:60px;"><?php echo $_LANG['string_back_text']; ?></button>
            </a>
        </div>
    </div>
    <div class="page-section">
        <div class="page-grid-3">
			<div></div>
			<div>
                <form class="page-form vertical" action="form/" method="POST">
                    <?php
                        // Hidden Values
                        echo '<input name="oldversion" value="'.$GetVersionName.'" type="hidden">';
                    ?>
                    <div class="form-row">
                        <p><i class="fad fa-sync"></i> <?php echo $_LANG['string_version_name_text']; ?></p>
                        <input name="version" <?php echo 'value="'.$GetVersionName.'" placeholder="'.$_LANG['string_version_name_text'].'"'; ?> type="text">
                    </div>
                    <div class="form-row">
                        <p><i class="fad fa-pencil"></i> <?php echo $_LANG['string_version_message_text']; ?></p>
						<textarea name="message" style="height:150px;"><?php echo $VersionMessage; ?></textarea>
					</div>
                    <br>
                    <div class="form-row buttons">
                        <input <?php echo 'value="'.$_LANG['string_save_text'].'"'; ?> type="submit">
                        <input <?php echo 'value="'.$_LANG['string_reset_text'].'"'; ?> type="reset">
                    </div>
                </form>
			</div>
			<div></div>
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
