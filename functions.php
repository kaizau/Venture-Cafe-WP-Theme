<?php

// Redefines twentyten_setup to exclude custom header & background support 
function twentyten_setup() {
	add_editor_style();
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	load_theme_textdomain( 'twentyten', TEMPLATEPATH . '/languages' );
	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'twentyten' ),
	) );
}


// Theme options definitions
add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'vc_options', 'vc_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options' ), __( 'Theme Options' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create arrays for our select and radio options
 */
$select_options = array(
	'0' => array(
		'value' =>	'0',
		'label' => __( 'Zero' )
	),
	'1' => array(
		'value' =>	'1',
		'label' => __( 'One' )
	),
	'2' => array(
		'value' => '2',
		'label' => __( 'Two' )
	),
	'3' => array(
		'value' => '3',
		'label' => __( 'Three' )
	),
	'4' => array(
		'value' => '4',
		'label' => __( 'Four' )
	),
	'5' => array(
		'value' => '3',
		'label' => __( 'Five' )
	)
);

$radio_options = array(
	'yes' => array(
		'value' => 'yes',
		'label' => __( 'Yes' )
	),
	'no' => array(
		'value' => 'no',
		'label' => __( 'No' )
	),
	'maybe' => array(
		'value' => 'maybe',
		'label' => __( 'Maybe' )
	)
);

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>Landing Page Options</h2>"; ?>

		<?php if ( false !== $_REQUEST['updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
		<?php endif; ?>
		
		<p>For links, copy & paste the full URL (i.e. http://venturecafe.net) to ensure that everything works correctly.</p>
		
		<form method="post" action="options.php">
			<?php settings_fields( 'vc_options' ); ?>
			<?php $options = get_option( 'vc_theme_options' ); ?>
			
			<table class="form-table">
				
				<tr valign="top"><th scope="row" colspan="2"><h2><?php _e( 'Bottom Boxes' ); ?></h2></th></tr>
				
				<tr valign="top"><th scope="row" colspan="2"><h3><?php _e( 'Left Box (blog feed)' ); ?></h3></th></tr>
				
				<tr valign="top"><th scope="row"><?php _e( 'Title' ); ?></th>
					<td>
						<input class="regular-text" type="text" name="vc_theme_options[left][title]" value="<?php esc_attr_e( $options['left']['title'] ); ?>" />
						<label><?php _e( 'Defaults to "Fresh Brewed Blog"' ); ?></label>
					</td>
				</tr>
				
				<tr valign="top"><th scope="row" colspan="2"><h3><?php _e( 'Middle Box' ); ?></h3></th></tr>
				
				<tr valign="top"><th scope="row"><?php _e( 'Title' ); ?></th>
					<td>
						<input class="regular-text" type="text" name="vc_theme_options[middle][title]" value="<?php esc_attr_e( $options['middle']['title'] ); ?>" />
						<label><?php _e( 'Large heading. Make it short and catchy!' ); ?></label>
					</td>
				</tr>
				
				<tr valign="top"><th scope="row"><?php _e( 'Title Link *' ); ?></th>
					<td>
						<input class="regular-text" type="text" name="vc_theme_options[middle][link]" value="<?php esc_attr_e( $options[middle][link] ); ?>" />
						<label><?php _e( '* REQUIRED when you also change the Title.' ); ?></label>
					</td>
				</tr>
				
				<tr valign="top"><th scope="row"><?php _e( 'Text' ); ?></th>
					<td>
						<input class="regular-text" type="text" name="vc_theme_options[middle][text]" value="<?php esc_attr_e( $options[middle][text] ); ?>" />
						<label><?php _e( 'Supporting copy. Give a bit more detail.' ); ?></label>
					</td>
				</tr>
				
				
				
				<tr valign="top"><th scope="row" colspan="2"><h3><?php _e( 'Right Box' ); ?></h3></th></tr>
				
				<tr valign="top"><th scope="row"><?php _e( 'Title' ); ?></th>
					<td>
						<input class="regular-text" type="text" name="vc_theme_options[right][title]" value="<?php esc_attr_e( $options[right][title] ); ?>" />
					</td>
				</tr>
				
				<tr valign="top"><th scope="row"><?php _e( 'Title Link *' ); ?></th>
					<td>
						<input class="regular-text" type="text" name="vc_theme_options[right][link]" value="<?php esc_attr_e( $options[right][link] ); ?>" />
					</td>
				</tr>
				
				<tr valign="top"><th scope="row"><?php _e( 'Text' ); ?></th>
					<td>
						<input class="regular-text" type="text" name="vc_theme_options[right][text]" value="<?php esc_attr_e( $options[right][text] ); ?>" />
					</td>
				</tr>
			
				<tr valign="top"><th scope="row" colspan="2"><h2><?php _e( 'Landing Page Slider' ); ?></h2><span><?php _e( 'If left blank, defaults to "1.jpg" and "Welcome!"' ); ?></span></th></tr>
			
		<?php for ( $n = 1; $n < 6; $n++ ) { ?>
			
				<tr valign="top"><th scope="row"><h3><?php _e( 'Slide ' . $n ); ?></h3></th></tr>
				
				<tr valign="top"><th scope="row"><?php _e( 'Title' ); ?></th>
					<td>
						<input class="regular-text" type="text" name="vc_theme_options[<?php echo $n; ?>][title]" value="<?php esc_attr_e( $options[$n][title] ); ?>" />
					</td>
				</tr>
				
				<tr valign="top"><th scope="row"><?php _e( 'Text' ); ?></th>
					<td>
						<input class="regular-text" type="text" name="vc_theme_options[<?php echo $n; ?>][text]" value="<?php esc_attr_e( $options[$n][text] ); ?>" />
					</td>
				</tr>
				
				<tr valign="top"><th scope="row"><?php _e( 'Link' ); ?></th>
					<td>
						<input class="regular-text" type="text" name="vc_theme_options[<?php echo $n; ?>][link]" value="<?php esc_attr_e( $options[$n][link] ); ?>" />
					</td>
				</tr>
				
				<tr valign="top"><th scope="row"><?php _e( 'Image' ); ?></th>
					<td>
						<span>Upload/rename your image to /wp-content/themes/vcafe/img/photos/<strong><?php echo $n ; ?>.jpg</strong></span>
					</td>
				</tr>
		
		<?php } ?>
		
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options' ); ?>"
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options, $radio_options;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['option1'] ) )
		$input['option1'] = null;
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );

	// Say our text option must be safe text with no HTML tags
	$input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['selectinput'], $select_options ) )
		$input['selectinput'] = null;

	// Our radio option must actually be in our array of radio options
	if ( ! isset( $input['radioinput'] ) )
		$input['radioinput'] = null;
	if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
		$input['radioinput'] = null;

	// Say our textarea option must be safe text with the allowed tags for posts
	$input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );
	
	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/