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
        <h2 class="page-title"><?php echo $_LANG['string_android_apps_text']; ?></h2>
    </div>
    <!-- App List !-->
    <div class="page-section">
        <div class="page-grid-3">
            <!-- Grid 1 !-->
            <div></div>
            <!-- Grid 2 !-->
			<div>
                <table>
                    <!-- App 1 !-->
                    <tr>
                        <td>
                        <img width="85" height="85" src="https://lh3.googleusercontent.com/AglfU72l0SY14GPEY9O5alLJ5pk2-2uTrva8PSRRTJLqc1x8Q9Fh1m3KJ692E57B8A">
                        </td>
                        <td style="width:100%;">
                            <div>
                                Basic Notes
                                <br>
                                <small>Onur KOL</small>
                            </div>
                            <div style="text-align:end;">
                                <div style="display:inline; text-align:end;">
                                    <a href="https://github.com/onurkolofficial/OKSimpleNotes-Android">
                                        <button><?php echo $_LANG['string_source_text']; ?></button>
                                    </a>
                                    <a href="https://play.google.com/store/apps/details?id=com.onurkol.app.notes">
                                        <button><?php echo $_LANG['string_download_text']; ?></button>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <!-- App 2 !-->
                    <tr>
                        <td>
                        <img width="85" height="85" src="https://lh3.googleusercontent.com/WE6fa7l09X8wirhi_rdISPBmaSaxBpCUmJgl-qUUy6eXm9kF57hBK6VeD8JYJIfKyhM">
                        </td>
                        <td style="width:100%;">
                            <div>
                                Calculator
                                <br>
                                <small>Onur KOL</small>
                            </div>
                            <div style="text-align:end;">
                                <div style="display:inline; text-align:end;">
                                    <a href="https://github.com/onurkolofficial/OKCalculator-Android">
                                        <button><?php echo $_LANG['string_source_text']; ?></button>
                                    </a>
                                    <a href="https://play.google.com/store/apps/details?id=com.onurkol.app.calculator">
                                        <button><?php echo $_LANG['string_download_text']; ?></button>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <!-- App 3 !-->
                    <tr>
                        <td>
                        <img width="85" height="85" src="https://lh3.googleusercontent.com/pqHUig-YvNNjICPXOOuR3XPx_bNAEV5vMqmaQ2ZVoaT9thDU1AWzR2AtdSTlaY5wdTY">
                        </td>
                        <td style="width:100%;">
                            <div>
                                SPS Game
                                <br>
                                <small>Onur KOL</small>
                            </div>
                            <div style="text-align:end;">
                                <div style="display:inline; text-align:end;">
                                    <a href="https://github.com/onurkolofficial/Stone-Paper-Scissors-Game_Android">
                                        <button><?php echo $_LANG['string_source_text']; ?></button>
                                    </a>
                                    <a href="https://play.google.com/store/apps/details?id=com.onurkolofficial.spsgame">
                                        <button><?php echo $_LANG['string_download_text']; ?></button>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                </table>
            </div>
            <!-- Grid 3 !-->
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
