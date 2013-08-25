jQuery(window).load(function(){

}); //Window Load


jQuery(document).ready(function(){
	

	//Navigation Hover
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


}); //Document Ready