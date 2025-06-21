//uborka-kvartir
$(document).ready(function(){
      $.fn.responsiveTabs = function() {
          this.addClass('responsive-tabs');
          this.append($('<span class="glyphicon glyphicon-triangle-bottom"></span>'));
          this.append($('<span class="glyphicon glyphicon-triangle-top"></span>'));
        
          this.on('click', '.modals_magics li.active > a, span.glyphicon', function() {
            this.toggleClass('open');
          }.bind(this));
        
          this.on('click', '.modals_magics li:not(.active) > a', function() {
            this.removeClass('open');
          }.bind(this));
        };
        
        $('body').on('click', '.color-brill', function(){
            $('a[href='+$(this).attr('data-id')+']').click();
        })
        
    $('#show-tabs').on('click',function(){
        $('#modal-tabs .modal-body').load('/chto-vxodit-v-uborku-m/', function(){
            $('.nav.nav-tabs.modals_magics').responsiveTabs();
        }); 
    }); 
});
