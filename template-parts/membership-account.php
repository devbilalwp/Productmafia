<?php 
/*
*
*   Template Name: Membership Account
*/

if(!defined('ABSPATH')){
    exit;
}

get_header();
global $current_user;
?>
<section class="px-[6%]">
  <div class="inner xl:w-[1000px] mx-auto py-20">
    <div class="heading">
      <h1 class="font-lato font-bold text-black text-[36px] pb-4">Profile and Settings</h1>
    </div>
    <div class="form-content lg:flex lg:justify-between">
      <div class="hadings lg:w-1/3">
        <h3 class="py-2"><a href="/membership/" id="id1" class="font-lato text-black no-underline text-lg hover:text-red-600">My Profile</a></h3>
        <h3 class="py-2"><a  id="id2" class="font-lato text-black text-lg no-underline hover:text-red-600">Account Information</a></h3>
      </div>
      <div id="acc">
      <?php echo do_shortcode('[pmpro_member_profile_edit]'); ?>
      <h3 class="font-lato font-bold text-3xl text-black my-5">My Account</h3>
              <a href="/membership-account/?view=change-password" id="change-password" class="font-lato font-normal text-sm no-underline text-red-600 hover:text-red-600">Change Password</a>
    <div class="heading mt-10 mb-5">
          <div class="member-profile w-full inline-block md:text-center">
          <div class="websites [max-width:700px;] ml-auto">
          
      <h2 class="font-lato font-bold text-2xl text-black text-center">Websites</h2>
      <?php echo do_shortcode('[edit_shopify_store]'); ?>
    </div>
              
          </div>         
        </div>
        </div>    
      <!-- Hidden Content -->
      <div id ="div2" class="account-info-content hidden">
        <div class="heading">
          <h2 class="mb-5 font-lato font-bold text-2xl text-gray-800">Account Information</h2>
        </div>
        <div class="level flex items-center">
          <p class="text-base text-black font-normal"><b>Account Level:</b><?php echo do_shortcode("[pmpro_member field='membership_name']"); ?></p>
          <button onclick="window.location.href='/membership/membership-cancel/';" class="btn btn-update py-[10px] ml-3 px-5 font-lato font-bold text-sm text-white border-none rounded uppercase bg-red-600  hover:bg-red-500" fdprocessedid="ee6wl5">Cancel</button>
        </div>
    </div>
  </div>
  </div>
  </div>
</section> 
<script>
    jQuery(document).ready(function($) {
        jQuery('#id2').click(function() {
            jQuery('#div2').removeClass('hidden');
            jQuery('#acc').addClass('hidden');
      });

      jQuery('#id1').click(function() {
        jQuery('#acc').removeClass('hidden');
        jQuery('#div2').addClass('hidden');
      });
    });
  </script>
<style>
a#change-password:before {
    display: inline-block;
    content: "";
    width: 15px;
    height: 15px;
    background-position: left center;
    background-size: contain;
    background-repeat: no-repeat;
    background-image: url(https://www.productmafia.com/wp-content/uploads/2021/02/icon-pen-01.png);
    vertical-align: middle;
    margin-right: 5px;
    margin-bottom: 5px;
}

form input {
    padding: 6px 12px !important;
    display: block;
}

.store-edit-wrapper .pen {
    position: absolute;
    top: 38px;
    right: 7px;
    background-position: center;
    background-size: contain;
    background-repeat: no-repeat;
    max-width: 100%;
    background-color: transparent;
    width: 20px;
    height: 20px;
    cursor: pointer;
    background-image: url(https://www.productmafia.com/wp-content/themes/bb-theme-child/assets/img/icon-pen.png);
}

input.pmpro_btn.pmpro_btn-submit {
    padding: 10px 20px;
    background-color: #f30000;
    border-color: #f30000;
    font-weight: 700;
    color: #ffffff;
    border-radius: 4px;
    font-size: 14px;
    line-height: 20px;
    letter-spacing: 1px;
    margin-bottom: 10px;
    display: inline-block;
}
</style>
<?php

get_footer();