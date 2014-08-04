<?php
/*
 * Visitor choise for font
 * 
 */
add_action( 'firmasite_settings_close', "firmasite_plugin_options_font_settings"); 
function firmasite_plugin_options_font_settings(){
	global $firmasite_settings;
	
	if ( isset($_SERVER['HTTP_REFERER']) && substr($_SERVER['HTTP_REFERER'], strlen(get_bloginfo('url')), 23) == '/wp-admin/customize.php' ) return;
	
	if( isset($_GET['font']) ){
			setcookie('firmasite-font', esc_attr($_GET['font']),0,"/");
			$firmasite_settings["font"] = 	esc_attr($_GET['font']);	
	} else if( isset($_COOKIE['firmasite-font']) ){
		$firmasite_settings["font"] = 	esc_attr($_COOKIE['firmasite-font']);			
	}

}

add_action('wp_enqueue_scripts', "firmasite_plugin_options_font_script",999);
function firmasite_plugin_options_font_script(){
	// google font option
	wp_enqueue_script( 'formhelpers-selectbox', get_template_directory_uri() . '/assets/bootstrapformhelpers/js/bootstrap-formhelpers-selectbox.js', array( 'jquery' ), false, true);
	wp_enqueue_script( 'formhelpers-googlefonts-codes', get_template_directory_uri() . '/assets/bootstrapformhelpers/js/bootstrap-formhelpers-googlefonts.codes.js', array( 'jquery' ), false, true);
	wp_enqueue_script( 'formhelpers-googlefonts', get_template_directory_uri() . '/assets/bootstrapformhelpers/js/bootstrap-formhelpers-googlefonts.js', array( 'jquery' ), false, true);
	// google font option
	wp_enqueue_style( 'bootstrap-formhelpers', get_template_directory_uri() . '/assets/bootstrapformhelpers/css/bootstrap-formhelpers.css' );
}

add_action( 'firmasite_settings_panel', "firmasite_plugin_options_font_panel",1);
function firmasite_plugin_options_font_panel(){
	global $firmasite_settings;

			$data_subset = FIRMASITE_SUBSETS;
			$data_subsets = "";
			if (!empty($data_subset)) $data_subsets = 'data-subsets="'.$data_subset.'"';
			?>
            <p class="form-control-static pull-left" data-toggle="popover" data-html="true" data-trigger="hover" data-rel="popover" data-placement="bottom" data-content="<?php printf( __("Only <strong>%s</strong> supported fonts are displaying. You can modify font filter for supporting your language!", "firmasite-options"), FIRMASITE_SUBSETS ); ?>">	
                <?php _e("Font:", "firmasite-options");?> <i class="icon-globe"></i>&nbsp;
             </p>
           <form method="get" class="form-inline">
          <div id="firmasite-font" class="bfh-selectbox bfh-googlefonts" <?php  echo $data_subsets; ?> data-family="<?php if(isset($firmasite_settings["font"])) echo esc_textarea( $firmasite_settings["font"] ); ?>">
            <input type="hidden" name="font" value="<?php if(isset($firmasite_settings["font"])) echo esc_textarea( $firmasite_settings["font"] ); ?>">
            <a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#">
            <span class="bfh-selectbox-option" data-option=""></span>
            <b class="caret"></b>
            </a>
            <div class="bfh-selectbox-options">
              <input type="text" class="bfh-selectbox-filter form-control">
              <ul role="option">
              </ul>
            </div>
          </div>
          </form>
          <script>
		  jQuery("input[name=font]").change(function() {
			  jQuery(this).closest("form").submit();
		  });
              </script>
<?php	
}