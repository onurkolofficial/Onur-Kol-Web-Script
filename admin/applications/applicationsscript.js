// Created by Onur KOL

function deleteApplication(appId,message){
    if(message==null)
        message="Are you sure delete application ("+categoryId+") ?";
    
    if(confirm(message)){
        window.location.href="delete/?id="+categoryId;
    }
}