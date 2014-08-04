<?php
/*
 * Visitor choise for style
 * 
 */
add_action( 'firmasite_settings_close', "firmasite_plugin_options_style_settings");
function firmasite_plugin_options_style_settings(){
	global $firmasite_settings;
	
	if ( isset($_SERVER['HTTP_REFERER']) && substr($_SERVER['HTTP_REFERER'], strlen(get_bloginfo('url')), 23) == '/wp-admin/customize.php' ) return;
	
	if( isset($_GET['style']) ){
		if (!array_key_exists($_GET['style'], $firmasite_settings["styles"])) {
			if(0 < count($firmasite_settings["styles"])) {
				// last option from style list
				$firmasite_settings["style"] = array_pop(array_keys($firmasite_settings["styles"]));			
			} else {
				// style list is empty.. fallback to united
				$firmasite_settings["style"] = "united";
			}
		} else {
			//Set cookie
			// 0 makes it only for session.. make it 1 for deleting cookie
			// "/" makes it all pages.. If we dont set it for "/", when visitor change style on child pages, only child-page's style is changing
			setcookie('firmasite-theme-style', esc_attr($_GET['style']),0,"/");
			$firmasite_settings["style"] = 	esc_attr($_GET['style']);	
		}
	} else if( isset($_COOKIE['firmasite-theme-style']) ){
		$firmasite_settings["style"] = 	esc_attr($_COOKIE['firmasite-theme-style']);			
	}

}


add_action( 'firmasite_settings_panel', "firmasite_plugin_options_style_panel");
function firmasite_plugin_options_style_panel(){
	global $firmasite_settings;
?>
<div class="btn-group">
<button class="btn btn-default btn-small dropdown-toggle" data-toggle="dropdown"><?php _e( 'Theme Style', "firmasite-options"); ?> <span class="caret"></span></button>
<ul class="dropdown-menu">
	<?php foreach ($firmasite_settings["styles"] as $style_id => $style_name) { 
			if( (!isset($_GET['style']) && isset($_COOKIE['firmasite-theme-style']) && $style_id == $_COOKIE['firmasite-theme-style']) || (isset($_GET['style']) && $style_id == $_GET['style']) || (!isset($_GET['style']) && !isset($_COOKIE['firmasite-theme-style']) && $style_id == $firmasite_settings["style"] )) {
				$active = "active";
			} else {
				$active = "";
			}
			
			if(!$firmasite_settings["thumbnail_url"][$style_id])
				$firmasite_settings["thumbnail_url"][$style_id] = $firmasite_settings["styles_url"][$style_id];
	?>
		 <li class="<?php echo $active; ?>" data-rel="popover" data-placement="right" data-container="body" data-trigger="hover" data-html="true" data-content="<img src='<?php echo $firmasite_settings["thumbnail_url"][$style_id]; ?>/thumbnail.png' alt='' style='width:180px; height:auto;' />">
         	<a href="?style=<?php echo $style_id; ?>" rel="nofollow" >
				<?php if(!empty($active)) echo '<i class="icon-ok"></i> '; echo $style_name; ?>
             </a>
         </li>
	<?php } ?>
</ul>
</div>
<?php	
}