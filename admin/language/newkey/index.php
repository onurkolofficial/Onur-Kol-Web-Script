<?php
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

// Get Form Data
$GetLanguage=$_POST['language'];
$GetLanguageKey=$_POST['key'];
$GetLanguageValue=$_POST['value'];

// Get Language File Info
$LanguageFileType=$WebConfig->GetLanguageFileType();
$LanguageFileNameTag=$WebConfig->GetLanguageFileNameTag();

if(empty($GetLanguageKey)){
    echo '<script>alert("'.$_LANG['string_empty_key_text'].'"); window.location.href="../?get='.$GetLanguage.'";</script>';
}
else{
    if(empty($GetLanguageValue)){
        echo '<script>alert("'.$_LANG['string_empty_value_text'].'"); window.location.href="../?get='.$GetLanguage.'";</script>';
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
            // Build Data
            $NewData=$GetLanguageKey.'="'.$GetLanguageValue.'"';
            // Add New Data
            $FileContent.=$NewData."\n";
            // Rewrite File
            $WebConfig->PutContentsFile($LanguageFile,$FileContent);
        }
        else if($LanguageFileType=="php"){
            // Set Replace Data
            //$ReplaceData=$GetLanguageKey.'="'.$GetReplaceValue.'"';
            //$NewData=$GetLanguageKey.'="'.$GetLanguageValue.'"';
            $NewData='$_LANG["'.$GetLanguageKey.'"]="'.$GetLanguageValue.'";';
            // Remove PHP End Tag
            $FileStartContent=str_replace('?>','',$FileContent);
            // Add New Data in End Page
            $FileStartContent.=$NewData."\n".'?>';
            // Rewrite File
            $WebConfig->PutContentsFile($LanguageFile,$FileStartContent);
        }
        // Success
        // Redirect Back
        header("Location: ../?get=".$GetLanguage);
    }
}
?>