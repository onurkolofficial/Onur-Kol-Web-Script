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
        <p><i class="fad fa-info"></i> <?php echo $aboutText; ?></p>
        <h4><?php echo $aboutSummary; ?></h4>
    </div>
    <div class="page-section">
        <h2 class="page-title"><?php echo $versionHistoryText; ?></h2>
        <p class="page-title"><?php echo $versionHistorySummary; ?></p>
        <h2><?php echo $versionsText; ?></h2>
    </div>
    <!-- Version 1.0.1 !-->
    <div class="page-section">
        <h2 class="page-title">1.0.1</h2>
        <p> - <?php echo $tempVersion101Properties1; ?></p>
        <p> - <?php echo $tempVersion101Properties2; ?></p>
        <p> - <?php echo $tempVersion101Properties3; ?></p>
        <p> - <?php echo $tempVersion101Properties4; ?></p>
    </div>
    <!-- Version 1.0.0 !-->
    <div class="page-section">
        <h2 class="page-title">1.0.0</h2>
        <p> - <?php echo $tempWebProperties1; ?></p>
        <p> - <?php echo $tempWebProperties2; ?></p>
        <p> - <?php echo $tempWebProperties3; ?></p>
        <p> - <?php echo $tempWebProperties4; ?></p>
        <p> - <?php echo $tempWebProperties5; ?></p>
        <p> - <?php echo $tempWebProperties6; ?></p>
    </div>
</div>
<!-- Footer !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/footer.php"; ?>
<!-- Scripts !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/scripts.php"; ?>
</body>
</html>
