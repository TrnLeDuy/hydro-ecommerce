// init
(function ($) {

	"use strict";

	//Hide Loading Box (Preloader)
	function handlePreloader() {
		if ($('.loader-wrap').length) {
			$('.loader-wrap').delay(1000).fadeOut(500);
		}
	}

	if ($(".preloader-close").length) {
		$(".preloader-close").on("click", function () {
			$('.loader-wrap').delay(200).fadeOut(500);
		})
	}

	//Update Header Style and Scroll to Top
	function headerStyle() {
		if ($('.main-header').length) {
			var windowpos = $(window).scrollTop();
			var siteHeader = $('.main-header');
			var scrollLink = $('.scroll-top');
			if (windowpos >= 110) {
				siteHeader.addClass('fixed-header');
				scrollLink.addClass('open');
			} else {
				siteHeader.removeClass('fixed-header');
				scrollLink.removeClass('open');
			}
		}
	}

	headerStyle();


	//Submenu Dropdown Toggle
	if ($('.main-header li.dropdown ul').length) {
		$('.main-header .navigation li.dropdown').append('<div class="dropdown-btn"><span class="fas fa-angle-down"></span></div>');

	}

	//Mobile Nav Hide Show
	if ($('.mobile-menu').length) {

		$('.mobile-menu .menu-box').mCustomScrollbar();

		var mobileMenuContent = $('.main-header .menu-area .main-menu').html();
		$('.mobile-menu .menu-box .menu-outer').append(mobileMenuContent);
		$('.sticky-header .main-menu').append(mobileMenuContent);

		//Dropdown Button
		$('.mobile-menu li.dropdown .dropdown-btn').on('click', function () {
			$(this).toggleClass('open');
			$(this).prev('ul').slideToggle(500);
		});
		//Dropdown Button
		$('.mobile-menu li.dropdown .dropdown-btn').on('click', function () {
			$(this).prev('.megamenu').slideToggle(900);
		});
		//Menu Toggle Btn
		$('.mobile-nav-toggler').on('click', function () {
			$('body').addClass('mobile-menu-visible');
		});

		//Menu Toggle Btn
		$('.mobile-menu .menu-backdrop,.mobile-menu .close-btn').on('click', function () {
			$('body').removeClass('mobile-menu-visible');
		});
	}


	// Scroll to a Specific Div
	if ($('.scroll-to-target').length) {
		$(".scroll-to-target").on('click', function () {
			var target = $(this).attr('data-target');
			// animate
			$('html, body').animate({
				scrollTop: $(target).offset().top
			}, 1000);

		});
	}

	// Elements Animation
	if ($('.wow').length) {
		var wow = new WOW({
			mobile: false
		});
		wow.init();
	}

	//Contact Form Validation
	if ($('#contact-form').length) {
		$('#contact-form').validate({
			rules: {
				username: {
					required: true
				},
				email: {
					required: true,
					email: true
				},
				phone: {
					required: true
				},
				subject: {
					required: true
				},
				message: {
					required: true
				}
			}
		});
	}

	//Fact Counter + Text Count
	if ($('.count-box').length) {
		$('.count-box').appear(function () {

			var $t = $(this),
				n = $t.find(".count-text").attr("data-stop"),
				r = parseInt($t.find(".count-text").attr("data-speed"), 10);

			if (!$t.hasClass("counted")) {
				$t.addClass("counted");
				$({
					countNum: $t.find(".count-text").text()
				}).animate({
					countNum: n
				}, {
					duration: r,
					easing: "linear",
					step: function () {
						$t.find(".count-text").text(Math.floor(this.countNum));
					},
					complete: function () {
						$t.find(".count-text").text(this.countNum);
					}
				});
			}

		}, { accY: 0 });
	}


	//LightBox / Fancybox
	if ($('.lightbox-image').length) {
		$('.lightbox-image').fancybox({
			openEffect: 'fade',
			closeEffect: 'fade',
			helpers: {
				media: {}
			}
		});
	}


	//Tabs Box
	if ($('.tabs-box').length) {
		$('.tabs-box .tab-buttons .tab-btn').on('click', function (e) {
			e.preventDefault();
			var target = $($(this).attr('data-tab'));

			if ($(target).is(':visible')) {
				return false;
			} else {
				target.parents('.tabs-box').find('.tab-buttons').find('.tab-btn').removeClass('active-btn');
				$(this).addClass('active-btn');
				target.parents('.tabs-box').find('.tabs-content').find('.tab').fadeOut(0);
				target.parents('.tabs-box').find('.tabs-content').find('.tab').removeClass('active-tab');
				$(target).fadeIn(300);
				$(target).addClass('active-tab');
			}
		});
	}


	//Pricing Tabs
	if ($('.pricing-tabs').length) {
		$('.pricing-tabs .tab-btns .tab-btn').on('click', function (e) {
			e.preventDefault();
			var target = $($(this).attr('data-tab'));

			if ($(target).hasClass('actve-tab')) {
				return false;
			} else {
				$('.pricing-tabs .tab-btns .tab-btn').removeClass('active-btn');
				$(this).addClass('active-btn');
				$('.pricing-tabs .pr-content .pr-tab').removeClass('active-tab');
				$(target).addClass('active-tab');
			}
		});
	}



	//Accordion Box
	if ($('.accordion-box').length) {
		$(".accordion-box").on('click', '.acc-btn', function () {

			var outerBox = $(this).parents('.accordion-box');
			var target = $(this).parents('.accordion');

			if ($(this).hasClass('active') !== true) {
				$(outerBox).find('.accordion .acc-btn').removeClass('active');
			}

			if ($(this).next('.acc-content').is(':visible')) {
				return false;
			} else {
				$(this).addClass('active');
				$(outerBox).children('.accordion').removeClass('active-block');
				$(outerBox).find('.accordion').children('.acc-content').slideUp(300);
				target.addClass('active-block');
				$(this).next('.acc-content').slideDown(300);
			}
		});
	}


	// banner-carousel
	if ($('.banner-carousel').length) {
		$('.banner-carousel').owlCarousel({
			loop: true,
			margin: 0,
			nav: true,
			animateOut: 'fadeOut',
			animateIn: 'fadeIn',
			active: true,
			smartSpeed: 1000,
			autoplay: 6000,
			navText: ['<span class="far fa-long-arrow-left"></span>', '<span class="far fa-long-arrow-right"></span>'],
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 1
				},
				800: {
					items: 1
				},
				1024: {
					items: 1
				}
			}
		});
	}


	//two-column-carousel
	if ($('.two-column-carousel').length) {
		$('.two-column-carousel').owlCarousel({
			loop: true,
			margin: 30,
			nav: true,
			smartSpeed: 1000,
			autoplay: 500,
			navText: ['<span class="fas fa-algle-left"></span>', '<span class="fas fa-algle-left-right"></span>'],
			responsive: {
				0: {
					items: 1
				},
				480: {
					items: 1
				},
				600: {
					items: 1
				},
				800: {
					items: 2
				},
				1024: {
					items: 2
				}
			}
		});
	}


	//three-item-carousel
	if ($('.three-item-carousel').length) {
		$('.three-item-carousel').owlCarousel({
			loop: true,
			margin: 30,
			nav: true,
			smartSpeed: 1000,
			autoplay: 500,
			navText: ['<span class="far fa-long-arrow-alt-left"></span>', '<span class="far fa-long-arrow-alt-right"></span>'],
			responsive: {
				0: {
					items: 1
				},
				480: {
					items: 1
				},
				600: {
					items: 2
				},
				800: {
					items: 2
				},
				1024: {
					items: 3
				}
			}
		});
	}


	// Four Item Carousel
	if ($('.four-item-carousel').length) {
		$('.four-item-carousel').owlCarousel({
			loop: true,
			margin: 30,
			nav: true,
			smartSpeed: 500,
			autoplay: 5000,
			navText: ['<span class="fas fa-angle-left"></span>', '<span class="fas fa-angle-right"></span>'],
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 2
				},
				800: {
					items: 2
				},
				1024: {
					items: 3
				},
				1200: {
					items: 4
				}
			}
		});
	}


	// single-item-carousel
	if ($('.single-item-carousel').length) {
		$('.single-item-carousel').owlCarousel({
			loop: true,
			margin: 30,
			nav: false,
			smartSpeed: 500,
			autoplay: 1000,
			navText: ['<span class="icon-Left-Arrow"></span>', '<span class="icon-Right-Arrow"></span>'],
			responsive: {
				0: {
					items: 1
				},
				480: {
					items: 1
				},
				600: {
					items: 1
				},
				800: {
					items: 1
				},
				1200: {
					items: 1
				}

			}
		});
	}


	// clients-carousel
	if ($('.clients-carousel').length) {
		$('.clients-carousel').owlCarousel({
			loop: true,
			margin: 30,
			nav: false,
			smartSpeed: 3000,
			autoplay: true,
			navText: ['<span class="fas fa-angle-left"></span>', '<span class="fas fa-angle-right"></span>'],
			responsive: {
				0: {
					items: 1
				},
				480: {
					items: 2
				},
				600: {
					items: 3
				},
				800: {
					items: 4
				},
				1200: {
					items: 5
				}

			}
		});
	}


	//Add One Page nav
	if ($('.scroll-nav').length) {
		$('.scroll-nav').onePageNav();
	}

	//Sortable Masonary with Filters
	function enableMasonry() {
		if ($('.sortable-masonry').length) {

			var winDow = $(window);
			// Needed variables
			var $container = $('.sortable-masonry .items-container');
			var $filter = $('.filter-btns');

			$container.isotope({
				filter: '*',
				masonry: {
					columnWidth: '.masonry-item.small-column'
				},
				animationOptions: {
					duration: 500,
					easing: 'linear'
				}
			});


			// Isotope Filter 
			$filter.find('li').on('click', function () {
				var selector = $(this).attr('data-filter');

				try {
					$container.isotope({
						filter: selector,
						animationOptions: {
							duration: 500,
							easing: 'linear',
							queue: false
						}
					});
				} catch (err) {

				}
				return false;
			});


			winDow.on('resize', function () {
				var selector = $filter.find('li.active').attr('data-filter');

				$container.isotope({
					filter: selector,
					animationOptions: {
						duration: 500,
						easing: 'linear',
						queue: false
					}
				});
			});


			var filterItemA = $('.filter-btns li');

			filterItemA.on('click', function () {
				var $this = $(this);
				if (!$this.hasClass('active')) {
					filterItemA.removeClass('active');
					$this.addClass('active');
				}
			});
		}
	}

	enableMasonry();


	//Price Range Slider
	if ($('.price-range-slider').length) {
		$(".price-range-slider").slider({
			range: true,
			min: 120,
			max: 500,
			values: [120, 300],
			slide: function (event, ui) {
				$("input.property-amount").val(ui.values[0] + " - " + ui.values[1]);
			}
		});

		$("input.property-amount").val($(".price-range-slider").slider("values", 0) + " - $" + $(".price-range-slider").slider("values", 1));
	}


	// Progress Bar
	if ($('.count-bar').length) {
		$('.count-bar').appear(function () {
			var el = $(this);
			var percent = el.data('percent');
			$(el).css('width', percent).addClass('counted');
		}, { accY: -50 });

	}


	// page direction
	function directionswitch() {
		if ($('.page_direction').length) {

			$('.direction_switch button').on('click', function () {
				$('body').toggleClass(function () {
					return $(this).is('.rtl, .ltr') ? 'rtl ltr' : 'rtl';
				})
			});
		};
	}


	//nice select
	$(document).ready(function () {
		$('select:not(.ignore)').niceSelect();
	});


	//Jquery Spinner / Quantity Spinner
	if ($('.quantity-spinner').length) {
		$("input.quantity-spinner").TouchSpin({
			verticalbuttons: true
		});
	}



	/*	=========================================================================
	When document is Scrollig, do
	========================================================================== */

	jQuery(document).on('ready', function () {
		(function ($) {
			// add your functions
			directionswitch();
		})(jQuery);
	});



	/* ==========================================================================
   When document is Scrollig, do
   ========================================================================== */

	$(window).on('scroll', function () {
		headerStyle();
	});



	/* ==========================================================================
   When document is loaded, do
   ========================================================================== */

	$(window).on('load', function () {
		handlePreloader();
		enableMasonry();
	});



})(window.jQuery);

$(document).ready(function () {
	$(".btn-copy-link-aff").click(function () {
		const data = $(this).data('product-url');
		const dataMessage = $(this).data('copy-link-message');
		if (data !== undefined) {
			var $temp = $("<input>");
			$("body").append($temp);
			$temp.val(data).select();
			document.execCommand("copy");
			$temp.remove();
			toastr.success(dataMessage)
		}
	});
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$("#form_checkout").validate({
		submitHandler: function (form) {
			$.ajax({
				url: form.action,
				type: form.method,
				data: $(form).serialize(),
				cache: false,
				processData: false,
				beforeSend: function (xhr) {
					$('body').addClass('loading');
				},
				success: function (response) {
					$('body').removeClass('loading');
					if (response.error == true) {
						toastr.error(response.message)
					} else {
						document.location.href = response.url;
					}
				}
			});
			return false;
		}
	});
	// $('.btn-add-to-cart').click(function () {
	//   const productId = $(this).data('product-id')
	//   $.ajax({
	//     method: "POST",
	//     url: apiAddToCart,
	//     data: { productId },
	//     beforeSend: function (xhr) {
	//       $('body').addClass('loading');
	//     }
	//   })
	//     .done(function (response) {
	//       $('body').removeClass('loading');
	//       if (response.error == true) {
	//         toastr.error(response.message)
	//       } else {
	//         toastr.success(response.message)
	//       }
	//     });
	// })
	$('.func-minus').on('click', function (e) {
		e.preventDefault();
		var input = $(this).closest('.quantity').find('input');
		var value = parseInt(input.val());
		if (value > 1) {
			value = value - 1;
		} else {
			value = 0;
		}
		input.val(value);
	})
	$('.func-plus').on('click', function (e) {
		e.preventDefault();
		var input = $(this).closest('.quantity').find('input');
		var value = parseInt(input.val());
		value = value + 1;
		input.val(value);
	})
	$('.btn-add-to-cart').click(function () {
		const productId = $(this).data('product-id');
		const quantity = $('#product-quantity').val();

		if (quantity < 1 || !Number.isInteger(parseFloat(quantity))) {
            toastr.error('Số lượng sản phẩm phải là số nguyên và không thể nhỏ hơn 1.');
            return;
        }

		$.ajax({
			method: "POST",
			url: apiAddToCart,
			data: { productId, quantity },
			beforeSend: function (xhr) {
				$('body').addClass('loading');
			}
		})
			.done(function (response) {
				$('body').removeClass('loading');
				if (response.error == true) {
					toastr.error(response.message)
				} else {
					toastr.success(response.message)
				}
			})
	})
	$('.btn-add-to-cart-quick').click(function () {
		const productId = $(this).data('product-id');
		const quantity = $('#product-quantity').val();
		$.ajax({
			method: "POST",
			url: apiAddToCart,
			data: { productId, quantity },
			beforeSend: function (xhr) {
				$('body').addClass('loading');
			}
		})
			.done(function (response) {
				$('body').removeClass('loading');
				if (response.error == true) {
					toastr.error(response.message)
				} else {
					toastr.success(response.message)
				}
			})
	})
	function callfunc() {
		$(".func-plus").click(function () {
			const rowId = $(this).data('row-id');
			const num_frm = $('.box-number-' + rowId);
			const itemCart = $('.item-cart-' + rowId);
			const value_num = num_frm.val();
			if (value_num > 0) {
				const new_val = +value_num + 1;
				if (new_val > 0) {
					$.ajax({
						method: "POST",
						url: apiUpdateQty,
						data: { rowId, qty: new_val },
						beforeSend: function (xhr) {
							$('body').addClass('loading');
						}
					})
						.done(function (response) {
							num_frm.val(new_val);
							$('body').removeClass('loading');
							itemCart.find('.total-block .price').text(`${response.rowTotal} VND`);
							$(".box-info .sub-total.price span").text(`${response.subtotal} VND`);
							$(".box-info .total-payment.price span").text(`${response.total} VND`);
						});
				} else {
					return false;
				}
			}
		});

		$(".input-quantity-custom").change(function () {
			const rowId = $(this).data('row-id');
			const num_frm = $('.box-number-' + rowId);
			const itemCart = $('.item-cart-' + rowId);
			const new_val = num_frm.val();

			if (!Number.isInteger(parseFloat(new_val)) || new_val < 1) {
                toastr.error("Số lượng phải là số nguyên và không thể nhỏ hơn 1.");
                $(this).val(1);  // Reset to 1 if invalid
                return;
            }

			if (new_val > 0) {
				$.ajax({
					method: "POST",
					url: apiUpdateQty,
					data: { rowId, qty: new_val },
					beforeSend: function (xhr) {
						$('body').addClass('loading');
					}
				}).done(function (response) {
					$('body').removeClass('loading');
					itemCart.find('.total-block .price').text(`${response.rowTotal} VND`);
					$(".box-info .sub-total.price span").text(`${response.subtotal} VND`);
					$(".box-info .total-payment.price span").text(`${response.total} VND`);
				});
			} else {
				return false;
			}
		});

		$(".func-minus").click(function () {
			const rowId = $(this).data('row-id');
			const num_frm = $('.box-number-' + rowId);
			const itemCart = $('.item-cart-' + rowId);
			const value_num = num_frm.val();
			if (value_num > 0) {
				const new_val = +value_num - 1;
				if (new_val > 0) {
					$.ajax({
						method: "POST",
						url: apiUpdateQty,
						data: { rowId, qty: new_val },
						beforeSend: function (xhr) {
							$('body').addClass('loading');
						}
					}).done(function (response) {
						num_frm.val(new_val);
						$('body').removeClass('loading');
						itemCart.find('.total-block .price').text(`${response.rowTotal} VND`);
						$(".box-info .sub-total.price span").text(`${response.subtotal} VND`);
						$(".box-info .total-payment.price span").text(`${response.total} VND`);
					});
				} else {
					return false;
				}
			}
		});

		$('.btn-delete-item-cart').click(function () {
			const rowId = $(this).data('row-id');
			$.ajax({
				method: "POST",
				url: apiDeleteItem,
				data: { rowId },
				beforeSend: function (xhr) {
					$('body').addClass('loading');
				}
			})
				.done(function (response) {
					$('body').removeClass('loading');
					$('.item-cart-' + rowId).remove();

					// Check if the cart is now empty
					if ($('.item-cart').length === 0) {
						// If cart is empty, set subtotal and total to 0
						$(".box-info .sub-total.price span").text('0 VND');
						$(".box-info .total-payment.price span").text('0 VND');
					} else {
						// Otherwise, update the subtotal and total
						$(".box-info .sub-total.price span").text(`${response.subtotal} VND`);
						$(".box-info .total-payment.price span").text(`${response.total} VND`);
					}
				});
		});
	}
	callfunc()
	$('.copy-wrap').click(function (e) {
		const copyText = $(this).parents('.group-input-custom').find('input')
		copyText.select();
		document.execCommand("copy");
		$(this).children('div.copy-notify').css("display", "block")
		setTimeout(() => {
			$(this).children('div.copy-notify').css("display", "none")
		}, 3000);
	})
	$(".box-modal-verify-code .box-code input").jqueryPincodeAutotab();

	$('.nav-tabs a').on('shown.bs.tab', function (e) {
		window.location.hash = e.target.hash;
	})
	var hash = location.hash.replace(/^#/, '');
	if (hash) {
		$('.nav-tabs a[href="#' + hash + '"]').tab('show');
	}

	$('.togglePassword').click(function () {
		$(this).toggleClass("active");
		const input = $(this).parents('.input-group-password').find('input');
		if ($(this).hasClass("active")) {
			input.attr("type", "text");
		} else {
			input.attr("type", "password");
		}
	})
	changeMinheightMain();

})

window.addEventListener('resize', function (event) {
	changeMinheightMain();
}, true);

function changeMinheightMain() {
	const hFooter = $('footer').height();
	$('main').css('min-height', `calc(100vh - ${hFooter}px)`)
}

// Toggle drawer token detail
function toggleDrawerTokenDetail(e, visible) {
	e.preventDefault

	const container = document.getElementById("drawer_token_info")
	if (visible) {
		container.classList.add("show")
	} else {
		container.classList.remove("show")
	}
}
function copyToClipboard(element) {
	var input = element.previousElementSibling;
	input.select();
	document.execCommand('copy');
	var notify = element.querySelector(".copy-notify");
	notify.style.display = "block";
	setTimeout(function () {
		notify.style.display = "none";
	}, 2000);
}

document.querySelectorAll('.outside-border img').forEach((img) => {
	img.addEventListener('click', function () {
		const targetId = img.getAttribute('id');
		document.querySelectorAll('.comment p, .comment-id div').forEach((element) => {
			if (element.getAttribute('id') !== targetId) {
				element.style.display = 'none';
			} else {
				element.style.display = 'block';
			}
		});
	});
});
document.getElementById('form_checkout').addEventListener('submit', function (event) {
	if (!this.checkValidity()) {
		event.preventDefault();
		event.stopPropagation();
		return;
	}

	var placeOrderButton = document.querySelector('.place-order button');
	placeOrderButton.disabled = true;

	while (placeOrderButton.firstChild) {
		placeOrderButton.removeChild(placeOrderButton.firstChild);
	}

	var spinner = document.createElement('span');
	spinner.className = 'spinner-border spinner-border-sm';
	spinner.setAttribute('role', 'status');
	spinner.setAttribute('aria-hidden', 'true');

	placeOrderButton.appendChild(spinner);

	var text = document.createTextNode(' ...');
	placeOrderButton.appendChild(text);
});
