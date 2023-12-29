<?php

//define('ALTERNATE_WP_CRON', true);

function mafia_add_weekly( $schedules ) {
    // add a 'weekly' schedule to the existing set
    $schedules['weekly'] = array(
        'interval' => 604800,
        'display' => __('Once Weekly')
    );
    return $schedules;
}
add_filter( 'cron_schedules', 'mafia_add_weekly' ); 

add_action( 'mafia_exchange_rates_cron_hook', 'mafia_exchange_rates_cron_exec' );

if ( ! wp_next_scheduled( 'mafia_exchange_rates_cron_hook' ) ) {
    wp_schedule_event( time(), 'weekly', 'mafia_exchange_rates_cron_hook' );
}

function mafia_exchange_rates_cron_exec(){
    $resp = file_get_contents("https://api.exchangerate.host/latest?base=USD");

    update_option(
        "exchange_rates", [
            "cron_last_run" => time(),
            "data" => json_decode($resp, true),
        ]);
}

if (isset( $_GET["debug_cron"])) {
    dump_cron_option();
	exit;
}

if (isset( $_GET["debug_cron_trigger"])) {
	mafia_exchange_rates_cron_exec();
	echo '<h1>Manual cron complete</h1>';
    dump_cron_option();
	exit;
}

function dump_cron_option() {
	echo '<pre>';
    $option = get_option("exchange_rates");
    $option["cron_last_run"] = date('l jS \of F Y h:i:s A', $option["cron_last_run"]);
	var_dump($option);
	echo '</pre>';
}





