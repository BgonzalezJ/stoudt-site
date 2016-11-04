jQuery(function ($) {

	$("#views-tpls").sortable({
		update:  function (v) {
			resetIndexTpls();
		}
	});
	$("#views-tpls").disableSelection();

	$('.color-picker').wpColorPicker();

	if (typeof tinymce != "undefined")
		tinymce.init({selector: "textarea"});

	var image_frame, pattern_frame;

	$("#add-tpl").click(function (e) {
		e.preventDefault();
		var tpl = $("#select-tpl").val();

		$.get(wp_dir.dir + tpl, function (r) {
			if (r) {
				var l = $("#views-tpls").find(".tpl").length;
				var id = "id-" + $.now();
				r = r.replace(/%s/g, l);
				r = r.replace(/%id/g, id);
				$("#views-tpls").append(r);
				$("#" + id).find("img").attr("src", wp_imgs.img_example);
				tinymce.init({selector: "textarea"});
				$('.color-picker').wpColorPicker();
			}
		});
	});

	$("#close-tpls").click(function(e) {
		e.preventDefault();
		if ($(this).hasClass("opened")) {
			$(this).removeClass("opened");
			$(this).text("Abrir todo");
			$(".tpl").addClass("closed");
		} else {
			$(this).addClass("opened");
			$(this).text("Cerrar todo");
			$(".tpl").removeClass("closed");
		}
	});

	$("body").on("click", ".tpl .show", function (e){
		e.preventDefault();
		if (!$(this).parent().parent().hasClass("closed"))
			$(this).parent().parent().addClass("closed");
		else
			$(this).parent().parent().removeClass("closed");
	});

	$("body").on("click", ".tpl-add-image", function (e){
		e.preventDefault();
		var parent = $(this).parent().parent();
		subir_imagen(parent);
	});

	$("body").on("click", ".tpl-pattern", function (e){
		e.preventDefault();
		var parent = $(this).parent().parent();
		subir_pattern(parent);
	});

	$("body").on("click", ".tpl-delete", function (e){
		e.preventDefault();
		var parent = $(this).parent().parent();
		$(parent).remove();
		resetIndexTpls();
	});

	// Remueve imagen del template multiple images
	$("body").on("click", ".tpl-img-box .remove-img a", function (e){
		e.preventDefault();
		$(this).parent().parent().remove();
	});

	// Remueve patron del template image + bg or pattern
	$("body").on("click", ".tpl-pattern-box .remove-img a", function (e){
		e.preventDefault();
		var parent = $(this).parent().parent();
		parent.find(".pattern-id").val(0);
		parent.find(".pattern-img").attr('src', wp_imgs.img_example);
		parent.addClass("new");
	});

	function resetIndexTpls() {
		$.each($(".tpl"), function (i, v) {
			$(this).attr("data-i", i);
			$(this).find(".tpl-type").attr("name","tpl["+i+"][tpl]");
			$(this).find(".tpl-descr").attr("name","tpl["+i+"][descr]");
			if ($(this).hasClass("tpl2"))
				$(this).find(".attachment-id").attr("name","tpl["+i+"][img][]");
			else
				$(this).find(".attachment-id").attr("name","tpl["+i+"][img]");
			$(this).find(".link-video").attr("name","tpl["+i+"][video]");
			$(this).find(".pattern-id").attr("name","tpl["+i+"][pattern]");
			$(this).find(".color-picker").attr("name","tpl["+i+"][bgcolor]");
			$(this).find(".tplcheck").attr("name","tpl["+i+"][list]");
			$(this).find(".w-padding").attr("name","tpl["+i+"][custom_list]");
			$(this).find(".tplabove").attr("name","tpl["+i+"][above]");
			$(this).find(".w-padding").attr("name","tpl["+i+"][wpadding]");
			$(this).find(".fullsize").attr("name","tpl["+i+"][fullsize]");
			$(this).find(".tpl-margin-top").attr("name","tpl["+i+"][margin][top]");
			$(this).find(".tpl-margin-bottom").attr("name","tpl["+i+"][margin][bottom]");
		});
	}

	function subir_pattern(element) {

		// If the frame already exists, re-open it.
		if ( pattern_frame ) {
			pattern_frame.open();
			pattern_frame.id = element;
			return;
		}
		// Sets up the media library frame
		pattern_frame = wp.media.frames.meta_image_frame = wp.media({
			title: wp_imgs.title,
			button: { text:  wp_imgs.button },
			library: { type: 'image' },
			id: element
		});
 
		// Runs when an image is selected.
		pattern_frame.on('select', function(){

			// Grabs the attachment selection and creates a JSON representation of the model.
			var media_attachment = pattern_frame.state().get('selection').first().toJSON();
			// Sends the attachment URL to our custom image input field.
			// Vemos la cantidad de imgs existentes
			$(pattern_frame.id).find(".tpl-pattern-box").removeClass("new");
			$(pattern_frame.id).find(".pattern-img").attr('src', media_attachment.url);
			$(pattern_frame.id).find(".pattern-id").val(media_attachment.id);

		});
 
		// Opens the media library frame.
		pattern_frame.open();
	}



	function subir_imagen(element) {

		// If the frame already exists, re-open it.
		if ( image_frame ) {
			image_frame.open();
			image_frame.id = element;
			return;
		}
		// Sets up the media library frame
		image_frame = wp.media.frames.meta_image_frame = wp.media({
			title: wp_imgs.title,
			button: { text:  wp_imgs.button },
			library: { type: 'image' },
			id: element
		});
 
		// Runs when an image is selected.
		image_frame.on('select', function(){

			// Grabs the attachment selection and creates a JSON representation of the model.
			var media_attachment = image_frame.state().get('selection').first().toJSON();

			// Sends the attachment URL to our custom image input field.

			// Vemos la cantidad de imgs existentes
			var l = $(image_frame.id).find(".attachment-img").length - 1;

			$(image_frame.id).find(".attachment-img:eq("+l+")").attr('src', media_attachment.url);
			$(image_frame.id).find(".attachment-id:eq("+l+")").val(media_attachment.id);
			$(image_frame.id).find(".tpl-img-box:eq("+l+")").removeClass("new");

			if ($(image_frame.id).hasClass("tpl2")) {
				var index = $(image_frame.id).data().i;
				var img = '<div class="tpl-img-box new">';
					img += "<input type='hidden' name='tpl["+index+"][img][]' value='0' class='attachment-id' />";
					img +=	'<img src="'+wp_imgs.img_example+'" class="attachment-img" />';
					img +=	'		<div class="remove-img">';
					img +=	'			<a href="#"><img src="'+wp_imgs.img_remove+'" /></a>';
					img +=	'		</div>';
					img +=	'	</div>';

				$(image_frame.id).find(".images").append(img);
			} else {
				$(image_frame.id).find(".tpl-add-image").text("Cambiar imagen");
			}

		});
 
		// Opens the media library frame.
		image_frame.open();
	}
});