<?php
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

// Get Form Data
$GetLanguage=$_POST['language'];
$GetReplaceKey=$_POST['replacekey'];
$GetReplaceValue=$_POST['replacevalue'];
$GetLanguageKey=$_POST['key'];
$GetLanguageValue=$_POST['value'];

// Get Language File Info
$LanguageFileType=$WebConfig->GetLanguageFileType();
$LanguageFileNameTag=$WebConfig->GetLanguageFileNameTag();

if(empty($GetLanguageKey)){
    echo '<script>alert("'.$_LANG['string_empty_key_text'].'"); window.location.href="../";</script>';
}
else{
    if(empty($GetLanguageValue)){
        echo '<script>alert("'.$_LANG['string_empty_value_text'].'"); window.location.href="../";</script>';
    }
    else{
        // Get Path
        $LanguagePath=WebConfig::RootPath."/language/";
        // Get File Name
        $LanguageFile=$LanguagePath.$LanguageFileNameTag.$GetLanguage.".".$LanguageFileType;
        // Get File Content
        $FileContent=$WebConfig->GetContentsFile($LanguageFile);

        // Check File Extension
        if($LanguageFileType=="ini"){
            // Set Replace Data
            $ReplaceData=$GetReplaceKey.'="'.$GetReplaceValue.'"';
            $NewData=$GetLanguageKey.'="'.$GetLanguageValue.'"';
            // Replace Ini Content
            $NewFileContent=str_replace($ReplaceData,$NewData,$FileContent);
            // Rewrite File
            $WebConfig->PutContentsFile($LanguageFile,$NewFileContent);
        }
        else if($LanguageFileType=="php"){
            // Set Replace Data
            $ReplaceData='$_LANG["'.$GetReplaceKey.'"]="'.$GetReplaceValue.'";';
            $NewData='$_LANG["'.$GetLanguageKey.'"]="'.$GetLanguageValue.'";';
            // Replace PHP Content
            $NewFileContent=str_replace($ReplaceData,$NewData,$FileContent);
            // Rewrite File
            $WebConfig->PutContentsFile($LanguageFile,$NewFileContent);
        }
        // Success
        // Redirect Back
        header("Location: ../../?get=".$GetLanguage);
    }
}
?>