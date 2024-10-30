<?php

/*
  Plugin Name: Cooking Key
  Plugin URI: 
  Description: Cooking Key adds cooking method icons to your recipe posts by integrating with your categories and tags. It provides users with a quick and simple visual of the key cooking methods of the recipes on your site!
  Version: 0.1.2
  Author: Dave Perkins
  Author URI: https://recipekeyplugin.com
  Text Domain: cooking-key
 
*/ 	

// ABORT IF PLUGIN IS CALLED DIRECTLY
if ( ! defined( 'WPINC' ) ) {
	 die;
}
// checks to see if recipe key plugin is active
include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
if (is_plugin_active('recipe-key-plugin/recipe-key.php')) {
	$cookingkeywrap = 'cooking-key-combine';
} else {
	$cookingkeywrap = 'cooking-key-wrap';
}
		
//$cookingkeywrap = 'cooking-key-wrap';
$cookingkeydiet = 'cooking-key-diet';
$cookingkeyicon = 'cooking-key-icon';


/*****************************************

_______ ______  _______ _____ __   _
 |_____| |     \ |  |  |   |   | \  |
 |     | |_____/ |  |  | __|__ |  \_|
 This section initiates the admin page.
 
********************************************/



// INCLUDE DEPENDANCIES
foreach ( glob( plugin_dir_path( __FILE__ ) . 'admin/*.php' ) as $file ) {
	include_once $file;
}

add_action( 'plugins_loaded', 'CKP_admin_settings' );

//START ADMIN PAGE
function CKP_admin_settings() {

	$plugin = new CKP_Submenu( new CKP_Submenu_Page() );
	$plugin->init();

}

/************************************************

 _______ _____ ______  _______ ______  _______  ______
 |______   |   |     \ |______ |_____] |_____| |_____/
 ______| __|__ |_____/ |______ |_____] |     | |    \_
 This section creates the sidebar widget.
 
***************************************************/


class CKP_Widget extends WP_Widget {
	
	 // CREATE WIDGET CONSTRUCT
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'CKP_widget',
			'description' => 'sidebar widget for cooking key',
		);
		parent::__construct( 'CKP_widget', 'Cooking Key Sidebar', $widget_ops );
	}
	 
	// WIDGET FRONTEND CONSTRUCT
	public function widget( $args, $instance ) {
		
		global $cookingkeywrap;
		global $cookingkeydiet;
		global $cookingkeyicon;	
		

		
		echo $args['before_widget'];
	
		//SHOW COOKING KEY LOGO
		echo '<div align="center" class="cooking-key-logo" ><img src="'. esc_url( plugins_url( '/images/cooking-key-title.png', __FILE__ ) ) .'" alt="Cooking Key Plugin Logo" width="120" class="cooking-key-logo-image"></div>';
		
				
		//BEGIN COOKING KEY IF STATEMENT	 	
		
		 echo '<div class="cooking-legend-wrap">';
		 
		//BLENDER
		$term = term_exists ('blender', 'category');
		if ($term !==0 && $term !== null) {
			$category_id = get_term_by('slug', 'blender', 'category'); 
			$category_link = get_category_link( $category_id );
			echo '<a class="cooking-key-legend" href="'. esc_url( $category_link ).'"><span class="ck-blender"', $cookingkeyicon, '" alt="Blender Symbol"></span><div class="', $cookingkeydiet, '">Blender</div></a>';
		} else {
		$term = term_exists ('blender', 'post_tag');
		if ($term !==0 && $term !== null) {
			$tag_id = get_term_by('slug', 'blender', 'post_tag');
			$tag_link = get_tag_link($tag_id);
			echo '<a class="cooking-key-legend" href="'. esc_url( $tag_link ).'"><span class="ck-blender"', $cookingkeyicon, '" alt="Blender Symbol"></span><div class="', $cookingkeydiet, '">Blender</div></a>';
		}
		}
		
		
		//GRILL
		$term = term_exists ('grill', 'category');
		if ($term !==0 && $term !== null) {
			$category_id = get_term_by('slug', 'grill', 'category'); 
			$category_link = get_category_link( $category_id );
			echo '<a class="cooking-key-legend" href="'. esc_url( $category_link ).'"><span class="ck-grill"', $cookingkeyicon, '" alt="Grill Symbol"></span><div class="', $cookingkeydiet, '">Grill</div></a>';
		} else {
		$term = term_exists ('grill', 'post_tag');
		if ($term !==0 && $term !== null) {
			$tag_id = get_term_by('slug', 'grill', 'post_tag');
			$tag_link = get_tag_link($tag_id);
			echo '<a class="cooking-key-legend" href="'. esc_url( $tag_link ).'"><span class="ck-grill"', $cookingkeyicon, '" alt="Grill Symbol"></span><div class="', $cookingkeydiet, '">Grill</div></a>';
		}
		}	
		
		
		//OVEN
		$term = term_exists ('oven', 'category');
		if ($term !==0 && $term !== null) {
			$category_id = get_term_by('slug', 'oven', 'category'); 
			$category_link = get_category_link( $category_id );
			echo '<a class="cooking-key-legend" href="'. esc_url( $category_link ).'"><span class="ck-oven"', $cookingkeyicon, '" alt="Oven Symbol"></span><div class="', $cookingkeydiet, '">Oven</div></a>';
		} else {
		$term = term_exists ('oven', 'post_tag');
		if ($term !==0 && $term !== null) {
			$tag_id = get_term_by('slug', 'oven', 'post_tag');
			$tag_link = get_tag_link($tag_id);
			echo '<a class="cooking-key-legend" href="'. esc_url( $tag_link ).'"><span class="ck-oven"', $cookingkeyicon, '" alt="Oven Symbol"></span><div class="', $cookingkeydiet, '">Oven</div></a>';
		}
		}	
		
		//SLOW COOKER
		$term = term_exists ('slow cooker', 'category');
		if ($term !==0 && $term !== null) {
			$category_id = get_term_by('slug', 'slow cooker', 'category'); 
			$category_link = get_category_link( $category_id );
			echo '<a class="cooking-key-legend" href="'. esc_url( $category_link ).'"><span class="ck-slow-cooker"', $cookingkeyicon, '" alt="Slow Cooker Symbol"></span><div class="', $cookingkeydiet, '">Slow Cooker</div></a>';
		} else {
		$term = term_exists ('slow cooker', 'post_tag');
		if ($term !==0 && $term !== null) {
			$tag_id = get_term_by('slug', 'slow cooker', 'post_tag');
			$tag_link = get_tag_link($tag_id);
			echo '<a class="cooking-key-legend" href="'. esc_url( $tag_link ).'"><span class="ck-slow-cooker"', $cookingkeyicon, '" alt="Slow Cooker Symbol"></span><div class="', $cookingkeydiet, '">Slow Cooker</div></a>';
		}
		}	
		
		//STOVETOP
		$term = term_exists ('stovetop', 'category');
		if ($term !==0 && $term !== null) {
			$category_id = get_term_by('slug', 'stovetop', 'category'); 
			$category_link = get_category_link( $category_id );
			echo '<a class="cooking-key-legend" href="'. esc_url( $category_link ).'"><span class="ck-stove-top"', $cookingkeyicon, '" alt="Stovetop Symbol"></span><div class="', $cookingkeydiet, '">Stovetop</div></a>';
		} else {
		$term = term_exists ('stovetop', 'post_tag');
		if ($term !==0 && $term !== null) {
			$tag_id = get_term_by('slug', 'stovetop', 'post_tag');
			$tag_link = get_tag_link($tag_id);
			echo '<a class="cooking-key-legend" href="'. esc_url( $tag_link ).'"><span class="ck-stove-top"', $cookingkeyicon, '" alt="Stovetop Symbol"></span><div class="', $cookingkeydiet, '">Stovetop</div></a>';
		}
		}	
		
	echo '</div>';

	echo $args['after_widget'];
	}
	
	// SIDEBAR WIDEGT BACKEND
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'text_domain' );
		?>
		<p>
		<strong>Place this in your sidebar and you're done!</strong>
		</p>
		<p>
		<Strong>Additional Features with <a href="https://recipekeyplugin.com" target="_blank">Cooking Key Premium</a>!</strong>
		</p>
		
		
    <?php	
	}
}

// REGISTER CKP_Widget
add_action( 'widgets_init', function(){
	register_widget( 'CKP_Widget' );
});

/*********************************************


 _______ _______ _____ __   _
 |  |  | |_____|   |   | \  |
 |  |  | |     | __|__ |  \_|
 Main blog post section                            
							 
							 
*******************************************/

function CKP_Main($content)
{
	//LOAD IF HOME ARCHIVE OR SINGLE
	if ( is_home() || is_archive() || is_single() )
    {
   
		global $cookingkeywrap;
		global $cookingkeydiet;
		global $cookingkeyicon;	

	
		// START MAIN POST IF STATEMENT
		echo '<div class="', $cookingkeywrap, '">';
		
		//BLENDER
		if ( in_category('blender') ) {
			$category_id = get_term_by('slug', 'blender', 'category'); 
			$category_link = get_category_link( $category_id );
			echo '<a class="cooking-key" href="'. esc_url( $category_link ).'"><span class="ck-blender ', $cookingkeyicon, '" alt="Blender Symbol"></span><div class="', $cookingkeydiet, '">Blender</div></a>';
		} else {
		if ( has_tag( 'blender' )) {
			$tag_id = get_term_by('slug', 'blender', 'post_tag');
			$tag_link = get_tag_link($tag_id);
			echo '<a class="cooking-key" href="'. esc_url( $tag_link ).'"><span class="ck-blender ', $cookingkeyicon, '" alt="Blender Symbol"></span><div class="', $cookingkeydiet, '">Blender</div></a>';
		}
		}
		
		//GRILL
		if ( in_category( 'grill') )  {
			$category_id = get_term_by('slug', 'grill', 'category'); 
			$category_link = get_category_link( $category_id );
			echo '<a class="cooking-key" href="'. esc_url( $category_link ).'"><span class="ck-grill ', $cookingkeyicon, '" alt="Grill Symbol"></span><div class="', $cookingkeydiet, '">Grill</div></a>';
		} else {
		if ( has_tag( 'grill') ) {
			$tag_id = get_term_by('slug', 'grill', 'post_tag');
			$tag_link = get_tag_link($tag_id);
			echo '<a class="cooking-key" href="'. esc_url( $tag_link ).'"><span class="ck-grill ', $cookingkeyicon, '" alt="Grill Symbol"></span><div class="', $cookingkeydiet, '">Grill</div></a>';
		}
		}	
		
		//OVEN
		if ( in_category( 'oven') )  {
			$category_id = get_term_by('slug', 'oven', 'category'); 
			$category_link = get_category_link( $category_id );
			echo '<a class="cooking-key" href="'. esc_url( $category_link ).'"><span class="ck-oven ', $cookingkeyicon, '" alt="Oven Symbol"></span><div class="', $cookingkeydiet, '">Oven</div></a>';
		} else {
		if ( has_tag( 'oven') ) {
			$tag_id = get_term_by('slug', 'oven', 'post_tag');
			$tag_link = get_tag_link($tag_id);
			echo '<a class="cooking-key" href="'. esc_url( $tag_link ).'"><span class="ck-oven ', $cookingkeyicon, '" alt="Oven Symbol"></span><div class="', $cookingkeydiet, '">Oven</div></a>';
		}
		}	
		
		//SLOW COOKER
		if ( in_category( 'slow cooker') ||  (in_category('slow-cooker')))  {
			$category_id = get_term_by('slug', 'slow cooker', 'category'); 
			$category_link = get_category_link( $category_id );
			echo '<a class="cooking-key" href="'. esc_url( $category_link ).'"><span class="ck-slow-cooker ', $cookingkeyicon, '" alt="Slow Cooker Symbol"></span><div class="', $cookingkeydiet, '">Slow Cooker</div></a>';
		} else {
		if ( has_tag( 'slow cooker') || (has_tag('slow-cooker') )) {
			$tag_id = get_term_by('slug', 'slow cooker', 'post_tag');
			$tag_link = get_tag_link($tag_id);
			echo '<a class="cooking-key" href="'. esc_url( $tag_link ).'"><span class="ck-slow-cooker ', $cookingkeyicon, '" alt="Slow Cooker Symbol"></span><div class="', $cookingkeydiet, '">Slow Cooker</div></a>';
		}
		}
		
		//STOVETOP
		if ( in_category( 'stovetop')  )  {
			$category_id = get_term_by('slug', 'stovetop', 'category'); 
			$category_link = get_category_link( $category_id );
			echo '<a class="cooking-key" href="'. esc_url( $category_link ).'"><span class="ck-stove-top ', $cookingkeyicon, '" alt="Stovetop Symbol"></span><div class="', $cookingkeydiet, '">Stovetop</div></a>';
		} else {
		if ( has_tag( 'stovetop')  ) {
			$tag_id = get_term_by('slug', 'stovetop', 'post_tag');
			$tag_link = get_tag_link($tag_id);
			echo '<a class="cooking-key" href="'. esc_url( $tag_link ).'"><span class="ck-stove-top ', $cookingkeyicon, '" alt="Stovetop Symbol"></span><div class="', $cookingkeydiet, '">Stovetop</div></a>';
		}
		}
		
		echo "</div>";
		// IF RECPIE KEY IS LOADED THEN
		//if ( function_exists('RK_Main') ) { 
		if (is_plugin_active('recipe-key-plugin/recipe-key.php')) {
	} else {
		// IF RECPIE KEY IS NOT LOADED THEN
		echo "<br>";
		return $content; // return content with widget Code
	}	
	
	//IF NOT SINGLE, ARCHIVE, OR HOME PAGE THEN DISPLAY CONTENT
	} else {
		return $content; // return content with widget Code
	}
}

// IF GENESIS - HOOK INTO GENESIS, ELSE HOOK INTO WORDPRESS
if( 'genesis' == get_option( 'template' ) ) {
    add_action('genesis_before_entry_content', 'CKP_Main'); // For Genesis Theme hook into before entry.
  } else {
	  add_filter( 'the_content', 'CKP_Main' ); //For all other wordpress themes, hook into before 'the_content'
  }


/***************************************************

 _______ _______ __   __        _______
 |______    |      \_/   |      |______
 ______|    |       |    |_____ |______
 add css to plugin
 
****************************************************/

// ADD STYLE CSS TO RECPE KEYS
function CKP_css() {
    $plugin_url = plugin_dir_url( __FILE__ );

    wp_enqueue_style( 'ck-style', $plugin_url . 'ck-style.css' );
  
}
add_action( 'wp_enqueue_scripts', 'CKP_css' );

