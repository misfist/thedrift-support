<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */
global $theme_option;
$facebook_url  = $theme_option['facebook_url'];
$twitter_url   = $theme_option['twitter_url'];
$instagram_url = $theme_option['instagram_url'];

$youtube_url   = $theme_option['youtube_url'];
$linkedin_url  = $theme_option['linkedin_url'];
$pinterest_url = $theme_option['pinterest_url'];
$gplus_url     = $theme_option['gplus_url'];

?>
<div class="site-info">
	<?php
	if ( function_exists( 'the_privacy_policy_link' ) ) {
		the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
	}
	?>
	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentyseventeen' ) ); ?>" class="imprint">
		<?php
			/* translators: %s: WordPress */
		printf( __( 'Proudly powered by %s', 'twentyseventeen' ), 'WordPress' );
		?>
	</a>
</div><!-- .site-info -->
