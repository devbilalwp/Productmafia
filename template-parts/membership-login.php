<?php
/*
*  Template Name: Membership Login In
*
*/
if(!defined ('ABSPATH')){
    exit;
}
get_header();
?>

<div id="login-page" class="xl:container mx-auto">
    <div id="login-content" class="xl:w-[550px] mx-auto px-10 bg-white mt-[32px] mb-[32px] border-solid border-[1px] border-[#f3f3f3]">
        <h1 class="font-lato font-semibold text-center text-black text-[36px] pt-4 pb-2">Welcome Back.</h1>
        <p class="font-lato text-[16px] text-center text-black pb-[25px]">Sign in to get winning dropshipping products, winning Facebook ads and to access all our dropshipping spy-tools.</p>
        <div id="login-link" class="mx-auto w-[100%]">
           <p id = "facebook-login" class="flex flex-row px-[40px] mx-[60px] rounded-md py-4 items-center my-2 border border-[1px] cursor-pointer"><img src="<?php echo get_template_directory_uri();?>/uploads/facebook.png"><span class="font-lato font-bold ml-[20px] text-[15px]">Sign in with Facebook</span></p>
           <p id = "google-login" class="flex flex-row px-[40px] mx-[60px] rounded-md py-4 items-center my-2 border border-[1px] cursor-pointer"><img src="<?php echo get_template_directory_uri();?>/uploads/search.png" class="w-[32px] h-[32px]"><span class="font-lato font-bold ml-[20px] text-[15px]"> Sign in with Google</span></p>
           <p id = "email-login" class="flex flex-row px-[40px] mx-[60px] rounded-md py-4 items-center my-2 border border-[1px] cursor-pointer"><img src="<?php echo get_template_directory_uri();?>/uploads/envelope.png" class="w-[32px] h-[32px]"><span class="font-lato font-bold ml-[20px] text-[15px]">Sign in with Email</span></p>
           <?php echo do_shortcode('[theme-my-login]'); ?>
        </div>
        <div id="link-text">
            <p class="my-[30px] mx-auto text-center text-[18px] font-semibold font-lato">Need an account? <a href="<?php echo get_site_url().'/membership-account/checkout/?level=1'; ?>" class="underline focus:text-black hover:text-black visited:text-black text-center focus:outline-none">Sign up</a></p>
            <p class="font-lato text-sm text-center mx-auto">By logging in, you agree to our </p>
            <span class="font-lato text-center mx-auto block text-sm"><a href="<?php echo get_site_url().'/privacy-policy'; ?>" class="underline focus:text-black hover:text-black visited:text-black text-center focus:outline-none" target="_blank">Privacy Policy</a> and <a href="<?php echo get_site_url().'/terms-of-service'; ?>" class="underline focus:text-black hover:text-black visited:text-black text-center focus:outline-none" target="_blank">Terms of Service</a>.</span>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function() {
        jQuery('.tml-login').hide();
        jQuery('#email-login').click(function(){
            jQuery('.tml-login').toggle();
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