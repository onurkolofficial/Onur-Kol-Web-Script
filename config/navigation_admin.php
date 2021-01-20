<!-- Navigation !-->
<div class="nav-main">
	<img class="logo" src="/assets/images/logo.png" alt=""/>
  	<p class="logo-title"><?php echo $_LANG['string_welcome_admin_text']." ".$User['UserFirstName']." ".$User['UserLastName'] ?></p>
	<!-- Menu !-->
	<a class="menu-icon mobile"><span></span></a>
	<ul class="nav-menu">
        <!-- Panel Home !-->
        <li>
            <a href="/admin/" class="menu-item">
                <?php echo $_LANG['string_admin_home_text']; ?>
            </a>
        </li>
        <!-- Menu Settings !-->
        <li>
            <a href="/admin/menu/" class="menu-item">
                <?php echo $_LANG['string_menu_settings_text']; ?>
            </a>
        </li>
        <!-- Language Settings !-->
        <li>
            <a href="/admin/language/" class="menu-item">
                <?php echo $_LANG['string_language_settings_text']; ?>
            </a>
        </li>
        <!-- App Category Settings !-->
        <li>
            <a href="/admin/categories/" class="menu-item">
                <?php
                // Long Text Issue
                $Text=$_LANG['string_app_category_settings_text'];
                echo substr($Text, 0, 17);
                ?>
            </a>
        </li>
        <!-- Applications !-->
        <li>
            <a href="/admin/applications/" class="menu-item">
                <?php echo $_LANG['string_applications_settings_text']; ?>
            </a>
        </li>
        <!-- Version Settings !-->
        <li>
            <a href="/admin/versions/" class="menu-item">
                <?php echo $_LANG['string_version_settings_text']; ?>
            </a>
        </li>
        <!-- Logout !-->
        <li>
            <a href="/logout/" class="menu-item">
                <?php echo $_LANG['string_logout_text']; ?>
            </a>
        </li>
    </ul>
    <ul class="nav-menu-mobile">
        <!-- Panel Home !-->
        <li>
            <a href="/admin/" class="menu-item">
                <?php echo $_LANG['string_admin_home_text']; ?>
            </a>
        </li>
        <!-- Menu Settings !-->
        <li>
            <a href="/admin/menu/" class="menu-item">
                <?php echo $_LANG['string_menu_settings_text']; ?>
            </a>
        </li>
        <!-- Language Settings !-->
        <li>
            <a href="/admin/language/" class="menu-item">
                <?php echo $_LANG['string_language_settings_text']; ?>
            </a>
        </li>
        <!-- App Category Settings !-->
        <li>
            <a href="/admin/categories/" class="menu-item">
                <?php echo $_LANG['string_app_category_settings_text']; ?>
            </a>
        </li>
        <!-- Applications !-->
        <li>
            <a href="/admin/applications/" class="menu-item">
                <?php echo $_LANG['string_applications_settings_text']; ?>
            </a>
        </li>
        <!-- Version Settings !-->
        <li>
            <a href="/admin/versions/" class="menu-item">
                <?php echo $_LANG['string_version_settings_text']; ?>
            </a>
        </li>
        <!-- Logout !-->
        <li>
            <a href="/logout/" class="menu-item">
                <?php echo $_LANG['string_logout_text']; ?>
            </a>
        </li>
    </ul>
</div>