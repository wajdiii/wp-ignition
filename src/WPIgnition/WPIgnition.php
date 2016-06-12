<?php
// wp-ignition/src/WPIgnition/WPIgnition.php
namespace WPIgnition;

if ( ! defined( 'ABSPATH' ) ) exit;

use WPIgnition\Models\HooksInterface;
use WPIgnition\Models\HooksFrontInterface;
use WPIgnition\Models\HooksAdminInterface;

/**
 * WPIgnition
 *
 * @author Wajdi HADJ AMEUR
 * @version 1.0.0
 * @since 1.0.0
 */
class WPIgnition implements HooksInterface{

    protected $actions   = array();

    /**
     * @param array $actions
     */
    public function __construct($actions = array()){
        $this->actions = $actions;
    }

    /**
     * @return boolean
     */
    protected function canBeLoaded(){
        return true;
    }


    /**
     * Execute plugin
     */
    public function execute(){
        if ($this->canBeLoaded()){
            add_action( 'plugins_loaded' , array($this,'hooks'), 0);
        }
    }

    /**
     * @return array
     */
    public function getActions(){
        return $this->actions;
    }

    /**
     * Implements hooks from HooksInterface
     *
     * @see WPIgnition\Models\HooksInterface
     *
     * @return void
     */
    public function hooks(){
        foreach ($this->getActions() as $key => $action) {
            switch(true) {
                case $action instanceof HooksAdminInterface:
                    if (is_admin()) {
                        $action->hooks();
                    }
                    break;
                case $action instanceof HooksFrontInterface:
                    if (!is_admin()) {
                        $action->hooks();
                    }
                    break;
                case $action instanceof HooksInterface:
                    $action->hooks();
                    break;
            }
        }
    }
}
