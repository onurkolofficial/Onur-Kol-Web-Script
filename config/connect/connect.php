<?php
// Copyright (c) 2020 by Onur KOL

// Check server configuration file exist.
$get_server_file=$_SERVER['DOCUMENT_ROOT']."/config/server/connect.ini";

if(file_exists($get_server_file)){
    $dbinf=$Ini->Read($get_server_file);

    // Check Server Connection
    $Connect=$Server->ConnectDatabase($dbinf['db_server'],$dbinf['db_user'],$dbinf['db_password'],$dbinf['db_name']);
    if (!$Connect) {
        $Server->Info="failed";
        $Server->Status=0x0;
    }
    else{
        $Server->Info="connected";
        $Server->Status=0x1;
    }
}
else{
    $Server->Info="filenotfound";
    $Server->Status=0x4;
}

// Check Connection Status
if($Server->$Status==0x1){
    // Success Connection
    // NULL
}
else if($Server->$Status==0x4){
    // Server File Not Found
    header("Location: /admin/error/system/");
}
else{
    // Connect Failed.
    header("Location: /admin/setup/");
}

?>