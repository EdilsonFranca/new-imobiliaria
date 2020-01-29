$(function() {
    var o = $(".formulario");
    $(window).scroll(function() {
        $(this).scrollTop() > 30 ? o.addClass("formulario-fixo") : o.removeClass("formulario-fixo")
    })
});
 