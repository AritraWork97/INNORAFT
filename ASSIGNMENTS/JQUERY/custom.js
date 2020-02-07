$( document ).ready(function() {
   $(".button-1").click(() => {
    $('.height').stop().animate({ height: 300, opacity: 1 }, 'slow');
   });

   $(".button-2").click(() => {
    $('.height-2').stop().animate({ marginLeft: 400 }, 'slow');
   });

   var fixmeTop = $('.full').offset().top;
   $(window).scroll(() => {
       var currentScroll = $(window).scrollTop();
       if (currentScroll >= 700) {
           $('.full').css({
               position: 'fixed',
               top: '0',
               left: '0',
               width: '100%'
           });
       }  
       if(currentScroll >= 900 || currentScroll < fixmeTop){
           $('.full').css({
               position: 'static'
           });
       }
   });

   $(".para-btn").click(() => {
        $('.para-2').wrap("<div class='new'></div>");
   });

   $(".btn-change-value").click(() => {
       $('#test3').val("new value");
       $('#test3').prop('disabled', 'true');
   })

   $(".change-background").click(() => {
       var ele = $(".section6").find("p");
       for(const [key, value] of Object.entries(ele)){
           if($(value).hasClass("intro") == false) {
               $(value).css("background-color", "red");
               break;
           }
       }
   });

   $(".change-color").click(() => {
    var ele = $(".section7").find("li");
    for(const [key, value] of Object.entries(ele)){
        if(($(value).text()) == 4 || ($(value).text()) == 5 || ($(value).text()) == 6){
            $(value).css("background-color", "red");
        }
      }
    });

    $(".change-color-1").click(() => {
        var ele = $(".abc").find("li");
        for(const [key, value] of Object.entries(ele)){
            if(($(value).text()) != 1){
                $(value).css("border-color", "red");
            }
          }
        });

    $(".tab-1").click(() => {
        $(".tab-1-a").html("Tab 1 value is changed")
        $(".tab-1-a").css("background-color", "coral")
    });

    $(".tab-2").click(() => {

        $(".tab-1-a").html("Tab 2 value is changed")
        $(".tab-1-a").css("background-color", "lightblue")
    })

    $('#scroll').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    }); 

});