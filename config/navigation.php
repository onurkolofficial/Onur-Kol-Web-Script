<!-- Navigation !-->
<div class="nav-main">
	<img class="logo" src="/assets/images/logo.png" alt=""/>
  	<p class="logo-title"><?php echo $welcomeText; ?></p>
	<!-- Menu !-->
	<a class="menu-icon mobile"><span></span></a>
	<ul class="nav-menu">
        <li><a <?php if($page=="home"){ echo 'href="#" class="menu-item active"'; }else{echo 'href="/" class="menu-item"'; } ?>>
            <?php echo $homeText; ?>
        </a></li>
        <li><a <?php if($page=="apps"){ echo 'href="#" class="menu-item active"'; }else{echo 'href="/apps" class="menu-item"'; } ?>>
            <?php echo $applicationsText; ?>
        </a></li>
        <li><a <?php if($page=="about"){ echo 'href="#" class="menu-item active"'; }else{echo 'href="/about" class="menu-item"'; } ?>>
            <?php echo $aboutText; ?>
        </a></li>
        <li><a <?php if($page=="contact"){ echo 'href="#" class="menu-item active"'; }else{echo 'href="/contact" class="menu-item"'; } ?>>
            <?php echo $contactText; ?>
        </a></li>
    </ul>
    <ul class="nav-menu-mobile">
        <li><a <?php if($page=="home"){ echo 'href="#" class="menu-item active"'; }else{echo 'href="/" class="menu-item"'; } ?>>
            <?php echo $homeText; ?>
        </a></li>
        <li><a <?php if($page=="apps"){ echo 'href="#" class="menu-item active"'; }else{echo 'href="/apps" class="menu-item"'; } ?>>
            <?php echo $applicationsText; ?>
        </a></li>
        <li><a <?php if($page=="about"){ echo 'href="#" class="menu-item active"'; }else{echo 'href="/about" class="menu-item"'; } ?>>
            <?php echo $aboutText; ?>
        </a></li>
        <li><a <?php if($page=="contact"){ echo 'href="#" class="menu-item active"'; }else{echo 'href="/contact" class="menu-item"'; } ?>>
            <?php echo $contactText; ?>
        </a></li>
    </ul>
</div>