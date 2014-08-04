<?php
/*
 * Visitor choise for layout
 * 
 */
add_action( 'firmasite_settings_open', "firmasite_plugin_options_layout_settings");
function firmasite_plugin_options_layout_settings(){
	global $firmasite_settings;
	
	if ( isset($_SERVER['HTTP_REFERER']) && substr($_SERVER['HTTP_REFERER'], strlen(get_bloginfo('url')), 23) == '/wp-admin/customize.php' ) return;
	
	if( isset($_GET['layout']) ){
			setcookie('firmasite-layout', esc_attr($_GET['layout']),0,"/");
			$firmasite_settings["layout"] = 	esc_attr($_GET['layout']);	
	} else if( isset($_COOKIE['firmasite-layout']) ){
		$firmasite_settings["layout"] = 	esc_attr($_COOKIE['firmasite-layout']);			
	}

}


add_action( 'firmasite_settings_panel', "firmasite_plugin_options_layout_panel");
function firmasite_plugin_options_layout_panel(){
	global $firmasite_settings;
?>
<div class="btn-group">
<button class="btn btn-default btn-small dropdown-toggle" data-toggle="dropdown"><?php _e( 'Layout', "firmasite-options" ); ?> <span class="caret"></span></button>
<ul class="dropdown-menu">
	<?php 
		$layout_list = array(
			'content-sidebar' => esc_attr__( 'Content - Sidebar', "firmasite-options" ),
			'sidebar-content' => esc_attr__( 'Sidebar - Content', "firmasite-options" ),
			'only-content' => esc_attr__( 'Only Content. No sidebar (Short)', "firmasite-options" ),
			'only-content-long' => esc_attr__( 'Only Content. No sidebar (Long)', "firmasite-options" ),
		);
		foreach ($layout_list as $layout_id => $layout_name) { 
			if( (!isset($_GET['layout']) && isset($_COOKIE['firmasite-layout']) && $layout_id == $_COOKIE['firmasite-layout']) || (isset($_GET['layout']) && $layout_id == $_GET['layout']) || (!isset($_GET['layout']) && !isset($_COOKIE['firmasite-layout']) && $layout_id == $firmasite_settings["layout"] )) {
				$active = "active";
			} else {
				$active = "";
			}
	?>
		 <li class="<?php echo $active; ?>">
         	<a href="?layout=<?php echo $layout_id; ?>" rel="nofollow" >
				<?php if(!empty($active)) echo '<i class="icon-ok"></i> '; echo $layout_name; ?>
             </a>
         </li>
	<?php } ?>
</ul>
</div>
<?php	
}