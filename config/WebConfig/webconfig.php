<?php
// Copyright (c) 2021 by Onur KOL
namespace WebConfig;

// Define Root Path
define('WebRoot',$_SERVER['DOCUMENT_ROOT']);

class Config {
    // Version Info
    public const Version="1.1.0"; // 1.5.0

    // Path Info
    public const RootPath=WebRoot;
    public const ConfigPath=self::RootPath."/config";
    public const ModulesPath=self::ConfigPath."/modules";
    public const ConnectPath=self::ConfigPath."/connect";
    
    // Connection Info
    public $ConnectServer;
    public $ConnectDatabase=null;
    public $ConnectUser;
    public $ConnectPassword;
    public $ConnectStatus=null;

    // Language Info
    private $LanguageDefault="en";
    private $LanguageCurrent=null;
    private $LanguageFileType="ini";
    private $LanguageFileNameTag=""; // example: 'TAG_' to 'TAG_$Language.$FileType' = 'TAG_en.ini'

    ///!
    // WebConfig Connection Methods

    /// If you want doesn't reporting message to using following methods.

    // - Method 1 -
    // $WebConfig->SetConnectInfo($Server,$User,$Password,$Database);
    // $WebConfig->Connect();
    //
    // - Method 2 -
    // $WebConfig->ConnectHost($Server,$User,$Password);
    // $WebConfig->ConnectDatabase($Server,$User,$Password,$Database);

    /// NOTE!
    // if database connected and using Connect() method to return this connection.
    // Ex.
    
    // $WebConfig->SetConnectInfo($Server,$User,$Password,$Database);
    // $WebConfig->Connect(); // First connection server.
    // ...
    // // If Get Connection to:
    // $Variable=$WebConfig->Connect(); // Return already connected server.

    /// Following methods to reporting messages.

    // - Method 1 -
    // $WebConfig->SetConnectInfo($Server,$User,$Password,$Database);
    // $WebConfig->ConnectDump();
    //
    // - Method 2 -
    // $WebConfig->ConnectHostDump($Server,$User,$Password);
    // $WebConfig->ConnectDatabaseDump($Server,$User,$Password,$Database);

    // If checking connection status:

    // $Variable=$WebConfig->ConnectStatus;

    // $Variable=$WebConfig->Connect();
    // $Variable=$WebConfig->ConnectHost(...);
    // $Variable=$WebConfig->ConnectDatabase(...);

    /// Disconnect Server
    // Not Reporting

    // $WebConfig->Disconnect();
    // $WebConfig->Disconnect($Connection); // if you use '$var=mysqli_connect(...);' to use $Connection parameter. 

    // Reporting

    // $WebConfig->DisconnectDump();
    // $WebConfig->DisconnectDump($Connection);
    ///!
    public function SetConnectInfo($Server,$User,$Password,$Database=null){
        $this->ConnectServer=$Server;
        $this->ConnectUser=$User;
        $this->ConnectPassword=$Password;
        if($Database!=null)
            $this->ConnectDatabase=$Database;
    }

    public function Connect(){
        if($this->ConnectStatus!=null){
            return $this->ConnectStatus;
        }
        else{
            if($this->ConnectDatabase==null)
                return $this->ConnectStatus=@mysqli_connect($this->ConnectServer,$this->ConnectUser,$this->ConnectPassword);
            else
                return $this->ConnectStatus=@mysqli_connect($this->ConnectServer,$this->ConnectUser,$this->ConnectPassword,$this->ConnectDatabase);
        }
    }
    public function ConnectDump(){
        if($this->ConnectStatus!=null){
            return $this->ConnectStatus;
        }
        else{
            if($this->ConnectDatabase==null)
                return $this->ConnectStatus=mysqli_connect($this->ConnectServer,$this->ConnectUser,$this->ConnectPassword);
            else
                return $this->ConnectStatus=mysqli_connect($this->ConnectServer,$this->ConnectUser,$this->ConnectPassword,$this->ConnectDatabase);
        }
    }
    public function ConnectHost($Server,$User,$Password){
        $this->SetConnectInfo($Server,$User,$Password);
        return $this->ConnectStatus=@mysqli_connect($Server,$User,$Password);
    }
    public function ConnectDatabase($Server,$User,$Password,$Database){
        $this->SetConnectInfo($Server,$User,$Password,$Database);
        return $this->ConnectStatus=@mysqli_connect($Server,$User,$Password,$Database);
    }
    public function ConnectHostDump($host,$user,$password){
        $this->SetConnectInfo($Server,$User,$Password);
        return $this->ConnectStatus=mysqli_connect($Server,$User,$Password);
    }
    public function ConnectDatabaseDump($host,$user,$password,$dbname){
        $this->SetConnectInfo($Server,$User,$Password,$Database);
        return $this->ConnectStatus=mysqli_connect($Server,$User,$Password,$Database);
    }
    public function Disconnect($Connect=null){
        $this->ConnectStatus=null;
        if($Connect==null)
            return @mysqli_close($this->ConnectStatus);
        else
            return @mysqli_close($Connect);
    }
    public function DisconnectDump($Connect=null){
        $this->ConnectStatus=null;
        if($Connect==null)
            return mysqli_close($this->ConnectStatus);
        else
            return mysqli_close($Connect);
    }

    ///!
    // WebConfig Language Methods
    ///!
    public function SetLanguage($Language=null){
        if($Language==null)
            $this->LanguageCurrent=$this->LanguageDefault; // Set Default Language
        else
            $this->LanguageCurrent=$Language;
        return $this->LanguageCurrent;
    }
    public function SetDefaultLanguage($Language){
        return $this->LanguageDefault=$Language;
    }
    public function SetCookieLanguage($Language=null){
        if($Language==null)
            $this->LanguageCurrent=$this->LanguageDefault;
        else
            $this->LanguageCurrent=$Language;
        // Set Cookie
        setcookie("WebConfig-Language",$this->LanguageCurrent,time()+(86400*30), "/");
        return $this->LanguageCurrent;
    }
    public function SetLanguageFileType($FileType){
        $this->LanguageFileType=$FileType;
    }
    public function SetLanguageFileNameTag($NameTag){
        $this->LanguageFileNameTag=$NameTag;
    }
    public function GetLanguage(){
        return $this->LanguageCurrent;
    }
    public function GetDefaultLanguage(){
        return $this->LanguageDefault;
    }
    public function GetCookieLanguage(){
        if(isset($_COOKIE['WebConfig-Language']))
            return $_COOKIE['WebConfig-Language'];
        else
            return null;
    }
    public function GetLanguageFileType(){
        return $this->LanguageFileType;
    }
    public function GetLanguageFileNameTag(){
        return $this->LanguageFileNameTag;
    }

    ///!
    // WebConfig Query Methods
    ///!
    public function Query($Query){
        return @mysqli_query($this->ConnectStatus,$Query);
    }
    public function QueryDump($Query){
        return mysqli_query($this->ConnectStatus,$Query);
    }
    public function FetchAssoc($QueryResult){
        return @mysqli_fetch_assoc($QueryResult);
    }
    public function FetchAssocDump($QueryResult){
        return mysqli_fetch_assoc($QueryResult);
    }
    public function FetchRow($QueryResult){
        return @mysqli_fetch_row($QueryResult);
    }
    public function FetchRowDump($QueryResult){
        return mysqli_fetch_row($QueryResult);
    }
    public function FetchArray($QueryResult){
        return @mysqli_fetch_array($QueryResult);
    }
    public function FetchArrayDump($QueryResult){
        return mysqli_fetch_array($QueryResult);
    }
    public function NumRows($QueryResult){
        return @mysqli_num_rows($QueryResult);
    }
    public function NumRowsDump($QueryResult){
        return mysqli_num_rows($QueryResult);
    }
    public function ConnectError(){
        return mysqli_error($this->ConnectStatus);
    }

    ///!
    // WebConfig Session & Cookie Methods
    ///!
    public function SetCookie($CookieName,$CookieValue,$CookieTime=null,$CookiePath=null){
        if($CookieTime==null)
            $CookieTime=time()+(86400*30);
        if($CookiePath==null)
            $CookiePath="/";
        // Set Cookie
        setcookie($CookieName,$CookieValue,$CookieTime, $CookiePath);
        return isset($_COOKIE[$CookieName]);
    }
    public function GetCookie($CookieName){
        if(isset($_COOKIE[$CookieName]))
            return $_COOKIE[$CookieName];
        else
            return false;
    }
    public function GetCookieExist($CookieName){
        return isset($_COOKIE[$CookieName]);
    }
    public function SetSession($SessionName,$SessionValue){
        return $_SESSION[$SessionName]=$SessionValue;
    }
    public function GetSession($SessionName){
        if(isset($_SESSION[$SessionName]))
            return $_SESSION[$SessionName];
        else
            return false;
    }
    public function GetSessionExist($SessionName){
        return isset($_SESSION[$SessionName]);
    }
    public function CloseSession(){
        return session_destroy();
    }


}
?>