<li class="wpcm-listings-item<?php echo( $vehicle->is_featured() ? " wpcm-listings-item-featured" : "" ); ?>">
	<?php
		$image = get_the_post_thumbnail( $vehicle->get_id(), apply_filters( 'wpcm_single_vehicle_large_thumbnail_size', 'wpcm_vehicle_single' ) );
	?>
    <a href="<?php echo $url; ?>" title="<?php echo $title; ?>">
        <div class="wpcm-listings-item-image-wrapper">
			<?php echo $image; ?>
		</div>
		<div class="wpcm-listings-item-text">
			<div class="row">
				<div class="col-8">
					<h3><?php echo $vehicle->get_make_name(); ?> <?php echo $vehicle->get_model_name(); ?></h3>
				</div>
				<div class="col-4">
					<p class="price"><?php echo $price; ?></p>
				</div>
			</div>
			<div class="row">
				<p class="description"><?php echo $title; ?></p>
			</div>
			<div class="row">
				<div class="col-6">
					<p class="year"><?php echo explode("-", $vehicle->get_formatted_frdate())[1]; ?></p>
				</div>
				<div class="col-6">
					<p class="mileage"><?php echo $mileage; ?></p>
				</div>
			</div>
		</div>
    </a>
</li>
