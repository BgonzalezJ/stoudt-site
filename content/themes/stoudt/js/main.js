/**
 * Main Javascript.
 * This file is for who want to make this theme as a new parent theme and you are ready to code your js here.
 */

 jQuery(function ($){

 	// Menu

 	function showMenu() {
 		if ($(window).width() > 767){
	 		var cover = $("#content > .cover").outerHeight() - 40;
	 		var scroll = $(window).scrollTop();
	 		if (scroll >= cover){
	 			$("#main-menu").addClass("fixed");
	 		} else {
	 			$("#main-menu").removeClass("fixed");
	 		}
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
 	}

 	showProjects();

 	$(window).scroll(function (e){
 		showMenu();
 		showProjects();
 	});
 });