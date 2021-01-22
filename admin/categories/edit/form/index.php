<?php
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

// Get Form Data
$CategoryUpdateId=$_POST['oldid'];
$CategoryNewId=$_POST['id'];
$CategoryName=$_POST['name'];
$CategoryIndex=$_POST['index'];

if(empty($CategoryNewId)){
    echo '<script>alert("'.$_LANG['string_empty_category_id_text'].'"); window.location.href="../?id='.$CategoryUpdateId.'";</script>';
}
else{
    if(empty($CategoryName)){
        echo '<script>alert("'.$_LANG['string_empty_category_name_url'].'"); window.location.href="../?id='.$CategoryUpdateId.'";</script>';
    }
    else{
        // Get Current Item
        $QueryResult=$WebConfig->Query("SELECT * FROM appcategories WHERE CategoryId='$CategoryUpdateId'");
        $CurrentCategoryRow=$WebConfig->FetchAssoc($QueryResult);
        // Get Total Items
        $QueryResult=$WebConfig->Query("SELECT * FROM appcategories");
        $TotalItem=$WebConfig->NumRows($QueryResult);
        // Check Item Index (Position)
        if($CategoryIndex!=""){
            // Check Change Index
            if($CategoryIndex!=$CurrentCategoryRow['CategoryIndex']){
                // Check Move Rotation (UP,DOWN)
                $CategoryOldIndex=$CurrentCategoryRow['CategoryIndex'];
                $Move=$CategoryOldIndex-$CategoryIndex;
                if($Move<0){
                    $ROTATE="Down";
                    $TempIndex=999999999;
                }
                else{
                    $ROTATE="Up";
                    $TempIndex=-999999999;
                }
                // Set Temp Index
                $WebConfig->Query("UPDATE appcategories SET CategoryIndex='$TempIndex' WHERE CategoryId='$CategoryUpdateId'");

                if($ROTATE=="Down"){
                    // Check Exists Index
                    $QueryResult=$WebConfig->Query("SELECT * FROM appcategories WHERE CategoryIndex<='$CategoryIndex' AND CategoryIndex>='$CategoryOldIndex'");
                    // Discount -1 Index
                    while($Row=$WebConfig->FetchAssoc($QueryResult)){
                        $GetId=$Row['CategoryId'];
                        $GetIndex=$Row['CategoryIndex'];
                        // Check Min. Limit
                        if($GetIndex>=1)
                            $NewIndex=$GetIndex-1;
                        $WebConfig->Query("UPDATE appcategories SET CategoryIndex='$NewIndex' WHERE CategoryId='$GetId'");
                    }
                }
                else if($ROTATE=="Up"){
                    // Check Exists Index
                    $QueryResult=$WebConfig->Query("SELECT * FROM appcategories WHERE CategoryIndex>='$CategoryIndex' AND CategoryIndex<='$CategoryOldIndex'");
                    // Count +1 Index
                    while($Row=$WebConfig->FetchAssoc($QueryResult)){
                        $GetId=$Row['CategoryId'];
                        $GetIndex=$Row['CategoryIndex'];
                        $NewIndex=$GetIndex+1;
                        // Check Max. Limit
                        if($NewIndex>$TotalItem)
                            $NewIndex=$TotalItem;
                        $WebConfig->Query("UPDATE appcategories SET CategoryIndex='$NewIndex' WHERE CategoryId='$GetId'");
                    }
                }
                // Update
                $WebConfig->Query("UPDATE appcategories SET CategoryIndex='$CategoryIndex' WHERE CategoryId='$CategoryUpdateId'");
            }
            // Index Not Changed ('Post data' and 'Database data' is equal)
        }
        else{
            // Change to End Position
            // Get Old Position
            $CategoryOldIndex=$CurrentCategoryRow['CategoryIndex'];
            // Set New Index
            $CategoryIndex=$TotalItem+1;
            // Update
            $WebConfig->Query("UPDATE appcategories SET CategoryIndex='$CategoryIndex' WHERE CategoryId='$CategoryUpdateId'");
            // Check Exists Index
            $QueryResult=$WebConfig->Query("SELECT * FROM appcategories WHERE CategoryIndex>'$CategoryOldIndex'");
            // Discount -1 Index
            while($Row=$WebConfig->FetchAssoc($QueryResult)){
                $GetId=$Row['CategoryId'];
                $GetIndex=$Row['CategoryIndex'];
                $NewIndex=$GetIndex-1;
                $WebConfig->Query("UPDATE appcategories SET CategoryIndex='$NewIndex' WHERE CategoryId='$GetId'");
            }
            
        }
        // Update Another Data
        $WebConfig->Query("UPDATE appcategories SET CategoryId='$CategoryNewId',CategoryName='$CategoryName',CategoryIndex='$CategoryIndex' WHERE CategoryId='$CategoryUpdateId'");

        // Redirect Back
        header("Location: ../../");
    }
}
?>