$("document").ready(function() { 
    //wysokosci okien
    var wysokoscHeader = $("header").height();  
    $("main").css("top", wysokoscHeader);
    var wysokoscOkna = $(window).height();
    var wysokoscEnter = wysokoscOkna - wysokoscHeader;
    $(".welcome").css("height", wysokoscEnter);
    $(".photo").css("height", wysokoscEnter);

    //scrollowanie
    $(".homeBtn").click(function() {
        $('html,body').animate({
            scrollTop: $(".top").offset().top},
            'slow');
    });

    $(".menuBtn").click(function() {
        $('html,body').animate({
            scrollTop: $("#tabs").offset().top},
            'slow');
    });

    $(".opinieBtn").click(function() {
        $('html,body').animate({
            scrollTop: $(".opinie").offset().top},
            'slow');
    });

    $(".kontaktBtn").click(function() {
        $('html,body').animate({
            scrollTop: $("footer").offset().top},
            'slow');
    });

    $(".buttonMenu").click(function() {
        $('html,body').animate({
            scrollTop: $("#tabs").offset().top},
            'slow');
    });

    //szerokosci przyciskow jedzenia
    var widthFoodBtn = $(".aFoodBtn").width();
    $(".foodBtn").css("width", widthFoodBtn);

    
});


