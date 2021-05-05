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
            scrollTop: $(".categories").offset().top},
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
            scrollTop: $(".categories").offset().top},
            'slow');
    });

    $(".pizzaBtn").click(function() {
        $('html,body').animate({
            scrollTop: $(".categories").offset().top},
            'slow');
    });

    $(".zupaBtn").click(function() {
        $('html,body').animate({
            scrollTop: $(".zupa").offset().top},
            'slow');
    });

    $(".susziBtn").click(function() {
        $('html,body').animate({
            scrollTop: $(".suszi").offset().top},
            'slow');
    });

    $(".pierogiBtn").click(function() {
        $('html,body').animate({
            scrollTop: $(".pierogi").offset().top},
            'slow');
    });

    $(".inneBtn").click(function() {
        $('html,body').animate({
            scrollTop: $(".inne").offset().top},
            'slow');
    });



    
});


