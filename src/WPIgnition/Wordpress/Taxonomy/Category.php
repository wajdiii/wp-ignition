<?php

namespace WPIgnition\Wordpress\Taxonomy;

use WPIgnition\Models\HooksInterface;
use WPIgnition\Wordpress\PostType\News;

class Category implements HooksInterface{

  const TAXONOMY_NAME = "categories";

  public function hooks(){
    add_action('init',array($this,'registerTaxonomy'));
  }

  public function registerTaxonomy(){
    $post_types = array(
      News::POST_TYPE,
    );

    $config = array(
        'label' => 'Catégories',
        'labels' => array(
            'name' => __('Catégories','wp-ignition'),
            'singular_name' => __('Catégorie','wp-ignition'),
            'all_items' => __('Toutes les catégories','wp-ignition'),
            'edit_item' => __('Éditer la catégorie','wp-ignition'),
            'view_item' => __('Voir la catégorie','wp-ignition'),
            'update_item' => __('Mettre à jour la catégorie','wp-ignition'),
            'add_new_item' => __('Ajouter une catégorie','wp-ignition'),
            'new_item_name' => __('Nouvelle catégorie','wp-ignition'),
            'search_items' => __('Rechercher parmi les catégories','wp-ignition'),
            'popular_items' => __('Catégories les plus utilisées','wp-ignition')
        ),
        'rewrite' => array('slug'=> 'categories'),
        'hierarchical' => true
    );

    register_taxonomy( self::TAXONOMY_NAME, $post_types, $config );
  }
}
