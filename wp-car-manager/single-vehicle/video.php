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
  <div class="col-12 col-md-4 wpcm-vehicle-video-info pt-3 py-md-4 px-2 pl-md-4">
    <h1 class="title d-block d-md-none text-center">¡Revisa el auto con nuestro video 360!</h1>
    <h1 class="title display-2 d-none d-md-block"><i class="fa fa-video-camera"></i> 360°</h1>
    <h1 class="subtitle mt-4 d-none d-md-block">¡Revisa el auto con nuestro video 360!</h1>
    <button id="playVideoBtn" class="mt-5 d-none d-md-block">Ver el video ></button>
  </div>
  <div class="col-12 col-md-8 px-2 px-md-5 pt-2 pb-4 py-md-4">
    <div class="wpcm-vehicle-video-embeded"><iframe id="videoIframe" width="100%" src="<?php echo $video; ?>?modestbranding=1&autohide=1&showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe></div>
  </div>
</div>

<?php
}
?>

<script>
  jQuery("#playVideoBtn").click(function(){
    jQuery("#videoIframe")[0].src += "&autoplay=1";
  });
</script>