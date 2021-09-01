<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $product_tabs ) ) : ?>

	<div class="woocommerce-tabs wc-tabs-wrapper">
		<nav class="nav nav-tabs">
			<a class="nav-item nav-link active" href="#p1" data-toggle="tab">Description</a>
			<a class="nav-item nav-link" href="#p2" data-toggle="tab">Guide des tailles</a>
			<a class="nav-item nav-link" href="#p3" data-toggle="tab">Conseils</a>
		</nav>
		<div class="tab-content">
			<div class="tab-pane active" id="p1">
				<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
					<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
						<?php
						if ( isset( $product_tab['callback'] ) ) {
							call_user_func( $product_tab['callback'], $key, $product_tab );
						}
						?>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="tab-pane" id="p2">Panneau 2</div>
			<div class="tab-pane" id="p3">
				<p class="product-conseils">
					Pour préserver les qualités olfactives de la capsule, il est conseillé de la <strong>remettre dans son sachet</strong> refermable après utilisation et de la <strong>renouveler chaque mois</strong>. Il est conseillé de remettre les perles de parfum <strong>dans leur petite boite après utilisation</strong>.<br>
					<br>
					Pour prendre soin de votre bracelet, <strong>éviter un contact prolongé avec l’eau</strong>, l’eau de mer ou de piscine, les produits ménagers. Ranger le <strong>à l’abri de la lumière et de l’humidité</strong>.<br>
					<br>
					Ne pas re-parfumer la capsule<br>
					Tenir hors de portée des enfants<br>
					Ne pas stocker les capsules ou les disposer près d’une flamme ou
					d’une source de chaleur
				</p>
			</div>
		</div>
		<ul class="tabs wc-tabs d-none" role="tablist">
			<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
				<li class="<?php echo esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
					<a href="#tab-<?php echo esc_attr( $key ); ?>">
						<?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
			<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
				<?php
				if ( isset( $product_tab['callback'] ) ) {
					call_user_func( $product_tab['callback'], $key, $product_tab );
				}
				?>
			</div>
		<?php endforeach; ?>

		<?php do_action( 'woocommerce_product_after_tabs' ); ?>
	</div>

<?php endif; ?>
