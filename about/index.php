<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Set active page
$page="about";

include $_SERVER['DOCUMENT_ROOT']."/config/head.php";
?>
<body>
<!-- Navigation Main !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/navigation.php"; ?>
<div class="content-main">
    <div class="page-details">
        <p><i class="fad fa-info"></i> <?php echo $_LANG['string_about_text']; ?></p>
        <h4><?php echo $_LANG['string_about_summary']; ?></h4>
    </div>
    <div class="page-section">
        <h2 class="page-title"><?php echo $_LANG['string_version_history_text']; ?></h2>
        <p class="page-title"><?php echo $_LANG['string_version_history_summary']; ?></p>
        <h2><?php echo $_LANG['string_versions_text']; ?></h2>
    </div>
    <!-- Version 1.1.0 !-->
    <div class="page-section">
        <h2 class="page-title">1.1.0</h2>
        <p> - <?php echo $_LANG['string_tempVersion110Properties1']; ?></p>
        <p> - <?php echo $_LANG['string_tempVersion110Properties2']; ?></p>
        <p> - <?php echo $_LANG['string_tempVersion110Properties3']; ?></p>
    </div>
    <!-- Version 1.0.1 !-->
    <div class="page-section">
        <h2 class="page-title">1.0.1</h2>
        <p> - <?php echo $_LANG['string_tempVersion101Properties1']; ?></p>
        <p> - <?php echo $_LANG['string_tempVersion101Properties2']; ?></p>
        <p> - <?php echo $_LANG['string_tempVersion101Properties3']; ?></p>
        <p> - <?php echo $_LANG['string_tempVersion101Properties4']; ?></p>
    </div>
    <!-- Version 1.0.0 !-->
    <div class="page-section">
        <h2 class="page-title">1.0.0</h2>
        <p> - <?php echo $_LANG['string_tempWebProperties1']; ?></p>
        <p> - <?php echo $_LANG['string_tempWebProperties2']; ?></p>
        <p> - <?php echo $_LANG['string_tempWebProperties3']; ?></p>
        <p> - <?php echo $_LANG['string_tempWebProperties4']; ?></p>
        <p> - <?php echo $_LANG['string_tempWebProperties5']; ?></p>
        <p> - <?php echo $_LANG['string_tempWebProperties6']; ?></p>
    </div>
</div>
<!-- Footer !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/footer.php"; ?>
<!-- Scripts !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/scripts.php"; ?>
</body>
</html>
