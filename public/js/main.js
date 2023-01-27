(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();


    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.sticky-top').addClass('shadow-sm').css('top', '0px');
        } else {
            $('.sticky-top').removeClass('shadow-sm').css('top', '-100px');
        }
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Date and time picker
    $('.date').datetimepicker({
        format: 'L'
    });
    $('.time').datetimepicker({
        format: 'LT'
    });


    // Header carousel
    $(".header-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        loop: true,
        nav: false,
        dots: true,
        items: 1,
        dotsData: true,
    });


    // Testimonials carousel
    $('.testimonial-carousel').owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        loop: true,
        nav: false,
        dots: true,
        items: 1,
        dotsData: true,
    });





})(jQuery);


function selectPriceName() {
    var service_type = document.getElementById("service_type");
    var price_type = document.getElementById("price_type");

    if(service_type.value =="cart"){
        return price_type.setAttribute('name', 'selling_price');

    }else{
        return price_type.setAttribute('name', 'price');
    }
}

// rating section


let _rating = 0; // [0..5]
const setRating = (num) => {
  _rating = num || 0;
};

// For example: out of 5 existing reviews, the average is 3.2
let avg = 0;
let count = 5.0;

// Round a floating point number to n decimal places.
const rounded = (f, n = 2) => {
  let i = 0;
  if (n > 0) {
    i = Math.round(f * Math.pow(10, n));
    return i / Math.pow(10, n);
  }
  return f;
};

const getAvg = () => {
  if (avg + _rating) {
    if (_rating === 0) return 1.0 * avg;
    if (avg === 0) return 1.0 * _rating;
    return rounded((count * avg + 1.0 * _rating) / (1 + count));
  }
  return "(unrated)";
};
const getRate = () => {
  if (_rating) {
    return _rating * 1.0;
  }
  return 0;
};

const updateDOM = () => {
  document.querySelector("span.avg").innerHTML = getAvg();
  document.querySelector("span.rate").innerHTML = getRate();
  document.getElementById("ratingNum").value = getRate();
};

$(function () {
  // onload
  updateDOM();
});





const stars = document.querySelectorAll(".star");

$(".star").on("click", function (e) {
  stars.forEach((star, i) => {
    if (star === e.currentTarget) {
      setRating(i + 1);
      // $('#game_rating').addClass('rated');
      if ($(".star.rated").length) {
        $(".star.rated").removeClass("rated");
      }
      e.currentTarget.classList.add("rated");
      $(".stars").addClass("rated");
      updateDOM();
    }
  });
});

$("#clear").click(function () {
  setRating(0);
  $(".rated").removeClass("rated");
  updateDOM();
});












