(function($) {
	"use strict";
	var HT = {}; // Khai báo là 1 đối tượng
	var timer;
	var $carousel = $(".owl-slide");
	var _token = $('meta[name="csrf-token"]').attr('content');

	HT.swiperOption = (setting) => {
		// console.log(setting);
		let option = {}
		if(setting.animation.length){
			option.effect = setting.animation;
		}	
		if(setting.arrow === 'accept'){
			option.navigation = {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			}
		}
		if(setting.autoplay === 'accept'){
			option.autoplay = {
			    delay: 2000,
			    disableOnInteraction: false,
			}
		}
		if(setting.navigate === 'dots'){
			option.pagination = {
				el: '.swiper-pagination',
			}
		}
		return option
	}
	
	/* MAIN VARIABLE */
	// HT.swiper = () => {
	// 	if($('.panel-slide').length){
	// 		let setting = JSON.parse($('.panel-slide').attr('data-setting'))
	// 		let option = HT.swiperOption(setting)
	// 		var swiper = new Swiper(".panel-slide .swiper-container", option);
	// 	}
		
	// }

	HT.carousel = () => {
		$carousel.each(function(){
			let _this = $(this);
			let option = _this.find('.owl-carousel').attr('data-owl');
			let owlInit = atob(option);
			owlInit = JSON.parse(owlInit);
			_this.find('.owl-carousel').owlCarousel(owlInit);
		});
		
	} 

	HT.bestSeller = () => {
		var swiper = new Swiper(".panel-besterseller .swiper-container", {
			loop: false,
			pagination: {
				el: '.swiper-pagination',
			},
			spaceBetween: 20,
			slidesPerView: 1,
			breakpoints: {
				415: {
					slidesPerView: 1,
				},
				500: {
				  slidesPerView: 2,
				},
				768: {
				  slidesPerView: 3,
				},
				1280: {
					slidesPerView: 5,
				}
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			
		});
		
	}

	HT.swiperCategory = () => {
		var swiper = new Swiper(".panel-category .swiper-container", {
			loop: false,
			pagination: {
				el: '.swiper-pagination',
			},
			spaceBetween: 20,
			slidesPerView: 3,
			breakpoints: {
				415: {
					slidesPerView: 3,
				},
				500: {
				  slidesPerView: 3,
				},
				768: {
				  slidesPerView: 6,
				},
				1280: {
					slidesPerView: 10,
				}
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			
		});
	}

	HT.swiperBrand = () => {
		var swiper = new Swiper(".panel-brand .swiper-container", {
			loop: false,
			pagination: {
				el: '.swiper-pagination',
			},
			autoplay : {
			    delay: 1500,
			    disableOnInteraction: false,
			},
			slidesPerView: 5,
			breakpoints: {
				350: {
					slidesPerView: 2,
				},
				500: {
				  slidesPerView: 3,
				},
				768: {
				  slidesPerView: 6,
				},
				1280: {
					slidesPerView: 5,
				}
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			
		});
	}


	
	HT.swiperProject = () => {
		var swiper = new Swiper(".panel-project .swiper-container", {
			loop: false,
			pagination: {
				el: '.swiper-pagination',
			},
			autoplay : {
				delay: 1500,
			    disableOnInteraction: false,
			},
			spaceBetween: 20,
			slidesPerView: 1,
			breakpoints: {
				415: {
					slidesPerView: 1,
				},
				500: {
				  slidesPerView: 1,
				},
				768: {
				  slidesPerView: 1,
				},
				1280: {
					slidesPerView: 3,
				}
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			
		});
	}

	HT.swiperBestSeller = () => {
		var swiper = new Swiper(".panel-best-seller-product .swiper-container", {
			loop: true,
			pagination: {
				el: '.swiper-pagination',
			},
			autoplay : {
			    delay: 1500,
			    disableOnInteraction: false,
			},
			spaceBetween: 20,
			slidesPerView: 5,
			breakpoints: {
				300:{
					slidesPerView: 2,
				},
				500: {
				  slidesPerView: 2,
				},
				768: {
				  slidesPerView: 2,
				},
				1280: {
					slidesPerView: 4,
				}
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			
		});
	}
	
	HT.wow = () => {
		var wow = new WOW(
			{
			  boxClass:     'wow',      // animated element css class (default is wow)
			  animateClass: 'animated', // animation css class (default is animated)
			  offset:       0,          // distance to the element when triggering the animation (default is 0)
			  mobile:       true,       // trigger animations on mobile devices (default is true)
			  live:         true,       // act on asynchronously loaded content (default is true)
			  callback:     function(box) {
				// the callback is fired every time an animation is started
				// the argument that is passed in is the DOM node being animated
			  },
			  scrollContainer: null,    // optional scroll container selector, otherwise use window,
			  resetAnimation: true,     // reset animation on end (default is true)
			}
		  );
		  wow.init();


	}// arrow function

	HT.niceSelect = () => {
		if($('.nice-select').length){
			$('.nice-select').niceSelect();
		}
		
	}

	HT.select2 = () => {
		if($('.setupSelect2').length){
			$('.setupSelect2').select2();
		}
		
	}

	HT.openPreviewVideo = () => {
		$('.choose-video').on('click', function(e){
			e.preventDefault()
			let _this = $(this)
			let option = {
				id: _this.attr('data-id')
			}
			$.ajax({
				url: 'ajax/post/video', 
				type: 'GET', 
				data: option, 
				dataType: 'json', 
				beforeSend: function() {
					
				},
				success: function(res) {
					$('.video-preview .video-play').html(res.html)
					$('.video-preview video').attr('autoplay', 'autoplay');
					$('.video-preview iframe').attr('src', function (i, val) {
						return val + (val.indexOf('?') !== -1 ? '&' : '?') + 'autoplay=1';
					});
				},
			});

		})
	}

	HT.loadDistribution = () => {
		$(document).on('click', '.agency-item', function(){
			let _this = $(this)

			$('.agency-item').removeClass('active')
			_this.addClass('active')

			$.ajax({
				url: 'ajax/distribution/getMap', 
				type: 'GET', 
				data: {
					id: _this.attr('data-id')
				}, 
				dataType: 'json', 
				success: function(res) {
					$('.agency-map').html(res)
				},
			});

		})
	}


	HT.activeWarranty = () => {
		$('.active-warranty').on('click', function(e){
			e.preventDefault()

			let _this = $(this)
			let option = {
				product_id: _this.attr('data-product-id'),
				construct_id: _this.attr('data-construction-id'),
				warranty: _this.attr('data-warranty'),
				_token: _token
			}
			let parentRow = _this.closest('tr');
			

			$.ajax({
				url: 'customer/warranty/active', 
				type: 'POST', 
				data: option, 
				dataType: 'json', 
				success: function(res) {

					let startDate = new Date(res.startDate);
					let endDate = new Date(res.endDate)
					let formattedStartDate = new Intl.DateTimeFormat('en-GB', { day: 'numeric', month: 'numeric', year: 'numeric' }).format(startDate);
					let formattedEndDate = new Intl.DateTimeFormat('en-GB', { day: 'numeric', month: 'numeric', year: 'numeric' }).format(endDate);
					
					console.log(formattedStartDate, formattedEndDate);
					if(res.flag === true){

						alert('Kích hoạt bảo hành thành công')
						parentRow.find('td.startDate').text(formattedStartDate);
						parentRow.find('td.endDate').text(formattedEndDate);


						
						_this.parent().html('').text('Đã kích hoạt')

						
					}
				},
			});


		})
	}

	HT.showAgencyInformation = () => {

		$('.showAgency').click(function(e){

			e.preventDefault()

			let _this = $(this)
			let agency = _this.attr('data-agency')
			agency = JSON.parse(agency)

			let field = ['name', 'email', 'phone', 'address', 'code']

			field.forEach(function(fieldName) {

				$('.popup-agency-' + fieldName).html(agency[fieldName])
			});


			var modal = UIkit.modal("#agency-popup");
				if ( modal.isActive() ) {
					modal.hide();
				} else {
					modal.show();
				}
		})


	}

	HT.showContact = () => {
		let isShown = false;
	
		$(document).on('click', '.bottom-support-online', function(){
			if (isShown) {
				$(this).removeClass('show');
				isShown = false;
			} else {
				$(this).addClass('show');
				isShown = true;
			}
		});
	};

	
    HT.swiperThumbs = () => {
		var swiper = new Swiper(".popup .swiper-container", {
			// effect: "coverflow",
			loop: true,
			autoplay: {
			    delay: 2000,
			    disableOnInteraction: false,
			},
			pagination: {
				el: '.swiper-pagination',
			},

			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			thumbs: {
				swiper: {
					el: '.swiper-container-thumbs',
					// slidesPerView: 5,
					spaceBetween: 10,
					// centeredSlides: true,
					slideToClickedSlide: true,
					breakpoints: {
						768: {
							slidesPerView: 5,
						},
						500: {
							slidesPerView: 2,
						}
					}
				}
			}
		});
	}

	HT.addHeight = () => {
		$(document).ready(function() {
			adjustHeight();
	
			function adjustHeight() {
				let block1Height = $('.panel-product-category .uk-list').height();
				let block2 = $('.popup .swiper-slide .image');
				let block2Height = block2.height();
				block2.height(block1Height);
			}
		});
	}
	

	$(document).ready(function(){
		HT.addHeight()
		HT.swiperThumbs()
		HT.swiperBrand()
		HT.showContact()
		HT.wow()
		HT.swiperCategory()
		HT.swiperBestSeller()
		// HT.swiperIntro()
		HT.bestSeller()
		HT.swiperProject()
		
		/* CORE JS */
		// HT.swiper()
		HT.niceSelect()		
		HT.carousel()

		HT.select2()

		HT.loadDistribution()

		HT.openPreviewVideo()

		HT.activeWarranty()

		HT.showAgencyInformation()
	});

})(jQuery);



addCommas = (nStr) => { 
    nStr = String(nStr);
    nStr = nStr.replace(/\./gi, "");
    let str ='';
    for (let i = nStr.length; i > 0; i -= 3){
        let a = ( (i-3) < 0 ) ? 0 : (i-3);
        str= nStr.slice(a,i) + '.' + str;
    }
    str= str.slice(0,str.length-1);
    return str;
}