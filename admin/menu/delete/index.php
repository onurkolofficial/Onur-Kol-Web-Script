<?php
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

// Get Data (Menu Item Id)
$MenuItemId=$_GET['id'];


if(empty($MenuItemId)){
    echo '<script>alert("'.$_LANG['string_error_text'].' '.$_LANG['string_empty_value_text'].'"); window.location.href="../";</script>';
}
else{
    // Get Current Item Index
    $QueryResult=$WebConfig->Query("SELECT * FROM sitemenu WHERE id='$MenuItemId'");
    $Row=$WebConfig->FetchAssoc($QueryResult);
    $GetOldItemIndex=$Row['ItemIndex'];
    // Delete Item
    if($WebConfig->Query("DELETE FROM sitemenu WHERE id='$MenuItemId'")){
        // Update All Item Index
        $QueryResult=$WebConfig->Query("SELECT * FROM sitemenu WHERE ItemIndex>'$GetOldItemIndex'");
        while($Row=$WebConfig->FetchAssoc($QueryResult)){
            // Get Update Id
            $GetItemId=$Row['id'];
            // Get and Discount Index
            $GetOldIndex=$Row['ItemIndex'];
            $GetNewIndex=$GetOldIndex-1;
            // Update New Index
            $WebConfig->Query("UPDATE sitemenu SET ItemIndex='$GetNewIndex' WHERE id='$GetItemId'");
        }
        // Success.
        header("Location: ../");
    }
    else{
        echo '<script>alert("'.$_LANG['string_unknown_error'].'"); window.location.href="../";</script>';
    }
}
?>