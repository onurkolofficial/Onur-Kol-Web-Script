<?php
// Copyright (c) 2021 by Onur KOL
// Use Modules.
use \WebConfig\Config as WebConfig;

// Check Get Language
$GetLanguage=isset($_GET['lang']);
$GetCookieLanguage=false;
// Language Variables
$Language=null;
$DefaultLanguage=$WebConfig->GetDefaultLanguage();
// Language File Info
$LanguageFileNameTag=$WebConfig->GetLanguageFileNameTag(); // Default: "";
$LanguageFileType=$WebConfig->GetLanguageFileType(); // Default: "ini"
//!
// $WebConfig->SetLanguageFileNameTag("language_file_");
// $WebConfig->SetLanguageFileType("php");

// If Get Language
if($GetLanguage){
    // Get New Language
    $SetLanguage=$_GET['lang'];
    // Set Current and Cookie Language.
    $WebConfig->SetCookieLanguage($SetLanguage);
    $GetCookieLanguage=false;
}
else{
    // Check Cookie Language
    if($WebConfig->GetCookieLanguage()!=null){
        $GetCookieLanguage=true;
    }
    else{
        // Set Cookie to Default Language.
        $WebConfig->SetCookieLanguage($DefaultLanguage);
    }
}

// Get New Language
if($GetCookieLanguage)
    $Language=$WebConfig->GetCookieLanguage();
else
    $Language=$WebConfig->GetLanguage();

// Include Language File
$LanguageFile=$LanguageFileNameTag.$Language.".".$LanguageFileType;
$LanguagePath=WebConfig::RootPath."/language";

// Check File Type
if($LanguageFileType=="ini"){
    $FullLanguageFile=$LanguagePath."/".$LanguageFile;
    $LFKeys=$Ini->Read($FullLanguageFile);
    foreach($LFKeys as $LFKey => $LFVal){
        if(is_array($LFVal)){
            foreach($LFVal as $LFVKey => $LFVVal){
                $_LANG[$LFKey][$LFVKey]=$LFVVal;
            }
        }
        else{
            $_LANG[$LFKey]=$LFVal;
        }
    }
}
else{
    // WARNING!
    // IF You use php file to using this language method:

    // $_LANG=array();
    // $_LANG["KEY"]="string";
    require_once $LanguagePath."/".$LanguageFile;
}
?>