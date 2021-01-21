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
            <a href="new/">
                <button style="font-size:14px; width:150px; height:60px;"><?php echo $_LANG['string_new_application']; ?></button>
            </a>
        </div>
    </div>
    <!-- App List !-->
    <div class="page-section">
        <div class="page-grid-3">
            <!-- Grid 1 !-->
            <div></div>
            <!-- Grid 2 !-->
			<div class="table-res">
                <table class="table-stripe">
                    <thead>
                        <tr>
                            <th style="text-align:left;" colspan="6"><?php echo $_LANG['string_applications_text']; ?></th>
                        </tr>
                        <tr>
                            <th><?php echo $_LANG['string_application_image_text']; ?></th>
                            <th><?php echo $_LANG['string_application_name_author_text']; ?></th>
                            <th><?php echo $_LANG['string_application_source_text']; ?></th>
                            <th><?php echo $_LANG['string_application_download_text']; ?></th>
                            <th colspan="2">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Get Category Name
                        $QueryResult=$WebConfig->Query("SELECT * FROM `applications` ORDER BY `AppReleaseDate` DESC");
                        // Print Applications
                        while($Row=$WebConfig->FetchAssoc($QueryResult)){
                            $AppId=$Row['AppId'];
                            $AppName=$Row['AppName'];
                            $AppAuthor=$Row['AppAuthor'];
                            $AppImage=$Row['AppImage'];
                            $AppDownload=$Row['AppDownloadUrl'];
                            $AppSource=$Row['AppSourceUrl'];
                            echo '<tr>
                            <td rowspan="2">
                                <img width="85" height="85" src="'.$AppImage.'">
                            </td>
                            <td colspan="5">
                                <b>'.$AppName.'</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small>'.$AppAuthor.'</small>
                            </td>
                            <td>
                                <small>'.substr($AppSource,0,40).'</small>
                            </td>
                            <td>
                                <small>'.substr($AppDownload,0,40).'</small>
                            </td>
                            <td>
                                <a href="edit/?id='.$AppId.'">
                                    <input value="'.$_LANG['string_edit_text'].'" type="button">
                                </a>
                            </td>
                            <td>
                                <input onClick="deleteApplication(`'.$AppId.'`,`'.$_LANG['string_sure_delete_application'].'`)" value="'.$_LANG['string_delete_text'].'" type="button">
                            </td>
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
<script src="applicationsscript.js"></script>
</body>
</html>
