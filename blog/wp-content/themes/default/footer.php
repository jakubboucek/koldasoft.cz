<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>

<hr />
<div id="footer" role="contentinfo">
<!-- If you'd like to support WordPress, having the "powered by" link somewhere on your blog is the best way; it's our only promotion or advertising. -->
	<p>
		<?php bloginfo('name'); ?> hrd� pou��v�
		<a href="http://wordpress.org/">WordPress</a>
		<br /><a href="<?php bloginfo('rss2_url'); ?>">Odb�r �l�nk� (RSS)</a>,
		<a href="<?php bloginfo('comments_rss2_url'); ?>">koment��� (RSS)</a>
		<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
	</p>
</div>
</div>

<!-- Gorgeous design by Michael Heilemann - http://binarybonsai.com/kubrick/ -->
<?php /* "Just what do you think you're doing Dave?" */ ?>

		<?php wp_footer(); ?>
</body>
</html>
