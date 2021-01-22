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
            <!-- Grid 1 !-->
            <div></div>
            <!-- Grid 2 !-->
			<div class="table-res">
                <table class="table-stripe">
                    <thead>
                        <tr>
                            <th style="text-align:left;" colspan="4"><?php echo $_LANG['string_edit_languages_text']; ?></th>
                        </tr>
                        <tr>
                            <th><?php echo $_LANG['string_language_code_text']; ?></th>
                            <th><?php echo $_LANG['string_language_name_text']; ?></th>
                            <th colspan="2">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($_LANGUAGES as $Key => $Value){
                                // Search Language Key
                                $langText="";
                                // Check Language Key.
                                if(isset($_LANG[$Value]))
                                    $langText=$_LANG[$Value];
                                else
                                    $langText=$Value;
                                // Print Button
                                echo '<tr>
                                <td>'.$Value.'</td>
                                <td>'.$langText.'</td>
                                <td>
                                    <a href="details/?language='.$Value.'">
                                        <input value="'.$_LANG['string_edit_text'].'" type="button">
                                    </a>
                                </td>
                                <td>
                                    <input onClick="deleteLanguage(`'.$Value.'`,`'.$_LANG['string_sure_delete_language'].'`)" value="'.$_LANG['string_delete_text'].'" type="button">
                                </tr>';
                            }
                        ?>
                    <tbody>
                </table>
                <br>
            </div>
            <!-- Grid 3 !-->
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
<!-- Get Basic Script !-->
<script src="langeditscript.js"></script>
</body>
</html>