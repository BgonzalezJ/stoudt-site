/**
 * Main Javascript.
 * This file is for who want to make this theme as a new parent theme and you are ready to code your js here.
 */

 jQuery(function ($){

 	$.each($(".tpl1"), function () {
 		var _this = this;
 		$(_this).find("img").ready(function (){
 			var b = function () {
 				var height = $(_this).find(".img-content").height();
 				$(_this).find(".descr-content").height(height);
 			}
 			if ($(window).width() > 767)
 				b();

 			$(window).resize(function () {
 				if ($(window).width() > 767)
 					b();
 				else
 					$(_this).find(".descr-content").removeAttr("style");
 			});
 		})
 	});
 });