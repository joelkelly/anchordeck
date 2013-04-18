// Cycle Built in

$(function(){

    $(".email").emailAddressMunging();

    $('.drop-click').click(function(){
        $(this).toggleClass('dropped').next().toggle();
    })
});
