<?php
namespace WPIgnition\Wordpress\PostType;

use WPIgnition\Models\HooksInterface;

class News implements HooksInterface{

  const POST_TYPE = "news";

  public function hooks(){
    add_action('init', array($this, 'registerPostType' ));
  }

  public function registerPostType(){
    $labels  = array(
      'name'               => __('News', 'wpignition'),
      'singular_name'      => __('News', 'wpignition'),
      'menu_name'          => __('News', 'wpignition'),
      'name_admin_bar'     => __('News','wpignition'),
      'view'               => __('View News', 'wpignition'),
      'all_items'          => __('All news', 'wpignition'),
      'search_items'       => __('Search news', 'wpignition'),
      'not_found'          => __('News not found', 'wpignition'),
      'not_found_in_trash' => __('News not found', 'wpignition')
    );

    $config = array(
      'labels'             => $labels,
      'public'             => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => apply_filters("todolist_rewrite_cpt_todo", "news") ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false
    );

    register_post_type(self::POST_TYPE , apply_filters("todolist_register_" . self::POST_TYPE . "_post_type", $config) );
  }
}
