jQuery(function ($){

	$.each($(".tpl1.side"), function () {
 		var _this = this;
 		$(_this).find("img").load(function (){
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
 		}).each(function(){
 			if (this.complete) $(this).load();
 		})
 	});

	var set_height_iframe = function () {
		var height = Math.ceil($(".single iframe").width() * 0.75)
		$(".single iframe").height(height);
	}

	set_height_iframe();

	var centerImageCover = function () {
		var imgcenter = $(".single .cover img");
		if (imgcenter.length > 0) {
			var top = 50;
			if ($(window).width() > 767)
				top = 70;
			var cover = $(".single .cover");
			var center = ((cover.height() - imgcenter.height()) / 2) + top;
			imgcenter.css("top", center);
		}
	}

	$(".single .cover img").load(function (){
		centerImageCover();
	}).each(function(){
		if (this.complete) $(this).load();
	});

	var wrapper = $("#more-projects .wrapper");
	var projects = $("#more-projects .wrapper").find("ul").find("li");

	var swipe_more_projects = function () {
		if ($(window).width() < 768) {
			projects.width(wrapper.width() * 0.8);
			wrapper.height(projects.height());
			wrapper.find("ul").width(wrapper.width() * projects.length);
		} else {
			wrapper.removeAttr("style");
			wrapper.find("ul").removeAttr("style");
			projects.removeAttr("style");
		}
	}

	swipe_more_projects();

	$(window).resize(function () {
		swipe_more_projects();
		centerImageCover();
		set_height_iframe();
	});

	var pager = 0;

	wrapper.swipe({
		swipeLeft:function() {
			if (pager < (projects.length-1)) {
				var project = wrapper.find("ul").find("li:eq("+pager+")");
				project.css("marginLeft", project.width() * -1);
				pager++;
			}
		},
		swipeRight: function() {
			if (pager >= 0) {
				pager--;
				var project = wrapper.find("ul").find("li:eq("+pager+")");
				project.css("marginLeft", 0);
				if (pager < 0)
					pager = 0;
			}
		}
	});


});
