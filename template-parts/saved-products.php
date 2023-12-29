<?php
/*
Template Name: saved products
*/

get_header();
?>
<style>
   #pimg img{
    
    height: 230px;
    object-fit: cover;
    width: calc(100% - 0px) !important;

   }
   </style>
   <div class="bg-gray-100">
<section class="container sm:max-w-full max-w-full mx-auto px-4 my-6 md:w-3/4 py-9">
<div class="product-row grid md:grid-cols-2 lg:grid-cols-3 sm :grid-cols-1 gap-4 ">
        <?php
        $current_user = wp_get_current_user();
        $userlevel = $current_user->membership_level->name;
        $savedProducts = getMySavedProducts();

        if (count($savedProducts) < 1) {
            $savedProducts = [0];
        }
    
        $args_save = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
            'post__in' => $savedProducts,
        );
                  
                    
                    $query = new WP_Query( $args_save );
                    $count = $query->found_posts; 
                            
        if ($query->have_posts()) {
            
            foreach ($query->posts as $post) {
                $ID = $post->ID;
                $title = $post->post_title;
                $post_date = $post->post_date;
                $date = human_time_diff(get_post_time('U', true, $ID), current_time('timestamp')) . ' ago';
                $top_countries = get_field('top_countries', $ID);
                $thumbnail = get_the_post_thumbnail();
                $highestPercentage = 0;
               
       
                $countryName = '';
                if (is_array($top_countries) || is_object($top_countries)) {
                    foreach ($top_countries as $top_country) {
                        if ($top_country['percentage'] > $highestPercentage) {
                            $highestPercentage = $top_country['percentage'];
                            $countryName = $top_country['country'];
                        }
                    }
                }
                
                
                
    
                $product_categories = get_the_terms( get_the_ID(), 'category' );
                $product_types = get_the_terms( get_the_ID(), 'product_type' );
                $product_as_seen_on = get_the_terms( get_the_ID(), 'as-seen-on' );
    
                $specProd = '';
                $untapProd = '';
                $hiddenProd = '';
    
                if( $userlevel == 'Free' && $show_avail == true ) {
                    $hiddenProd = 'hidden-product';
                }
                if( get_field('special_product') ) {
                    $specProd = 'spcl-prod-inline';
                }
                if( get_field('untapped_product') ) {
                    $untapProd = 'untpd-prod-inline';
                    if( $userlevel == 'Free' ) {
                        $hiddenProd = 'hidden-product';
                    }
                }

                $show_avail='';
                if( $userlevel == 'Free' && $show_avail == true ) {
                    $hiddenProd = 'hidden-product';
                }
                if( get_field('special_product') ) {
                    $specProd = 'spcl-prod-inline';
                }
                if( get_field('untapped_product') ) {
                    $untapProd = 'untpd-prod-inline';
                    if( $userlevel == 'Free' ) {
                        $hiddenProd = 'hidden-product';
                    }
                }


                $engagement_likes = get_field('engagement_likes');
                $engagement_comments = get_field('engagement_comments');
                $engagement_shares = get_field('engagement_shares');
                $engagement_reactions = get_field('engagement_reactions');
                $orders = get_field('orders');
                $selling_price = get_field('selling_price');
                $aliexpress_china_cost = get_field('product_cost');
                $aliexpress_us_cost = get_field('product_cost_aliexpress_us');
                $amazon_cost = get_field('product_cost_amazon');
                $ebay_cost = get_field('product_cost_ebay');
                $product_cost_us = get_minimum_cost([$aliexpress_us_cost, $amazon_cost, $ebay_cost]);
                $product_cost_china = get_minimum_cost([$aliexpress_china_cost]);
                $profit_margin = get_field('profit_margin');
                $profit_margin_us = get_field('profit_margin_us');
                $selling = get_field('selling_price');

                ?>
                <div class="prodcuts-card bg-white rounded-lg p-4 relative">
                    <div class="price absolute right-4">
                    <div
                            class="bg-black font-lato text-gray-300 rounded-lg px-2 py-1 text-sm max-w-fit ml-auto">
                            <span 
                    data-other-option-usd-base="<?php echo $shipping_from == "China" ? $product_cost_us : $product_cost_china ?>"
                    data-usd-base="<?php echo $shipping_from == "China" ? $product_cost_china : $product_cost_us?>"
                    data-other-option="<?php echo mafia_format_acf_price($shipping_from == "China" ? $product_cost_us : $product_cost_china)?>">
                    <?php echo  mafia_format_acf_price($shipping_from == "China" ? $profit_margin_us : $profit_margin) ?></span>Profit                   
            </div>
                </div>
                <!-- added -->
                     <div id="pimg" class="product_img  m-auto">
                        <?php
                        // echo $thumbnail; 
                        $html='';                            
                                 echo $thumbnail;                                                                                                  
                         ?>
                    </div>  
                    <?php
                    $heart = '<div style="float: right;" data-product-id="'.get_the_ID().'" class="saveProduct product-save-heart"><i class="fa fa-heart"></i></div>';
$nonce = wp_create_nonce("save_a_product");
$ajaxLink = admin_url('admin-ajax.php?action=save_user_product&nonce='.$nonce);
$html = "<script type='text/javascript'>
            jQuery(document).ready(function($){
              $(document).on('click', '.saveProduct', function(e){
                let el = $(this);
                let trigger = 'save';
                if (el.hasClass('product-save-heart')) {
                  if (el.find('i.fa.fa-heart').length) {
                    trigger = 'remove';
                    el.html('<i class=\"fa fa-heart-o\"></i>');
                  } else {
                    el.html('<i class=\"fa fa-heart\"></i>');
                  }
                }
                el.attr('disabled', 'disabled');
                let productId = el.attr('data-product-id');
                e.preventDefault();
                $.post('{$ajaxLink}', {
                  product_id: productId,
                  nonce: '{$nonce}',
                  trigger: trigger
                }, function(rawResponse){
                  let response = JSON.parse(rawResponse);
                  if (response.success) {
                    el.removeAttr('disabled');
                    if (response.status == 'removed') {
                      let html = '<i class=\"fa fa-heart-o\" style=\"position: absolute;left: 11px;font-size: 50px;top: 10px;\"></i>Save Product';
                      if (el.hasClass('product-save-heart')) {
                        html = '<i class=\"fa fa-heart-o\"></i>';
                      }
                      el.html(html);
                    } else {
                      let html = '<i class=\"fa fa-heart\" style=\"position: absolute;left: 11px;font-size: 50px;top: 10px;\"></i>Unsave Product';
                      if (el.hasClass('product-save-heart')) {
                        html = '<i class=\"fa fa-heart\"></i>';
                      }
                      el.html(html);
                    }
                  }
                });
              });
            });
          </script>";

echo $heart . $html;
                 ?>
                 <div class=" ">
                        <h2 class="text-black text-center text-base	">
                       <?php
                $post_date = get_the_date('Y-m-d', get_the_ID());
                            $post_date_timestamp = strtotime($post_date);
                            $gmt_timestamp = get_post_time('U', true, $post_id);
                            // Calculate the timestamp for 3 days ago
                            $three_days_ago_timestamp = strtotime('-3 days');
                            
                            // Check if the post was published less than 3 days ago  
                       ?>
                        </h2>
                        <div class="">
                        <?php
                            $post_date = get_the_date('Y-m-d', get_the_ID());
                            $post_date_timestamp = strtotime($post_date);
                            $gmt_timestamp = get_post_time('U', true, $post_id);
                            // Calculate the timestamp for 3 days ago
                            $three_days_ago_timestamp = strtotime('-3 days');                                    
                            // Check if the post was published less than 3 days ago
                            
                            ?>
                             <h2 class="text-black text-center text-base	"><?php
                                    echo $html= '<a class="text-blue-600 " href="'.get_permalink().'" title="See full product details for '.get_the_title().'">'.get_the_title().'</a>';
                                    ?>
                                    </h2>
                        <div class=" pt-2 pb-4 text-center"><?php echo 'Posted' . ' ' . $date ?></div>
                        <?php
                        
                    
                    ?>
                    
                                   </div>
                        <div class=" ">
                            <ul class="flex gap-5 border-y pt-1 pb-2 mb-2 justify-center">
                                <li><strong><i class="fa fa-thumbs-up"></i><span class="textcount">
                                            <?php
                                            if ($engagement_likes >= 1000) {
                                                $suffix = 'k';
                                                $engagement_likes /= 1000;
                                                echo $formatted = sprintf("%.1f%s", $engagement_likes, $suffix);
                                            } else {
                                                echo $formatted = '0+';
                                            }

                                            ?></span></strong>
                                </li>
                                <li><strong>
                                        <i class="fa fa-comment"></i><span class="textcount">
                                            <?php
                                            if ($engagement_comments >= 1000) {
                                                $suffix = 'k';
                                                $engagement_comments /= 1000;
                                                echo $formatted = sprintf("%.1f%s", $engagement_comments, $suffix);
                                            } else {
                                                echo $formatted = '0+';
                                            }

                                            ?>
                                        </span></strong>
                                </li>
                                <li><strong><i class="fa fa-share-square"></i><span
                                            class="textcount"><?php
                                            if ($engagement_shares >= 1000) {
                                                $suffix = 'k';
                                                $engagement_shares /= 1000;
                                                echo $formatted = sprintf("%.1f%s", $engagement_shares, $suffix);
                                            } else {
                                                echo $formatted = '0+';
                                            }

                                            ?></span></strong></li>
                                <li><strong><i class="fa fa-eye"></i>
                                        <span class="textcount"><?php
                                            if ($engagement_reactions >= 1000) {
                                                $suffix = 'k';
                                                $engagement_reactions /= 1000;
                                                echo $formatted = sprintf("%.1f%s", $engagement_reactions, $suffix);
                                            } else {
                                                echo $formatted = '0+';
                                            }
                                            ?></span></strong></li>

                            </ul>
                        </div>
                        <div class="">
                            <hr>
                            <div class="text-center">Top Country:
                                <img draggable="false" role="img" class="emoji" alt="🇺🇸"
                                     src="https://s.w.org/images/core/emoji/14.0.0/svg/1f1fa-1f1f8.svg">
                                <?php
                                if (empty($countryName)) {
                                    echo 'Us';
                                } else {
                                    echo $countryName;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }          
        }
        wp_reset_postdata();
    
        ?>

        </section>
</div>

<?php



get_footer();