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
        <p><i class="fad fa-home"></i> <?php echo $_LANG['string_menu_settings_text']; ?></p>
        <h4><?php echo $_LANG['string_menu_settings_summary']; ?></h4>
    </div>
    <div class="page-section">
        <!-- Temporary Notes !-->
        <div>
            <button id="newMenuBtn" style="font-size:14px; width:150px; height:60px;"><?php echo $_LANG['string_new_menuitem_text']; ?></button>
        </div>
    </div>
    <div id="newMenuPage" class="page-section">
        <h2 class="page-title">NEW_MENU_PAGE </h2>
        <p>NEW_MENU_CONTENT</p>
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
                            <th style="text-align:left;" colspan="7"><?php echo $_LANG['string_menus_text']; ?></th>
                        </tr>
                        <tr>
                            <th><?php echo $_LANG['string_id_text']; ?></th>
                            <th><?php echo $_LANG['string_itemtext_text']; ?></th>
                            <th><?php echo $_LANG['string_item_url_text']; ?></th>
                            <th><?php echo $_LANG['string_item_index_text']; ?></th>
                            <th><?php echo $_LANG['string_item_menuid_text']; ?></th>
                            <th colspan="2">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Get Category Name
                        $QueryResult=$WebConfig->Query("SELECT * FROM `sitemenu` ORDER BY `ItemIndex` ASC");
                        // Print Applications
                        while($Row=$WebConfig->FetchAssoc($QueryResult)){
                            $ItemId=$Row['id'];
                            $ItemText=$Row['ItemText'];
                            $ItemUrl=$Row['ItemUrl'];
                            $ItemIndex=$Row['ItemIndex'];
                            $ItemMenuId=$Row['ItemMenuId'];
                            echo '<tr>
                            <td>'.$ItemId.'</td>
                            <td>'.$ItemText.'</td>
                            <td>'.$ItemUrl.'</td>
                            <td>'.$ItemIndex.'</td>
                            <td>'.$ItemMenuId.'</td>
                            <td>EDIT_BTN</td>
                            <td>DELETE_BTN</td>
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
<!-- Get Basic Script !-->
<script src="menuscript.js"></script>
<?php 
// Footer
require WebConfig::ConfigPath."/footer.php";
// Scripts
require WebConfig::ConfigPath."/scripts.php"; 
?>
</body>
</html>
