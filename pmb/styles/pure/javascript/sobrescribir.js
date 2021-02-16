$(document).ready(() => {

  $("html").addClass("pure add-before");
  $(".row").addClass( () => {
    if ($(this).children().length > 0) {
      return "uk-clearfix";
    }
  });
  /* nabar
    ====================*/
  let finalUrl =
    "." + window.location.href.substring(window.location.href.lastIndexOf("/"));
  let selMenu = document.getElementById("menu");
  if (selMenu) {
    let selLinks = selMenu.querySelectorAll("a[href]");
    let selLink = selMenu.querySelector(
      'a[href="' + finalUrl + '"]'
    );
    if (!selLink) {
      selLinks = Array.prototype.slice.call(selLinks);
      selLinks.some(link => {
        if (
          link.href &&
          finalUrl.indexOf(link.getAttribute("href")) != -1
        ) {
          link.parentElement.classList.add("uk-active");
          return true;
        }
      });
    } else {
      selLink.parentElement.classList.add("uk-active");
    }
  }
  $("#navbar").addClass("uk-navbar-container uk-navbar-left");
  $("#navbar>ul").addClass("uk-navbar-nav");
  $("#extra").addClass("uk-iconnav");
  $("#extra2").addClass("uk-iconnav");

  /*
    Panel de notificación de navegación superior
    */
  $("a[title='Tableau de Bord']").addClass("dashboard");
  $("a[title='Tableau de Bord']").html(
    "<span uk-icon='icon: dashboard; ratio: 1'></span>"
  );
  $("#notification").append("<span uk-icon='icon: info; ratio: 1'></span>");

  /*
    Panel de notificación de navegación superior
    */
  $("#div_alert>*>ul").prepend("<span uk-icon='icon: info; ratio: 1'></span>");
  $("#div_alert>*>ul").addClass("alert-nav");
  $(".icon_history").html("<span uk-icon='icon: historywyr; ratio: 1'></span>");
  $(".icon_help").html("<span uk-icon='icon: question; ratio: 1'></span>");
  $(".icon_param").html("<span uk-icon='icon: cog; ratio: 1'></span>");
  $(".icon_opac").html("<i class='fa fa-globe' aria-hidden='true'></i>");
  $(".icon_sauv").html("<i class='fa fa-floppy-o' aria-hidden='true'></i>");
  $(".icon_quit").html("<span uk-icon='icon: quit; ratio: 1'></span>");

  /* navegación lateral
    ====================*/
  $("#menu>ul").addClass("uk-nav");
  $("#menu>ul>li").addClass("nav-item");
  $("#menu>ul>li>ul").addClass("uk-nav-sub");
  $("#menu>h3").prepend(
    "<span class='uk-margin-small-right uk-icon'><i class='fa fa-caret-down' aria-hidden='true'></i></span>"
  );
  $("#menu .uk-nav>li>a").prepend(
    "<span class='uk-margin-small-right uk-icon'><i class='fa fa-circle-o' aria-hidden='true'></i></span>"
  );

  /* Sticky part nav
    ====================*/
  if ($("#extra").length == 1) {
    let widthInitExtra = window.getComputedStyle(
      document.getElementById("extra")
    ).width;
    let divInitWidthExtra = document.createElement("div");
    divInitWidthExtra.setAttribute("style", "width:" + widthInitExtra);
    divInitWidthExtra.setAttribute("id", "initW");
    let extra = document.getElementById("extra");
    extra.insertBefore(divInitWidthExtra, extra.childNodes[0]);
    document
      .getElementById("navbar")
      .setAttribute("style", "padding-right:" + widthInitExtra);

    // event js 
    UIkit.sticky("#navbar", {
      top: 1,
      offset: 0,
      showOnUp: true,
      animation: "uk-animation-slide-top",
      
    });
    UIkit.sticky("#extra", {
      top: 1,
      offset: 0,
      showOnUp: true,
      widthElement: "#initW",
    });
  }

  /* tablas
    ====================*/
  $("#contenu>table").addClass("table-bkg");
  $("#contenu table").addClass(
    "uk-table uk-table-small uk-table-striped uk-table-middle"
  );
  $(".stat-child>table").addClass(
    "uk-table uk-table-small uk-table-striped uk-table-middle"
  );
  $("#cms_dragable_cadre").parents("table").addClass("ui-table-Xsmall");
  $("table a").parents("tr").attr({
    onmouseover: null,
    onmouseout: null,
  });
  $("table h3").parents("tr").addClass("actions-thead");

  /* div fix
    ====================*/
  var cells = document.getElementsByClassName("dom_cell2");
  var size = 0;
  for (var i = 0; i < cells.length; i++) {
    if (
      parseInt(window.getComputedStyle(cells[i]).height.replace("px", "")) >
      size
    ) {
      size = window.getComputedStyle(cells[i]).height.replace("px", "");
    }
  }
  var rows = document.getElementsByClassName("dom_row2");
  for (var i = 0; i < rows.length; i++) {
    rows[i].style.setProperty("height", size + "px");
  }

  /* home // tabs
    ====================*/
  $(".hmenu").addClass(() => {
    if ($(".hmenu").children().length === 0) return "empty-node";
  });
  $(".sel_navbar,#content_onglet_perio").addClass(
    "uk-tab uk-margin-remove-bottom"
  );
  $(".hmenu>span").addClass("uk-button wui-button uk-margin-remove-bottom");

  $(".hmenu .selected, .sel_navbar_current, .onglet-perio-selected").addClass(
    "uk-active"
  );

  /* titlulo
    ====================*/
  $("#contenu>h1,#contenu>.row>h1,#make_mul_sugg>h1,#import_sug>h1")
    .first()
    .addClass("section-title");
  $("#contenu>h1").not(".section-title").addClass("section-sub-title");
  $("#contenu>h1,#contenu>.row>h1,#make_mul_sugg>h1,#import_sug>h1")
    .first()
    .prepend(
      "<span class='uk-margin-small-right uk-icon'><i class='fa fa-circle' aria-hidden='true'></i></span>"
    );

  /* sub titu
    ====================*/
  $("div#contenu>h2").addClass("bkg-white section-sub-title article-title");
  $("div#contenu>.row>h2").addClass("section-sub-title article-title");
  $("#contenu>h1").not(".section-title").addClass("section-sub-title");
  $("#contenu>*>h3").addClass("h2-like section-sub-title");
  $("#contenu>h3").addClass("h2-like section-sub-title");

  /* auto-margin
    ====================*/
  let ukMarginMenu = $(".hmenu");
  UIkit.margin(ukMarginMenu, {
    margin: "uk-margin-small-top",
  });
  let ukMargin = $(".left").has("input");
  UIkit.margin(ukMargin, {
    margin: "uk-margin-small-top",
  });
  let ukMarginInput = $("tr[id^='relance_empr']>td").has("input");
  UIkit.margin(ukMarginInput, {
    margin: "uk-margin-small-top",
  });

  /*Dashboard
    ====================*/
  $("#dashboards>div").removeAttr("class");
  let dashboardgrid = $("#dashboards>div");
  UIkit.grid(dashboardgrid, {});
  $("#dashboards>div").addClass("uk-grid-medium uk-grid-match dashboards-grid");
  $(".dashboards-grid>div")
    .removeClass("colonne4")
    .addClass("uk-width-1-4@m uk-width-1-2@s");

  /* fin :D

    ====================*/
  $("body").addClass("pure ready");

  /* ready para visualizar el <body> */
});
