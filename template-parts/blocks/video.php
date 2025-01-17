<?php 
    $video_source = get_sub_field('video_source');
    $video = get_sub_field('video');

	$title = get_sub_field('video_title');
	$subtitle = get_sub_field('video_subtitle');
?>
<section id="<?php echo theme_block_handle() . '-' . get_row_index() ?>" class="block full-width-wrapper <?php echo theme_block_handle() ?>">
    <div class="max-width-container">
		<div class="column video">
			<?php if($video_source == 'youtube'): ?>
				<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php print $video; ?>" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			<?php elseif($video_source == 'vimeo'): ?>
				<iframe src="https://player.vimeo.com/video/<?php print $video; ?>" width="560" height="315" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
			<?php endif; ?>
		</div>
		<div class="video-heading">
			<?php
			if ($title) { echo '<h3>' . $title . '</h3>'; }
			if ($subtitle) { echo '<p>' . $subtitle . '</p>'; }
			?>
		</div>
	</div>
</section>