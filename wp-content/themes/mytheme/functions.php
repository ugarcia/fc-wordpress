<?php
/**
 * Created by IntelliJ IDEA.
 * User: unai
 * Date: 19/06/13
 * Time: 14:43
 * To change this template use File | Settings | File Templates.
 */

    // Custom theme hook for displaying additional Title
    function mytheme_cryout_branding_hook() {
        ?>
            <div id='websites_link'><a href="/websites">Web Sites</a></div>
            <div class='headerTitle desktop-only'>
                <h1><?php bloginfo('name'); ?></h1>
            </div>
        <?php
    } // END: mytheme_cryout_branding_hook
    add_action('cryout_branding_hook','mytheme_cryout_branding_hook');


    // Hide wp-admin toolbar if not admin
    function remove_admin_bar() {
        if (!current_user_can('administrator') && !is_admin()) {
            show_admin_bar(false);
        }
    } // END: remove_admin_bar
    add_action('after_setup_theme', 'remove_admin_bar');


    //Remove Media Library Tab (if not admin)
    add_action('pre_get_posts','ml_restrict_media_library');
    function ml_restrict_media_library( $wp_query_obj ) {

        global $current_user, $pagenow;

        if( !is_a( $current_user, 'WP_User') )
            return;

        if( 'admin-ajax.php' != $pagenow || $_REQUEST['action'] != 'query-attachments' )
            return;

        if( !current_user_can('manage_media_library') )
            $wp_query_obj->set('author', $current_user->ID );

        return;
    }

?>