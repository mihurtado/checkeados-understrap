<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

?>
<tr>
	<th><?php _e( 'Year', 'wp-car-manager' ); ?></th>
	<td><span itemprop="dateVehicleFirstRegistered" class="wpcm-vehicle-data"><?php echo explode("-", $vehicle->get_formatted_frdate())[1]; ?></span></td>
</tr>
