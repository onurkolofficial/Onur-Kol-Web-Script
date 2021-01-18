<?php
namespace WebConfig;

// Define Root Path
define('WebRoot',$_SERVER['DOCUMENT_ROOT']);

class Config {
    // Version Info
    public const Version="1.1.0";

    // Path Info
    public const RootPath=WebRoot;
    public const ConfigPath=self::RootPath."/config";
    public const ModulesPath=self::ConfigPath."/modules";
    public const ServerPath=self::ConfigPath."/server";
    
    // Connection Info
    public $ConnectServer;
    public $ConnectDatabase=null;
    public $ConnectUser;
    public $ConnectPassword;
    public $ConnectStatus;

    ///!
    // WebConfig Connection Methods

    /// If you want doesn't reporting message to using following methods.

    // - Method 1 -
    // $WebConfig->SetConnectInfo($Server,$User,$Password,$Database);
    // $WebConfig->Connect();
    //
    // - Method 2 -
    // $WebConfig->ConnectHost($Server,$User,$Password,$Database);
    // or
    // $WebConfig->ConnectDatabase($Server,$User,$Password,$Database)

    /// Following methods to reporting messages.

    // - Method 1 -
    // $WebConfig->SetConnectInfo($Server,$User,$Password,$Database);
    // $WebConfig->ConnectDump();
    //
    // - Method 2 -
    // $WebConfig->ConnectHostDump($Server,$User,$Password,$Database);
    // or
    // $WebConfig->ConnectDatabaseDump($Server,$User,$Password,$Database)

    // If checking connection status:

    // $Variable=$WebConfig->Connect();
    // $Variable=$WebConfig->ConnectHost(...);
    // $Variable=$WebConfig->ConnectDatabase(...);

    ///!
    public function SetConnectInfo($Server,$User,$Password,$Database=null){
        $this->ConnectServer=$Server;
        $this->ConnectUser=$User;
        $this->ConnectPassword=$Password;
        if($Database!=null)
            $this->ConnectDatabase=$Database;
    }

    public function Connect(){
        if($this->ConnectDatabase==null){
            return @mysqli_connect($this->ConnectServer,$this->ConnectUser,$this->ConnectPassword);
        }
        else{
            return @mysqli_connect($this->ConnectServer,$this->ConnectUser,$this->ConnectPassword,$this->ConnectDatabase);
        }
    }
    public function ConnectDump(){
        if($this->ConnectDatabase==null){
            return mysqli_connect($this->ConnectServer,$this->ConnectUser,$this->ConnectPassword);
        }
        else{
            return mysqli_connect($this->ConnectServer,$this->ConnectUser,$this->ConnectPassword,$this->ConnectDatabase);
        }
    }

    public function ConnectHost($Server,$User,$Password){
        $this->SetConnectInfo($Server,$User,$Password);
        return @mysqli_connect($Server,$User,$Password);
    }
    public function ConnectDatabase($Server,$User,$Password,$Database){
        $this->SetConnectInfo($Server,$User,$Password,$Database);
        return @mysqli_connect($Server,$User,$Password,$Database);
    }
    public function ConnectHostDump($host,$user,$password){
        $this->SetConnectInfo($Server,$User,$Password);
        return mysqli_connect($Server,$User,$Password);
    }
    public function ConnectDatabaseDump($host,$user,$password,$dbname){
        $this->SetConnectInfo($Server,$User,$Password,$Database);
        return mysqli_connect($Server,$User,$Password,$Database);
    }
}
?>