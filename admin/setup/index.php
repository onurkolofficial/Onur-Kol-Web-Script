<!doctype html>
<html>
<?php
// Set setup mode
$ServerEditMode=true;
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
        <p><i class="fad fa-home"></i> <?php echo $_LANG['string_setup_title']; ?></p>
        <h4><?php echo $_LANG['string_setup_title_summary']; ?></h4>
    </div>
    <div class="page-section">
        <h2 class="page-title"><?php echo $_LANG['string_connection_settings_title']; ?></h2>
        <div class="page-grid-3">
			<div></div>
			<div>
                <form class="page-form vertical" action="form/" method="POST">
					<div class="form-row">
                        <p><i class="fad fa-server"></i> <?php echo $_LANG['string_server_address_text']; ?></p>
						<input name="server" <?php echo 'placeholder="'.$_LANG['string_server_address_text'].'"'; ?> type="text">
                    </div>
                    <div class="form-row">
                        <p><i class="fad fa-user"></i> <?php echo $_LANG['string_username_text']; ?></p>
						<input name="user" <?php echo 'placeholder="'.$_LANG['string_username_text'].'"'; ?> type="text">
					</div>
					<div class="form-row">
                        <p><i class="fad fa-key"></i> <?php echo $_LANG['string_passowrd_text']; ?></p>
						<input name="password" <?php echo 'placeholder="'.$_LANG['string_passowrd_text'].'"'; ?> type="password">
                    </div>
                    <div class="form-row">
                        <p><i class="fad fa-database"></i> <?php echo $_LANG['string_database_name_text']; ?></p>
						<input name="database" <?php echo 'placeholder="'.$_LANG['string_database_name_text'].'"'; ?> type="text">
					</div>
					<div class="form-row buttons">
						<input <?php echo 'value="'.$_LANG['string_start_setup_text'].'"'; ?> type="submit">
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
