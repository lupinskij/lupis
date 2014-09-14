jQuery(document).ready(function(){

  // Link in portfolio piece
  jQuery('.port-thumbnail .link').click(function() {
    var url = jQuery(this).data('url');
    window.open(url, '_blank');
    return false;
  });

  jQuery(function() {
    jQuery('.lazy-img').imageloader();
  });

}); // Document Ready