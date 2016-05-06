$(function() {  
    var navTop = $('#cont-header').offset().top;  

    var stickyNav = function(){  
        var scrollTop = $(window).scrollTop();  

        if (scrollTop > navTop) {   
           // $('#cont-header').addClass('sticky');  
        } else {  
            $('#cont-header').removeClass('sticky');   
        }  
    };  

    stickyNav();  

    $(window).scroll(function() {  
        stickyNav();  
    });  
}); 

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}