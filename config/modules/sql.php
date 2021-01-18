<?php
// Copyright (c) 2020 by Onur KOL

class SQLManager {
    public function Import(mysqli $connect, $sqlfile){
        // Import SQL Database File
        $query='';
        $importstatus='';
        $sqlScript=file($sqlfile);
        foreach($sqlScript as $line){
            $startWith=substr(trim($line), 0 ,2);
            $endWith=substr(trim($line), -1 ,1);
            if(empty($line) || $startWith=='--' || $startWith=='/*' || $startWith=='//'){
                continue;
            }
            $query=$query.$line;
            if($endWith==';'){
                if(mysqli_query($connect,$query)){
                    $importstatus="success";
                }else{
                    $importstatus="error";
                }
                $query= '';	
            }
        }
        if($importstatus=="success"){
            return true;
        }
        else{
            return false;
        }
    }
}

$Sql=new SQLManager();
?>