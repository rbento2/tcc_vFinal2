
$(document).ready(function(){
   $(".form-control-renato ").hover( function(){ 
   var caminho = $(this).children("input").val();
    $("#imgMenu").remove();
    $("#divImagem").append("<img src = '"+caminho+"' style='width:300px';height:200px; id='imgMenu'/>");
    
    });
    
   
    
});