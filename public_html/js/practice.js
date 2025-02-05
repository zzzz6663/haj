let count1 = $(".gal-but.borderr");
let gal = $(".gal-1").eq(count1.index()).find(".gallery__img").length;
$(".gal-1").find(".count").text(gal);

$(" #gallery__list .gallery__item").click(function () {
  let el = $(this);

  el.slideDown(200);
  $(".gal-1").slideUp(200);
  $(".gal-1").eq(el.index()).slideDown(200);
  $(".gallery__item").find(".gal-but").removeClass("borderr");
  el.find(".gal-but").addClass("borderr");

  let count = $(".gal-1").eq(el.index()).find(".gallery__img").length;
  $(".gal-1").find(".count").text(count);
});

$(".svg").click(function () {
  let svg = $(this);
  let dad = svg.closest(".col-lg-4");
  dad.slideUp(300, function () {
    dad.remove();
  });
  let parent = svg.closest(".gal-1");
  let count3 = parent.find(".gallery__image").length - 1;
  parent.find(".count").text(count3);
  // let count2 = $(".gal-but.borderr").closest(".gallery__item")
  // let img = $('.gal-1').eq(count2.index()).find(".gallery__img").length
  // $(".gal-1").find(".count").text(img)
});
$(".owl-carousel .owl-nav button").on("click", function () {
  console.log(5); // بررسی کلیک
  $(".owl-carousel .owl-nav button").removeClass("active");
  $(this).addClass("active");
});

$("#my-menu").mmenu({
  extensions: ["theme-dark", "pagedim-black"],
  offCanvas: {
    position: "left",
  },
});
$(document).ready(function () {
  $(".slider1").owlCarousel({
    margin: 20,
    nav: true,
    dots: true,
    rtl: true,
    loop:true,
      autoplay:true,
        autoplayTimeout:2000,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 3,
      },
    },
  });
  $(".slider2").owlCarousel({
    dots: true,
    rtl: true,
    loop:true,
      autoplay:true,
        autoplayTimeout:2000,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        nav: false,
      },
      600: {
        items: 1,
        nav: false,
      },
      1000: {
        items: 4,
        nav: true,
        loop: false,
      },
    },
  });
  $(".slider3").owlCarousel({
    dots: true,
    rtl: true,
    loop:true,
      autoplay:true,
        autoplayTimeout:2000,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        nav: true,
      },
      600: {
        items: 1,
        nav: true,
      },
      1000: {
        items: 1,
        nav: true,
        loop: false,
      },
    },
  });
});
