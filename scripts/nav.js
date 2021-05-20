$(document).ready(function(){       
   var scroll_start = 0;
   var startchange = $('#myCarousel');
   var offset = startchange.offset();
    if (startchange.length){
   $(document).scroll(function() { 
      scroll_start = $(this).scrollTop();
      if(scroll_start > offset.top) {
          $(".navbar-header").css('background-color', 'white');
       } else {
          $('.navbar-header').css('background-color', 'transparent');
       }
   });
    }
});