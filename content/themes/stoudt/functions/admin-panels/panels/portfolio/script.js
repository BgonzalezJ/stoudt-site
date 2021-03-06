jQuery(function ($){

 	var _custom_media		= true,
	_orig_send_attachment	= wp.media.editor.send.attachment;

	$('.upload-portfolio').click(function(e) {
		e.preventDefault();
		var send_attachment_bkp	= wp.media.editor.send.attachment,
			button				= $(this),
			caracteristica_id = $(this).data().caracteristicaId;
		wp.media.editor.send.attachment = function(props, attachment){
			$('.portfolio-attachment-id').val(attachment.id);
			$('.name').html(attachment.filename);
			$('.link').attr("href",attachment.url);
		}
		wp.media.editor.open( button );
	} );

	$(".delete-portfolio").click(function (e){
		$('.portfolio-attachment-id').val(0);
	});
});
