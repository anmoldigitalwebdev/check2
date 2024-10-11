<?php
// Popular Recipes Post Meta
function weight_loss_trainer_bn_custom_meta_feature() {
    add_meta_box('bn_meta', __('Custom fields for Popular Recipes', 'weight-loss-trainer'), 'weight_loss_trainer_meta_callback_feature', 'post', 'normal', 'high');
}

if (is_admin()) {
    add_action('admin_menu', 'weight_loss_trainer_bn_custom_meta_feature');
}

function weight_loss_trainer_meta_callback_feature($post) {
    wp_nonce_field(basename(__FILE__), 'weight_loss_trainer_feature_meta_nonce');
    $bn_stored_meta = get_post_meta($post->ID);
    $weight_loss_trainer_text1 = get_post_meta($post->ID, 'weight_loss_trainer_text_1', true);
    ?>
    <div id="feature">
        <table id="list">
            <tbody id="the-list" data-wp-lists="list:meta">
                <tr id="meta-1">
                    <td class="left">
                        <?php esc_html_e('Preparation Time', 'weight-loss-trainer') ?>
                    </td>
                    <td class="left">
                        <input type="text" name="weight_loss_trainer_text_1" id="weight_loss_trainer_text_1" value="<?php echo esc_attr($weight_loss_trainer_text1); ?>" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php
}

/* Saves the custom meta input */
function weight_loss_trainer_bn_metadesig_save($post_id)
{
    if (!isset($_POST['weight_loss_trainer_feature_meta_nonce']) || !wp_verify_nonce(strip_tags(wp_unslash($_POST['weight_loss_trainer_feature_meta_nonce'])), basename(__FILE__))) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Save
    if (isset($_POST['weight_loss_trainer_text_1'])) {
        update_post_meta($post_id, 'weight_loss_trainer_text_1', strip_tags(wp_unslash($_POST['weight_loss_trainer_text_1'])));
    }
}
add_action('save_post', 'weight_loss_trainer_bn_metadesig_save');
