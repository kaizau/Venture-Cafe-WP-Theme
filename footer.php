<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
			<footer id="footer" class="group">
				<span id="credits">Designed by <a href="http://yifei.co" title="Yifei Zhang">Yifei Zhang</a></span>
				<span id="copyright">Copyright &copy; 2011 The Venture Cafe</span>
			</footer>

		</div>
	</div>

	<!-- JavaScript -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<script>!window.jQuery && document.write('<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-1.7.min.js"><\/script>')</script>
	<script src="http://konami-js.googlecode.com/svn/trunk/konami.js"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.anythingslider.js"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.easing.1.2.js"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/script.js"></script>

	<!--[if lt IE 7 ]>
		<script src="<?php bloginfo('stylesheet_directory'); ?>/js/DD_belatedPNG_0.0.8a-min.js"></script>
		<script>
			DD_belatedPNG.fix('.block img, .details span');
		</script>
	<![endif]-->

	<script>
		var _gaq = [['_setAccount', 'UA-25239051-1'], ['_trackPageview']];
		(function(d, t) {
			var g = d.createElement(t),
			s = d.getElementsByTagName(t)[0];
			g.async = true;
			g.src = '//www.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g, s);
		})(document, 'script');
	</script>

	<script type="text/javascript">
		$.get('http://www.venturecafe.net/app/user_session', {}, function(data) {}, 'script');
	</script>

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>

</body>
</html>
