<?php
/*
*  Template Name: Membership Checkout
*
*/
if(!defined ('ABSPATH')){
    exit;
} 
global $gateway, $pmpro_review, $skip_account_fields, $pmpro_paypal_token, $wpdb, $current_user, $pmpro_msg, $pmpro_msgt, $pmpro_requirebilling, $pmpro_level, $pmpro_levels, $tospage, $pmpro_show_discount_code, $pmpro_error_fields;
	global $discount_code, $username, $password, $password2, $bfirstname, $blastname, $baddress1, $baddress2, $bcity, $bstate, $bzipcode, $bcountry, $bphone, $bemail, $bconfirmemail, $CardType, $AccountNumber, $ExpirationMonth,$ExpirationYear;
get_header();
?>

<!-- <div id="login-page" class="xl:container mx-auto">
    <div id="login-content" class="xl:w-[550px] mx-auto px-10 bg-white mt-[32px] mb-[32px] border-solid border-[1px] border-[#f3f3f3]">
        <h1 class="font-lato font-semibold text-center text-black text-[36px] pt-4 pb-2">Join Product Mafia</h1>
        <p class="font-lato text-[16px] text-center text-black pb-[25px]">Find winning products, Find winning ads, sell more stuff, build your business, crush your competition all with Product Mafia's spy tools</p>
        <div id="login-link" class="mx-auto w-[100%]">
            <p id = "facebook-login" class="flex flex-row px-[40px] mx-[60px] rounded-md py-4 items-center my-2 border border-[1px] cursor-pointer"><img src="<?php echo get_template_directory_uri();?>/uploads/facebook.png"><span class="font-lato font-bold ml-[20px] text-[15px]">Sign in with Facebook</span></p>
            <p id = "google-login" class="flex flex-row px-[40px] mx-[60px] rounded-md py-4 items-center my-2 border border-[1px] cursor-pointer"><img src="<?php echo get_template_directory_uri();?>/uploads/search.png" class="w-[32px] h-[32px]"><span class="font-lato font-bold ml-[20px] text-[15px]"> Sign in with Google</span></p>
           <p id = "email-login" class="flex flex-row px-[40px] mx-[60px] rounded-md py-4 items-center my-2 border border-[1px] cursor-pointer"><img src="<?php echo get_template_directory_uri();?>/uploads/envelope.png" class="w-[32px] h-[32px]"><span class="font-lato font-bold ml-[20px] text-[15px]">Sign in with Email</span></p>
           <?php 
         //  echo do_shortcode('[pmpro_checkout]');
            ?>
        </div>
        <div id="link-text">
            <p class="my-[30px] mx-auto text-center text-[18px] font-semibold font-lato">Already have an account? <a href="<?php echo get_site_url().'/login'; ?>" class="underline focus:text-black hover:text-black visited:text-black text-center focus:outline-none">Sign In</a></p>
            <p class="font-lato text-sm text-center mx-auto">By signing up you agree to our </p>
            <span class="font-lato text-center mx-auto block text-sm"><a href="<?php echo get_site_url().'/privacy-policy'; ?>" class="underline focus:text-black hover:text-black visited:text-black text-center focus:outline-none" target="_blank">Privacy Policy</a> and <a href="<?php echo get_site_url().'/terms-of-service'; ?>" class="underline focus:text-black hover:text-black visited:text-black text-center focus:outline-none" target="_blank">Terms of Service</a>.</span>
        </div>
    </div>
</div> -->

<?php 
$aaupgrade = (is_user_logged_in()) ? "Upgrade " :  ""; 
if($pmpro_level->id == 9){
	
	$aamoyr = '/month';
}elseif($pmpro_level->id == 10){
	$aamoyr = '/year';   
} 
$aalevelprice = (is_user_logged_in()) ? number_format((float)$pmpro_level->billing_amount, 2, '.', '') :  number_format((float)$pmpro_level->initial_payment, 2, '.', '');
$firstmonth = number_format((float)$pmpro_level->initial_payment, 2, '.', '');

				/**
				 * All devs to filter the level description at checkout.
				 * We also have a function in includes/filters.php that applies the the_content filters to this description.
				 * @param string $description The level description.
				 * @param object $pmpro_level The PMPro Level object.
				 */
				$level_description = apply_filters('pmpro_level_description', $pmpro_level->description, $pmpro_level);
				if(!empty($level_description))
					//echo $level_description;
			?>
<section class="py-16 px-12">
    <div class="content [max-width:850px;] m-auto">
        <div class="content-wraper md:flex md:justify-between">
            <div class="left [max-width:415px;]  md:[padding-right:8%;] lg:[padding-right:3%;]">
           <?php if($pmpro_level->id == 9){	
?>
                <div id="onedoller"class="left-header py-8 px-3 [background-color:#00c57f;]">
                    <p class="font-lato font-normal [font-size:22px;] text-white text-center ">ALL OF PRODUCT MAFIA - FIRST MONTH $1</p>
                </div>
<?php
}
?>
                <div class="heading mt-5 mb-3">
                    <h3 class="font-lato font-bold text-4xl text-black">Your order</h3>
                </div>
                <div class="pricing-table">
                    <div class="table-line flex gap-3 justify-between py-3">
                        <div class="name">
                            <p class="font-lato font-light text-base text-black">Product Mafia Membership  <?php echo $aaupgrade; ?> - PRO</p>
                        </div>
                        <div class="value w-1/3 lg:w-1/5">
                            <p class="font-lato font-thin text-base text-black no-underline">$<?php 
                            echo number_format((float)$pmpro_level->billing_amount, 2, '.', '').$aamoyr; 
                            ?>          
                            </p>
                        </div>
                    </div>
                    <div class="table-line flex gap-3 justify-between py-3">
                        <div class="name">
                            <p class="font-lato font-light text-base text-black">Discount Code?</p>
                        </div>
                        <div class="value w-1/3 lg:w-1/5">
                            <a href="#" class="font-lato font-thin text-base text-black no-underline">Enter Here</a>
                            
                        </div>
                    </div>
                    <div class="table-line flex gap-3 justify-between py-3">
                        <div class="name">
                            <p class="font-lato font-light text-base text-black"><?php echo $submo = ($pmpro_level->initial_payment == $pmpro_level->billing_amount) ? 'Subtotal' : 'First Month'; ?></p>
                        </div>
                        <div class="value w-1/3 lg:w-1/5">
                            <p class="font-lato font-thin text-base text-black no-underline">$<?php echo $firstmonth; ?></p>
                        </div>
                    </div>
                    <div class="table-line flex gap-3 justify-between py-3">
                        <div class="name">
                            <p class="font-lato font-light text-base text-black">Total to pay now</p>
                        </div>
                        <div class="value w-1/3 lg:w-1/5">
                            <p class="font-lato font-thin text-base text-black no-underline">$<?php echo $firstmonth; ?></p>
                        </div>
                    </div>
                </div>
                <div class="button mt-4 mb-11">
                <?php if($pmpro_level->id == 11){	
?>
<p style="text-align:center; font-family: 'Lato';">The price for membership is <strong>$5.00 per Month</strong>. </p>
    <?php } ?>                <a href="#"><img src="https://www.productmafia.com/wp-content/uploads/2020/03/proceed-to-paypal.png"></a>
                </div>
            </div>
            <div class="right md:w-2/5">
                <div class="what-include bg-white py-2 px-5 shadow-lg">
                    <div class="heading">
                        <h4 class="font-lato font-normal text-xl text-black mt-5">What is included:</h4>
                    </div>
                    <div class="list">
                        <ul>
                            <li class="font-lato font-normal text-sm text-black my-2"><span><i class="fa-solid fa-check mr-2 [color:#00b878;]"></i></span>No time delay on winning products</li>
                            <li class="font-lato font-normal text-sm text-black my-2"><span><i class="fa-solid fa-check mr-2 [color:#00b878;]"></i></span>Untapped & special products</li>
                            <li class="font-lato font-normal text-sm text-black my-2"><span><i class="fa-solid fa-check mr-2 [color:#00b878;]"></i></span>Full use of Ad Spy</li>
                            <li class="font-lato font-normal text-sm text-black my-2"><span><i class="fa-solid fa-check mr-2 [color:#00b878;]"></i></span>One-click push to store</li>
                            <li class="font-lato font-normal text-sm text-black my-2"><span><i class="fa-solid fa-check mr-2 [color:#00b878;]"></i></span>10-day money back guarantee</li>
                            <li class="font-lato font-normal text-sm text-black my-2"><span><i class="fa-solid fa-check mr-2 [color:#00b878;]"></i></span>Fast, friendly support and updates 🙂</li>
                        </ul>
                    </div>
                </div>
                <div class="right-bottom p-3 mt-12 mb-7 border-4 border-solid border-blue-600 transform rotate-[-2deg]">
                    <p class="font-lato font-normal text-xl text-blue-600">You're minutes away from a better, more profitable eCommerce website based upon real product research</p>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="px-12 [padding-bottom:4%;] [max-width:1170px;] m-auto lg:[padding-bottom:5%;] lg:flex gap-14 justify-between items-center">
    <div class="min-box pb-3">
        <p class="font-lato font-normal text-sm text-black flex items-center"><span><i class="fa-regular fa-circle-check text-6xl mr-3 text-black"></i></span>Cancel before 15th July 2023 and you won't be charged again</p>
    </div>
    <div class="min-box pb-3">
        <p class="font-lato font-normal text-sm text-black flex items-center"><span><i class="fa-regular fa-calendar text-6xl mr-3 text-black"></i></span>We'll email you a reminder 3 days before your trial ends</p>
    </div>
    <div class="min-box pb-3">
        <p class="font-lato font-normal text-sm text-black flex items-center"><span><i class="fa-solid fa-thumbs-up text-6xl mr-3 text-black"></i></span>No price increases, ever. Get locked in at this price.    </p>
    </div>
</section>


<script>
    jQuery(document).ready(function() {
        jQuery('#pmpro_level-1').hide();
        jQuery('#pmpro_btn-submit').val('Sign Up');
        jQuery('#email-login').click(function(){
            jQuery('#pmpro_level-1').toggle();
            jQuery('#pmpro_user_fields').toggle();
        });
        jQuery('#facebook-login').click(function(){
            jQuery('.theChampFacebookLogin').click();
        });
        jQuery('#google-login').click(function(){
            jQuery('.theChampGoogleLogin').click();
        });
    });
</script>

<?php
get_footer();