// Created by Onur KOL

function deleteVersion(versionName,message){
    if(message==null)
        message="Are you sure delete version ("+versionName+") ?";
    
    if(confirm(message)){
        window.location.href="delete/?ver="+versionName;
    }
}