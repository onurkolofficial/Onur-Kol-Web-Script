<div class="footer">
	<div class="footer-copy"><?php echo $_LANG['string_copy_text']; ?></div>
	<div class="footer-urls">
		<?php if(isset($setmode) && ($setmode==0x3E7 || $setmode==0x3E6)){ echo ""; } else { ?>
		<ul>
			<li><a href="https://twitter.com/onurkolofficial">Twitter</a></li>
			<li><a href="https://facebook.com/onurkolofficial">Facebook</a></li>
            <li><a href="https://instagram.com/onurkolofficial">Instagram</a></li>
            <li><a href="https://github.com/onurkolofficial">Github</a></li>
            <li><a href="https://play.google.com/store/apps/developer?id=Onur+Kol">Play Store</a></li>
		</ul>
		<?php } ?>
	</div>
	<div class="footer-version"><?php echo $WebVersion; ?></div>
</div>