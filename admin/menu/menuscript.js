// Created by Onur KOL

// Variables
var ShowNewMenuPage=true;

// On Click Events
$('#newMenuBtn').click(function(){
    if(ShowNewMenuPage){
        // Hide Page
        $('#newMenuPage').hide();
        ShowNewMenuPage=false;
    }
    else{
        // Show Page
        $('#newMenuPage').show();
        ShowNewMenuPage=true;
    }
});

function deleteMenuItem(itemId,message){
    if(message==null)
        message="Are you sure delete menu item ("+itemId+") ?";
    
    if(confirm(message)){
        window.location.href="delete/?id="+itemId;
    }
}

// Hide to Page Start
$('#newMenuBtn').click();