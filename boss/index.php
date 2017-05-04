<?php
define( 'WP_USE_THEMES', false );
define( 'COOKIE_DOMAIN', false );
define( 'DISABLE_WP_CRON', true );
require("../../liceo/wp-load.php");
if ( is_user_logged_in() ) {
    $user = wp_get_current_user();
} else {
    $creds                  = array();
    // If you're not logged in, you should display a form or something
    // Use the submited information to populate the user_login & user_password
    $creds['user_login']    = "";
    $creds['user_password'] = "";
    $creds['remember']      = true;
    $user                   = wp_signon( $creds, false );
    if ( is_wp_error( $user ) ) {
        echo $user->get_error_message();
    } else {
        wp_set_auth_cookie( $user->ID, true );
    }
}
if ( !is_wp_error( $user ) ) {
    // Success! We're logged in! Now let's test against EDD's purchase of my "service."
    if ( edd_has_user_purchased( $user->ID, '294', NULL ) ) {
        echo "Purchased the Services and is active.";
    } else {
        echo "Not Purchased";
    }
}
?>