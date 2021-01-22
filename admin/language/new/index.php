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

// Get Language File Info
$LanguageFileType=$WebConfig->GetLanguageFileType();
$LanguageFileNameTag=$WebConfig->GetLanguageFileNameTag();
if($LanguageFileNameTag=="")
    $LanguageFileNameTag=$_LANG['string_nametag_notsetting'];
?>
<body>
<!-- Navigation Main !-->
<?php require WebConfig::ConfigPath."/navigation_admin.php"; ?>
<div class="content-main">
    <div class="page-details">
        <p><i class="fad fa-language"></i> <?php echo $_LANG['string_language_settings_text']; ?></p>
        <h4><?php echo $_LANG['string_language_settings_summary']; ?></h4>
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
                    <div class="form-row">
                        <p><i class="fad fa-tag"></i> <?php echo $_LANG['string_current_nametag_text']; ?></p>
                        <input disabled <?php echo 'value="'.$LanguageFileNameTag.'" placeholder="'.$_LANG['string_current_nametag_text'].'"'; ?> type="text">
                    </div>
                    <div class="form-row">
                        <p><i class="fad fa-file-code"></i> <?php echo $_LANG['string_using_file_extension']; ?></p>
                        <input disabled <?php echo 'value="'.$LanguageFileType.'" placeholder="'.$_LANG['string_using_file_extension'].'"'; ?> type="text">
                    </div>
                    <br><br>
                    <div class="form-row">
                        <p><i class="fad fa-language"></i> <?php echo $_LANG['string_language_code_summary']; ?></p>
                        <input name="langcode" maxlength="2" <?php echo 'placeholder="'.$_LANG['string_language_code_summary'].'"'; ?> type="text">
                    </div>
                    <div class="form-row">
                        <p><i class="fad fa-pencil"></i> <?php echo $_LANG['string_language_name_text']; ?></p>
                        <input name="langname" <?php echo 'placeholder="'.$_LANG['string_language_name_text'].'"'; ?> type="text">
                    </div>
                    <br>
                    <div class="form-row buttons">
                        <input <?php echo 'value="'.$_LANG['string_add_text'].'"'; ?> type="submit">
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
