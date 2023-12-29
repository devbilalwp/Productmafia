<?php
/*
*  Template Name: Modern slavery statement
*
*/
if(!defined ('ABSPATH')){
    exit;
} 
get_header();
?>
        <div id="banner-section" class="py-[70px] mb-[50px] bg-[url('<?php echo get_template_directory_uri();?>/uploads/term-banner.webp')] bg-no-repeat">
            <div id="member-term-banner-title" class="term-banner">
                <h1 class="text-center text-white font-semibold text-[37px] font-sans pt-4 pb-2"><?php the_title();?></h1>
            </div>
        </div>
        <div id="below-banner-content xl:container">

            <h2 class="text-center text-black font-semibold text-[24px] font-sans pb-4"><?php the_field('below_banner_first_title');?></h2>
            <h3 class="text-center text-black font-semibold text-[24px] font-sans pb-2"><?php the_field('below_banner_second_title');?></h3>

            <div class="member-term-content mx-auto md:px-32 sm:px-10 px-8 pt-2 pb-10 text-black font-normal text-[17px] leading-8">
                 <?php the_content();?>
            </div>
        </div>




<?php
get_footer();