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
				<h2 class="title">AIDE</h2>
					<ul>
						<?php echo do_shortcode('[pods name="footer_link" orderby="footer-link-ordre" where="footer-link-position.meta_value=0" template="Footer Lists Template"]'); ?>
					</ul>
			</div>
			<div class="col-12 col-md-3 col-links">
				<h2 class="title">À PROPOS</h2>
				<ul>
					<?php echo do_shortcode('[pods name="footer_link" orderby="footer-link-ordre" where="footer-link-position.meta_value=1" template="Footer Lists Template"]'); ?>
				</ul>
			</div>
			<div class="col-12 col-md-3 col-links">
				<h2 class="title">NOS PRODUITS</h2>
				<ul>
					<?php echo do_shortcode('[pods name="footer_link" orderby="footer-link-ordre" where="footer-link-position.meta_value=2" template="Footer Lists Template"]'); ?>
				</ul>
			</div>
			<div class="col-12 col-md-3 last-col">
				<div class="newsletter">
					<h3>RECEVEZ <span>nos invitations</span></h3>
					<h4>Rejoignez les filles buissonnières</h4>
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
	<?php echo do_shortcode('[table id=menuImages /]'); ?>
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
<script type="text/javascript" src="https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/custom-page-categories.js" id="custom-page-categories-js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/cart-custom.js" id="cart-custom-js"></script>
<script type="text/javascript" src="https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/custom-mega-menu.js" id="custom-mega-menu-js"></script>
<script type="text/javascript" src="https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/header-search-form.js" id="header-search-form-js"></script>
<script type="text/javascript" src="https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/product-page-config.js" id="product-page-config-js"></script>
<script type="text/javascript" src="https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/custom-checkout.js" id="checkout-page-config-js"></script>
<script type="text/javascript" src="https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/custom-blog.js" id="custom-blog-js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/owl-config.js" id="owl-config-js"></script>
</body>
</html>