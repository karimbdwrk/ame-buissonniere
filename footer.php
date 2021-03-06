<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php 
	$lang = get_language_attributes();
	if ($lang === 'lang="fr-FR"') {

	} 
?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
    <?php get_template_part( 'footer-widget' ); ?>

	<div id="reassurance" class="container">
		<div class="row">
			<div class="col-12">
				<div class="cards"><?php echo do_shortcode('[pods name="reassurance" template="Reassurance Template"]'); ?></div>
			</div>
		</div>
	</div>
	<footer id="colophon" class="site-footer <?php echo wp_bootstrap_starter_bg_class(); ?>" role="contentinfo">
		<div class="container">
			<div class="row">
			<div class="col-12 col-md-3 col-links">
				<div class="logo-footer-container d-flex d-sm-none">
					<img src="https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/images/logo-amebuissonniere.svg" />
				</div>
				<h2 class="title"><span class="lang-fr">AIDE</span><span class="lang-en">HELP</span></h2>
					<ul>
						<?php 
							$lang = get_language_attributes();
							if ($lang === 'lang="fr-FR"') {
								echo do_shortcode('[pods name="footer_link" orderby="footer-link-ordre" where="footer-link-position.meta_value=0" template="Footer Lists Template"]');
							} else {
								echo do_shortcode('[pods name="footer_link" orderby="footer-link-ordre" where="footer-link-position.meta_value=0" template="Footer Lists Template English"]');
							}
						?>
					</ul>
			</div>
			<div class="col-12 col-md-3 col-links">
				<h2 class="title"><span class="lang-fr">À PROPOS</span><span class="lang-en">ABOUT</span></h2>
				<ul>
					<?php 
						$lang = get_language_attributes();
						if ($lang === 'lang="fr-FR"') {
							echo do_shortcode('[pods name="footer_link" orderby="footer-link-ordre" where="footer-link-position.meta_value=1" template="Footer Lists Template"]');
						} else {
							echo do_shortcode('[pods name="footer_link" orderby="footer-link-ordre" where="footer-link-position.meta_value=1" template="Footer Lists Template English"]');
						}
					?>
				</ul>
			</div>
			<div class="col-12 col-md-3 col-links">
				<h2 class="title"><span class="lang-fr">NOS PRODUITS</span><span class="lang-en">OUR PRODUCTS</span></h2>
				<ul>
					<?php 
						$lang = get_language_attributes();
						if ($lang === 'lang="fr-FR"') {
							echo do_shortcode('[pods name="footer_link" orderby="footer-link-ordre" where="footer-link-position.meta_value=2" template="Footer Lists Template"]');
						} else {
							echo do_shortcode('[pods name="footer_link" orderby="footer-link-ordre" where="footer-link-position.meta_value=2" template="Footer Lists Template English"]');
						}
					?>
				</ul>
			</div>
			<div class="col-12 col-md-3 last-col">
				<div class="newsletter">
					<h3 class="lang-fr">RECEVEZ <span>nos invitations</span></h3>
					<h3 class="lang-en">RECEIVE <span>our invitations</span></h3>
					<h4 class="lang-fr">Rejoignez les filles buissonnières</h4>
					<h4 class="lang-en">Join "les filles buissonnières"</h4>
					<?php echo do_shortcode("[RM_Form id='3']"); ?>
				</div>
			</div>
			</div>
		</div>
		<div class="container logo-footer">
			<div class="row">
				<div class="col-12">
					<img src="https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/images/ame-buissonniere-paris.svg" />
				</div>
			</div>	
            <div class="site-info">
                &copy; <?php echo date('Y'); ?> <span class="sep"> | </span> <?php echo '<a href="'.home_url().'">'.get_bloginfo('name').'</a>'; ?>
            </div><!-- close .site-info -->
		</div>
	</footer><!-- #colophon -->
	<?php echo do_shortcode('[pods name="images_mega_menu" slug="1" template="Images Mega Menu Table Template"]'); ?>
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
<script async type="text/javascript" id="anime-js" src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
<script async type="text/javascript" id="isotope" src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script async type="text/javascript" id="owl-js" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script async type="text/javascript" id="owl-config" src="https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/owl-config.js"></script>
<script async type="text/javascript" id="cartCustom" src="https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/cart-custom.js"></script>
<script async type="text/javascript" id="custom-mega-menu" src="https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/custom-mega-menu.js"></script>
<script async type="text/javascript" id="header-search-form" src="https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/header-search-form.js"></script>
<script async type="text/javascript" id="product-page-config" src="https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/product-page-config.js"></script>
<script async type="text/javascript" src="https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/custom-page-categories.js" id="custom-page-categories-js"></script>
<script async type="text/javascript" id="checkout-page-config" src="https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/custom-checkout.js"></script>
<script async type="text/javascript" id="page-tuto" src="https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/page-tuto.js"></script>
<script async type="text/javascript" id="custom-blog" src="https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/custom-blog.js"></script>
<!--<script async type="text/javascript" src="https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/custom-mega-menu.js" id="custom-mega-menu-js"></script>
<script async type="text/javascript" src="https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/cart-custom.js" id="cart-custom-menu-js"></script>
<script async type="text/javascript" src="https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/product-page-config.js" id="product-page-config-js"></script>
<script async type="text/javascript" src="https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/custom-checkout.js" id="custom-checkout-js"></script>
<script async type="text/javascript" src="https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/page-tuto.min.js" id="page-tuto-js"></script>-->

<script>
	document.getElementById('heroVideo').play();
</script>

</body>
</html>