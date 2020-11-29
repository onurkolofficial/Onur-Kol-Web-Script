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
        <p><i class="fad fa-list"></i> <?php echo $_LANG['string_contact_text']; ?></p>
        <h4><?php echo $_LANG['string_contact_summary']; ?></h4>
    </div>
    <div class="page-section">
        <h2 class="page-title"><?php echo $_LANG['string_send_contact_mail_text']; ?></h2>
        <div class="page-grid-3">
			<div></div>
			<div>
                <form class="page-form vertical" action="form/" method="POST">
					<div class="form-row">
                        <p><i class="fad fa-user"></i> <?php echo $_LANG['string_name_text']; ?></p>
						<input name="name" <?php echo 'placeholder="'.$_LANG['string_name_text'].'"'; ?> type="text">
                    </div>
                    <div class="form-row">
                        <p><i class="fad fa-user"></i> <?php echo $_LANG['string_surname_text']; ?></p>
						<input name="surname" <?php echo 'placeholder="'.$_LANG['string_surname_text'].'"'; ?> type="text">
					</div>
					<div class="form-row">
                        <p><i class="fad fa-envelope"></i> <?php echo $_LANG['string_mail_text']; ?></p>
						<input name="mail" <?php echo 'placeholder="'.$_LANG['string_mail_text'].'"'; ?> type="email">
                    </div>
                    <div class="form-row">
                        <p><i class="fad fa-pencil"></i> <?php echo $_LANG['string_message_text']; ?></p>
						<textarea name="message" style="height:150px;"></textarea>
					</div>
					<div class="form-row buttons">
						<input <?php echo 'value="'.$_LANG['string_send_text'].'"'; ?> type="submit">
						<input <?php echo 'value="'.$_LANG['string_reset_text'].'"'; ?> type="reset">
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
