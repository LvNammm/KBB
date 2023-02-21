$(document).ready(function() {
    $(".product-previous").hide();
    $("#logo-doc").show();
    $("#logo-ngang").hide();
    console.log("abd")
    $(window).scroll(function() {
        $("#logo-doc").hide();
        $("#logo-ngang").show();
        if ($("html").scrollTop() == 0) {
            $("#logo-doc").show();
            $("#logo-ngang").hide();
        }
    });

    $(".product-next").click(function() {
        console.log($(this).parent().children(".div-show-product"))
        $(this).parent().children(".product-previous").show()
        console.log("Nam");
        let scrolled = $(this).parent().children(".div-show-product").scroll() - 50;

        $(this).parent().children(".div-show-product").animate({
            scrollLeft: "+=300"
        }, "slow");
        let maxScrool = $(this).parent().children(".div-show-product").get(0).scrollWidth - $(this).parent().children(".div-show-product").get(0).clientWidth;
        console.log($(this).parent().children(".div-show-product").scrollLeft())
        if ($(this).parent().children(".div-show-product").scrollLeft() >= maxScrool - 60)
            $(this).parent().children(".product-next").hide()
    })


    $(".product-previous").click(function() {
        $(this).parent().children(".product-next").show()

        $(this).parent().children(".div-show-product").animate({
            scrollLeft: "-=300"
        }, "slow");
        if ($(this).parent().children(".div-show-product").scrollLeft() - 300 <= 0)
            $(this).parent().children(".product-previous").hide()
            // setTimeout(function() {
            //     console.log($(this).parent().children(".div-show-product").scrollLeft())
            //     if ($(this).parent().children(".div-show-product").scrollLeft() == 0) {
            //         $(".product-previous").hide();
            //     }
            // }, 600)
    })
});