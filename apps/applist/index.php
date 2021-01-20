<!doctype html>
<html>
<?php
// Include Main Config
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

// Set active page
$page="apps";

// Get Category Id
$CategoryId=null;
if(isset($_GET['cat'])){
    $CategoryId=$_GET['cat'];

    // Get Category Name
    $QueryResult=$WebConfig->Query("SELECT * FROM appcategories WHERE CategoryId='$CategoryId'");
    $Row=$WebConfig->FetchAssoc($QueryResult);
    // Check Category Name exists to Language Key.
    $categoryText="";
    $categoryLanguageKey=trim($Row['CategoryName'],"$");
    // Check Language Key.
    if(isset($_LANG[$categoryLanguageKey]))
        $categoryText=$_LANG[$categoryLanguageKey];
    else
        $categoryText=$Row['CategoryName'];
}
else{
    $categoryText="NULL";
}

require WebConfig::ConfigPath."/head.php";
?>
<body>
<!-- Navigation Main !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/navigation.php"; ?>
<div class="content-main">
    <div class="page-details">
        <p><i class="fad fa-arrow-alt-circle-down"></i> <?php echo $_LANG['string_applications_text']; ?></p>
        <h4><?php echo $_LANG['string_applications_summary']; ?></h4>
    </div>
    <div class="page-section">
        <h2 class="page-title"><?php echo $_LANG['string_android_apps_text']; ?></h2>
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
                            <th style="text-align:left;" colspan="4"><?php echo $categoryText; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Get Category Name
                        $QueryResult=$WebConfig->Query("SELECT * FROM `applications` WHERE CategoryId='$CategoryId' ORDER BY `AppReleaseDate` ASC");
                        // Print Applications
                        while($Row=$WebConfig->FetchAssoc($QueryResult)){
                            $AppName=$Row['AppName'];
                            $AppAuthor=$Row['AppAuthor'];
                            $AppImage=$Row['AppImage'];
                            $AppDownload=$Row['AppDownloadUrl'];
                            $AppSource=$Row['AppSourceUrl'];
                            echo '<tr>
                            <td rowspan="2">
                                <img width="85" height="85" src="'.$AppImage.'">
                            </td>
                            <td colspan="3">
                                <b>'.$AppName.'</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small>'.$AppAuthor.'</small>
                            </td>';
                            if($AppSource!=""){
                                echo '<td style="text-align:right;">
                                <a href="'.$AppSource.'">
                                    <button>'.$_LANG['string_source_text'].'</button>
                                </a>
                            </td>
                            <td>
                                <a href="'.$AppDownload.'">
                                    <button>'.$_LANG['string_download_text'].'</button>
                                </a>
                            </td>
                        </tr>';
                            }
                            else{
                                echo '<td>&nbsp;</td>
                            <td>
                                <a href="'.$AppDownload.'">
                                    <button>'.$_LANG['string_download_text'].'</button>
                                </a>
                            </td>
                        </tr>';
                            }
                            
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
</body>
</html>
