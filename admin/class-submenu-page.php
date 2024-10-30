<?php

/*
  Plugin Name: Cooking Key Admin Page
  Author: Dave Perkins
  Author URI: https://recipekeyplugin.com
  Text Domain: cooking-key
  Copyright © 2019
 
*/

/****************************************************************************
 _______ ______  _______ _____ __   _       _____  _______  ______ _______
 |_____| |     \ |  |  |   |   | \  |      |_____] |_____| |  ____ |______
 |     | |_____/ |  |  | __|__ |  \_|      |       |     | |_____| |______
  Backend Admin Page
 
*******************************************************************************/
  
class CKP_Submenu_Page {

	public function render() {
		
		// CHECK CURRENT WORDPRESS THEME
		$theme = wp_get_theme();
		
		$cookingkeyicon = 'cooking-key-icon';
		?>
		<!---BUILD ADMIN PAGE--->
		<center><strong><h1>Cooking Key</h1></strong></center>
		</br>
		<div align="center" style="color:#7064b8; font-size:20px"><strong>** <a href="http://recipekeyplugin.com" target="_blank">UPGRADE TO PREMIUM</a> AND GET ADDITIONAL ICONS AND FEATURES!  **</strong></div>
		</br>
		</br>
		<?php
	
	
		echo '<div class="cooking-key-admin">';
		
		echo '<div class="cooking-key-wrapper">';
		echo 'Jump to your <a href=' . admin_url( 'edit-tags.php?taxonomy=post_tag', 'https' ) .'> Tags</a> or <a href=' . admin_url( 'edit-tags.php?taxonomy=category', 'https' ) .'> Categories</a> page to edit.';
		echo '</div>';
		
		
		echo '<div class="cooking-key-addon">';
		
	// UPGRADE THEME FOR MORE FEATURES
	
	if ( !function_exists( 'genesis_theme_support' ) ) {
		echo '<div class="cooking-key-addon-wrapper">';
		echo '<div align="center" style="color:#7064b8; font-size:20px">Your current theme is '. $theme->name . '.</div>';
		echo '<br>';
		?>
		<div align="center" style="color:#7064b8; font-size:20px">Get more integration out of Cooking Key by upgrading your theme to <a href="https://shareasale.com/r.cfm?b=242694&u=1009831&m=28169&urllink=&afftrack=">Genesis Framework</a> and <a href="https://shareasale.com/r.cfm?b=563285&u=1009831&m=28169&urllink=&afftrack=">Foodie Pro Theme</a>!'</div>
		<?php
		echo '</div>';
		echo '<br>';
	 }
		
	//ADDITIONAL ICONS AVAILABLE WITH PREMIUM
	echo '<div class="cooking-key-addon-wrapper">';
	?>
	<div align="center" style="color:#7064b8; font-size:20px"><strong>** Upgrade to <a href="http://recipekeyplugin.com" target="_blank">Cooking Key Premium</a> **</strong></div>
	</br>
	</br>
	<div align="center" style="color:#7064b8; font-size:20px"><strong>** Get Cooking Key Feature Posts Widget **</strong></div>
	</br>
	</br>
	<div align="center" style="color:#7064b8; font-size:20px"><strong>** Get Additional Icons **</strong></div>
	<?php
	echo '<div class="cooking-key-additional">';
	echo ' <img src="'. esc_url( plugins_url( '../images/air-fryer.png', __FILE__ ) ) .'" alt="Air Fryer Icon" class="cooking-key-icon" width="35"> Air Fryer';
	echo '</div>';
	echo '<div class="cooking-key-additional">';
	echo ' <img src="'. esc_url( plugins_url( '../images/food-processor.png', __FILE__ ) ) .'" alt="Food Processor Icon" class="cooking-key-icon" width="35"> Food Processor';
	echo '</div>';
	echo '<div class="cooking-key-additional">';
	echo '<img src="'. esc_url( plugins_url( '../images/microwave.png', __FILE__ ) ) .'" alt="Microwave Icon" class="cooking-key-icon" width="35"> Microwave';
	echo '</div>';
	echo '<div class="cooking-key-additional">';
	echo '<img src="'. esc_url( plugins_url( '../images/mixer.png', __FILE__ ) ) .'" alt="Mixer Icon" class="cooking-key-icon" width="35"> Mixer';
	echo '</div>';
	echo '<div class="cooking-key-additional">';
	echo ' <img src="'. esc_url( plugins_url( '../images/instant-pot.png', __FILE__ ) ) .'" alt="Instant Pot Icon" class="cooking-key-icon" width="35"> Instant Pot';
	echo '</div>';
	echo '<div class="cooking-key-additional">';
	echo '<img src="'. esc_url( plugins_url( '../images/crockpot.png', __FILE__ ) ) .'" alt="Crockpot Icon" class="cooking-key-icon" width="35"> Crockpot';
	echo '</div>';
	echo '<div class="cooking-key-additional">';
	echo '<img src="'. esc_url( plugins_url( '../images/pressure-cooker.png', __FILE__ ) ) .'" alt="Pressure Cooker Icon" class="cooking-key-icon" width="35"> Pressure Cooker';
	echo '</div>';

		
	?>
	</br>
	</br>
	</br>
	<div align="center" style="color:#7064b8; font-size:20px"><strong>** Custom Sidebar Widget Title ** </br> </div></br>
	<div align="center" style="color:#7064b8; font-size:20px"><strong>** <a href="https://recipekeyplugin.com/install-instructions/" target="_blank">See How Cooking Key Premium Works</a> **</strong></div>
	
	<?php
	echo '</div>';
	
	echo '</div>';
		
		
	// BUILD ADMIN PAGE IF STATEMENT
	//BLENDER
	echo '<div class="cooking-key-wrapper">';
	if ($term = term_exists ('blender', 'category') && $category_id = get_term_by('slug', 'blender', 'category')){
		if ($term !==0 && $term !== null) {
			$category_link = get_category_link( $category_id );
			if ($category_link !==0 && $category_link !== null) {
				echo '<span class="ck-blender ', $cookingkeyicon, '" alt="Gluten Free Recipe Symbol"></span>';
				echo 'Blender Link: <a class="cooking-key" href="'. esc_url( $category_link ).'">'. $category_link . '</a>';
				echo '<img src="'. esc_url( plugins_url( 'checkmark.png', __FILE__ ) ) .'" alt="Checkmark Icon" class="admin-recipe-check" width="25">';
			}
		} 
	} elseif ($term = term_exists ('blender', 'post_tag') && $tag_id = get_term_by('slug', 'blender', 'post_tag')) {
		if ($term !==0 && $term !== null) {
			$tag_link = get_tag_link($tag_id);
			if ($tag_link !==0 && $tag_link !== null) {
				echo '<span class="ck-blender ', $cookingkeyicon, '" alt="Blender Symbol"></span>';
				echo 'Blender Link: <a class="cooking-key" href="'. esc_url( $tag_link ).'">' . $tag_link . '</a>';
				echo '<img src="'. esc_url( plugins_url( 'checkmark.png', __FILE__ ) ) .'" alt="Checkmark Icon" class="admin-recipe-check" width="25">';
			}
		}
	} else {
			echo '<span class="ck-blender ', $cookingkeyicon, '" alt="Gluten Free Recipe Symbol"></span>';
			echo 'Cannot Find Blender Tag, Category and/or Slug. <img src="'. esc_url( plugins_url( 'redx.png', __FILE__ ) ) .'" alt="Red X" class="recipe-x-icon" width="25">';
	}
	echo '</br>';
	echo '</div>';
	
	//GRILL
	echo '<div class="cooking-key-wrapper">';
if ($term = term_exists ('grill', 'category') && $category_id = get_term_by('slug', 'grill', 'category')) {
		if ($term !==0 && $term !== null) {
			$category_link = get_category_link( $category_id );
			if ($category_link !==0 && $category_link !== null) {
				echo '<span class="ck-grill ', $cookingkeyicon, '" alt="Grill Symbol"></span>';
				echo 'Grill Link: <a class="cooking-key" href="'. esc_url( $category_link ).'">'. $category_link . '</a>';
				echo '<img src="'. esc_url( plugins_url( 'checkmark.png', __FILE__ ) ) .'" alt="Checkmark Icon" class="admin-recipe-check" width="25">';
			}
		}
	} elseif ($term = term_exists ('grill', 'post_tag') && $tag_id = get_term_by('slug', 'grill', 'post_tag')) {
		if ($term !==0 && $term !== null) {
			$tag_link = get_tag_link($tag_id);
			if ($tag_link !==0 && $tag_link !== null) {
				echo '<span class="ck-grill ', $cookingkeyicon, '" alt="Grill Symbol"></span>';
				echo 'Grill Link: <a class="cooking-key" href="'. esc_url( $tag_link ).'">' . $tag_link . '</a>';
				echo '<img src="'. esc_url( plugins_url( 'checkmark.png', __FILE__ ) ) .'" alt="Checkmark Icon" class="admin-recipe-check" width="25">';
			}
		}
	} else {
			echo '<span class="ck-grill ', $cookingkeyicon, '" alt="Grill Symbol"></span>';
			echo 'Cannot Find Grill Tag, Category and/or Slug.  <img src="'. esc_url( plugins_url( 'redx.png', __FILE__ ) ) .'" alt="Red X" class="recipe-x-icon" width="25">';
	}
	echo '</br>';	
	echo '</div>';
	
	//OVEN
	echo '<div class="cooking-key-wrapper">';
	if ($term = term_exists ('oven', 'category') && $category_id = get_term_by('slug', 'oven', 'category')) {
		if ($term !==0 && $term !== null) {
			$category_link = get_category_link( $category_id );
			if ($category_link !==0 && $category_link !== null) {
				echo '<span class="ck-oven ', $cookingkeyicon, '" alt="Oven Symbol"></span>';
				echo 'Oven: Link: <a class="cooking-key" href="'. esc_url( $category_link ).'">'. $category_link . '</a>';
				echo '<img src="'. esc_url( plugins_url( 'checkmark.png', __FILE__ ) ) .'" alt="Checkmark Icon" class="admin-recipe-check" width="25">';
			}
		}
	} elseif ($term = term_exists ('oven', 'post_tag') && $tag_id = get_term_by('slug', 'oven', 'post_tag'))  {
		if ($term !==0 && $term !== null) {
			$tag_link = get_tag_link($tag_id);
			if ($tag_link !==0 && $tag_link !== null) {
				echo '<span class="ck-oven ', $cookingkeyicon, '" alt="Oven Symbol"></span>';
				echo 'Oven Link: <a class="cooking-key" href="'. esc_url( $tag_link ).'">' . $tag_link . '</a>';
				echo '<img src="'. esc_url( plugins_url( 'checkmark.png', __FILE__ ) ) .'" alt="Checkmark Icon" class="admin-recipe-check" width="25">';
			}
		}
	} else {
			echo '<span class="ck-oven ', $cookingkeyicon, '" alt="Oven Symbol"></span>';
			echo 'Cannot Find Oven Tag, Category and/or Slug. <img src="'. esc_url( plugins_url( 'redx.png', __FILE__ ) ) .'" alt="Red X" class="recipe-x-icon" width="25">';
	}
	echo '</br>';	
	echo '</div>';
	
	//SLOW COOKER
	echo '<div class="cooking-key-wrapper">';
	if ($term = term_exists ('slow cooker', 'category') && $category_id = get_term_by('slug', 'slow-cooker', 'category')) {
		if ($term !==0 && $term !== null) {
			$category_link = get_category_link( $category_id );
			if ($category_link !==0 && $category_link !== null) {
				echo '<span class="ck-slow-cooker ', $cookingkeyicon, '" alt="Slow Cooker Symbol"></span>';
				echo 'Slow Cooker Link: <a class="cooking-key" href="'. esc_url( $category_link ).'">'. $category_link . '</a>';
				echo '<img src="'. esc_url( plugins_url( 'checkmark.png', __FILE__ ) ) .'" alt="Checkmark Icon" class="admin-recipe-check" width="25">';
			}
		}
	} elseif ($term = term_exists ('slow cooker', 'post_tag') && $tag_id = get_term_by('slug', 'slow-cooker', 'post_tag')) {
		if ($term !==0 && $term !== null) {
			$tag_link = get_tag_link($tag_id);
			if ($tag_link !==0 && $tag_link !== null) {
				echo '<span class="ck-slow-cooker ', $cookingkeyicon, '" alt="Slow Cooker Symbol"></span>';
				echo 'Slow Cooker Link: <a class="cooking-key" href="'. esc_url( $tag_link ).'">' . $tag_link . '</a>';
				echo '<img src="'. esc_url( plugins_url( 'checkmark.png', __FILE__ ) ) .'" alt="Checkmark Icon" class="admin-recipe-check" width="25">';
			}
		}
	} else {
			echo '<span class="ck-slow-cooker ', $cookingkeyicon, '" alt="Slow Cooker Symbol"></span>';
			echo 'Cannot Find Slow Cooker Tag, Category and/or Slug. <img src="'. esc_url( plugins_url( 'redx.png', __FILE__ ) ) .'" alt="Red X" class="recipe-x-icon" width="25">';
	}
	echo '</br>';	
	echo '</div>';
	
	//STOVETOP
	echo '<div class="cooking-key-wrapper">';
	if ($term = term_exists ('stovetop', 'category') && $category_id = get_term_by('slug', 'stovetop', 'category')) {
		if ($term !==0 && $term !== null) {
			$category_link = get_category_link( $category_id );
			if ($category_link !==0 && $category_link !== null) {
				echo '<span class="ck-stove-top ', $cookingkeyicon, '" alt="Stovetop Symbol"></span>';
				echo 'Stovetop Link: <a class="cooking-key" href="'. esc_url( $category_link ).'">'. $category_link . '</a>';
				echo '<img src="'. esc_url( plugins_url( 'checkmark.png', __FILE__ ) ) .'" alt="Checkmark Icon" class="admin-recipe-check" width="25">';
			}
		} 
	} elseif ($term = term_exists ('stovetop', 'post_tag') && $tag_id = get_term_by('slug', 'stovetop', 'post_tag')) {
		if ($term !==0 && $term !== null) {
			$tag_link = get_tag_link($tag_id);
			if ($tag_link !==0 && $tag_link !== null) {
				echo '<span class="ck-stove-top ', $cookingkeyicon, '" alt="Stovetop Free Recipe Symbol"></span>';
				echo 'Stovetop Link: <a class="cooking-key" href="'. esc_url( $tag_link ).'">' . $tag_link . '</a>';
				echo '<img src="'. esc_url( plugins_url( 'checkmark.png', __FILE__ ) ) .'" alt="Checkmark Icon" class="admin-recipe-check" width="25">';
			}
		}
	} else {
			echo '<span class="ck-stove-top ', $cookingkeyicon, '" alt="Stovetop Symbol"></span>';
			echo 'Cannot Find Stovetop Tag, Category and/or Slug. <img src="'. esc_url( plugins_url( 'redx.png', __FILE__ ) ) .'" alt="Red X" class="recipe-x-icon" width="25">';
	}
	echo '</br>';
	echo '</div>';
	
	
}

}


