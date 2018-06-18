<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Business_Point
 */

	/**
	 * Hook - business_point_after_content.
	 *
	 * @hooked business_point_after_content_action - 10
	 */
	do_action( 'business_point_after_content' );

?>

	<?php get_template_part( 'template-parts/footer-widgets' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<?php $copyright_text = business_point_get_option( 'copyright_text' ); ?>
			<?php if ( ! empty( $copyright_text ) ) : ?>
				<div class="copyright">
					<?php echo wp_kses_data( $copyright_text ); ?>
				</div><!-- .copyright -->
			<?php endif; ?>

			<?php do_action( 'business_point_credit' ); ?>
			
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->
	<div id="enq-form-wrap" class="enquiry_btn hide-form">
		<button id="button-toggle">Enquiry</button>
	<div class="enqiry_box" >
		<h4>Enquiry Form</h4>
		<?php echo do_shortcode('[contact-form-7 id="5570" title="enquiry from"]') ?>
	</div>
	</div>
<aside id="desclaimer">
<div class="container">
<b> Disclaimer :  </b>
All the information on our MobPro website is published in good faith and for general information purpose only. MobPro does not make any warranties about the completeness, reliability and accuracy of this information. Any action you take upon the information you find on MobPro, is strictly at your own risk. We will not be liable for any losses and/or damages in connection with the use of our website.
If you require any more information or have any questions about our site's disclaimer, please feel free to contact us by email at sales@mobprodigital.com.
</div>
</aside>
<?php wp_footer(); ?>
<script>
jQuery(function(){
	jQuery("#button-toggle").click(function(){
		jQuery("#enq-form-wrap").toggleClass('hide-form');
	})
})

</script>
</body>
</html>
