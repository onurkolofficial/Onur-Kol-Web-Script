<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Set active page
$page="apps";

include $_SERVER['DOCUMENT_ROOT']."/config/head.php";
?>
<body>
<!-- Navigation Main !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/navigation.php"; ?>
<div class="content-main">
    <div class="page-details">
        <p><i class="fad fa-arrow-alt-circle-down"></i> <?php echo $applicationsText; ?></p>
        <h4><?php echo $applicationsSummary; ?></h4>
    </div>
    <div class="page-section">
        <div style="text-align:center;">
            <h2><?php echo $appCategories; ?></h2>
            <p><?php echo $appCategoriesSummary; ?></p>
        </div>
    </div>
    <div class="page-section">
        <br>
        <div class="page-grid-3">
			<div style="text-align:center;">
                <a href="android/">
                    <button style="font-size:14px; width:140px; height:70px;"><?php echo $androidAppsText; ?></button>
                </a>
			</div>
			<div>
			</div>
			<div>
			</div>
        </div>
        <br>
    </div>
</div>
<!-- Footer !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/footer.php"; ?>
<!-- Scripts !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/scripts.php"; ?>
</body>
</html>
