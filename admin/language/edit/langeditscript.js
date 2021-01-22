// Created by Onur KOL

function deleteLanguage(language,message){
    if(message==null)
        message="Are you sure delete language ("+language+") ?";
    
    if(confirm(message)){
        window.location.href="../delete/?type=language&language="+language;
    }
}