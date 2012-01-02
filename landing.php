<?php
/**
 * Template Name: Landing Page
 *
 * The home page of the Venture Cafe
 *
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

$options = get_option('vc_theme_options');
$myposts = get_posts(array('numberposts'=>2,'category_name'=>'this-week-in-the-cafe'));

get_header();
?>

<div class="group row">
	<section class="block">
		<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/img/cal.png">
	<?php
		if ( $options['left']['title'] ) { ?>
		<h3><a href="<?php echo home_url(); ?>/blog"><?php echo $options['left']['title']; ?></a></h3>
	<?php } else { ?>
		<h3><a href="<?php echo home_url(); ?>/blog">Stay Informed</a></h3>
	<?php } ?>
		<ul>
      <?php foreach ($myposts as $post) { ?>
        <li>
          <a href="<?php echo get_permalink($post->ID); ?>">
            <em><?php echo get_date_from_gmt($post->post_date_gmt, 'm/j'); ?></em>
            <?php echo get_the_title($post->ID); ?>
          </a>
        </li>
      <?php } ?>
		</ul>
	</section>

	<section class="block">
		<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/img/beer.png">
	<?php if ( $options['middle']['title'] && $options['middle']['link'] ) { ?>
		<h3><a href="<?php echo $options['middle']['link']; ?>"><?php echo $options['middle']['title']; ?></a></h3>
	<?php } else { ?>
		<h3><a href="<?php echo home_url(); ?>/open-office-hours">Hold an Event</a></h3>
	<?php } ?>
	<?php if ( $options['middle']['text'] ) { ?>
		<p><?php echo $options['middle']['text']; ?></p>
	<?php } else { ?>
		<p>Plan office hours, organize a gathering, bring together interesting people!</p>
	<?php } ?>
	</section>

	<section id="login_state" class="block">
	</section>
</div>

<?php get_footer(); ?>
