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
$GetEditItemId=$_GET['id'];

// Get Item Data
$QueryResult=$WebConfig->Query("SELECT * FROM sitemenu WHERE id='$GetEditItemId'");
$Row=$WebConfig->FetchAssoc($QueryResult);

$ItemId=$Row['id'];
$ItemText=$Row['ItemText'];
$ItemUrl=$Row['ItemUrl'];
$ItemIndex=$Row['ItemIndex'];
$ItemMenuId=$Row['ItemMenuId'];

require WebConfig::ConfigPath."/head.php";
?>
<body>
<!-- Navigation Main !-->
<?php require WebConfig::ConfigPath."/navigation_admin.php"; ?>
<div class="content-main">
    <div class="page-details">
        <p><i class="fad fa-ellipsis-v"></i> <?php echo $_LANG['string_menu_settings_text']; ?></p>
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
                        echo '<input name="id" value="'.$ItemId.'" type="hidden">';
                    ?>
                    <div class="form-row">
                        <p><i class="fad fa-pencil"></i> <?php echo $_LANG['string_itemtext_text']; ?></p>
                        <input name="text" <?php echo 'value="'.$ItemText.'" placeholder="'.$_LANG['string_itemtext_text'].'"'; ?> type="text">
                    </div>
                    <div class="form-row">
                        <p><i class="fad fa-link"></i> <?php echo $_LANG['string_item_url_text']; ?></p>
                        <input name="url" <?php echo 'value="'.$ItemUrl.'" placeholder="'.$_LANG['string_item_url_text'].'"'; ?> type="text">
                    </div>
                    <div class="form-row">
                        <p><i class="fad fa-asterisk"></i> <?php echo $_LANG['string_item_index_text']; ?></p>
                        <input name="index" <?php echo 'value="'.$ItemIndex.'" placeholder="'.$_LANG['string_item_index_text'].'"'; ?> type="text">
                    </div>
                    <div class="form-row">
                        <p><i class="fad fa-key"></i> <?php echo $_LANG['string_item_menuid_text']; ?></p>
                        <input name="menuid" <?php echo 'value="'.$ItemMenuId.'" placeholder="'.$_LANG['string_item_menuid_text'].'"'; ?> type="text">
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
