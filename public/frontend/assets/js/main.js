// on document ready
$(document).ready(function () {
  // show/hide the mobile menu based on class added to container
  $(".menu-icon").click(function () {
    $(this).parent().toggleClass("is-tapped");
    $("#hamburger").toggleClass("open");
  });

  // handle touch device events on drop down, first tap adds class, second navigates
  $(".touch .sitenavigation li.nav-dropdown > a").on("touchend", function (e) {
    if ($(".menu-icon").is(":hidden")) {
      var parent = $(this).parent();
      $(this).find(".clicked").removeClass("clicked");
      if (parent.hasClass("clicked")) {
        window.location.href = $(this).attr("href");
      } else {
        $(this).addClass("linkclicked");

        // close other open menus at this level
        $(this).parent().parent().find(".clicked").removeClass("clicked");

        parent.addClass("clicked");
        e.preventDefault();
      }
    }
  });

  // handle the expansion of mobile menu drop down nesting
  $(".sitenavigation li.nav-dropdown").click(function (event) {
    if (event.stopPropagation) {
      event.stopPropagation();
    } else {
      event.cancelBubble = true;
    }

    if ($(".menu-icon").is(":visible")) {
      $(this).find("> ul").toggle();
      $(this).toggleClass("expanded");
    }
  });

  // prevent links for propagating click/tap events that may trigger hiding/unhiding
  $(".sitenavigation a.nav-dropdown, .sitenavigation li.nav-dropdown a").click(
    function (event) {
      if (event.stopPropagation) {
        event.stopPropagation();
      } else {
        event.cancelBubble = true;
      }
    }
  );

  // javascript fade in and out of dropdown menu
  $(".no-touch .sitenavigation li").hover(
    function () {
      if (!$(".menu-icon").is(":visible")) {
        $(this).find("> ul").fadeIn(100);
      }
    },
    function () {
      if (!$(".menu-icon").is(":visible")) {
        $(this).find("> ul").fadeOut(100);
      }
    }
  );
});
// back to top
window.onscroll = () => {
  toggleTopButton();
};
function scrollToTop() {
  window.scrollTo({ top: 0, behavior: "smooth" });
}
function toggleTopButton() {
  if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
    document.getElementById("back-to-up").classList.remove("d-none");
  } else {
    document.getElementById("back-to-up").classList.add("d-none");
  }
}
// back to top end

var swiper = new Swiper(".teamSwiper", {
  slidesPerView: 1,
  spaceBetween: 60,
  loop: true,
  speed: 2000,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  breakpoints: {
    640: {
      slidesPerView: 1,
      spaceBetween: 50,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 50,
    },
    1024: {
      slidesPerView: 2,
      spaceBetween: 40,
    },
    1200: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
  },
});

var swiper = new Swiper(".testi", {
  slidesPerView: 1,
  spaceBetween: 40,
  centeredSlides: true,
  loop: true,
  speed: 2000,
  grabCursor: true,
  autoplay: {
    delay: 8000,
    disableOnInteraction: false,
  },
  breakpoints: {
    768: {
      slidesPerView: 2,
      spaceBetween: 40,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 40,
    },
  },
});

var swiper = new Swiper(".logos", {
  slidesPerView: 1,
  spaceBetween: 10,
  loop: true,
  autoplay: true,
  centeredSlides: true,
  observer: true,
  speed: 2500,
  mousewheelControl: true,
  keyboardControl: true,
  slidesPerView: "auto",
  allowTouchMove: true,
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 4,
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 5,
      spaceBetween: 20,
    },
  },
});

$('.logos').on('mouseenter', function (e) {
  swiper.autoplay.stop();
});
$('.logos').on('mouseleave', function (e) {
  swiper.autoplay.start();
});




var swiper = new Swiper(".counterimages", {
  slidesPerView: 1,
  spaceBetween: 10,
  loop: true,
  autoplay: true,

   autoplay: {
    delay: 1000,
    pauseOnMouseEnter: true,
  },

  centeredSlides: false,
  observer: true,
  speed: 1000,
  mousewheelControl: true,
  keyboardControl: true,
  slidesPerView: "auto",
  allowTouchMove: true,
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
  },
});

$('.counterimages').on('mouseenter', function (e) {
  swiper.autoplay.stop();
});
$('.counterimages').on('mouseleave', function (e) {
  swiper.autoplay.start();
});


var swiper = new Swiper(".jobsdemand", {
  slidesPerView: 1,
  spaceBetween: 10,
  loop: true,

  autoplay: {
    delay: 500,
    pauseOnMouseEnter: true,
  },

  centeredSlides: false,
  observer: true,
  speed: 1000,
  mousewheelControl: true,
  keyboardControl: true,
  slidesPerView: "auto",
  allowTouchMove: true,
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
  },
});

$('.jobsdemand').on('mouseenter', function (e) {
  swiper.autoplay.stop();
});
$('.jobsdemand').on('mouseleave', function (e) {
  swiper.autoplay.start();
});


