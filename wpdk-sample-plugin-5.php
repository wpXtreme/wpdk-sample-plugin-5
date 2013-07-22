<?php
/**
 * Plugin Name:     WPDK Sample Plugin #5
 * Plugin URI:      https://wpxtre.me
 * Description:     Sample #5 of WordPress plugin developed with WPDK framework - see readme.md in plugin root directory for details
 * Version:         1.0.0
 * Author:          wpXtreme
 * Author URI:      https://wpxtre.me
 * Text Domain:     wpdk-sample-plugin-5
 * Domain Path:     localization
 */

// Include WPDK framework - the root directory name of WPDK may be different.
// Please change the line below according to your environment.
require_once( trailingslashit( dirname( dirname( __FILE__ ))) . 'wpdk-production/wpdk.php' );

/**
 * WPDKSamplePlugin5 is the main class of this plugin, and extends WPDKWordPressPlugin
 *
 * @class              WPDKSamplePlugin5
 * @author             wpXtreme team
 * @copyright          Copyright (C) __WPXGENESI_PLUGIN_AUTHOR__.
 * @date               2013-07-20
 * @version            1.0.0
 *
 */
final class WPDKSamplePlugin5 extends WPDKWordPressPlugin {

  /**
   * Create an instance of WPDKSamplePlugin5 class
   *
   * @brief Construct
   *
   * @param string $file The main file of this plugin. Usually __FILE__
   *
   * @return WPDKSamplePlugin5 object instance
   */
  public function __construct( $file ) {

    parent::__construct( $file );

    // Build my own internal defines
    $this->defines();

    // Build environment of plugin autoload of internal classes - this is ALWAYS the first thing to do
    $this->_registerClasses();

  }

  /**
   * Register all autoload classes
   *
   * @brief Autoload classes
   */
  private function _registerClasses() {

    $includes = array(
      $this->classesPath . 'admin/wpdk-sample-admin.php'              => 'WPDKSamplePlugin5Admin',
      $this->classesPath . 'config/wpdk-sample-configuration-vc.php'  => 'ControlsConfiguration5ViewController',
      $this->classesPath . 'config/wpdk-sample-configuration.php'     => 'ControlsConfiguration5',
      $this->classesPath . 'config/about-vc.php'                      => 'About5ViewController',
      $this->classesPath . 'config/controls-configuration-view.php'   => 'ControlsConfiguration5View',
      $this->classesPath . 'config/controls-settings.php'             => 'ControlsSettings5'
    );

    $this->registerAutoloadClass( $includes );

  }



  /**
   * Include the external defines file
   *
   * @brief Defines
   */
  private function defines() {
    include_once( 'defines.php' );
  }

  /**
   * Catch for activation. This method is called one shot.
   *
   * @brief Activation
   */
  public function activation() {
  }

  /**
   * Catch for admin
   *
   * @brief Admin backend
   */
  public function admin() {
    WPDKSamplePlugin5Admin::init( $this );
  }

  /**
   * Ready to init plugin configuration
   *
   * @brief Init configuration
   */
  public function configuration() {
    ControlsConfiguration5::init();
  }

  /**
   * Catch for deactivation. This method is called when the plugin is deactivate.
   *
   * @brief Deactivation
   */
  public function deactivation() {
    /** To override. */
  }

}

// Set an instance of your plugin in order to make it ready to user activation and deactivation
$GLOBALS['WPDKSamplePlugin5'] = new WPDKSamplePlugin5( __FILE__ );
