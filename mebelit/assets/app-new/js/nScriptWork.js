$(document).ready(function() {
    document.addEventListener('click', function(e) {
        e = e || window.event;
	    var target = e.target;
        
        if (target.closest('button.accordion')) {

			var accordionBtn = target.closest('button.accordion');

			accordionBtn.classList.toggle('active');
			var panel = accordionBtn.nextElementSibling;
			if (panel.style.maxHeight) {
				panel.style.maxHeight = null;
			} else {
				panel.style.maxHeight = panel.scrollHeight + "px";
			}
		}
    });
    
    (function setActiveAccordionsHeight() {

    	var activeAccordions = document.querySelectorAll('.accordion.active');
    	if (!activeAccordions.length) return;
    
    	activeAccordions.forEach(function (item) {
    		var panel = item.nextElementSibling;
    		panel.style.maxHeight = panel.scrollHeight + "px";
    	});
    })();
    
    
    $(".info").popover();
    calcPrice();
    $(".plus").on("click", function() {
        var parent = $(this).parent();
        var type = "шт.";
        var thisCount = parent.find(".count");
        var count = thisCount.data("count");
        count++;
        thisCount.data("count", count);
        thisCount.html(count);
        if (parent.data("id") == 'glazh') {
            type = "мин.";
        }
        if (parent.data("id") == 'san_yzel' && count > 1) {
            $(".title_count_sy").html(count + " санузлами");
        }
        if (count == 1) {
            if (parent.data("id") == 'glazh') {
                var content = '<span class="' + parent.data("id") + '">' + $("#" + parent.data("id") + "").data("content") + ' ' + count * 30 + type + '<br></span>';
            } else {
                var content = '<span class="' + parent.data("id") + '">' + $("#" + parent.data("id") + "").data("content") + ' ' + count + type + '<br></span>';
            }
            $(".dop").append(content);
            $("." + parent.data("id") + "").html(" " + content);
        } else {
            if (parent.data("id") == 'glazh') {
                var content = '<span class="' + parent.data("id") + '">' + $("#" + parent.data("id") + "").data("content") + ' ' + count * 30 + type + '<br></span>';
            } else {
                var content = '<span class="' + parent.data("id") + '">' + $("#" + parent.data("id") + "").data("content") + ' ' + count + type + '<br></span>';
            }
            $("." + parent.data("id") + "").html(" " + content);
        }
        $("#" + parent.data("id") + "").data("kol", count);
        calcPrice();
    })
    $(".minus").on("click", function() {
        var parent = $(this).parent();
        var type = "шт.";
        var thisCount = parent.find(".count");
        var count = thisCount.data("count");
        if (parent.data("id") == 'san_yzel') {
            if (count == 1) {
                thisCount.data("count", 1);
                $(".title_count_sy").html("одним санузлом");
                return 0;
            } else {
                count--;
                thisCount.data("count", count);
                if (count == 1) {
                    $(".title_count_sy").html("одним санузлом");
                } else {
                    $(".title_count_sy").html(count + " санузлами");
                }
            }
        } else {
            if (count == 0) {
                thisCount.data("count", 0);
                return 0;
            } else {
                count--;
                thisCount.data("count", count);
            }
        }
        if (parent.data("id") == 'glazh') {
            type = "мин.";
        }
        var content = '<span class="' + parent.data("id") + '">' + $("#" + parent.data("id") + "").data("content") + ' ' + count * 30 + type + '<br></span>';
        $("." + parent.data("id") + "").html(" " + content);
        if (count == 0) {
            var content = '';
            $("." + parent.data("id") + "").remove();
        }
        thisCount.html(count);
        $("#" + parent.data("id") + "").data("kol", count);
        calcPrice();
    })
    $("#eko").on("change", function() {
        if ($(this).is(":checked")) {
            var content = '<span class="eko">Эко-убоорка<br></span>';
            $(".dop").append(content);
            $("." + parent.data("id") + "").html(" " + content);
        } else {
            $(".eko").remove();
        }
        calcPrice();
    });
    $("#key").on("change", function() {
        if ($(this).is(":checked")) {
            var content = '<span class="key">Заехать за ключами от квартиры<br></span>';
            $(".dop").append(content);
            $("." + parent.data("id") + "").html(" " + content);
        } else {
            $(".key").remove();
        }
        calcPrice();
    });
    $(".kol_kom").on("change", function() {
        calcPrice();
        if (parseInt($(".kol_kom option:selected").val()) != 1) {
            $(".title_count_kom").html($(".kol_kom option:selected").val() + " жилыми комнатами ");
        }
    })
    $(".type").on("change", function() {
        calcPrice();
    })
    function calcPrice() {
        var san_yzel = $("#san_yzel");
        var okna = $("#okna");
        var holod = $("#holod");
        var svch = $("#svch");
        var lustr = $("#lustr");
        var glazh = $("#glazh");
        var smen_bel = $("#smen_bel");
        var osob = $("#osob");
        var balkon = $("#balkon");
        var kom = $(".kol_kom option:selected").data("price");
        var kom_val = $(".kol_kom option:selected").val();
        if (kom_val == 1) {
            var type = $(".type option:selected").data("y1");
        }
        if (kom_val == 2) {
            var type = $(".type option:selected").data("y2");
        }
        if (kom_val == 3) {
            var type = $(".type option:selected").data("y3");
        }
        if (kom_val == 4) {
            var type = $(".type option:selected").data("y4");
        }
        if (kom_val == 5) {
            var type = $(".type option:selected").data("y5");
        }
        if (kom_val == 6) {
            var type = $(".type option:selected").data("y6");
        }
        var itogo = parseInt(kom);
        itogo += parseInt(type);
        itogo += parseInt(san_yzel.data("price")) * parseInt(san_yzel.data("kol"));
        itogo += parseInt(okna.data("price")) * parseInt(okna.data("kol"));
        itogo += parseInt(holod.data("price")) * parseInt(holod.data("kol"));
        itogo += parseInt(svch.data("price")) * parseInt(svch.data("kol"));
        itogo += parseInt(lustr.data("price")) * parseInt(lustr.data("kol"));
        itogo += parseInt(glazh.data("price")) * parseInt(glazh.data("kol"));
        itogo += parseInt(smen_bel.data("price")) * parseInt(smen_bel.data("kol"));
        itogo += parseInt(osob.data("price")) * parseInt(osob.data("kol"));
        itogo += parseInt(balkon.data("price")) * parseInt(balkon.data("kol"));
        if ($("#key").is(":checked")) {
            itogo += parseInt($("#key").data("price"));
        }
        if ($("#eko").is(":checked")) {
            itogo = parseInt(itogo) * 0.40 + parseInt(itogo);
        }
        $("#itogo_price").data("itogo", itogo);
        $("#itogo_price").html(itogo);
    }
    if ($(".calc_but").hasClass('open')) {
        $(".calc_but .glyphicon").addClass("glyphicon-menu-up");
        $(".calculator_box .calc_services").slideDown(300);
    } else {
        $(".calc_but .glyphicon").removeClass("glyphicon-menu-up");
        $(".calculator_box .calc_services").slideUp(300);
    }
    $(".calc_but").on("click", function() {
        if ($(this).hasClass('open')) {
            $(".calc_but .glyphicon").removeClass("glyphicon-menu-up");
            $(".calculator_box .calc_services").slideUp(300);
            $(this).removeClass("open");
        } else {
            $(".calc_but .glyphicon").addClass("glyphicon-menu-up");
            $(".calculator_box .calc_services").slideDown(300);
            $(this).addClass("open");
        }
    });
    $('.read_more').on('click', function() {
        $('.reda_more').slideDown("slow");
        $('.read_more').css('display', 'none');
        $('.read_more').parent().parent().css('display', 'none');
    });
    $(".reviews_box_slider.three").owlCarousel({
        items: 1,
        dots: true,
        nav: true,
        navText: ["<span class='glyphicon glyphicon-menu-left'></span>", "<span class='glyphicon glyphicon-menu-right'></span>"],
        responsive: {
            768: {
                items: 3,
            }
        }
    });
    $(".reviews_box_slider.two").owlCarousel({
        items: 1,
        dots: true,
        nav: true,
        navText: ["<span class='glyphicon glyphicon-menu-left'></span>", "<span class='glyphicon glyphicon-menu-right'></span>"],
        responsive: {
            1200: {
                items: 2,
            }
        }
    });
    $('.main_form').submit(function(event) {
        event.preventDefault();
        var form = $(this);
        $("#order").attr('disabled', true);
        var data = form.serialize();
        var url = form.attr('action');
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            success: function(text) {
                form.find('input[type="text"]').each(function() {
                    $(this).val('');
                });
                $("#order").attr('disabled', false);
                swal("Мы свяжемся с Вами с самое ближайшее время!");
            },
            error: function() {
                alert("error");
            }
        });
    });
    $('.modal_head').removeClass("activate");
    $('#modal_close').css('display', 'none');
    function click_x() {
        if ($('.modal_head1').hasClass('activate')) {
            $('#modal_close').css('display', 'block');
        } else if ($('.modal_head').hasClass('activate')) {
            $('#modal_close').css('display', 'block');
        } else {
            $('#modal_close').css('display', 'none');
        }
    }
    $('.modal_head').on('click', function() {
        $(this).css('bottom', '294px').addClass('activate');
        click_x();
        $('#overlay').fadeIn(0, function() {
            $('#modal_form').css('display', 'block').animate({
                opacity: 1
            }, 0);
        });
        $('#modal_close').css('display', 'block');
    });
    $('#modal_close').on('click', function(e) {
        e.stopPropagation();
        $('.modal_head').removeClass('activate');
        $('.modal_head1').removeClass('activate');
        $('.modal_head1').removeClass('modal_head1').addClass('modal_head');
        click_x();
        $('#modal_form').animate({
            opacity: 0,
            bottom: '0'
        }, 500, function() {
            $(this).css('display', 'none');
            $('#overlay').fadeOut(400);
        });
        $('.modal_head').animate({
            opacity: 1,
            bottom: '0'
        }, 500, function() {
            $(this).css('display', 'block');
            $('#overlay').fadeOut(400);
        });
    });
    $(function() {
        $('.modal_head').on('click', function() {
            $('.modal_head').removeClass('modal_head').addClass('modal_head1');
            event.preventDefault();
        });
    });
    function getCookie(name) {
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length == 2)
            return parts.pop().split(";").shift();
    }
    function setCookie(name, value, options) {
        options = options || {};
        var expires = options.expires;
        if (typeof expires == "number" && expires) {
            var d = new Date();
            d.setTime(d.getTime() + expires * 1000);
            expires = options.expires = d;
        }
        if (expires && expires.toUTCString) {
            options.expires = expires.toUTCString();
        }
        value = encodeURIComponent(value);
        var updatedCookie = name + "=" + value;
        for (var propName in options) {
            updatedCookie += "; " + propName;
            var propValue = options[propName];
            if (propValue !== true) {
                updatedCookie += "=" + propValue;
            }
        }
        document.cookie = updatedCookie;
    }
    if (getCookie("akcia") == 1) {
        setCookie('akcia', '1');
        $('#modal_form').css("display", "none");
    }
    $('#modal_close').on('click', function() {
        setCookie('akcia', '1');
    });
});
