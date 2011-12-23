<?php
/**
 * Template Name: Landing Page
 *
 * The home page of the Venture Cafe
 *
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header();
?>

<div class="group row">
	<section class="block">
		<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/img/cal.png">
	<?php
		$options = get_option('vc_theme_options');
		if ( $options['left']['title'] ) { ?>
		<h3><a href="<?php echo home_url(); ?>/blog"><?php echo $options['left']['title']; ?></a></h3>
	<?php } else { ?>
		<h3><a href="<?php echo home_url(); ?>/blog">Stay Informed</a></h3>
	<?php } ?>
		<ul>
		<?php
			global $post;
			$myposts = get_posts('numberposts=2');
			foreach($myposts as $post) :
			setup_postdata($post);
		?>
		<li><a href="<?php the_permalink(); ?>"><?php the_date('m/j', '<em>', '</em>'); the_title(); ?></a></li>
		<?php endforeach; ?>
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
