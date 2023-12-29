<?php 
/*
*
*   Template Name: membership-billing
*/
if(!defined('ABSPATH')){
    exit;
}

get_header();
?>
<style>
    body {
    background-color: #EFEFEF;
}

</style>
<section class="px-[6%] py-20 ">
  <div class="inner xl:w-[950px] bg-white mx-auto p-5">
    <div class="heading">
      <h1 class="font-lato font-bold text-black text-[36px] pb-4">Membership Invoice</h1>
    </div>
    <?php echo do_shortcode('[pmpro_billing]'); ?>
</div>
</section>
<?php
get_footer();
?>