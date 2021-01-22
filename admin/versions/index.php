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
        <p><i class="fad fa-sync"></i> <?php echo $_LANG['string_version_settings_text']; ?></p>
        <h4><?php echo $_LANG['string_version_settings_summary']; ?></h4>
    </div>
    <div class="page-section">
        <!-- Action Buttons !-->
        <div>
            <a href="new/">
                <button style="font-size:14px; width:150px; height:60px;"><?php echo $_LANG['string_new_version_text']; ?></button>
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
                            <th style="text-align:left;" colspan="4"><?php echo $_LANG['string_versions_text']; ?></th>
                        </tr>
                        <tr>
                            <th><?php echo $_LANG['string_version_name_text']; ?></th>
                            <th><?php echo $_LANG['string_version_message_text']; ?></th>
                            <th colspan="2">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Get Versions
                        $QueryResult=$WebConfig->Query("SELECT * FROM `versionlog` ORDER BY `VersionReleaseDate` DESC");
                        // Print Versions
                        while($Row=$WebConfig->FetchAssoc($QueryResult)){
                            $VersionName=$Row['VersionName'];
                            $VersionText=$Row['VersionText'];
                            echo '<tr>
                            <td>'.$VersionName.'</td>
                            <td>'.$VersionText.'</td>
                            <td>
                                <a href="edit/?ver='.$VersionName.'">
                                    <input value="'.$_LANG['string_edit_text'].'" type="button">
                                </a>
                            </td>
                            <td>
                                <input onClick="deleteVersion(`'.$VersionName.'`,`'.$_LANG['string_sure_delete_version'].'`)" value="'.$_LANG['string_delete_text'].'" type="button">
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
<script src="versionsscript.js"></script>
</body>
</html>
