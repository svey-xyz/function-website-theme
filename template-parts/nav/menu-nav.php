<?php
    $menu_items = wp_get_nav_menu_items($menu_id,array('order' => 'ASC','orderby' => 'menu_order'));
    //print print_r($menu_items,TRUE);
    $logos = get_field('logos',  'option');
    
?>
<?php if($menu_items): ?>
    <ul class="menu <?php if($menu_class){ print $menu_class;} ?>">
        <?php foreach($menu_items as $key => $menu_item ):
			if( $menu_item->menu_item_parent == 0){

				//print print_r($menu_item,TRUE);
				$title = $menu_item->title;
				$url = $menu_item->url;
				$slug = sanitize_title($title);
				$unique_class = 'menu-' . $menu_class . '-' . $slug;
				array_push($menu_item->classes, $slug);
				
				$classes = "";
				$target = "";
				if($menu_item->target){
					$target = ' target="'.$menu_item->target .'"';
				}
				if($menu_item->classes){
					$classes = implode(" ",$menu_item->classes);
				}
				
			?>

			<li class="<?php print trim($classes); ?>">
				<a href="<?php print $url; ?>" class="<?php if($menu_class == 'images'){ print 'image';} ?>" <?php if($target){ print $target; }; ?>>
					<?php if($menu_class == 'images'): ?>
						<?php
							$dark_image = $logos[$menu_item->classes[0] . '_logo_black'];
							$light_image = $logos[$menu_item->classes[0] . '_logo_white'];
						?>
						<img src="<?php print $light_image; ?>" data-dark="<?php print $dark_image; ?>" data-light="<?php print $light_image; ?>"/>
					<?php elseif($menu_class == 'social'): ?>
						<?php
							$menu_item_image_name = $menu_item->classes[0];
							$menu_item_image_path =  get_template_directory_uri() . '/assets/images/icons/' . $menu_item_image_name . '.svg'; 
						?>
						<img src="<?php print $menu_item_image_path; ?>" />
					<?php else: ?>
						<?php print $title; ?>
					<?php endif; ?>
				</a>
					
			</li>  
				
        <?php } endforeach; ?>
    </ul>
<?php endif; ?>