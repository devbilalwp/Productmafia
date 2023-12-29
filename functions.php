<?php
/**
 * productmafia functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package productmafia
 */



if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


//Globals
// $is_local_dev = $_SERVER["SERVER_NAME"] == "localhost";
// $is_stage = $_SERVER["SERVER_NAME"] == "productmafia.staging.wpmudev.host";

$shipping_from = isset($_COOKIE["shipping_from"]) ? $_COOKIE["shipping_from"] : "China";
$currency = isset($_COOKIE["currency"]) ? $_COOKIE["currency"] : "USD";
$exchange_rate = floatval(isset($_COOKIE["exchange_rate"]) ? $_COOKIE["exchange_rate"] : "1");
$currency_symbol = isset($_COOKIE["currency_symbol"]) ? $_COOKIE["currency_symbol"] : "$";

$any_filters_applied = isset($_GET["filtering"]) && $_GET["filtering"] == "on";


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function productmafia_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on productmafia, use a find and replace
		* to change 'productmafia' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'productmafia', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'productmafia' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'productmafia_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'productmafia_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function productmafia_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'productmafia_content_width', 640 );
}
add_action( 'after_setup_theme', 'productmafia_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function productmafia_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'productmafia' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'productmafia' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'productmafia_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function productmafia_scripts() {
	wp_enqueue_style( 'productmafia-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'productmafia-style', 'rtl', 'replace' );
	wp_enqueue_style( 'productmafia-tailwind-style', get_template_directory_uri().'/dist/output.css', array(), _S_VERSION );
	wp_enqueue_style( 'productmafia-fontawesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css', array(), _S_VERSION );
	wp_enqueue_script( 'productmafia-fontawesome-js','https://cdn.tailwindcss.com');
	wp_enqueue_script( 'productmafia-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	//wp_enqueue_script( 'productmafia-cookies', 'https://cdn-cookieyes.com/client_data/9551a6c0cdfb8ec8f76da328/script.js', array(), _S_VERSION, true );
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'productmafia_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
require get_template_directory() . '/inc/exchange-rates-fetch-cron.php';
add_action( 'wp_footer', 'custom_jquery' );


function custom_jquery(){
	?>
       <script>
		jQuery("page-id-94 .the_champ_login_ul li").append("<p>Login With FaceBook</p>");
	   </script>

	<?php
}


// Clickable logo text using hook

add_action('wp_footer','clicktxt');

function clicktxt(){
    ?>
        <script>
            jQuery(".page-id-2175 span#pmpro_processing_message").prepend("<p id='btn-txt'>Sign Up </p>");
            jQuery('.as_seen_on-1133.uabb-blog-posts-col-3').addClass("product-cards-layout");
            jQuery(document).ready(function(){
                jQuery(".fl-photo-caption.fl-photo-caption-below").wrap('<a href="https://www.productmafia.com/"/>');
                jQuery(".aatextdesc br").remove();
            });
        </script>

    <?php

    if(!is_user_logged_in() && is_front_page() ){
        
        ?>

        <script>
        jQuery("body.page-template-page-homepage.notloggedin .headerProductVisible").attr('id','product-section-1');
        jQuery(".headerProductItemImage").css('cursor','pointer');
        jQuery(".headerProductItemImage").click(function() {
            window.location = "https://www.productmafia.com/membership/checkout/?level=2";
        });
        
        </script> 

        <?php
    }

}

add_action( 'save_post', 'populate_top_country');
function populate_top_country($post_id) {

	$top_countries = get_field('top_countries', $post_id);
                        $highestPercentage = 0;
                        $countryName = '';
                        if (is_array($top_countries) || is_object($top_countries)) {
                            foreach ($top_countries as $top_country) {
                                if ($top_country['percentage'] > $highestPercentage) {
                                    $highestPercentage = $top_country['percentage'];
                                    $countryName = $top_country['country'];
									update_post_meta($post_id ,'custom_field_ctr', $countryName);
                                }
                            }
                        }

}


// Add custom meta box to posts
function custom_meta_box() {
    add_meta_box(
        'custom-ctr-sort', // unique ID
        'Custom ctr', // box title
        'custom_meta_box_callback', // callback function
        'product', // post type
		'normal', // position
        'high' // priority
    );
}

// Callback function to display custom meta box
function custom_meta_box_callback($post) {
    wp_nonce_field('custom_meta_box_nonce', 'meta_box_nonce');
    $value = get_post_meta($post->ID, 'custom_field_ctr', true);
     echo '<input type="hidden" id="custom_field" name="custom_field" value="' . esc_attr($value) . '" />';
}

function save_custom_meta_box_data($post_id) {
    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'custom_meta_box_nonce')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
}

add_action('add_meta_boxes', 'custom_meta_box');
add_action('save_post', 'save_custom_meta_box_data');

function mafia_format_acf_price($param, $show_currency_code = true) {
    global $currency;
    global $exchange_rate;
    global $currency_symbol;

    if (empty($param) || $param=='NA') return 'NA';

    $value = floatval($param) * $exchange_rate;
    $formatted_value = ( $value < 1000 ? number_format($value, 2, '.', ',') : number_format($value, 0, '.', ',') );

    return $currency_symbol . $formatted_value . " " . ($show_currency_code ? $currency : "");
}



add_action( 'save_post', 'populate_product_auto_fields', 200, 3 );

function populate_product_auto_fields($post_id) {

    if (wp_is_post_revision($post_id))
		return;

    if ($_REQUEST["post_type"] != "product")
        return;

    populate_profit_margins($post_id);
   
}
function populate_profit_margins($post_id) {

    $product_selling_price = get_field('selling_price', $post_id);
    if (empty($product_selling_price))
        return;

    // China costs
	$aliexpress_china_cost = get_field('product_cost', $post_id);
    $product_cost_china = get_minimum_cost([$aliexpress_china_cost]);

    // US costs
	$aliexpress_us_cost = get_field('product_cost_aliexpress_us', $post_id);
	$amazon_cost = get_field('product_cost_amazon', $post_id);
	$ebay_cost = get_field('product_cost_ebay', $post_id);
    $product_cost_us = get_minimum_cost([$aliexpress_us_cost, $amazon_cost, $ebay_cost]);

    // Profit margin for China shipping
    update_field('profit_margin', !empty($product_cost_china) ? floatval($product_selling_price) - $product_cost_china : '', $post_id);

    // Profit margin for US shipping
    update_field('profit_margin_us', !empty($product_cost_us) ? floatval($product_selling_price) - $product_cost_us : '', $post_id);
}

function get_minimum_cost($array) {
    $min_cost = null;
    foreach($array as $string_cost) {
        if (!empty($string_cost)) {
            $float_cost = floatval($string_cost);
            if (is_null($min_cost) || $float_cost < $min_cost)
                $min_cost = $float_cost;
        }
    }
    return $min_cost;
}





if(is_user_logged_in() && function_exists('pmpro_hasMembershipLevel') && pmpro_hasMembershipLevel())
{
	global $current_user;
	$current_user->membership_level = pmpro_getMembershipLevelForUser($current_user->ID);
	$current_login_pmpro_level = $current_user->membership_level->name;
    if($current_login_pmpro_level != 'Free'){ ?>
   
       
 <?php   }
}
function pmpro_after_change_membership_level_default_level( $level_id, $user_id ) {
    // if we see this global set, then another gist is planning to give the user their level back
    global $pmpro_next_payment_timestamp;
    if ( ! empty( $pmpro_next_payment_timestamp ) ) {
        return;
    }

    if ( $level_id == 0 ) {
        // cancelling, give them level 2 instead
        pmpro_changeMembershipLevel( 2, $user_id );
    }
}
add_action( 'pmpro_after_change_membership_level', 'pmpro_after_change_membership_level_default_level', 10, 2 );




add_action( ' mafia_time_elapsed_string', ' mafia_time_elapsed_string' );
function mafia_time_elapsed_string($datetime) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    if ($diff->w) {
        if ($now->format('Y') != $ago->format('Y'))
            return date_format($ago,"j M, Y");
        return date_format($ago,"j M, Y");
    }

    $string = array(
        'd' => 'd',
        'h' => 'h',
        'i' => 'm',
        's' => 's',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v;
        } else {
            unset($string[$k]);
        }
    }

    $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) : 'just now';
}





//
// $is_local_dev = $_SERVER["SERVER_NAME"] == "localhost";
//$is_stage = $_SERVER["SERVER_NAME"] == "productmafia.staging.wpmudev.host";

$shipping_from = isset($_COOKIE["shipping_from"]) ? $_COOKIE["shipping_from"] : "China";
$currency = isset($_COOKIE["currency"]) ? $_COOKIE["currency"] : "USD";
$exchange_rate = floatval(isset($_COOKIE["exchange_rate"]) ? $_COOKIE["exchange_rate"] : "1");
$currency_symbol = isset($_COOKIE["currency_symbol"]) ? $_COOKIE["currency_symbol"] : "$";




add_action("wp_ajax_save_user_product", "save_user_product");
add_action("wp_ajax_nopriv_save_user_product", "my_must_login");

function checkIfProductExists($productId) {
    $userId = get_current_user_id();
    $savedProductMetaKey = 'saved_user_products';
    $savedRawProducts = get_user_meta($userId, $savedProductMetaKey, true);
    if ($savedRawProducts) {
        $savedProducts = json_decode($savedRawProducts, true);
        if (isset($savedProducts[$productId])) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getMySavedProducts() {
    $userId = get_current_user_id();
    $savedProductMetaKey = 'saved_user_products';
    $savedRawProducts = get_user_meta($userId, $savedProductMetaKey, true);
    if ($savedRawProducts) {
        $savedProducts = json_decode($savedRawProducts, true);
        return $savedProducts;
    } else {
        return [];
    }
}

function save_user_product() {
    if (!wp_verify_nonce($_REQUEST['nonce'], "save_a_product")) {
        exit("No naughty business please");
    }

    $userId = get_current_user_id();
    $savedProductMetaKey = 'saved_user_products';

    if ($_REQUEST['product_id'] && (int) $_REQUEST['product_id'] > 0) {
        if (!$userId)
            exit('User is not logged in!');
        $productId = $_REQUEST['product_id'];
        $trigger = $_REQUEST['trigger'];
        $savedRawProducts = get_user_meta($userId, $savedProductMetaKey, true);
        $savedProducts = [];
        if ($savedRawProducts)
            $savedProducts = json_decode($savedRawProducts, true);

        // if product is already there remove it
        if ($trigger == 'remove') {
            // if (in_array($productId, $savedProducts)) {
            //     unset($savedProducts[$productId]);
            //     update_user_meta($userId, $savedProductMetaKey, json_encode($savedProducts));
            // }
            // echo json_encode([
            //     'success' => true,
            //     'status' => 'removed',
            //     'productId' => $productId,
            //     'message' => 'Product has been removed successfully'
            // ]);
            // die();
      // } else {
            // if product is not in the list added it
            $savedProducts[$productId] = $productId;
            update_user_meta($userId, $savedProductMetaKey, json_encode($savedProducts));
            echo json_encode([
                'success' => true,
                'status' => 'saved',
                'productId' => $productId,
                'message' => 'Product has been saved successfully'
            ]);
            die();
        }
    } else {
        exit("No naughty business please");
    }
}

function my_must_login() {
    echo "You must log in to saved product";
    die();
}
