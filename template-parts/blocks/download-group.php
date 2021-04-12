<?php 
	$download_group = 'download_links';
?>

<section id="<?php echo theme_block_handle() . '-' . get_row_index() ?>" class="block full-width-wrapper <?php echo theme_block_handle() ?>">
	<div class="max-width-container">

		<?php
			if( have_rows($download_group) ): ?>
				<ul class="download-links">
					<?php while ( have_rows($download_group) ) : the_row();?>
						<li><a href="<?php echo the_sub_field('link'); ?>" target="_blank" class="text-link style-arrow">
							<?php echo the_sub_field('label'); ?>
						</a></li>
					<?php endwhile; ?>
				</ul>
			<?php endif;
		?>
		
	</div>
</section>