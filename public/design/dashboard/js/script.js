$(document).ready(function(){

  // function for changs nav bar 
"use strict";
var prevscrollpos = window.pageYOffset,

    winh = $(window).height();
  
  window.onscroll = function() {
  
  var currentScrollpos = window.pageYOffset;
  
  if(prevscrollpos > currentScrollpos) {
  
    document.getElementById("navbar").style.top = "0";  
  }else{
  
    document.getElementById("navbar").style.top = "-100px";
  
  }

  prevscrollpos = currentScrollpos;
  
}
  

// adding background for the nav bar

$(window).on('scroll',function(){
  if($(window).scrollTop()){
    $('nav').addClass("black");
  }else{
    $('nav').removeClass("black");
  }
})

// full device responsive slider 
$(function() {
    "use strict";

    // adjust slider height 
    $('.slider, .carousel-item, #main,.contries').height(winh);
    $('.title-image-knowledge,.title-image-about,.title-image-electricalsystem-cad,.title-image-currentsystem-cad,.title-image-firefighting-cad ,.title-image-plumbing-cad,.title-image-learning,.title-image-e-learning, .title-image-estim-budg,.title-image-rol-plan-pack,.title-image-plan-pack').height(winh + 20);
})
 

  // responsive nav bar 
  
  $(".menu-btn").click(function(){
    
  })
  
  // hover from main links to get the sub links and it's data 

  $(".know-learn").mouseenter(function(){
    $(".knowledge-learning-links").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });

  $("#know").mouseenter(function(){
    $(".knowledge-description").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });

  
  $("#elear").mouseenter(function(){
    $(".elearning-description").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });


  $(".management").mouseenter(function(){
    $(".management-links").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });

  $("#estimation").mouseenter(function(){
    $(".manage-est-budg-description").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });

  $("#planning").mouseenter(function(){
    $(".manage-plan-pack-description").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });
  

  $("#man-rol").mouseenter(function(){
    $(".manage-rol-wave-description").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });


  $("#man-monitor").mouseenter(function(){
    $(".manage-monitor-control-description").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });

  
  $("#man-custom").mouseenter(function(){
    $(".manage-ready-forms-description").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });

  
  $("#man-rep").mouseenter(function(){
    $(".manage-report-forms-description").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });




  $(".mep").mouseenter(function(){
    $(".mep-links").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });

  
  $("#mep-hvac").mouseenter(function(){
    $(".mep-hvac-description").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });

  
  $("#mep-plumb").mouseenter(function(){
    $(".mep-plumbing-description").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });

  
  $("#mep-fire").mouseenter(function(){
    $(".mep-fire-description").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });

  
  $("#mep-elect").mouseenter(function(){
    $(".mep-electrical-description").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });

  
  $("#mep-low-current").mouseenter(function(){
    $(".mep-low-current-description").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });

  
  $("#mep-boq").mouseenter(function(){
    $(".mep-boq-description").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });

  
  $("#mep-outline").mouseenter(function(){
    $(".mep-outline-description").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });



  $(".arch").mouseenter(function(){
    $(".architecture-links").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });

  $("#arch-interior").mouseenter(function(){
    $(".arch-interior-description").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });

  $("#arch-urban").mouseenter(function(){
    $(".arch-urban-description").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });

  $("#arch-exterior").mouseenter(function(){
    $(".arch-exterior-description").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });

  $("#arch-boq").mouseenter(function(){
    $(".arch-boq-description").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });

  $("#arch-outline").mouseenter(function(){
    $(".arch--outline-description").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });

  
  $(".struc").mouseenter(function(){
    $(".structure-links").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });

  
  $("#struc-interior").mouseenter(function(){
    $(".struc-interion-description").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });
  
  $("#struc-boq").mouseenter(function(){
    $(".struc-boq-description").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });

  $("#struc-outline").mouseenter(function(){
    $(".struc-outlinedescription").css("display", "inline-block").siblings().not("h5").css("display", "none")
  });

  $(".tail").mouseenter(function(){
    $(".signature i").addClass("animated heartBeat")
  });
  $(".tail").mouseleave(function(){
    $(".signature i").removeClass("animated heartBeat")
  });

  $(".define-container-know").mouseenter(function(){
    $(".define-container-know").typed({
      strings: ["<p>KNOWLEDGE SERVICE To succeed, to move forward, your GOAL is to engage in LEARNING, not just knowledge.<br> EMES Provide <marker>free downloadable files</marker> , to acquire information, skills and facts. <br> <marker> Contact us </marker> to ask uploading removed files or to suggest subject.</p>"],
      typeSpeed : -100
    })
  });
  
  $(".define-container-learn").mouseenter(function(){
    $(".define-container-learn").typed({
      strings: ["<p>Let your learning lead to action, by changing your behavior.EMES Provide <marker>downloadable files ( payable or free ) </marker> to learn how to practice acquired information and skills.<br> <marker>Contact us </marker> to ask uploading removed files or to suggest subject.</p>"],
      typeSpeed : -100
    })
  });

  $(".define-container-e-learn").mouseenter(function(){
    $(".define-container-e-learn").typed({
      strings: ["<p> EMES provide you with online or face to face course you can get <br> <marker> free charge certificate </marker>, or a <marker> discount </marker> for more than one course, we guarantee your money back under any circumstances if you don't get your service </p>"],
      typeSpeed : -100
    })
  });


// pop up sign in 


$("#logIn").click(function(){
  $(".signin").css("visibility","visible"),
  $(".login").fadeIn();
})


$("#go-for-sign-up").click(function(){
  $(".login").fadeOut(),
  $(".signup").fadeIn();
})

$("#signUp").click(function(){
  $(".signin").css("visibility","visible"),
  $(".signup").fadeIn();
})


$("#go-to-log-in").click(function(){
  $(".signup").fadeOut(),
  $(".login").fadeIn();
})



$(".xxx").click(function(){
  $(".signin").fadeOut(),
  $(".login").fadeOut(),
  $(".signup").fadeOut();
  
})

  });
 


