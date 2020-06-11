<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

?>

<?php

$video = $vehicle->get_video_url();

if (!empty($video)) {
?>


<div class="wpcm-vehicle-video-container row my-5">
  <div class="col-12 col-md-4 wpcm-vehicle-video-info py-4 pl-4">
    <h1 class="title d-block d-md-none"><i class="fa fa-video-camera"></i> Video en 360°</h1>
    <h1 class="title display-2 d-none d-md-block"><i class="fa fa-video-camera"></i> 360°</h1>
    <h1 class="subtitle mt-4 d-none d-md-block">Revisa el auto con el video en 360 grados</h1>
    <button class="mt-5 d-none d-md-block">Ver el video ></button>
  </div>
  <div class="col-12 col-md-8 px-5 py-4">
    <div class="wpcm-vehicle-video-embeded"><iframe width="100%" height="400" src="<?php echo $video; ?>?modestbranding=1&autohide=1&showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe></div>
  </div>
</div>

<?php
}
?>
