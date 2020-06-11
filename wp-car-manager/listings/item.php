<?php if ($add): ?>
<li class="wpcm-listings-item add">
	<a href="<?php echo $add['link']; ?>" title="<?php echo $add['title']; ?>">
		<img src="<?php echo get_template_directory_uri(); ?>/img/<?php echo $add['image']; ?>" class="img-fluid">
	</a>
</li>
<?php endif; ?>

<li class="wpcm-listings-item<?php echo( $vehicle->is_featured() ? " wpcm-listings-item-featured" : "" ); ?>">
	<?php
		$image = get_the_post_thumbnail( $vehicle->get_id(), apply_filters( 'wpcm_single_vehicle_large_thumbnail_size', 'wpcm_vehicle_single' ) );
	?>
	<?php do_action( 'wpcm_vehicle_listings_item_start', $vehicle ); ?>
	<a href="<?php echo $url; ?>" title="<?php echo $title; ?>">
		<div class="wpcm-listings-item-image-wrapper">
			<?php do_action( 'wpcm_vehicle_listings_item_image_start', $vehicle ); ?>
			<?php echo $image; ?>
			<?php do_action( 'wpcm_vehicle_listings_item_image_end', $vehicle ); ?>
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
				<p class="description">
					<?php do_action( 'wpcm_vehicle_listings_item_description_start', $vehicle ); ?>
					<?php echo $title; ?></p>
					<?php do_action( 'wpcm_vehicle_listings_item_description_end', $vehicle ); ?>
			</div>
			<div class="row">
				<?php do_action( 'wpcm_vehicle_listings_item_meta_start', $vehicle ); ?>
				<div class="col-6">
					<p class="year"><?php echo explode("-", $vehicle->get_formatted_frdate())[1]; ?></p>
				</div>
				<div class="col-6">
					<p class="mileage"><?php echo $mileage; ?></p>
				</div>
				<?php do_action( 'wpcm_vehicle_listings_item_meta_end', $vehicle ); ?>
			</div>
		</div>
		<?php do_action( 'wpcm_vehicle_listings_item_end', $vehicle ); ?>
  </a>
</li>
