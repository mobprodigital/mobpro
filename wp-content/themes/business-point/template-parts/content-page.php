<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Business_Point
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- <div class="entry-head">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="featured-thumb">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full' ); ?></a>
			</div>
		<?php endif; ?>
	</div> -->

	<div class="content-wrap">
		<div class="content-wrap-inner">
			
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
                    $mp_page_id = get_the_ID();
                    if($mp_page_id == 5572){
                        
                        $MERCHANT_KEY = "Y8FIlOx5";
                        $SALT = "4nLOf11OUf";
                        // Merchant Key and Salt as provided by Payu.

                        // $PAYU_BASE_URL = "https://sandboxsecure.payu.in";		// For Sandbox Mode
                        $PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

                        $action = '';

                        $posted = array("amount" => "5000");
                        if(!empty($_POST)) {
                            //print_r($_POST);
                            foreach($_POST as $key => $value) {    
                                if($key == "amount"){
                                    $posted[$key] = "5000"; 
                                }
                                else{
                                    $posted[$key] = $value; 

                                }
                            }
                        }

                        $formError = 0;

                        if(empty($posted['txnid'])) {
                            // Generate random transaction id
                            $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
                        } else {
                            $txnid = $posted['txnid'];
                        }
                        $hash = '';
                        // Hash Sequence
                        $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
                        if(empty($posted['hash']) && sizeof($posted) > 0) {
                            if(
                                    empty($posted['key'])
                                    || empty($posted['txnid'])
                                    || empty($posted['amount'])
                                    || empty($posted['firstname'])
                                    || empty($posted['email'])
                                    || empty($posted['phone'])
                                    || empty($posted['productinfo'])
                                    || empty($posted['surl'])
                                    || empty($posted['furl'])
                                    || empty($posted['service_provider'])
                            ) {
                                $formError = 1;
                            } else {
                                //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
                                $hashVarsSeq = explode('|', $hashSequence);
                                $hash_string = '';	
                                foreach($hashVarsSeq as $hash_var) {
                                $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
                                $hash_string .= '|';
                                }

                                $hash_string .= $SALT;


                                $hash = strtolower(hash('sha512', $hash_string));
                                $action = $PAYU_BASE_URL . '/_payment';
                            }
                        } elseif(!empty($posted['hash'])) {
                            $hash = $posted['hash'];
                            $action = $PAYU_BASE_URL . '/_payment';
                        }

                        ?>

                            <article class="article-section bg-white payment-article">
                                <div class="text-wrap">
                                    <h3 class="article-title">Get Ad Suite</h3>
                                    <p class="article-info text-center">Be the part of online world, digital is the new trend so if you want to have a dose of digitalization then get Ad Suite suitable to you.</p>
                                </div>
                                <div class="img-wrap text-center">
                                    <img src="/wp-content/uploads/2018/05/payment.png" / class="payment-image"> 
                                </div>
                            </article>
                            <article class="article-section bg-primary buy-btn-wrap">

                                <div class="img-wrap text-center">
                                    <img class="b-now-btn" src="/wp-content/uploads/2018/06/buynow.png" alt="buy now">
                                    <!-- <span id="buy-now-btn">
                                        <span>Buy now</span>
                                        <span>just at <i class="fa fa-inr" aria-hidden="true"></i> 5000</span>
                                    </span> -->
                                </div>
                                <div class="text-wrap">
                                    <h3 class="article-title text-white text-center">Buy Ad Suite</h3>
                                    <p class="article-info text-center text-white">
                                        Now buy traffic at best price for the worldwide geography of different categories (e.g Movies, Comedy, Sports, kids etc) on CPM, CPC basis 
                                    </p>
                                </div>
                            </article>
                            <article class="payment-wrapper">
                                <header class="payment-header">
                                    <div id="home-about-section" class="section-title">
                                        <h2 class="widget-title">Choose a payment method</h2>
                                        <div>read our
                                            <a href="/terms-and-conditions/">terms and conditions</a>
                                        </div>
                                        <div class="seperator">
                                            <span>
                                                <i class="fa fa-smile-o" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="pamt-btn-wrap">
                                        <label class="payment-btn">
                                            <input checked onchange="togglepaymentform('paytm')" type="radio" name="payment-method" />
                                            <span>Payu Money</span>
                                        </label>
                                        <label class="payment-btn">
                                            <input onchange="togglepaymentform('paypal')" type="radio" name="payment-method" />
                                            <span>Paypal</span>
                                        </label>
                                    </div>
                                </header>
                                <section class="payment-form hidden" id="paypal-form">
                                    <div class="text-center form-group">
                                        <img src="/wp-content/uploads/2018/06/palpal_logo.png" alt="pay pal" />
                                    </div>
                                    <h4 class="text-center">Choose currency</h4>
                                    <div class="text-center" id="curr-wrap">
                                        <label>
                                            <input onchange="toggle_currency('inr')" type="radio" name="currency-type" value="inr" /> INR</label>
                                        <label>
                                            <input onchange="toggle_currency('usd')" type="radio" name="currency-type" value="usd" /> USD</label>
                                    </div>
                                    <section id="paypal-inr" class="hidden">
                                        <form class="text-center" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                            <input type="hidden" name="cmd" value="_s-xclick">
                                            <input type="hidden" name="hosted_button_id" value="48AY5W3N5NUZG">
                                            <input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
                                            <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1"> 
                                        </form>
                                    </section>
                                    <section id="paypal-usd" class="text-center hidden">
                                        <form class="text-center" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                            <input type="hidden" name="cmd" value="_s-xclick">
                                            <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7----- ">
                                            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                            <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1"> 
                                        </form>
                                    </section>
                                </section>
                                <section class="payment-form text-center" id="paytm-form">
                                    <div class="text-center form-group">
                                        <img src="/wp-content/uploads/2018/06/PayUmoney_Logo.png" alt="pay u money" />
                                    </div>
                                    <?php if($formError) { ?>
                                        <span style="color:red">Please fill all mandatory fields.</span>
                                        <br/>
                                        <br/>
                                    <?php } ?>
                                    <h4>Fields marked with * are required</h4>
                                    <form action="<?php echo $action; ?>" method="post" name="payuForm">
                                        
                                        <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
                                        <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
                                        <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
                                        <input type="hidden" name="furl" value="http://www.mobprodigital.com/payment-cancel/" size="64" />
                                        <input type="hidden" name="surl" value="http://www.mobprodigital.com/payment-success" size="64" />
                                        <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
                                        <input type="hidden" name="productinfo" value="MobPro Digital Services LLP Online Payment"  />
                                        <section class="form-group">
                                            <label for="amount">Amount * (INR)</label>
                                           <input readonly class="form-control" type="text" name="amount" id="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" />
                                        </section>
                                        <section class="form-group">
                                            <label for="firstname">First Name *</label>
                                            <input required type="text" class="form-control" name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" />
                                        </section>
                                        <section class="form-group">
                                            <label for="lastname">Last Name</label>
                                            <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>" />
                                        </section>
                                        <section class="form-group">
                                            <label for="email">Email *</label>
                                            <input required type="email" name="email" id="email" class="form-control" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" />
                                        </section>
                                        <section class="form-group">
                                            <label for="phone">Phone *</label>
                                            <input required type="tel" class="form-control" name="phone" id="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" />
                                        </section>

                                        <?php if(!$hash) { ?>
                                            <section class="form-group">
                                                <label>&nbsp;</label>
                                                <button type="submit">Pay Now</button>
                                            </section>
                                        <?php } ?>

                                            

                                            
                                           <!-- <table>
                                            <tr>
                                                <td><b>Optional Parameters</b></td>
                                            </tr>

                                            <tr>
                                                <td>Last Name: </td>
                                                <td><input name="lastname" id="lastname" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>" /></td>
                                                <td>Cancel URI: </td>
                                                <td><input name="curl" value="" /></td>
                                            </tr>
                                            <tr>
                                                <td>Address1: </td>
                                                <td><input name="address1" value="<?php echo (empty($posted['address1'])) ? '' : $posted['address1']; ?>" /></td>
                                                <td>Address2: </td>
                                                <td><input name="address2" value="<?php echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>" /></td>
                                            </tr>
                                            <tr>
                                                <td>City: </td>
                                                <td><input name="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>" /></td>
                                                <td>State: </td>
                                                <td><input name="state" value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>" /></td>
                                            </tr>
                                            <tr>
                                                <td>Country: </td>
                                                <td><input name="country" value="<?php echo (empty($posted['country'])) ? '' : $posted['country']; ?>" /></td>
                                                <td>Zipcode: </td>
                                                <td><input name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" /></td>
                                            </tr>
                                            <tr>
                                                <td>UDF1: </td>
                                                <td><input name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" /></td>
                                                <td>UDF2: </td>
                                                <td><input name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" /></td>
                                            </tr>
                                            <tr>
                                                <td>UDF3: </td>
                                                <td><input name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" /></td>
                                                <td>UDF4: </td>
                                                <td><input name="udf4" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" /></td>
                                            </tr>
                                            <tr>
                                                <td>UDF5: </td>
                                                <td><input name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" /></td>
                                                <td>PG: </td>
                                                <td><input name="pg" value="<?php echo (empty($posted['pg'])) ? '' : $posted['pg']; ?>" /></td>
                                            </tr> 
                                            <tr>
                                            
                                            </tr>
                                        </table>-->
                                    </form>
                                </section>
                            </article>

                            

                                <script>
                                    var hash = '<?php echo $hash ?>';
                                    (function submitPayuForm() {
                                        if(hash == '') {
                                            return;
                                        }
                                        var payuForm = document.forms.payuForm;
                                        payuForm.submit();
                                    }());

                                    function togglepaymentform(target) { 
                                        if (target == 'paypal') { 
                                            document.getElementById("paypal-form").classList.remove('hidden'); 
                                            document.getElementById("paytm-form").classList.add('hidden'); 
                                        } 
                                        else { 
                                            document.getElementById("paytm-form").classList.remove('hidden'); 
                                            document.getElementById("paypal-form").classList.add('hidden'); 
                                        } 
                                    } 
                                    function toggle_currency(selected_curr) { 
                                        if (selected_curr == 'inr') { 
                                            document.getElementById("paypal-inr").classList.remove('hidden'); 
                                            document.getElementById("paypal-usd").classList.add('hidden'); 
                                        } 
                                        else { 
                                            document.getElementById("paypal-usd").classList.remove('hidden'); 
                                            document.getElementById("paypal-inr").classList.add('hidden'); 
                                        } 
                                    }
                                </script>
                        <?php
                    }
                    else{
                        the_content( sprintf(
                            /* translators: %s: Name of current post. */
                            wp_kses( esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'business-point' ), array( 'span' => array( 'class' => array() ) ) ),
                            the_title( '<span class="screen-reader-text">"', '"</span>', false )
                        ) );
                    }

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'business-point' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

			<?php if ( get_edit_post_link() ) : ?>
				<footer class="entry-footer">
					<?php
						edit_post_link(
							sprintf(
								/* translators: %s: Name of current post */
								esc_html__( 'Edit %s', 'business-point' ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
							),
							'<span class="edit-link">',
							'</span>'
						);
					?>
				</footer><!-- .entry-footer -->
			<?php endif; ?>
		</div>
	</div>

</article><!-- #post-## -->
