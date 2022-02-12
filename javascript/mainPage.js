$(document).ready(function(){
    $("dropdown-menu").hover(function(){
        $("#dropdown-menu ul").stop().hide();
        $(this).find("ul").css("display","inline");
    },function(){
        $(this).find("ul").delay(1000).queue(function(){
            $(this).hide();
        });
    });
});