<?php

/**
 * This is the main admin class of your plugin. It extends the basic class WPDKWordPressAdmin, that gives you some facilities to handle operation in WordPress administrative
 * area.
 *
 * @class              WPDKSamplePlugin5Admin
 * @author             =undo= <info@wpxtre.me>
 * @copyright          Copyright (C) 2012-2014 wpXtreme Inc. All Rights Reserved.
 * @date               2014-03-07
 * @version            1.0.0
 *
 */
class WPDKSamplePlugin5Admin extends WPDKWordPressAdmin {

  /**
   * This is the minumun capability required to display admin menu item
   *
   * @brief Menu capability
   */
  const MENU_CAPABILITY = 'manage_options';

  /**
   * Create and return a singleton instance of WPDKSamplePlugin5Admin class
   *
   * @brief Init
   *
   * @return WPDKSamplePlugin5Admin
   */
  public static function init()
  {
    static $instance = null;
    if ( is_null( $instance ) ) {
      $instance = new self();
    }

    return $instance;
  }


  /**
   * Create an instance of WPDKSamplePlugin5Admin class
   *
   * @brief Construct
   *
   * @return WPDKSamplePlugin5Admin
   */
  public function __construct()
  {
    /**
     * @var WPDKSamplePlugin5 $plugin
     */
    $plugin = $GLOBALS['WPDKSamplePlugin5'];
    parent::__construct( $plugin );

  }

  /**
   * Called by WPDKWordPressAdmin parent when the admin head is loaded
   *
   * @brief Admin head
   */
  public function admin_head()
  {
    // You can enqueue here all the scripts and css styles needed by your plugin, through wp_enqueue_script and wp_enqueue_style functions   */
  }

  /**
   * Called when WordPress is ready to build the admin menu.
   *
   * @brief Admin menu
   */
  public function admin_menu()
  {

    // Load my own icon
    $icon_menu = $this->plugin->imagesURL . 'logo-16x16.png';

    // Build menu as an array. See documentation of method renderByArray of class WPDKMenu for details
    $menus = array(
      'wpdk_sampleplugin' => array(

        // Menu title shown as first entry in main navigation menu
        'menuTitle'  => __( 'WPDK Plug#5' ),

        // WordPress capability needed to see this menu - if current WordPress user does not have this capability, the menu will be hidden
        'capability' => self::MENU_CAPABILITY,

        // Icon to show in menu - see above
        'icon'       => $icon_menu,

        // Create two submenu item to this main menu
        'subMenus'   => array(

          array(
            'menuTitle'      => __( 'Show Controls' ), // Menu item shown as first submenu in main navigation menu
            'pageTitle'      => __( 'wpdk sample plugin #5 - Show Controls Configuration' ),  // The web page title shown when this item is clicked

            // WordPress capability needed to see this menu item - if current WordPress user does not have this capability, this menu item will be hidden
            'capability'     => self::MENU_CAPABILITY,
            'viewController' => 'PreferencesViewController', // Function called whenever this menu item is clicked
          ),

          // Add a divider to separate the first submenu item from the second
          WPDKSubMenuDivider::DIVIDER,

          array(
            'menuTitle'      => __( 'Show About' ),
            'pageTitle'      => __( 'wpdk sample plugin #5 - Show About' ),
            'viewController' => 'AboutViewController',
          ),
        )
      )
    );

    // Physically build the menu added to main navigation menu when this plugin is activated
    WPDKMenu::renderByArray( $menus );

  }

}
