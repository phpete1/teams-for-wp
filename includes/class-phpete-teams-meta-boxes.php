<?php
/**
 * The file that registers all post types
 *
 * @link       https://phpete.com
 * @since      0.2
 *
 * @package    Phpete_Teams
 * @subpackage Phpete_Teams/includes
 */

class Phpete_Teams_Meta_Boxes {

    public function __construct() {

        add_action('add_meta_boxes', array($this, 'add_team_member'));

        add_action('save_post', array($this, 'save_team_member'));

    }

    /**
     * This method creates a meta box for team_member custom post type.
     *
     * @since 0.3
     * @return void
     */

    public function add_team_member() {

        add_meta_box(
            'phpete_team_member',
            _x('Additional Info', 'additional info meta box title', 'textdomain'),
            array($this, 'render_team_member'),
            'phpete_team_member',
            'normal',
            'high'
        );

    }

    /**
     * This method render the team member meta box and creates a nonce
     *
     * @since 0.3
     * @return void
     */
    public function render_team_member($post) {

        wp_nonce_field('save_team_member_meta_box', 'phpete_team_member_meta_box');

        $role = get_post_meta($post->ID, 'phpete_team_member_role', true);

        require_once plugin_dir_path(dirname(__FILE__)).'admin/partials/phpete-teams-team-member-meta-box.php';

    }

    public function save_team_member($post_id) {

        $is_autosave = (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE);
        $has_permission = (current_user_can('edit_post', $post_id));
        $is_valid_nonce = isset($_POST['phpete_team_member_meta_box']) && wp_verify_nonce($_POST['phpete_team_member_meta_box'], 'save_team_member_meta_box');

        if ($is_autosave || !$has_permission || !$is_valid_nonce || !$_POST['phpete_team_member']) return;
        
        update_post_meta($post_id, 'phpete_team_member_role', $_POST['phpete_team_member']['role']);
    }

}