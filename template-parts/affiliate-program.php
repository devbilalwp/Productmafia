<?php 
/*
*
*   Template Name: Affiliate Program
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
    section.affiliate-program-sec {
    max-width: 837px;
    margin: 65px auto 20px auto;
    background-color: white;
    padding: 20px;
    }
    .affiliate-program-sec .heading h1 {
    font-size: 24px;
    line-height: 34px;
    font-weight: 700;
    font-family: 'Lato';
    color: #0a0a0a;
}
.affiliate-program-sec hr {
    border-top: 1px solid #cccccc;
    max-width: 100%;
    margin: 20px 0;
}
.affiliate-program-sec .inner-sec .wp_aff_title {
    font-family: 'Lato';
    font-size: 32px;
    font-weight: 300;
    color: #0F548B;
    border-bottom: 1px solid #EEE;
    text-align: center;
    padding: 0px 0px 15px 20px;
    margin-bottom: 10px;
}

.affiliate-program-sec .affiliate-form .affiliate-form-text {
    font-family: 'Lato';
    font-size: 14px;
    line-height: 20px;
    font-weight: 400;
    color: #000000;
}
.affiliate-program-sec .affiliate-form h3 {
    font-family: 'Lato';
    font-size: 24px;
    line-height: 34px;
    font-weight: 700;
    color: #000000;
    margin-top:20px;
    margin-bottom:10px;
}
div#wp_aff_footer {
    display: none;
}

.affiliate-program-sec .affiliate-form td {
    font-size: 12px;
    font-family: 'Lato';
    font-weight: 700;
    color: #000000;
}

#wp_aff_inside img {
    display: inline !important;
}
</style>
<section class="affiliate-program-sec">
  <div class="inner-sec w-full">
    <div class="heading">
      <h1 class="">Affiliates</h1>
    </div>
    <hr>
    <div class="affiliate-form">
        <?php echo do_shortcode('[wp_affiliate_view]'); ?>
    </div>
</div>
</section>
<?php
get_footer();
