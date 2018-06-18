<?php
/**
 * Footer widgets.
 *
 * @package Business_Point
 */

if ( is_active_sidebar( 'footer-1' ) ||
	 is_active_sidebar( 'footer-2' ) ||
	 is_active_sidebar( 'footer-3' ) ||
	 is_active_sidebar( 'footer-4' ) ) :
?>
<div id="upper-footer">
	<aside class="footer-login-link-wrap">
		<a class="footer-login-links" target="_about" href="https://mob-pro-digital.vnative.com/">Advertiser Login</a>
		<a class="footer-login-links" target="_about" href="https://mob-pro-digital.vnative.com/">Publisher Login</a>
	</aside>
	<!-- <aside class="footer-social-links">
		<a href="https://www.facebook.com/profile.php?id=100016323662293" target="_blank" title="facebook">
			<i class="fa fa-facebook" aria-hidden="true"></i>
		</a>
		<a href="https://twitter.com/JackMorrisMedia" target="_blank" title="tweeter">
			<i class="fa fa-twitter" aria-hidden="true"></i>
		</a>
		<a href="https://www.linkedin.com/company-beta/13283375/" title="linkedin" target="_blank">
			<i class="fa fa-linkedin" aria-hidden="true"></i>
		</a>
	</aside> -->
</div>
	<aside id="footer-widgets" class="widget-area" role="complementary">
		<div class="container">
			<?php
				$column_count = 0;
				for ( $i = 1; $i <= 4; $i++ ) {
					if ( is_active_sidebar( 'footer-' . $i ) ) {
						$column_count++;
					}
				}
			 ?>
			<div class="inner-wrapper">
				<?php
				$column_class = 'widget-column footer-active-' . absint( $column_count );
				for ( $i = 1; $i <= 4 ; $i++ ) {
					if ( is_active_sidebar( 'footer-' . $i ) ) {
						?>
						<div class="<?php echo $column_class; ?>">
							<?php dynamic_sidebar( 'footer-' . $i ); ?>
						</div>
						<?php
					}
				}
				?>
			</div><!-- .inner-wrapper -->
		</div><!-- .container -->
	</aside><!-- #footer-widgets -->

<?php endif;
