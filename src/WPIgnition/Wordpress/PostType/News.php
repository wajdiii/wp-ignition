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
      'name'               => __('News', 'wp-ignition'),
      'singular_name'      => __('News', 'wp-ignition'),
      'menu_name'          => __('News', 'wp-ignition'),
      'name_admin_bar'     => __('News','wp-ignition'),
      'view'               => __('Voir la News', 'wp-ignition'),
      'all_items'          => __('Toutes les news', 'wp-ignition'),
      'search_items'       => __('Rechercher une news', 'wp-ignition'),
      'not_found'          => __('News non trouvée', 'wp-ignition'),
      'not_found_in_trash' => __('News non trouvée', 'wp-ignition')
    );

    $config = array(
      'labels'             => $labels,
      'public'             => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => apply_filters("wpi_rewrite_cpt_".self::POST_TYPE, "news") ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false
    );

    register_post_type(self::POST_TYPE , apply_filters("wpi_register_" . self::POST_TYPE . "_post_type", $config) );
  }
}
