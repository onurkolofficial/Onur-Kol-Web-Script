// Created by Onur KOL

// Variables
var ShowNewCategoryPage=true;

// On Click Events
$('#newCategoryBtn').click(function(){
    if(ShowNewCategoryPage){
        // Hide Page
        $('#newCategoryPage').hide();
        ShowNewCategoryPage=false;
    }
    else{
        // Show Page
        $('#newCategoryPage').show();
        ShowNewCategoryPage=true;
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