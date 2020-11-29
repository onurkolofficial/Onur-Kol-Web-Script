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
			<div class="category-item">
                <a href="android/">
                    <button class="category-button"><?php echo $_LANG['string_android_apps_text']; ?></button>
                </a>
            </div>
            <!--
			<div class="category-item">
				<button class="category-button">Category 2 Name</button>
			</div>
			<div class="category-item">
				<button class="category-button">Category 3 Name</button>
            </div>
            !-->
		</div>
    </div>
</div>
<!-- Footer !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/footer.php"; ?>
<!-- Scripts !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/scripts.php"; ?>
</body>
</html>
