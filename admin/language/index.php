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

// Check Get Language
if(isset($_GET['get']))
    $GetLanguage=$_GET['get'];
else
    $GetLanguage=$WebConfig->GetCookieLanguage();

// Search Language Key
$LANGUAGE_NAME="";
// Check Language Key.
if(isset($_LANG[$GetLanguage]))
    $LANGUAGE_NAME=$_LANG[$GetLanguage];
else
    $LANGUAGE_NAME=$GetLanguage;

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
        <div style="display:flex; overflow-x:auto;">
            <div>
                <a href="new/">
                    <button style="font-size:14px; width:150px; height:60px;"><?php echo $_LANG['string_new_language_text']; ?></button>
                </a>
            </div>
            &emsp;
            <div>
                <button id="newKeyBtn" style="font-size:14px; width:150px; height:60px;"><?php echo $_LANG['string_new_key_text']; ?></button>
            </div>
            &emsp;
            <div>
                <a href="edit/">
                    <button style="font-size:14px; width:150px; height:60px;"><?php echo $_LANG['string_edit_languages_text']; ?></button>
                </a>
            </div>
        </div>
    </div>
    <div class="page-section">
        <!-- Language List !-->
        <div style="display:flex; overflow-x:auto;">
            <?php
                foreach($_LANGUAGES as $Key => $Value){
                    // Search Language Key
                    $langText="";
                    // Check Language Key.
                    if(isset($_LANG[$Value]))
                        $langText=$_LANG[$Value];
                    else
                        $langText=strtoupper($Value);
                    // Print Button
                    echo '<div>
                        <a href="?get='.$Value.'">
                        <button style="font-size:14px; width:150px; height:60px;">'.$langText.'</button>
                    </a>
                </div>&emsp;';
                }
            ?>
            
        </div>
    </div>
    <div id="newKeyPage" class="page-section">
        <h2 class="page-title"><?php echo $_LANG['string_add_new_key_text']; ?></h2>
        <br>
        <div class="page-grid-3">
            <!-- Grid 1 !-->
            <div></div>
            <!-- Grid 2 !-->
			<div class="table-res">
                <form action="newkey/" method="POST">
                    <?php
                        // Hidden Values
                        echo '<input name="language" value="'.$GetLanguage.'" type="hidden">';
                    ?>
                    <table class="table-stripe">
                        <tbody>
                            <tr>
                                <td>
                                    <input name="key" <?php echo 'placeholder="'.$_LANG['string_key_text'].'"'; ?> type="text">
                                </td>
                                <td>
                                    <input name="value" <?php echo 'placeholder="'.$_LANG['string_value_text'].'"'; ?> type="text">
                                </td>
                                <td>
                                    <input <?php echo 'value="'.$_LANG['string_add_text'].'"'; ?> type="submit">
                                </td>
                            </tr>
                        <tbody>
                    </table>
                </form>
                <br>
            </div>
            <!-- Grid 3 !-->
			<div></div>
        </div>
        <br>
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
                            <th style="text-align:left;" colspan="4"><?php echo $LANGUAGE_NAME; ?></th>
                        </tr>
                        <tr>
                            <th><?php echo $_LANG['string_key_text']; ?></th>
                            <th><?php echo $_LANG['string_value_text']; ?></th>
                            <th colspan="2">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if($LanguageFileType=="ini"){
                            // Get File Name
                            $LanguageFile=$LanguageFileNameTag.$GetLanguage.".".$LanguageFileType;
                            // Get Language All Keys
                            $LanguageKeyArray=$Ini->Read(WebConfig::RootPath."/language/".$LanguageFile);
                            // Merge all keys
                            $LanguageKeys=array();
                            foreach($LanguageKeyArray as $Key => $Value){
                                if(is_array($Value)){
                                    foreach($Value as $ValueKey => $ValueValue){
                                        $LanguageKeys[$ValueKey]=$ValueValue;
                                    }
                                }
                                else{
                                    $LanguageKeys[$Key]=$Value;
                                }
                            }
                            // Print Keys
                            foreach($LanguageKeys as $Key => $Value){
                                echo '<tr>
                                <td>'.$Key.'</td>
                                <td>'.$Value.'</td>
                                <td>
                                    <a href="editkey/?language='.$GetLanguage.'&key='.$Key.'">
                                        <input value="'.$_LANG['string_edit_text'].'" type="button">
                                    </a>
                                </td>
                                <td>
                                    <input onClick="deleteKey(`'.$Key.'`,`'.$GetLanguage.'`,`'.$_LANG['string_sure_delete_key'].'`)" value="'.$_LANG['string_delete_text'].'" type="button">
                                </tr>';
                            }
                        }
                        else{
                            // Get File Name
                            $LanguageFile=$LanguageFileNameTag.$GetLanguage.".".$LanguageFileType;
                            // Get Current Language File Name
                            $CurrentLanguageFile=$LanguageFileNameTag.$WebConfig->GetCookieLanguage().".".$LanguageFileType;
                            // Call Get Lang File
                            include WebConfig::RootPath."/language/".$LanguageFile;
                            // Print Keys
                            foreach($_LANG as $Key => $Value){
                                echo '<tr>
                                <td>'.$Key.'</td>
                                <td>'.$Value.'</td>
                                <td>
                                    <a href="editkey/?language='.$GetLanguage.'&key='.$Key.'">
                                        <input value="'.$_LANG['string_edit_text'].'" type="button">
                                    </a>
                                </td>
                                <td>
                                    <input onClick="deleteKey(`'.$Key.'`,`'.$GetLanguage.'`,`'.$_LANG['string_sure_delete_key'].'`)" value="'.$_LANG['string_delete_text'].'" type="button">
                                </tr>'; 
                            }
                            // Call Back Current Lang File
                            include WebConfig::RootPath."/language/".$CurrentLanguageFile;
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
<script src="languagescript.js"></script>
</body>
</html>
