<?php
/**
 * Displays header media
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

$heading = 'sistering';

if( is_page('donate') ){

	$heading = 'what we need';

}

if( is_page('inventory') ){

	$heading = 'inventory';

}


?>


<div class="container-fluid gift-header">
	<h1><?php echo $heading; ?></h1>
</div>