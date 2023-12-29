<?php
/*
Template Name: Product template
*/

get_header();


$is_local_dev = $_SERVER["SERVER_NAME"] == "localhost";
$is_stage = $_SERVER["SERVER_NAME"] == "productmafia.staging.wpmudev.host";

$shipping_from = isset($_COOKIE["shipping_from"]) ? $_COOKIE["shipping_from"] : "China";
$currency = isset($_COOKIE["currency"]) ? $_COOKIE["currency"] : "USD";
$exchange_rate = floatval(isset($_COOKIE["exchange_rate"]) ? $_COOKIE["exchange_rate"] : "1");
$currency_symbol = isset($_COOKIE["currency_symbol"]) ? $_COOKIE["currency_symbol"] : "$";

$currency_names_symbols = array('USD' => array('rate' => 0, 'name' => 'US Dollar', 'symbol' => '&#36;',), 'EUR' => array('rate' => 0, 'name' => 'Euro', 'symbol' => '&#8364;',), 'CAD' => array('rate' => 0, 'name' => 'Canadian Dollar', 'symbol' => '&#36;',), 'GBP' => array('rate' => 0, 'name' => 'Pound Sterling', 'symbol' => '&#163;',), 'JPY' => array('rate' => 0, 'name' => 'Yen', 'symbol' => '&#165;',), 'AUD' => array('rate' => 0, 'name' => 'Australian Dollar', 'symbol' => '&#36;',), 'CHF' => array('rate' => 0, 'name' => 'Swiss Franc', 'symbol' => null,), 'CNY' => array('rate' => 0, 'name' => 'Yuan Renminbi', 'symbol' => '&#165;',), 'AED' => array('rate' => 0, 'name' => 'UAE Dirham', 'symbol' => '&#1583;.&#1573;',), 'AFN' => array('rate' => 0, 'name' => 'Afghani', 'symbol' => '&#65;&#102;',), 'ALL' => array('rate' => 0, 'name' => 'Lek', 'symbol' => '&#76;&#101;&#107;',), 'AMD' => array('rate' => 0, 'name' => 'Armenian Dram', 'symbol' => '',), 'ANG' => array('rate' => 0, 'name' => 'Netherlands Antillean Guilder', 'symbol' => '&#402;',), 'AOA' => array('rate' => 0, 'name' => 'Kwanza', 'symbol' => '&#75;&#122;',), 'ARS' => array('rate' => 0, 'name' => 'Argentine Peso', 'symbol' => '&#36;',), 'AWG' => array('rate' => 0, 'name' => 'Aruban Florin', 'symbol' => '&#402;',), 'BAM' => array('rate' => 0, 'name' => 'Convertible Mark', 'symbol' => '&#75;&#77;',), 'BBD' => array('rate' => 0, 'name' => 'Barbados Dollar', 'symbol' => '&#36;',), 'BDT' => array('rate' => 0, 'name' => 'Taka', 'symbol' => '&#2547;',), 'BGN' => array('rate' => 0, 'name' => 'Bulgarian Lev', 'symbol' => '&#1083;&#1074;',), 'BHD' => array('rate' => 0, 'name' => 'Bahraini Dinar', 'symbol' => '.&#1583;.&#1576;',), 'BIF' => array('rate' => 0, 'name' => 'Burundi Franc', 'symbol' => '&#70;&#66;&#117;',), 'BMD' => array('rate' => 0, 'name' => 'Bermudian Dollar', 'symbol' => '&#36;',), 'BND' => array('rate' => 0, 'name' => 'Brunei Dollar', 'symbol' => '&#36;',), 'BOB' => array('rate' => 0, 'name' => 'Boliviano', 'symbol' => '&#36;&#98;',), 'BRL' => array('rate' => 0, 'name' => 'Brazilian Real', 'symbol' => '&#82;&#36;',), 'BSD' => array('rate' => 0, 'name' => 'Bahamian Dollar', 'symbol' => '&#36;',), 'BTN' => array('rate' => 0, 'name' => 'Ngultrum', 'symbol' => '&#78;&#117;&#46;',), 'BWP' => array('rate' => 0, 'name' => 'Pula', 'symbol' => '&#80;',), 'BYN' => array('rate' => 0, 'name' => 'Belarusian Ruble', 'symbol' => NULL,), 'BZD' => array('rate' => 0, 'name' => 'Belize Dollar', 'symbol' => '&#66;&#90;&#36;',), 'CDF' => array('rate' => 0, 'name' => 'Congolese Franc', 'symbol' => '&#70;&#67;',), 'CLF' => array('rate' => 0, 'name' => 'Unidad de Fomento', 'symbol' => '',), 'CLP' => array('rate' => 0, 'name' => 'Chilean Peso', 'symbol' => '&#36;',), 'COP' => array('rate' => 0, 'name' => 'Colombian Peso', 'symbol' => '&#36;',), 'CRC' => array('rate' => 0, 'name' => 'Costa Rican Colon', 'symbol' => '&#8353;',), 'CUC' => array('rate' => 0, 'name' => 'Peso Convertible', 'symbol' => NULL,), 'CUP' => array('rate' => 0, 'name' => 'Cuban Peso', 'symbol' => NULL,), 'CVE' => array('rate' => 0, 'name' => 'Cabo Verde Escudo', 'symbol' => '&#36;',), 'CZK' => array('rate' => 0, 'name' => 'Czech Koruna', 'symbol' => '&#75;&#269;',), 'DJF' => array('rate' => 0, 'name' => 'Djibouti Franc', 'symbol' => '&#70;&#100;&#106;',), 'DKK' => array('rate' => 0, 'name' => 'Danish Krone', 'symbol' => '&#107;&#114;',), 'DOP' => array('rate' => 0, 'name' => 'Dominican Peso', 'symbol' => '&#82;&#68;&#36;',), 'DZD' => array('rate' => 0, 'name' => 'Algerian Dinar', 'symbol' => '&#1583;&#1580;',), 'EGP' => array('rate' => 0, 'name' => 'Egyptian Pound', 'symbol' => '&#163;',), 'ERN' => array('rate' => 0, 'name' => 'Nakfa', 'symbol' => NULL,), 'ETB' => array('rate' => 0, 'name' => 'Ethiopian Birr', 'symbol' => '&#66;&#114;',), 'FJD' => array('rate' => 0, 'name' => 'Fiji Dollar', 'symbol' => '&#36;',), 'GEL' => array('rate' => 0, 'name' => 'Lari', 'symbol' => '&#4314;',), 'GHS' => array('rate' => 0, 'name' => 'Ghana Cedi', 'symbol' => '&#162;',), 'GIP' => array('rate' => 0, 'name' => 'Gibraltar Pound', 'symbol' => '&#163;',), 'GMD' => array('rate' => 0, 'name' => 'Dalasi', 'symbol' => '&#68;',), 'GNF' => array('rate' => 0, 'name' => 'Guinean Franc', 'symbol' => '&#70;&#71;',), 'GTQ' => array('rate' => 0, 'name' => 'Quetzal', 'symbol' => '&#81;',), 'GYD' => array('rate' => 0, 'name' => 'Guyana Dollar', 'symbol' => '&#36;',), 'HKD' => array('rate' => 0, 'name' => 'Hong Kong Dollar', 'symbol' => '&#36;',), 'HNL' => array('rate' => 0, 'name' => 'Lempira', 'symbol' => '&#76;',), 'HRK' => array('rate' => 0, 'name' => 'Kuna', 'symbol' => '&#107;&#110;',), 'HTG' => array('rate' => 0, 'name' => 'Gourde', 'symbol' => '&#71;',), 'HUF' => array('rate' => 0, 'name' => 'Forint', 'symbol' => '&#70;&#116;',), 'IDR' => array('rate' => 0, 'name' => 'Rupiah', 'symbol' => '&#82;&#112;',), 'ILS' => array('rate' => 0, 'name' => 'New Israeli Sheqel', 'symbol' => '&#8362;',), 'INR' => array('rate' => 0, 'name' => 'Indian Rupee', 'symbol' => '&#8377;',), 'IQD' => array('rate' => 0, 'name' => 'Iraqi Dinar', 'symbol' => '&#1593;.&#1583;',), 'IRR' => array('rate' => 0, 'name' => 'Iranian Rial', 'symbol' => '&#65020;',), 'ISK' => array('rate' => 0, 'name' => 'Iceland Krona', 'symbol' => '&#107;&#114;',), 'JMD' => array('rate' => 0, 'name' => 'Jamaican Dollar', 'symbol' => '&#74;&#36;',), 'JOD' => array('rate' => 0, 'name' => 'Jordanian Dinar', 'symbol' => '&#74;&#68;',), 'KES' => array('rate' => 0, 'name' => 'Kenyan Shilling', 'symbol' => '&#75;&#83;&#104;',), 'KGS' => array('rate' => 0, 'name' => 'Som', 'symbol' => '&#1083;&#1074;',), 'KHR' => array('rate' => 0, 'name' => 'Riel', 'symbol' => '&#6107;',), 'KMF' => array('rate' => 0, 'name' => 'Comorian Franc', 'symbol' => '&#67;&#70;',), 'KPW' => array('rate' => 0, 'name' => 'North Korean Won', 'symbol' => '&#8361;',), 'KRW' => array('rate' => 0, 'name' => 'Won', 'symbol' => '&#8361;',), 'KWD' => array('rate' => 0, 'name' => 'Kuwaiti Dinar', 'symbol' => '&#1583;.&#1603;',), 'KYD' => array('rate' => 0, 'name' => 'Cayman Islands Dollar', 'symbol' => '&#36;',), 'KZT' => array('rate' => 0, 'name' => 'Tenge', 'symbol' => '&#1083;&#1074;',), 'LAK' => array('rate' => 0, 'name' => 'Lao Kip', 'symbol' => '&#8365;',), 'LBP' => array('rate' => 0, 'name' => 'Lebanese Pound', 'symbol' => '&#163;',), 'LKR' => array('rate' => 0, 'name' => 'Sri Lanka Rupee', 'symbol' => '&#8360;',), 'LRD' => array('rate' => 0, 'name' => 'Liberian Dollar', 'symbol' => '&#36;',), 'LSL' => array('rate' => 0, 'name' => 'Loti', 'symbol' => '&#76;',), 'LYD' => array('rate' => 0, 'name' => 'Libyan Dinar', 'symbol' => '&#1604;.&#1583;',), 'MAD' => array('rate' => 0, 'name' => 'Moroccan Dirham', 'symbol' => '&#1583;.&#1605;.',), 'MDL' => array('rate' => 0, 'name' => 'Moldovan Leu', 'symbol' => '&#76;',), 'MGA' => array('rate' => 0, 'name' => 'Malagasy Ariary', 'symbol' => '&#65;&#114;',), 'MKD' => array('rate' => 0, 'name' => 'Denar', 'symbol' => '&#1076;&#1077;&#1085;',), 'MMK' => array('rate' => 0, 'name' => 'Kyat', 'symbol' => '&#75;',), 'MNT' => array('rate' => 0, 'name' => 'Tugrik', 'symbol' => '&#8366;',), 'MOP' => array('rate' => 0, 'name' => 'Pataca', 'symbol' => '&#77;&#79;&#80;&#36;',), 'MRO' => array('rate' => 0, 'name' => 'Ouguiya', 'symbol' => '&#85;&#77;',), 'MUR' => array('rate' => 0, 'name' => 'Mauritius Rupee', 'symbol' => '&#8360;',), 'MVR' => array('rate' => 0, 'name' => 'Rufiyaa', 'symbol' => '.&#1923;',), 'MWK' => array('rate' => 0, 'name' => 'Malawi Kwacha', 'symbol' => '&#77;&#75;',), 'MXN' => array('rate' => 0, 'name' => 'Mexican Peso', 'symbol' => '&#36;',), 'MYR' => array('rate' => 0, 'name' => 'Malaysian Ringgit', 'symbol' => '&#82;&#77;',), 'MZN' => array('rate' => 0, 'name' => 'Mozambique Metical', 'symbol' => '&#77;&#84;',), 'NAD' => array('rate' => 0, 'name' => 'Namibia Dollar', 'symbol' => '&#36;',), 'NGN' => array('rate' => 0, 'name' => 'Naira', 'symbol' => '&#8358;',), 'NIO' => array('rate' => 0, 'name' => 'Cordoba Oro', 'symbol' => '&#67;&#36;',), 'NOK' => array('rate' => 0, 'name' => 'Norwegian Krone', 'symbol' => '&#107;&#114;',), 'NPR' => array('rate' => 0, 'name' => 'Nepalese Rupee', 'symbol' => '&#8360;',), 'NZD' => array('rate' => 0, 'name' => 'New Zealand Dollar', 'symbol' => '&#36;',), 'OMR' => array('rate' => 0, 'name' => 'Rial Omani', 'symbol' => '&#65020;',), 'PAB' => array('rate' => 0, 'name' => 'Balboa', 'symbol' => '&#66;&#47;&#46;',), 'PEN' => array('rate' => 0, 'name' => 'Sol', 'symbol' => '&#83;&#47;&#46;',), 'PGK' => array('rate' => 0, 'name' => 'Kina', 'symbol' => '&#75;',), 'PHP' => array('rate' => 0, 'name' => 'Philippine Peso', 'symbol' => '&#8369;',), 'PKR' => array('rate' => 0, 'name' => 'Pakistan Rupee', 'symbol' => '&#8360;',), 'PLN' => array('rate' => 0, 'name' => 'Zloty', 'symbol' => '&#122;&#322;',), 'PYG' => array('rate' => 0, 'name' => 'Guarani', 'symbol' => '&#71;&#115;',), 'QAR' => array('rate' => 0, 'name' => 'Qatari Rial', 'symbol' => '&#65020;',), 'RON' => array('rate' => 0, 'name' => 'Romanian Leu', 'symbol' => '&#108;&#101;&#105;',), 'RSD' => array('rate' => 0, 'name' => 'Serbian Dinar', 'symbol' => '&#1044;&#1080;&#1085;&#46;',), 'RUB' => array('rate' => 0, 'name' => 'Russian Ruble', 'symbol' => '&#1088;&#1091;&#1073;',), 'RWF' => array('rate' => 0, 'name' => 'Rwanda Franc', 'symbol' => '&#1585;.&#1587;',), 'SAR' => array('rate' => 0, 'name' => 'Saudi Riyal', 'symbol' => '&#65020;',), 'SBD' => array('rate' => 0, 'name' => 'Solomon Islands Dollar', 'symbol' => '&#36;',), 'SCR' => array('rate' => 0, 'name' => 'Seychelles Rupee', 'symbol' => '&#8360;',), 'SDG' => array('rate' => 0, 'name' => 'Sudanese Pound', 'symbol' => '&#163;',), 'SEK' => array('rate' => 0, 'name' => 'Swedish Krona', 'symbol' => '&#107;&#114;',), 'SGD' => array('rate' => 0, 'name' => 'Singapore Dollar', 'symbol' => '&#36;',), 'SLL' => array('rate' => 0, 'name' => 'Leone', 'symbol' => '&#76;&#101;',), 'SOS' => array('rate' => 0, 'name' => 'Somali Shilling', 'symbol' => '&#83;',), 'SRD' => array('rate' => 0, 'name' => 'Surinam Dollar', 'symbol' => '&#36;',), 'STD' => array('rate' => 0, 'name' => 'Dobra', 'symbol' => '&#68;&#98;',), 'SVC' => array('rate' => 0, 'name' => 'El Salvador Colon', 'symbol' => '&#36;',), 'SYP' => array('rate' => 0, 'name' => 'Syrian Pound', 'symbol' => '&#163;',), 'SZL' => array('rate' => 0, 'name' => 'Lilangeni', 'symbol' => '&#76;',), 'THB' => array('rate' => 0, 'name' => 'Baht', 'symbol' => '&#3647;',), 'TJS' => array('rate' => 0, 'name' => 'Somoni', 'symbol' => '&#84;&#74;&#83;',), 'TMT' => array('rate' => 0, 'name' => 'Turkmenistan New Manat', 'symbol' => '&#109;',), 'TND' => array('rate' => 0, 'name' => 'Tunisian Dinar', 'symbol' => '&#1583;.&#1578;',), 'TOP' => array('rate' => 0, 'name' => 'Pa\'anga', 'symbol' => '&#84;&#36;',), 'TTD' => array('rate' => 0, 'name' => 'Trinidad and Tobago Dollar', 'symbol' => '&#36;',), 'TWD' => array('rate' => 0, 'name' => 'New Taiwan Dollar', 'symbol' => '&#78;&#84;&#36;',), 'TZS' => array('rate' => 0, 'name' => 'Tanzanian Shilling', 'symbol' => '',), 'UAH' => array('rate' => 0, 'name' => 'Hryvnia', 'symbol' => '&#8372;',), 'UGX' => array('rate' => 0, 'name' => 'Uganda Shilling', 'symbol' => '&#85;&#83;&#104;',), 'UYU' => array('rate' => 0, 'name' => 'Peso Uruguayo', 'symbol' => '&#36;&#85;',), 'UZS' => array('rate' => 0, 'name' => 'Uzbekistan Sum', 'symbol' => '&#1083;&#1074;',), 'VES' => array('rate' => 0, 'name' => 'Bolívar Soberano', 'symbol' => NULL,), 'VND' => array('rate' => 0, 'name' => 'Dong', 'symbol' => '&#8363;',), 'VUV' => array('rate' => 0, 'name' => 'Vatu', 'symbol' => '&#86;&#84;',), 'WST' => array('rate' => 0, 'name' => 'Tala', 'symbol' => '&#87;&#83;&#36;',), 'YER' => array('rate' => 0, 'name' => 'Yemeni Rial', 'symbol' => '&#65020;',), 'ZAR' => array('rate' => 0, 'name' => 'Rand', 'symbol' => '&#82;',), 'ZWL' => array('rate' => 0, 'name' => 'Zimbabwe Dollar', 'symbol' => '&#90;&#36;',),);
?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.css" />
<style>
   #pimg img{
    
    height: 230px;
    object-fit: cover;
    width: calc(100% - 0px) !important;

   }

    div#countdown {
    font-family: 'Futura PT', sans-serif !important;
}
div#countdown span{
    color: #D43F20;
    font-weight: bold;
}
    span.page-numbers.current ,
    a.prev.page-numbers,
    a.next.page-numbers{
        background: #e73731 !important;
        color: #fff !important;
        padding: 5px 10px;
    }
    a.page-numbers {
        padding: 5px 10px;
        color: black;
    }
    select.b-custom-select__select {
        width: 100%;
    }

    .b-custom-select__dropdown {
        display: none;
        position: absolute;
        left: 50%;
        transform: translate(-50%, 0);
        box-shadow: 5px 10px 10px rgb(0 0 0 / 9%);
        background-color: white;
        border-radius: 3px;
        z-index: 5;
        padding: 12px 25px;
        width: 180px;
    }

    .b-applied-filter-box {
        display: none;
        background-color: black;
        color: white;
        padding: 3px 15px;
        border-radius: 10px;
        position: relative;
        cursor: pointer;
    }

    .b-filters__grid {

        display: grid;
        gap: 30px;
        column-gap: 24px;
        align-items: baseline;
        grid-template-columns: auto repeat(4, 1fr);
    }

    .b-filters__applied-row {
        display: flex;
        grid-column: 2 / span 4;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 30px;
    }

    
    a.pre {
    background-image: url(https://productmafia.staging.wpmudev.host/wp-content/uploads/2023/07/premium.png);
    background-repeat: no-repeat;
    background-size: 16px 14px;
    background-position: 15px 10px;
    display: block;
    width: 120px;
    font-size: 12px;
    text-align: center;
    background-color: #ffffff;
    border-radius: 50px;
    color: #000000;
    padding: 8px 0 8px 15px;
    margin-top: 5px;
    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.31);
    position: absolute;
    top: 45%;

}
</style>





<div class="bg-gray-100">

    <!-- *********************banner section start here *************************** -->

    <!-- globals  -->
    <?php 

            $is_local_dev = $_SERVER["SERVER_NAME"] == "localhost";
            $shipping_from = isset($_COOKIE["shipping_from"]) ? $_COOKIE["shipping_from"] : "China";
            $currency = isset($_COOKIE["currency"]) ? $_COOKIE["currency"] : "USD";
            $exchange_rate = floatval(isset($_COOKIE["exchange_rate"]) ? $_COOKIE["exchange_rate"] : "1");
            $currency_symbol = isset($_COOKIE["currency_symbol"]) ? $_COOKIE["currency_symbol"] : "$";
    
    
    ?>


    <section class='bg-black   pt-[16px] pb-[76px]'>
        <div class="banner-sec">
            <div class="banner-title ">
                <h1 class='text-center text-white font-lato font-bold text-[30px] leading-10'>Winning Dropshipping
                    Products, Curated Daily!</h1>
                <?php
                global $currency;
                if (false === ($currencies = get_transient('currencies'))) {

                    $exchange_rates = get_option("exchange_rates");

                    include_once dirname(__FILE__) . '/../inc/static-data/currency-names-symbols.php';
                    $currencies = $currency_names_symbols;
//                            echo '<pre>';
//                            print_r($currencies);
//                            echo '</pre>';
                    foreach ($currencies as $currency => $data) {
//                        $rate = $exchange_rates["data"]["rates"][$currency];
                        if (!empty($rate)) {
                            $currencies[$currency]["rate"] = $rate;
                            // Use only single character symbols
                            if (substr_count($currencies[$currency]["symbol"], ";") != 1) $currencies[$currency]["symbol"] = "";
                        } else {
                            unset($currencies[$currency]);
                        }
                    }
                    set_transient('currencies', $currencies, 7 * 24 * HOUR_IN_SECONDS);
                }
                ?>
            </div>
        </div>
    </section>

    <!-- *******************Filter Section start here ************** -->
    <div class="serch-box text-center mt-6">
        <form method="get" id="top-search-form" action="">

        <input
            name="search"
                type="search"
               class=" placeholder:outline-none outline-none placeholder:text-black placeholder:text-center"
               placeholder="Search Products">
    </div>

    <!-- ****************black box section start here **************** -->
    <section class=" sm:max-w-full max-w-full container mx-auto px-4  my-6 lg:w-3/4 ">
        <div class="bg-white rounded-t-none rounded-xl py-5 px-4 items-center">
            <div class="b-filters">
                <div class="b-filters__grid">
                    <div class="b-filters__applied-row-label" style="display: none;">Applied Filters</div>
                    <div class="b-filters__applied-row" style="display: none;">
                        <div class="b-applied-filter-box" data-id="top-country" style="display: none;">
                            Top Country: <span class="b-applied-filter-box__value">Top Country</span>
                        </div>
                        <div class="b-applied-filter-box" data-id="product-type" style="display: none;">
                            <span class="b-applied-filter-box__value">All Product Types</span>
                        </div>
                        <div class="b-applied-filter-box" data-id="niche" style="display: none;">
                            Niche: <span class="b-applied-filter-box__value">All Niches</span>
                        </div>
                        <div class="b-applied-filter-box" data-id="as-seen-on" style="display: none;">
                            <span class="b-applied-filter-box__value">Platform: Product Mafia</span>
                        </div>
                        <div class="b-applied-filter-box" data-id="total-reactions" style="display: none;">
                            Reactions: <span class="b-applied-filter-box__lower-value">0</span><span
                                class="b-applied-filter-box__upper-value">+</span>
                        </div>
                        <div class="b-applied-filter-box" data-id="total-comments" style="display: none;">
                            Comments: <span class="b-applied-filter-box__lower-value">0</span><span
                                class="b-applied-filter-box__upper-value">+</span>
                        </div>
                        <div class="b-applied-filter-box" data-id="total-shares" style="display: none;">
                            Shares: <span class="b-applied-filter-box__lower-value">0</span><span
                                class="b-applied-filter-box__upper-value">+</span>
                        </div>
                        <div class="b-applied-filter-box" data-id="total-views" style="display: none;">
                            Views: <span class="b-applied-filter-box__lower-value">0</span><span
                                class="b-applied-filter-box__upper-value">+</span>
                        </div>
                        <div class="b-applied-filter-box" data-id="date-posted">
                            Date Posted: <span class="b-applied-filter-box__lower-value"></span><span
                                class="b-applied-filter-box__upper-value"></span>
                        </div>
                    </div>
                </div>
                <div class="advanced_filter_serach">
                    <div class=" gap-4 flex lg:flex-row md:flex-col flex-col">
                        <label class=" font-lato text-sm text-gray-400 pr-4" for="">Advanced:
                        </label>
                        <div class=" grid gap-4  lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 w-full">
                            <div class="country">
                                <select class=" b-select text-sm pl-1  outline-none  rounded py-1  w-full " name="top-country"
                                        data-id="top-country">
                                    <option value="">Top Country</option>
                                    <?php

                                    include_once dirname(__FILE__) . '/../inc/static-data/countries-list.php';
                                    global $currency;
                                    global $exchange_rate;
                                    global $currency_symbol;

                                    $selected_country = !empty($_GET["top_country"]) ? $_GET["top_country"] : "";

                                    foreach ($countries as $countryKey => $countryName) {
                                        $selected = ($selected_country == $countryKey ? "selected" : "");
                                        echo "<option value='$countryKey' $selected>$countryName</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="product_type">
                                <select class="b-select outline-none  rounded py-1  w-full " name="product-type"
                                        data-id="product-type" >
                                    <?php
                                    $terms = get_terms(array('taxonomy' => 'product_type', 'hide_empty' => false,));
                                    if (!empty($terms) && !is_wp_error($terms)) {

                                        echo '<option value="">Select an option</option>';
                                        foreach ($terms as $term) {
                                            echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
                                        }
                                    }
                                    ?>
                                    <option value="">All Product Types</option>
                                </select>
                            </div>
                            <div class="niches">
                                <select class="b-select  outline-none  rounded py-1  w-full " name="niche"
                                        data-id="niche">
                                    <option value="">All Niches</option>
                                    <?php
                                    $taxonomies = get_terms(array('taxonomy' => 'category', 'hide_empty' => false));
                                    $selected_c_option = "";
                                    if (isset($_GET['category'])) $selected_c_option = $_GET['category'];
                                    foreach ($taxonomies as $category) { ?>
                                        <option data-cat="<?php echo esc_attr($category->term_id); ?>"
                                                value="<?php echo esc_attr($category->term_id); ?>" <?php echo $selected_c_option == $category->term_id ? "selected" : ""; ?> ><?php echo esc_html($category->name); ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                            <div class="prodcut_mafia">
                                <select class="b-select   outline-none  rounded py-1  w-full " name="as-seen-on"
                                        data-id="as-seen-on">
                                    <option value="">Platform: Product Mafia</option>
                                    <?php
                                    $taxonomies_as_seen = get_terms(array('taxonomy' => 'as-seen-on', 'hide_empty' => false));
                                    $selected_as_seen_on_option = "";
                                    if (isset($_GET['as_seen_on'])) {
                                        $selected_as_seen_on_option = trim($_GET['as_seen_on']);
                                    }
                                    foreach ($taxonomies_as_seen as $option) {
                                        $slugOption = $option->slug;
                                        $slug = strtolower(str_replace(" ", "-", $slugOption));
                                        ?>
                                        <option
                                            value="<?php echo esc_attr($slug); ?>" <?php echo $selected_as_seen_on_option == $slug ? "selected" : ""; ?> ><?php echo "Platform: " . esc_html($option->name); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class=" border-y-2 py-3 border-gray-300 my-3 gap-4 flex lg:flex-row md:flex-col flex-col">
                        <label for="" class=" font-lato text-sm text-gray-400">Engagement:</label>
                        <div class=" grid gap-4  lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 w-full">
                            <div class="b-filters__select-cell">
                                <div class="b-custom-select relative" data-id="total-reactions" data-min="0"
                                     data-max="10000000" data-lower="<?php //echo $_GET["min_reactions"]; ?>"
                                     data-upper="<?php // echo $_GET["max_reactions"]; ?>">
                                    <select
                                        class="b-custom-select__select text-sm pl-1  outline-none  rounded py-1  w-full"
                                        name="">
                                        <option value="">Total Reactions</option>
                                    </select>
                                    <div class="b-custom-select__overlay absolute top-0 left-0 bottom-0 right-0"></div>
                                    <div class="b-custom-select__dropdown">
                                        <div class="b-custom-select__control-text"></div>
                                        <div class="b-custom-select__control"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="b-filters__select-cell">
                                <div class="b-custom-select relative" data-id="total-comments" data-min="0"
                                     data-max="50000" data-lower="<?php //echo $_GET["min_comments"]; ?>"
                                     data-upper="<?php //echo $_GET["max_comments"]; ?>">
                                    <select
                                        class="b-custom-select__select text-sm pl-1  outline-none  rounded py-1  w-full"
                                        name="">
                                        <option value="">Total Comments</option>
                                    </select>
                                    <div class="b-custom-select__overlay  absolute top-0 left-0 bottom-0 right-0"></div>
                                    <div class="b-custom-select__dropdown">
                                        <div class="b-custom-select__control-text"></div>
                                        <div class="b-custom-select__control"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="b-filters__select-cell">
                                <div class="b-custom-select relative" data-id="total-shares" data-min="0"
                                     data-max="1000000" data-lower="<?php // echo $_GET["min_shares"]; ?>"
                                     data-upper="<?php //echo $_GET["max_shares"]; ?>">
                                    <select 
                                        class="b-custom-select__select text-sm pl-1  outline-none  rounded py-1  w-full"
                                        name="share_product">
                                        <option value="">Total Shares</option>
                                    </select>
                                    <div class="b-custom-select__overlay absolute top-0 left-0 bottom-0 right-0"></div>
                                    <div class="b-custom-select__dropdown">
                                        <div class="b-custom-select__control-text"></div>
                                        <div class="b-custom-select__control"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="b-filters__select-cell">
                                <div class="b-custom-select relative" data-id="total-views" data-min="0"
                                     data-max="10000000" data-lower="<?php //echo $_GET["min_views"]; ?>"
                                     data-upper="<?php //echo $_GET["max_views"]; ?>">
                                    <select
                                        class="b-custom-select__select text-sm pl-1  outline-none  rounded py-1  w-full"
                                        id="abc">
                                        <option value="">Total Views</option>
                                    </select>
                                    <div class="b-custom-select__overlay absolute top-0 left-0 bottom-0 right-0"></div>
                                    <div class="b-custom-select__dropdown">
                                        <div class="b-custom-select__control-text"></div>
                                        <div class="b-custom-select__control"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class=" gap-4 flex lg:flex-row md:flex-col flex-col">
                        <label for="" class="font-lato  text-sm text-gray-400 pr-2">Preferences:</label>
                        <div class=" grid gap-4  lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 w-full">
                            <div class="date_posted">
                                <div class="b-date-select" data-id="date-posted"
                                     data-from="<?php // echo $_GET["date_posted_from"]; ?>"
                                     data-to="<?php //echo $_GET["date_posted_to"]; ?>">
                                    <select class=" text-sm pl-1  outline-none  rounded py-1  w-full " name="date_posted"
                                            id="date_posted">
                                        <option value="">Date Posted</option>
                                    </select>
                                    <div class="b-date-select__overlay"></div>
                                </div>
                            </div>
                            <div class="shipping">
                                <?php
                                global $shipping_from;
                                $flag_class = ($shipping_from == "China" ? "cn" : "us");
                                ?>
                                <select class="b-select outline-none  rounded py-1  w-full" name="ship"
                                        id="js-ship-from-switch">
                                    <option value="China" <?php echo($shipping_from == "China" ? "selected" : ""); ?>>
                                        Shipping from: China
                                    </option>
                                    <option value="US" <?php echo($shipping_from == "US" ? "selected" : ""); ?>>
                                        Shipping from: US
                                    </option>
                                </select>
                            </div>
                            <div class="currency">
                                            
                            <select class="b-select outline-none  rounded py-1  w-full " name="" id="js-currency-selector">
                                <?php
                                require_once __DIR__.'/../inc/static-data/currency-names-symbols.php';
                                $exchange_rates = get_option("exchange_rates");
                                $currencies = $currency_names_symbols;
                                foreach ($currencies as $currency => $data) {
                                    $rate = $exchange_rates["data"]["rates"][$currency];
                                   
                                    if (!empty($rate)){
                                    $currencies[$currency]["rate"] = $rate;
                                    // Use only single character symbols
                                    if (substr_count($currencies[$currency]["symbol"], ";") != 1) {
                                        $currencies[$currency]["symbol"] = "";
                                    }
                                    }
                                    else {
                                    unset($currencies[$currency]);
                                    }
                                }
                                if(!empty($currencies)):
                                    foreach ($currencies as $currency_code => $currency_data) {
                                    $selected = ($currency_code == $currency);
                                   
                                ?>
                                
                                <option data-exchange-rate="<?php echo $currency_data['rate']; ?>"
                                        data-symbol="<?php echo $currency_data['symbol']; ?>"
                                        data-currency-code="<?php echo $currency_code; ?>"
                                        <?php echo $selected ? "selected" : ""; ?>
                                        <?php echo $selected ? "class='js-text-changed'" : ""; ?>>
                                    <?php echo ($selected ? "Currency: " : "") . $currency_data['name']; ?>
                                </option>  
                              
                                <?php } endif; ?>
                                </select>
                                
                            </div>
                            <div  class="hidden" >
                      <!-- Hidden input fields for likes 0 -->
                    <input type="hidden" id="dropdown-0-min" name="Like_min" value="">
                    <input type="hidden" id="dropdown-0-max" name="Like_max" value="">

                    <!-- Hidden input fields for comments 1 -->
                    <input type="hidden" id="dropdown-1-min" name="Comment_min" value="">
                    <input type="hidden" id="dropdown-1-max" name="Comment_max" value="">

                    <!-- Hidden input fields for shares 2 -->
                    <input type="hidden" id="dropdown-2-min" name="Share_min" value="">
                    <input type="hidden" id="dropdown-2-max" name="Share_max" value="">

                    <!-- Hidden input fields for views 3 -->
                    <input type="hidden" id="dropdown-3-min" name="View_min" value="">
                    <input type="hidden" id="dropdown-3-max" name="View_max" value="">  

                    <!-- Hidden input fields for date 4 -->
                    <input type="hidden" id="dropdown-4-min" name="date_min" value="">
                    <input type="hidden" id="dropdown-4-max" name="date_max" value=""> 
                   </div>
                            <div class="prodcut_mafia">
                                <form id="filter-pr" method="get"  action="<?php echo home_url(); ?>/productspage">
                                    <input  type="submit" class="outline-none h-full w-full rounded bg-black text-white" value="Filter Products">
                                    <input type="hidden" data-id="top-country" name="top_country" value="" disabled>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    $current_user = wp_get_current_user();
    $userlevel = $current_user->membership_level->name;
                 if( $userlevel !== 'Free' ) {
                    ?>
                    <script type="text/javascript">
    jQuery(document).ready(function() {
      jQuery('#promember').hide();
    });
  </script>
                    <?php 
                                    }?>
    <!-- ****************black box section start here **************** -->
    <section  id ="promember" class="sm:max-w-full max-w-full container mx-auto px-4  my-6 md:w-3/4 ">
        <div class="bg-black rounded-3xl py-5 px-8 grid lg:grid-cols-2 md:grid-col-1 gap-5  items-center">       
            <div >
               
                <p class="font-OpenSans text-yellow-400 text-sm font-bold uppercase">ProductMafia PRO</p>
                <h3 class="font-OpenSans text-white font-bold  text-[30px] leading-10">Try PRO. First month $1</h3>
            </div>
            <div class="lg:text-right md:text-center">
                <a href="https://productmafia.staging.wpmudev.host/membership/checkout/?level=9"
                   class="text-black px-16 py-4 rounded-2xl font-bold font-lato bg-yellow-400 text-[15px] leading-10">Upgrade
                    Now</a>
            </div>
        </div>
    </section>
    <?php
                // $search_country='';
                

                $current_user = wp_get_current_user();
                $userlevel = $current_user->membership_level->name;
                $gmt_timestamp = get_post_time('U', true, get_the_ID());
                        $show_avail = false;
                        if(isset($_GET['search']) ) {
                            global $is_local_dev;
                            global $shipping_from;
                            // if ( isset( $_GET["top_country"] ) || isset( $_GET["product-type"] )  || isset( $_GET["as-seen-on"] ) || isset( $_GET['Share_min'] ) || isset( $_GET['Share_max'] ) ||isset( $_GET['date_min'] ) || isset( $_GET['date_max'] ) || isset( $_GET['Like_min'] ) || isset( $_GET['Like_max'] ) || isset( $_GET['Comment_min'] ) || isset( $_GET['Comment_max'] ) || isset( $_GET['search'] ) || isset( $_GET['niche'] ) ) {
                                $like_min='';
                               
                                $search_country = isset( $_GET["top_country"] ) ?sanitize_text_field( $_GET['top_country'] ) : '';
                                $search_product = isset( $_GET["product-type"] ) ? sanitize_text_field( $_GET['product-type'] ) : '';
                                $search_seen = isset( $_GET["as-seen-on"] ) ? sanitize_text_field( $_GET['as-seen-on'] ) : '';
                                $Share_min = isset( $_GET['Share_min'] ) ? sanitize_text_field( $_GET['Share_min'] ) : '';
                                $Share_max = isset( $_GET['Share_max'] ) ? sanitize_text_field( $_GET['Share_max'] ) : '';
                                $Like_min = isset( $_GET['Like_min'] ) ? sanitize_text_field( $_GET['Like_min'] ) : '';
                                $Like_max = isset( $_GET['Like_max'] ) ? sanitize_text_field( $_GET['Like_max'] ) : '';
                                $date_min = isset( $_GET['date_min'] ) ? sanitize_text_field( $_GET['date_min'] ) : '';
                                $date_max = isset( $_GET['date_max'] ) ? sanitize_text_field( $_GET['date_max'] ) : '';
                                $Comment_min = isset( $_GET['Comment_min'] ) ? sanitize_text_field( $_GET['Comment_min'] ) : '';
                                $Comment_max = isset( $_GET['Comment_max'] ) ? sanitize_text_field( $_GET['Comment_max'] ) : '';
                                $search_query = isset( $_GET['search'] ) ? sanitize_text_field( $_GET['search'] ) : '';
                                $search_cat = isset( $_GET['niche'] ) ? sanitize_text_field( $_GET['niche'] ) : '';
                                $search_ship = isset( $_GET['ship'] ) ?sanitize_text_field( $_GET['ship'] ) : '';
                            
                                        $share='';
                                        if($Share_min !="" ){
                                            $share=array(
                                                'key'     => 'engagement_shares',
                                                'value'   => array($Share_min, $Share_max),
                                                'compare' => 'BETWEEN',
                                            );
                                        }
                                        $top='';
                                        if($search_country !="" ){
                                            $top=array(
                                                'key'     => 'custom_field_ctr',
                                                'value'   => $search_country,
                                                
                                            );
                                        }
                                        $like='';
                                        if($like_min !="" ){
                                            $like=array(
                                                'key'     => 'engagement_likes',
                                                'value'   => array($Like_min, $Like_max),
                                                'compare' => 'BETWEEN',
                                            );
                                        }
                                        $comment='';
                                        if($Comment_min !="" ){
                                            $comment=array(
                                            'key'     => 'engagement_comments',
                                            'value'   => array($Comment_min, $Comment_max),
                                            'compare' => 'BETWEEN',
                                            );
                                        }
                                        $product='';
                                        if($search_product !="" ){
                                            $product=array(
                                                'taxonomy' => 'product_type',
                                                'field'    => 'term_id',
                                                'terms'    => $search_product,
                                            );
                                        }
                                        $seen='';
                                        if($search_seen !="" ){
                                            $seen=array(
                                                'taxonomy' => 'as-seen-on',
                                                'field'    => 'slug',
                                                'terms'    => $search_seen,
                                            );
                                        }
                                        $date='';
                                        if($date_min !="" ){
                                        $date=array(
                                            'after' => $start_date, 
                                            'before' => $end_date, 
                                            'inclusive' => true, // Set to true if you want to include posts from the start and end dates
                                        );
                                    }
                                      
                                        $args_search = array(
                                            'post_type' => 'product',
                                            'order' => 'DESC', // Default order: descending
                                            'paged' => ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1,
                                            's' => $search_query,
                                            'cat' => $search_cat,
                                            'posts_per_page' => 30,
                                            
                                            'date_query' => array(
                                                $date
                                            ),
                                            'tax_query' => array(
                                                'relation' => 'AND',
                                                $product,
                                                $seen,
                                            ),
                                            'meta_query' => array(
                                                'relation' => 'AND', 
                                                $share,
                                                $like,
                                                $comment,
                                                $top
                                             ),
                                         );
                                        $query = new WP_Query( $args_search );
                                        $count = $query->found_posts; 
                                //    } 
                                     
                ?>
    <!-- ****************sort section **************** -->
    <div class="b-product-roll-top mx-auto px-4 my-6 lg:w-3/4 relative grid grid-cols-2">
        <?php
        $selected_sorting_option = "";
        if (isset($_GET['sorting'])) $selected_sorting_option = trim($_GET['sorting']);
        ?>
        <div class="b-product-roll-top__sort  ">
            <select name="sorting" class="mafia_sorting h-[30px]" data-id="sorting">
                <option value="date">Sort By:</option>
                <option value="orders"
                    <?php echo $selected_sorting_option == "orders" ? "selected" : ""; ?> >Most Orders
                </option>
                <option value="engagement"
                    <?php echo $selected_sorting_option == "engagement" ? "selected" : ""; ?> >Highest Engagement
                </option>
                <option value="selling_price"
                    <?php echo $selected_sorting_option == "selling_price" ? "selected" : ""; ?> >Selling Price: Most
                    Expensive
                </option>
                <option value="selling_price_asc"
                    <?php echo $selected_sorting_option == "selling_price_asc" ? "selected" : ""; ?> >Selling Price:
                    Cheapest
                </option>
                <option value="profit_margin"
                    <?php echo $selected_sorting_option == "profit_margin" ? "selected" : ""; ?> >Highest Profit Margins
                </option>
            </select>
        </div>
        <div id ="ctr" class="b-product-roll-top__count"><?php echo $count; ?> Products found</div>
    </div>
    <!-- ****************sort section **************** -->
   

    <section id="zz" class="container sm:max-w-full max-w-full mx-auto px-4 my-6 md:w-3/4 py-9">
        <div class="product-row grid md:grid-cols-2 lg:grid-cols-3 sm :grid-cols-1 gap-4 ">
          <?php
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
                                    class="fl-profit bg-black font-lato text-gray-300 rounded-lg px-2 py-1 text-sm max-w-fit ml-auto">
                                    <span 
                                    class="b-tooltip__value js-shipping-from-switchable js-currency-convertible text-white"
                                    data-other-option-usd-base="<?php echo $shipping_from == "China" ? $profit_margin_us : $profit_margin ?>"
                            data-usd-base="<?php echo $shipping_from == "China" ? $profit_margin : $profit_margin_us ?>"
                            data-other-option="<?php echo mafia_format_acf_price($shipping_from == "China" ? $profit_margin_us : $profit_margin)?>">
                            <?php echo  mafia_format_acf_price($shipping_from == "China" ? $profit_margin : $profit_margin_us) ?></span>Profit
                            <div class='b-tooltip' style="display :none;">
                            <div class='b-tooltip__line'>
                             <span 
                            class='b-tooltip__value js-currency-convertible' 
                            data-usd-base='<?php echo $selling_price ?>'>
                                <?php echo mafia_format_acf_price($selling_price)?>
                          </span>
                          <span class='b-tooltip__label'>Selling Price</span>
                      </div>
                    <div class='b-tooltip__line'>
                        <span 
                            class='b-tooltip__value js-shipping-from-switchable js-currency-convertible' 
                            data-other-option-usd-base='<?php echo ($shipping_from == "China" ? $product_cost_us : $product_cost_china) ?>'
                            data-usd-base='<?php ($shipping_from == "China" ? $product_cost_china : $product_cost_us)?>'
                            data-other-option='<?php echo mafia_format_acf_price($shipping_from == "China" ? $product_cost_us : $product_cost_china)?>'>
                            <?php echo  mafia_format_acf_price($shipping_from == "US" ? $product_cost_china : $product_cost_us)?>
                        </span>
                        <span class='b-tooltip__label'> Product Cost</span>
                    </div>
                </div>
                    </div>
                        </div>
                        <!-- added -->
                             <div id="pimg" class="product_img  m-auto">
                                <?php
                                // echo $thumbnail; 
                                $html='';
                                
                                    if( $userlevel != 'Free' ) {
                                         echo $thumbnail; 
                                    }
                                    if( $userlevel == 'Free' && $show_avail == false ) {
                                        if( $specProd == '' && $untapProd == '') {
                                           // echo $thumbnail; 
                                                $post_date = get_the_date('Y-m-d', get_the_ID());
                                                $post_date_timestamp = strtotime($post_date);
                                                
                                                // Calculate the timestamp for 3 days ago
                                                $three_days_ago_timestamp = strtotime('-3 days');
                                                
                                                // Check if the post was published less than 3 days ago
                                                if ($post_date_timestamp > $three_days_ago_timestamp) {
                                                    // The post was published less than 3 days ago
                                                     echo  $html = '<img id="p-img" width="100" alt="" itemprop="image" loading="lazy" src="https://www.productmafia.com/wp-content/uploads/2022/12/locked-product.png" style="
                                                     height: 255px;
                                                     object-fit: cover;
                                                     width: calc(100% - 0px) !important;
                                      ">';
                                                }
                                                else{
                                                     echo $thumbnail; 
                                                }
                                            
                                        }else{
                                          echo  $html = '<img id="p-img" width="100" alt="" itemprop="image" loading="lazy" src="https://www.productmafia.com/wp-content/uploads/2022/12/locked-product.png" style="
                                          height: 255px;
                                            object-fit: cover;
                                              width: calc(100% - 0px) !important;
                                      "><a class="pre" href="https://productmafia.staging.wpmudev.host/membership/checkout/?level=9">PREMIUM</a>';
                                        }
                                    }
                                    if( $userlevel == 'Free' && $show_avail == true ){
                                       echo $html = '<img id="p-img" width="100" alt="" itemprop="image" loading="lazy" src="https://www.productmafia.com/wp-content/uploads/2022/12/locked-product.png" style="
                                       height: 255px;
                                        object-fit: cover;
                                        width: calc(100% - 0px) !important;
                                   "><a class="pre" href="https://productmafia.staging.wpmudev.host/membership/checkout/?level=9">PREMIUM</a>';
                                    }
                                
                                 ?>
                            </div>
                            <?php
                            if( $userlevel == 'Free' && $show_avail == false ) {
                                if( $specProd == '' && $untapProd == '') {
                                // echo $thumbnail; 
                                        $post_date = get_the_date('Y-m-d', get_the_ID());
                                        $post_date_timestamp = strtotime($post_date);
                                        
                                        // Calculate the timestamp for 3 days ago
                                        $three_days_ago_timestamp = strtotime('-3 days');
                                        
                                        // Check if the post was published less than 3 days ago
                                        if ($post_date_timestamp > $three_days_ago_timestamp) {
                                            // The post was published less than 3 days ago    
                                        }
                                        else{
                                            echo $heart= '<div style="float: right;" data-product-id="'.get_the_ID().'" class="saveProduct product-save-heart"><i class="fa fa-heart-o"></i></div>';
                                            }

                                        }
                                    }
                                            ?>
                          <div class=" ">
                                <h2 class="text-black text-center text-base	">
                               <?php 
                                if( get_field('untapped_product') ) {
                                if( $userlevel == 'Pro' || $userlevel == 'Pro (Annual)' ) {
                  echo  $htmll = '<a class="text-blue-600 " href="'.get_permalink().'" title="See full product details for '.get_the_title().'">'.get_the_title().'</a>';
                } else {
                  echo  $htmlll = '<a class="text-black-600" href="https://productmafia.staging.wpmudev.host/membership/checkout/?level=9" title="Pro Members Only">Pro Members Only</a>';
              }
                               }
                elseif ( get_field('special_product') ) {
                    if( $userlevel == 'Free' ) {
                        
                      
                                        
                      echo  $html = '<a class="text-black-600" href="https://productmafia.staging.wpmudev.host/membership/checkout/?level=9" title="Pro Members Only">Pro Members Only</a>';
    
                    } 
                    else {
                        
                       echo $html = '<a class="text-blue-600 " href="'.get_permalink().'" title="See full product details for '.get_the_title().'">'.get_the_title().'</a>';
                    }
                } 
                else {
                    if( $userlevel == 'Free' && $show_avail == true ) {
                        
                       echo  $html = '<a class="text-blue-600 " href="https://productmafia.staging.wpmudev.host/membership/checkout/?level=9" title="Pro Members Only">Upgrade for $1</a>';
    
                    } else {
                        $post_date = get_the_date('Y-m-d', get_the_ID());
                                    $post_date_timestamp = strtotime($post_date);
                                    $gmt_timestamp = get_post_time('U', true, $post_id);
                                    // Calculate the timestamp for 3 days ago
                                    $three_days_ago_timestamp = strtotime('-3 days');
                                    
                                    // Check if the post was published less than 3 days ago
                                    if ($post_date_timestamp > $three_days_ago_timestamp) {}
                                    else{
                                        
                        //hjh
                       echo $html= '<a class="text-blue-600 " href="'.get_permalink().'" title="See full product details for '.get_the_title().'">'.get_the_title().'</a>';
                    
                                    }
                                    }
            
            }
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
                                    if ($post_date_timestamp > $three_days_ago_timestamp) {
                                        if( $userlevel == 'Free' && $show_avail == false ) {
                                            if( $specProd == '' && $untapProd == '') {
                                        // The post was published less than 3 days ago
                                        $gmt_timestamp = get_post_time('U', true, $post_id);
                                      //  $current_timestamp = time();                                       
                                        $target_timestamp =strtotime('+3 days', $gmt_timestamp); // Replace this with your target timestamp
                                        ?>
                                        <div id="countdown"></div>
                                        <?php

                                        $count = '<script>
                                        function updateCountdown() {
                                            var targetTimestamp = '.$target_timestamp.'; // Get the target timestamp from PHP
                                            var currentTimestamp = Math.floor(Date.now() / 1000); // Get the current timestamp in seconds

                                            var timeDiffSeconds = targetTimestamp - currentTimestamp; // Calculate the time difference in seconds

                                            if (timeDiffSeconds > 0) {
                                            var hours = Math.floor(timeDiffSeconds / 3600); // Calculate the remaining hours
                                            var minutes = Math.floor((timeDiffSeconds % 3600) / 60); // Calculate the remaining minutes
                                            var seconds = timeDiffSeconds % 60; // Calculate the remaining seconds

                                            var countdownText = "Available for FREE members in:<span> " + formatTime(hours, minutes, seconds)+"</span>";
                                            document.getElementById("countdown").innerHTML = countdownText;
                                            }

                                            setTimeout(updateCountdown, 1000); // Update the countdown every second
                                        }

                                        function formatTime(hours, minutes, seconds) {
                                            var formattedTime = hours.toString().padStart(2, "0") + ":" +
                                                                minutes.toString().padStart(2, "0") + ":" +
                                                                seconds.toString().padStart(2, "0");
                                            return formattedTime;
                                        }

                                        updateCountdown(); // Start the countdown immediately
                                        </script>';

                                        echo $count;
                                        ?>
                                        <div class=" pt-2 pb-4 text-center"><?php echo 'Posted' . ' ' . $date ?></div>
                                        <?php

                                       //	echo $html = 'Available for FREE members in: <span class="time-counter counts">'
                                       //	 .date("M j, Y G:i:s", strtotime('+3 days', $gmt_timestamp) ).'</span> ';
                                    }
                                }else{
                                    ?>
                                     <h2 class="text-black text-center text-base	"><?php
                                    echo $html= '<a class="text-blue-600 " href="'.get_permalink().'" title="See full product details for '.get_the_title().'">'.get_the_title().'</a>';
                                    ?>
                                    </h2>
                                <div class=" pt-2 pb-4 text-center"><?php echo 'Posted' . ' ' . $date ?></div>
                                <?php
                                }
                            }
                            else{
                            ?>
                                <div class=" pt-2 pb-4 text-center"><?php echo 'Posted' . ' ' . $date ?></div>
                                <?php
                            }
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
                                        <!-- <img draggable="false" role="img" class="emoji" alt="🇺🇸"
                                             src="https://s.w.org/images/core/emoji/14.0.0/svg/1f1fa-1f1f8.svg"> -->
                                             <span class="flag-icon flag-icon-US"></span>
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
                    
                    
                    if ($query->max_num_pages > 1) {
                        $base_url = strtok($_SERVER["REQUEST_URI"], '?');
                        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                        echo '<div class="pagination">';
                        echo paginate_links(array(
                           // 'base' =>$base_url . '%_%', 'format' => '/page/%#%', 
                            'current' => $paged, 'total' => $query->max_num_pages));
                        echo   '</div>';
                      
           }    
                }
                wp_reset_postdata();
            }else{


                
                
                $args = array('post_type' => 'product', 'posts_per_page' => 30, 'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1);
                $query = new WP_Query($args);
                $count = $query->found_posts;
               // $current_user = wp_get_current_user();
               // $userlevel = $current_user->membership_level->name;
               
?>
 <!-- ****************sort section **************** -->
 <div class="b-product-roll-top mx-auto px-4 my-6 lg:w-3/4 relative grid grid-cols-2">
        <?php
        $selected_sorting_option = "";
        if (isset($_GET['sorting'])) $selected_sorting_option = trim($_GET['sorting']);
        ?>
        <div class="b-product-roll-top__sort  ">
            <select name="sorting" class="mafia_sorting h-[30px]" data-id="sorting">
                <option value="date">Sort By:</option>
                <option value="orders"
                    <?php echo $selected_sorting_option == "orders" ? "selected" : ""; ?> >Most Orders
                </option>
                <option value="engagement"
                    <?php echo $selected_sorting_option == "engagement" ? "selected" : ""; ?> >Highest Engagement
                </option>
                <option value="selling_price"
                    <?php echo $selected_sorting_option == "selling_price" ? "selected" : ""; ?> >Selling Price: Most
                    Expensive
                </option>
                <option value="selling_price_asc"
                    <?php echo $selected_sorting_option == "selling_price_asc" ? "selected" : ""; ?> >Selling Price:
                    Cheapest
                </option>
                <option value="profit_margin"
                    <?php echo $selected_sorting_option == "profit_margin" ? "selected" : ""; ?> >Highest Profit Margins
                </option>
            </select>
        </div>
        <div id ="ctr" class="b-product-roll-top__count"><?php echo $count; ?> Products found</div>
    </div>
    <!-- ****************sort section **************** -->
   

    <section id="zz" class="container sm:max-w-full max-w-full mx-auto px-4 my-6 md:w-3/4 py-9">
        <div class="product-row grid md:grid-cols-2 lg:grid-cols-3 sm :grid-cols-1 gap-4 ">
<?php
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
                        $product_cost_china = get_minimum_cost([$aliexpress_china_cost]);
            
                        // US costs
                        $aliexpress_us_cost = get_field('product_cost_aliexpress_us');
                        $amazon_cost = get_field('product_cost_amazon');
                        $ebay_cost = get_field('product_cost_ebay');
                        $product_cost_us = get_minimum_cost([$aliexpress_us_cost, $amazon_cost, $ebay_cost]);

                        $profit_margin = get_field('profit_margin');
                        $profit_margin_us = get_field('profit_margin_us');
                        $selling = get_field('selling_price');

                        $product_categories = get_the_terms( get_the_ID(), 'category' );
                        $product_types = get_the_terms( get_the_ID(), 'product_type' );

                        ?>
                        <!-- to -->
                       <div class="prodcuts-card bg-white rounded-lg p-4 relative">
                            <div class="price absolute right-4">
                            <div
                                    class="fl-profit bg-black font-lato text-gray-300 rounded-lg px-2 py-1 text-sm max-w-fit ml-auto">
                                    <span 
                            class="b-tooltip__value js-shipping-from-switchable js-currency-convertible text-white"
                            data-other-option-usd-base="<?php echo $shipping_from == "China" ? $profit_margin_us : $profit_margin ?>"
                            data-usd-base="<?php echo $shipping_from == "China" ? $profit_margin : $profit_margin_us ?>"
                            data-other-option="<?php echo mafia_format_acf_price($shipping_from == "China" ? $profit_margin_us : $profit_margin)?>">
                            <?php echo  mafia_format_acf_price($shipping_from == "China" ? $profit_margin : $profit_margin_us) ?></span>Profit
                            <div class='b-tooltip' style="display :none;">
                            <div class='b-tooltip__line'>
                             <span 
                            class='b-tooltip__value js-currency-convertible' 
                            data-usd-base='<?php echo $selling_price ?>'>
                                <?php echo mafia_format_acf_price($selling_price)?>
                          </span>
                        <span class='b-tooltip__label'>Selling Price</span>
                      </div>
                    <div class='b-tooltip__line'>
                        <span 
                            class='b-tooltip__value js-shipping-from-switchable js-currency-convertible' 
                            data-other-option-usd-base='<?php echo ($shipping_from == "China" ? $product_cost_us : $product_cost_china) ?>'
                            data-usd-base='<?php ($shipping_from == "China" ? $product_cost_china : $product_cost_us)?>'
                            data-other-option='<?php echo mafia_format_acf_price($shipping_from == "China" ? $product_cost_us : $product_cost_china)?>'>
                            <?php echo  mafia_format_acf_price($shipping_from == "China" ? $product_cost_china : $product_cost_us)?>
                        </span>
                        <span class='b-tooltip__label'> Product Cost</span>
                    </div>
                </div>
                    </div>
                        </div>
                        <!-- added -->
                             <div id="pimg" class="product_img m-auto">
                                <?php
                                // echo $thumbnail; 
                                $html='';
                                
                                    if( $userlevel != 'Free' ) {
                                         echo $thumbnail; 
                                    }
                                    if( $userlevel == 'Free' && $show_avail == false ) {
                                        if( $specProd == '' && $untapProd == '') {
                                           // echo $thumbnail; 
                                                $post_date = get_the_date('Y-m-d', get_the_ID());
                                                $post_date_timestamp = strtotime($post_date);
                                                
                                                // Calculate the timestamp for 3 days ago
                                                $three_days_ago_timestamp = strtotime('-3 days');
                                                
                                                // Check if the post was published less than 3 days ago
                                                if ($post_date_timestamp > $three_days_ago_timestamp) {
                                                    // The post was published less than 3 days ago
                                                     echo  $html = '<img id="p-img" width="100" alt="" itemprop="image" loading="lazy" src="https://www.productmafia.com/wp-content/uploads/2022/12/locked-product.png" style="
                                                     height: 255px;
                                                     object-fit: cover;
                                                     width: calc(100% - 0px) !important;
                                      ">';
                                                }
                                                else{
                                                     echo $thumbnail; 
                                                }
                                            
                                        }else{
                                          echo  $html = '<img id="p-img" width="100" alt="" itemprop="image" loading="lazy" src="https://www.productmafia.com/wp-content/uploads/2022/12/locked-product.png" style="
                                          height: 255px;
                                            object-fit: cover;
                                            width: calc(100% - 0px) !important;
                                      "><a class="pre" href="https://productmafia.staging.wpmudev.host/membership/checkout/?level=9">PREMIUM</a>';
                                        }
                                    }
                                    if( $userlevel == 'Free' && $show_avail == true ){
                                       echo $html = '<img id="p-img" width="100" alt="" itemprop="image" loading="lazy" src="https://www.productmafia.com/wp-content/uploads/2022/12/locked-product.png" style="
                                       height: 255px;
                                        object-fit: cover;
                                        width: calc(100% - 0px) !important;
                                   "><a class="pre href="https://productmafia.staging.wpmudev.host/membership/checkout/?level=9"">PREMIUM</a>';
                                    }
                                
                                 ?>
                            </div>
                            <?php
                            if( $userlevel == 'Free' && $show_avail == false ) {
                                if( $specProd == '' && $untapProd == '') {
                                // echo $thumbnail; 
                                        $post_date = get_the_date('Y-m-d', get_the_ID());
                                        $post_date_timestamp = strtotime($post_date);
                                        
                                        // Calculate the timestamp for 3 days ago
                                        $three_days_ago_timestamp = strtotime('-3 days');
                                        
                                        // Check if the post was published less than 3 days ago
                                        if ($post_date_timestamp > $three_days_ago_timestamp) {
                                            // The post was published less than 3 days ago    
                                        }
                                        else{
                                            echo $heart= '<div style="float: right;" data-product-id="'.get_the_ID().'" class="saveProduct product-save-heart"><i class="fa fa-heart-o"></i></div>';
                                            }

                                        }
                                    }
                                            ?>
                          <div class=" ">
                                <h2 class="text-black text-center text-base	">
                               <?php 
                                if( get_field('untapped_product') ) {
                                if( $userlevel == 'Pro' || $userlevel == 'Pro (Annual)' ) {
                  echo  $htmll = '<a class="text-blue-600 " href="'.get_permalink().'" title="See full product details for '.get_the_title().'">'.get_the_title().'</a>';
                } else {
                  echo  $htmlll = '<a class="text-black-600" href="https://productmafia.staging.wpmudev.host/membership/checkout/?level=9" title="Pro Members Only">Pro Members Only</a>';
              }
                               }
                elseif ( get_field('special_product') ) {
                    if( $userlevel == 'Free' ) {
                                             
                      echo  $html = '<a class="text-black-600" href="https://productmafia.staging.wpmudev.host/membership/checkout/?level=9" title="Pro Members Only">Pro Members Only</a>';
    
                    } 
                    else {
                        
                       echo $html = '<a class="text-blue-600 " href="'.get_permalink().'" title="See full product details for '.get_the_title().'">'.get_the_title().'</a>';
                    }
                } 
                else {
                    if( $userlevel == 'Free' && $show_avail == true ) {
                        
                       echo  $html = '<a class="text-blue-600 " href="https://productmafia.staging.wpmudev.host/membership/checkout/?level=9" title="Pro Members Only">Upgrade for $1</a>';
    
                    } else {
                        $post_date = get_the_date('Y-m-d', get_the_ID());
                                    $post_date_timestamp = strtotime($post_date);
                                    $gmt_timestamp = get_post_time('U', true, $post_id);
                                    // Calculate the timestamp for 3 days ago
                                    $three_days_ago_timestamp = strtotime('-3 days');
                                    
                                    // Check if the post was published less than 3 days ago
                                    if ($post_date_timestamp > $three_days_ago_timestamp) {}
                                    else{
                                        
                        //hjh
                       echo $html= '<a class="text-blue-600 " href="'.get_permalink().'" title="See full product details for '.get_the_title().'">'.get_the_title().'</a>';
                    
                                    }
                                }
            
                            }
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
                                    if ($post_date_timestamp > $three_days_ago_timestamp) {
                                        if( $userlevel == 'Free' && $show_avail == false ) {
                                            if( $specProd == '' && $untapProd == '') {
                                        // The post was published less than 3 days ago
                                        $gmt_timestamp = get_post_time('U', true, $post_id);
                                      //  $current_timestamp = time();                                       
                                        $target_timestamp =strtotime('+3 days', $gmt_timestamp); // Replace this with your target timestamp
                                        ?>
                                        <div id="countdown"></div>
                                        <?php

                                        $count = '<script>
                                        function updateCountdown() {
                                            var targetTimestamp = '.$target_timestamp.'; // Get the target timestamp from PHP
                                            var currentTimestamp = Math.floor(Date.now() / 1000); // Get the current timestamp in seconds

                                            var timeDiffSeconds = targetTimestamp - currentTimestamp; // Calculate the time difference in seconds

                                            if (timeDiffSeconds > 0) {
                                            var hours = Math.floor(timeDiffSeconds / 3600); // Calculate the remaining hours
                                            var minutes = Math.floor((timeDiffSeconds % 3600) / 60); // Calculate the remaining minutes
                                            var seconds = timeDiffSeconds % 60; // Calculate the remaining seconds

                                            var countdownText = "Available for FREE members in:<span> " + formatTime(hours, minutes, seconds)+"</span>";
                                            document.getElementById("countdown").innerHTML = countdownText;
                                            }

                                            setTimeout(updateCountdown, 1000); // Update the countdown every second
                                        }

                                        function formatTime(hours, minutes, seconds) {
                                            var formattedTime = hours.toString().padStart(2, "0") + ":" +
                                                                minutes.toString().padStart(2, "0") + ":" +
                                                                seconds.toString().padStart(2, "0");
                                            return formattedTime;
                                        }

                                        updateCountdown(); // Start the countdown immediately
                                        </script>';

                                        echo $count;
                                        ?>
                                        <div class=" pt-2 pb-4 text-center"><?php echo 'Posted' . ' ' . $date ?></div>
                                        <?php

                                       //	echo $html = 'Available for FREE members in: <span class="time-counter counts">'
                                       //	 .date("M j, Y G:i:s", strtotime('+3 days', $gmt_timestamp) ).'</span> ';
                                            }
                                        }else{
                                            ?>
                                             <h2 class="text-black text-center text-base	"><?php
                                            echo $html= '<a class="text-blue-600 " href="'.get_permalink().'" title="See full product details for '.get_the_title().'">'.get_the_title().'</a>';
                                            ?>
                                            </h2>
                                        <div class=" pt-2 pb-4 text-center"><?php echo 'Posted' . ' ' . $date ?></div>
                                        <?php
                                        }
                                    }
                                    else{
                                    ?>
                                        <div class=" pt-2 pb-4 text-center"><?php echo 'Posted' . ' ' . $date ?></div>
                                        <?php
                                    }
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
                                            echo 'US';
                                        } else {
                                            echo $countryName;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                    if ($query->max_num_pages > 1) {
                        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                        echo '<div class="pagination">';
                        echo paginate_links(array('base' => get_pagenum_link(1) . '%_%', 'format' => '/page/%#%', 'current' => $paged, 'total' => $query->max_num_pages));
                        echo '</div>';
                    }
                }
                wp_reset_postdata();
            }
            ?>
        </div>
    </section>
</div>
<?php
$nonce = wp_create_nonce("save_a_product");;
$ajaxLink = admin_url('admin-ajax.php?action=save_user_product&nonce='.$nonce);
$script = "<script type='text/javascript'>
            jQuery(document).ready(function($){
              $(document).on('click', '.saveProduct', function(e){
                let el = $(this);
                let trigger = 'save';
                if (el.hasClass('product-save-heart')) {
                  if (el.find('i.fa.fa-heart-o').length) {
                    trigger = 'remove';
                    el.html('<i class=\"fa fa-heart\"></i>');
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

echo $script;
get_footer();
$nonce = wp_create_nonce("save_a_product");;
$ajaxLink = admin_url('admin-ajax.php?action=save_user_product&nonce='.$nonce);
?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    jQuery(document).ready(function () {
        var $ = jQuery;
    //$("#js-currency-selector").prop("selectedIndex", 0);  
  $('.js-currency-convertible').text(function(_, text) {
    return text.replace('ZWL', 'USD');
  });

        $(function () {
            var methods = {
                resetCustomSelect: function ($el) {
                    var min = $el.data("min");
                    var max = $el.data("max");
                    this.setCustomSelectText($el, min, max);
                    $el.find(".b-custom-select__control").slider("values", [min, max]);
                    if ($el.data("initial-option-text") != undefined)
                        $el.find("option").text($el.data("initial-option-text"));
                },
                setCustomSelectText: function ($el, lower, upper) {
                    var max = $el.data("max");
                    $el.find(".b-custom-select__control-text").text("From " + lower + " to " + upper + (upper == max ? "+" : ""));
                },
                resetSelect: function ($el) {
                    $el.val("");
                },
                resetDateSelect: function ($el) {
                    var today = new Date();
                    $el.data('daterangepicker').setStartDate(today);
                    $el.data('daterangepicker').setEndDate(today);
                    if ($el.data("initial-option-text") != undefined)
                        $el.find("option").text($el.data("initial-option-text"));
                },

                setAppliedFilterBoxValuesForSlider: function ($el, $customSelectEl, lowerValue, upperValue, min, max) {
                    var formatLargeQuantity = function (quantity) {
                        if (quantity >= 1000000)
                            return (Math.round(quantity / 100000) / 10) + 'M'; // round to single decimal
                        if (quantity >= 1000)
                            return Math.floor(quantity / 1000) + 'K';
                        return quantity;
                    };
                    $el.find(".b-applied-filter-box__lower-value").text(formatLargeQuantity(lowerValue));
                    $el.find(".b-applied-filter-box__upper-value").text(upperValue == max ? "+" : " to " + formatLargeQuantity(upperValue));
                    var $option = $customSelectEl.find("option");
                    var disabled = (lowerValue == min && upperValue == max);
                    if (disabled) {
                        $el.hide();
                        if ($customSelectEl.data("initial-option-text") != undefined)
                            $option.text($customSelectEl.data("initial-option-text"));
                    } else {
                        $el.show();
                        if ($customSelectEl.data("initial-option-text") == undefined)
                            $customSelectEl.attr("data-initial-option-text", $option.text())
                        $option.text($el.text());
                    }
                },
                setAppliedFilterBoxValuesForDateSelect: function ($el, $customSelectEl, from, to) {
                    var fromText = from;
                    var toText = (from == to ? "" : " to " + to);
                    $el.find(".b-applied-filter-box__lower-value").text(fromText);
                    $el.find(".b-applied-filter-box__upper-value").text(toText);
                    $el.show();
                    var $option = $customSelectEl.find("option");
                    if ($customSelectEl.data("initial-option-text") == undefined)
                        $customSelectEl.attr("data-initial-option-text", $option.text())
                    $option.text(fromText + toText);
                },
                setAppliedFilterBoxValueForSelect: function ($el, newText, newVal) {
                    $el.find(".b-applied-filter-box__value").text(newText);
                    if (newVal == "" || newVal == undefined || newVal == ".category-all") {
                        $el.hide();
                    } else {
                        $el.show();
                    }
                },
                updateAppliedFiltersRowVisibility: function ($row) {
                    var anyAppliedFilters = false;
                    $row.children().each(function () {
                        if ($(this).css("display") != 'none')
                            anyAppliedFilters = true;
                    });
                    var displayProp = anyAppliedFilters ? "flex" : "none";
                    $row.css("display", displayProp);
                    $row.prev().css("display", displayProp);
                },

                updateHiddenFormFieldsForSlider: function ($parentEl, lower, upper) {
                    for (var i = 0; i <= 1; i++) {
                        var param = (i == 0 ? lower : upper);
                        var $field = $parentEl.children().eq(i);
                        $field.val(param);
                        if (param == "")
                            $field.attr("disabled", "disabled");
                        else
                            $field.removeAttr("disabled");
                    }
                },
                updateHiddenFormFieldsForDateSelect: function ($parentEl, from, to) {
                    for (var i = 0; i <= 1; i++) {
                        var param = (i == 0 ? from : to);
                        var $field = $parentEl.children().eq(i);
                        $field.val(param);
                        if (param == "")
                            $field.attr("disabled", "disabled");
                        else
                            $field.removeAttr("disabled");
                    }
                },
                updateHiddenFormFieldForSelect: function ($el, newVal) {
                    $el.val(newVal);
                    if (newVal == "")
                        $el.attr("disabled", "disabled");
                    else
                        $el.removeAttr("disabled");
                }
            }

            $(document).mousedown(function () {
                $(".b-custom-select__dropdown").hide();
            });

            $(".b-custom-select").each(function () {
                var $this = $(this);
                var $control = $this.find(".b-custom-select__control");
                var thisId = $this.data("id");
                var $appliedFilterBox = $this.closest(".b-filters").find(`.b-applied-filter-box[data-id=${thisId}]`);
                var $appliedFiltersRow = $this.closest(".b-filters").find(".b-filters__applied-row");
                var $hiddenFormFieldsParent = $this.closest(".b-filters").find(".b-filters__form").find(`div[data-id=${thisId}]`);
                var min = $this.data("min");
                var max = $this.data("max");
                var lower = (($this.data("lower") != undefined && $this.data("lower") != "") ? $this.data("lower") : min);
                var upper = (($this.data("upper") != undefined && $this.data("upper") != "") ? $this.data("upper") : max);

                // Slider
                $control.slider({
                    range: true,
                    min: min,
                    max: max,
                    values: [lower, upper],
                    slide: function (event, ui) {
                        var newMin = ui.values[0], newMax = ui.values[1];
                        methods.setCustomSelectText($this, newMin, newMax);
                        methods.setAppliedFilterBoxValuesForSlider($appliedFilterBox, $this, newMin, newMax, min, max);
                        methods.updateAppliedFiltersRowVisibility($appliedFiltersRow);
                        methods.updateHiddenFormFieldsForSlider($hiddenFormFieldsParent, newMin != min ? newMin : "", newMax != max ? newMax : "");
                    }
                });
                methods.setCustomSelectText($this, lower, upper);
                methods.setAppliedFilterBoxValuesForSlider($appliedFilterBox, $this, lower, upper, min, max);
                methods.updateAppliedFiltersRowVisibility($appliedFiltersRow);
                methods.updateHiddenFormFieldsForSlider($hiddenFormFieldsParent, lower != min ? lower : "", upper != max ? upper : "");

                // Open dropdown
                var $dropdown = $this.find(".b-custom-select__dropdown");
                $this.mousedown(function (event) {
                    var isClosed = ($dropdown.css("display") == "none");
                    $(".b-custom-select__dropdown").hide();
                    $(".daterangepicker").hide();
                    if (isClosed)
                        $this.find(".b-custom-select__dropdown").show();
                    event.stopPropagation();
                });
                $dropdown.mousedown(function (event) {
                    event.stopPropagation();
                });
            });

            $(".b-applied-filter-box").each(function () {
                var $this = $(this);
                var thisId = $this.data("id");
                var $appliedFiltersRow = $this.closest(".b-filters").find(".b-filters__applied-row");

                // Only one of the below selectors will be not empty
                var $customSelect = $this.closest(".b-filters").find(`.b-custom-select[data-id=${thisId}]`),
                    $dateSelect = $this.closest(".b-filters").find(`.b-date-select[data-id=${thisId}]`),
                    $select = $this.closest(".b-filters").find(`.b-select[data-id=${thisId}]`);

                $this.click(function () {
                    $this.hide();
                    methods.updateAppliedFiltersRowVisibility($appliedFiltersRow);

                    if ($customSelect.length != 0) {
                        methods.resetCustomSelect($customSelect);
                        methods.updateHiddenFormFieldsForSlider($this.closest(".b-filters").find(".b-filters__form").find(`div[data-id=${thisId}]`), "", "");
                    } else if ($dateSelect.length != 0) {
                        methods.resetDateSelect($dateSelect);
                        methods.updateHiddenFormFieldsForDateSelect($this.closest(".b-filters").find(".b-filters__form").find(`div[data-id=${thisId}]`), "", "");
                    } else if ($select.length != 0) {
                        methods.resetSelect($select);
                        methods.updateHiddenFormFieldForSelect($this.closest(".b-filters").find(".b-filters__form").find(`[data-id=${thisId}]`), "");
                    }
                });
            });

            jQuery(".b-select").each(function () {

                var $this = $(this);

                var thisId = $this.data("id");
                console.log(thisId);
                var $appliedFilterBox = $this.closest(".b-filters").find(`.b-applied-filter-box[data-id=${thisId}]`);
                var $appliedFiltersRow = $this.closest(".b-filters").find(".b-filters__applied-row");
                var $hiddenFormField = $this.closest(".b-filters").find(".b-filters__form").find(`input[data-id=${thisId}]`);
                //console.log($appliedFilterBox);

                var handleChange = function () {

                    var val = $this.val();
                    var text = $this.find("option:selected").text();

                   // console.log(text);

                    methods.setAppliedFilterBoxValueForSelect($appliedFilterBox, text, val);
                    methods.updateAppliedFiltersRowVisibility($appliedFiltersRow);
                    methods.updateHiddenFormFieldForSelect($hiddenFormField, val);
                };
                $this.change(handleChange);
                handleChange();
            });

            $(".b-date-select").each(function () {
                var $this = $(this);
                var thisId = $this.data("id");
                var $appliedFilterBox = $this.closest(".b-filters").find(`.b-applied-filter-box[data-id=${thisId}]`);
                var $appliedFiltersRow = $this.closest(".b-filters").find(".b-filters__applied-row");
                var $hiddenFormField = $this.closest(".b-filters").find(".b-filters__form").find(`div[data-id=${thisId}]`);
                var handleChange = function (from, to) {
                    methods.setAppliedFilterBoxValuesForDateSelect($appliedFilterBox, $this, from, to);
                    methods.updateAppliedFiltersRowVisibility($appliedFiltersRow);
                    methods.updateHiddenFormFieldsForDateSelect($hiddenFormField, from, to);
                };
                
                $this.daterangepicker({
                    autoApply: true,
                    maxDate: new Date()
                });
                $this.on('apply.daterangepicker', function (ev, picker) {
                    var from = picker.startDate.format('YYYY-MM-DD');
                    var to = picker.endDate.format('YYYY-MM-DD');
                    handleChange(from, to);
                });
                var from = $this.data("from");
                var to = $this.data("to");
                if (from != "" && to != "") {
                    $this.data('daterangepicker').setStartDate(new Date(from));
                    $this.data('daterangepicker').setEndDate(new Date(to));
                    handleChange(from, to);
                }
            });

            $(".mafia_sorting").each(function () {
                var $this = $(this);
                var thisId = $this.data("id");
                var $hiddenFormField = $(".b-filters").find(".b-filters__form").find(`input[data-id=${thisId}]`);
                var handleChange = function () {
                    var val = $this.val();
                    methods.updateHiddenFormFieldForSelect($hiddenFormField, val);
                };
                $this.change(handleChange);
                handleChange();
            });

            $(".filters-toggle").click(function () {
                var $this = $(this);
                $this.toggleClass("state-shown").toggleClass("state-hidden");
                $(".b-filters").toggleClass("b-filters--shown").toggleClass("b-filters--hidden");
            });

        });


                // Shipping from switch
                $(function(){

                $("#js-ship-from-switch").change(function(){
                    var $this = $(this);
                    var $option = $this.find("option:selected");
                    var selectedOption = $option.val();
                    console.log(selectedOption);

                    document.cookie = `shipping_from=${selectedOption};  expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/`;

                    $(".js-shipping-from-switchable").each(function(){
                        var $this = $(this);
                        var otherOption = $this.attr("data-other-option");
                        $this.attr("data-other-option", $this.text());
                        $this.text(otherOption);

                        var otherOptionUsdBase = $this.attr("data-other-option-usd-base");
                        $this.attr("data-other-option-usd-base", $this.attr("data-usd-base"));
                        $this.attr("data-usd-base", otherOptionUsdBase);
                    });
                });

                });





                        // Currency selector
                        $(function(){

                        var formatPrice = function(price, currency, currencySymbol) {
                            if (isNaN(price) || price === "") return "NA";
                            var formatted = ( price < 1000 ? 
                                price.toLocaleString('en-US', {maximumFractionDigits: 2, minimumFractionDigits: 2}) : 
                                price.toLocaleString('en-US', {maximumFractionDigits: 0}) );
                            return currencySymbol + formatted + " " + currency;
                        }




                        $("#js-currency-selector").change(function(){
                            
                            var $this = $(this);
                            var $option = $this.find("option:selected");

                            var $prevOption = $this.find("option.js-text-changed");
                            $prevOption.text($prevOption.text().replace("Currency: ", ""));
                            $prevOption.removeClass("js-text-changed");
                            $option.text("Currency: " + $option.text());
                            $option.addClass("js-text-changed");

                            var currencyCode = $option.attr("data-currency-code");
                            var exchangeRate = parseFloat($option.attr("data-exchange-rate"));
                            var currencySymbol = $option.attr("data-symbol");
                            

                            document.cookie = `currency=${currencyCode};  expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/`;
                            document.cookie = `exchange_rate=${exchangeRate};  expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/`;
                            document.cookie = `currency_symbol=${currencySymbol};  expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/`;

                            $(".js-currency-convertible").each(function(){
                                var $this = $(this);
                                var noCurrencyCode = $this.hasClass("js-no-currency-code");
                                var onlyCurrencyCode = $this.hasClass("js-only-currency-code");
                                var currencyCodeOverride = noCurrencyCode ? "" : currencyCode;
                                var converted = parseFloat($this.attr("data-usd-base")) * exchangeRate;
                                $this.text(onlyCurrencyCode ? currencyCodeOverride : formatPrice(converted, currencyCodeOverride, currencySymbol));
                                var otherOptionUsdBase = $this.attr("data-other-option-usd-base");
                                if (otherOptionUsdBase !== undefined) {
                                    var otherOptionConverted = parseFloat(otherOptionUsdBase) * exchangeRate;
                                    $this.attr("data-other-option", formatPrice(otherOptionConverted, currencyCodeOverride, currencySymbol));
                                }
                            });
                        });

                    });




                        //set cookie 


                        (function($){
                        function setCookie(key, value) {
                            var expires = new Date();
                            expires.setTime(expires.getTime() + (364 * 24 * 60 * 60 * 1000));
                            document.cookie = key + '=' + value + ';expires=' + expires.toUTCString() + '; path=/';  
                        }

                        function getCookie(key) {
                            var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
                            return keyValue ? keyValue[2] : null;
                        }

}(jQuery));

jQuery(".b-custom-select").mousedown(function () {
                            var dateRange = jQuery('#date_posted').text().trim();
                            if (dateRange !== '') {
                                dateRange = dateRange.split(' to ');
                                var startDate = dateRange[0];
                                var endDate = dateRange[1];
                                console.log('Start Date:', startDate);
                                console.log('End Date:', endDate);
                                jQuery('#dropdown-4-min').val(startDate);
                                jQuery('#dropdown-4-max').val(endDate);
                            } else {
                                console.log('No date range selected.');
                            }
                            });

                            
                                jQuery(".b-custom-select").mousedown(function () {
                            // Loop through each element with class b-custom-select__control-text
                            jQuery('.b-custom-select__control-text').each(function() {
                                    // Get the index of the changed dropdown
                                    var index = jQuery('.b-custom-select__control-text').index(this);

                                    // Get the text content of the element
                                    var rangeText = jQuery(this).text();

                                    // Extract the minimum and maximum values from the text
                                    var min = rangeText.match(/From (\d+) to/)[1];
                                    var max = rangeText.match(/to (\d+)/)[1];

                                    // Convert the values to integers
                                    min = parseInt(min);
                                    max = parseInt(max);
                                    // Set the min and max values to hidden input fields with the dropdown name
                                    jQuery('#dropdown-' + index + '-min').val(min);
                                    jQuery('#dropdown-' + index + '-max').val(max);
                                    });
                                });          
                            });  
     </script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>