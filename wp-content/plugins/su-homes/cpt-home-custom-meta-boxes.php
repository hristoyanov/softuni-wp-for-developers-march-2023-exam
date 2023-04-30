<?php

function cpt_home_price_custom_box() {
	$screens = [ 'home', ];
	foreach ( $screens as $screen ) {
		add_meta_box(
			'home-price',
			'Price per sq. m',
			'cpt_home_price_html',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'cpt_home_price_custom_box' );

function cpt_home_price_html( $post ) {
  $curr_price = get_post_meta( $post->ID, 'price', true );
	?>
	<input <?php if ( !empty($curr_price) ): echo 'value="' . $curr_price . '"'; endif; ?> type="text" name="price" id="home-price-field" required placeholder="Example: 500 000" class="postbox" style="margin-bottom: 0;">
	<?php
}

function cpt_home_price_save_postdata( $post_id ) {
	if ( array_key_exists( 'price', $_POST ) ) {
        update_post_meta(
            $post_id,
            'price',
            $_POST['price']
        );
	}
}

add_action( 'save_post', 'cpt_home_price_save_postdata' );

function cpt_home_price_currency_custom_box() {
	$screens = [ 'home', ];
	foreach ( $screens as $screen ) {
		add_meta_box(
			'price-currency',
			'Currency',
			'cpt_home_price_currency_html',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'cpt_home_price_currency_custom_box' );

function cpt_home_price_currency_html( $post ) {
	$currency = get_post_meta( $post->ID, 'price_currency', true );
	?>
	<select name="price_currency" id="price-currency" class="postbox" style="margin-bottom: 0;">
		<option value="BGN" <?php selected( $currency, 'BGN' ); ?>>BGN</option>
		<option value="EUR" <?php selected( $currency, 'EUR' ); ?>>EUR</option>
		<option value="USD" <?php selected( $currency, 'USD' ); ?>>USD</option>
	</select>
	<?php
}

function cpt_home_price_currency_save_postdata( $post_id ) {
	if ( array_key_exists( 'price_currency', $_POST ) ) {
		$valid_currencies = ['BGN', 'EUR', 'USD',];

		if ( in_array( $_POST['price_currency'], $valid_currencies ) ) {
			update_post_meta(
				$post_id,
				'price_currency',
				$_POST['price_currency']
			);
		}
	}
}
add_action( 'save_post', 'cpt_home_price_currency_save_postdata' );

function cpt_home_area_custom_box() {
	$screens = [ 'home', ];
	foreach ( $screens as $screen ) {
		add_meta_box(
			'home-area',
			'Area (in square meters):',
			'cpt_home_area_html',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'cpt_home_area_custom_box' );

function cpt_home_area_html( $post ) {
  $area = get_post_meta( $post->ID, 'area', true );
	?>
	<input <?php if ( !empty($area) ): echo 'value="' . $area . '"'; endif; ?> type="text" name="area" id="home-area-field" required placeholder="Example: 75" class="postbox" style="margin-bottom: 0;">
	<?php
}

function cpt_home_area_save_postdata( $post_id ) {
	if ( array_key_exists( 'area', $_POST ) ) {
        update_post_meta(
            $post_id,
            'area',
            $_POST['area']
        );
	}
}

add_action( 'save_post', 'cpt_home_area_save_postdata' );
