$(document).ready(function () {
  $(window).on("scroll", function () {
    if ($(window).scrollTop() > 100) {
      $(".header").height(70);
      $(".navbar").height(70);
      $(".brand-logo").width(140);
    }
    else {
      $(".header").height(100);
      $(".navbar").height(100);
      $(".brand-logo").width(180);
    }
  });

  // make it as accordion for smaller screens
  if ($(window).width() < 992) {
    $('.dropdown-menu a').click(function (e) {
      e.preventDefault();
      if ($(this).next('.submenu').length) {
        $(this).next('.submenu').toggle();
      }
      $('.dropdown').on('hide.bs.dropdown', function () {
        $(this).find('.submenu').hide();
      })
    });
  }
});

// Prevent closing from click inside dropdown
$(document).on('click', '.dropdown-menu', function (e) {
  e.stopPropagation();
});

