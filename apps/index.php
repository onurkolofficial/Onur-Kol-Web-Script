<!doctype html>
<html>
<?php
// Include Main Config
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

// Set active page
$page="apps";

require WebConfig::ConfigPath."/head.php";
?>
<body>
<!-- Navigation Main !-->
<?php require WebConfig::ConfigPath."/navigation.php"; ?>
<div class="content-main">
    <div class="page-details">
        <p><i class="fad fa-arrow-alt-circle-down"></i> <?php echo $_LANG['string_applications_text']; ?></p>
        <h4><?php echo $_LANG['string_applications_summary']; ?></h4>
    </div>
    <div class="page-section">
        <div style="text-align:center;">
            <h2><?php echo $_LANG['string_app_categories']; ?></h2>
            <p><?php echo $_LANG['string_app_categories_summary']; ?></p>
        </div>
    </div>
    <div class="page-section">
        <div class="page-category-list">
            <?php
                // Get Database 'appcategories' Table
                $QueryResult=$WebConfig->Query("SELECT * FROM `appcategories` ORDER BY `CategoryIndex` ASC");

                // Print Categories
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

                    echo '<div class="category-item">
                    <a href="'.$CategoryId.'">
                        <button class="category-button">'.$categoryText.'</button>
                    </a>
                </div>';
                }
            ?>
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
