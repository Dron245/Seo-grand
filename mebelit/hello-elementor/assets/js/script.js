



document.addEventListener("DOMContentLoaded", () => {
  let modalList = document.querySelectorAll(".form__modal form"),
    formList = document.querySelectorAll(".main-page__form form");

  modalList.forEach((e) => {
    e.addEventListener("submit", () => {
      console.log("ready!");
      ym(87326859, "reachGoal", "zayvka");
    });
  });

  formList.forEach((e) => {
    e.addEventListener("submit", () => {
      console.log("ready!");
      ym(87326859, "reachGoal", "zayvka");
    });
  });
});
jQuery(document).ready(function () {
  //jQuery('.nextend-thumbnail-inner').attr('class', '');
});

jQuery.noConflict();
(function ($) {
  $(document).ready(function () {
    $("input[type='tel']").mask("+7 (999) 999-9999", {
      placeholder: "+7 (999) 999-9999",
    });
  });
  $(document).on('submit','.zakaz_zvonka form',function(e){
     e.preventDefault();
     var form = $(this).closest('form');
     var name = form.find('[name=type4]');
     var phone = form.find('[name=type5]');
     var agree = form.find('[name=type6]');
     var ph_length = phone.val().length;
     if (ph_length < 17){
      form.find('[name=type5]').css('border', '2px dashed rgb(192, 11, 30)');
      return false;
     } else {
      form.find('[name=type5]').css('border', '');
     }
     if(!agree.is(':checked')) {
      agree.closest('p').addClass('error');
      return false;
     }

     agree.closest('p').removeClass('error');

     var data = {
           action: 'header_zakaz_zvonka',
           name: name.val(),
           phone: phone.val(),
        };
        jQuery.post( '/wp-admin/admin-ajax.php', data, function( response ){
             if(response.send) {
              ym('299679802', "reachGoal", "zayvka");
              jQuery('.zakaz_zvonka .premium-modal-box-modal-content').addClass('sended');

              setTimeout(() => { 
                jQuery('.zakaz_zvonka .premium-modal-box-modal-close').click();
                jQuery('.zakaz_zvonka .premium-modal-box-modal-content').removeClass('sended');
                name.val('');
                phone.val('');
              }, 3000);
              
              if (response.redirect) {
                window.location.href = 'https://mebelit-spb.ru/stranica-blagodarnosti';
              }
            }
        } );
     return false;
  });
})(jQuery);
