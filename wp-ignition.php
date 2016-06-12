<?php

/**
 * Plugin Name: WP Ignition
 * Description:
 * Version: 1.0.0
 * Author: <a href="http://www.lajungle.fr">La Jungle</a>
 */

require_once( dirname( __FILE__ ) . '/vendor/autoload.php' );

use WPIgnition\WPIgnition;
use WPIgnition\Wordpress\PostType\News;
use WPIgnition\Wordpress\Taxonomy\Category;

$actions = array(
  new News(),
  new Category(),
);


$todolist = new WPIgnition($actions);
$todolist->execute();
