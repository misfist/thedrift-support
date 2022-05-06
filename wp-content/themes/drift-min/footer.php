<?php
global $theme_option;
  $logo_url = $theme_option['logo_image'];
  $logo     = $logo_url['url'];

  $site_description = $theme_option['site_description'];


if ( $logo_url ) {
	$logo = get_stylesheet_directory_uri() . '/assets/images/f-loog.png';
}

?> 
<?php
$footer_style = get_post_meta( get_the_ID(), 'footer_style', true );
if( 'Style-2' === $footer_style ) : ?>

<!-- footer Footer Container
	================================================== -->
	<section class="footer_outer">
		<div class="footer_back"></div>
		<div class="container-fluid">
			<div class="footer_inner">
			<div class="f_logo">
				<img src="<?php echo $logo; ?>">
				<?php
				if ( $site_description != '' ) {
					echo '<p>' . nl2br( $site_description ) . '</p>';
				}
				?>
							
			</div>

			<?php get_template_part( 'template-parts/footer/subscribe-form' ); ?>

			<div class="f_three d-flex ">

				<?php
					wp_nav_menu(
						array(
							'menu'       => 'Footer menu',
							'container'  => '',
							'menu_class' => 'd-flex f_menu nav',
						)
					);
					?>

					<?php get_template_part( 'template-parts/footer/social-links' ); ?>
			</div>

			</div>
		</div>
	</section>

<?php else : ?>

	<div class="signup4mail mt_wrap footer_style_new">
		<div class="signup4mail_BG">
			<div class="row ">
					<div class="col-md-2 footerNewLogo">
						<picture>
							<source
							media="(min-width: 1010px)"
							srcset="
							<?php echo get_stylesheet_directory_uri() . '/assets/images/drift_logo_large_1x.png'; ?> 1x, 
							<?php echo get_stylesheet_directory_uri() . '/assets/images/drift_logo_large_2x.png'; ?> 2x, 
							<?php echo get_stylesheet_directory_uri() . '/assets/images/drift_logo_large_3x.png'; ?> 3x"
							type="image/png" >
							<img
							src="<?php _( $logo ); ?>"
							type="image/png"
							alt="The Drift Magazine">
						</picture>
					</div>
					<div class="col-md-8 footerNew_middle">
						<div class="footerNew_middle_inner">
							<?php get_template_part( 'template-parts/footer/subscribe-form' ); ?>		
						</div>	
					</div>

					<div class="col-md-2 footerNewSocials">
						<?php get_template_part( 'template-parts/footer/social-links' ); ?>
					</div>
			</div>
		</div>
	</div>
	<!-- .footer_style_new -->

	<div class="footerFullMenu">
		<div class="row">
		<div class="col-md-9 footerFullMenu">
			<?php
			wp_nav_menu(
				array(
					'menu'      => 'Footer Full Menu',
					'container' => '',
					'menu_id'   => 'footerFullMenu',
				)
			);
			?>
		</div>
		<div class="col-md-3 copyrightDiv">
				<span class="copyrightSpan">Copyright &copy; The Drift <?php echo date( 'Y' ); ?></span>
		</div>
		</div>
	</div><!-- .footerFullMenu -->
	

<?php endif; ?>

</div>


<?php wp_footer(); ?>
</body>
</html>
