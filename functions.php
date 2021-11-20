<?php

/* Chargement des styles du parent. */
add_action( 'wp_enqueue_scripts', 'wpchild_enqueue_styles' );
function wpchild_enqueue_styles(){
  wp_enqueue_style( 'wpm-wp-bootstrap-starter-style', get_template_directory_uri() . '/style.css' );
}

// remove_filter( 'the_content', 'wpautop' );

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

// <?php

/**
 * WooCommerce: Customers can change the quantity & delete it on checkout page.
 */ 

if ( ! defined( 'ABSPATH' ) ) {
   exit; // Exit if accessed directly.
}

// Define plugin version
define( 'ZWQCOC_PLUGIN_VERSION', '1.0.0' );

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

// remove_filter( 'the_content', 'wpautop' );

// remove_filter( 'the_excerpt', 'wpautop' );

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
                    }, 2000);
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