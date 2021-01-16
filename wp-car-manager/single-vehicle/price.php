<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

?>
<div class="wpcm-title-wrapper">
	<h3 class="wpcm-title"><?php echo $vehicle->get_title(); ?></h3>
</div>

<div class="wpcm-price-wrapper" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
	<span class="wpcm-price"><?php echo $vehicle->get_formatted_price(); ?></span>

	<meta itemprop="price" content="<?php echo $vehicle->get_price(); ?>"/>
	<meta itemprop="priceCurrency" content="<?php echo wp_car_manager()->service( 'settings' )->get_option( 'currency' ); ?>"/>
</div>
