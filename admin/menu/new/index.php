<?php
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

// Get Form Data
$MenuItemText=$_POST['text'];
$MenuItemUrl=$_POST['url'];
$MenuItemIndex=$_POST['index'];
$MenuItemId=$_POST['menuid'];

if(empty($MenuItemText)){
    echo '<script>alert("'.$_LANG['string_empty_menuitem_text'].'"); window.location.href="../";</script>';
}
else{
    if(empty($MenuItemUrl)){
        echo '<script>alert("'.$_LANG['string_empty_menuitem_url'].'"); window.location.href="../";</script>';
    }
    else{
        // Check Item Index (Position)
        if($MenuItemIndex!=""){
            $MenuItemIndex=$_POST['index'];
            // Check Exists Index
            $QueryResult=$WebConfig->Query("SELECT * FROM sitemenu WHERE ItemIndex>='$MenuItemIndex'");
            if($WebConfig->NumRows($QueryResult)>=1){
                // Count Exists Item Index
                while($Row=$WebConfig->FetchAssoc($QueryResult)){
                    // Get Update Id
                    $ItemId=$Row['id'];
                    // Get and Count Current Index
                    $Index=$Row['ItemIndex'];
                    $NewIndex=$Index+1;
                    // Update Item
                    $WebConfig->Query("UPDATE sitemenu SET ItemIndex='$NewIndex' WHERE id='$ItemId'");
                }
            }
        }
        else{
            // Add Item to End Position
            // Count All Items
            $QueryResult=$WebConfig->Query("SELECT * FROM sitemenu");
            $Positions=$WebConfig->NumRows($QueryResult);
            // Set New Index
            $MenuItemIndex=$Positions+1;
        }

        $QString="INSERT INTO sitemenu (ItemText,ItemUrl,ItemIndex,ItemMenuId) VALUES ('$MenuItemText','$MenuItemUrl','$MenuItemIndex','$MenuItemId')";
        if($WebConfig->Query($QString)){
            // Success.
            header("Location: ../");
        }
        else{
            echo '<script>alert("'.$_LANG['string_unknown_error'].'"); window.location.href="../";</script>';
        }
    }
}
?>