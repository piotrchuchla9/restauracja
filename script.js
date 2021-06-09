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

//zmiana ilosci w koszyku
function increaseValue() {
    var ilosc = "<?php echo $ilosc ?>";
    alert(ilosc);
    var value = parseInt(document.getElementById(ilosc).value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById(ilosc).value = value;
  }
  
  function decreaseValue() {
    var ilosc = "<?php echo $ilosc ?>";
    var value = parseInt(document.getElementById(ilosc).value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    document.getElementById(ilosc).value = value;
  }
