<?php
// Set setup mode (Fixed Redirect issue)
$ServerEditMode=true;
// Include Main Config
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";
// Use Modules.
use \WebConfig\Config as WebConfig;

// Get Form Data
$Server=$_POST['server'];
$User=$_POST['user'];
$Password=$_POST['password'];
$Database=$_POST['database'];

// Get connect.ini File Data
$ConnectIniFile=WebConfig::ConnectPath."/connect.ini";
$GetConnectInfoFromIni=$Ini->Read($ConnectIniFile,true); // If ini file exist caption, set to true

// Get Database File
$DatabaseFile=WebConfig::ConfigPath."/import/database.sql";

if(empty($Server)){
    echo '<script>alert("'.$_LANG['string_server_empty'].'"); window.location.href="../";</script>';
}
else{
    if(empty($User)){
        echo '<script>alert("'.$_LANG['string_user_empty'].'"); window.location.href="../";</script>';
    }
    else{
        if(empty($Database)){
            echo '<script>alert("'.$_LANG['string_database_empty'].'"); window.location.href="../";</script>';
        }
        else{
            // Check Connection
            $WebConfig->SetConnectInfo($Server,$User,$Password,$Database);
            if($WebConfig->Connect()){
                // Connection Success.
                // Saving Data in connect.ini File.
                $GetConnectInfoFromIni['database']['db_server']=$Server;
                $GetConnectInfoFromIni['database']['db_user']=$User;
                $GetConnectInfoFromIni['database']['db_password']=$Password;
                $GetConnectInfoFromIni['database']['db_name']=$Database;
                // Commit
                $Ini->Write($ConnectIniFile,$GetConnectInfoFromIni);

                // Import SQL Database
                $SQLStatus=$Sql->Import($WebConfig->Connect(),$DatabaseFile);
                if(!$SQLStatus)
                    echo '<script>alert("'.$_LANG['string_warning_text'].'! '.$_LANG['string_sql_import_failed'].'");</script>';

                // Redirect Home Page
                header("Location: /");
            }
            else{
                echo '<script>alert("'.$_LANG['string_connect_failed'].'"); window.location.href="../";</script>';
            }
        }
    }
}
?>