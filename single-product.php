<?php
// Template Name : single_product 

get_header();
?>

<section class="top-title bg-white p-5 lg:p-6 lg:py-5 lg:px-10">
    <div class="section-inner lg:flex lg:justify-between lg:items-center">
        <div class="heading">
            <h2 class="font-lato font-bold text-4xl text-black"><?php echo  get_the_title() ?></h2>
        </div>
        <div class="date-added pt-4 lg:p-0">
            
            <p class="font-lato font-normal text-sm text-black"><b>Date Added:</b> <span class="bg-gray-100 py-1 px-2"><?php 
            
            echo $date_str = mafia_time_elapsed_string(get_the_date());
              ?><i class="fa fa-calendar pl-2"></i></span></p>
        </div>
    </div>
</section>
<section class="hero [background-color:#EFEFEF;] ">
    <div class="section-inner mx-5 pt-5 pb-8 xl:max-w-5xl xl:mx-auto lg:px-11 xl:px-10">
        <div class="hero-content lg:flex gap-6">
            <div class="gallery-box lg:w-1/3">
                <div class="hero-gallery sm:w-7/12 m-auto lg:w-full">
                    <div class="content relative block w-full ">
                        <div class="gallery relative block overflow-hidden js-gallery">
                        <?php
                                    global $post;
                                    $mafia_product_id = $post->ID;
                                    $images = get_field('gallery_ids', $mafia_product_id);
                                    if ($images) {
                                        foreach ($images as $image) { ?>
                            <div class="gallery-item relative float-left align-middle text-center">
                                <div class="gallery-img-holder inline-block w-auto h-auto js-gallery-popup">
                                <a  href="<?php echo esc_url($image['url']); ?>">
                                    <img src="<?php echo esc_url($image['url']); ?>">
                                </div>
                            </div>
                            <?php
                                 }
                                    } else {
                                        global $post;
                                        $mafia_product_id = $post->ID;
                                        $size = 'full';
                                        $attachments = get_children(array('post_parent' => $mafia_product_id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order'));
                                        foreach ($attachments as $id => $attachment) {
                                            $img = wp_get_attachment_image_src($id, $size) ?>
                            <div class="gallery-item relative float-left align-middle text-center">
                                <div class="gallery-img-holder inline-block w-auto h-auto js-gallery-popup">
                                <a  href="<?php echo esc_url(wp_get_attachment_url($id)); ?>">
                                    <img src="<?php echo esc_url($img[0]); ?>">
                                    </a>
                            </div>
                                </div>
                                <?php
            }
        }
        ?>
                            
                        </div>
                    </div>
                    <div id="shopifyconbtn" class=" hero-buttons mt-10 mx-5 lg:mx-0 lg:mt-8">
                        <?php echo do_shortcode('[shopify_connect]'); ?>
                        <?php //echo do_shortcode('[product_push]'); 
                        
                     
                        
                        ?>
                        
                        <!-- <button class="btn btn-success btn-lg [background-color:#95BE46;] w-full py-5 pr-5 pl-16 mt-3 rounded-lg border-spacing-1 text-white [font-size:22px;] font-bold bg-no-repeat bg-contain [background-size:55px;] [background-position-x:5%;] [background-position-y:10px;]" style="background-image: url(http://productmafia.staging.wpmudev.host/wp-content/uploads/2023/05/shopify.png)" data-toggle="modal" data-target="#myModal">PUSH TO STORE</button>
                        <button class="btn btn-success btn-lg [background-color:#9C5A90;] w-full py-5 pr-5 pl-16 mt-3 rounded-lg border-spacing-1 text-white [font-size:22px;] font-bold bg-no-repeat bg-contain [background-size:55px;] [background-position-x:5%;] [background-position-y:10px;]" style="background-image: url(http://productmafia.staging.wpmudev.host/wp-content/uploads/2023/05/woo-logo.png)" data-toggle="modal" data-target="#myModal">PUSH TO STORE</button>
                        <div class="relative">
                                   
                     <button class="saveProduct btn btn-success btn-lg [background-color:#FFFFFF;] w-full py-5 pr-5 pl-16 mt-3 rounded-lg border-spacing-1 text-gray-800 [font-size:22px;] font-bold" data-toggle="modal" data-target="#myModal">Unsave Product</button>
                            <i class="fa fa-heart absolute left-5 top-6 [color: #212529;] text-5xl "></i>
                        </div> -->
                    </div>
                </div>
            </div>
            <?php

                
                    
                        global $shipping_from;
                        global $currency;
                    
                        $selling_price = get_field('selling_price');
                    
                        $profit_margin = get_field('profit_margin');
                        $profit_margin_us = get_field('profit_margin_us');
                    
                        // China costs
                        $aliexpress_china_cost = get_field('product_cost');
                        $product_cost_china = get_minimum_cost([$aliexpress_china_cost]);
                    
                        // US costs
                        $aliexpress_us_cost = get_field('product_cost_aliexpress_us');
                        $amazon_cost = get_field('product_cost_amazon');
                        $ebay_cost = get_field('product_cost_ebay');
                        $product_cost_us = get_minimum_cost([$aliexpress_us_cost, $amazon_cost, $ebay_cost]);
                    
                     
                         
                    
                ?>
   
            <div class="hero-right lg:w-2/3">
                <div class="resell-profits px-5 my-5 bg-white rounded-md">
                    <div class="heading">
                        <h3 class="font-lato font-bold text-base text-black py-5">Resell Profits (USD)</h3>
                    </div>
                    <div class="prices flex justify-around">
                        <div class="price text-center mb-4" id="selling-price">
                            <h4 class="font-lato font-bold [font-size:22px;] md:text-3xl "  data-usd-base="<?php echo $selling_price; ?>"><?php echo mafia_format_acf_price($selling_price, false); ?></h4>
                            <p class="font-lato font-normal text-xs text-gray-500">Selling Price </p>
                        </div>
                        <div class="price text-center mb-4" id="product-cost">
                        <h4 class="font-lato font-bold [font-size:22px;] md:text-3xl js-shipping-from-switchable js-currency-convertible js-no-currency-code" 
                data-other-option-usd-base="<?php echo $shipping_from == "China" ? $product_cost_us : $product_cost_china; ?>"
                data-usd-base="<?php echo $shipping_from == "China" ? $product_cost_china : $product_cost_us; ?>"
                data-other-option="<?php echo mafia_format_acf_price($shipping_from == "China" ? $product_cost_us : $product_cost_china, false); ?>">
                <?php echo mafia_format_acf_price($shipping_from == "US" ? $product_cost_china : $product_cost_us, false); ?>
            </h4>
                            
                            <p class="font-lato font-normal text-xs text-gray-500">Product Cost</p>
                        </div>
                        <div class="price text-center mb-4" id="profit-margin">
                        <h4 class="font-lato font-bold [font-size:22px;] md:text-3xl js-shipping-from-switchable js-currency-convertible js-no-currency-code" 
                data-other-option-usd-base="<?php echo $shipping_from == "China" ? $profit_margin_us : $profit_margin; ?>"
                data-usd-base="<?php echo $shipping_from == "China" ? $profit_margin : $profit_margin_us; ?>"
                data-other-option="<?php echo mafia_format_acf_price($shipping_from == "China" ? $profit_margin_us : $profit_margin, false); ?>">
                <?php echo mafia_format_acf_price($shipping_from == "US" ? $profit_margin : $profit_margin_us, false); ?>
            </h4>
                            
                            <p class="font-lato font-normal text-xs text-gray-500">Profit Margin</p>
                        </div>
                    </div>
                </div>
               
                <div class="product-description px-5 my-5 bg-white rounded-md lg:h-96">
                    <div class="heading">
                        <h3 class="font-lato font-bold text-base text-black py-5">Product Description</h3>
                    </div>
                    <div class="discription pl-12 pb-5 lg:pl-16 overflow-y-auto h-[75%]">
                        <ul class="list-disc">
                            <?php echo get_the_content() ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="available-info my-10 bg-white px-5 rounded-md shadow-lg">
            <div class="heading">
                <h3 class="pt-5 text-sm font-bold text-black">Available Info</h3>
            </div>
            <div class="infos pt-5 pb-5 flex flex-wrap gap-5 lg:justify-between">
                <h4 class="text-sm font-bold text-black "><i class="fa fa-usd [background-color:#00bfaf;] w-8 h-8 [padding-top:9px;] text-center rounded-full text-white"></i> PROFITS</h4>
                <h4 class="text-sm font-bold text-black "><i class="fa fa-line-chart  [background-color:#e0e300;] w-8 h-8 [padding-top:9px;] text-center rounded-full text-white"></i> ANALYTICS</h4>
                <h4 class="text-sm font-bold text-black "><i class="fa fa-user [background-color:#fd8a5e;] w-8 h-8 [padding-top:9px;] text-center rounded-full text-white"></i> ENGAGEMENT</h4>
                <h4 class="text-sm font-bold text-black "><i class="fa fa-link [background-color:#01dddd;] w-8 h-8 [padding-top:9px;] text-center rounded-full text-white"></i> LINKS</h4>
                <h4 class="text-sm font-bold text-black "><i class="fa fa-bullseye [background-color:#ff598f;] w-8 h-8 [padding-top:9px;] text-center rounded-full text-white"></i> TARGETING</h4>
                <h4 class="text-sm font-bold text-black "><i class="fa-brands fa-facebook-f [background-color:#38539b;] w-8 h-8 [padding-top:9px;] text-center rounded-full text-white"></i> FB ADS</h4>
                <h4 class="text-sm font-bold text-black "><i class="fa-brands fa-instagram [background-color:#d1005a;] w-8 h-8 [padding-top:9px;] text-center rounded-full text-white"></i> INFLUENCERS</h4>
            </div>
        </div>
        <div class="lg:flex gap-6">
            <div class="profits p-5 mt-5 bg-white rounded-md border-b-4 border-teal-500 lg:w-1/4">
                <div class="heading">
                    <h4 class="text-base font-bold text-black "><i class="fa fa-usd [background-color:#00bfaf;] w-8 h-8 [padding-top:9px;] text-center rounded-full text-white"></i> Profits:</h4>
                </div>
                <div class="pt-5">
                    <?php 
                     $profit_margin = get_field('profit_margin');

                     $cpa_one = ceil( $profit_margin / 4 );
                     $cpa_two = ceil( $profit_margin / 3 );
                     $net_profit = round($profit_margin * 0.75, 2);
                    ?>
                    <p class="font-lato text-base xl:text-sm font-bold text-gray-500">Profit margin: <span class="font-normal js-currency-convertible js-no-currency-code" data-usd-base=<?php echo $profit_margin; ?>><?php echo mafia_format_acf_price($profit_margin, false); ?> </span></p>
                    <p class="font-lato text-base xl:text-sm font-bold text-gray-500">Ad cost: <span class="font-normal js-currency-convertible js-no-currency-code" data-usd-base=<?php echo $cpa_one; ?>><?php echo mafia_format_acf_price($cpa_one, false); ?></span> - <span class="js-currency-convertible js-no-currency-code" data-usd-base=<?php echo $cpa_two; ?>><?php echo mafia_format_acf_price($cpa_two, false); ?></span></p>
                    <p class="font-lato text-base xl:text-sm font-bold text-gray-500">Net profit: <span class="font-normal js-currency-convertible js-no-currency-code" data-usd-base=<?php echo $net_profit; ?>><?php echo mafia_format_acf_price($net_profit, false); ?></span> </p>
                   <?php  global $post;
                                $link = get_post_meta($post->ID, "store_selling_this_item", true);
                                ob_start();
                                if( !empty($link) ){           
                    ?>
                    <a href="<?php echo $link ?>" class="font-lato font-normal text-sm text-blue-500 underline" target="_blank">Winning Landing Page</a>
                               <?php }?>
                    </div>
            </div>
            <div class="top-buyer p-5 mt-5 bg-white rounded-md border-b-4 border-red-600 lg:w-1/4">
                <div class="heading">
                    <h4 class="text-base font-bold text-black "><i class="fa fa-line-chart bg-red-600 w-8 h-8 [padding-top:9px;] text-center rounded-full text-white"></i> Top Buyer Countries Based on Reviews:</h4>
                </div>  
                <div class="chart">
                <?php
                
                $top_countries = get_field("top_countries");
                if( !empty($top_countries ) ){
                 $chart_data = []; $chart_labels = [];
                        foreach ($top_countries as $top_country) {
                            if (empty($top_country["country"])) continue;
                            $chart_data[] = $top_country["reviews"];
                            $chart_labels[] = $top_country["country"]. " " .$top_country["percentage"]."%";
                        }
                }    
                        ?>
                    
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js" defer integrity="sha512-BqNYFBAzGfZDnIWSAEGZSD/QFKeVxms2dIBPfw11gZubWwKUjEgmFUtUls8vZ6xTRZN/jaXGHD/ZaxD9+fDo0A==" crossorigin="anonymous"></script>

                        <script>
                            var topCountriesChartData = {
                                data: <?php echo json_encode($chart_data); ?>,
                                labels: <?php echo json_encode($chart_labels); ?> 
                            };
                        </script>

                        
                            <canvas id="js-countries-chart" style="display: block; box-sizing: border-box; height: 228px; width: 190px;" width="237" height="285"></canvas>
                </div>
            </div>
            <div class="fb-engagement p-5 mt-5 bg-white rounded-md border-b-4 border-blue-600 lg:w-1/4">
                <div class="heading">
                    <h4 class="text-base font-bold text-black "><i class="fa-solid fa-thumbs-up bg-blue-500 w-8 h-8 [padding-top:7px;] text-center rounded-full text-white"></i> FB Engagement:</h4>
                </div>
                <?php
                
                $engagement_likes = get_field('engagement_likes');
                $engagement_comments = get_field('engagement_comments');
                $engagement_shares = get_field('engagement_shares');
                $engagement_reactions = get_field('engagement_reactions');
                ?>
                <div class="flex justify-around mt-5">
                    <div class="text-center">
                        <i class="fa-regular fa-thumbs-up w-5 h-5 text-gray-400" ></i>
                        <p class="text-xs font-bold text-black"><?php
                                                    if ($engagement_likes >= 1000) {
                                                        $suffix = 'k';
                                                        $engagement_likes /= 1000;
                                                        echo $formatted = sprintf("%.1f%s", $engagement_likes, $suffix);
                                                    } else {
                                                        echo $formatted = '0+';
                                                    }

                                                    ?></p>
                    </div>
                    <div class="text-center">
                        <i class="fa-regular fa-comments w-5 h-5 text-gray-400" ></i>
                        <p class="text-xs font-bold text-black"> <?php
                                                    if ($engagement_comments >= 1000) {
                                                        $suffix = 'k';
                                                        $engagement_comments /= 1000;
                                                        echo $formatted = sprintf("%.1f%s", $engagement_comments, $suffix);
                                                    } else {
                                                        echo $formatted = '0+';
                                                    }

                                                    ?></p>
                    </div>
                    <div class="text-center">
                        <i class="fa-solid fa-share w-5 h-5 text-gray-400" ></i>
                        <p class="text-xs font-bold text-black"><?php
                                                    if ($engagement_shares >= 1000) {
                                                        $suffix = 'k';
                                                        $engagement_shares /= 1000;
                                                        echo $formatted = sprintf("%.1f%s", $engagement_shares, $suffix);
                                                    } else {
                                                        echo $formatted = '0+';
                                                    }

                                                    ?></p>
                    </div>
                    <div class="text-center">
                        <i class="fa-regular fa-eye w-5 h-5 text-gray-400" ></i>
                        <p class="text-xs font-bold text-black"><?php
                                                    if ($engagement_reactions >= 1000) {
                                                        $suffix = 'k';
                                                        $engagement_reactions /= 1000;
                                                        echo $formatted = sprintf("%.1f%s", $engagement_reactions, $suffix);
                                                    } else {
                                                        echo $formatted = '0+';
                                                    }
                                                    ?></p>
                    </div>
                </div>
                <?php  global $post;
    $link = get_post_meta($post->ID, "facebook_ad", true);
	ob_start();
    if( !empty($link) ){
		?>
                <a href="<?php echo $link; ?>" class="font-lato font-normal text-sm text-blue-500 underline" target="_blank">View Facebook Ad</a>
   <?php } ?>
            </div>
            <div class="suppliers p-5 mt-5 bg-white rounded-md border-b-4 border-blue-500 lg:w-1/4">
                <div class="heading">
                    <h4 class="text-base font-bold text-black "><i class="fa fa-link [background-color:#01dddd;] w-8 h-8 [padding-top:9px;] text-center rounded-full text-white"></i> Suppliers:</h4>
                </div>
                <h5 class="font-lato font-semibold text-base text-blue-600 cursor-pointer mt-2 mb-5">(Broken Links?)</h5>
                <div class="mb-1">
              <?php 
              global $post;

              $post_id = false;
          
              if( defined('PRODUCT_ID') ){
                  $post_id = PRODUCT_ID;
              }else{
                  $post_id = $post->ID;
              }
          
              if( $post_id == false ){
                  return "Post not found.";
              }
              $metadata = get_post_meta( $post_id );
               if( !empty($metadata['aliexpress'][0]) ){ ?>
                    <a href="<?php echo $metadata['aliexpress'][0] ?>" class="font-lato font-normal text-sm text-blue-600 underline" target="_blank">Supplier: AliExpress</a>
                    <p class="font-lato font-normal text-sm text-black">Shipped From: China</p><?php } ?>
                    <?php
                    if( !empty($metadata['product_cost'][0] )){ ?>
                    <span class="font-lato font-normal text-sm text-black js-currency-convertible" data-usd-base="<?php echo $metadata['product_cost'][0] ?>" >Product Cost: <?php echo mafia_format_acf_price($metadata['product_cost'][0]) ?></span><?php } ?>
              
                </div>
                <div class="mb-1">
                    <?php
                if( !empty($metadata['amazon'][0]) ){ ?>
                    <a href="<?php echo $metadata['amazon'][0] ?>" class="font-lato font-normal text-sm text-blue-600 underline" target="_blank">Supplier: Amazone</a>
                    <p class="font-lato font-normal text-sm text-black">Shipped From: US</p><?php } ?>
                    <?php
                    if( !empty($metadata['product_cost_amazon'][0] )){ ?>
                    <span class="font-lato font-normal text-sm text-black js-currency-convertible" data-usd-base="<?php echo $metadata['product_cost_amazon'][0] ?>" >Product Cost: <?php echo mafia_format_acf_price($metadata['product_cost_amazon'][0]) ?></span><?php } ?>
                </div>
                <div class="mb-1">
                <?php
                if( !empty($metadata['ebay'][0]) ){ ?>
                    <a href="<?php echo $metadata['ebay'][0] ?>" class="font-lato font-normal text-sm text-blue-600 underline" target="_blank">Supplier: Ebay</a>
                    <p class="font-lato font-normal text-sm text-black">Shipped From: US</p><?php } ?>
                    <?php
                    if( !empty($metadata['product_cost_ebay'][0] )){ ?>
                    <span class="font-lato font-normal text-sm text-black js-currency-convertible" data-usd-base="<?php echo $metadata['product_cost_ebay'][0] ?>" >Product Cost: <?php echo mafia_format_acf_price($metadata['product_cost_ebay'][0]) ?></span><?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="aliexpress-data [background-color:#F8F6F3;]">
    <div class="section-inner mx-5 pt-5 pb-8 xl:max-w-5xl xl:mx-auto lg:px-11 xl:px-10">
        <div class="heading flex justify-between items-center">
            <h4 class="font-lato text-sm font-bold text-black "><i class="fa fa-line-chart bg-red-600 w-6 h-6 [padding-top:4px;] text-center rounded-full text-white"></i>  Aliexpress Data</h4>
            <h5 class="font-lato font-semibold text-base text-blue-600 cursor-pointer mt-2 mb-5">(Broken Links?)</h5>
        </div>
        <div class="product-list flex overflow-x-scroll lg:overflow-hidden mt-5 lg:mt-8 ">
        <?php
        $products = get_field("products");
        foreach($products as $product): 
            if(empty($product["name"])) continue;
            ?>
        <a href="<?php echo $product["link"]; ?>" >
                <div class="single-product bg-white rounded-md mr-4 w-52 xl:w-56">
                    <div class="top-image">
                        <img class="rounded-t-md" src="<?php echo $product["photo"]; ?>">
                    </div>
                    <div class="product-bottom px-3 pb-4">
                        <div class="product-discription mt-2 whitespace-nowrap overflow-hidden">
                            <p class="font-lato font-normal text-xs text-gray-800"><?php echo $product["name"]; ?></p>
                        </div>
                        <div class="price ">
                        <?php if(!empty($product["price"])): ?>
                            <h3 class="font-lato font-bold text-base text-black [margin-top:3px;]">US $<?php echo $product["price"]; ?></h3><?php endif; ?>
                        </div>
                        <div class="">
                            <p class="font-lato font-normal text-xs [color:#677;]"><?php echo (!empty($product["shipping_cost"]) ? "+ Shipping: US $".$product["shipping_cost"] : "Free Shipping"); ?></p>
                        </div>
                        <div class="rating flex justify-between items-center">
                            <p class="text-xs text-gray-500"><span class="text-base text-red-500 [margin-right:2px;]">★</span><?php echo $product["stars"]; ?></p>
                            <?php if(!empty($product["orders"])): ?>
                            <p class="text-xs text-gray-500"><?php echo $product["orders"]; ?>Sold</p><?php endif; ?>
                        </div>
                        <div class="">
                            <p class="font-lato font-normal text-xs text-gray-400 underline"><?php echo $product["seller_name"]; ?></p>
                        </div>
                        <div class="seller-score">
                        <?php if(!empty($product["seller_score"])): ?>
                            <p class="font-lato font-normal text-xs text-gray-400">Seller Score: <?php echo $product["seller_score"]; ?>%</p><?php endif; ?>
                        </div>
                        <div class="shipping-time">
                        <?php if(!empty($product["shipping_time"])): ?>
                            <p class="font-lato font-normal text-xs text-gray-400">Shipping Time: <?php echo $product["shipping_time"]; ?></p><?php endif; ?>
                        </div>
                        <div class="view-product-btn mt-2">
                            <a href="<?php echo $product["link"]; ?>" class="w-3/4 m-auto block bg-red-500 text-white hover:text-white text-xs font-bold py-1 rounded-lg text-center">View Product →</a>
                        </div>
                    </div>
                   
                </div>
            </a>
            <?php endforeach; ?>
        </div> 
    </div>
</section>

<section class="bottom [background-color:#EFEFEF;]">
    <div class="section-inner mx-5 pt-5 pb-8 xl:max-w-5xl xl:mx-auto lg:px-11 xl:px-10">
        <div class="p-5 my-4 sm:p-0 bg-white rounded-md flex flex-wrap">
            <div class="product-info w-full my-5 sm:w-2/4 lg:w-1/3">
                <div class=" sm:m-5 border border-gray-200 ">
                <?php  
                 echo  $video = get_field("fb_ad_video_file_1");
   
                 // For some products acf field reference may be broken and attachment id can be returned
                 echo   $video_url = is_numeric($video) ? wp_get_attachment_url($video) : $video;
                 echo $description = get_field("fb_ad_description_1");
                                 
                                 
                $url = get_post_meta( $post->ID, 'code' )
                  
                //    echo $fb_ad_description[0];
                    
                    ?>

               <iframe src="https://www.facebook.com/plugins/post.php?href=<?php echo $url[0]; ?>&show_text=true&width=500" width="500" height="500" style="border:none;overflow:hidden;" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    <!--<video class="w-full" poster="http://productmafia.staging.wpmudev.host/wp-content/uploads/2023/05/2022-love-tassel-multi-layer-cha.png" controls>-->
                    <!--<source src="https://www.productmafia.com/wp-content/uploads/2022/06/287988462_799806651001971_8179297806117370906_n.mp4">-->
                    <!--</video>-->
                    <div class="box-bottom px-3">
                        <p class="text-sm font-normal font-lato py-3"></p>
                        <hr class="[height:.5px;] text-gray-200">
                        
                    </div>
                </div>
                <div class="copy-download px-3 sm:-mt-2 sm:px-6">
                    <div class="download">
                        <a href="<?php echo $url[0] ?>" class="font-lato font-normal text-sm hover:text-blue-600">Download Video <i class="fa-solid fa-download"></i></a>
                    </div>
                    <div class="download">
                        <a href=" <?php echo  $description = get_field("fb_ad_description" );?>" class="font-lato font-normal text-sm hover:text-blue-600">
                    Copy Description
                    <i class="fa-regular fa-clipboard"></i></a>
                    </div>
                </div>
            </div>
            <div class="product-info w-full my-5 sm:w-2/4 lg:w-1/3">
                 <div class=" sm:m-5 border border-gray-200 ">
                <?php  $url2 = get_post_meta( $post->ID, 'code_1' );
                   
                //    echo $fb_ad_description[0];
                    
                    ?>

               <iframe src="https://www.facebook.com/plugins/post.php?href=<?php echo $url2[0]; ?>&show_text=true&width=500" width="500" height="500" style="border:none;overflow:hidden;" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    <!--<video class="w-full" poster="http://productmafia.staging.wpmudev.host/wp-content/uploads/2023/05/2022-love-tassel-multi-layer-cha.png" controls>-->
                    <!--<source src="https://www.productmafia.com/wp-content/uploads/2022/06/287988462_799806651001971_8179297806117370906_n.mp4">-->
                    <!--</video>-->
                    <div class="box-bottom px-3">
                        <p class="text-sm font-normal font-lato py-3"></p>
                        
                        
                    </div>
                </div>
                <div class="copy-download px-3 sm:-mt-2 sm:px-6">
                    <div class="download">
                        <a href="<?php echo $url2[0]; ?>" class="font-lato font-normal text-sm hover:text-blue-600">Download Video <i class="fa-solid fa-download"></i></a>
                    </div>
                    <div class="download">
                        <a href=" <?php echo  $description = get_field("fb_ad_description_1" );?>" class="font-lato font-normal text-sm hover:text-blue-600">
                    Copy Description
                    <i class="fa-regular fa-clipboard"></i></a>
                    </div>
                </div>
            </div>
            <div class="product-info w-full my-5 sm:w-2/4 lg:w-1/3">
                <div class=" sm:m-5 border border-gray-200 ">
                <?php  $url3 = get_post_meta( $post->ID, 'code_2' );
                   
                //    echo $fb_ad_description[0];
                    
                    ?>

               <iframe src="https://www.facebook.com/plugins/post.php?href=<?php echo $url3[0]; ?>&show_text=true&width=500" width="500" height="500" style="border:none;overflow:hidden;" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    <!--<video class="w-full" poster="http://productmafia.staging.wpmudev.host/wp-content/uploads/2023/05/2022-love-tassel-multi-layer-cha.png" controls>-->
                    <!--<source src="https://www.productmafia.com/wp-content/uploads/2022/06/287988462_799806651001971_8179297806117370906_n.mp4">-->
                    <!--</video>-->
                    <div class="box-bottom px-3">
                        <p class="text-sm font-normal font-lato py-3"></p>
                        
                    </div>
                </div>
                <div class="copy-download px-3 sm:-mt-2 sm:px-6">
                    <div class="download">
                        <a href="<?php echo $url3[0]; ?>" class="font-lato font-normal text-sm hover:text-blue-600">Download Video <i class="fa-solid fa-download"></i></a>
                    </div>
                    <div class="download">
                        <a href=" <?php echo  $description = get_field("fb_ad_description_2" );?>" class="font-lato font-normal text-sm hover:text-blue-600">
                    Copy Description
                    <i class="fa-regular fa-clipboard"></i></a>
                    </div>
                </div>
        </div>
        </div>
        <div class="instagram-influencers my-4 bg-white rounded-md px-5 py-5">
            <div class="heading flex items-center">
                <i class="far fa-dot-circle text-2xl mr-1 "></i>

                <h3 class="font-lato font-bold text-base text-black">Instagram Influencers</h3>
            </div>
            <div class="influencers-slider relative mt-4 lg:mt-6">
                <div class="owl-carousel owl-theme block" id ="influencers-slider" >
                    <div class="item main">
                        <div class="slider-content ">
                            <div class="slider-image">
                                <img src="http://productmafia.staging.wpmudev.host/wp-content/uploads/2023/03/avatar_4-1.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="item ">
                        <div class="slider-content ">
                            <div class="slider-image">
                                <img src="http://productmafia.staging.wpmudev.host/wp-content/uploads/2023/03/avatar_3-1.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="item ">
                        <div class="slider-content ">
                            <div class="slider-image">
                                <img src="http://productmafia.staging.wpmudev.host/wp-content/uploads/2023/03/avatar_4-1.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="item ">
                        <div class="slider-content ">
                            <div class="slider-image">
                                <img src="http://productmafia.staging.wpmudev.host/wp-content/uploads/2023/03/avatar_3-1.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="item ">
                        <div class="slider-content ">
                            <div class="slider-image">
                                <img src="http://productmafia.staging.wpmudev.host/wp-content/uploads/2023/03/avatar_4-1.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="item ">
                        <div class="slider-content ">
                            <div class="slider-image">
                                <img src="http://productmafia.staging.wpmudev.host/wp-content/uploads/2023/03/avatar_3-1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-targrting my-4 bg-white rounded-md px-5 py-5">
            <div class="heading flex items-center">
                <i class="far fa-dot-circle text-2xl mr-1 "></i>
                <h3 class="font-lato font-bold text-base text-black">Suggested Targeting</h3>
            </div>
            <div class="main-targets mt-4 text-center lg:flex lg:justify-between">
                <div class="countries text-center">
                    <h3 class="font-lato my-3 lg:my-1 font-bold [font-size:25px;] text-black"><?php  $event_name = get_post_meta( $post->ID, 'target_:_customer_to_target' );
                   
                   echo $event_name[0];
                    
                    ?></h3>
                    <p class="font-lato my-3 lg:my-1 font-bold [font-size:15px;] text-gray-500">COUNTRIES</p>
                </div>
                <div class="gender text-center">
                    <h3 class="font-lato my-3 lg:my-1 font-bold [font-size:25px;] text-black"><?php  $gender = get_post_meta( $post->ID, 'gender' );
                   
                   echo $gender[0];
                    
                    ?></h3>
                    <p class="font-lato my-3 lg:my-1 font-bold [font-size:15px;] text-gray-500">GENDER</p>
                </div>
                <div class="age text-center">
                    <h3 class="font-lato my-3 lg:my-1 font-bold [font-size:25px;] text-black"><?php  $age_range = get_post_meta( $post->ID, 'age_range' );
                   
                   echo $age_range[0];
                    
                    ?></h3>
                    <p class="font-lato my-3 lg:my-1 font-bold [font-size:15px;] text-gray-500">AGE</p>
                </div>
                <div class="audience text-center">
                    <h3 class="font-lato my-3 lg:my-1 font-bold [font-size:25px;] text-black"><?php  $audience_size = get_post_meta( $post->ID, 'audience_size' );
                   
                   echo $audience_size[0];
                    
                    ?></h3>
                    <p class="font-lato my-3 lg:my-1 font-bold [font-size:15px;] text-gray-500">AUDIENCE SIZE</p>
                </div>
            </div>
            <hr class="hidden sm:block sm:w-4/5 mx-auto my-2 [height:2px;] bg-black">
            <div class="interests mt-4">
                <p class="font-lato my-3 lg:my-1 font-bold [font-size:15px;] text-gray-500">INTERESTS</p>
                <p class="font-lato font-bold [font-size:15px;] text-black"><?php  $interests = get_post_meta( $post->ID, 'interests' );
                   
                   echo $interests[0];
                    
                    ?></p>
            </div>
        </div>
    </div>
</section>




<?php 
get_footer();
?>