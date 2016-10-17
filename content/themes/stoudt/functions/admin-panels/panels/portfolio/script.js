jQuery(function ($){

 	var _custom_media		= true,
	_orig_send_attachment	= wp.media.editor.send.attachment;

	$('.upload-portfolio').click(function(e) {
		e.preventDefault();
		var send_attachment_bkp	= wp.media.editor.send.attachment,
			button				= $(this),
			caracteristica_id = $(this).data().caracteristicaId;
		wp.media.editor.send.attachment = function(props, attachment){
			console.log(attachment);
			$('.portfolio-attachment-id').val(attachment.id);
			$('.name').html(attachment.filename);
			$('.size').html(attachment.filesize);
			$('.date').html(attachment.dateFormated);
			// $("#img_id_"+caracteristica_id).val(attachment.id);
			// $("#img_"+caracteristica_id).attr("src",attachment.url);
		}
		wp.media.editor.open( button );
	} );
});
