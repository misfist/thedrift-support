<?php
/**
 * Displays social icons
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */

?>
<ul class="social_icons">
	<?php if ( $facebook_url ) : ?>
		<li><a href="<?php echo esc_url( $facebook_url ); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
	<?php endif; ?>
	
	<?php if ( $twitter_url ) : ?>
		<li><a href="<?php echo esc_url( $twitter_url ); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
	<?php endif; ?>
	
	<?php if ( $instagram_url ) : ?>
		<li><a href="<?php echo esc_url( $instagram_url ); ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
	<?php endif; ?>
	
	<?php if ( $youtube_url ) : ?>
		<li><a href="<?php echo esc_url( $youtube_url ); ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
	<?php endif; ?>
	
	<?php if ( $linkedin_url ) : ?>
		<li><a href="<?php echo esc_url( $linkedin_url ); ?>" target="_blank"><i class="fab fa-linkedin"></i></a></li>
	<?php endif; ?>
	
	<?php if ( $pinterest_url ) : ?>
		<li><a href="<?php echo esc_url( $pinterest_url ); ?>" target="_blank"><i class="fab fa-pinterest"></i></a></li>
	<?php endif; ?>
	
	<?php if ( $gplus_url ) : ?>
		<li><a href="<?php echo esc_url( $gplus_url ); ?>" target="_blank"><i class="fab fa-google-plus-square"></i></a></li>
	<?php endif; ?>
</ul>
