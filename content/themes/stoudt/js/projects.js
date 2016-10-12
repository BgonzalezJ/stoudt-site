jQuery(document).ready(function ($){

	var wrapper = $("#more-projects .wrapper");
	var projects = $("#more-projects .wrapper").find("ul").find("li");

	var swipe_more_projects = function () {
		if ($(window).width() < 768) {
			projects.width(wrapper.find("ul").width());
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
