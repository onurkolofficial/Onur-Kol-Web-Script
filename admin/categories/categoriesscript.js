// Created by Onur KOL

// Variables
var ShowNewCategoryPage=true;

// On Click Events
$('#newCategoryBtn').click(function(){
    if(ShowNewMenuPage){
        // Hide Page
        $('#newCategoryPage').hide();
        ShowNewMenuPage=false;
    }
    else{
        // Show Page
        $('#newCategoryPage').show();
        ShowNewMenuPage=true;
    }
});

function deleteCategory(categoryId,message){
    if(message==null)
        message="Are you sure delete category ("+categoryId+") ?";
    
    if(confirm(message)){
        window.location.href="delete/?id="+categoryId;
    }
}

// Hide to Page Start
$('#newCategoryBtn').click();