<?php
/**
 * eAngel.me Plugin - Views
 * 
 */

/**
 * Display editing form for the settings
 *
 * @return void
 */
function eangel_settings_page() {
    global $eangel_options; // The global var from eangel.php
    
    ?>
    <div class="wrap">
    
        <h2>eAngel (Proofreading) Plugin Options</h2>
        <form method="post" action="options.php">
            <?php settings_fields('eangel_settings_group'); ?>
            <table class="form-table">
               
               <tr valign="top">
                    <th scope="row"><label for="eangel_settings[email]">Your email please:</label></th>
                    <td><input name="eangel_settings[email]" type="text" id="eangel_settings[email]" value="<?php echo $eangel_options['email']; ?>" class="regular-text" /></td>
	      </tr>
              <tr valign="top">
                    <th scope="row"><label for="eangel_settings[password]">Password (optional):</label></th>
                    <td><input name="eangel_settings[password]" type="password" id="eangel_settings[password]" value="<?php echo $eangel_options['password']; ?>" class="regular-text" /></td>
	      </tr>

            </table><!-- .form-table -->

            <input type="submit" class="button-primary" name="Submit" value="Save Changes" />
        </form>
    </div>

    <?php
}


/**
 * Builds the eAngel toolbox controls, as side bar for post and page
 *
 * @return void
 */
function eangel_toolbox_builder($post) {
    global $eangel_options;
       ?>  
        <div>
            <p>Click below to submit this page/post for review, using the account: <?php echo $eangel_options['email']; ?></p>
            <input name="send" type="submit" class="button" id="eangel-send" value="Send For Proofreading" />
            <p><a href="<?php echo get_bloginfo('url') ?>/wp-admin/options-general.php?page=eangel-settings-config">Click Here</a> to change the settings of your account.
            </p>
        </div>
        <div id="eangel-send-details"></div>
        
        
    <script type="text/javascript" >

        jQuery(document).ready(function($) {
              $('#eangel-send').click(function(){
		var data = {
			action: 'eangel_send',
			wordcount: 5,
                        postId: $('#post_ID').val(),
			time: function() {
				var dt = new Date();
				return dt.getTime();
			}
		};
		
		$('#eangel-send-details').html('<p>Please wait...</p>');
		$.post(ajaxurl, data, function(response) {
			$('#eangel-send-details').html(response);			
			return false;
		});

		return false;
            });


        });
    </script>
    
       <?php     
} // eangel_toolbox_builder


?>