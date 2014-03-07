<?php
/**
 * Plugin Name:     WPDK Sample Plugin #5
 * Plugin URI:      https://wpxtre.me
 * Description:     Sample #5 of WordPress plugin developed with WPDK framework - see readme.md in plugin root directory for details
 * Version:         1.1.0
 * Author:          wpXtreme
 * Author URI:      https://wpxtre.me
 * Text Domain:     wpdk-sample-plugin-5
 * Domain Path:     localization
 */

// Include WPDK framework - the root directory name of WPDK may be different.
// Please change the line below according to your environment.
require_once( trailingslashit( dirname( dirname( __FILE__ ) ) ) . 'wpdk-production/wpdk.php' );

/**
 * WPDKSamplePlugin5 is the main class of this plugin, and extends WPDKWordPressPlugin
 *
 * @class              WPDKSamplePlugin5
 * @author             =undo= <info@wpxtre.me>
 * @copyright          Copyright (C) 2012-2014 wpXtreme Inc. All Rights Reserved.
 * @date               2014-03-07
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
  public function __construct( $file )
  {

    parent::__construct( $file );

    // Build my own internal defines
    $this->defines();

    // Build environment of plugin autoload of internal classes - this is ALWAYS the first thing to do
    $this->registerClasses();

  }

  /**
   * Register all autoload classes
   *
   * @brief Autoload classes
   */
  private function registerClasses()
  {

    /*
     * This is a sample only! However we suggest to find a guide for naming file and class. For example in this case
     * the better solution will be
     *
     *     'wpdk-sample-admin.php'                      => 'WPDKSampleAdmin',
     *     'wpdk-sample-preferences.php'                => 'WPDKSamplePreferences',
     *     'wpdk-sample-preferences-viewcontroller.php' => 'WPDKSamplePreferencesViewController',
     *     'wpdk-sample-about-viewcontroller.php'       => 'WPDKSampleAboutViewController',
     *
     * The "wrong" naming below is just to realize that you can do what you want, without restrict
     *
     */

    $includes = array(
      $this->classesPath . 'admin/wpdk-sample-admin.php'                             => 'WPDKSamplePlugin5Admin',
      $this->classesPath . 'preferences/wpdk-sample-preferences.php'                 => 'PreferencesModel',
      $this->classesPath . 'preferences/wpdk-sample-preferences-viewcontroller.php'  => 'PreferencesViewController',
      $this->classesPath . 'other/about-viewcontroller.php'                          => 'About5ViewController',
    );

    $this->registerAutoloadClass( $includes );

  }


  /**
   * Include the external defines file
   *
   * @brief Defines
   */
  private function defines()
  {
    include_once( 'defines.php' );
  }

  /**
   * Catch for activation. This method is called one shot.
   *
   * @brief Activation
   */
  public function activation()
  {
    // When you update your plugin it is re-activate. In this place you can update your preferences
    PreferencesModel::init()->delta();
  }

  /**
   * Catch for admin
   *
   * @brief Admin backend
   */
  public function admin()
  {
    WPDKSamplePlugin5Admin::init( $this );
  }

  /**
   * Init your own preferences settings
   *
   * @brief Preferences
   */
  public function preferences()
  {
    PreferencesModel::init();
  }

  /**
   * Catch for deactivation. This method is called when the plugin is deactivate.
   *
   * @brief Deactivation
   */
  public function deactivation()
  {
    // To override
  }

}

// Set an instance of your plugin in order to make it ready to user activation and deactivation
$GLOBALS['WPDKSamplePlugin5'] = new WPDKSamplePlugin5( __FILE__ );
