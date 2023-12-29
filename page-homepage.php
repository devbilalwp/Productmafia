<?php
/*
Template Name: Homepage
*/
?>
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" /> -->
<?php
get_header();
$paged = get_query_var('paged');
$args = array(
    'post_type' => 'product',
    'posts_per_page' => 60,
   'tax_query' => array(
       array(
           'taxonomy' => 'as-seen-on',
           'field'    => 'slug',
           'terms'    => 'product-mafia',
       ),
   ),
);
$products = new WP_Query($args);
$productsData = $products->posts;

?>

    <script src="<?php bloginfo('template_directory'); ?>/js/jquery-3.6.0.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        gradient: 'linear-gradient(94.83deg,#ca16e8 -2.31%,#ff4853 95.06%);',
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://www.productmafia.com/wp-content/themes/bb-theme-child/style.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style/style.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style/home.css">
    <section class="entry_section header w-full ">

        <!-- sm:text-4xl  md:text-5xl lg:text-8xl   max-w-5xl -->
        <div class="headerContent  ">

            <h1 class="head_h1 futura-pt-extra pt-[50px] text-3xl max-w-[80vw] lg:max-w-[80vw] md:max-w-[540px] xl:max-w-[956px] text-[32px] md:text-[46px] lg:text-[61px] xl:text-[82px] mb-[40px] font-extrabold leading-none tracking-[-0.01em] mx-auto text-white text-center lg:             ">
                Winning Dropshipping Products. Curated Daily.</h1>
            <p class="headcount_p  font-semibold text-transparent bg-gradient-to-r from-purple-500 to-red-500 uppercase tracking-[0.04em] bg-clip-text text-[4vw] text-center   mb-[70px] text-3xl  sm:text-4xl md:text-[2.2vw] lg:text-[2.2vw] xl:text-[30px]    ">
                Trusted by over <?php echo get_field('header_number'); ?> members.</p>
            <a href="<?php echo get_site_url();?>/products" class="block">
                <button class="header-blueButton border-none blueButton w-[90%] block m-auto text-center sm:w-auto px-[60px] py-3 md:px-25 py-[18px] lg:px-[72px] lg:py-[18px] xl:px-[72px] xl:py-[18px] text-white font-semibold rounded-[12px] sm:flex">
                    <p class="inline-block futura-700 font-semibold  xl:text-[20px]  ">Try It Free
                        <svg _ngcontent-thieve-app-c206="" class="ml-5 inline-block" width="18"
                             height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path _ngcontent-thieve-app-c206=""
                                  d="M0.999511 9L16.0015 9M16.0015 9L8.00146 17M16.0015 9L8.00146 1" stroke="white"
                                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </p>
                </button>
            </a>

            <div class="headerContentReviews max-w-[720px] w-[100%] py-[80px] mx-auto text-white flex flex-col  sm:flex-row justify-center items-center sm:items-start">
                <div class="headerContentReview flex flex-col mb-[50px]">
                    <p class="headerContentReviewText futura-700 leading-[120%] text-center text-[18px] max-w-[300px] my-[5px] font-bold"><?php echo get_field('header_testimonials_title_1'); ?></p>
                    <p class="headerContentReviewAuthor uppercase text-center max-w-[300px] text-[12px] opacity-30"><?php echo get_field('header_testimonials_desc_1'); ?></p>
                </div>
                <div class="headerContentReview flex flex-col mb-[50px]">
                    <p class="headerContentReviewText futura-700 leading-[120%] text-center text-[18px] max-w-[300px] my-[5px] font-bold"><?php echo get_field('header_testimonials_title_2'); ?></p>
                    <p class="headerContentReviewAuthor uppercase text-center max-w-[300px] text-[12px] opacity-30"><?php echo get_field('header_testimonials_desc_2'); ?></p>
                </div>
                <div class="headerContentReview flex flex-col mb-[50px]">
                    <p class="headerContentReviewText futura-700 leading-[120%] text-center text-[18px] max-w-[300px] my-[5px] font-bold"><?php echo get_field('header_testimonials_title_3'); ?></p>
                    <p class="headerContentReviewAuthor uppercase text-center max-w-[300px] text-[12px] opacity-30"><?php echo get_field('header_testimonials_desc_3'); ?></p>
                </div>
            </div>
        </div>

        <!-- PRODUCT -->

        <div class="headerProduct   mx-auto grid gap-[30px] relative  ">
            <div class="headerProductMask relative">
                <div class="headerProductVisibleMask absolute bottom-0 w-full text-center z-5 h-[500px] absolute left-0">
                    <button
                            class="bg-black flex text-white rounded-[12px] items-center mx-auto relative z-10 text-[18px] mx-auto rounded-lg py-2.5 pr-4 pl-5 hover:bg-[#3B5998] hover:text-[#FFF5E4] hover:border hover:border-[#2a3f6c] top-[380px]">
                        See
                        More
                        Products
                        <svg class="ml-5" width="19" height="17">
                            viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg" class="ng-tns-c207-2">
                            <path
                                    d="M9.32031 0.499023V15.501M9.32031 15.501L1.32031 7.50098M9.32031 15.501L17.3203 7.50098"
                                    stroke="white" stroke-width="2" class="ng-tns-c207-2"></path>
                        </svg>
                    </button>
                </div>
                <div class="headerProductVisible xl:grid xl:grid-cols-4 xl:px-[50px] xl:pb-[120px] xl:gap-[54px] lg:grid lg:grid-cols-4 lg:px-[30px] lg:pb-[120px] lg:gap-[54px]     md:grid md:grid-cols-3 px-[30px] pb-[120px] lg:gap-[54px]    grid grid-cols-1 px-[50px] pb-[120px] gap-[54px]   overflow-y-hidden transition duration-300 px-[20px] pb-[100px] ">
                    <?php
                    foreach ($productsData   as $product){
                    $id = $product->ID;
                    $guid = $product->guid;
                    $post_content = $product->post_content;
                    $post_title = $product->post_title;
                    $reaction = get_post_meta( $id, 'engagement_likes', true );

                    $margin = $index % 2 === 0 ? '0px' : '20px';
                    $index++;

                    if ($reaction >= 1000) {
                        $suffix = 'k';
                        $reaction /= 1000;
                        $formatted = sprintf("%.1f%s", $reaction, $suffix) .'+';
                    }
                    else {
                        $formatted = '0+';
                    }
                    ?>
                    <div class="headerProductItem rounded-2xl h-[428px] text-white" style="margin-top: <?php echo $margin; ?>;">
                        <div class="headerProductItemImage w-full h-[342px]  bg-cover rounded-t-2xl" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($id), 'thumbnail' );?>');"></div>
                        <div class="text-[15px] text-center p-[10px] bg-white text-black font-semibold border-b-[1px] mbText"><?php echo $post_title ?></div>
                        <div class="rounded-b-2xl p-[7px] bg-white flex items-center">
                            <p class="text-black mx-auto flex items-center text-[14px]">
                                <img class="h-[40px] mr-2" src="https://www.productmafia.com/wp-content/themes/bb-theme-child/images/reactions.svg" alt="Reactions"><?php echo $formatted ;?>
                            </p>
                        </div>
                    </div><?php } ?>
                </div>
            </div>
        </div>
    </section>
    <section class="products py-[150px] bg-[#EFEFEF]">
        <div class="max-w-[910px] mx-auto md:px-[20px] xl:px-0 px-[20px]">
            <h1 class="product_heading  font-lato text-transparent bg-gradient-to-r from-purple-500 to-red-500 uppercase tracking-[.04em] bg-clip-text gradient  font-bold text-[44px] md:text-[72px] lg:text-7xl xl:text-[80px] leading-[100%] xl:mb-[56px] mb-[30px]"><?php echo get_field('daily_title'); ?>
            </h1>
            <p class="   text-black max-w-[750px] font-semibold leading-[100%] text-[24px] font-bold md:text-[40px] lg:text-3xl xl:text-[40px] xl:font-extrabold"><?php echo get_field('daily_description'); ?></p>
        </div>
    </section>

    <section class="metrics bg-slate-100 xl:py-[120px] lg:py-[120px] py-[120px]">
        <div class="xl:flex xl:flex-row xl:justify-around  lg:flex lg:flex-row lg:justify-between lg:items-center w-[1200px] mx-auto xl:items-center flex-col max-w-[88%]   ">
            <img class="w-[454px] md:mx-auto" src="<?php echo get_field('metrics_image'); ?>" alt="Image">
            <div class=" md:px-0 md:py-[20px] lg:p-0 xl:p-0 max-w-[540px] blockWidth md:mx-auto">
                <p class="mb-4 text-black uppercase  font-bold text-xl lg:text-[25px] xl:text-[25px] xl:font-bold xl:leading-[25px] xl:mb-[24px] "><?php echo get_field('metrics_category'); ?></p>
                <h1 class=" font-lato metrics_head text-transparent bg-gradient-to-r from-pink-500 to-pink-800 bg-clip-text gradient  font-bold text-lg md:text-[45px] lg:text-2xl xl:text-[45px] xl:leading-[95%] leading-[100%]  mb-[25px]"><?php echo get_field('metrics_title'); ?></h1>
                <p class="text-black w-full text-xl leading-[36px] md:text-[26px]" style="font-family: 'Futura PT Book';"><?php echo get_field('metrics_description'); ?></p>
            </div>
        </div>
    </section>

    <section class="premium  my-2.5 py-20 xl:py-36">
        <div class="xl:grid xl:grid-cols-2 xl:items-center xl:max-w-[85%] xl:mx-auto xl:gap-x-[55px] grid grid-cols-1 sm:grid-cols-2 items-center max-w-[85%] mx-auto gap-x-8 sm:gap-x-12 grid grid-cols-1 gap-y-[23px] sm:grid-cols-none sm:gap-y-[23px] sm:gap-x-0">
            <div class=" prim_imgs xl:grid xl:grid-cols-4 xl:gap-x-[30px] grid grid-cols-4 gap-x-[30px]">
                <?php
                // Check rows exists.
                if (have_rows('premium_images')):

                    // Loop through rows.
                    while (have_rows('premium_images')) : the_row();

                        // Load sub field value.
                        $sub_value = get_sub_field('premium_image');
                        // Do something...
                        ?>
                        <img class="xl:w-full xl:max-w-[82] xl:rounded-[30px] rounded-[30px] max-w-[90px]"
                             src="<?php echo $sub_value ?>" alt="Image">
                    <?php

                    endwhile;
                else :
                endif;
                ?>
            </div>
            </picture>
            <div class="xl:w-full xl:max-w-[540px]">
                <p class="text-black text-xl xl:text-[25px] xl:font-bold xl:leading-[25px] xl:mb-[24px] md:text-[25px] md:font-bold md:mb-[24px]"><?php echo get_field('premium_image_category'); ?></p>
                <h1 class="prime_head font-lato font-bold  text-2xl lg:text-4xl  xl:text-[45px] xl:leading-[95%] xl:pb-[10px] mb-[24px] text-transparent bg-gradient-to-r from-orange-500 to-orange-800  bg-clip-text gradient "><?php echo get_field('premium_image_title'); ?></h1>
                <p class="text-black text-xl lg:text-2xl  xl:text-[26px] xl:leading-[140%]" style="font-family: 'Futura PT Book';"><?php echo get_field('premium_image_description'); ?></p>
            </div>
        </div>
    </section>

    <section class="  mt- started bg-slate-100 py-[100px]">
        <div class="text-center">
            <h1 class="mt_heading font-lato text-transparent  tracking-[-.01em] bg-clip-text gradient font-extrabold text-[33px] leading-8 md:4xl lg:text-5xl  xl:text-[60px] xl:font-bold xl:w-[100%] xl:mx-auto xl:mb-[50px] lg:max-w-[90%] lg:mx-auto md:max-w-[90%] md:mx-auto md:font-extrabold tracking-[-0.01em] pb-[10px]" style="background-image: linear-gradient(94.83deg, #b44ae6 -2.31%, #fe5d67 95.06%);"><?php echo get_field('get_access_title'); ?></h1>
            <a href="#">
                <button style="font-family: 'Futura PT'; " class="gt-started-btn w-[80%] block text-center sm:w-auto mx-auto text-white font-semibold rounded-[12px] xl:py-[10px] xl:px-[72px]  sm:flex text-[20px] py-[10px] px-[72px]"><?php echo get_field('get_started_button'); ?></button>
            </a>
        </div>
    </section>

    <section class="tools bg-zinc-900 py-20 lg:py-40 xl:py-[110px] xl:px-[20px] lg:px-[20px] md:px-[20px]">
        <div class="mx-[20px] xl:max-w-[910px] lg:max-w-[600px] md:max-w-[95%] xl:mx-auto">
            <h1 class="text-transparent font-lato tracking-[-.01em] bg-gradient-to-r from-purple-500 to-red-500  bg-clip-text gradient  text-[54px] leading-[54px] md:text-[62px] md:leading-[95%] lg:text-8xl xl:text-[80px] xl:max-w-[600px] font-extrabold  mb-[56px]"><?php echo get_field('dropship_tools_title'); ?></h1>
            <p class="text-white text-2xl xl:max-w-[750px] lg:text-[40px] font-bold   leading-[100%] mb-[56px]"><?php echo get_field('dropship_tools_text'); ?></p>
        </div>
    </section>

    <section class="shopItem si_one bg-black  xl:py-[100px] lg:py-[100px] md:py-[100px] py-[100px]  ">
        <div class="si_parent_one w-[1100px] xl:max-w-[100%] xl:mx-auto xl:flex xl:justify-between xl:items-center lg:block lg:max-w-[70%] lg:mx-auto md:max-w-[90%]  md:mx-auto">
            <img class="xl:w-[456px] lg:w-[456px] md:mx-auto lg:ml-0 lg:mr-auto md:w-[300px]"
                 src="<?php echo get_field('supplier_image'); ?>" alt="Image">
            <div class="mt-4 ">
                <p class="mb-2 text-white xl:text-[25px] lg:text-[25px] font-bold md:text-[22px]"><?php echo get_field('supplier_category'); ?></p>
                <h1 class="  mb-2 font-lato text-[#DA9742] xl:text-[45px]  lg:text-[45px] xl:max-w-[530px] xl:leading-[95%] font-bold md:text-[40px]"><?php echo get_field('supplier_title'); ?></h1>
                <p style="font-family: 'Futura PT Book';" class="  mb-2  text-white text-lg font-light xl:text-[22px] lg:text-[22px] xl:max-w-[530px] xl:mt-[35px] md:text-[20px]"><?php echo get_field('supplier_description'); ?></p>
                <div class="mt-[25px] inline-table">
                    <?php
                    // Check rows exists.
                    if (have_rows('supplier_emoji_fields')):

                        // Loop through rows.
                        while (have_rows('supplier_emoji_fields')) : the_row();

                            // Load sub field value.
                            $sub_value = get_sub_field('supplier_emoji_field');
                            // Do something...
                            ?>
                            <div class="shopEmodji font-lato py-[10px] px-[15px] text-white text-[18px]"><?php echo $sub_value ?></div>
                        <?php

                        endwhile;
                    else :
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="shopItem si_two shopGray bg-zinc-900 xl:py-[100px] lg:py-[100px]">
        <div class="si_parent_two py-[100px] w-[1100px] xl:max-w-[100%] xl:mx-auto xl:flex xl:justify-between xl:items-center lg:block lg:max-w-[70%] lg:mx-auto md:max-w-[90%]  md:mx-auto">
            <img class="xl:w-[456px] lg:w-[456px] md:mx-auto lg:ml-0 lg:mr-auto md:w-[300px]" src="<?php echo get_field('store_image'); ?>"
                 alt="Image">
            <div class="mt-5  ">
                <p class="text-xl lg:text-[25px] xl:text-[25px] font-bold xl:leading-[25px] xl:leading-[25px] text-white md:text-[22px]"><?php echo get_field('store_category'); ?></p>
                <h1 class=" text-[#D74C3F] font-lato text-xl lg:text-[45px] xl:text-[45px] xl:leading-[95%] lg:leading-[100%] md:leading-[100%]   font-bold xl:max-w-[530px] md:text-[40px] mt-[12px]"><?php echo get_field('store_title'); ?></h1>
                <p style="font-family: 'Futura PT Book';" class=" mt-[40px] text-white font-light text-lg lg:text-[22px] xl:text-[22px] xl:max-w-[530px] xl:leading-[140%]"><?php echo get_field('store_description'); ?></p>
                <div class="mt-[25px] inline-table">
                    <?php

                    // Check rows exists.
                    if (have_rows('store_emodji_fields')):

                        // Loop through rows.
                        while (have_rows('store_emodji_fields')) : the_row();

                            // Load sub field value.
                            $sub_value = get_sub_field('store_emodji_field');
                            // Do something...
                            ?>
                            <div class="shopEmodji py-[10px] px-[15px] text-white text-[18px]"><?php echo $sub_value ?></div>
                        <?php

                        endwhile;
                    else :
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="shopItem si_three bg-black xl:py-[100px] lg:py-[100px]  ">
        <div class="si_parent_two py-[100px] w-[1100px] xl:max-w-[100%] xl:mx-auto xl:flex xl:justify-between xl:items-center lg:block lg:max-w-[70%] lg:mx-auto md:max-w-[90%]  md:mx-auto">
            <img class="xl:w-[456px] lg:w-[456px] md:mx-auto lg:ml-0 lg:mr-auto md:w-[300px]"
                 src="<?php echo get_field('keywords_image'); ?>" alt="Image">
            <div class=" mt-14 lg:mt-0 xl:mt-0 px-[20px] lg:pl-[80px] xl:pl-[80px] ">
                <p class="text-white text-xl font-bold xl:text-[25px] xl:leading-[25px] xl:mb-[25px] lg:text-[25px] lg:leading-[25px] md:text-[22px]"><?php echo get_field('keywords_category'); ?></p>
                <h1 class="text-[#DA2A66] font-lato text-xl font-bold xl:text-[45px] lg:text-[45px] xl:leading-[95%] lg:leading-[95%] xl:max-w-[530px] xl:mb-[12px]  md:text-[40px] md:leading-[100%]  md:pb-[30px]"><?php echo get_field('keywords_title'); ?></h1>
                <p style="font-family: 'Futura PT Book';" class="text-white font-light text-xl lg:text-[22px] xl:text-[22px] xl:max-w-[530px] xl:leading-[140%]"><?php echo get_field('keywords_description'); ?></p>
                <div class="mt-[25px] inline-table">
                    <?php
                    // Check rows exists.
                    if (have_rows('keywords_emodji_fileds')):

                        // Loop through rows.
                        while (have_rows('keywords_emodji_fileds')) : the_row();

                            // Load sub field value.
                            $sub_value = get_sub_field('keywords_emodji_filed');
                            // Do something...
                            ?>
                            <div class="shopEmodji font-lato py-[10px] px-[15px] text-white text-[18px]"><?php echo $sub_value ?></div>
                        <?php
                        endwhile;
                    else :
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="shopItem si_four shopGray bg-zinc-900 xl:py-[100px] ">
        <div class="si_parent_two py-[100px] w-[1100px] xl:max-w-[100%] xl:mx-auto xl:flex xl:justify-between xl:items-center lg:block lg:max-w-[70%] lg:mx-auto md:max-w-[90%]  md:mx-auto">
            <img class=" xl:w-[456px] lg:w-[456px] md:mx-auto lg:ml-0 lg:mr-auto md:w-[300px] nishesImage"
                 src="<?php echo get_field('niches_image'); ?>" alt="Image">
            <div class="mt-[40px]">
                <p class="text-white text-xl md:text-[22px] font-bold xl:text-[25px] xl:leading-[25px]"><?php echo get_field('niches_category'); ?></p>
                <h1 class="mt-[12px] text-[#b53480] font-lato text-xl md:text-[40px] md:leading-[100%] md:pb-[30px] font-bold xl:text-[45px] xl:max-w-[530px] xl:leading-[95%]"><?php echo get_field('niches_title'); ?></h1>
                <p style="font-family: 'Futura PT Book';" class="text-white font-light text-xl font-bold xl:text-[22px] xl:max-w-[530px] xl:mb-[38px]"><?php echo get_field('niches_description'); ?></p>
                <div class="mt-[25px] inline-table">
                    <?php
                    // Check rows exists.
                    if (have_rows('niches_emodji_fields')): //назва групи поля

                        // Loop through rows.
                        while (have_rows('niches_emodji_fields')) : the_row(); //ще раз назва

                            // Load sub field value.
                            $sub_value = get_sub_field('niches_emodji_field'); //загяняємо в змінну опридільонне поле
                            // Do something...
                            ?>
                            <div class="shopEmodji font-lato py-[10px] px-[15px] text-white text-[18px]"><?php echo $sub_value ?></div> <!-- Виводимо його тут -->
                        <?php

                        endwhile;
                    else :
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="shopMore bg-black   ">
        <div class="text-center text-white">
            <h1 class="font-lato text-[25px] pt-[100px] font-bold opacity-[0.05] mb-[20px]">More to come...</h1>
            <p class="text-[18px] leading-[23px] md:text-[14px] pb-[100px] w-[90%] sm:w-auto mx-auto">We’re constantly expanding our product offering adding value to your subscription
                with new tools!</p>
        </div>
    </section>

    <!-- <section class="drop xl:py-[150px]  ">
        <h1 class="bg-black font-lato text-center py-[50px] text-transparent bg-gradient-to-r from-purple-500 to-red-500 uppercase tracking-widest bg-clip-text gradient font-bold text-xl lg:text-[55px]:text-[60px] leading-[100%] mb-[80px] lg:pt-[50px] md:text-[40px] md:pt-[50px] xl:text-[60px] xl:leading-[60x]"><?php echo get_field('dropshippers_title'); ?></h1>
        <div class="swiper mySwiper_home_slider">
            <div class="swiper-wrapper lg:pb-[50px] sm:mb-[40px]">
                <?php
                    if (have_rows('dropshippers_slider')):

                    while (have_rows('dropshippers_slider')) : the_row();

                        $image = get_sub_field('dropshippers_slider_avatar');
                        $text = get_sub_field('dropshippers_slider_text');
                        $author = get_sub_field('dropshippers_slider_author');
                        $role = get_sub_field('dropshippers_slider_role');
                ?>
                    <div class="swiper-slide px-[2%]">
                        <img class="rounded-[100%] sm:mb-[20px] xl:w-[75px] xl:mb-[30px] lg:w-[75px] md:w-[70px]  md:mb-[30px] sm:w-[70px] sm:mx-auto"
                                src="<?php echo $image ?>" alt="Avatar">
                        <p class="swiperDesc xl:text-[26px] xl:max-w-[100%] lg:max-w-[100%] sm:font-bold sm:text-[16px] xl:leading-[120%] xl:font-bold lg:font-bold md:font-bold  text-black xl:mb-[30px] lg:mb-[30px] md:text-[18px] md:mb-[30px] sm:text-center md:max-w-[100%] sm:max-w-[80%] sm:mx-auto"><?php echo $text ?></p>
                        <p class="swiperAuthorName xl:text-[22px] sm:font-bold sm:text-[16px]  lg:text-[22px] xl:font-bold lg:font-bold text-black md:font-bold sm:text-center"><?php echo $author ?></p>
                        <p class="swiperAuthorRole xl:text-[22px]  sm:text-[16px] lg:text-[18px] sm:text-center"><?php echo $role ?> </p>
                    </div>
                <?php
                    endwhile;
                    else :
                    endif;
                ?>
            </div>
            <div class="swiperButtons flex justify-between w-full">
                <div class="custom_prev_btn">
                    <div class="swiperButton swiperPrev swiper-button-prev">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"
                             class="ng-tns-c207-2">
                            <path d="M18 9L1.99805 9M1.99805 9L10.5313 17M1.99805 9L10.5313 1" stroke="white"
                                  stroke-width="2" class="ng-tns-c207-2"></path>
                        </svg>
                    </div>
                </div>
                <div class="swiperButtonsRight">
                    <div class="swiperButton swiperNext swiper-button-next">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"
                             class="ng-tns-c207-2">
                            <path d="M18 9L1.99805 9M1.99805 9L10.5313 17M1.99805 9L10.5313 1" stroke="white"
                                  stroke-width="2" class="ng-tns-c207-2"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section> -->




<section class="bg-[#efefef]">
    <h1 class="bg-black font-lato text-center py-[50px] text-transparent bg-gradient-to-r from-purple-500 to-red-500 tracking-[-.01em] bg-clip-text gradient font-semibold text-[55px] leading-[55px] md:text-[60px] md:leading-[60px] leading-[100%] lg:pt-[150px] md:pt-[50px]"><?php echo get_field('dropshippers_title'); ?></h1>
    <div class="my-new-swiper-slider h-[270px] md:h-[330px] lg:h-[400px] xl:h-[460px]">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
            <?php
                        if (have_rows('dropshippers_slider')):

                        while (have_rows('dropshippers_slider')) : the_row();

                            $image = get_sub_field('dropshippers_slider_avatar');
                            $text = get_sub_field('dropshippers_slider_text');
                            $author = get_sub_field('dropshippers_slider_author');
                            $role = get_sub_field('dropshippers_slider_role');
                    ?>
                        <div class="swiper-slide px-[2%]">
                            <img class="rounded-[100%] sm:mb-[20px] xl:w-[75px] xl:mb-[30px] lg:w-[75px] md:w-[70px]  md:mb-[30px] sm:w-[70px] sm:mx-auto lg:ml-0"
                                    src="<?php echo $image ?>" alt="Avatar">
                            <p class="swiperDesc xl:text-[26px] xl:max-w-[100%] lg:max-w-[100%] sm:font-bold sm:text-[16px] xl:leading-[120%] xl:font-bold lg:font-bold md:font-bold  text-black xl:mb-[30px] lg:mb-[30px] md:text-[18px] md:mb-[30px] sm:text-center lg:text-left md:max-w-[100%] sm:max-w-[80%] sm:mx-auto"><?php echo $text ?></p>
                            <p class="swiperAuthorName xl:text-[22px] sm:font-bold sm:text-[16px]  lg:text-[22px] xl:font-bold lg:font-bold text-black md:font-bold sm:text-center lg:text-left"><?php echo $author ?></p>
                            <p class="swiperAuthorRole xl:text-[22px]  sm:text-[16px] lg:text-[18px] sm:text-center lg:text-left"><?php echo $role ?> </p>
                        </div>
                    <?php
                        endwhile;
                        else :
                        endif;
                    ?>
                    <?php
                        if (have_rows('dropshippers_slider')):

                        while (have_rows('dropshippers_slider')) : the_row();

                            $image = get_sub_field('dropshippers_slider_avatar');
                            $text = get_sub_field('dropshippers_slider_text');
                            $author = get_sub_field('dropshippers_slider_author');
                            $role = get_sub_field('dropshippers_slider_role');
                    ?>
                        <div class="swiper-slide px-[2%]">
                            <img class="rounded-[100%] sm:mb-[20px] xl:w-[75px] xl:mb-[30px] lg:w-[75px] md:w-[70px]  md:mb-[30px] sm:w-[70px] sm:mx-auto lg:ml-0"
                                    src="<?php echo $image ?>" alt="Avatar">
                            <p class="swiperDesc xl:text-[26px] xl:max-w-[100%] lg:max-w-[100%] sm:font-bold sm:text-[16px] xl:leading-[120%] xl:font-bold lg:font-bold md:font-bold  text-black xl:mb-[30px] lg:mb-[30px] md:text-[18px] md:mb-[30px] sm:text-center lg:text-left md:max-w-[100%] sm:max-w-[80%] sm:mx-auto"><?php echo $text ?></p>
                            <p class="swiperAuthorName xl:text-[22px] sm:font-bold sm:text-[16px]  lg:text-[22px] xl:font-bold lg:font-bold text-black md:font-bold sm:text-center lg:text-left"><?php echo $author ?></p>
                            <p class="swiperAuthorRole xl:text-[22px]  sm:text-[16px] lg:text-[18px] sm:text-center lg:text-left"><?php echo $role ?> </p>
                        </div>
                    <?php
                        endwhile;
                        else :
                        endif;
                    ?>
            </div>
            <div class="swiper-button-prev"><i class="fa-solid fa-arrow-left"></i></div>
            <div class="swiper-button-next"><i class="fa-solid fa-arrow-right"></i></div>
        </div>
    </div>

</section>

<!-- 
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide">Slide 1</div>
        <div class="swiper-slide">Slide 2</div>
        <div class="swiper-slide">Slide 3</div>
        <div class="swiper-slide">Slide 4</div>
        <div class="swiper-slide">Slide 5</div>
        <div class="swiper-slide">Slide 6</div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div> -->

  
    <section class="join font-lato bg-gradient-to-br from-blue-100 to-blue-200  xl:py-[110px] py-[60px]">
        <h1 class="  leading-relaxed tracking-[-.01em] text-center xl:pb-[40px] text-transparent bg-gradient-to-r from-purple-500 to-red-500 uppercase tracking-[-.01em] bg-clip-text gradient font-semibold text-xl lg:text-6xl  mb-[50px] normal-case xl:text-[60px] xl:max-w-[980px] xl:mx-auto md:text-[40px] md:max-w-[90%] md:mx-auto"><?php echo get_field('join_title'); ?></h1>
        <a href="<?php echo get_site_url();?>/products" class="block">
            <button style="box-shadow: none;" class="gt-started-btn w-[80%] block sm:w-auto text-center mx-auto text-white font-semibold rounded-[12px] xl:py-[18px] xl:px-[72px] px-28  sm:flex lg:py-[18px] lg:px-[72px] md:py-[18px] md:px-[72px]">
                <p class="inline-block xl:text-[20px] font-semibold">Try It Free
                    <svg _ngcontent-thieve-app-c206="" class="ml-5 inline-block" width="18"
                         height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path _ngcontent-thieve-app-c206=""
                              d="M0.999511 9L16.0015 9M16.0015 9L8.00146 17M16.0015 9L8.00146 1" stroke="white"
                              stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </p>
            </button>
        </a>
    </section>
    <script src="<?php bloginfo('template_directory'); ?>/js/main.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"> -->
    // <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 3,
      spaceBetween: 30,
      loop: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
            320: {
            slidesPerView: 1,
            },
            492: {
            slidesPerView: 2,
            },
            990: {
            slidesPerView: 3,
            }
        },
    });
</script>


<!-- </script>
  <script>
    let swiperTouchStartX;

    new Swiper('.mySwiper', {
        slidesPerView: 3,
        breakpoints: {
            320: {
            slidesPerView: 1,
            },
            492: {
            slidesPerView: 2,
            },
            990: {
            slidesPerView: 3,
            }
        },
        on: {
            init(swiper) {
                const totalSlidesLen = swiper.slides.length;

                swiper.el.querySelector('.swiper-button-prev').addEventListener('click', () => {
                    if (swiper.isBeginning) {
                    swiper.slideTo(totalSlidesLen - 1);
                    } else {
                    swiper.slideTo(swiper.realIndex - 1);
                    }
                });
                swiper.el.querySelector('.swiper-button-next').addEventListener('click', () => {
                    if (swiper.isEnd) {
                    swiper.slideTo(0);
                    } else {
                    swiper.slideTo(swiper.realIndex + 1);
                    }
                });
            },

            touchStart(swiper, e) {
                if (e.type === 'touchstart') {
                    swiperTouchStartX = e.touches[0].clientX;
                } else {
                    swiperTouchStartX = e.clientX;
                }
            },

            touchEnd(swiper, e) {
                
            const tolerance = 150;

            const totalSlidesLen = swiper.slides.length;

                const diff = (() => {
                    if (e.type === 'touchend') {
                    return e.changedTouches[0].clientX - swiperTouchStartX;
                    } else {
                    return e.clientX - swiperTouchStartX;
                    }
                })();

                if (swiper.isBeginning && diff >= tolerance) {
                    swiper.slideTo(totalSlidesLen - 1);
                } else if (swiper.isEnd && diff <= -tolerance) {
                    setTimeout(() => {
                    swiper.slideTo(0);
                    }, 1);
                }
            },
        },
    });
</script> -->

<?php

get_footer();

?>