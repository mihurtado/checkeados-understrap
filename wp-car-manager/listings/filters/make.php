<?php
	function strip_accents($str){
		$unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
													'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
													'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
													'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
													'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );
		return strtr( $str, $unwanted_array );
	}
?>

<div class="searchbox">
	<div class="wpcm-filter" style="display: none !important;">
		<input type="hidden" name="with_report" id="filter_with_report" value="">
		<input type="hidden" name="body_style" id="filter_body_style" value="">
	</div>
	
	<div class="searchbox__top-buttons">
		<div class="searchbox__top-buttons__button searchbox__top-buttons__button--selected" onclick="setCertificated('false', this)">Semi-Nuevos</div>
		<div class="searchbox__top-buttons__button searchbox__top-buttons__button--highlighted" onclick="setCertificated('true', this)">Semi-Nuevos Certificados</div>
	</div>

	<div class="searchbox__content">
		<div class="searchbox__content__search-type">
			<div class="searchbox__content__search-type__button searchbox__content__search-type__button--selected" onclick="setSearchType('make-model', this)">Por marca/modelo</div>
			<div class="searchbox__content__search-type__button" onclick="setSearchType('body-style', this)">Por carrocería</div>
		</div>

		<div class="searchbox__content__search-content" id="make-model">
			<div class="wpcm-filter wpcm-filter-make searchbox__content__search-content__field searchbox__content__search-content__field--text-input">
				<i class="fa fa-tag"></i>
				<select id="make" name="make" data-placeholder="<?php esc_attr_e( 'Select Make', 'wp-car-manager' ); ?>"<?php echo(count($makes)<2)?' disabled="disabled"':''; ?>>
					<?php foreach ( $makes as $make_id => $make_name ) : ?>
						<option value="<?php echo esc_attr( $make_id ); ?>"><?php echo esc_html( $make_name ); ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="wpcm-filter wpcm-filter-model searchbox__content__search-content__field searchbox__content__search-content__field--text-input">
				<i class="fa fa-car"></i></i>
				<select id="model" name="model" data-placeholder="Modelo" disabled="disabled">
					<option value="0">Modelo</option>
				</select>
			</div>

			<div class="wpcm-filter searchbox__content__search-content__field searchbox__content__search-content__field--text-input">
				<i class="fa fa-map-marker"></i>
				<select id="ewgion" name="region" data-placeholder="Ubicación">
					<option value="0">Ubicación</option>
					<?php foreach (
						array(
							'santiago' => 'Santiago',
							'concepcion' => 'Concepción'
						) as $region_id => $region_name
					) : ?>
						<option value="<?php echo $region_id; ?>"><?php echo $region_name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="searchbox__content__search-content" id="body-style" style="display: none">
			<div class="searchbox__content__search-content__field searchbox__content__search-content__field--body-style">
				<?php foreach ( array(
					'sedan' => 'Sedán',
					'suv' => 'SUV',
					'hatchback' => 'Hatchback',
					'coupe' => 'Coupe',
					'convertible' => 'Convertible',
					'pickup' => 'Pickup',
					'furgon' => 'Furgón',
					'station-wagon' => 'Station Wagon'
				) as $body_style_id => $body_style_name ) : ?>
					<div class="searchbox__content__search-content__field--body-style__each" onclick="setBodyStyle('<?php echo $body_style_id ?>', this)">
						<div class="searchbox__content__search-content__field--body-style__each__content">
							<img src="<?php echo get_template_directory_uri(); ?>/img/<?php echo $body_style_id; ?>.png">
							<span><?php echo $body_style_name; ?></span>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

	<div class="searchbox__search-button wpcm-filter-button">
		<input type="submit" value="<?php esc_attr_e( 'Show Results', 'wp-car-manager' ); ?>"/>
	</div>
</div>

<script>
	var $ = jQuery;

	function setSearchType(type, elem) {
		reset();
		$('.searchbox__content__search-type__button--selected').removeClass('searchbox__content__search-type__button--selected');
		$(elem).addClass('searchbox__content__search-type__button--selected');
		$('.searchbox__content__search-content').hide();
		$('#' + type).show();
	}

	function setCertificated(bool, elem) {
		$('.searchbox__top-buttons__button--selected').removeClass('searchbox__top-buttons__button--selected');
		$(elem).addClass('searchbox__top-buttons__button--selected');
		$('#filter_with_report').val(bool);
	}

	function setBodyStyle(value, elem) {
		if ($(elem).hasClass('searchbox__content__search-content__field--body-style__each--selected')) {
			$(elem).removeClass('searchbox__content__search-content__field--body-style__each--selected');
			$('#filter_body_style').val('');
			return;
		}

		$('.searchbox__content__search-content__field--body-style__each--selected').removeClass('searchbox__content__search-content__field--body-style__each--selected');
		$(elem).addClass('searchbox__content__search-content__field--body-style__each--selected');
		$('#filter_body_style').val(value);
	}

	function reset() {
		$('.searchbox__content__search-content__field--body-style__each--selected').removeClass('searchbox__content__search-content__field--body-style__each--selected');
		$('#filter_body_style').val('');
		$('#make').val(null).trigger("change");
		$('#region').val(null).trigger("change");
	}
</script>