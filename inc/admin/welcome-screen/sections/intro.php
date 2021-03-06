<?php
/**
 * Welcome screen intro template
 */
?>
<?php
$storefront = wp_get_theme( 'storefront' );

?>
<div class="col two-col" style="overflow: hidden;">
	<h1 class="sf-title"><?php echo '<strong>Storefront</strong> <sup class="version">' . esc_attr( $storefront['Version'] ) . '</sup>'; ?></h1>

	<section class="sf-review">
		<p><?php echo sprintf( esc_html__( '%sEnjoying Storefront?%s Why not %sleave a review%s on WordPress.org? We\'d really appreciate it!', 'storefront' ), '<strong>', '</strong>', '<a href="https://wordpress.org/themes/storefront">', '</a>' ); ?></p>
	</section>

	<div class="col boxed enrich">
		<h2><?php esc_html_e( 'Built to enrich your WooCommerce store', 'storefront' ); ?></h2>

		<p><?php esc_html_e( 'Although Storefront works fine as a regular WordPress theme, it really shines when used for an online store. Install WooCommerce and start selling now.', 'storefront' ); ?></p>

		<?php if ( class_exists( 'WooCommerce' ) ) { ?>
			<p><span class="activated"><span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'WooCommerce is activated', 'storefront' ); ?></span></p>
		<?php } else { ?>
			<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=woocommerce' ), 'install-plugin_woocommerce' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install WooCommerce', 'storefront' ); ?></a></p>
		<?php } ?>
	</div>

	<div class="col boxed news">
		<h2><?php esc_html_e( 'Latest Storefront news', 'storefront' ); ?></h2>
		<div class="col2-set">
			<div class="col-1 news">
				<h4><?php esc_html_e( 'Recent News', 'storefront' ); ?></h4>
				<?php
				$rss		= fetch_feed( 'http://www.woothemes.com/blog/product-news/storefront/feed/' );
				$rss_items	= array();

				if ( ! is_wp_error( $rss ) ) {
					$maxitems 	= $rss->get_item_quantity( 1 );
					$rss_items 	= $rss->get_items( 0, $maxitems );
				}

				foreach ( $rss_items as $item ) : ?>
					<h5>
						<a href="<?php echo esc_url( $item->get_permalink() ); ?>">
							<?php echo esc_html( $item->get_title() ); ?>
						</a>
					</h5>
					<span class="date"><?php echo esc_attr( $item->get_date( 'j F Y' ) ); ?></span>
				<?php endforeach; ?>
			</div>
			<div class="col-2 docs">
				<h4><?php esc_html_e( 'Featured Docs', 'storefront' ); ?></h4>
				<ul>
					<li><a href="http://docs.woothemes.com/document/installation-configuration/"><?php esc_html_e( 'Installation &amp; configuration', 'storefront' ); ?></a></li>
					<li><a href="http://docs.woothemes.com/document/storefront-faq/"><?php esc_html_e( 'FAQ', 'storefront' ); ?></a></li>
					<li><a href="http://docs.woothemes.com/document/customizer-settings/"><?php esc_html_e( 'Customizer settings', 'storefront' ); ?></a></li>
				</ul>


			</div>
		</div>
	</div>
</div>