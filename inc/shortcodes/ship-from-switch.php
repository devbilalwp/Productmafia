<?php

function mafia_ship_from_switch() {
    global $shipping_from;
    $flag_class = ($shipping_from == "China" ? "cn" : "us");
    
    ob_start();
    ?>

    <select class="b-select" id="js-ship-from-switch">
        <option value="China" <?php echo ($shipping_from == "China" ? "selected" : ""); ?>>
            Shipping from: China</option>
        <option value="US" <?php echo ($shipping_from == "US" ? "selected" : ""); ?>>
            Shipping from: US</option>
    </select>

    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}
add_shortcode('mafia_ship_from_switch', 'mafia_ship_from_switch');