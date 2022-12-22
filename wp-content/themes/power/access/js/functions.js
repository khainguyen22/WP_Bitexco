jQuery(document).ready(function ($) {

	$(document).on('click', '.nav-item-icon-search', function () {

		$('.nav-item-icon-search').addClass("is-active");

		$('.navbar').addClass("nav-is-active");

		$(".search").addClass("is-active");

		$(".close-button").addClass("is-active");

		$('.burger').removeClass("is-active");

		$(".menu-main-container").removeClass("is-active");

	});

	$(document).on('click', '.nav-item-icon-search.is-active', function () {

		$('.nav-item-icon-search').removeClass("is-active");

		$(".search").removeClass("is-active");

		$('.navbar').removeClass("nav-is-active");

		$(".close-button").removeClass("is-active");

	});

	$(document).on('click', '.menu-item', function () {

		$('.nav-item-icon-search').removeClass("is-active");

		$(".search").removeClass("is-active");

		$('.navbar').removeClass("nav-is-active");

		$(".close-button").removeClass("is-active");

	});



	// home slider

	$('.home-slide-carousel').slick({

		nextArrow: '<i class="fas fa-chevron-right slick-next"></i>',

		prevArrow: '<i class="fas fa-chevron-left slick-prev"></i>',

		autoplay: false,

		autoplaySpeed: 2000,

		dots: true,

		vertical: true,

		arrows: false,

		infinite: false,

		loop: false,

		speed: 500,

		cssEase: 'linear',

		slidesToShow: 1,

		slidesToScroll: 1,

	});

	// $('.home-slide-carousel').on('wheel', (function (e) {

	// 	e.preventDefault();

	// 	if (e.originalEvent.deltaY > 0) {

	// 		// $(this).slick('slickNext');

	// 	} else {

	// 		$(this).slick('slickPrev');

	// 	}

	// }));



	$(document).on('click', '.burger', function () {

		$('.burger').addClass("is-active");

		$('.navbar').addClass("nav-is-active");

		$(".menu-main-container").addClass("is-active");

		$('.menu-image').addClass("is-active");

		$('.main-menu-primary').addClass("is-active");

		$('.sub-menu').addClass("is-active");

		$('.nav-item-icon-search').removeClass("is-active");

		$(".search").removeClass("is-active");

		$(".close-button").removeClass("is-active");

	});

	$(document).on('click', '.burger.is-active', function () {

		$('.burger').removeClass("is-active");

		$(".menu-main-container").removeClass("is-active");

		$('.navbar').removeClass("nav-is-active");



		$('.menu-image').removeClass("is-active");

		$('.main-menu-primary').removeClass("is-active");

		$('.sub-menu').removeClass("is-active");

	});

	$(document).on('click', '.menu-item', function () {

		$('.burger').removeClass("is-active");

		$(".menu-main-container").removeClass("is-active");

		$('.navbar').removeClass("nav-is-active");



		$('.menu-image').removeClass("is-active");

		$('.main-menu-primary').removeClass("is-active");

		$('.sub-menu').removeClass("is-active");

	});





	$('.slide-img').on('click', function () {

		$('.slide-img').removeClass('active');

		$(this).addClass('active');

	});



	var includes = $('[data-include]')

	$.each(includes, function () {

		var file = '/components/' + $(this).data('include') + '.html'

		$(this).load(file)

	});





	$('.slider-cards').slick({

		nextArrow: '<i class="fa fa-chevron-right slick-next"></i>',

		prevArrow: '<i class="fa fa-chevron-left slick-prev"></i>',

		autoplaySpeed: 2500,

		arrows: true,

		infinite: true,

		speed: 500,

		cssEase: 'linear',

		slidesToShow: 3,

		slidesToScroll: 1,

		responsive: [

			{

				breakpoint: 1100,

				settings: {

					slidesToShow: 2,

					arrows: true,

				}

			},

			{

				breakpoint: 768,

				settings: {

					slidesToShow: 1,

					arrows: false,

					slidesToScroll: 1,



				}

			},

		]

	});

});







jQuery(document).ready(function () {

	jQuery(".gallery").lightSlider(

		{

			gallery: true,

			item: 1,

			loop: true,

			thumbItem: 10,

			thumbMargin: 12,

			share: true,

			download: true,

			zoom: true,

			autoplayControls: true,

			autoplay: true,

			videojs: true,

			controls: true,

			responsive: [

				{

					breakpoint: 767,

					settings: {

						thumbItem: 5,

						thumbMargin: 6,

					}

				},

			]

		});

});



jQuery(document).ready(function () {

	jQuery("#imageGallery").lightSlider(

		{

			gallery: true,

			item: 1,

			loop: true,

			thumbItem: 6,

			slideMargin: 10,

			enableDrag: true,

			currentPagerPosition: 'left',

			videojs: true,

			pager: true,

			onSliderLoad: function (el) {

				el.lightGallery({

					selector: '#imageGallery .lslide'

				});

			}

		});

});

