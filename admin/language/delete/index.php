<?php
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

// Get Data 
$DeleteType=$_GET['type'];
$DeleteForLanguage=$_GET['language'];
// Check Delete Type
if($DeleteType=="key")
    $DeleteKey=$_GET['key'];
else
    $DeleteKey=null;

// Get Language File Info
$LanguageFileType=$WebConfig->GetLanguageFileType();
$LanguageFileNameTag=$WebConfig->GetLanguageFileNameTag();
// Get Current Language File Name
$CurrentLanguageFile=$LanguageFileNameTag.$WebConfig->GetCookieLanguage().".".$LanguageFileType;

// Get Path
$LanguagePath=WebConfig::RootPath."/language/";
// Get File Name
$LanguageFile=$LanguagePath.$LanguageFileNameTag.$DeleteForLanguage.".".$LanguageFileType;

/// Delete Key
if($DeleteType=="key"){
    // Get File Content
    $FileContent=$WebConfig->GetContentsFile($LanguageFile);

    if($LanguageFileType=="ini"){
        // Search Delete Key
        // Get Language All Keys
        $LanguageKeyArray=$Ini->Read($LanguageFile);
        // Get Value
        $GetValue=$LanguageKeyArray[$DeleteKey];
        // Delete Data
        $DeleteData=$DeleteKey.'="'.$GetValue.'"'."\n";
        // Replace Ini Content
        $NewFileContent=str_replace($DeleteData,'',$FileContent);
        // Rewrite File
        $WebConfig->PutContentsFile($LanguageFile,$NewFileContent);
    }
    else if($LanguageFileType=="php"){
        // Get Current Language File Name
        $CurrentLanguageFile=$LanguagePath.$LanguageFileNameTag.$WebConfig->GetCookieLanguage().".".$LanguageFileType;
        // Call Get Lang File
        include $LanguageFile;
        // Get Value
        $GetValue=$_LANG[$DeleteKey];
        // Call Back Current Lang File
        include $CurrentLanguageFile;
        // Delete Data
        $ReplaceData='$_LANG["'.$DeleteKey.'"]="'.$GetValue.'";'."\n";
        // Replace PHP Content
        $NewFileContent=str_replace($DeleteData,'',$FileContent);
        // Rewrite File
        $WebConfig->PutContentsFile($LanguageFile,$NewFileContent);
    }
    // Success
    // Redirect Back
    header("Location: ../?get=".$DeleteForLanguage);
}
else if($DeleteType=="language"){
    // Update All Language File
    if($LanguageFileType=="ini"){
        echo "<br>OK?";
        foreach(glob($LanguagePath.'*.'.$LanguageFileType) as $langfile){
            // Get Language All Keys
            $LanguageKeyArray=$Ini->Read($langfile);
            // Get Value
            $GetValue=$LanguageKeyArray[$DeleteForLanguage];
            // Convert Delete Data
            $DeleteData=$DeleteForLanguage.'="'.$GetValue.'"';
            // Get File Content
            $FileContent=$WebConfig->GetContentsFile($langfile);
            // Deleting Data
            $NewFileContent=str_replace($DeleteData,'',$FileContent);
            // Rewrite File
            $WebConfig->PutContentsFile($langfile,$NewFileContent);
        }
    }
    else if($LanguageFileType=="php"){
        echo "<br>OK?PHP";
        foreach(glob($LanguagePath.'*.'.$LanguageFileType) as $langfile){
            // Call Get Lang File
            include $langfile;
            // Get Value
            $GetValue=$_LANG[$DeleteForLanguage];
            // Convert Delete Data
            $DeleteData='$_LANG'."['".$DeleteForLanguage."']=".'"'.$GetValue.'";';
            // Get File Content
            $FileContent=$WebConfig->GetContentsFile($langfile);
            // Deleting Data
            $NewFileContent=str_replace($DeleteData,'',$FileContent);
            // Rewrite File
            $WebConfig->PutContentsFile($langfile,$NewFileContent);
        }
        // Call Back Current Lang File
        include $CurrentLanguageFile;
    }

    // Delete File
    $WebConfig->DeleteFile($LanguageFile);
    // Success
    // Redirect Back
    header("Location: ../edit/");
}


?>