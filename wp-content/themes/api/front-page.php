<?php
/**
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/*$string = file_get_contents("http://localhost/testes/criacaoparaweb/wordpress/wp-json/wp/v2/portfolio");
$json = json_decode($string, true);

var_dump($json);*/

$templates = wp_get_theme()->get_page_templates();
$items = wp_get_nav_menu_items('Principal');

get_header();

?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

<?php

foreach ($items as $item) {

	$page = get_page_by_title($item->title);

	$classes = get_post_class('', $page->ID);
	$class = '';
	foreach ($classes as $classe) {
		$class .= $classe . ' ';
	}

	if (in_array($page->post_title, $templates)) { 
	    get_template_part($page->post_name);
	} else { 
?>
		<article id="<?php echo $page->post_name ?>" class="<?php echo $class ?>">
			<header class="entry-header">
				<h1 class="entry-title"><?php echo $page->post_title ?></h1>
			</header>

			<div class="entry-content">
				<?php echo $page->post_content ; ?>
			</div>

			<footer class="entry-footer">
				<?php twentyfifteen_entry_meta(); ?>
				<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
			</footer>
		</article>
<?php
	}
} 
?>

	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php

get_footer();

?>
