<!doctype html>
<html>
<?php
// Set Admin Login Mode.
$LoginPage=true;
// Include Main Config
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

require WebConfig::ConfigPath."/head.php";
?>
<body>
<!-- Navigation Main !-->
<?php require WebConfig::ConfigPath."/navigation.php"; ?>
<div class="content-main">
    <div class="page-details">
        <p><i class="fad fa-list"></i> <?php echo $_LANG['string_login_account_text']; ?></p>
        <h4><?php echo $_LANG['string_login_account_summary']; ?></h4>
    </div>
    <div class="page-section">
        <div class="page-grid-3">
			<div></div>
			<div>
                <form class="page-form vertical" action="form/" method="POST">
					<div class="form-row">
                        <p><i class="fad fa-user"></i> <?php echo $_LANG['string_username_text']; ?></p>
						<input name="username" <?php echo 'placeholder="'.$_LANG['string_username_text'].'"'; ?> type="text">
                    </div>
                    <div class="form-row">
                        <p><i class="fad fa-key"></i> <?php echo $_LANG['string_password_text']; ?></p>
						<input name="password" <?php echo 'placeholder="'.$_LANG['string_password_text'].'"'; ?> type="password">
					</div>
					<div class="form-row buttons">
						<input <?php echo 'value="'.$_LANG['string_login_text'].'"'; ?> type="submit">
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
