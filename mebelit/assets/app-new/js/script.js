$(document).ready(function(){
    //Банер в УСЛУГИ. Ставим фотку
    let xim_mebel = '/assets/app-new/img/uslugi/xim_mebel/banner.jpg';
    let pathname = ['/uborka-jaht-i-katerov/', '/uborka-posle-pozhara/', '/unichtozhenie-nasekomyh/', '/mojka-okon-i-fasadov/', '/uborka-pomeshhenij/', '/uborka-posle-remonta/', '/uborka-ofisov/', '/uborka-kottedzhej/',
                   '/uborka-kvartir/', '/himchistka-salona-avtomobilya/', '/ximchistka-kovrov/', '/ximchistka-divana-na-domu/'];
    let banner = document.getElementById('banner_uslugi');
    let h1 = document.getElementById('h1');
    if (banner) {let main_block = banner.parentElement;}
    let path = location.pathname;
    let position_photo = pathname.indexOf(path);
    let banner_btn = document.getElementById('banner_btn');

    if (banner != null && position_photo > 0 && pathname.includes(path)) {
        banner.style.backgroundImage = `url(/assets/images/banners/${position_photo}.jpg)`;
        banner_btn.style.display = 'block';
    } else if (banner != null) {
        banner.style.height = '0';
        banner.style.padding = '20px';
        banner.children[0].style.width = '100%';
    }
    if (screen.width < 420 ) {
        h1.style.width='100%';
        h1.style.textAlign='center';
        main_block.insertBefore(h1, banner);
    }

    //

    $('#otziv').submit(function( event ){
      event.preventDefault();
      var form = $(this);
      $("#send-otziv").attr('disabled', true);
      var data = form.serialize();
        var url = form.attr('action');
        $.ajax({
          type: 'POST',
          url: url,
          data: data,
          success: function(text){
          form.find('input:not(#send-otziv), textarea').each(function(){
                $(this).val('');
            });
             $("#send-otziv").attr('disabled', false);
             swal("Мы свяжемся с Вами с самое ближайшее время!");
             $('#myModal').modal('hide');
          },
          error: function(text) {
                alert(text);
          }
        });
    });

$('#question').submit(function( event ){
      event.preventDefault();
      var form = $(this);
      $("#send").attr('disabled', true);
      var data = form.serialize();
        var url = form.attr('action');
        $.ajax({
          type: 'POST',
          url: url,
          data: data,
          success: function(text){
          form.find('input:not(#send), textarea').each(function(){
                $(this).val('');
            });
             $("#send").attr('disabled', false);
             swal("Мы свяжемся с Вами с самое ближайшее время!");
             $('#myModal').modal('hide');
             $('#myModal2').modal('hide');
          },
          error: function() {
                alert("error");
          }
        });
    });

  $('#modal').submit(function( event ){
      event.preventDefault();
      var form = $(this);
      $("#send").attr('disabled', true);
      var data = form.serialize();
        var url = form.attr('action');
        $.ajax({
          type: 'POST',
          url: url,
          data: data,
          success: function(text){
          form.find('input:not(#send), textarea').each(function(){
                $(this).val('');
            });
            yaCounter23194984.reachGoal('online_order_main_page_send');
             $("#send").attr('disabled', false);
             swal("Мы свяжемся с Вами с самое ближайшее время!");
             $('#myModal').modal('hide');
          },
          error: function() {
                alert("error");
          }
        });
    });

  $('#director-f').submit(function( event ){
      event.preventDefault();
      var form = $(this);
      $("#send").attr('disabled', true);
      var data = form.serialize();
        var url = form.attr('action');
        $.ajax({
          type: 'POST',
          url: url,
          data: data,
          success: function(text){
            form.find('input:not(#send), textarea').each(function(){
                $(this).val('');
            });

            $("#send").attr('disabled', false);
            swal("Мы свяжемся с Вами с самое ближайшее время!");
            $('#director').modal('hide');
          },
          error: function() {
            alert("error");
          }
        });
    });

    $('#akcia_under').submit(function( event ){
      event.preventDefault();
      var form = $(this);
      $("#send").attr('disabled', true);
      var data = form.serialize();
        var url = form.attr('action');
        $.ajax({
          type: 'POST',
          url: url,
          data: data,
          success: function(text){
          form.find('input:not(#send), textarea').each(function(){
                $(this).val('');
            });
            yaCounter23194984.reachGoal('beneficial_offer_send');
             $("#send").attr('disabled', false);
             swal("Мы свяжемся с Вами с самое ближайшее время!");
             $('#myModal').modal('hide');
          },
          error: function() {
                alert("error");
          }
        });
    });

   $('#form-right').submit(function( event ){
      event.preventDefault();
      var form = $(this);
      $("#send").attr('disabled', true);
      var data = form.serialize();
        var url = form.attr('action');
        $.ajax({
          type: 'POST',
          url: url,
          data: data,
          success: function(text){
          form.find('input:not(#send), textarea').each(function(){
                $(this).val('');
            });
            ym(23194984,'reachGoal','forma-os');
             $("#send").attr('disabled', false);
             swal("Мы свяжемся с Вами с самое ближайшее время!");
             $('#myModal').modal('hide');
          },
          error: function() {
                alert("error");
          }
        });
    });

    //отправка контакты
    $('#contacty').submit(function( event ){
      event.preventDefault();
      var form = $("#contacty");
      $("#send_contact").attr('disabled', true);
      var data = form.serialize();
        var url = form.attr('action');
        $.ajax({
          type: 'POST',
          url: url,
          data: data,
          success: function(text){
          form.find('input:not(#send_contact), textarea').each(function(){
                $(this).val('');
            });
            yaCounter23194984.reachGoal('form_contacts_send');
             $("#send_contact").attr('disabled', false);
             swal("Мы свяжемся с Вами с самое ближайшее время!");
             $('#myModal').modal('hide');
           },
          error: function() {
                alert("error");
          }
        });
    });
    $('#forma_calc').submit(function( event ){
      event.preventDefault();
      var form = $("#forma_calc");
      $("#send_contact").attr('disabled', true);
      var data = form.serialize();
        var url = form.attr('action');
        $.ajax({
          type: 'POST',
          url: url,
          data: data,
          success: function(text){
          form.find('input:not(#send_contact), textarea').each(function(){
                $(this).val('');
            });
            yaCounter23194984.reachGoal('calculator_send');
             $("#send_contact").attr('disabled', false);
             swal("Мы свяжемся с Вами с самое ближайшее время!");
             $('#myModal').modal('hide');
           },
          error: function() {
                alert("error");
          }
        });
    });

	$('.sliderImages').owlCarousel({
	    items:1,
	    margin:0,
	    loop:true,
	    pagination: true,
	    mouseDrag:	false
	});
	$('.sliderPartners').owlCarousel({
	    items:1,
	    margin:10,
	    loop:true,
	    pagination: true,
	   	responsive:{
	        0:{
	            items:1
	        },
	        767:{
	    		items:1
	        }
	    }
	});
	$('.sliderSertifcts').owlCarousel({
      margin:0,
      pagination: true,
      responsive:{
          0:{
              items:1
          },
          767:{
          items:2
          }
      }
  });

  $('.staff-carousel').owlCarousel({
      nav: false,
      margin:10,
      pagination: true,
      responsive:{
          0:{
              items:1
          },
          320:{
          items:2
          },
          1000:{
            items:4
          }
      }
  });

  $('.equipment-carousel').owlCarousel({
	    margin:10,
	    pagination: true,
	    responsive:{
	        0:{
	            items:1
	        },
          480:{items:1},
	        768:{items:2},
          1000:{items:3}
	    }
	});

	var find = "header .control_block nav .navbar-collapse .controls .find";
	var findForm = find + " form ";
	$(findForm+"button, header .control_block nav .navbar-collapse .controls .find form span.icon-close").click(function(){
		toggleFind(find);
	});
	$(findForm + "input[type='text']").bind('focus',function(){
		$(find).addClass("open");
	});

});
function toggleFind(find){
	if ($(find).hasClass("open")){
		$(find).removeClass("open");
	}else{
		$(find).addClass("open");
		$(find + " form input[type='text']").focus();
	}
}



$(document).ready(function () {

    $('#bs-example-navbar-collapse-2').on('show.bs.collapse', function () {
        $('html,body').animate({
            scrollTop: $("[data-target=#bs-example-navbar-collapse-2]").offset().top},
        'slow');

    });

 $('.video-carousel').on('initialized.owl.carousel changed.owl.carousel', function(e) {
    if (!e.namespace) return
    var carousel = e.relatedTarget,
    curItem = carousel.relative(carousel.current()) + 1 ;
    $('#info-video').html('<span class="current">'+curItem+ '</span>/' + carousel.items().length)
  }).owlCarousel({
        loop: true,
        dots: false,
        margin: 10,
        responsiveClass: true,
        nav: false,
        navText: ['&#8249;','&#8250;'],
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 2,
                slideBy:2,
            }
        }
    });


});


$('a[href="#blank"]').one('shown.bs.tab', function (e) {

    $('.blank-carousel').on('initialized.owl.carousel changed.owl.carousel', function(e) {
      if (!e.namespace) return
      var carousel = e.relatedTarget,
      curItem = carousel.relative(carousel.current()) + 1 ;
      $('#info-blank').html('<span class="current">'+ curItem + '</span>/' + carousel.items().length)
    }).owlCarousel({
        loop: true,
        dots: false,
        margin: 10,
        nav: true,
        navText: ['&#8249;','&#8250;'],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 3,
            }
        }
    });

  var owl = $('.blank-carousel');
  owl.trigger('resized.owl.carousel');
});


function youtube (arg) {

    if (window.location.pathname == "/otzyvy/") {
        var frame_0 = '<iframe width="250" height="200" src="https://www.youtube.com/embed/dxLSiK07lZk?controls=2&autoplay=1" frameborder="0" allowfullscreen=""></iframe>';
        var frame_1 = '<iframe width="250" height="200" src="https://www.youtube.com/embed/eF-5L579HWE?controls=2&autoplay=1" frameborder="0" allowfullscreen=""></iframe>';
        var frame_2 = '<iframe width="250" height="200" src="https://www.youtube.com/embed/f65PyqJftRk?controls=2&autoplay=1" frameborder="0" allowfullscreen=""></iframe>';
        var frame_3 = '<iframe width="250" height="200" src="https://www.youtube.com/embed/joWAKKHASas?controls=2&autoplay=1" frameborder="0" allowfullscreen=""></iframe>';
    } else {
        var frame_0 = '<iframe width="420" height="315" src="https://www.youtube.com/embed/dxLSiK07lZk?controls=2&autoplay=1" frameborder="0" allowfullscreen=""></iframe>';
        var frame_1 = '<iframe width="420" height="315" src="https://www.youtube.com/embed/eF-5L579HWE?controls=2&autoplay=1" frameborder="0" allowfullscreen=""></iframe>';
        var frame_2 = '<iframe width="420" height="315" src="https://www.youtube.com/embed/f65PyqJftRk?controls=2&autoplay=1" frameborder="0" allowfullscreen=""></iframe>';
        var frame_3 = '<iframe width="420" height="315" src="https://www.youtube.com/embed/joWAKKHASas?controls=2&autoplay=1" frameborder="0" allowfullscreen=""></iframe>';
    }
    switch (arg){
        case 0:
            $('.reviews_box_slider').find('.owl-item')[arg].innerHTML = frame_0;
            break;
        case 1:
            $('.reviews_box_slider').find('.owl-item')[arg].innerHTML = frame_1;
            break;
        case 2:
            $('.reviews_box_slider').find('.owl-item')[arg].innerHTML = frame_2;
            break;
        case 3:
            $('.reviews_box_slider').find('.owl-item')[arg].innerHTML = frame_3;
            break;
    }
}

$(function(f){
    var element = f('.call_me'),
        width = $(document).width();
    f(window).scroll(function(){
        if (width < 500) {
            element['fade'+ (f(this).scrollTop() > 200 ? 'In': 'Out')](500);
        }

    });
});

$(function(){
  $(document).on('af_complete', function(event, response) {
    var form = response.form;

    if ((form.attr('id') == 'gr-modal') && response.success) {
      swal("Мы свяжемся с Вами с самое ближайшее время!");
      grecaptcha.reset();

      var grForm = $("#gr-modal");
      var data = grForm.serialize();

      $.ajax({
          type: 'POST',
          url: '/otpravka-otzyiva/',
          data: data,
          success: function(data) {
            ym(23194984,'reachGoal','forma-os');
          }
      });
    }


  });
  
  $('input[name="contacts"]').mask("+7(999) 999-99-99");
});
