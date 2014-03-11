<?php

/**
 * @class              AboutViewController
 * @author             =undo= <info@wpxtre.me>
 * @copyright          Copyright (C) 2012-2014 wpXtreme Inc. All Rights Reserved.
 * @date               2014-03-07
 * @version            1.0.0
 *
 */
class AboutViewController extends WPDKViewController {

  /**
   * Create an instance of AboutViewController class
   *
   * @brief Construct
   *
   * @return AboutViewController
   */
  public function __construct()
  {
    // Build the container, with default header
    parent::__construct( 'my-view-controller-5', 'WPDK Sample Plugin #5 - Output of second view controller' );
  }

  /**
   * Override display
   *
   * @brief Brief
   */
  public function display()
  {

    // call parent display to build default page structure
    parent::display();

    // show custom content
    ?>
    <h3>View Controller ID: <?php echo $this->id ?></h3>
    <div>This is a generic content of second view controller.</div>
  <?php
  }

}
