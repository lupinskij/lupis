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

  // Responsive Menu
  $('body').addClass('js');
  var $menu = $('#menu'),
    $menulink = $('.menu-link');

  $menulink.click(function() {
    $menulink.toggleClass('active');
    $menu.toggleClass('active');
    return false;
  });

  // Link in portfolio piece
  $('.port-thumbnail .link').click(function() {
    var url = $(this).data('url');
    window.open(url, '_blank');
    return false;
  });

}); // Document Ready