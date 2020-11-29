<!doctype html>
<html>
<?php
// Set setup mode
$setmode=0x3E7;
// Include Config
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Check Connect File Exist.
$get_server_file=$_SERVER['DOCUMENT_ROOT']."/config/server/connect.ini";
if(!file_exists($get_server_file)){
    header("Location: /admin/error/system/");
}

include $_SERVER['DOCUMENT_ROOT']."/config/head.php";
?>
<body>
<!-- Navigation Main !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/navigation.php"; ?>
<div class="content-main">
    <div class="page-details">
        <p><i class="fad fa-home"></i> <?php echo $_LANG['string_setup_title']; ?></p>
        <h4><?php echo $_LANG['string_setup_title_summary']; ?></h4>
    </div>
    <div class="page-section">
        <!-- Temporary Notes !-->
        <div style="text-align:center;">
            <!--
            <h2><?php echo ""; ?></h2>
            <p><?php echo ""; ?></p>
            !-->
        </div>
    </div>
    <div class="page-section">
        <h2 class="page-title"><?php echo ""; ?></h2>
        <p><?php echo ""; ?></p>
    </div>
</div>
<!-- Footer !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/footer.php"; ?>
<!-- Scripts !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/scripts.php"; ?>
</body>
</html>
