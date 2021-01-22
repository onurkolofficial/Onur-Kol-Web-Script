// Created by Onur KOL

// Variables
var ShowNewKeyPage=true;

// On Click Events
$('#newKeyBtn').click(function(){
    if(ShowNewKeyPage){
        // Hide Page
        $('#newKeyPage').hide();
        ShowNewKeyPage=false;
    }
    else{
        // Show Page
        $('#newKeyPage').show();
        ShowNewKeyPage=true;
    }
});

function deleteKey(keyId,language,message){
    if(message==null)
        message="Are you sure delete key ("+keyId+") for language("+language+") ?";
    
    if(confirm(message)){
        window.location.href="delete/?type=key&language="+language+"&key="+keyId;
    }
}

// Hide to Page Start
$('#newKeyBtn').click();