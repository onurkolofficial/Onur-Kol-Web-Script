<?php
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

// Use Modules.
use \WebConfig\Config as WebConfig;

// Get Form Data
$GetLanguageCode=$_POST['langcode'];
$GetLanguageName=$_POST['langname'];

// Get Language File Info
$LanguageFileType=$WebConfig->GetLanguageFileType();
$LanguageFileNameTag=$WebConfig->GetLanguageFileNameTag();

if(empty($GetLanguageCode)){
    echo '<script>alert("'.$_LANG['string_empty_language_code_text'].'"); window.location.href="../";</script>';
}
else{
    if(empty($GetLanguageName)){
        echo '<script>alert("'.$_LANG['string_empty_language_name_text'].'"); window.location.href="../";</script>';
    }
    else{
        // Language Code set Lower Case
        $LanguageCode=strtolower($GetLanguageCode);
        // Get Path
        $LanguagePath=WebConfig::RootPath."/language/";
        // Get File Name
        $LanguageFile=$LanguageFileNameTag.$LanguageCode.".".$LanguageFileType;
        
        // Check File Exists
        if($WebConfig->FileExists($LanguagePath.$LanguageFile)){
            echo '<script>alert("'.$_LANG['string_exist_language_file_text'].'"); window.location.href="../";</script>';
        }
        else{
            // Create File
            $WebConfig->OpenFile($LanguagePath.$LanguageFile);

            // Check File Extension
            if($LanguageFileType=="ini"){
                // Build Language File
                $LangKeys="";
                $FileStartText='['.strtoupper($GetLanguageCode).']'."\n";
                // Print Current Language
                $LangKeys.=$LanguageCode.'="'.$GetLanguageName.'"'."\n";
                // Print All Ready Language Keys
                foreach($_LANG as $Key => $Value){
                    $LangKeys.=$Key.'=""'."\n";
                }
                // Combine All Commands
                $WriteLangFile=$FileStartText.$LangKeys;

                // Print File
                $WebConfig->WriteFile(null,$WriteLangFile);
            }
            else if($LanguageFileType=="php"){
                // Build Language File
                $LangKeys="";
                $FileStartText='<?php
$_LANG=array();'."\n\n";
                // Print Current Language
                $LangKeys.='$_LANG'."['".$LanguageCode."']=".'"'.$GetLanguageName.'";'."\n";
                // Print All Ready Language Keys
                foreach($_LANG as $Key => $Value){
                    $LangKeys.='$_LANG'."['".$Key."']=".'"";'."\n";
                }
                $FileEndText='?>';
                // Combine All Commands
                $WriteLangFile=$FileStartText.$LangKeys.$FileEndText;
                // Print File
                $WebConfig->WriteFile(null,$WriteLangFile);
            }

            // Redirect
            header("Location: ../../");
        }
    }
}
?>