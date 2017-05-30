<?php
/**
 * Template Name: Projetos
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */


global $post;
$args = array( 'posts_per_page' => -1, 'post_type' => 'portfolio' );
$posts = get_posts( $args );

?>

<article id="projetos" class="page type-page status-publish hentry">

	<header class="entry-header">
		<h1 class="entry-title">Projetos</h1>
	</header>

	<div class="entry-content">
		
		<div id="ms-content" class="projetos-content">

				<?php 

				// Start the loop
				foreach ( $posts as $post ) : 
					setup_postdata( $post );

					$projeto_cliente = get_post_meta( get_the_ID(), 'projeto_cliente', true );
					$projeto_url = get_post_meta( get_the_ID(), 'projeto_url', true );

				?>

					<div id="post-<?php the_ID(); ?>" <?php post_class(array('ms-item', 'projetos-item')); ?>>

						<a href="<?php the_permalink(); ?>">

						<?php
							// Post thumbnail.
							twentyfifteen_post_thumbnail();
						?>

						<!-- <header class="entry-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</header> --><!-- .entry-header -->

						<!-- <div class="entry-content">
							<?php the_content(); ?>
						</div> --><!-- .entry-content -->

						<!-- <div class="entry-meta">x
							<?php echo 'Cliente: ' . $projeto_cliente; ?>
						</div> -->

						</a>

						<?php //edit_post_link( __( 'Edit', 'twentyfifteen' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

					</div><!-- #post-## -->

				<?php

				// End the loop
				endforeach;

				?>

		</div>

	</div>

	<!-- <footer class="entry-footer">
		<?php twentyfifteen_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
	</footer> -->

	<script type="text/javascript">
		jQuery(window).load(function() {
			var container = document.querySelector('#ms-content');
			var msnry = new Masonry( container, {
				itemSelector: '.ms-item',
				columnWidth: '.ms-item',                
			});  

		});
	</script>

</article>


