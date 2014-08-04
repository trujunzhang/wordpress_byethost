<?php
/*
Plugin Name: FirmaSite Options
Plugin URI: http://firmasite.com
Description: This plugin provides theme display options for users & visitors.
Version: 1.0
Author: Ünsal Korkmaz
Author URI: http://unsalkorkmaz.com
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl.txt
Text Domain:   firmasite-options
Domain Path:   /languages/
*/

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// You can translate Plugin Name with this
__("FirmaSite Options", "firmasite-options");
// You can translate description with this
__("This plugin provides theme display options for users & visitors.", "firmasite-options");


include("theme-options/firmasite-font.php"); // Font
include("theme-options/firmasite-layout.php"); // Layout
include("theme-options/firmasite-loop-style.php"); // Loop Style
include("theme-options/firmasite-style.php"); // Style
	
add_action("wp_head", "firmasite_plugin_options_header");
function firmasite_plugin_options_header(){
	if( !defined('FIRMASITE_POWEREDBY')) return;
	// dont activate @ theme customizer
	if ( isset($_SERVER['HTTP_REFERER']) && substr($_SERVER['HTTP_REFERER'], strlen(get_bloginfo('url')), 23) == '/wp-admin/customize.php' ) return;
	
	
	?>
	<style>
	#settings_panel { position:fixed; z-index:10000; left:0; top: 120px }
	#settings_panel_content form { display:inline-block; margin-bottom:0}
	#settings_panel_content .btn-group, #settings_panel_content .help-inline { vertical-align:top; display: inline-block;}
	#settings_panel .popover { z-index:10001;}
	
	</style>
	<?php
}

add_action("wp_footer", "firmasite_plugin_options_footer");
function firmasite_plugin_options_footer(){
	if( !defined('FIRMASITE_POWEREDBY')) return;
	// dont activate @ theme customizer
	if ( isset($_SERVER['HTTP_REFERER']) && substr($_SERVER['HTTP_REFERER'], strlen(get_bloginfo('url')), 23) == '/wp-admin/customize.php' ) return;
	?>
	<div id="settings_panel" class="pull-left hidden-xs hidden-sm">  
	 <div class="pull-left" data-container="body" data-toggle="tooltip" data-rel="tooltip" data-placement="top" data-title="<?php _e("You can change some options and watch the theme's magic :)", "firmasite-options"); ?>">	
		<button id="settings_panel_icon" type="button" class="btn btn-sm btn-danger pull-left"><i class="icon-cog"></i></button>
	 </div>
	 <div id="settings_panel_content" class="pull-left" style="display: none;"><div class="panel firmasite-modal-static"><div class="panel-footer">
				<?php do_action("firmasite_settings_panel"); ?>
	 </div></div></div>
	</div>
	<script>
		jQuery('#settings_panel_icon').click(function() {
			jQuery("#settings_panel_content").slideToggle();
		});
	</script>
	<?php
}


// Load translations
add_action('plugins_loaded', "firmasite_plugin_options_language_init");
function firmasite_plugin_options_language_init() {
	load_plugin_textdomain( 'firmasite-options', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );	
}




