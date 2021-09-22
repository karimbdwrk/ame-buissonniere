<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<section id="primary" class="content-area col-12">
		<div id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<h1 class="title">4<strong>0</strong><em>4</em></h1>
				<h2>OOPS !</h2>
				<p>Page not found</p>
				<a class="btn" href="./">Retourner à l'accueil</a>
			</section><!-- .error-404 -->

		</div><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
