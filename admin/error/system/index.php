<!doctype html>
<html>
<?php
// Set error mode
$setmode=0x3E6;
// Include Config
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

include $_SERVER['DOCUMENT_ROOT']."/config/head.php";
?>
<body>
<!-- Navigation Main !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/navigation.php"; ?>
<div class="content-main">
    <div class="page-details">
        <p><i class="fad fa-exclamation-triangle"></i> <?php echo $_LANG['string_error_system_title']; ?></p>
        <h4><?php echo $_LANG['string_error_system_title_summary']; ?></h4>
    </div>
    <div class="page-section">
        <!-- Temporary Notes !-->
        <div style="text-align:center;">
            <h2><?php echo $_LANG['string_error_system_text']; ?></h2>
            <p><?php echo $_LANG['string_error_system_text_summary']; ?></p>
        </div>
    </div>
</div>
<!-- Footer !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/footer.php"; ?>
<!-- Scripts !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/scripts.php"; ?>
</body>
</html>
