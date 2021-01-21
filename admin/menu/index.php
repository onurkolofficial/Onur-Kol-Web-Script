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
        <p><i class="fad fa-ellipsis-v"></i> <?php echo $_LANG['string_menu_settings_text']; ?></p>
        <h4><?php echo $_LANG['string_menu_settings_summary']; ?></h4>
    </div>
    <div class="page-section">
        <!-- Action Buttons !-->
        <div>
            <button id="newMenuBtn" style="font-size:14px; width:150px; height:60px;"><?php echo $_LANG['string_new_menuitem_text']; ?></button>
        </div>
    </div>
    <div id="newMenuPage" class="page-section">
        <h2 class="page-title"><?php echo $_LANG['string_add_new_menu_item']; ?></h2>
        <br>
        <div class="page-grid-3">
            <!-- Grid 1 !-->
            <div></div>
            <!-- Grid 2 !-->
			<div class="table-res">
                <form action="new/" method="POST">
                    <table class="table-stripe">
                        <tbody>
                            <tr>
                                <td>
                                    <input name="text" <?php echo 'placeholder="'.$_LANG['string_itemtext_text'].'"'; ?> type="text">
                                </td>
                                <td>
                                    <input name="url" <?php echo 'placeholder="'.$_LANG['string_item_url_text'].'"'; ?> type="text">
                                </td>
                                <td>
                                    <input name="index" <?php echo 'placeholder="'.$_LANG['string_item_index_text'].'"'; ?> type="text">
                                </td>
                                <td>
                                    <input name="menuid" <?php echo 'placeholder="'.$_LANG['string_item_menuid_text'].'"'; ?> type="text">
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
                            <td>
                                <a href="edit/?id='.$ItemId.'">
                                    <input value="'.$_LANG['string_edit_text'].'" type="button">
                                </a>
                            </td>
                            <td>
                                <input onClick="deleteMenuItem(`'.$ItemId.'`,`'.$_LANG['string_sure_delete_item'].'`)" value="'.$_LANG['string_delete_text'].'" type="button">
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
<script src="menuscript.js"></script>
</body>
</html>
