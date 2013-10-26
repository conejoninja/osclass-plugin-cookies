<?php

if(Params::getParam('plugin_action')=='done') {
    osc_set_preference('analytics_msg', Params::getParam("analytics_msg"), 'cookie', 'STRING');
    osc_set_preference('non_analytics_msg', Params::getParam("non_analytics_msg"), 'cookie', 'STRING');
    osc_set_preference('analytics_id', Params::getParam("analytics_id"), 'cookie', 'STRING');
    osc_set_preference('policy_link', Params::getParam("policy_link"), 'cookie', 'STRING');
    osc_set_preference('what_are_link', Params::getParam("what_are_link"), 'cookie', 'STRING');
    osc_set_preference('domain', Params::getParam("domain"), 'cookie', 'STRING');
    osc_set_preference('accept', Params::getParam("accept")==1?1:0, 'cookie', 'BOOLEAN');
    osc_set_preference('decline', Params::getParam("decline")==1?1:0, 'cookie', 'BOOLEAN');
    osc_set_preference('reset', Params::getParam("reset")==1?1:0, 'cookie', 'BOOLEAN');

    // HACK : This will make possible use of the flash messages ;)
    ob_get_clean();
    osc_add_flash_ok_message(__('Congratulations, the plugin is now configured', 'cookie'), 'admin');
    osc_redirect_to(osc_route_admin_url('cookie-conf'));
}
?>
<div id="general-setting" xmlns="http://www.w3.org/1999/html">
    <div id="general-settings">
    <h2 class="render-title"><?php _e('Cookies settings', 'cookie'); ?></h2>
        <ul id="error_list"></ul>
        <form name="cookie_form" action="<?php echo osc_admin_base_url(true); ?>" method="post">
            <input type="hidden" name="page" value="plugins" />
            <input type="hidden" name="action" value="renderplugin" />
            <input type="hidden" name="route" value="cookie-conf" />
            <input type="hidden" name="plugin_action" value="done" />
            <fieldset>
                <div class="form-horizontal">
                    <div class="form-row">
                        <div class="form-label"><?php _e('Accept', 'cookie'); ?></div>
                        <div class="form-controls">
                            <div class="form-label-checkbox">
                                <label>
                                    <input type="checkbox" <?php echo (osc_get_preference('accept', 'cookie') ? 'checked="true"' : ''); ?> name="accept" value="1" />
                                    <?php _e('Show accept button', 'cookie'); ?>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-label"><?php _e('Decline', 'cookie'); ?></div>
                        <div class="form-controls">
                            <div class="form-label-checkbox">
                                <label>
                                    <input type="checkbox" <?php echo (osc_get_preference('decline', 'cookie') ? 'checked="true"' : ''); ?> name="decline" value="1" />
                                    <?php _e('Show decline button', 'cookie'); ?>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-label"><?php _e('Reset', 'cookie'); ?></div>
                        <div class="form-controls">
                            <div class="form-label-checkbox">
                                <label>
                                    <input type="checkbox" <?php echo (osc_get_preference('reset', 'cookie') ? 'checked="true"' : ''); ?> name="reset" value="1" />
                                    <?php _e('Show reset button', 'cookie'); ?>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-label"><?php _e('Default message (without Google Analytics)', 'cookie'); ?></div>
                        <div class="form-controls"><textarea style="width:400px" name="non_analytics_msg"><?php echo osc_get_preference('non_analytics_msg', 'cookie'); ?></textarea></div>
                    </div>
                    <div class="form-row">
                        <div class="form-label"><?php _e('Analytics message', 'cookie'); ?></div>
                        <div class="form-controls"><textarea style="width:400px" name="analytics_msg"><?php echo osc_get_preference('analytics_msg', 'cookie'); ?></textarea></div>
                    </div>
                    <div class="form-row">
                        <div class="form-label"><?php _e('Analytics ID', 'cookie'); ?></div>
                        <div class="form-controls"><input type="text" class="xlarge" name="analytics_id" value="<?php echo osc_get_preference('analytics_id', 'cookie'); ?>" /></div>
                    </div>
                    <div class="form-row">
                        <div class="form-label"><?php _e('Policy link', 'cookie'); ?></div>
                        <div class="form-controls"><input type="text" class="xlarge" name="policy_link" value="<?php echo osc_get_preference('policy_link', 'cookie'); ?>" /></div>
                    </div>
                    <div class="form-row">
                        <div class="form-label"><?php _e('What are cookies link', 'cookie'); ?></div>
                        <div class="form-controls"><input type="text" class="xlarge" name="what_are_link" value="<?php echo osc_get_preference('what_are_link', 'cookie'); ?>" /></div>
                    </div>
                    <div class="clear"></div>
                    <div class="form-actions">
                        <input type="submit" id="save_changes" value="<?php echo osc_esc_html( __('Save changes') ); ?>" class="btn btn-submit" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>