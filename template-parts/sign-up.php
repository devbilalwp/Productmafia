<?php
/*
*  Template Name: Membership SignUp
*
*/
if(!defined ('ABSPATH')){
    exit;
} 
get_header();
?>

<div id="login-page" class="xl:container mx-auto">
    <div id="login-content" class="xl:w-[550px] xl:h-[620px] mx-auto px-10 bg-white mt-[230px] mb-32 border-solid border-[1px] border-[##f3f3f3]">
        <h1 class="font-semibold text-center text-black text-[36px] pt-4 pb-2">Join Product Mafia</h1>
        <p class="text-[16px] text-center text-black font-sans pb-[25px]">Find winning products, Find winning ads, sell more stuff, build your business, crush your competition all with Product Mafia's spy tools</p>
        <div id="login-link" class="mx-auto w-[100%]">
           <p class="flex flex-row px-[40px] mx-[80px] rounded-md py-4 items-center my-2 border border-[1px]"><img src="<?php echo get_template_directory_uri();?>/uploads/facebook.png"><span class="font-bold ml-[20px] text-[15px]">Sign up with Facebook</span></p>
           <p class="flex flex-row px-[40px] mx-[80px] rounded-md py-4 items-center my-2 border border-[1px]"><img src="<?php echo get_template_directory_uri();?>/uploads/search.png" class="w-[32px] h-[32px]"><span class="font-bold ml-[20px] text-[15px]"> Sign up with Google</span></p>
           <p class="flex flex-row px-[40px] mx-[80px] rounded-md py-4 items-center my-2 border border-[1px]"><img src="<?php echo get_template_directory_uri();?>/uploads/envelope.png" class="w-[32px] h-[32px]"><span class="font-bold ml-[20px] text-[15px]">Sign up with Facebook</span></p>
        </div>
        <div id="link-text">
            <p class="my-[50px] mx-auto text-center text-[18px] font-semibold font-sans">Already have an account? <a href="#" class="underline focus:text-black hover:text-black visited:text-black text-center focus:outline-none">Sign up</a></p>
            <p class="text-sm text-center mx-auto">By signing up you agree to our </p>
            <span class="text-center mx-auto block text-sm"><a href="#" class="underline focus:text-black hover:text-black visited:text-black text-center focus:outline-none">Terms of Use</a> and <a href="#" class="underline focus:text-black hover:text-black visited:text-black text-center focus:outline-none">Privacy Policy</a>.</span>
        </div>
    </div>
</div>

<?php
get_footer();