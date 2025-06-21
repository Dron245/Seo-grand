/*	jQuery.flexMenu 1.3
	https://github.com/352Media/flexMenu
	Description: If a list is too long for all items to fit on one line, display a popup menu instead.
	Dependencies: jQuery, Modernizr (optional). Without Modernizr, the menu can only be shown on click (not hover). */

!(function (e) {
	'function' == typeof define && define.amd ? define(['jquery'], e) : e(jQuery);
})(function (e) {
	function i() {
		e(o).each(function () {
			e(this).flexMenu({ undo: !0 }).flexMenu(this.options);
		});
	}
	function n(i) {
		var n, l;
		(n = e('li.flexMenu-viewMore.active')),
			(l = n.not(i)),
			l.removeClass('active').find('> ul').hide();
	}
	var l,
		o = [];
	e(window).resize(function () {
		clearTimeout(l),
			(l = setTimeout(function () {
				i();
			}, 200));
	}),
		(e.fn.flexMenu = function (i) {
			var l,
				t = e.extend(
					{
						threshold: 2,
						cutoff: 2,
						linkText: 'More',
						linkTitle: 'View More',
						linkTextAll: 'Menu',
						linkTitleAll: 'Open/Close Menu',
						showOnHover: !0,
						popupAbsolute: !0,
						popupClass: '',
						undo: !1,
					},
					i
				);
			return (
				(this.options = t),
				(l = e.inArray(this, o)),
				l >= 0 ? o.splice(l, 1) : o.push(this),
				this.each(function() {
					var $ul = $(this),
						 $items = $ul.find("> li");
			  
					// Если нет <li> — выходим, иначе .offset() вызовет ошибку
					if ($items.length === 0) return;
			  
					var $first = $items.first(),
						 $last = $items.last();
			  
					// Проверка на наличие offset (если элемент скрыт, offset может быть undefined)
					if (typeof $first.offset() === "undefined" || typeof $last.offset() === "undefined") return;
			  
					var totalItems = $items.length,
						 firstTop = Math.floor($first.offset().top),
						 itemHeight = Math.floor($first.outerHeight(true)),
						 overflow = false;
			  
					// Проверка — выходит ли последний элемент за пределы строки первого
					function isWrapping($el) {
						 if (!$el.length || typeof $el.offset() === "undefined") return false;
						 return Math.ceil($el.offset().top) >= firstTop + itemHeight;
					}
			  
					// Если переполнение и превышен порог
					if (isWrapping($last) && totalItems > t.threshold && !t.undo && $ul.is(":visible")) {
						 var $popup = $('<ul class="flexMenu-popup" style="display:none;' + (t.popupAbsolute ? ' position: absolute;' : '') + '"></ul>');
						 $popup.addClass(t.popupClass);
			  
						 for (var i = totalItems; i > 1; i--) {
							  var $lastItem = $ul.find("> li:last-child");
			  
							  if (isWrapping($lastItem)) {
									$lastItem.appendTo($popup);
							  }
			  
							  if (i - 1 <= t.cutoff) {
									$($ul.children().get().reverse()).appendTo($popup);
									overflow = true;
									break;
							  }
			  
							  if (!isWrapping($lastItem)) break;
						 }
			  
						 var $moreLi = overflow
							  ? $('<li class="flexMenu-viewMore flexMenu-allInPopup"><a href="#" title="' + t.linkTitleAll + '">' + t.linkTextAll + '</a></li>')
							  : $('<li class="flexMenu-viewMore"><a href="#" title="' + t.linkTitle + '">' + t.linkText + '</a></li>');
			  
						 $ul.append($moreLi);
			  
						 var $moreLink = $ul.find("> li.flexMenu-viewMore > a");
			  
						 if (isWrapping($moreLink)) {
							  $ul.find("> li:nth-last-child(2)").appendTo($popup);
						 }
			  
						 // Переставляем элементы в нужном порядке
						 $popup.children().get().reverse().forEach(function(el) {
							  $popup.append(el);
						 });
			  
						 $ul.find("> li.flexMenu-viewMore").append($popup);
			  
						 $moreLink.on("click", function(e) {
							  e.preventDefault();
							  n($moreLi);
							  $popup.toggle();
							  $moreLi.toggleClass("active");
						 });
			  
						 if (t.showOnHover && typeof Modernizr !== "undefined" && !Modernizr.touch) {
							  $moreLi.hover(
									function() {
										 $popup.show();
										 $moreLi.addClass("active");
									},
									function() {
										 $popup.hide();
										 $moreLi.removeClass("active");
									}
							  );
						 }
					}
			  
					// Undo режим — возвращает все элементы на место
					else if (t.undo && $ul.find("ul.flexMenu-popup").length) {
						 var $popup = $ul.find("ul.flexMenu-popup"),
							  $popupItems = $popup.find("li");
			  
						 $popupItems.each(function() {
							  $(this).appendTo($ul);
						 });
			  
						 $popup.remove();
						 $ul.find("> li.flexMenu-viewMore").remove();
					}
			  });
			);
		});
});
