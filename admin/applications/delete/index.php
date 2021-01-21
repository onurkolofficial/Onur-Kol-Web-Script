<?php
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

// Get Data (Category Id)
$CategoryId=$_GET['id'];


if(empty($CategoryId)){
    echo '<script>alert("'.$_LANG['string_error_text'].' '.$_LANG['string_empty_value_text'].'"); window.location.href="../";</script>';
}
else{
    // Get Current Item Index
    $QueryResult=$WebConfig->Query("SELECT * FROM appcategories WHERE CategoryId='$CategoryId'");
    $Row=$WebConfig->FetchAssoc($QueryResult);
    $GetOldCategoryIndex=$Row['CategoryIndex'];
    // Delete Item
    if($WebConfig->Query("DELETE FROM appcategories WHERE CategoryId='$CategoryId'")){
        // Update All Item Index
        $QueryResult=$WebConfig->Query("SELECT * FROM appcategories WHERE CategoryIndex>'$GetOldCategoryIndex'");
        while($Row=$WebConfig->FetchAssoc($QueryResult)){
            // Get Update Id
            $GetCategoryId=$Row['CategoryId'];
            // Get and Discount Index
            $GetOldIndex=$Row['CategoryIndex'];
            $GetNewIndex=$GetOldIndex-1;
            // Update New Index
            $WebConfig->Query("UPDATE appcategories SET CategoryIndex='$GetNewIndex' WHERE CategoryId='$GetCategoryId'");
        }
        // Success.
        header("Location: ../");
    }
    else{
        echo '<script>alert("'.$_LANG['string_unknown_error'].'"); window.location.href="../";</script>';
    }
}
?>