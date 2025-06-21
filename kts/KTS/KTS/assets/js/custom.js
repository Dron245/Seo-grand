$(document).on("click", "#products .card-td", function () {
	var header = $(this).attr("data-header").toString();
	var cat_image = $(this).attr("data-image").toString();
	var desk = $(this).attr("data-desk");
	var name = $(this).attr("data-name");
	var phone = $(this).attr("data-phone");
	var email = $(this).attr("data-email");
	var btn = $(this).attr("data-btn");
	var src = $(this).attr("data-src");
	var commonForm = $(src);
	commonForm.find('input[name="name1"]').next().text(name);
	commonForm.find('input[name="phone"]').next().text(phone);
	commonForm.find('input[name="e-mail"]').next().text(email);
	commonForm.find(".popup-product-content .header").text(header);
	commonForm.find(".form-desk").text(desk);
	commonForm.find("button span").text(btn);
	commonForm.find("img").attr('src',cat_image);

	commonForm.find('.form_block input[name="formid"]').val(header);
});


$(document).on("click", ".nlk-cat .card-td", function () {
	var header = $(this).attr("data-header").toString();
	var cat_image = $(this).attr("data-image").toString();
	$('#popup-product').find(".popup-product-content .header").text(header);
	$('#popup-product').find("img").attr('src',cat_image);
	$('#popup-product').find('.form_block input[name="formid"]').val(header);
});

$(document).on("click", ".item-popup", function () {
	var header = $(this).attr("data-header").toString();
	var cat_image = $(this).attr("data-image").toString();
	$('#popup-product').find(".popup-product-content .header").text(header);
	$('#popup-product').find("img").attr('src',cat_image);
	$('#popup-product').find('.form_block input[name="formid"]').val(header);
});


$(document).on("click", ".gear", function () {
	$(this).parent().parent('.card-tr').toggleClass('item-open');
	e.preventDefault();
});


let words = document.querySelectorAll("#team .name");
words.forEach((item) => {
	let matches =
		item.textContent.trim().split(" ").slice(0, 1).join("") +
		"<br>" +
		item.textContent.trim().split(" ").slice(1).join(" ");
	item.innerHTML = matches;
});

$(".logos-row-slider").slick({
	infinite: false,
	slidesToShow: 4,
	slidesToScroll: 1,
	rows: 2,
	arrows: true,
	prevArrow:'<button type="button" class="slick-arrow slick-arr-prev">'+sliderBtnLeft+'</button>',
	nextArrow:'<button type="button" class="slick-arrow slick-arr-next">'+sliderBtnRight+'</button>',
	responsive: [
		{
			breakpoint: 1022,
			settings: {
				slidesToShow: 3,
			},
		},
		{
			breakpoint: 767,
			settings: {
				rows: 1,
				slidesToShow: 2,
			},
		},
		{
			breakpoint: 374,
			settings: {
				rows: 1,
				slidesToShow: 1,
			},
		},
	],
});

$(".reviews__slider").slick({
	infinite: false,
	slidesToShow: 5,
	slidesToScroll: 1,
	arrows: true,
	prevArrow:'<button type="button" class="slick-arrow slick-arr-prev">'+sliderBtnLeft+'</button>',
	nextArrow:'<button type="button" class="slick-arrow slick-arr-next">'+sliderBtnRight+'</button>',
	responsive: [
		{
			breakpoint: 1022,
			settings: {
				slidesToShow: 3,
			},
		},
		{
			breakpoint: 767,
			settings: {
				rows: 1,
				slidesToShow: 2,
			},
		},
		{
			breakpoint: 374,
			settings: {
				rows: 1,
				slidesToShow: 1,
			},
		},
	],
});

$(".projects-gallery-slider").slick({
	infinite: false,
	slidesToShow: 3,
	slidesToScroll: 1,
	arrows: true,
	prevArrow:'<button type="button" class="slick-arrow slick-arr-prev">'+sliderBtnLeft+'</button>',
	nextArrow:'<button type="button" class="slick-arrow slick-arr-next">'+sliderBtnRight+'</button>',
	responsive: [
		{
			breakpoint: 1022,
			settings: {
				slidesToShow: 3,
			},
		},
		{
			breakpoint: 767,
			settings: {
				rows: 1,
				slidesToShow: 2,
			},
		},
		{
			breakpoint: 374,
			settings: {
				rows: 1,
				slidesToShow: 1,
			},
		},
	],
});

// const dateContent = document.querySelector(".date");

// let options = {
// 	year: "numeric",
// 	month: "numeric",
// 	day: "numeric",
// 	timezone: "UTC",
// };
// dateContent.textContent = new Date().toLocaleString("ru", options);

// console.log($("[data-fancybox]"));
// $("[data-fancybox]").fancybox({
// 	padding: 0,
// 	afterShow: function () {
// 		console.log(1);
// 	},
// });
$(function () {
	$("[data-fancybox]").fancybox({
		afterShow: function () {
			document.querySelector(".fancybox-image").addEventListener("click", function () {
				parent.$.fancybox.close();
			});
		},
	});
});

if (window.innerWidth <= 1279 && window.innerWidth >= 600) {
	let headerNav = $("#header-wrapper #menu");
	let scrollPrev = 0;
	$(window).scroll(function () {
		let scrolled = $(window).scrollTop();

		if (scrolled > 200) {
			if (scrolled > scrollPrev) {
				headerNav.addClass("fixed"); // hide
			}
		} else {
			headerNav.removeClass("fixed"); // show
		}
		scrollPrev = scrolled;
	});
} else if (window.innerWidth <= 600) {
	let headerNav = $("#header-wrapper #menu");
	//   headerNav.style.display = "none";
}

if (window.innerWidth <= 1023) {
	const linkBtn = document.querySelector(".filter__inner--btn");
	linkBtn.addEventListener("click", function (e) {
		e.preventDefault();
		const filter = document.querySelectorAll("#filterbar");
		filter.forEach(function (item) {
			item.classList.toggle("active");
			item.parentElement.classList.toggle("active");

			const items = item.querySelectorAll(".filter_element");
			items.forEach(function (element) {
				element.classList.add("active");
			});
			if (item.classList.contains("active")) {
				linkBtn.textContent = "Скрыть всё";
			} else {
				linkBtn.textContent = "Показать всё";

				document.querySelector("#header .logo").scrollIntoView({
					block: "nearest",
					behavior: "smooth",
				});
			}
		});
	});

	// const $button = document.querySelector(".btn__next");
	// const $buttonPrev = document.querySelector(".btn__prev");
	// const $title = document.querySelector(".quiz__inner .title p");

	// // При клике на кнопку

	// $buttonPrev.addEventListener("click", (e) => {
	// 	$title.scrollIntoView({
	// 		block: "nearest", // к ближайшей границе экрана
	// 		behavior: "smooth", // и плавно
	// 	});
	// });
}

if (window.innerWidth <= 1180) {
	$(".reviews__slider").slick({
		infinite: false,
		slidesToShow: 3,
		slidesToScroll: 1,
		arrows: true,
		responsive: [
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
				},
			},
			{
				breakpoint: 389,
				settings: {
					slidesToShow: 1,
				},
			},
		],
	});
}


// document.ondragstart = prohibit; //запрещаем перетаскивание
// document.onselectstart = prohibit; //запрещаем выделение
// // document.oncontextmenu = prohibit; //запрещаем клик правой кнопкой
// function prohibit() {
// 	return false; //предотвращает все эти события
// }



document.querySelector('body').addEventListener("copy", function(evt){
    if(evt.target.nodeName === "A" && (evt.target.href.indexOf("mailto:") === 0 || evt.target.href.indexOf("tel:") === 0)) return;

    // Change the copied text if you want
    evt.clipboardData.setData("text/plain", "Copying is not allowed on this webpage");

    // Prevent the default copy action
    evt.preventDefault();
}, false);