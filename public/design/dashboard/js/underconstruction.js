$(function() {
    "use strict";

    var winh = $(window).height();

    // adjust slider height 
    $('.slider, .carousel-item, #main').height(winh);
    $('.title-image-knowledge ,.title-image-learning,.title-image-e-learning').height(winh + 20);


    $(function(){
    $(".text").typed({
      strings: ["<h3>this page is now <marker> under construction</marker> , thank you for trusting <marker> EMES</marker></h3>"],
      typeSpeed : 0,
      loop:false,
      cursorChar:'_',
      startDelay: 300,
    })
  });
})