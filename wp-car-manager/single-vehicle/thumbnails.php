<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

// get attachment ID's
$attachment_ids = $vehicle->get_gallery_attachment_ids();

?>
<?php

if ( $attachment_ids ) {
  $groups = array_chunk($attachment_ids, 4);
  $loop = 0;
  ?>
  <div id="carGallery" class="carousel slide mt-3" data-ride="carousel">
    <div class="carousel-inner">

    <?php
		foreach ( $groups as $group ) {
    ?>
      <div class="carousel-item <?php if ($loop == 0) echo 'active'; ?>">
        <div class="row justify-content-start">
          <?php
          foreach ( $group as $attachment_id) {
            // get image link
            $image_link = wp_get_attachment_url( $attachment_id );

            // get image caption
            $image_caption = esc_attr( get_post_field( 'post_excerpt', $attachment_id ) );

            // get image html
            $image_src = wp_get_attachment_image_src( $attachment_id, 'thumbnail' )[0];
            $image_src_full = wp_get_attachment_image_src( $attachment_id, 'large' )[0];

          ?>
          <div class="col-3">
						<a href="<?php echo $image_src_full; ?>" class="zoom" title="<?php echo $image_caption; ?>" data-rel="prettyPhoto[vehicle-gallery]">
            	<img class="img-fluid" src="<?php echo $image_src ?>" alt="<?php echo $image_caption ?>">
						</a>
          </div>
          <?php
          }
          ?>
        </div>
      </div>
    <?php
    $loop++;
    }
    ?>
    </div>
    <a class="carousel-control-prev" href="#carGallery" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carGallery" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
<?php
}
?>
