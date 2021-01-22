// Created by Onur KOL

function deleteApplication(appId,message){
    if(message==null)
        message="Are you sure delete application ("+appId+") ?";
    
    if(confirm(message)){
        window.location.href="delete/?id="+appId;
    }
}