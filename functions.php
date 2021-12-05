<?php
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'title-tag' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support', 9999);
/* Chargement des styles du parent. */
add_action( 'wp_enqueue_scripts', 'wpchild_enqueue_styles' );
function wpchild_enqueue_styles(){
  // wp_enqueue_style( 'owl', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');
  // wp_enqueue_style( 'owlTheme', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css');
  wp_enqueue_style( 'wpm-wp-bootstrap-starter-style', get_template_directory_uri() . '/style.css' );
  // wp_enqueue_script( 'custom-page-categories-js', 'https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/custom-page-categories.min.js');
  // wp_enqueue_script( 'anime-js', 'https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js');
  // wp_enqueue_script( 'isotope', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js');
  // wp_enqueue_script( 'cartCustom', 'https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/cart-custom.min.js');
  // wp_enqueue_script( 'custom-mega-menu', 'https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/custom-mega-menu.min.js');
  // wp_enqueue_script( 'header-search-form', 'https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/header-search-form.min.js');
  // wp_enqueue_script( 'product-page-config', 'https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/product-page-config.min.js');
  // wp_enqueue_script( 'checkout-page-config', 'https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/custom-checkout.min.js');
  // wp_enqueue_script( 'page-tuto', 'https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/page-tuto.min.js');
  // wp_enqueue_script( 'custom-blog', 'https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/custom-blog.min.js');
  // wp_enqueue_script( 'owl-js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js');
  // wp_enqueue_script( 'owl-config', 'https://amebuissonniere.com/wp-content/themes/wp-bootstrap-starter-child/js/owl-config.min.js');
  // wp_enqueue_script( 'render-blocking', get_template_directory_uri() . '/js/render-blocking.js');
}
// Remove Query Strings
function remove_css_and_js_version( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'remove_css_and_js_version', 10, 2 );
add_filter( 'script_loader_src', 'remove_css_and_js_version', 10, 2 );
// Remove RSD Links
remove_action( 'wp_head', 'rsd_link' ) ;
// Disable Emoticons
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
// Remove Shortlink
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
// Disable Embeds
function disable_embed()
{
    wp_dequeue_script( 'wp-embed' );
}
add_action( 'wp_footer', 'disable_embed' );
// Hide WordPress Version
remove_action( 'wp_head', 'wp_generator' ) ;
// Remove WLManifest Link
remove_action( 'wp_head', 'wlwmanifest_link' ) ;
// Disable Self Pingback
function disable_pingback( &$links )
{
    foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, get_option( 'home' ) ) )
            unset($links[$l]);
}
add_action( 'pre_ping', 'disable_pingback' );
// Disable Heartbeat
add_action( 'init', 'stop_heartbeat', 1 );
function stop_heartbeat()
{
    wp_deregister_script('heartbeat');
}
// Disable Dashicons on Front-end
function wpdocs_dequeue_dashicon()
{
    if (current_user_can( 'update_core' )) {
        return;
    }
    wp_deregister_style('dashicons');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );
// Remove Jetpack CSS
add_filter ('jetpack_implode_frontend_css', '__return_false', 999);
// Disable RSS feed
remove_action('wp_head', 'feed_links', 3);
remove_action('wp_head', 'feed_links_extra', 2);

add_action( 'init', function () {
  add_image_size( 'dgwt-wcas-product-custom', 300, '', false );
} );

add_filter( 'dgwt/wcas/suggestion_details/product/thumb_size', function ( $size ) {
  return 'dgwt-wcas-product-custom';
} );


add_filter( 'pods_shortcode', function( $tags )  {
  $tags[ 'shortcodes' ] = true;
  
  return $tags; 
});

/* REORDER DIVS INFOS PAGE PRODUCT */
// change order of description
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 6 );
// add tabs in summary 
add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
// remove related products
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

/* CUSTOM SELECT TO RADIO BTNS PAGE PRODUCT*/
function variation_radio_buttons($html, $args) {
  $args = wp_parse_args(apply_filters('woocommerce_dropdown_variation_attribute_options_args', $args), array(
    'options'          => false,
    'attribute'        => false,
    'product'          => false,
    'selected'         => false,
    'name'             => '',
    'id'               => '',
    'class'            => '',
    'show_option_none' => __('Choose an option', 'woocommerce'),
  ));

  if(false === $args['selected'] && $args['attribute'] && $args['product'] instanceof WC_Product) {
    $selected_key     = 'attribute_'.sanitize_title($args['attribute']);
    $args['selected'] = isset($_REQUEST[$selected_key]) ? wc_clean(wp_unslash($_REQUEST[$selected_key])) : $args['product']->get_variation_default_attribute($args['attribute']);
  }

  $options               = $args['options'];
  $product               = $args['product'];
  $attribute             = $args['attribute'];
  $name                  = $args['name'] ? $args['name'] : 'attribute_'.sanitize_title($attribute);
  $id                    = $args['id'] ? $args['id'] : sanitize_title($attribute);
  $class                 = $args['class'];
  $show_option_none      = (bool)$args['show_option_none'];
  $show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __('Choose an option', 'woocommerce');

  if(empty($options) && !empty($product) && !empty($attribute)) {
    $attributes = $product->get_variation_attributes();
    $options    = $attributes[$attribute];
  }

  $radios = '<div class="variation-radios">';

  if(!empty($options)) {
    if($product && taxonomy_exists($attribute)) {
      $terms = wc_get_product_terms($product->get_id(), $attribute, array(
        'fields' => 'all',
      ));

      foreach($terms as $term) {
        if(in_array($term->slug, $options, true)) {
          $id = $name.'-'.$term->slug;
          $radios .= '<input type="radio" id="'.esc_attr($id).'" name="'.esc_attr($name).'" value="'.esc_attr($term->slug).'" '.checked(sanitize_title($args['selected']), $term->slug, false).'><label for="'.esc_attr($id).'">'.esc_html(apply_filters('woocommerce_variation_option_name', $term->name)).'</label>';
        }
      }
    } else {
      foreach($options as $option) {
        $id = $name.'-'.$option;
        $checked    = sanitize_title($args['selected']) === $args['selected'] ? checked($args['selected'], sanitize_title($option), false) : checked($args['selected'], $option, false);
        $radios    .= '<input type="radio" id="'.esc_attr($id).'" name="'.esc_attr($name).'" value="'.esc_attr($option).'" id="'.sanitize_title($option).'" '.$checked.'><label for="'.esc_attr($id).'">'.esc_html(apply_filters('woocommerce_variation_option_name', $option)).'</label>';
      }
    }
  }

  $radios .= '</div>';
    
  return $html.$radios;
}
add_filter('woocommerce_dropdown_variation_attribute_options_html', 'variation_radio_buttons', 20, 2);

function variation_check($active, $variation) {
  if(!$variation->is_in_stock() && !$variation->backorders_allowed()) {
    return false;
  }
  return $active;
}
add_filter('woocommerce_variation_is_active', 'variation_check', 10, 2);

// adresse de facturation
add_filter( 'woocommerce_ship_to_different_address_checked', '__return_true');
/**
 * Allows to remove products in checkout page.
 * 
 * @param string $product_name 
 * @param array $cart_item 
 * @param string $cart_item_key 
 * @return string
 */
function lionplugins_woocommerce_checkout_remove_item( $product_name, $cart_item, $cart_item_key ) {
	if ( is_checkout() ) {
		$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
		$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

		$remove_link = apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
			'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="trash-btn"></i></a>',
			esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
			__( 'Remove this item', 'woocommerce' ),
			esc_attr( $product_id ),
			esc_attr( $_product->get_sku() )
        ), $cart_item_key );

		return '<span>' . $product_name . '</span><span id="trashBtn">' . $remove_link . '</span>';
	}

	return $product_name;
}
add_filter( 'woocommerce_cart_item_name', 'lionplugins_woocommerce_checkout_remove_item', 10, 3 );
/**
 * WooCommerce: Customers can change the quantity & delete it on checkout page.
 */ 
if ( ! defined( 'ABSPATH' ) ) {
   exit; // Exit if accessed directly.
}


function pippin_login_form_shortcode( $atts, $content = null ) {
 
	extract( shortcode_atts( array(
      'redirect' => ''
      ), $atts ) );
 
	if (!is_user_logged_in()) {
		if($redirect) {
			$redirect_url = $redirect;
		} else {
			$redirect_url = get_permalink();
		}
		$form = wp_login_form(array('echo' => false, 'redirect' => $redirect_url ));
	} 
	return $form;
}
add_shortcode('loginform', 'pippin_login_form_shortcode');
// Auto uncheck "Ship to a different address"
add_filter( 'woocommerce_ship_to_different_address_checked', '__return_false' );
// recherche
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
    ?>
    <script type="text/javascript" defer>
        var search_timeout = null

        function fetch(){
            jQuery('#form').keydown(function(e){
                if (e.keyCode === 13) {
                    e.preventDefault();
                } else {
                    clearTimeout(search_timeout);
                    search_timeout = setTimeout(function(){
                        $.ajax({ url: '/wp-admin/admin-ajax.php',
                            type: 'POST',
                            data: {
                                action: 'data_fetch',
                                keyword: jQuery('#keyword').val()
                            },
                            success: function(data) {
                                $('#datafetch').html( data );
                            }
                        });
                    }, 500);
                }
            });
        }
    </script>
    <?php
}
/**
 * Fonction ajax pour récupérer les produits de façon dynamique.
 */
add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');
function data_fetch(){
    $the_query = new WP_Query(
        array(
            'posts_per_page' => 9,
            's' => esc_attr($_POST['keyword']),
            'post_type' => 'product',
        )
    );

    if( $the_query->have_posts() ) :
        echo '<div class="display-search-items">';
        while( $the_query->have_posts() ): $the_query->the_post();?>
            <?php $product = wc_get_product(get_the_ID());?>
            <div class="display-search-item">
                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                    <img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy" width="520" height="578">
                    <h4 class="title"><?php the_title(); ?></h4>
                    <p class="price"><?php echo $product->get_price_html(); ?></p>
                </a>
            </div>
        <?php endwhile;
       echo '</div>';
        wp_reset_postdata();  
    endif;
    die();
}
// Remove unused style in main pages
function remove_unused_style_in_home_page()
{
  global $wp_styles;

  if (
    is_front_page() ||
    is_page(
      'moments-buissonniers',
      'mon-histoire',
      'nos-engagements',
      'tutoriel-produits',
      'contact',
      'conditions-generales-de-vente',
      'politique-de-confidentialite'
    )
  ) {
    $remove_style = array(
    	'dashicons',
    	'wp-block-library',
    	'wp-block-library-inline',
      	'wc-blocks-vendors-style',
    	'ce4wp-subscribe-style-inline',
    	'lpc_modal',
    	'lpc_bal_return',
    	'lpc_tracking',
    	'lpc_pickup_widget',
    	'lpc_pick_up_ws',
		'dgwt-wcas-style',
		'xoo-wsc-fonts',
		'xoo-wsc-style-inline',
		'wp-bootstrap-starter-fontawesome-cdn',
		'tablepress-default',
		'wp-fastest-cache-toolbar',
		'yoast-seo-adminbar',
		'jetpack_css',
		'rm_material_icons',
		'mediaelement',
		'wp-mediaelement',
		'https://use.typekit.net/kzt8ihr.css',
		'noticons',
		'kzt8ihr',
		'poppins'
    );

    foreach($remove_style as $handle) {
      wp_dequeue_style($handle);
      wp_deregister_script($handle);
      unset($wp_styles->registered[$handle]);
    }
  }
}
add_filter( 'wp_enqueue_scripts', 'remove_unused_style_in_home_page', PHP_INT_MAX );

/**
 * Optimize WooCommerce Scripts
 * Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
 * Disable WooCommerce  Styles and Scripts
 */
add_action( 'wp_enqueue_scripts', 'dequeue_woocommerce_styles_scripts', 99 );
function dequeue_woocommerce_styles_scripts()
{
  if ( function_exists( 'is_woocommerce' ) ) {
    if ( !is_woocommerce() && !is_cart() && !is_checkout() ) {
      # Styles
      wp_dequeue_style( 'woocommerce-general' );
      wp_dequeue_style( 'woocommerce-layout' );
      wp_dequeue_style( 'woocommerce-smallscreen' );
      wp_dequeue_style( 'woocommerce_frontend_styles' );
      wp_dequeue_style( 'woocommerce_fancybox_styles' );
      wp_dequeue_style( 'woocommerce_chosen_styles' );
      wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
      # Scripts
      wp_dequeue_script( 'wc_price_slider' );
      wp_dequeue_script( 'wc-single-product' );
      wp_dequeue_script( 'wc-add-to-cart' );
      wp_dequeue_script( 'wc-cart-fragments' );
      wp_dequeue_script( 'wc-checkout' );
      wp_dequeue_script( 'wc-add-to-cart-variation' );
      wp_dequeue_script( 'wc-single-product' );
      wp_dequeue_script( 'wc-cart' );
      wp_dequeue_script( 'wc-chosen' );
      wp_dequeue_script( 'woocommerce' );
      wp_dequeue_script( 'prettyPhoto' );
      wp_dequeue_script( 'prettyPhoto-init' );
      wp_dequeue_script( 'jquery-blockui' );
      wp_dequeue_script( 'jquery-placeholder' );
      wp_dequeue_script( 'fancybox' );
      wp_dequeue_script( 'jqueryui' );
    }
  }
}

/**
 * disables some plugin style in the Admin Area
 */
function shapeSpace_disable_scripts_styles_admin_area() {
  wp_dequeue_style('jquery-ui-css');
  wp_dequeue_style('fs_common');
  wp_dequeue_style('lpc_styles');
  wp_dequeue_style('lpc_modal');
  wp_dequeue_style('rm_google_font');
  wp_dequeue_style('wc_facebook_infobanner_css');
  wp_dequeue_style('jetpack-jitm-css');
  wp_dequeue_style('mailchimp-woocommerce');
  wp_dequeue_style('pll_wc_admin');
  wp_dequeue_style('polylang_dialog');
  wp_dequeue_style('wordfence-activity-report-widget');
  wp_dequeue_style('wordfence-font-awesome-style');
  wp_dequeue_style('wordfence-global-style');
  wp_dequeue_style('wordfence-ls-admin-global');
  wp_dequeue_style('yoast-seo-wp-dashboard');
  wp_dequeue_style('yoast-seo-dismissible');
  wp_dequeue_style('about');
  wp_dequeue_style('wp-color-picker');
  wp_dequeue_style('l10n');
  wp_dequeue_style('list-tables');
  wp_dequeue_style('media');
  wp_dequeue_style('revisions');
  wp_dequeue_style('site-health');
  wp_dequeue_style('site-icon');
  wp_dequeue_style('themes');
  wp_dequeue_style('widgets');
  wp_dequeue_style('wp-pointer');
  wp_dequeue_style('imgareaselect');
  wp_dequeue_style('mediaelement');
  wp_dequeue_style('wp-mediaelement');
  wp_dequeue_style('thickbox');
}
add_action('admin_enqueue_scripts', 'shapeSpace_disable_scripts_styles_admin_area', 100);