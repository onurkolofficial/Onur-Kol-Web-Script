<!doctype html>
<html>
<?php
// Set Admin Login Mode.
$LoginPage=true;
// Include Main Config
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

// Check Exist Session
if($WebConfig->GetSessionExist('UserID')){
	// Redirect Home
	header("Location: /");
}

require WebConfig::ConfigPath."/head.php";
?>
<body>
<!-- Navigation Main !-->
<?php require WebConfig::ConfigPath."/navigation.php"; ?>
<div class="content-main">
    <div class="page-details">
        <p><i class="fad fa-list"></i> <?php echo $_LANG['string_register_account_text']; ?></p>
        <h4><?php echo $_LANG['string_register_account_summary']; ?></h4>
    </div>
    <div class="page-section">
        <h2 class="page-title"><?php echo $_LANG['string_create_account_text']; ?></h2>
        <div class="page-grid-3">
			<div></div>
			<div>
                <form class="page-form vertical" action="form/" method="POST">
					<div class="form-row">
                        <p><i class="fad fa-user"></i> <?php echo $_LANG['string_name_text']; ?>*</p>
						<input name="name" <?php echo 'placeholder="'.$_LANG['string_name_text'].'"'; ?> type="text">
                    </div>
                    <div class="form-row">
                        <p><i class="fad fa-user"></i> <?php echo $_LANG['string_surname_text']; ?>*</p>
						<input name="surname" <?php echo 'placeholder="'.$_LANG['string_surname_text'].'"'; ?> type="text">
					</div>
					<br><br>
					<div class="form-row">
                        <p><i class="fad fa-user"></i> <?php echo $_LANG['string_username_text']; ?>*</p>
						<input name="username" <?php echo 'placeholder="'.$_LANG['string_username_text'].'"'; ?> type="text">
					</div>
					<div class="form-row">
                        <p><i class="fad fa-key"></i> <?php echo $_LANG['string_password_text']; ?>*</p>
						<input name="password" <?php echo 'placeholder="'.$_LANG['string_password_text'].'"'; ?> type="password">
					</div>
					<div class="form-row">
                        <p><i class="fad fa-key"></i> <?php echo $_LANG['string_repassword_text']; ?>*</p>
						<input name="repassword" <?php echo 'placeholder="'.$_LANG['string_repassword_text'].'"'; ?> type="password">
					</div>
					<br><br>
					<div class="form-row">
                        <p><i class="fad fa-envelope"></i> <?php echo $_LANG['string_mail_text']; ?>*</p>
						<input name="mail" <?php echo 'placeholder="'.$_LANG['string_mail_text'].'"'; ?> type="email">
                    </div>
					<div class="form-row">
                        <p><i class="fad fa-user"></i> <?php echo $_LANG['string_phone_text']; ?></p>
						<input name="phone" <?php echo 'placeholder="'.$_LANG['string_phone_text'].'"'; ?> type="text">
					</div>
					<div class="form-row">
                        <p><i class="fad fa-user"></i> <?php echo $_LANG['string_country_text']; ?></p>
						<input name="country" <?php echo 'placeholder="'.$_LANG['string_country_text'].'"'; ?> type="text">
					</div>
					<div class="form-row">
                        <p><i class="fad fa-user"></i> <?php echo $_LANG['string_address_text']; ?></p>
						<input name="address" <?php echo 'placeholder="'.$_LANG['string_address_text'].'"'; ?> type="text">
					</div>
					<br>
					<div class="form-row buttons">
						<input <?php echo 'value="'.$_LANG['string_create_account_text'].'"'; ?> type="submit">
						<input <?php echo 'value="'.$_LANG['string_reset_text'].'"'; ?> type="reset">
					</div>
				</form>
			</div>
			<div></div>
		</div>
    </div>
</div>
<?php 
// Footer
require WebConfig::ConfigPath."/footer.php";
// Scripts
require WebConfig::ConfigPath."/scripts.php"; 
?>
</body>
</html>
