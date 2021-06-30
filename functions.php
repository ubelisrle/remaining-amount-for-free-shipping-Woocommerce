// Show Remaining Amount to Reach Free Shipping
add_action( 'woocommerce_cart_contents', 'bbloomer_free_shipping_cart_notice' );
add_action( 'woocommerce_checkout_before_order_review', 'bbloomer_free_shipping_cart_notice' );
  
function bbloomer_free_shipping_cart_notice() {
  
   $min_amount = 3000; //change this to your free shipping threshold
   
   $current = WC()->cart->subtotal;
  
   if ( $current < $min_amount ) {
      $added_text = 'Do besplatne isporuke još <strong>' . wc_price( $min_amount - $current ) . '</strong>!';
      //$return_to = wc_get_page_permalink( 'shop' );
      $freeShipping = 100 * $current / $min_amount;
      $notice = sprintf( $added_text );
      echo '<h4>' . $notice . '</h4>';
      //Progress bar
      echo '<div class="progressbar" style="max-width: 400px;background:#d2d2d2;"><span style="width: ' . $freeShipping . '%; background:#529b16;height: 10px;display:block;"></span></div>';
   }
   
   
   
}
