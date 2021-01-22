<!-- Navigation !-->
<div class="nav-main">
	<img class="logo" src="/assets/images/logo.png" alt=""/>
  	<p class="logo-title"><?php echo $_LANG['string_welcome_text']; ?></p>
	<!-- Menu !-->
	<a class="menu-icon mobile"><span></span></a>
    <?php
        // Create Menu Item
        $MenuItem=array();
        // Check Site Setup Mode Navigation Menu.
        if(isset($ServerEditMode) && $ServerEditMode==true || isset($LoginPage) && $LoginPage==true){
            // EMPTY
        } 
        else {
            // Get Database 'sitemenu' Table
            $QueryResult=$WebConfig->Query("SELECT * FROM `sitemenu` ORDER BY `ItemIndex` ASC");
            // Get Menu
            while($Row=$WebConfig->FetchAssoc($QueryResult)){
                if($page==$Row['ItemMenuId'])
                    $itemData='href="#" class="menu-item active"';
                else
                    $itemData='href="'.$Row['ItemUrl'].'" class="menu-item"';

                // Check ItemText exists to Language Key.
                $itemText="";
                $itemLanguageKey=trim($Row['ItemText'],"$");
                // Check Language Key.
                if(isset($_LANG[$itemLanguageKey]))
                    $itemText=$_LANG[$itemLanguageKey];
                else
                    $itemText=$Row['ItemText'];

                $MenuItem[count($MenuItem)]='<li><a '.$itemData.'>'.$itemText.'</a></li>';
            }
        }
    ?>
    <ul class="nav-menu">
        <?php
            // Print Items
            foreach($MenuItem as $Value){
                echo $Value;
            }
            // Check Account Items
            $AccountSession=$WebConfig->GetSession('UserID');
            if($WebConfig->GetSessionExist('UserID')){
                // Now Check Admin Account.
                $QueryResult=$WebConfig->Query("SELECT * FROM `admin` WHERE UserId='$AccountSession'");
                if($WebConfig->NumRows($QueryResult)>0){
                    echo '<li><a href="/admin/" class="menu-item">'.$_LANG['string_admin_text'].'</a></li>';
                }
                echo '<li><a href="/logout/" class="menu-item">'.$_LANG['string_logout_text'].'</a></li>';
            }
        ?>
    </ul>
    <ul class="nav-menu-mobile">
        <?php
            // Print Items
            foreach($MenuItem as $Value){
                echo $Value;
            }
            // Check Account Items
            $AccountSession=$WebConfig->GetSession('UserID');
            if($WebConfig->GetSessionExist('UserID')){
                // Now Check Admin Account.
                $QueryResult=$WebConfig->Query("SELECT * FROM `admin` WHERE UserId='$AccountSession'");
                if($WebConfig->NumRows($QueryResult)>0){
                    echo '<li><a href="/admin/" class="menu-item">'.$_LANG['string_admin_text'].'</a></li>';
                }
                echo '<li><a href="/logout/" class="menu-item">'.$_LANG['string_logout_text'].'</a></li>';
            }
        ?>
    </ul>
</div>