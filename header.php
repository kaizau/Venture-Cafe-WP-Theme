<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]>	<html <?php language_attributes(); ?> class="no-js ie ie6"><![endif]-->
<!--[if IE 7 ]>		<html <?php language_attributes(); ?> class="no-js ie ie7"><![endif]-->
<!--[if IE 8 ]>		<html <?php language_attributes(); ?> class="no-js ie ie8"><![endif]-->
<!--[if IE 9 ]>		<html <?php language_attributes(); ?> class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<!-- 

Up, Up, Down, Down, Left, Right, Left, Right, B, A, Enter

-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/html5shivplus.js"></script>
</head>

<body <?php body_class(); ?>>

	<div id="topBar">
		<div class="pageWrap">
			<header id="header">
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				<<?php echo $heading_tag; ?> id="site-title">
					<a href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/venture130.png" alt="Venture Cafe" /><?php bloginfo( 'name' ); ?></a>
				</<?php echo $heading_tag; ?>>
			</header>
			
			<?php wp_nav_menu( array( 'container' => 'nav', 'container_id' => 'nav', 'menu_class' => 'menu group') ); ?>
			
			<aside class="details">
				<ul>
					<li class="location"><strong>Visit us:</strong><a href="http://goo.gl/maps/mBxs">1 Broadway Street, 4th floor, Cambridge, MA</a></li>
					<li>|</li>
					<li class="phone"><strong>Call us:</strong>617.758.4128</li>
					<li>|</li>
					<li class="twitter"><a title="Twitter" href="http://twitter.com/venturecafe"><span></span></a></li>
					<li class="facebook"><a title="Facebook" href="http://http://www.facebook.com/venture.cafe"><span></span></a></li>
					<li class="linkedin"><a title="LinkedIn" href="http://www.linkedin.com/groups?gid=2590112"><span></span></a></li>
					<li class="rss"><a title="RSS" href="<?php bloginfo('rss2_url'); ?>"><span></span></a></li>
					<li class="email"><a title="Email" href="&#109;&#97;&#105;&#108;&#116;&#111;&#58;&#105;&#110;&#102;&#111;&#64;&#118;&#101;&#110;&#116;&#117;&#114;&#101;&#99;&#97;&#102;&#101;&#46;&#110;&#101;&#116;"><span></span></a>
					<li class="calendar"><a title="Calendar" href=""><span></span></a></li>
				</ul>
			</aside>
		</div>
	</div>

	<div class="pageWrap">
		
		<div class="pageContainer group">
		
		<?php if ( is_front_page() ) { ?>
			<section id="jqGallery" class="group row">
				<div class="wrapper">
					<ul class="group">

					<?php
						$options = get_option('vc_theme_options');
						
						for ( $slide = 1; $slide < 6; $slide++ ) {
							if ( $options[$slide]['title'] || $options[$slide]['text'] || $options[$slide]['link'] ) {
					?>

						<li class="slide">
							<a href="<?php echo $options[$slide]['link'] ?>"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/img/photos/<?php echo $slide; ?>.jpg"></a>
							<div class="right">
							<!-- <?php if ( $options[$slide]['title'] ) { ?>
								<h2><?php echo $options[$slide]['title']; ?></h2>
							<?php } ?> -->
							<?php if ( $options[$slide]['text'] ) { ?>
								<h3><?php echo $options[$slide]['text']; ?></h3>
							<?php } ?>
							<!-- <?php if ( $options[$slide]['link'] ) { ?>
								<p><a href="<?php echo $options[$slide]['link'] ?>">Learn more &raquo;</a></p>
							<?php } ?> -->
								
							</div>
						</li>
					<?php } 
						}
					?>
					
					<?php if ( ( $options[1]['title'] == '' ) && ( $options[1]['text'] == '' ) ) { ?>
						<li class="slide">
							<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/img/photos/1.jpg">
							<div class="right">
								<h3><q>The café serves as a nexus for helping innovators and entrepreneurs find one another and collaborate to bring their dreams to reality.</q></h3>
							</div>
						</li>
					<?php } ?>
					
					</ul>
				</div>
			</section>
		<?php } else { ?>
			<header id="blogHeader">
			<?php
				$options = get_option('vc_theme_options');
				if ( $options['left']['title'] ) { ?>
				<h2><a href="<?php echo home_url(); ?>/blog"><?php echo $options['left']['title']; ?></a></h2>
			<?php } else { ?>
				<h2><a href="<?php echo home_url(); ?>/blog">Fresh Brewed Blog</a></h2>
			<?php } ?>
				<h3>Updates from the Venture Cafe</h3>
			</header>
		<?php } ?>