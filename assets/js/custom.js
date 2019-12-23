var mySwiper = new Swiper(".mn-scrn .swiper-container", {
	loop: true,
	autoplay: {
		delay: 3000
	}
});

//burger
$(".nav__bgr").on("click", function() {
	$(".menu-mbl").toggleClass("menu--actv");
	$(this).toggleClass("bgr--actv");
});

$(window).on("resize", function() {
	let width = $(window).width();
	if (width >= 996) {
		$(".nav__bgr").css("display", "none");
	} else {
		$(".nav__bgr").css("display", "block");
		$(this).toggleClass("bgr--actv");
	}
});

// Submenu
$(".nav-list>li>.nav__link").click(function(e) {
  e.preventDefault();
  $(this).toggleClass("active");
	var item = $(this).closest("li");
  var sub = item.find(".nav-list-scnd");
	sub.toggleClass("active");

	
  if($(".nav-list-scnd").not(sub).hasClass('active')) {
    $(".nav-list-scnd").not(sub).removeClass("active");
    $(".nav-list>li>.nav__link")
			.not($(this))
			.removeClass("active");
	}


	
	
});


$(document).click(function (e) {
	if ($(e.target).closest('.nav-list').length === 0) {
		$('.nav-list-scnd').removeClass("active");
	}
});
