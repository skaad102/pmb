//ajustar al tamaño de la pantalla
$(window).ready(function () {
  if ($(window).width() <= 1080) {
    $("#main").css({ width: "100%" });
    $("#main").css({ float: "none" });
    $("#container").css({ width: "100%" });
    $(".bx-wrapper").css({ width: "100%" });
    $(".bx-window.p-4").css({ width: "100%" });
    $("#main_hors_footer").addClass("uk-padding-remove");
    $("body").css("font-size", "1rem");
  } else {
    $("#main").css({ width: "75%" });
    $("#container").css({ width: "90%" });
    $("#intro").css({ width: "90%" });
    $("#main").css({ float: "right" });
    $("#intro_bibli nav").css({ "margin-left": "35%" });
    $("#loginMod").css({ "font-size": "0.91rem" });
    $("#bandeau").css({ 'margin-top': '19rem' });
    $("#main_hors_footer").removeClass("uk-padding-remove");
    $('.uk-navbar-nav li a').css({'font-size':'1.25rem'})
    $("body").css("font-size", "0.80rem");
  }
});
