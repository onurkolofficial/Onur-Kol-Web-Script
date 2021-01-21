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
        <p><i class="fad fa-arrow-alt-circle-down"></i> <?php echo $_LANG['string_applications_settings_text']; ?></p>
        <h4><?php echo $_LANG['string_applications_settings_summary']; ?></h4>
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
                        <p><i class="fad fa-key"></i> <?php echo $_LANG['string_application_category_text']; ?></p>
                        <div class="select">
                            <select name="category">
                                <?php
                                // Get Category List
                                $QueryResult=$WebConfig->Query("SELECT * FROM `appcategories` ORDER BY `CategoryIndex` ASC");
                                while($Row=$WebConfig->FetchAssoc($QueryResult)){
                                    $CategoryId=$Row['CategoryId'];
                                    // Check CategoryName exists to Language Key.
                                    $categoryText="";
                                    $categoryLanguageKey=trim($Row['CategoryName'],"$");
                                    // Check Language Key.
                                    if(isset($_LANG[$categoryLanguageKey]))
                                        $categoryText=$_LANG[$categoryLanguageKey];
                                    else
                                        $categoryText=$Row['CategoryName'];
                                    // Print Options
                                    echo '<option value="'.$CategoryId.'">'.$categoryText.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <p><i class="fad fa-pencil"></i> <?php echo $_LANG['string_application_name_text']; ?></p>
                        <input name="name" <?php echo 'placeholder="'.$_LANG['string_category_name_text'].'"'; ?> type="text">
                    </div>
                    <div class="form-row">
                        <p><i class="fad fa-user"></i> <?php echo $_LANG['string_application_author_text']; ?></p>
                        <input name="author" <?php echo 'placeholder="'.$_LANG['string_application_author_text'].'"'; ?> type="text">
                    </div>
                    <div class="form-row">
                        <p><i class="fad fa-user"></i> <?php echo $_LANG['string_application_image_text']; ?></p>
                        <input name="image" <?php echo 'placeholder="'.$_LANG['string_url_text'].'"'; ?> type="text">
                    </div>
                    <div class="form-row">
                        <p><i class="fad fa-user"></i> <?php echo $_LANG['string_application_source_text']; ?></p>
                        <input name="image" <?php echo 'placeholder="'.$_LANG['string_application_source_text'].'"'; ?> type="text">
                    </div>
                    <div class="form-row">
                        <p><i class="fad fa-user"></i> <?php echo $_LANG['string_application_download_text']; ?></p>
                        <input name="image" <?php echo 'placeholder="'.$_LANG['string_application_download_text'].'"'; ?> type="text">
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
