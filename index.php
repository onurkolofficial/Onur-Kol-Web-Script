<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Set active page
$page="home";

include $_SERVER['DOCUMENT_ROOT']."/config/head.php";
?>
<body>
<!-- Navigation Main !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/navigation.php"; ?>
<div class="content-main">
    <div class="page-details">
        <p><i class="fad fa-home"></i> <?php echo $_LANG['string_home_text']; ?></p>
        <h4><?php echo $_LANG['string_home_page_summary']; ?></h4>
    </div>
    <div class="page-section">
        <!-- Temporary Notes !-->
        <div style="text-align:center;">
            <h2><?php echo $_LANG['string_tempNoteReleaseNewWeb']; ?></h2>
            <p><?php echo $_LANG['string_tempNoteSummary']; ?></p>
        </div>
    </div>
    <div class="page-section">
        <h2 class="page-title"><?php echo $_LANG['string_properties_text']; ?></h2>
        <p> - <?php echo $_LANG['string_tempWebProperties1']; ?></p>
        <p> - <?php echo $_LANG['string_tempWebProperties2']; ?></p>
        <p> - <?php echo $_LANG['string_tempWebProperties3']; ?></p>
        <p> - <?php echo $_LANG['string_tempWebProperties4']; ?></p>
        <p> - <?php echo $_LANG['string_tempWebProperties5']; ?></p>
        <p> - <?php echo $_LANG['string_tempWebProperties6']; ?></p>
    </div>
    <div class="page-section">
        <h2 class="page-title"><?php echo $_LANG['string_applications_text']; ?></h2>
        <p><?php echo $_LANG['string_click_my_applications_nav']; ?></p>
    </div>
</div>
<!-- Footer !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/footer.php"; ?>
<!-- Scripts !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/scripts.php"; ?>
</body>
</html>
