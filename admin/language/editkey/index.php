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
$GetLanguage=$_GET['language'];
$GetKey=$_GET['key'];

// Search Value
// Get Language File Info
$LanguageFileType=$WebConfig->GetLanguageFileType();
$LanguageFileNameTag=$WebConfig->GetLanguageFileNameTag();

// Get File Name
$LanguageFile=$LanguageFileNameTag.$GetLanguage.".".$LanguageFileType;
// Get Current Language File Name
$CurrentLanguageFile=$LanguageFileNameTag.$WebConfig->GetCookieLanguage().".".$LanguageFileType;

if($LanguageFileType=="ini"){
    // Get Language All Keys
    $LanguageKeyArray=$Ini->Read(WebConfig::RootPath."/language/".$LanguageFile);
    // Get Value
    $GetValue=$LanguageKeyArray[$GetKey];
}
else{
    // Call Get Lang File
    include WebConfig::RootPath."/language/".$LanguageFile;
    // Get Value
    $GetValue=$_LANG[$GetKey];
    // Call Back Current Lang File
    include WebConfig::RootPath."/language/".$CurrentLanguageFile;
}

require WebConfig::ConfigPath."/head.php";
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
            <?php
                echo '<a href="../?get='.$GetLanguage.'">';
            ?>
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
                        echo '<input name="language" value="'.$GetLanguage.'" type="hidden">';
                        echo '<input name="replacekey" value="'.$GetKey.'" type="hidden">';
                        echo '<input name="replacevalue" value="'.$GetValue.'" type="hidden">';
                    ?>
                    <div class="form-row">
                        <p><i class="fad fa-key"></i> <?php echo $_LANG['string_key_text']; ?></p>
                        <input name="key" <?php echo 'value="'.$GetKey.'" placeholder="'.$_LANG['string_key_text'].'"'; ?> type="text">
                    </div>
                    <div class="form-row">
                        <p><i class="fad fa-pencil"></i> <?php echo $_LANG['string_value_text']; ?></p>
						<input name="value" <?php echo 'value="'.$GetValue.'" placeholder="'.$_LANG['string_value_text'].'"'; ?> type="text">
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
