<?php

function mafia_filters($attr) {
    global $any_filters_applied;

    $is_mobile_section = !empty($attr["mobile_section"]);
    $is_preview_section = !empty($attr["preview_section"]);

    // Render only for appropriate section
    // if (wp_is_mobile() xor $is_mobile_section)
    //     return;

    $as_seen_on_options = ["EcomHunt", "Nichescraper", "Pexda", "Dropship-spy", "All"];
    $selected_as_seen_on_option = "";
    if(isset($_GET['as_seen_on']))
        $selected_as_seen_on_option = trim($_GET['as_seen_on']);

    $selected_p_t_option = "";
    if(isset($_GET['pr_type']))
        $selected_p_t_option = trim($_GET['pr_type']);

    $taxonomies = get_terms( array(
        'taxonomy' => 'category',
        'hide_empty' => false
    ) );

    $selected_c_option = "";
    if(isset($_GET['category']))
        $selected_c_option = $_GET['category'];

    ob_start();
    ?>

    <?php if(!$is_mobile_section): ?>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <?php endif; ?>

    <div class="b-filters
        <?php if($is_mobile_section) echo ' b-filters--mobile b-filters--shown '; ?>
        <?php if($is_preview_section) echo ' b-filters--preview '; ?>
        ">
        <div class="b-filters_border_1"></div>
        <div class="b-filters_border_2"></div>
        <div class="b-filters__grid">
            <div class="b-filters__applied-row-label">Applied Filters</div>

            <div class="b-filters__applied-row">
                <div class="b-applied-filter-box" data-id="top-country">
                    Top Country: <span class="b-applied-filter-box__value"></span>
                </div>
                <div class="b-applied-filter-box" data-id="product-type">
                    <span class="b-applied-filter-box__value"></span>
                </div>
                <div class="b-applied-filter-box" data-id="niche">
                    Niche: <span class="b-applied-filter-box__value"></span>
                </div>
                <div class="b-applied-filter-box" data-id="as-seen-on">
                    <span class="b-applied-filter-box__value"></span>
                </div>
                <div class="b-applied-filter-box" data-id="total-reactions">
                    Reactions: <span class="b-applied-filter-box__lower-value"></span><span class="b-applied-filter-box__upper-value"></span>
                </div>
                <div class="b-applied-filter-box" data-id="total-comments">
                    Comments: <span class="b-applied-filter-box__lower-value"></span><span class="b-applied-filter-box__upper-value"></span>
                </div>
                <div class="b-applied-filter-box" data-id="total-shares">
                    Shares: <span class="b-applied-filter-box__lower-value"></span><span class="b-applied-filter-box__upper-value"></span>
                </div>
                <div class="b-applied-filter-box" data-id="total-views">
                    Views: <span class="b-applied-filter-box__lower-value"></span><span class="b-applied-filter-box__upper-value"></span>
                </div>
                <div class="b-applied-filter-box" data-id="date-posted">
                    Date Posted: <span class="b-applied-filter-box__lower-value"></span><span class="b-applied-filter-box__upper-value"></span>
                </div>
            </div>

            <div class="b-filters__label-cell">Advanced:</div>
            <div class="b-filters__select-cell">
                <select data-id="top-country" class="b-select">
                    <option value="">Top Country</option>
                    <?php
                        include __DIR__.'/../static-data/countries-list.php';
                        $selected_country = !empty($_GET["top_country"]) ? $_GET["top_country"] : "";
                        foreach ($countries as $countryKey => $countryName) {
                            $selected = ($selected_country == $countryKey ? "selected" : "");
                            echo "<option value='$countryKey' $selected>$countryName</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="b-filters__select-cell">
                <select data-id="product-type" class="b-select">
                    <option data-type="all" value="" <?php echo $selected_p_t_option==""? "selected":""; ?> >All Product Types</option>
                    <option data-type="untpd-prod-inline" value="1138" <?php echo ($selected_p_t_option=="1138")? "selected":""; ?> >Untapped Products</option>
                    <option data-type="spcl-prod-inline" value="1139" <?php echo ($selected_p_t_option=="1139")? "selected":""; ?> >Premium Products</option>
                </select>
            </div>

            <div class="b-filters__select-cell">
                <?php if ( !empty($taxonomies) ) : ?>
                <select data-id="niche" class="b-select">
                    <!-- <option value=".category-all">All Niches</option> -->
                    <option value="">All Niches</option>
                    <?php foreach( $taxonomies as $category ) : ?>
                    <option data-cat="<?php echo esc_attr( $category->term_id ); ?>" value="<?php echo esc_attr( $category->term_id ); ?>" <?php echo $selected_c_option==$category->term_id? "selected":""; ?> ><?php echo esc_html( $category->name ); ?></option>
                    <?php endforeach; ?>
                </select>
                <?php endif; ?>
            </div>

            <div class="b-filters__select-cell">
                <select data-id="as-seen-on" class="b-select">
                    <option value="">Platform: Product Mafia</option>
                    <?php foreach( $as_seen_on_options as $option ) :
                        $slug = strtolower(str_replace(" ", "-", $option)); ?>
                    <option value="<?php echo esc_attr( $slug ); ?>" <?php echo $selected_as_seen_on_option==$slug ? "selected" : ""; ?> ><?php echo "Platform: ".esc_html( $option ); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="b-filters__label-cell">Engagement:</div>

            <div class="b-filters__select-cell">
                <div class="b-custom-select" data-id="total-reactions" data-min="0" data-max="10000000" data-lower="<?php echo $_GET["min_reactions"]; ?>" data-upper="<?php echo $_GET["max_reactions"]; ?>" >
                    <select class="b-custom-select__select" name="" >
                        <option value="">Total Reactions</option>
                    </select>
                    <div class="b-custom-select__overlay"></div>
                    <div class="b-custom-select__dropdown">
                        <div class="b-custom-select__control-text"></div>
                        <div class="b-custom-select__control"></div>
                    </div>
                </div>
            </div>

            <div class="b-filters__select-cell">
                <div class="b-custom-select" data-id="total-comments" data-min="0" data-max="50000" data-lower="<?php echo $_GET["min_comments"]; ?>" data-upper="<?php echo $_GET["max_comments"]; ?>" >
                    <select class="b-custom-select__select" name="" >
                        <option value="">Total Comments</option>
                    </select>
                    <div class="b-custom-select__overlay"></div>
                    <div class="b-custom-select__dropdown">
                        <div class="b-custom-select__control-text"></div>
                        <div class="b-custom-select__control"></div>
                    </div>
                </div>
            </div>

            <div class="b-filters__select-cell">
                <div class="b-custom-select" data-id="total-shares" data-min="0" data-max="1000000" data-lower="<?php echo $_GET["min_shares"]; ?>" data-upper="<?php echo $_GET["max_shares"]; ?>" >
                    <select class="b-custom-select__select" name="" >
                        <option value="">Total Shares</option>
                    </select>
                    <div class="b-custom-select__overlay"></div>
                    <div class="b-custom-select__dropdown">
                        <div class="b-custom-select__control-text"></div>
                        <div class="b-custom-select__control"></div>
                    </div>
                </div>
            </div>

            <div class="b-filters__select-cell">
                <div class="b-custom-select" data-id="total-views" data-min="0" data-max="10000000" data-lower="<?php echo $_GET["min_views"]; ?>" data-upper="<?php echo $_GET["max_views"]; ?>" >
                    <select class="b-custom-select__select" name="" >
                        <option value="">Total Views</option>
                    </select>
                    <div class="b-custom-select__overlay"></div>
                    <div class="b-custom-select__dropdown">
                        <div class="b-custom-select__control-text"></div>
                        <div class="b-custom-select__control"></div>
                    </div>
                </div>
            </div>

            <div class="b-filters__label-cell">Preferences:</div>
            <div class="b-filters__select-cell b-filters__date-select-cell">
                <div class="b-date-select" data-id="date-posted" data-from="<?php echo $_GET["date_posted_from"]; ?>" data-to="<?php echo $_GET["date_posted_to"]; ?>">
                    <select>
                        <option value="">Date Posted</option>
                    </select>
                    <div class="b-date-select__overlay"></div>
                </div>
            </div>
            <?php echo do_shortcode("[mafia_ship_from_switch]"); ?>
            <?php echo do_shortcode("[mafia_currency_selector]"); ?>

            <div class="b-filters__form">
                <?php
                    if (!$is_preview_section) {
                        global $wp;
                        $current_url = home_url( $wp->request );
                        // Remove paging from url
                        $form_url = preg_replace("/\/page\/\d+/", "", $current_url);
                    }
                    else
                        $form_url = home_url( "membership/checkout/?level=2" );
                ?>
                <form id="filter-pr" method="get" action="<?php echo $form_url; ?>">
                    <input type="submit" value="Filter Products">

                    <!-- Preserve search -->
                    <?php if(array_key_exists("text", $_GET)): ?>
                    <input type="hidden" value="<?php echo $_GET["text"]; ?>" name="text">
                    <?php endif; ?>

                    <input type="hidden" value="on" name="filtering">
                    <input type="hidden" data-id="top-country" name="top_country" value="" disabled>
                    <input type="hidden" data-id="product-type" name="pr_type" value="" disabled>
                    <input type="hidden" data-id="niche" name="category" value="" disabled>
                    <input type="hidden" data-id="as-seen-on" name="as_seen_on" value="" disabled>
                    <div data-id="total-reactions">
                        <input type="hidden" name="min_reactions" disabled>
                        <input type="hidden" name="max_reactions" disabled>
                    </div>
                    <div data-id="total-comments">
                        <input type="hidden" name="min_comments" disabled>
                        <input type="hidden" name="max_comments" disabled>
                    </div>
                    <div data-id="total-shares">
                        <input type="hidden" name="min_shares" disabled>
                        <input type="hidden" name="max_shares" disabled>
                    </div>
                    <div data-id="total-views">
                        <input type="hidden" name="min_views" disabled>
                        <input type="hidden" name="max_views" disabled>
                    </div>
                    <div data-id="date-posted">
                        <input type="hidden" name="date_posted_from" disabled>
                        <input type="hidden" name="date_posted_to" disabled>
                    </div>
                    <input type="hidden" data-id="sorting" class='filter_sorting' id="filter_sorting" name="sorting" value="" >
                </form>
            </div>

        </div>

    </div>

    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}

add_shortcode('mafia_filters', 'mafia_filters');