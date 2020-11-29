<!-- Navigation !-->
<div class="nav-main">
	<img class="logo" src="/assets/images/logo.png" alt=""/>
  	<p class="logo-title"><?php echo $_LANG['string_welcome_text']; ?></p>
	<!-- Menu !-->
	<a class="menu-icon mobile"><span></span></a>
	<ul class="nav-menu">
        <?php if(isset($setmode) && ($setmode==0x3E7 || $setmode==0x3E6)){ echo ""; } else { ?>
        <li><a <?php if($page=="home"){ echo 'href="#" class="menu-item active"'; }else{echo 'href="/" class="menu-item"'; } ?>>
            <?php echo $_LANG['string_home_text']; ?>
        </a></li>
        <li><a <?php if($page=="apps"){ echo 'href="#" class="menu-item active"'; }else{echo 'href="/apps" class="menu-item"'; } ?>>
            <?php echo $_LANG['string_applications_text']; ?>
        </a></li>
        <li><a <?php if($page=="about"){ echo 'href="#" class="menu-item active"'; }else{echo 'href="/about" class="menu-item"'; } ?>>
            <?php echo $_LANG['string_about_text']; ?>
        </a></li>
        <li><a <?php if($page=="contact"){ echo 'href="#" class="menu-item active"'; }else{echo 'href="/contact" class="menu-item"'; } ?>>
            <?php echo $_LANG['string_contact_text']; ?>
        </a></li>
        <?php } ?>
    </ul>
    <ul class="nav-menu-mobile">
        <?php if(isset($setmode) && ($setmode==0x3E7 || $setmode==0x3E6)){ echo ""; } else { ?>
        <li><a <?php if($page=="home"){ echo 'href="#" class="menu-item active"'; }else{echo 'href="/" class="menu-item"'; } ?>>
            <?php echo $_LANG['string_home_text']; ?>
        </a></li>
        <li><a <?php if($page=="apps"){ echo 'href="#" class="menu-item active"'; }else{echo 'href="/apps" class="menu-item"'; } ?>>
            <?php echo $_LANG['string_applications_text']; ?>
        </a></li>
        <li><a <?php if($page=="about"){ echo 'href="#" class="menu-item active"'; }else{echo 'href="/about" class="menu-item"'; } ?>>
            <?php echo $_LANG['string_about_text']; ?>
        </a></li>
        <li><a <?php if($page=="contact"){ echo 'href="#" class="menu-item active"'; }else{echo 'href="/contact" class="menu-item"'; } ?>>
            <?php echo $_LANG['string_contact_text']; ?>
        </a></li>
        <?php } ?>
    </ul>
</div>