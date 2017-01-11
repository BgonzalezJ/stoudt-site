jQuery(function ($){

 	var _custom_media		= true,
	_orig_send_attachment	= wp.media.editor.send.attachment;

	$('.upload-logo').click(function(e) {
		e.preventDefault();
		var send_attachment_bkp	= wp.media.editor.send.attachment,
			button				= $(this),
			caracteristica_id = $(this).data().caracteristicaId;
		wp.media.editor.send.attachment = function(props, attachment){
			$('.logo-attachment-id').val(attachment.id);
			$('.img_logo_stoudt').attr("src",attachment.url);
		}
		wp.media.editor.open( button );
	} );

	$('.upload-logo-hover').click(function(e) {
		e.preventDefault();
		var send_attachment_bkp	= wp.media.editor.send.attachment,
			button				= $(this),
			caracteristica_id = $(this).data().caracteristicaId;
		wp.media.editor.send.attachment = function(props, attachment){
			console.log(attachment);
			$('.logo-attachment-hover-id').val(attachment.id);
			$('.img_logo_stoudt_hover').attr("src",attachment.url);
		}
		wp.media.editor.open( button );
	} );

	$(".delete-logo").click(function (e){
		$('.logo-attachment-id').val(0);
		$('.logo-attachment-hover-id').val(0);
	});
});
