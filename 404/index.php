<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

include $_SERVER['DOCUMENT_ROOT']."/config/head.php";
?>
<body>
<!-- Navigation Main !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/navigation_error.php"; ?>
<div class="content-main">
    <div class="page-details">
        <p><i class="fad fa-list"></i> <?php echo $page404Text; ?></p>
        <h4><?php echo $page404Summary; ?></h4>
    </div>
    <div class="page-section">
        <br><br>
        <div style="text-align:center;">
            <button onClick="history.back()" style="font-size:20px; width:160px; height:75px;"><?php echo $backText; ?></button>
        </div>
        <br><br>
    </div>
</div>
<!-- Footer !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/footer.php"; ?>
<!-- Scripts !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/scripts.php"; ?>
</body>
</html>
