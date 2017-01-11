/**
 * Main Javascript.
 * This file is for who want to make this theme as a new parent theme and you are ready to code your js here.
 */

 jQuery(function ($){

 	// Menu

 	$(".navbar-toggle").click(function () {
 		$(".stoudt-navbar").height($(window).height());
 		$(".stoudt-navbar").removeClass("collapse").addClass("height");
 		setTimeout(function() {
 			$(".stoudt-navbar").addClass("in");
 			setTimeout(function() {
 				$("#main-menu .menu").addClass("open");
 			}, 300);
 		}, 300);
 		
 	});

 	$(".close-stoudt-navbar").click(function () {
 		$(".stoudt-navbar").removeClass("in");
 		setTimeout(function() {
 			$(".stoudt-navbar").removeClass("height");
 			$("#main-menu .menu").removeClass("open");
 		}, 300);
 	});

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

 	var centerImageHomeCover = function () {
		var imgcenter = $(".home-cover img.img-center");
		if (imgcenter.length > 0) {
			var top = 50;
			if ($(window).width() > 767)
				top = 70;

			top += 20;
			var cover = $(".home-cover");
			var wave = $(".home-cover .wave");
			var height = cover.height() - wave.height();
			var center = ((height - imgcenter.height()) / 2) + top;
			imgcenter.css("top", center);
		}
	}

	$(".home-cover img.img-center").load(function (){
		centerImageHomeCover();
	}).each(function(){
		if (this.complete) $(this).load();
	});

	$(window).resize(function () {
		centerImageHomeCover();
	});
 });