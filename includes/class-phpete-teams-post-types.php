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

class Phpete_Teams_Post_Types {

    public function __construct() {

        add_action('init', array($this, 'register_post_type_team_member'));

        add_action('init', array($this, 'register_taxonomy_departments'));

        add_action('init', array($this, 'unregister_taxonomies'));

    }

    /**
     * This method creates the team member post type.
     *
     * @since 0.2
     * @return void
     */
    function register_post_type_team_member() {
        $labels = array(
            'name'               => _x('Team Member', 'post type general name', 'textdomain'),
            'singular_name'      => _x('Team Member', 'post type singular name', 'textdomain'),
            'menu_name'          => _x('Team Members', 'admin menu', 'textdomain'),
            'name_admin_bar'     => _x('Team Members', 'add new on admin bar', 'textdomain'),
            'add_new'            => _x('Add New', 'book', 'textdomain'),
            'add_new_item'       => __('Add New Team Member', 'textdomain'),
            'new_item'           => __('New Team Member', 'textdomain'),
            'edit_item'          => __('Edit Team Member', 'textdomain'),
            'view_item'          => __('View Team Member', 'textdomain'),
            'all_items'          => __('All Team Members', 'textdomain'),
            'search_items'       => __('Search Team Members', 'textdomain'),
            'parent_item_colon'  => __('Parent Team Members:', 'textdomain'),
            'not_found'          => __('No team members found.', 'textdomain'),
            'not_found_in_trash' => __('No team members found in Trash.', 'textdomain')
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => false,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'menu_position'      => 30,
            'menu_icon'          => 'dashicons-groups',
            'hierarchical'       => false,
            'supports'           => array('title', 'thumbnail'),
            'taxonomies'         => array('department'),
            'has_archive'        => false,
            'rewrite'            => array('slug' => 'team-members'),
            'show_in_rest'      => false
        );

        register_post_type('phpete_team_member', $args);
    }

    /**
     * This method creates the departments taxonomy.
     *
     * @since 0.2
     * @return void
     */
    public function register_taxonomy_departments() {

        $labels = array(
            'name' => _x('Departments', 'taxonomy general name', 'textdomain'),
            'singular_name' => _x('Department', 'taxonomy singular name', 'textdomain'),
            'menu_name' => _x('Departments', 'taxonomy menu name', 'textdomain'),
            'all_items' => _x('All Departments', 'taxonomy all items', 'textdomain'),
            'edit_item' => _x('Edit Department', 'taxonomy edit item', 'textdomain'),
            'view_item' => _x('View Department', 'taxonomy view item', 'textdomain'),
            'update_item' => _x('Update Department', 'taxonomy update item', 'textdomain'),
            'add_new_item' => _x('Add New Department', 'taxonomy add new item', 'textdomain'),
            'new_item_name' => _x('New Department Name', 'taxonomy new item name', 'textdomain'),
            'search_items' => _x('Search Departments', 'taxonomy search items', 'textdomain'),
            'popular_items' => _x('Popular Departments', 'taxonomy popular items', 'textdomain'),
            'separate_items_with_commas' => _x('Separate departments with commas', 'taxonomy separate items with commas', 'textdomain'),
            'add_or_remove_items' => _x('Add or remove departments', 'taxonomy add or remove items', 'textdomain'),
            'choose_from_most_used' => _x('Choose from the most used departments', 'taxonomy choose from most used', 'textdomain'),
        );

        $args = array(
            'hierarchical' => true,
            'labels' => $labels,
            'rewrite' => array(
                'slug' => 'departments',
                'with_front' => true
            )
        );

        register_taxonomy('department', 'phpete_team_member', $args); // Change 'post' to the post type where you want to use the "Departments" taxonomy.

    }

    /**
     * This method removes the default taxonomies.
     *
     * @since 0.2
     * @return void
     */

    public function unregister_taxonomies() {

        unregister_taxonomy_for_object_type('category', 'phpete_team_member'); // Remove Categories taxonomy.
        unregister_taxonomy_for_object_type('post_tag', 'phpete_team_member'); // Remove Tags taxonomy.

    }

}