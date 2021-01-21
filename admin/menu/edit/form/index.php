<?php
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

// Get Form Data
$ItemId=$_POST['id'];
$MenuItemText=$_POST['text'];
$MenuItemUrl=$_POST['url'];
$MenuItemIndex=$_POST['index'];
$MenuItemId=$_POST['menuid'];

if(empty($MenuItemText)){
    echo '<script>alert("'.$_LANG['string_empty_menuitem_text'].'"); window.location.href="../../";</script>';
}
else{
    if(empty($MenuItemUrl)){
        echo '<script>alert("'.$_LANG['string_empty_menuitem_url'].'"); window.location.href="../../";</script>';
    }
    else{
        // Get Current Item
        $QueryResult=$WebConfig->Query("SELECT * FROM sitemenu WHERE id='$ItemId'");
        $CurrentItemRow=$WebConfig->FetchAssoc($QueryResult);
        // Get Total Items
        $QueryResult=$WebConfig->Query("SELECT * FROM sitemenu");
        $TotalItem=$WebConfig->NumRows($QueryResult);
        // Check Item Index (Position)
        if($MenuItemIndex!=""){
            // Check Change Index
            if($MenuItemIndex!=$CurrentItemRow['ItemIndex']){
                // Check Move Rotation (UP,DOWN)
                $MenuItemOldIndex=$CurrentItemRow['ItemIndex'];
                $Move=$MenuItemOldIndex-$MenuItemIndex;
                if($Move<0){
                    $ROTATE="Down";
                    $TempIndex=999999999;
                }
                else{
                    $ROTATE="Up";
                    $TempIndex=-999999999;
                }
                // Set Temp Index
                $WebConfig->Query("UPDATE sitemenu SET ItemIndex='$TempIndex' WHERE id='$ItemId'");

                if($ROTATE=="Down"){
                    // Check Exists Index
                    $QueryResult=$WebConfig->Query("SELECT * FROM sitemenu WHERE ItemIndex<='$MenuItemIndex' AND ItemIndex>='$MenuItemOldIndex'");
                    // Discount -1 Index
                    while($Row=$WebConfig->FetchAssoc($QueryResult)){
                        $GetId=$Row['id'];
                        $GetIndex=$Row['ItemIndex'];
                        // Check Min. Limit
                        if($GetIndex>=1)
                            $NewIndex=$GetIndex-1;
                        $WebConfig->Query("UPDATE sitemenu SET ItemIndex='$NewIndex' WHERE id='$GetId'");
                    }
                }
                else if($ROTATE=="Up"){
                    // Check Exists Index
                    $QueryResult=$WebConfig->Query("SELECT * FROM sitemenu WHERE ItemIndex>='$MenuItemIndex' AND ItemIndex<='$MenuItemOldIndex'");
                    // Count +1 Index
                    while($Row=$WebConfig->FetchAssoc($QueryResult)){
                        $GetId=$Row['id'];
                        $GetIndex=$Row['ItemIndex'];
                        $NewIndex=$GetIndex+1;
                        // Check Max. Limit
                        if($NewIndex>$TotalItem)
                            $NewIndex=$TotalItem;
                        $WebConfig->Query("UPDATE sitemenu SET ItemIndex='$NewIndex' WHERE id='$GetId'");
                    }
                }
                // Update
                $WebConfig->Query("UPDATE sitemenu SET ItemIndex='$MenuItemIndex' WHERE id='$ItemId'");
            }
            // Index Not Changed ('Post data' and 'Database data' is equal)
        }
        else{
            // Change to End Position
            // Get Old Position
            $MenuItemOldIndex=$CurrentItemRow['ItemIndex'];
            // Set New Index
            $MenuItemIndex=$TotalItem+1;
            // Update
            $WebConfig->Query("UPDATE sitemenu SET ItemIndex='$MenuItemIndex' WHERE id='$ItemId'");
            // Check Exists Index
            $QueryResult=$WebConfig->Query("SELECT * FROM sitemenu WHERE ItemIndex>'$MenuItemOldIndex'");
            // Discount -1 Index
            while($Row=$WebConfig->FetchAssoc($QueryResult)){
                $GetId=$Row['id'];
                $GetIndex=$Row['ItemIndex'];
                $NewIndex=$GetIndex-1;
                $WebConfig->Query("UPDATE sitemenu SET ItemIndex='$NewIndex' WHERE id='$GetId'");
            }
            
        }
        // Update Another Data
        $WebConfig->Query("UPDATE sitemenu SET ItemText='$MenuItemText',ItemUrl='$MenuItemUrl',ItemMenuId='$MenuItemId' WHERE id='$ItemId'");

        // Redirect Back
        header("Location: ../../");
    }
}
?>