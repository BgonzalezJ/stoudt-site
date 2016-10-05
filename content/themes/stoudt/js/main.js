/**
 * Main Javascript.
 * This file is for who want to make this theme as a new parent theme and you are ready to code your js here.
 */

 jQuery(function ($){

 	// Menu

 	fntimeout_menu = null;

 	function showMenu() {
 		var cover = $("#content > .cover").outerHeight();
 		var scroll = $(window).scrollTop();
 		if (scroll > cover){
 			if (fntimeout_menu == null) {
	 			$("#main-menu").addClass("fixed");
	 			fntimeout_menu = setTimeout(function() {
	 				$("#main-menu").addClass("show");
	 				clearTimeout(fntimeout_menu);
	 				fntimeout_menu = null;
	 			}, 300);
 			}
 		} else {
 			clearTimeout(fntimeout_menu);
	 		fntimeout_menu = null;
 			$("#main-menu").removeClass("show").removeClass("fixed");
 		}
 	}

 	showMenu();

 	var fninterval_projects = null;

 	function showProjects() {

 		var listProjects = $(".projects .list-projects");
 		
 		if (listProjects) {
 			listProjects.find("li").each(function (){
				var scroll = $(window).scrollTop() + $(window).height();
				offsetTop = $(this).offset().top;
				if (scroll >= offsetTop) {
					$(this).addClass("show");
				}
 			});
 		}

 		// if (fninterval_projects == null) {
	 	// 	var listProjects = $(".projects .list-projects").offset();

	 	// 	if (listProjects) {
		 // 		//listProjects = listProjects.top + 100;
		 // 		listProjects = listProjects.top;

		 // 		var scroll = $(window).scrollTop() + $(window).height();


		 // 		if (scroll >= listProjects){
		 // 			var l = $(".list-projects ul").find("li").length;
		 // 			var i = 0;
		 // 			fninterval_projects = setInterval(function (){

		 // 				$(".list-projects ul").find("li:eq("+i+")").addClass("show");
		 // 				i++;
		 // 				if (i == l) {
		 // 					clearInterval(fninterval_projects);
		 // 					// fninterval_projects = null;
		 // 				}
		 // 			}, 300);	
		 // 		}
	 	// 	}
 		// }
 	}

 	showProjects();


 	$(window).scroll(function (e){
 		showMenu();
 		showProjects();
 	});




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