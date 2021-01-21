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
        <p><i class="fad fa-list"></i> <?php echo $_LANG['string_app_category_settings_text']; ?></p>
        <h4><?php echo $_LANG['string_app_category_settings_summary']; ?></h4>
    </div>
    <div class="page-section">
        <!-- Action Buttons !-->
        <div>
            <button id="newCategoryBtn" style="font-size:14px; width:150px; height:60px;"><?php echo $_LANG['string_new_category_text']; ?></button>
        </div>
    </div>
    <div id="newCategoryPage" class="page-section">
        <h2 class="page-title"><?php echo $_LANG['string_add_new_category']; ?></h2>
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
                                    <input name="id" <?php echo 'placeholder="'.$_LANG['string_category_id_text'].'"'; ?> type="text">
                                </td>
                                <td>
                                    <input name="name" <?php echo 'placeholder="'.$_LANG['string_category_name_text'].'"'; ?> type="text">
                                </td>
                                <td>
                                    <input name="index" <?php echo 'placeholder="'.$_LANG['string_category_index_text'].'"'; ?> type="text">
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
                            <th style="text-align:left;" colspan="7"><?php echo $_LANG['string_categories_text']; ?></th>
                        </tr>
                        <tr>
                            <th><?php echo $_LANG['string_category_id_text']; ?></th>
                            <th><?php echo $_LANG['string_category_name_text']; ?></th>
                            <th><?php echo $_LANG['string_category_index_text']; ?></th>
                            <th colspan="2">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Get Category Name
                        $QueryResult=$WebConfig->Query("SELECT * FROM `appcategories` ORDER BY `CategoryIndex` ASC");
                        // Print Applications
                        while($Row=$WebConfig->FetchAssoc($QueryResult)){
                            $CategoryId=$Row['CategoryId'];
                            $CategoryName=$Row['CategoryName'];
                            $CategoryIndex=$Row['CategoryIndex'];
                            echo '<tr>
                            <td>'.$CategoryId.'</td>
                            <td>'.$CategoryName.'</td>
                            <td>'.$CategoryIndex.'</td>
                            <td>
                                <a href="edit/?id='.$CategoryId.'">
                                    <input value="'.$_LANG['string_edit_text'].'" type="button">
                                </a>
                            </td>
                            <td>
                                <input onClick="deleteCategory(`'.$CategoryId.'`,`'.$_LANG['string_sure_delete_category'].'`)" value="'.$_LANG['string_delete_text'].'" type="button">
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
<script src="categoriesscript.js"></script>
</body>
</html>
