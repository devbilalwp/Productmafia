<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package productmafia
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" href=" https://use.fontawesome.com/releases/v6.0.0/css/all.css " integrity="sha384-3B6NwesSXE7YJlcLI9RpRqGf2p/EgVH8BgoKTaUrmKNDkHPStTQ3EyoYjCGXaOTS" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.min.js"></script>


	<link href="<?php echo get_stylesheet_directory_uri()?>/css/custom-css.css" rel="stylesheet">
	<link href="<?php echo get_stylesheet_directory_uri()?>/css/owl.carousel.css" rel="stylesheet">
	<link href="<?php echo get_stylesheet_directory_uri()?>/css/owl.theme.green.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-lightbox/0.2.12/slick-lightbox.css" integrity="sha512-GPEZI1E6wle+Inl8CkTU3Ncgc9WefoWH4Jp8urbxZNbaISy0AhzIMXVzdK2GEf1+OVhA+MlcwPuNve3rL1F9yg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'productmafia' ); ?></a>
	<header id="masthead" class="site-header !bg-[#140517] w-[100%]">
	   <div id="header-content" class="overflow-hidden p-10 grid grid-cols-2 content-between content-center mx-auto">
			<div class="site-branding">
				<div id="site-logo" class="flex flex-row items-center">
					<a href="/"><img src="https://b935096.smushcdn.com/935096/wp-content/uploads/2022/09/logotype.png?lossy=1&strip=1&webp=1"></a>
					<?php the_custom_logo(); ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="ml-0 lg:ml-6 text-[#fff] text-xs lg:text-xl uppercase font-sans tracking-wider font-thin">Product Mafia</span></a>
				</div>
     			<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title text-center"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php endif; ?>
			</div><!-- .site-branding -->
			<nav id="site-navigation" class=" flex flex-row justify-end items-center">
				<!-- <button class=" ml-5 lg:ml-0 menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'productmafia' ); ?></button> -->
				<?php
				if (is_user_logged_in()) { 
					
				}else{
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'menu_class'     => 'float-right text-[Futura PT] text-[#fff] text-[16px] font-semibold hover:text-[#fff] visited:text-[#fff] focus:outline-none',
						)
					);
				}
				  if (is_user_logged_in()) { 
				 ?>
  <span class="user-name" >

    <?php
      $current_user = wp_get_current_user();
	   echo '<Span id ="menu-name"> HI , '.strtoupper($current_user->first_name).'</Span>'; 
    ?>
  </span>
<div class="hamburger-menu">
  <div class="hamburger-icon">
 
    <span></span>
    <span></span>
    <span></span>
  </div>
  <ul class="menu">
    <li id="mbl-name"><a href="#"><?php echo ' HI , '. strtoupper($current_user->first_name).'' ?></a></li>
    <li><a href="/membership/">PROFILE & SETTING</a></li>
	<li><a href="/my-saved-products/">SAVED PRODUCTS</a></li>
	<li><a href="/logout/?_wpnonce=410508ae99">LOGOUT</a></li>
	
  </ul>
</div>
<?php
}
  ?>
			</nav><!-- #site-navigation -->
		</div><!-- #headercontent -->
		
	</header><!-- #masthead -->
	<style>
		
.user-name {
	
    color: white;

}

.hamburger-icon {
  display: block;
  cursor: pointer;
  padding: 10px;
  background: #000;
}

.hamburger-icon span {
    display: block;
    width: 25px;
    height: 3px;
    background: #ffffff;
    margin-bottom: 5px;
}

.menu {
    display: none;
    position: absolute;
    top: 70%;
    right: 0;
    color: white;
    width: 215px;
    background: #000;
   
}

.menu li {
	border-bottom: 0.5px solid #e3e2e3;
    padding: 14px;
}

.menu li:hover {
	border: 0.5px solid ;
	background-color: white;
	color: black;
}
#mbl-name {
    display: none;
  }



  .menu-header-container li#menu-item-335563 a {
    color: white !important;
}

.menu-header-container li#menu-item-335563 a:hover {
	color: white !important;
}

.menu-header-container li#menu-item-335563 a:focus {
	color: white !important;
}

/* Media Query for Mobile Devices */
@media (max-width: 767px) {
  #mbl-name {
    display: block;
  }

  #menu-name {
   
    display: none;
  }
}

	</style>
	<script>
// jQuery(document).ready(function($) {
// 	jQuery('.hamburger-icon').hover(function() {
// 		jQuery('.menu').slideToggle();
//   });
// });
  jQuery(document).ready(function($) {
  jQuery('.hamburger-icon').click(function() {
		jQuery('.menu').slideToggle();
  });

});

	</script>