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
        <p><i class="fad fa-home"></i> <?php echo $homeText; ?></p>
        <h4><?php echo $homePageSummary; ?></h4>
    </div>
    <div class="page-section">
        <!-- Temporary Notes !-->
        <div style="text-align:center;">
            <h2><?php echo $tempNoteReleaseNewWeb; ?></h2>
            <p><?php echo $tempNoteSummary; ?></p>
        </div>
    </div>
    <div class="page-section">
        <h2 class="page-title"><?php echo $propertiesText; ?></h2>
        <p> - <?php echo $tempWebProperties1; ?></p>
        <p> - <?php echo $tempWebProperties2; ?></p>
        <p> - <?php echo $tempWebProperties3; ?></p>
        <p> - <?php echo $tempWebProperties4; ?></p>
        <p> - <?php echo $tempWebProperties5; ?></p>
        <p> - <?php echo $tempWebProperties6; ?></p>
    </div>
    <div class="page-section">
        <h2 class="page-title"><?php echo $applicationsText; ?></h2>
        <p><?php echo $clickMyApplicationsNav; ?></p>
    </div>
</div>
<!-- Footer !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/footer.php"; ?>
<!-- Scripts !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/scripts.php"; ?>
</body>
</html>
