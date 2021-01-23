<?php
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

// Get Form Data
$GetLanguage=$_POST['language'];
$GetLanguageKey=$_POST['key'];
$GetLanguageValue=$_POST['value'];
$GetStartPosition=$_POST['start'];

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
            $NewData=$GetLanguageKey.'="'.$GetLanguageValue.'"'."\n";
            if(isset($GetStartPosition)){
                // Find Language File (Ini) Start
                $l='['.strtoupper($GetLanguage).']'."\n";
                // Add New Data
                $NewFileContent=str_replace($l,$l.$NewData,$FileContent);
                $FileContent=$NewFileContent;
            }
            else{
                // Add New Data
                $FileContent.=$NewData;
            }
            // Rewrite File
            $WebConfig->PutContentsFile($LanguageFile,$FileContent);
        }
        else if($LanguageFileType=="php"){
            // Set Replace Data
            $NewData='$_LANG["'.$GetLanguageKey.'"]="'.$GetLanguageValue.'";'."\n";
            if(isset($GetStartPosition)){
                // Find Language File (Php) Start
                $l='$_LANG=array();'."\n";
                // Add New Data
                $FileStartContent=str_replace($l,$l.$NewData,$FileContent);
            }
            else{
                // Remove PHP End Tag
                $FileStartContent=str_replace('?>','',$FileContent);
                // Add New Data in End Page
                $FileStartContent.=$NewData.'?>';
            }
            // Rewrite File
            $WebConfig->PutContentsFile($LanguageFile,$FileStartContent);
        }
        // Success
        // Redirect Back
        header("Location: ../?get=".$GetLanguage);
    }
}
?>