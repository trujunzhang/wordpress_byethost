<?php
/*
 * Visitor choise for loop-style
 * 
 */
add_action( 'firmasite_settings_open', "firmasite_plugin_options_loop_style_settings");
function firmasite_plugin_options_loop_style_settings(){
	global $firmasite_settings;
	
	if ( isset($_SERVER['HTTP_REFERER']) && substr($_SERVER['HTTP_REFERER'], strlen(get_bloginfo('url')), 23) == '/wp-admin/customize.php' ) return;
	
	if( isset($_GET['loop-style']) ){
			setcookie('firmasite-loop-style', esc_attr($_GET['loop-style']),0,"/");
			$firmasite_settings["loop-style"] = 	esc_attr($_GET['loop-style']);	
	} else if( isset($_COOKIE['firmasite-loop-style']) ){
		$firmasite_settings["loop-style"] = 	esc_attr($_COOKIE['firmasite-loop-style']);			
	}

}


add_action( 'firmasite_settings_panel', "firmasite_plugin_options_loop_style_panel");
function firmasite_plugin_options_loop_style_panel(){
	global $firmasite_settings;
?>
<div class="btn-group">
<button class="btn btn-default btn-small dropdown-toggle" data-toggle="dropdown"><?php _e( 'Loop Style', "firmasite-options" ); ?> <span class="caret"></span></button>
<ul class="dropdown-menu">
	<?php 
		$loop_style_list = array(
			'loop-list' => esc_attr__( 'Ordered List', "firmasite-options" ),
			'loop-excerpt' => esc_attr__( 'Ordered List (Excerpt)', "firmasite-options" ),
			'loop-tile' => esc_attr__( 'Vertical List (Excerpt)', "firmasite-options" ),
		);
		foreach ($loop_style_list as $loop_style_id => $loop_style_name) { 
			if( (!isset($_GET['loop-style']) && isset($_COOKIE['firmasite-loop-style']) && $loop_style_id == $_COOKIE['firmasite-loop-style']) || (isset($_GET['loop-style']) && $loop_style_id == $_GET['loop-style']) || (!isset($_GET['loop-style']) && !isset($_COOKIE['firmasite-loop-style']) && $loop_style_id == $firmasite_settings["loop-style"] )) {
				$active = "active";
			} else {
				$active = "";
			}
	?>
		 <li class="<?php echo $active; ?>">
         	<a href="?loop-style=<?php echo $loop_style_id; ?>" rel="nofollow" >
				<?php if(!empty($active)) echo '<i class="icon-ok"></i> '; echo $loop_style_name; ?>
             </a>
         </li>
	<?php } ?>
</ul>
</div>
<?php	
}