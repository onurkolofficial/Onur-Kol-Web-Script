<!doctype html>
<html>
<?php
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Set active page
$page="contact";

include $_SERVER['DOCUMENT_ROOT']."/config/head.php";
?>
<body>
<!-- Navigation Main !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/navigation.php"; ?>
<div class="content-main">
    <div class="page-details">
        <p><i class="fad fa-list"></i> <?php echo $contactText; ?></p>
        <h4><?php echo $contactSummary; ?></h4>
    </div>
    <div class="page-section">
        <h2 class="page-title"><?php echo $sendContactMailText; ?></h2>
        <div class="page-grid-3">
			<div></div>
			<div>
                <form class="page-form vertical">
					<div class="form-row">
                        <p><i class="fad fa-user"></i> <?php echo $nameText; ?></p>
						<input <?php echo 'placeholder="'.$nameText.'"'; ?> type="text">
                    </div>
                    <div class="form-row">
                        <p><i class="fad fa-user"></i> <?php echo $surnameText; ?></p>
						<input <?php echo 'placeholder="'.$surnameText.'"'; ?> type="text">
					</div>
					<div class="form-row">
                        <p><i class="fad fa-envelope"></i> <?php echo $mailText; ?></p>
						<input <?php echo 'placeholder="'.$mailText.'"'; ?> type="email">
                    </div>
                    <div class="form-row">
                        <p><i class="fad fa-pencil"></i> <?php echo $messageText; ?></p>
						<textarea style="height:150px;"></textarea>
					</div>
					<div class="form-row buttons">
						<input <?php echo 'value="'.$sendText.'"'; ?> type="submit">
						<input <?php echo 'value="'.$resetText.'"'; ?>type="reset">
					</div>
				</form>
			</div>
			<div></div>
		</div>
    </div>
    
</div>
<!-- Footer !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/footer.php"; ?>
<!-- Scripts !-->
<?php include $_SERVER['DOCUMENT_ROOT']."/config/scripts.php"; ?>
</body>
</html>
