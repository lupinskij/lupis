jQuery(window).load(function(){

}); // Window Load


jQuery(document).ready(function(){
	

    // Logo Animation
    $('#site-logo').hover(
       function(){ $(this).addClass('floating') },
       function(){ $(this).removeClass('floating') }
    );

	// Navigation Hover
    $('.top-bar li')
        .mouseover(function () {
            $(this).siblings().css({
                opacity: 0.65
            })
        })
        .mouseout(function () {
            $(this).siblings().css({
                opacity: 1
            })
        });  


}); // Document Ready