$(window).load(function() {
    $('.startBtn').click();
});

$("document").ready(function () {
    //wysokosci okien
    var wysokoscHeader = $("header").height();
    $("main").css("top", wysokoscHeader);
    var wysokoscOkna = $(window).height();
    var wysokoscEnter = wysokoscOkna - wysokoscHeader;
    $(".welcome").css("height", wysokoscEnter);
    $(".photo").css("height", wysokoscEnter);

    var wysokoscOpinie = $(".opinie").height();
    $(".opinieBackground").css("height", wysokoscOpinie);

    var wysokoscDane = $(".dane").height();
    wysokoscDane = wysokoscDane + $(".copy").height();
    $(".daneBackground").css("height", wysokoscDane);

    


    //scrollowanie
    $(".homeBtn").click(function () {
        $('html,body').animate({
            scrollTop: $(".top").offset().top
        },
            'slow');
    });

    $(".menuBtn").click(function () {
        $('html,body').animate({
            scrollTop: $("#tabs").offset().top
        },
            'slow');
    });

    $(".opinieBtn").click(function () {
        $('html,body').animate({
            scrollTop: $(".opinie").offset().top
        },
            'slow');
    });

    $(".kontaktBtn").click(function () {
        $('html,body').animate({
            scrollTop: $("footer").offset().top
        },
            'slow');
    });

    $(".buttonMenu").click(function () {
        $('html,body').animate({
            scrollTop: $("#tabs").offset().top
        },
            'slow');
    });

    //szerokosci przyciskow jedzenia
    var widthFoodBtn = $(".aFoodBtn").width();
    $(".foodBtn").css("width", widthFoodBtn);

    var positionsInCart = $('.inCart').length;
    $('.countCart').append(positionsInCart);



    //opinie slider
    $("#slideshow > div:gt(0)").hide();
    setInterval(function() { 
        $('#slideshow > div:first')
        .fadeOut(1000)
        .next()
        .fadeIn(1000)
        .end()
        .appendTo('#slideshow');
    }, 3000);


});

//koszyk
$('#cartButton').click(function(){
    $('#cartModal').modal('show');
});

// Tabbed Menu
function openMenu(evt, menuName) {
    var i, x, tablinks;
    x = document.getElementsByClassName("menu");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
    }
    document.getElementById(menuName).style.display = "block";
    evt.currentTarget.firstElementChild.className += " w3-red";
}
document.getElementById("myLink").click();


//dodaj do koszyka tu ma byc, ale narazie jest wyciagniecie menu_ID z diva gdzie jest przycisk
function addToCart(obj) {
    // var siblingB = $(obj).siblings("b");
    // var danieID = siblingB.eq(0).children("span");
    // danieID.css("color", "red");
    var log = obj.parentElement.outerHTML;
    log = Array.from(log);
    for (var i = 0; i < 29; i++) {
        log.shift();
    }

    var a = log[0];
    var b = log[1];
    var c = log[2];
    var d = log[3];
    var valueStr;

    if(b == '.'){
        valueStr = a;
    }
    else if(c == '.'){
        valueStr = a + b;
    }
    else if(d == '.'){
        valueStr = a + b + c;
    }
    var value = parseInt(valueStr);
    alert("Type: " + typeof(value) + "\nmenu_ID: " + value);
}
