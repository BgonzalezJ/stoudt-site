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
 			$("body").addClass("noscroll");
			$("html").addClass("noscroll");
			$("body").height($(window).height());
 			setTimeout(function() {
 				$(".stoudt-navbar .menu").addClass("open");
 			}, 300);
 		}, 300);
 		
 	});

 	$(".close-stoudt-navbar").click(function () {
 		$(".stoudt-navbar .menu").removeClass("open");
 		$("body").removeClass("noscroll");
 		$("html").removeClass("noscroll");
 		$("body").removeAttr("style");
 		setTimeout(function() {
 			$(".stoudt-navbar").removeClass("in");	
 			setTimeout(function() {
 				$(".stoudt-navbar").removeClass("height");
 			}, 300);
 			
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

	// Skills

	if (window.home) {
		$(".skills li a").click(function () {
			

			if (!$(this).parent().hasClass("active")) {
				$(".skills li").removeClass("active");
				var category = $(this).data("category");
				$(".skills li." + category).addClass("active");
				if (!$(this).parent().hasClass("all-projects")) {
					$(".list-projects .project").addClass("fadeOut");
					setTimeout(function () {
						$(".list-projects .project").addClass("hide");
						$(".list-projects .project." + category).removeClass("hide");
						$(".list-projects .project." + category).removeClass("fadeOut");	
					}, 350);
				} else {
					$(".list-projects .project").addClass("fadeOut");
					setTimeout(function () {
						$(".list-projects .project").removeClass("hide");
						$(".list-projects .project").removeClass("fadeOut");
					}, 350);	
				}
			}
			return false;
		});
	} else {
		$(".skills li a").click(function () {
			return false;
		});
	}
 });