<?php
/**
 * @class           ControlsConfiguration5ViewController
 * @author          wpXtreme team
 * @copyright       Copyright (C) 2013 wpXtreme Inc. All Rights Reserved.
 * @date            2013-07-15
 * @version         1.0.0
 *
 */
class ControlsConfiguration5ViewController extends WPDKViewController {

  /**
   * Create an instance of ControlsConfiguration5ViewController class
   *
   * @brief Construct
   *
   * @return ControlsConfiguration5ViewController
   */
  public function __construct()  {

    // Build the container view, with header title
    parent::__construct( 'controls-view-controller-5', 'This is the main view of plugin, with configuration loading and recording' );

    // Create a specialized WPDKView that embeds all WPDK graphic controls and configuration
    $controls_view = new ControlsConfiguration5View( 'Graphic Controls View + configuration recording' );

    // Add this specialized WPDKView to this ViewController
    $this->view->addSubview( $controls_view );

  }

}
