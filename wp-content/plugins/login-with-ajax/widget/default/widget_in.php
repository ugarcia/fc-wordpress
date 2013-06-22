<?php 
/*
 * This is the page users will see logged in. 
 * You can edit this, but for upgrade safety you should copy and modify this file into your template folder.
 * The location from within your template folder is plugins/login-with-ajax/ (create these directories if they don't exist)
*/
?>
<div class="lwa">
	<?php 
		global $current_user;
		get_currentuserinfo();
	?>
	<span class="lwa-title-sub" style="display:none"><?php echo __( 'Hi', 'login-with-ajax' ) . " " . $current_user->display_name  ?></span>
	<table>
		<tr>
			<td class="avatar" class="lwa-avatar">
				<?php echo get_avatar( $current_user->ID, $size = '50' );  ?>
			</td>
			<td class="lwa-info">
                <ul>
				<?php
					//Admin URL
					if ( $lwa_data['profile_link'] == '1' ) {
						if( function_exists('bp_loggedin_user_link') ){
							?>
							<li><a href="<?php bp_loggedin_user_link(); ?>"><?php esc_html_e('Profile','login-with-ajax') ?></a></li>
							<?php	
						}else{
							?>
                    <li><a href="<?php echo trailingslashit(get_admin_url()).'profile.php'; ?>"><?php esc_html_e('Profile','login-with-ajax') ?></a></li>
							<?php	
						}
					}
					//Logout URL
					?>
                    <li><a id="wp-logout" href="<?php echo wp_logout_url() ?>"><?php esc_html_e( 'Log Out' ,'login-with-ajax') ?></a></li>
					<?php
					//Blog Admin
					if( current_user_can('list_users') ) {
						?>
                    <li><a href="<?php echo get_admin_url(); ?>"><?php esc_html_e("Blog Admin", 'login-with-ajax'); ?></a></li>
						<?php
					}
				?>
                </ul>
			</td>
		</tr>
	</table>
</div>