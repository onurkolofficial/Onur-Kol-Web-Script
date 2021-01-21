<?php
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

// Get Form Data
$CategoryId=$_POST['id'];
$CategoryName=$_POST['name'];
$CategoryIndex=$_POST['index'];

if(empty($CategoryId)){
    echo '<script>alert("'.$_LANG['string_empty_category_id_text'].'"); window.location.href="../";</script>';
}
else{
    if(empty($CategoryName)){
        echo '<script>alert("'.$_LANG['string_empty_category_name_url'].'"); window.location.href="../";</script>';
    }
    else{
        // Check Item Index (Position)
        if($CategoryIndex!=""){
            $CategoryIndex=$_POST['index'];
            // Check Exists Index
            $QueryResult=$WebConfig->Query("SELECT * FROM appcategories WHERE CategoryIndex>='$CategoryIndex'");
            if($WebConfig->NumRows($QueryResult)>=1){
                // Count Exists Item Index
                while($Row=$WebConfig->FetchAssoc($QueryResult)){
                    // Get Update Id
                    $GetCategoryId=$Row['CategoryId'];
                    // Get and Count Current Index
                    $Index=$Row['CategoryIndex'];
                    $NewIndex=$Index+1;
                    // Update Item
                    $WebConfig->Query("UPDATE appcategories SET CategoryIndex='$NewIndex' WHERE CategoryId='$GetCategoryId'");
                }
            }
        }
        else{
            // Add Item to End Position
            // Count All Items
            $QueryResult=$WebConfig->Query("SELECT * FROM appcategories");
            $TotalCount=$WebConfig->NumRows($QueryResult);
            // Set New Index
            $CategoryIndex=$TotalCount+1;
        }

        $QString="INSERT INTO appcategories (CategoryId,CategoryName,CategoryIndex) VALUES ('$CategoryId','$CategoryName','$CategoryIndex')";
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