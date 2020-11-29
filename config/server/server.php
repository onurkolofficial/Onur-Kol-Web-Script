<?php
// Copyright (c) 2020 by Onur KOL

class ServerManager {
    public $Info="";
    public $Status=0x0;
    public $Database=array();

    public function ConnectHost($host,$user,$password){
        return @mysqli_connect($host,$user,$password);
    }
    public function ConnectDatabase($host,$user,$password,$dbname){
        return @mysqli_connect($host,$user,$password,$dbname);
    }
    public function ConnectHostDump($host,$user,$password){
        return mysqli_connect($host,$user,$password);
    }
    public function ConnectDatabaseDump($host,$user,$password,$dbname){
        return mysqli_connect($host,$user,$password,$dbname);
    }
}

// Define Variable
$Server=new ServerManager();
?>