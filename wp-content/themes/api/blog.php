<?php
/**
 * Template Name: Blog
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

$feedsImasters = simplexml_load_file("https://imasters.com.br/secao/design-ux/feed/")->channel->item;
$feedsCSS = simplexml_load_file("https://tableless.com.br/categories/css/index.xml")->channel->item;
$feedsDesign = simplexml_load_file("https://tableless.com.br/categories/design/index.xml")->channel->item;
$feedsUX = simplexml_load_file("https://brasil.uxdesign.cc/feed/")->channel->item;
$feedsFrontend = simplexml_load_file("http://www.devmedia.com.br/xml/devmedia_19.xml")->channel->item;

$i = 0;
$feeds = array();
foreach ($feedsImasters as $feed) {
	$feeds[$i] = $feed;
	$i++;
}
foreach ($feedsCSS as $feed) {
	$feeds[$i] = $feed;
	$i++;
}
foreach ($feedsDesign as $feed) {
	$feeds[$i] = $feed;
	$i++;
}
foreach ($feedsUX as $feed) {
	$feeds[$i] = $feed;
	$i++;
}
foreach ($feedsFrontend as $feed) {
	$feeds[$i] = $feed;
	$i++;
}

usort($feeds, 
	function($a, $b) { 
		return strcmp(strtotime($b->pubDate), strtotime($a->pubDate)); 
	}
);

?>

<article id="blog" class="page type-page status-publish hentry">

	<header class="entry-header">
		<h1 class="entry-title">Blog</h1>
	</header>

	<div class="entry-content">
		
		<div id="ms-blog-content" class="blog-content">

				<?php 

				// Start the loop
				foreach ( $feeds as $feed ) : 
					$url = explode('://', $feed->link);
					$site = explode('/', $url[1]);
					$canal = explode('.', $site[0]);
					if($canal[0] == 'www' OR $canal[0] == 'brasil') {
						$nome = $canal[1];
					} else {
						$nome = $canal[0];
					}
					
				?>

					<div id="post-<?php the_ID(); ?>" <?php post_class(array('ms-item', 'feeds-item', 'transition')); ?>>

						<a href="<?php echo $feed->link; ?>" target="_blank">

						<header class="entry-header">
							<h1><?php echo $feed->title; ?></h1>
						</header><!-- .entry-header -->

						<div class="entry-content">
							<?php 
								echo '<div><small>Por <b>' . strtoupper($nome) . '</b> em <b>' . date("d/m/Y", strtotime($feed->pubDate)) . '</b></small></div>'; 
								//echo substr(preg_replace('/<\/?a[^>]*>/','',$feed->description), 0, 140) . ' ...';
							?>
						</div><!-- .entry-content -->

						</a>

					</div><!-- #post-## -->

				<?php

				// End the loop
				endforeach;

				?>

		</div>

	</div>

	<footer class="entry-footer">
		<?php twentyfifteen_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>

	<script type="text/javascript">
		jQuery(window).load(function() {
			var container = document.querySelector('#ms-blog-content');
			var msnry = new Masonry( container, {
				itemSelector: '.ms-item',
				columnWidth: '.ms-item',                
			});  

		});
	</script>

</article>


