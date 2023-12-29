<?php 
/*
*
*   Template Name: membership-cancellation
*/
if(!defined('ABSPATH')){
    exit;
}

get_header();

// echo do_shortcode('[pmpro_cancel]');
?>

<style>
    .cancellation-sec{
        background-image: url(https://productmafia.staging.wpmudev.host/wp-content/uploads/2023/06/image_2023_06_26T18_14_32_125Z.png);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<section class="cancellation-sec py-[150px] px-[70px] mt-[-75px] bg-center bg-[https://productmafia.staging.wpmudev.host/wp-content/uploads/2023/06/image_2023_06_26T18_14_32_125Z.png] bg-cover bg-no-repeat ">
    <div class="content-wraper lg:flex justify-between w-full">
        <div class="left lg:w-1/2">
            <div class="image w-[300px] lg:w-full pb-8 lg:p-0 m-auto">
                <img class="w-full" src="https://productmafia.staging.wpmudev.host/wp-content/uploads/2023/06/image_2023_06_26T18_14_32_122Z.png">
            </div>
        </div>
        <div class="right md:w-[400px] m-auto lg:mr-0 lg:ml-auto text-center lg:text-end">
            <div id="heading">
                <h2 class="font-lato font-extrabold text-[60px] md:text-[80px] lg:text-[100px] [line-height:60px;] md:[line-height:80px;] lg:[line-height:100px;] text-white">COME BACK</h2>
            </div>
            <div id="cancellation-text">
                <h3 class="font-lato font-bold text-xl lg:text-2xl text-white">Your membership has been cancelled.</h3>
            </div>
            <div id="discription">
                <p class="font-lato font-light text-xl lg:text-2xl text-white">You will not be charged again. <br> Maybe we can tempt you can <br> with a better offer?</p>
            </div>
            <div id="get-pro-btn" class="mt-5 w-[257px] lg:w-[360px] ml-auto mr-auto lg:mr-0 lg:ml-auto">
                <a class="block p-5 lg:py-5 lg:px-10 bg-white hover:bg-[#FFF000] rounded-xl font-lato font-extrabold text-xl lg:text-[26px] [line-height:18px;] text-black hover:text-black visited:text-black w-full text-center " href="https://productmafia.staging.wpmudev.host/membership-account/checkout/?level=2">GET PRO $5 /MONTH</a>
            </div>
            <div id="bottom-text" class="w-[360px] mt-5 ml-auto mr-auto lg:mr-0 lg:ml-auto text-center">
                <p class="font-lato font-light text-sm text-white">
                    *No minimum contract. Cancel any time. <br>
                    **Must sign up using this button on this page.
                </p>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>
