<?php 
/*
*
*   Template Name: membership-subscription
*/
if(!defined('ABSPATH')){
    exit;
}

get_header();

global$current_user;
$current_user = wp_get_current_user();
$current_level = pmpro_getMembershipLevelForUser($current_user->ID);
?>

<style>
    body{
        background-color: #EFEFEF;
    }
    #recommend-box:before {
        content: "Recommended";
        background: #3ace2e;
        display: inline-block;
        padding: 8px;
        position: absolute;
        top: -22px;
        text-transform: uppercase;
        color: #fff;
        left: 17.5%;
        width: 65%;
    }
</style>




<section class="pt-11">
    <div class="inner-sec [max-width:1060px;] m-auto">
        <div class="content-wraper bg-white p-5 m-5">
            <div class="heading">
                <h2 class="font-lato font-bold text-2xl text-[#0a0a0a]">Select Level</h2>
                

            </div>
            <hr class="h-[1px] bg-[#cccccc] my-4">
            <div class="levels">
                <div class="text-center relative inline-block w-full md:w-[48%] lg:w-[32%] mx-[0.5%] bg-[#F5F5F5] mt-6 p-[10px]">
                    <h2 class="font-lato font-bold text-3xl text-[#0a0a0a] my-4">Free</h2>
                    <div class="plan-cost">
                        <p class="font-lato font-normal text-sm text-black mb-[10px]"><strong>Free</strong></p>
                    </div>
                    <div class="description">
                        <ul class="font-lato font-normal text-sm text-black mb-[10px]">
                            <li>2 products per day</li>
                            <li>Very limited data</li>
                            <li>5 saved products</li>
                            <li>3 days delay on new products</li>
                            <li>No access to the community</li>
                        </ul>
                    </div>
                    <div class="select-btn"><?php 
                     if (pmpro_hasMembershipLevel(2, $current_user->ID)) {
                     ?> <a class="font-lato font-bold text-sm text-white hover:text-white visited:text-white py-[6px] px-[10px] block [letter-spacing:1px;] [text-transform:uppercase;] bg-[#3ACE2E] rounded-md text-center" href="">
                      your level
                    </a><?php
                  }  else {
                    ?> <a class="font-lato font-bold text-sm text-white hover:text-white visited:text-white py-[6px] px-[10px] block [letter-spacing:1px;] [text-transform:uppercase;] bg-[#3ACE2E] rounded-md text-center" href="https://productmafia.staging.wpmudev.host/membership/checkout/?level=2">
                    Select
                  </a><?php
                      }                 
                    ?>
      
                    </div>
                </div>
                <div class="text-center relative inline-block w-full md:w-[48%] lg:w-[32%] mx-[0.5%] bg-[#F5F5F5] mt-6 p-[10px]">
                    <h2 class="font-lato font-bold text-3xl text-[#0a0a0a] my-4">Pro</h2>
                    <div class="plan-cost">
                        <p class="font-lato font-normal text-sm text-black mb-[10px]"><strong>$1.00 </strong>for the first month. <br>Then <strong>$49.00 per Month.</strong></p>
                    </div>
                    <div class="description">
                        <ul class="font-lato font-normal text-sm text-black mb-[10px]">
                            <li>Unlimited products per day</li>
                            <li>Full data access</li>
                            <li>Access to Untapped Products</li>
                            <li>Access to Special Products</li>
                            <li>Unlimited saves</li>
                            <li>Part of our private community</li>
                            <li>Zero delay!</li>
                        </ul>
                    </div>
                    <div class="select-btn">
                      <?php
                    if (pmpro_hasMembershipLevel(9, $current_user->ID)) {
                     ?> <a class="font-lato font-bold text-sm text-white hover:text-white visited:text-white py-[6px] px-[10px] block [letter-spacing:1px;] [text-transform:uppercase;] bg-[#3ACE2E] rounded-md text-center" href="">
                      your level
                    </a><?php
                  }  else {
                    ?> <a class="font-lato font-bold text-sm text-white hover:text-white visited:text-white py-[6px] px-[10px] block [letter-spacing:1px;] [text-transform:uppercase;] bg-[#3ACE2E] rounded-md text-center" href="https://productmafia.staging.wpmudev.host/membership/checkout/?level=9">
                    Select
                  </a><?php
                      }                 
                    ?> </div>
                </div>
                <div class="text-center relative inline-block w-full md:w-[48%] lg:w-[32%] mx-[0.5%] bg-[#F5F5F5] mt-6 p-[10px]">
                    <h2 class="font-lato font-bold text-3xl text-[#0a0a0a] my-4">Pro (Annual)</h2>
                    <div class="plan-cost">
                        <p class="font-lato font-normal text-sm text-black mb-[10px]"><strong>$120.00 per Year</strong></p>
                    </div>
                    <div class="description">
                        <ul class="font-lato font-normal text-sm text-black mb-[10px]">
                            <li>Unlimited products per day</li>
                            <li>Full data access</li>
                            <li>Access to Untapped Products</li>
                            <li>Access to Special Products</li>
                            <li>Unlimited saves</li>
                            <li>Part of our private community</li>
                            <li>Zero delay!</li>
                        </ul>
                    </div>
                    <div class="select-btn">
                    <?php
                    if (pmpro_hasMembershipLevel(10, $current_user->ID)) {
                     ?> <a class="font-lato font-bold text-sm text-white hover:text-white visited:text-white py-[6px] px-[10px] block [letter-spacing:1px;] [text-transform:uppercase;] bg-[#3ACE2E] rounded-md text-center" href="">
                      your level
                    </a><?php
                  }  else {
                    ?> <a class="font-lato font-bold text-sm text-white hover:text-white visited:text-white py-[6px] px-[10px] block [letter-spacing:1px;] [text-transform:uppercase;] bg-[#3ACE2E] rounded-md text-center" href="https://productmafia.staging.wpmudev.host/membership/checkout/?level=10">
                    Select
                  </a><?php
                      }                 
                    ?>  
                  
                  </div>
                </div>
                <div id="recommend-box" class="text-center inline-block w-full md:w-[48%] lg:w-[32%] mx-[0.5%] relative mt-6 p-[10px] border-[5px] border-solid border-[#3ace2e]">

                    <h2 class="font-lato font-bold text-3xl text-[#0a0a0a] my-4">Pro - $5 / month</h2>
                    <div class="plan-cost">
                        <p class="font-lato font-normal text-sm text-black mb-[10px]"><strong>$5.00 per Month.</strong></p>
                    </div>
                    <div class="description">
                        <ul class="font-lato font-normal text-sm text-black mb-[10px]">
                            <li>Unlimited products per day</li>
                            <li>Full data access</li>
                            <li>Access to Untapped Products</li>
                            <li>Access to Special Products</li>
                            <li>Unlimited saves</li>
                            <li>Part of our private community</li>
                            <li>Zero delay!</li>
                        </ul>
                    </div>
                    <div class="select-btn">
                    <?php
                    if (pmpro_hasMembershipLevel(11, $current_user->ID)) {
                     ?> <a class="font-lato font-bold text-sm text-white hover:text-white visited:text-white py-[6px] px-[10px] block [letter-spacing:1px;] [text-transform:uppercase;] bg-[#3ACE2E] rounded-md text-center" href="">
                      your level
                    </a><?php
                  }  else {
                    ?> <a class="font-lato font-bold text-sm text-white hover:text-white visited:text-white py-[6px] px-[10px] block [letter-spacing:1px;] [text-transform:uppercase;] bg-[#3ACE2E] rounded-md text-center" href="https://productmafia.staging.wpmudev.host/membership/checkout/?level=11">
                    Select
                  </a><?php
                      }                 
                    ?> 
                    </div>
                </div>
            </div>
            <div class="return-to-acc mt-1 mb-5">
                <a href="https://productmafia.staging.wpmudev.host/membership">← Return to Your Account</a>
            </div>
        </div>
    </div>
</section>







<?php
get_footer();
?>