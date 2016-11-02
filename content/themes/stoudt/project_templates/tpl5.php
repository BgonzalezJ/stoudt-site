<?php
	$margins = $tpl->margin;
	if (strpos($tpl->video, "youtube") !== FALSE || strpos($tpl->video, "youtu.be") !== FALSE) {
		if (strpos($tpl->video, "youtube") !== FALSE) {
			$video = explode("?v=", $tpl->video);
			$video = explode("&", $video[1]);
			$video = $video[0];
		} else {
			$video = explode("youtu.be/", $tpl->video);
			$video = $video[1];
		}
?>
		<div class="container tpl tpl5" style="margin-top: <?= $margins["top"]; ?>px; margin-bottom: <?= $margins["bottom"]; ?>px;" >
			<iframe src="https://www.youtube.com/embed/<?= $video; ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>
<?php
	} else {
		if (strpos($tpl->video, "vimeo.com") !== FALSE) {
			$video = explode("vimeo.com/", $tpl->video);
			$video = $video[1];
?>
		<div class="container tpl tpl5" style="margin-top: <?= $margins["top"]; ?>px; margin-bottom: <?= $margins["bottom"]; ?>px;" >
			<iframe src="https://player.vimeo.com/video/<?= $video; ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen ></iframe>
		</div>
<?php
		} else {
			if (strpos($tpl->video, "facebook.com") !== FALSE) {
?>
		<div class="container tpl tpl5" style="margin-top: <?= $margins["top"]; ?>px; margin-bottom: <?= $margins["bottom"]; ?>px;" >
			<div class="embed-fb-video">
				<div class="fb-video" data-href="<?= $tpl->video; ?>" data-width="500" data-show-text="false"></div>
			</div>
		</div>
<?php
			}
		}
	}	
?>