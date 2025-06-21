$(document).ready(function(){

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
            yaCounter23194984.reachGoal('question_send'); 
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
            yaCounter23194984.reachGoal('action_send');
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
            nav: true,
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
});


