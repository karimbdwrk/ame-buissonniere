/**
 * Class Zeta_Woo_Change_Quantity_On_Checkout
 * 
 * @package ZWQCOC
 * @version 1.0.0
 */
if ( ! class_exists( 'Zeta_Woo_Change_Quantity_On_Checkout' ) ) {

	class Zeta_Woo_Change_Quantity_On_Checkout {


		/**
	     * Member Variable
	     *
	     * @var object instance
	    */
	    private static $instance;


		/**
		* Returns the *Singleton* instance of this class.
		* 
		* @since 1.0.0
		* @return Singleton The *Singleton* instance.
		*/
		public static function get_instance() {
			if ( null === self::$instance ) {
			 	self::$instance = new self();
			}
			return self::$instance;
		}


      /**
       * Constructor.
       *
       * @access public
       * @since 1.0.0
       */
	    public function __construct() {
            add_filter ('woocommerce_cart_item_name', array( &$this, 'add_items_to_checkout_page'), 10, 3 );
    	    add_filter ('woocommerce_checkout_cart_item_quantity', array( &$this, 'add_quantity'), 10, 2 );
    	    add_action( 'wp_footer', array( &$this, 'add_scripts' ) );
     	    add_action( 'init', array( &$this, 'fire_ajax_to_update_order_reviw' ) );
        }


	    /**
		* Add custom input field
		*
		* @access public
		* @return input filed
		* @since 1.0.0
		*/
		public static function add_items_to_checkout_page( $product_title, $cart_item, $cart_item_key ) {

		    if (  is_checkout() ) {
		        $cart     = WC()->cart->get_cart();
                foreach ( $cart as $cart_key => $cart_value ){
                   if ( $cart_key == $cart_item_key ){
                        $product_id = $cart_item['product_id'];
                        $_product   = $cart_item['data'] ;
                        // $return_value = sprintf(
                        //   '<a href="%s" class="remove" title="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                        //   esc_url( wc_get_cart_remove_url( $cart_key ) ),
                        //   __( 'Remove this item', 'woocommerce' ),
                        //   esc_attr( $product_id ),
                        //   esc_attr( $_product->get_sku() )
                        // );
                        $return_value_test = '';
                        $return_value .= '&nbsp; <span class = "zwqcoc_product_name" >' . $product_title . '</span><p class="qty-label"><span>Quantité : </p>' ;
                        if ( $_product->is_sold_individually() ) {
                          $return_value .= sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_key );
                        } else {
                          $return_value .= woocommerce_quantity_input( array(
                              'input_name'  => "cart[{$cart_key}][qty]",
                              'input_value' => $cart_item['quantity'],
                              'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
                              'min_value'   => '1'
                                  ), $_product, false );
                        }
                        return $return_value;
                    }
                }
		    }
		}

		
		/**
		* Customize the checkout quanity 
		*
		* @access public
		* @params $cart_item, $cart_item_key
		* @since 1.0.0
		*/
    	public static function add_quantity( $cart_item, $cart_item_key ) {
    	   $product_quantity= '';
    	   return $product_quantity;
    	}
    	
    	/**
		* Add custom scripts
		*
		* @access public
		* @return null
		* @since 1.0.0
		*/
    	public function add_scripts(){
    	     
            if (  is_checkout() ) {
            ?>
                <script type="text/javascript">
					
                    <?php  $admin_url = get_admin_url(); ?>
					              jQuery("form.checkout").on("change", "input.qty", function(){
                        
                        var data = {
                    		action: 'zwqcoc_update_order_review',
                    		security: wc_checkout_params.update_order_review_nonce,
                    		post_data: jQuery( 'form.checkout' ).serialize()
                    	};
						
                    	jQuery.post( '<?php echo $admin_url; ?>' + 'admin-ajax.php', data, function( response )
                		{
                            jQuery( 'body' ).trigger( 'update_checkout' );
						});
                    });
                </script>
             <?php  
             }
        }
        
        /**
		* Fire ajax for custom input field
		*
		* @access public
		* @return null
		* @since 1.0.0
		*/
        function fire_ajax_to_update_order_reviw() {
        
            if ( !is_user_logged_in() ){
                add_action( 'wp_ajax_nopriv_zwqcoc_update_order_review', array( &$this, 'zwqcoc_update_order_review' ) );
            } else{
                add_action( 'wp_ajax_zwqcoc_update_order_review',        array( &$this, 'zwqcoc_update_order_review' ) );
            }
        
        }
        
        /**
		* Update product order review
		*
		* @access public
		* @return null
		* @since 1.0.0
		*/
        public function zwqcoc_update_order_review() {
             
            $values = array();
            parse_str($_POST['post_data'], $values);
            $cart = $values['cart'];
            foreach ( $cart as $cart_key => $cart_value ){
                WC()->cart->set_quantity( $cart_key, $cart_value['qty'], false );
                WC()->cart->calculate_totals();
                woocommerce_cart_totals();
            }
            exit;
        }
	}

	/**
	* Calling class using 'get_instance()' method
	*/
	Zeta_Woo_Change_Quantity_On_Checkout::get_instance();


}
