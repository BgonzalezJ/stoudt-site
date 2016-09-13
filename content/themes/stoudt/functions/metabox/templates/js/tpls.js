jQuery(function ($) {

	tinymce.init({selector: "textarea"});

	var image_frame;

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
			}
		});
	});

	$("body").on("click", ".tpl-add-image", function (e){
		e.preventDefault();
		var parent = $(this).parent().parent();
		subir_imagen(parent);
	});

	$("body").on("click", ".tpl-delete", function (e){
		e.preventDefault();
		var parent = $(this).parent().parent();
		$(parent).remove();
		var l = 0;
		$.each($(".tpl"), function () {
			$(this).attr("data-i", l);
			$(this).find(".tpl-type").attr("name","tpl["+l+"][tpl]");
			$(this).find(".tpl-descr").attr("name","tpl["+l+"][descr]");
			if ($(this).hasClass("tpl2"))
				$(this).find(".attachment-id").attr("name","tpl["+l+"][img][]");
			else
				$(this).find(".attachment-id").attr("name","tpl["+l+"][img]");
			l++;
		});
	});

	$("body").on("click", ".remove-img a", function (e){
		e.preventDefault();
		var parent = $(this).parent().parent();
		subir_imagen(parent);
	});



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
			var l = $(image_frame.id).find("img").length - 1;
			$(image_frame.id).find("img:eq("+l+")").attr('src', media_attachment.url);

			$(image_frame.id).find(".attachment-id:eq("+l+")").val(media_attachment.id);

			if ($(image_frame.id).hasClass("tpl2")) {
				var index = $(image_frame.id).data().i;
				$(image_frame.id).find(".images").append("<input type='hidden' name='tpl["+index+"][img][]' value='0' class='attachment-id' />");

				var img = '<div class="tpl-img-box">';
					img +=	'<img src="'+wp_imgs.img_example+'" />';
					img +=	'		<div class="remove-img">';
					img +=	'			<a href="#">Eliminar imagen</a>';
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